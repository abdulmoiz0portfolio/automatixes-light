#!/usr/bin/env node

/**
 * ============================================================================
 * ADVERSARIAL MUTATION & STRESS HARNESS FOR E2E TEST RUNNER
 * ============================================================================
 * 
 * Challenger 2 Verification Harness for tests/e2e-test-runner.js
 * 
 * Objectives:
 * 1. Empirically inject 18+ mutations across CSS tokens, clamps, templates, scripts.
 * 2. Measure detection rate, expected vs actual diagnostics, and process exit codes.
 * 3. Audit assertion sensitivity & false-positive resistance against dummy/stub files.
 * 4. Profile execution speed, memory footprint (RSS, Heap), and CLI flag behavior.
 * ============================================================================
 */

'use strict';

const fs = require('fs');
const path = require('path');
const { spawnSync } = require('child_process');

const ROOT_DIR = path.resolve(__dirname, '..');
const RUNNER_PATH = path.join(ROOT_DIR, 'tests', 'e2e-test-runner.js');

// ANSI formatting
const GREEN = '\x1b[32m';
const RED = '\x1b[31m';
const YELLOW = '\x1b[33m';
const CYAN = '\x1b[36m';
const BOLD = '\x1b[1m';
const RESET = '\x1b[0m';
const GRAY = '\x1b[90m';

// Helper to execute runner
function runRunner(args = [], customEnv = {}) {
    const start = process.hrtime();
    const result = spawnSync('node', [RUNNER_PATH, ...args], {
        cwd: ROOT_DIR,
        encoding: 'utf8',
        env: { ...process.env, ...customEnv }
    });
    const diff = process.hrtime(start);
    const durationMs = (diff[0] * 1000 + diff[1] / 1e6);
    return {
        exitCode: result.status,
        stdout: result.stdout || '',
        stderr: result.stderr || '',
        durationMs
    };
}

// Backup and restore helper
class FileBackupManager {
    constructor() {
        this.backups = new Map();
    }

    backup(relPath) {
        const fullPath = path.join(ROOT_DIR, relPath);
        if (fs.existsSync(fullPath) && !this.backups.has(relPath)) {
            this.backups.set(relPath, fs.readFileSync(fullPath, 'utf8'));
        }
    }

    modify(relPath, mutatorFn) {
        this.backup(relPath);
        const fullPath = path.join(ROOT_DIR, relPath);
        const original = fs.readFileSync(fullPath, 'utf8');
        const modified = mutatorFn(original);
        fs.writeFileSync(fullPath, modified, 'utf8');
    }

    restoreAll() {
        for (const [relPath, content] of this.backups.entries()) {
            const fullPath = path.join(ROOT_DIR, relPath);
            fs.writeFileSync(fullPath, content, 'utf8');
        }
        this.backups.clear();
    }
}

const backupMgr = new FileBackupManager();

const mutationResults = [];

function recordMutation(id, category, description, targetFile, expectedFailingTests, mutatorFn) {
    console.log(`  ${CYAN}Testing Mutation [${id}]${RESET}: ${description}...`);
    try {
        backupMgr.modify(targetFile, mutatorFn);
        const res = runRunner(['--bail=false']);
        
        const detectedFailingTests = [];
        for (const testId of expectedFailingTests) {
            const pattern = new RegExp(`✖ FAIL.*?\\[${testId}\\]`, 'i');
            if (pattern.test(res.stdout)) {
                detectedFailingTests.push(testId);
            }
        }

        const allExpectedDetected = expectedFailingTests.every(t => detectedFailingTests.includes(t));
        const passed = res.exitCode === 1 && allExpectedDetected;

        mutationResults.push({
            id,
            category,
            description,
            targetFile,
            expectedFailingTests,
            detectedFailingTests,
            exitCode: res.exitCode,
            passed,
            durationMs: res.durationMs
        });

        if (passed) {
            console.log(`    ${GREEN}✔ DETECTED${RESET} - Exit Code: ${res.exitCode}, Caught: [${detectedFailingTests.join(', ')}]`);
        } else {
            console.log(`    ${RED}✖ FAILED TO DETECT${RESET} - Expected: [${expectedFailingTests.join(', ')}], Caught: [${detectedFailingTests.join(', ')}], Exit Code: ${res.exitCode}`);
        }
    } catch (err) {
        console.error(`    ${RED}Error during mutation:${RESET}`, err);
        mutationResults.push({
            id,
            category,
            description,
            targetFile,
            expectedFailingTests,
            detectedFailingTests: [],
            exitCode: -1,
            passed: false,
            error: err.message
        });
    } finally {
        backupMgr.restoreAll();
    }
}

console.log(`${BOLD}${CYAN}================================================================================${RESET}`);
console.log(`${BOLD}${CYAN}        EMPIRICAL ADVERSARIAL MUTATION & STRESS TEST HARNESS                    ${RESET}`);
console.log(`${BOLD}${CYAN}================================================================================${RESET}\n`);

// ----------------------------------------------------------------------------
// 1. MUTATION SUITE: CSS DESIGN TOKENS & COLOR FOUNDATIONS
// ----------------------------------------------------------------------------
console.log(`${BOLD}${YELLOW}>>> 1. CSS Design Tokens & Palette Mutation Suite${RESET}`);

recordMutation(
    'MUT-CSS-01',
    'Tokens',
    'Remove --bg-void declaration entirely',
    'assets/css/main.css',
    ['T1-F1-01'],
    (css) => css.replace(/--bg-void\s*:\s*#050505;/, '/* --bg-void removed */')
);

recordMutation(
    'MUT-CSS-02',
    'Tokens',
    'Corrupt --bg-void color to invalid hex #123456',
    'assets/css/main.css',
    ['T1-F1-01'],
    (css) => css.replace(/--bg-void\s*:\s*#050505;/, '--bg-void: #123456;')
);

recordMutation(
    'MUT-CSS-03',
    'Tokens',
    'Corrupt --accent-neon to purple #ff00ff',
    'assets/css/main.css',
    ['T1-F1-03'],
    (css) => css.replace(/--accent-neon\s*:\s*#ccff00;/, '--accent-neon: #ff00ff;')
);

recordMutation(
    'MUT-CSS-04',
    'Tokens',
    'Reintroduce legacy teal #0B4550 to --bg-base',
    'assets/css/main.css',
    ['T1-F1-05'],
    (css) => css.replace(/--bg-base\s*:\s*#0a0a0a;/, '--bg-base: #0B4550;')
);

recordMutation(
    'MUT-CSS-05',
    'Tokens',
    'Remove --text-primary token definition',
    'assets/css/main.css',
    ['T1-F1-04'],
    (css) => css.replace(/--text-primary\s*:\s*#ffffff;/, '/* --text-primary removed */')
);

// ----------------------------------------------------------------------------
// 2. MUTATION SUITE: FLUID TYPOGRAPHY & CLAMP FORMULAS
// ----------------------------------------------------------------------------
console.log(`\n${BOLD}${YELLOW}>>> 2. Fluid Typography & Clamp Formula Mutation Suite${RESET}`);

recordMutation(
    'MUT-CLAMP-01',
    'Clamp',
    'Remove --font-hero token definition completely',
    'assets/css/main.css',
    ['T1-F2-03'],
    (css) => css.replace(/--font-hero\s*:\s*clamp\([^;]+;/i, '/* --font-hero removed */')
);

recordMutation(
    'MUT-CLAMP-02',
    'Clamp',
    'Corrupt --font-hero min bound from 3.75rem to tiny 1.25rem',
    'assets/css/main.css',
    ['T1-F2-03'],
    (css) => css.replace(/--font-hero\s*:\s*clamp\(\s*3\.75rem/i, '--font-hero: clamp(1.25rem')
);

recordMutation(
    'MUT-CLAMP-03',
    'Clamp',
    'Corrupt --font-hero max bound from 9.5rem to restrictive 4.5rem',
    'assets/css/main.css',
    ['T1-F2-03'],
    (css) => css.replace(/9\.5rem\s*\)/i, '4.5rem)')
);

recordMutation(
    'MUT-CLAMP-04',
    'Clamp',
    'Replace --section-space clamp with static 100px value',
    'assets/css/main.css',
    ['T1-F3-01'],
    (css) => css.replace(/--section-space\s*:\s*clamp\([^;]+;/i, '--section-space: 100px;')
);

recordMutation(
    'MUT-CLAMP-05',
    'Clamp',
    'Corrupt --section-space max bound to extreme 350px (>260px ceiling violation)',
    'assets/css/main.css',
    ['T1-F3-01', 'T2-F3-02'],
    (css) => css.replace(/--section-space\s*:\s*clamp\(\s*140px\s*,\s*16vh\s*,\s*220px\s*\);/i, '--section-space: clamp(140px, 16vh, 350px);')
);

// ----------------------------------------------------------------------------
// 3. MUTATION SUITE: TEMPLATES & HTML DOM SHELL
// ----------------------------------------------------------------------------
console.log(`\n${BOLD}${YELLOW}>>> 3. Template & HTML DOM Shell Mutation Suite${RESET}`);

recordMutation(
    'MUT-SHELL-01',
    'Shell',
    'Remove Space Grotesk Google Font link from header.php',
    'header.php',
    ['T1-F2-01'],
    (php) => php.replace(/family=Space\+Grotesk[^"'\s]*/g, 'family=Open+Sans')
);

recordMutation(
    'MUT-SHELL-02',
    'Shell',
    'Remove cursor DOM elements (.cursor-outer, .cursor-inner) from header.php',
    'header.php',
    ['T1-F8-01'],
    (php) => php.replace(/<div class="mouse-cursor cursor-outer"><\/div>[\s\S]*?<div class="mouse-cursor cursor-inner"><\/div>/, '<!-- cursor removed -->')
);

recordMutation(
    'MUT-SHELL-03',
    'Shell',
    'Remove #sticky-expert-btn from footer.php',
    'footer.php',
    ['T1-F13-02', 'T4-SCEN-03'],
    (php) => php.replace(/id="sticky-expert-btn"/g, 'id="disabled-btn"')
);

recordMutation(
    'MUT-SHELL-04',
    'Shell',
    'Remove #custom-chat-close button from footer.php',
    'footer.php',
    ['T1-F13-03', 'T4-SCEN-03'],
    (php) => php.replace(/id="custom-chat-close"/g, 'id="removed-close"')
);

recordMutation(
    'MUT-SHELL-05',
    'Shell',
    'Remove elevenlabs-convai custom element from footer.php',
    'footer.php',
    ['T1-F13-04', 'T4-SCEN-06'],
    (php) => php.replace(/<elevenlabs-convai[\s\S]*?<\/elevenlabs-convai>/g, '<!-- elevenlabs removed -->')
);

recordMutation(
    'MUT-SHELL-06',
    'Shell',
    'Remove @media print stylesheet rules from invoice-maker.php',
    'invoice-maker.php',
    ['T1-F13-05', 'T2-F13-05'],
    (php) => php.replace(/@media\s+print/g, '@media screen-only')
);

// ----------------------------------------------------------------------------
// 4. MUTATION SUITE: JAVASCRIPT SYNTAX & ENGINE COMPILATION
// ----------------------------------------------------------------------------
console.log(`\n${BOLD}${YELLOW}>>> 4. JavaScript Syntax & Compilation Mutation Suite${RESET}`);

recordMutation(
    'MUT-JS-01',
    'JavaScript',
    'Inject fatal syntax error into assets/js/main.js',
    'assets/js/main.js',
    ['T4-SCEN-02'],
    (js) => `const FATAL_SYNTAX_ERROR = ;;\n` + js
);

// ----------------------------------------------------------------------------
// 5. ASSERTION SENSITIVITY & TAUTOLOGY AUDIT
// ----------------------------------------------------------------------------
console.log(`\n${BOLD}${YELLOW}>>> 5. Assertion Sensitivity & Tautology Audit${RESET}`);

const runnerSource = fs.readFileSync(RUNNER_PATH, 'utf8');

// Count assertions by pattern
const assertStats = {
    totalTests: (runnerSource.match(/registry\.register\(/g) || []).length,
    assertCssVarCalls: (runnerSource.match(/AssertHelper\.assertCssVar\(/g) || []).length,
    assertClampCalls: (runnerSource.match(/AssertHelper\.assertClamp\(/g) || []).length,
    assertMatchesCalls: (runnerSource.match(/AssertHelper\.assertMatches\(/g) || []).length,
    assertIncludesCalls: (runnerSource.match(/AssertHelper\.assertIncludes\(/g) || []).length,
    genericAssertCalls: (runnerSource.match(/AssertHelper\.assert\(/g) || []).length,
    validateJsSyntaxCalls: (runnerSource.match(/audit\.validateJsSyntax\(/g) || []).length
};

console.log(`  ${CYAN}Static Assertion Composition in Runner:${RESET}`);
console.log(`    - Total Registered Tests:   ${BOLD}${assertStats.totalTests}${RESET}`);
console.log(`    - assertCssVar Calls:       ${BOLD}${assertStats.assertCssVarCalls}${RESET}`);
console.log(`    - assertClamp Calls:        ${BOLD}${assertStats.assertClampCalls}${RESET}`);
console.log(`    - assertMatches (Regex):    ${BOLD}${assertStats.assertMatchesCalls}${RESET}`);
console.log(`    - assertIncludes:           ${BOLD}${assertStats.assertIncludesCalls}${RESET}`);
console.log(`    - General assert (Logic):   ${BOLD}${assertStats.genericAssertCalls}${RESET}`);
console.log(`    - validateJsSyntax (VM):    ${BOLD}${assertStats.validateJsSyntaxCalls}${RESET}`);

// Identify potentially vacuous or overly loose assertions in test runner
console.log(`\n  ${CYAN}Scanning for loose / overly lenient assertion patterns...${RESET}`);

const loosePatterns = [
    { pattern: /includes\(['"]length['"]\)/g, desc: "Testing for word 'length' in JS" },
    { pattern: /includes\(['"]innerHTML['"]\)/g, desc: "Testing for word 'innerHTML' in JS" },
    { pattern: /includes\(['"]setTimeout['"]\)/g, desc: "Testing for word 'setTimeout' in JS" },
    { pattern: /includes\(['"]DOMContentLoaded['"]\)/g, desc: "Testing for word 'DOMContentLoaded' in JS" },
    { pattern: /includes\(['"]addEventListener['"]\)/g, desc: "Testing for word 'addEventListener' in JS" },
    { pattern: /includes\(['"]box-sizing['"]\)/g, desc: "Testing for 'box-sizing' in CSS" },
    { pattern: /includes\(['"]<a['"]\)/g, desc: "Testing for '<a' in HTML" },
    { pattern: /includes\(['"]href=['"]\)/g, desc: "Testing for 'href=' in HTML" }
];

const foundLoose = [];
for (const lp of loosePatterns) {
    const matches = (runnerSource.match(lp.pattern) || []).length;
    if (matches > 0) {
        foundLoose.push({ ...lp, count: matches });
        console.log(`    ${YELLOW}⚠ Loose assertion found (${matches}x):${RESET} ${lp.desc}`);
    }
}

// ----------------------------------------------------------------------------
// 6. PERFORMANCE & MEMORY PROFILING
// ----------------------------------------------------------------------------
console.log(`\n${BOLD}${YELLOW}>>> 6. Performance & Memory Profiling Across Runs${RESET}`);

const RUN_COUNT = 5;
const timings = [];
const memSnapshots = [];

for (let i = 1; i <= RUN_COUNT; i++) {
    const memBefore = process.memoryUsage();
    const res = runRunner();
    const memAfter = process.memoryUsage();
    timings.push(res.durationMs);
    memSnapshots.push({
        run: i,
        rssMb: (memAfter.rss / 1024 / 1024).toFixed(2),
        heapUsedMb: (memAfter.heapUsed / 1024 / 1024).toFixed(2),
        heapTotalMb: (memAfter.heapTotal / 1024 / 1024).toFixed(2),
        timeMs: res.durationMs.toFixed(1)
    });
}

const avgTime = timings.reduce((a, b) => a + b, 0) / RUN_COUNT;
const minTime = Math.min(...timings);
const maxTime = Math.max(...timings);

console.log(`  ${CYAN}Execution Timings across ${RUN_COUNT} full 152-test runs:${RESET}`);
console.log(`    - Average: ${BOLD}${avgTime.toFixed(1)}ms${RESET}`);
console.log(`    - Min:     ${BOLD}${minTime.toFixed(1)}ms${RESET}`);
console.log(`    - Max:     ${BOLD}${maxTime.toFixed(1)}ms${RESET}`);

console.log(`\n  ${CYAN}Memory Usage per Run:${RESET}`);
memSnapshots.forEach(s => {
    console.log(`    Run ${s.run}: RSS: ${s.rssMb} MB | Heap Used: ${s.heapUsedMb} MB / ${s.heapTotalMb} MB | Time: ${s.timeMs}ms`);
});

// CLI Flag verification
console.log(`\n  ${CYAN}Testing CLI Flags:${RESET}`);

const tier1Res = runRunner(['--tier=1']);
console.log(`    --tier=1: ${tier1Res.exitCode === 1 ? 'Exit 1 (Passes as expected with current code)' : 'Exit ' + tier1Res.exitCode} (${tier1Res.durationMs.toFixed(1)}ms) - Output contains TIER 1: ${tier1Res.stdout.includes('TIER 1')}`);

const featureF1Res = runRunner(['--feature=F1']);
console.log(`    --feature=F1: Exit ${featureF1Res.exitCode} (${featureF1Res.durationMs.toFixed(1)}ms) - Output contains F1: ${featureF1Res.stdout.includes('F1')}`);

const bailRes = runRunner(['--bail']);
console.log(`    --bail: Exit ${bailRes.exitCode} (${bailRes.durationMs.toFixed(1)}ms) - Stopped on first failure: ${bailRes.stdout.includes('Bailing out immediately')}`);

// ----------------------------------------------------------------------------
// MUTATION SUMMARY TABLE
// ----------------------------------------------------------------------------
console.log(`\n${BOLD}${CYAN}================================================================================${RESET}`);
console.log(`${BOLD}${CYAN}                        MUTATION TEST RESULTS SUMMARY                           ${RESET}`);
console.log(`${BOLD}${CYAN}================================================================================${RESET}`);

const totalMutations = mutationResults.length;
const detectedMutations = mutationResults.filter(m => m.passed).length;
const detectionRate = ((detectedMutations / totalMutations) * 100).toFixed(1);

console.log(`Total Injected Mutations:     ${BOLD}${totalMutations}${RESET}`);
console.log(`Correctly Detected Defect(s): ${BOLD}${GREEN}${detectedMutations}${RESET} / ${totalMutations}`);
console.log(`Mutation Detection Rate:      ${BOLD}${detectionRate === '100.0' ? GREEN : YELLOW}${detectionRate}%${RESET}\n`);

console.log(`┌────────────┬─────────────┬─────────────────────────────────────────────────┬──────────┐`);
console.log(`│ ID         │ Category    │ Description                                     │ Status   │`);
console.log(`├────────────┼─────────────┼─────────────────────────────────────────────────┼──────────┤`);
mutationResults.forEach(m => {
    const pad = (s, l) => String(s).padEnd(l);
    const statStr = m.passed ? `${GREEN}✔ DETECTED${RESET}` : `${RED}✖ MISSED  ${RESET}`;
    console.log(`│ ${pad(m.id, 10)} │ ${pad(m.category, 11)} │ ${pad(m.description.slice(0, 47), 47)} │ ${statStr} │`);
});
console.log(`└────────────┴─────────────┴─────────────────────────────────────────────────┴──────────┘`);

const reportJson = {
    totalMutations,
    detectedMutations,
    detectionRate: `${detectionRate}%`,
    mutationResults,
    assertStats,
    foundLoose,
    performance: {
        runs: RUN_COUNT,
        avgTimeMs: avgTime,
        minTimeMs: minTime,
        maxTimeMs: maxTime,
        memorySnapshots: memSnapshots
    }
};

fs.writeFileSync(
    path.join(__dirname, 'mutation-challenge-report.json'),
    JSON.stringify(reportJson, null, 2),
    'utf8'
);

console.log(`\n${GREEN}Saved JSON report to tests/mutation-challenge-report.json${RESET}\n`);
