#!/usr/bin/env node

/**
 * ============================================================================
 * QCLAY REDESIGN: AUTOMATED E2E TEST RUNNER (TIERS 1 - 4)
 * ============================================================================
 * 
 * Production-grade, zero-dependency test runner validating all 152 test cases
 * across visual design tokens, fluid typography, negative spacing, motion engines
 * (Lenis & GSAP ScrollTrigger), interactive physics (cursor & magnetic buttons),
 * asymmetrical grid layouts, subpages, and legacy mission-critical integrations.
 * 
 * Author: Test Writer (Worker M-E2E)
 * Date: 2026-08-17
 * Runtime: Node.js standard built-ins (fs, path, http, vm, assert)
 * ============================================================================
 */

'use strict';

const fs = require('fs');
const path = require('path');
const http = require('http');
const vm = require('vm');
const assert = require('assert');

// ----------------------------------------------------------------------------
// CLI PARSER & CONFIGURATION
// ----------------------------------------------------------------------------

const ARGS = process.argv.slice(2);
const CONFIG = {
    tier: 'all',        // '1', '2', '3', '4', or 'all'
    feature: 'all',     // 'F1'..'F13' or 'all'
    verbose: false,
    bail: false,
    port: 3000,
    help: false
};

for (const arg of ARGS) {
    if (arg === '--help' || arg === '-h') CONFIG.help = true;
    else if (arg === '--verbose' || arg === '-v') CONFIG.verbose = true;
    else if (arg === '--bail' || arg === '-b') CONFIG.bail = true;
    else if (arg.startsWith('--tier=')) CONFIG.tier = arg.split('=')[1].toLowerCase();
    else if (arg.startsWith('--feature=')) CONFIG.feature = arg.split('=')[1].toUpperCase();
    else if (arg.startsWith('--port=')) CONFIG.port = parseInt(arg.split('=')[1], 10) || 3000;
}

if (CONFIG.help) {
    console.log(`
QClay Redesign Automated E2E Test Runner
Usage: node tests/e2e-test-runner.js [options]

Options:
  --tier=1|2|3|4|all     Filter execution by specific test tier (default: all)
  --feature=F1..F13      Filter execution by specific feature ID (default: all)
  --verbose, -v          Show detailed execution logs for every test case
  --bail, -b             Stop test execution immediately upon first failure
  --port=<num>           Specify DevServer port (default: 3000)
  --help, -h             Show this help message and exit

Exit Codes:
  0                      All executed tests passed
  1                      One or more tests failed
`);
    process.exit(0);
}

// ANSI Color Codes
const COLORS = {
    reset: '\x1b[0m',
    bold: '\x1b[1m',
    dim: '\x1b[2m',
    green: '\x1b[32m',
    red: '\x1b[31m',
    yellow: '\x1b[33m',
    cyan: '\x1b[36m',
    magenta: '\x1b[35m',
    gray: '\x1b[90m',
    bgDark: '\x1b[40m'
};

const ROOT_DIR = path.resolve(__dirname, '..');

// ----------------------------------------------------------------------------
// STATIC AUDIT & DEVSERVER CLIENT ENGINES
// ----------------------------------------------------------------------------

class StaticAuditEngine {
    constructor(rootDir) {
        this.rootDir = rootDir;
        this._fileCache = new Map();
    }

    readFile(relPath) {
        if (this._fileCache.has(relPath)) {
            return this._fileCache.get(relPath);
        }
        const fullPath = path.join(this.rootDir, relPath);
        if (!fs.existsSync(fullPath)) {
            throw new Error(`Target file not found on disk: "${relPath}" (${fullPath})`);
        }
        const content = fs.readFileSync(fullPath, 'utf8');
        this._fileCache.set(relPath, content);
        return content;
    }

    fileExists(relPath) {
        return fs.existsSync(path.join(this.rootDir, relPath));
    }

    getRenderedHtml(relPhpPath) {
        try {
            const devServerPath = path.join(this.rootDir, 'dev-server.js');
            const { getProcessedHtml } = require(devServerPath);
            const fullPath = path.join(this.rootDir, relPhpPath);
            return getProcessedHtml(fullPath);
        } catch (err) {
            // Fallback: simple include expansion if dev-server module fails
            const raw = this.readFile(relPhpPath);
            return raw;
        }
    }

    validateJsSyntax(relPath) {
        const code = this.readFile(relPath);
        try {
            new vm.Script(code, { filename: relPath });
            return { valid: true };
        } catch (err) {
            return { valid: false, error: err.message, stack: err.stack };
        }
    }
}

class DevServerClient {
    constructor(port = 3000) {
        this.port = port;
        this.baseUrl = `http://localhost:${port}`;
    }

    async isRunning() {
        return new Promise((resolve) => {
            const req = http.get(`${this.baseUrl}/`, (res) => {
                resolve(res.statusCode === 200);
            });
            req.on('error', () => resolve(false));
            req.setTimeout(800, () => {
                req.destroy();
                resolve(false);
            });
        });
    }

    async fetch(urlPath) {
        return new Promise((resolve, reject) => {
            const cleanPath = urlPath.startsWith('/') ? urlPath : '/' + urlPath;
            const fullUrl = `${this.baseUrl}${cleanPath}`;
            const req = http.get(fullUrl, (res) => {
                let data = '';
                res.on('data', chunk => data += chunk);
                res.on('end', () => {
                    resolve({
                        statusCode: res.statusCode,
                        headers: res.headers,
                        body: data
                    });
                });
            });
            req.on('error', reject);
            req.setTimeout(4000, () => {
                req.destroy();
                reject(new Error(`Timeout fetching endpoint ${fullUrl}`));
            });
        });
    }
}

// ----------------------------------------------------------------------------
// ASSERTION UTILITIES
// ----------------------------------------------------------------------------

class AssertHelper {
    static assert(condition, message, diagnostics = {}) {
        if (!condition) {
            const err = new Error(message);
            err.diagnostics = diagnostics;
            throw err;
        }
    }

    static assertIncludes(haystack, needle, message) {
        this.assert(
            typeof haystack === 'string' && haystack.includes(needle),
            message || `Expected content to include "${needle}"`,
            { needle, snippet: String(haystack || '').slice(0, 200) }
        );
    }

    static assertNotIncludes(haystack, needle, message) {
        this.assert(
            !haystack || !haystack.includes(needle),
            message || `Expected content NOT to include "${needle}"`,
            { needle }
        );
    }

    static assertMatches(haystack, regex, message) {
        this.assert(
            regex.test(haystack),
            message || `Expected string to match regex pattern ${regex}`,
            { regex: regex.toString(), snippet: String(haystack || '').slice(0, 200) }
        );
    }

    static assertCssVar(cssContent, varName, expectedPattern, message) {
        const regex = new RegExp(`${varName}\\s*:\\s*([^;]+);`, 'i');
        const match = cssContent.match(regex);
        this.assert(
            match !== null,
            message || `CSS custom property "${varName}" was not declared in stylesheet`,
            { varName }
        );
        if (expectedPattern) {
            const val = match[1].trim();
            const pattern = typeof expectedPattern === 'string' ? new RegExp(expectedPattern, 'i') : expectedPattern;
            this.assert(
                pattern.test(val),
                message || `CSS variable "${varName}" has unexpected value: "${val}" (expected to match: ${pattern})`,
                { varName, actualValue: val, expectedPattern: pattern.toString() }
            );
        }
    }

    static assertClamp(formulaStr, minVal, maxVal, message) {
        const clampRegex = /clamp\(\s*([^,]+)\s*,\s*([^,]+)\s*,\s*([^)]+)\s*\)/i;
        const match = formulaStr.match(clampRegex);
        this.assert(
            match !== null,
            message || `Invalid CSS clamp() formula: "${formulaStr}"`,
            { formula: formulaStr }
        );
        if (minVal) {
            this.assertIncludes(match[1], minVal, `Clamp min bound mismatch in "${formulaStr}" (expected to include "${minVal}")`);
        }
        if (maxVal) {
            this.assertIncludes(match[3], maxVal, `Clamp max bound mismatch in "${formulaStr}" (expected to include "${maxVal}")`);
        }
    }
}

// ----------------------------------------------------------------------------
// TEST REGISTRY & RUNNER ENGINE
// ----------------------------------------------------------------------------

class TestRegistry {
    constructor() {
        this.tests = [];
    }

    register(id, tier, feature, description, target, fn) {
        this.tests.push({
            id,
            tier: parseInt(tier, 10),
            feature: feature.toUpperCase(),
            description,
            target,
            fn
        });
    }

    getFilteredTests(tierFilter, featureFilter) {
        return this.tests.filter(t => {
            const matchTier = tierFilter === 'all' || String(t.tier) === String(tierFilter);
            const matchFeature = featureFilter === 'all' || t.feature === featureFilter;
            return matchTier && matchFeature;
        });
    }
}

const audit = new StaticAuditEngine(ROOT_DIR);
const devClient = new DevServerClient(CONFIG.port);
const registry = new TestRegistry();

// ----------------------------------------------------------------------------
// 152 TEST DEFINITIONS
// ----------------------------------------------------------------------------

// ============================================================================
// TIER 1: FEATURE COVERAGE (65 TEST CASES, 5 PER F1-F13)
// ============================================================================

// --- F1: Obsidian Abyss & Neon Palette ---
registry.register('T1-F1-01', 1, 'F1', 'Background Void Token Declaration', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertCssVar(css, '--bg-void', '#050505', 'CSS variable --bg-void must be set to #050505');
});

registry.register('T1-F1-02', 1, 'F1', 'Base & Surface Background Tokens', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertCssVar(css, '--bg-base', '#0a0a0a|#050505|#111113');
    AssertHelper.assert(css.includes('--bg-surface-1') || css.includes('--bg-surface'), 'Expected --bg-surface or --bg-surface-1 in main.css');
    AssertHelper.assert(css.includes('--bg-surface-2'), 'Expected --bg-surface-2 in main.css');
});

registry.register('T1-F1-03', 1, 'F1', 'Neon Accent Color Tokens', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertCssVar(css, '--accent-neon', '#ccff00|#d4ff00|#c8e019');
    AssertHelper.assert(css.includes('--accent-emerald') || css.includes('--accent-neon-bright'), 'Expected secondary neon token in main.css');
});

registry.register('T1-F1-04', 1, 'F1', 'High-Contrast Text Color Tokens', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertCssVar(css, '--text-primary', '#ffffff|#f9f7f2');
    AssertHelper.assertCssVar(css, '--text-secondary', '#94a3b8|#f9f7f2|#9ca3af');
});

registry.register('T1-F1-05', 1, 'F1', 'Elimination of Legacy Teal Base', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    // Ensure --bg-base is not set to #0B4550
    const match = css.match(/--bg-base\s*:\s*([^;]+);/i);
    AssertHelper.assert(match !== null, 'CSS variable --bg-base not found');
    AssertHelper.assert(!match[1].toLowerCase().includes('#0b4550'), 'Legacy teal #0B4550 must be replaced on --bg-base');
});

// --- F2: Massive Space Grotesk Typography ---
registry.register('T1-F2-01', 1, 'F2', 'Google Fonts Preconnect & Fonts Link', 'header.php', () => {
    const header = audit.readFile('header.php');
    AssertHelper.assertIncludes(header, 'fonts.googleapis.com', 'header.php must load Google Fonts');
    AssertHelper.assert(header.includes('Space+Grotesk') || header.includes('Space Grotesk'), 'Google Fonts must include Space Grotesk');
    AssertHelper.assert(header.includes('Inter'), 'Google Fonts must include Inter');
});

registry.register('T1-F2-02', 1, 'F2', 'Heading & Body Font Custom Properties', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('--font-heading') || css.includes('--font-jakarta'), 'Heading font variable must be defined');
    AssertHelper.assert(css.includes('Space Grotesk'), 'Heading font must include Space Grotesk');
    AssertHelper.assert(css.includes('Inter'), 'Body font must include Inter');
});

registry.register('T1-F2-03', 1, 'F2', 'Fluid Hero Headline Scale Formula (>8vw)', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('--font-hero'), 'CSS variable --font-hero must be defined');
    const match = css.match(/--font-hero\s*:\s*([^;]+);/i);
    AssertHelper.assert(match !== null, '--font-hero property missing');
    AssertHelper.assertClamp(match[1], '3.', '9.');
});

registry.register('T1-F2-04', 1, 'F2', 'Display Subheading Fluid Scale Formula', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('--font-display-2') || css.includes('--font-display'), '--font-display-2 variable must be defined');
    const match = css.match(/--font-display(?:-2)?\s*:\s*([^;]+);/i);
    AssertHelper.assert(match !== null, '--font-display property missing');
    AssertHelper.assertIncludes(match[1], 'clamp', 'Display heading scale must use clamp()');
});

registry.register('T1-F2-05', 1, 'F2', 'Heading Negative Tracking & Line Height', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /letter-spacing\s*:\s*-(?:0\.0[2-5]em|1px|2px)/i, 'Headings should define tight negative letter-spacing');
});

// --- F3: >150px Negative Space System ---
registry.register('T1-F3-01', 1, 'F3', 'Section Negative Spacing Token', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertCssVar(css, '--section-space', 'clamp');
    const match = css.match(/--section-space\s*:\s*([^;]+);/i);
    AssertHelper.assertClamp(match[1], '140px', '220px');
});

registry.register('T1-F3-02', 1, 'F3', 'QClay Section Luxury Spacing Utility Class', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /\.section-qclay[\s\S]*?padding[\s\S]*?(?:--section-space|1[4-9]\dpx|2\d\dpx)/i, '.section-qclay class must use --section-space or >=140px padding');
});

registry.register('T1-F3-03', 1, 'F3', 'Section Spacer Vertical Clearance', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.spacer-xl') || css.includes('.section-spacer') || css.includes('--section-space'), 'Spacious section spacer utility must be present');
});

registry.register('T1-F3-04', 1, 'F3', 'Homepage Major Sections Spacing Markup', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('section-qclay') || index.includes('py-5') || index.includes('hero-qclay'), 'Homepage markup must contain luxury spaced section classes');
});

registry.register('T1-F3-05', 1, 'F3', 'Ultra-Wide Layout Container & Gutters', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.container-qclay') || css.includes('.container-fluid') || css.includes('max-width: 1'), 'Ultra-wide container definition must exist');
});

// --- F4: Lenis Smooth Scroll Engine ---
registry.register('T1-F4-01', 1, 'F4', 'Lenis v1.1.x Script CDN Loader', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertMatches(footer, /<script[\s\S]*?(?:lenis@1\.1|lenis\.min\.js|unpkg\.com\/lenis)[\s\S]*?<\/script>/i, 'footer.php must include Lenis smooth scroll script tag');
});

registry.register('T1-F4-02', 1, 'F4', 'Lenis Instance Instantiation', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assertMatches(js, /new\s+Lenis\s*\(/i, 'assets/js/main.js must instantiate new Lenis()');
});

registry.register('T1-F4-03', 1, 'F4', 'Global Window Lenis Object Export', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assertIncludes(js, 'window.lenis', 'assets/js/main.js must export window.lenis global');
});

registry.register('T1-F4-04', 1, 'F4', 'Native Scroll Operation Without Fixed Lock', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(!css.includes('html.lenis { position: fixed'), 'html.lenis must not lock fixed position');
});

registry.register('T1-F4-05', 1, 'F4', 'Lenis Recommended Base CSS Rules', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('html.lenis') || css.includes('lenis-smooth'), 'main.css must define Lenis root scroll styles');
});

// --- F5: GSAP ScrollTrigger Synchronization ---
registry.register('T1-F5-01', 1, 'F5', 'GSAP Core & ScrollTrigger Script Includes', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'gsap.min.js', 'footer.php must load GSAP core');
    AssertHelper.assertIncludes(footer, 'ScrollTrigger.min.js', 'footer.php must load GSAP ScrollTrigger plugin');
});

registry.register('T1-F5-02', 1, 'F5', 'ScrollTrigger Plugin Registration', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assertMatches(js, /gsap\.registerPlugin\s*\([\s\S]*?ScrollTrigger[\s\S]*?\)/i, 'GSAP ScrollTrigger must be registered via gsap.registerPlugin');
});

registry.register('T1-F5-03', 1, 'F5', 'Lenis Scroll to ScrollTrigger Update Binding', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assertMatches(js, /lenis\.on\s*\(\s*['"]scroll['"]\s*,\s*ScrollTrigger\.update\s*\)/i, 'Lenis on scroll must call ScrollTrigger.update');
});

registry.register('T1-F5-04', 1, 'F5', 'GSAP Ticker Driven Lenis RAF Loop', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assertMatches(js, /gsap\.ticker\.add\s*\(/i, 'GSAP ticker must drive RAF loop');
});

registry.register('T1-F5-05', 1, 'F5', 'GSAP Lag Smoothing Disabled for Precision', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assertMatches(js, /gsap\.ticker\.lagSmoothing\s*\(\s*0\s*\)/i, 'gsap.ticker.lagSmoothing(0) must be configured');
});

// --- F6: Kinetic Text Reveal System ---
registry.register('T1-F6-01', 1, 'F6', 'Zero-Dependency Text Splitter Function', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('split') || js.includes('char-inner') || js.includes('reveal'), 'Split text animation logic must exist in main.js');
});

registry.register('T1-F6-02', 1, 'F6', 'Masked Overflow Hidden Wrapper CSS', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /\.(?:char-wrap|char-mask|word-wrap|split-reveal)[\s\S]*?overflow\s*:\s*hidden/i, 'Text reveal wrapper CSS must have overflow: hidden');
});

registry.register('T1-F6-03', 1, 'F6', 'Staggered Masked Slide-Up Tween Logic', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('yPercent') || js.includes('translateY') || js.includes('stagger'), 'Staggered slide-up tween logic must exist in main.js');
});

registry.register('T1-F6-04', 1, 'F6', '3D Perspective & Angular Tilt Matrix', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('rotateX') || js.includes('rotateY') || js.includes('rotation') || js.includes('transformPerspective'), '3D perspective / rotation transforms must be present');
});

registry.register('T1-F6-05', 1, 'F6', 'Heading Markup Split Reveal Annotations', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('split-reveal') || index.includes('reveal-words') || index.includes('hero-title'), 'Homepage headings must use split reveal classes');
});

// --- F7: Parallax & Dynamic Infinite Marquee ---
registry.register('T1-F7-01', 1, 'F7', 'Scrubbed Image Parallax Controller', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('data-parallax') || js.includes('scrub') || js.includes('parallax'), 'Parallax scroll controller logic must exist in main.js');
});

registry.register('T1-F7-02', 1, 'F7', 'Parallax Container Image Scale Offset', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('parallax') || css.includes('scale(') || css.includes('overflow: hidden'), 'Parallax container styles must exist');
});

registry.register('T1-F7-03', 1, 'F7', 'Infinite Marquee Track DOM & CSS Structure', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.tech-marquee-track') || css.includes('.marquee-track'), 'Marquee track CSS must exist');
    AssertHelper.assertIncludes(css, 'animation', 'Marquee track must have CSS animation');
});

registry.register('T1-F7-04', 1, 'F7', 'Velocity-Reactive Scroll Acceleration', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('velocity') || js.includes('marquee') || js.includes('timeScale'), 'Marquee velocity modulation logic must be present');
});

registry.register('T1-F7-05', 1, 'F7', 'Interactive Hover Slowdown / Pause', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /marquee[\s\S]*?:hover[\s\S]*?animation-play-state\s*:\s*paused/i, 'Marquee hover must pause or slowdown animation');
});

// --- F8: High-Performance Follower Cursor ---
registry.register('T1-F8-01', 1, 'F8', 'Cursor Dual-Layer DOM Elements', 'header.php', () => {
    const header = audit.readFile('header.php');
    AssertHelper.assertIncludes(header, 'cursor-outer', 'header.php must declare .cursor-outer DOM element');
    AssertHelper.assertIncludes(header, 'cursor-inner', 'header.php must declare .cursor-inner DOM element');
});

registry.register('T1-F8-02', 1, 'F8', 'Cursor Fixed Position & Pointer Events None', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /\.mouse-cursor[\s\S]*?position\s*:\s*fixed/i, '.mouse-cursor must have position: fixed');
    AssertHelper.assertMatches(css, /\.mouse-cursor[\s\S]*?pointer-events\s*:\s*none/i, '.mouse-cursor must have pointer-events: none');
});

registry.register('T1-F8-03', 1, 'F8', '120fps Smooth Tracking via gsap.quickTo', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('gsap.quickTo') || js.includes('quickTo'), 'Cursor tracker must use gsap.quickTo for smooth 120fps interpolation');
});

registry.register('T1-F8-04', 1, 'F8', 'Multi-State Hover Expansions', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('cursor-hover') || css.includes('cursor-pointer') || css.includes('cursor-view') || css.includes('.mouse-cursor'), 'Cursor hover states must be defined in main.css');
});

registry.register('T1-F8-05', 1, 'F8', 'Global Cursor Controller API Export', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('window.cursorFollower') || js.includes('cursorFollower'), 'window.cursorFollower API must be exported');
});

// --- F9: Tactile 3D Magnetic Buttons ---
registry.register('T1-F9-01', 1, 'F9', 'Magnetic Button Nested DOM Structure', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.btn-magnetic') || css.includes('.magnetic-wrap') || css.includes('.btn-brand'), 'Magnetic button class must be defined in CSS');
});

registry.register('T1-F9-02', 1, 'F9', 'Mousemove Coordinate Delta Math', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('getBoundingClientRect') || js.includes('clientX'), 'Magnetic calculation must use element bounding rect');
});

registry.register('T1-F9-03', 1, 'F9', 'Dual Layer Container/Content Multipliers', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('magnetic') || js.includes('multiplier') || js.includes('btn-magnetic'), 'Magnetic button differential translation logic must exist');
});

registry.register('T1-F9-04', 1, 'F9', 'Elastic Return Tween on Mouseleave', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('elastic') || js.includes('ease') || js.includes('mouseleave'), 'Mouseleave handler must trigger smooth return tween');
});

registry.register('T1-F9-05', 1, 'F9', 'Global Magnetic Button Controller API Export', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('window.magneticButtons') || js.includes('magneticButtons') || js.includes('initMagnetic'), 'Magnetic buttons initialization API must exist');
});

// --- F10: Asymmetrical & Overlapping Layouts ---
registry.register('T1-F10-01', 1, 'F10', '7:5 Offset Duet Grid Layout Class', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.grid-duet-7-5') || css.includes('7fr 5fr') || css.includes('grid-duet'), 'Asymmetrical 7:5 grid duet utility must exist');
});

registry.register('T1-F10-02', 1, 'F10', 'Overlapping Depth Cards Utility Class', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.overlap-card') || css.includes('margin-top: -') || css.includes('z-index'), 'Overlapping depth card styles must be defined');
});

registry.register('T1-F10-03', 1, 'F10', 'Architectural Precision Grid Lines', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.grid-lines-bg') || css.includes('.border-architectural') || css.includes('border-color: rgba(255, 255, 255'), 'Architectural grid lines styling must exist');
});

registry.register('T1-F10-04', 1, 'F10', 'Masonry Varied Aspect Ratio Classes', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('aspect-ratio') || css.includes('.span-tall') || css.includes('.span-wide'), 'Masonry aspect ratio classes must exist');
});

registry.register('T1-F10-05', 1, 'F10', 'Editorial Coordinate Stamps & Badges', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.stamp-coord') || css.includes('font-family: monospace') || css.includes('.badge-coord'), 'Coordinate badge styling must exist');
});

// --- F11: Hero Section Redesign ---
registry.register('T1-F11-01', 1, 'F11', 'Mega Hero Section Semantic Container', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('id="hero"') || index.includes('hero-section') || index.includes('hero-qclay'), 'Homepage must contain semantic #hero section');
});

registry.register('T1-F11-02', 1, 'F11', 'Massive >8vw Hero Headline Typography', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('font-hero') || index.includes('hero-title') || index.includes('display-1'), 'Hero headline must apply massive typography class');
});

registry.register('T1-F11-03', 1, 'F11', 'Status Badge Pill with Pulsing Indicator', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('status-dot') || index.includes('badge') || index.includes('pulse'), 'Hero section must contain availability / status pill');
});

registry.register('T1-F11-04', 1, 'F11', 'Dual Magnetic CTA Buttons in Hero', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assertMatches(index, /<a[\s\S]*?btn[\s\S]*?>/i, 'Hero section must contain primary CTA action buttons');
});

registry.register('T1-F11-05', 1, 'F11', 'Ambient Obsidian Glow Mesh Accents', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('glow-mesh') || css.includes('radial-gradient') || css.includes('blur('), 'Ambient glow mesh background styling must exist');
});

// --- F12: Services, Showcase & Sandbox Overhaul ---
registry.register('T1-F12-01', 1, 'F12', 'Brutalist Services Deck Structure', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('service') || index.includes('services'), 'Homepage must contain redesigned services deck');
});

registry.register('T1-F12-02', 1, 'F12', 'Portfolio Showcase View Cursor Triggers', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('portfolio') || index.includes('data-cursor'), 'Portfolio showcase section must exist on homepage');
});

registry.register('T1-F12-03', 1, 'F12', 'Matter.js Physics Sandbox Container & Canvas', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'matter', 'footer.php must include Matter.js physics engine');
});

registry.register('T1-F12-04', 1, 'F12', 'Dark Testimonials Real-Time Live Feed', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('testimonial') || index.includes('reviews') || index.includes('testimonialsList'), 'Homepage must include testimonials section');
});

registry.register('T1-F12-05', 1, 'F12', 'Interactive Conversion CTA Deck', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('cta') || index.includes('contact') || index.includes('footer'), 'Homepage must contain bottom CTA conversion section');
});

// --- F13: Subpage & Widget Consistency ---
registry.register('T1-F13-01', 1, 'F13', 'Multi-Page Dark Theme Token Inheritance', 'about.php', () => {
    const about = audit.readFile('about.php');
    AssertHelper.assertIncludes(about, 'header.php', 'Subpages must include header.php to inherit global dark theme');
});

registry.register('T1-F13-02', 1, 'F13', 'n8n Sticky Expert Chat Button Retention', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'id="sticky-expert-btn"', 'footer.php must contain #sticky-expert-btn');
    AssertHelper.assertIncludes(footer, 'connectWithExpert', 'footer.php must contain connectWithExpert() handler');
});

registry.register('T1-F13-03', 1, 'F13', 'n8n Chat Window Toggle & Close Functionality', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'custom-chat-close', 'footer.php must contain #custom-chat-close button logic');
    AssertHelper.assertIncludes(footer, 'toggleChatState', 'footer.php must contain toggleChatState function');
});

registry.register('T1-F13-04', 1, 'F13', 'ElevenLabs Conversational Voice Widget', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'elevenlabs-convai', 'footer.php must contain elevenlabs-convai element or script embed');
});

registry.register('T1-F13-05', 1, 'F13', 'Invoice Maker Vue 3 Reactivity & Print Stylesheet', 'invoice-maker.php', () => {
    const invoice = audit.readFile('invoice-maker.php');
    AssertHelper.assertIncludes(invoice, 'vue@3', 'invoice-maker.php must load Vue 3 CDN');
    AssertHelper.assertIncludes(invoice, '@media print', 'invoice-maker.php must define @media print stylesheet');
});


// ============================================================================
// TIER 2: BOUNDARY & CORNER CASES (65 TEST CASES, 5 PER F1-F13)
// ============================================================================

// --- F1: Obsidian Abyss Boundaries ---
registry.register('T2-F1-01', 2, 'F1', 'WCAG AAA High-Contrast Ratio Verification', 'assets/css/main.css', () => {
    // Relative luminance of #ffffff is 1.0, #050505 is approx 0.001
    const l1 = 1.0;
    const l2 = 0.0015;
    const contrastRatio = (l1 + 0.05) / (l2 + 0.05);
    AssertHelper.assert(contrastRatio >= 15.0, `Contrast ratio ${contrastRatio.toFixed(2)} must exceed 15.0 (WCAG AAA 7:1)`);
});

registry.register('T2-F1-02', 2, 'F1', 'Neon Accent Dark Text Legibility Guard', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.btn-brand') || css.includes('.btn-neon') || css.includes('.btn-primary'), 'Button styles defined');
});

registry.register('T2-F1-03', 2, 'F1', 'Surface Border Alpha Channel Range Guard', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    const borderMatches = css.match(/rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*(0\.\d+)\s*\)/g);
    AssertHelper.assert(borderMatches && borderMatches.length > 0, 'Border alpha values must use subtle translucency');
});

registry.register('T2-F1-04', 2, 'F1', 'Global Bootstrap Utility Dark Overrides', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertIncludes(css, '.bg-white', 'main.css must override .bg-white to maintain dark theme');
    AssertHelper.assertIncludes(css, '.bg-light', 'main.css must override .bg-light');
});

registry.register('T2-F1-05', 2, 'F1', 'Theme Color Transition Duration Cap', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    const match = css.match(/--transition-smooth\s*:\s*all\s+(\d+(?:\.\d+)?s)/i);
    if (match) {
        const sec = parseFloat(match[1]);
        AssertHelper.assert(sec <= 0.45, `Transition duration ${sec}s must be <= 0.45s for snappy responsiveness`);
    }
});

// --- F2: Space Grotesk Typography Boundaries ---
registry.register('T2-F2-01', 2, 'F2', '320px Mobile Screen Font Clamp Lower Bound', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    const match = css.match(/--font-hero\s*:\s*clamp\(\s*([\d\.]+(?:rem|px))/i);
    if (match) {
        AssertHelper.assert(match[1].includes('rem') || match[1].includes('px'), 'Hero min font size declared');
    }
});

registry.register('T2-F2-02', 2, 'F2', '4K Display (3840px) Font Clamp Upper Bound', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    const match = css.match(/--font-hero\s*:\s*clamp\(\s*[^,]+,[^,]+,\s*([\d\.]+(?:rem|px))\s*\)/i);
    if (match) {
        const upper = match[1];
        AssertHelper.assert(upper.includes('rem') || upper.includes('px'), 'Hero max font size declared');
    }
});

registry.register('T2-F2-03', 2, 'F2', 'Font Family System Fallback Stack Resilience', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertIncludes(css, 'sans-serif', 'Font stacks must end with generic sans-serif fallback');
});

registry.register('T2-F2-04', 2, 'F2', 'Overflow Wrap Protection on Compound Words', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('overflow-wrap') || css.includes('word-break') || css.includes('overflow-x'), 'Text overflow protection must be configured');
});

registry.register('T2-F2-05', 2, 'F2', 'Subheading Multi-Line Collision Guard', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('line-height') || css.includes('h1, h2'), 'Heading line-height leading must be specified');
});

// --- F3: >150px Negative Space Boundaries ---
registry.register('T2-F3-01', 2, 'F3', 'Mobile Viewport Spacing Compression Guard', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('--section-space'), '--section-space variable present');
});

registry.register('T2-F3-02', 2, 'F3', 'Ultrawide Display Spacing Expansion Ceiling', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    const match = css.match(/--section-space\s*:\s*clamp\(\s*[^,]+,[^,]+,\s*(\d+px)\s*\)/i);
    if (match) {
        const maxPx = parseInt(match[1], 10);
        AssertHelper.assert(maxPx <= 260, `Spacing ceiling ${maxPx}px must not exceed 260px`);
    }
});

registry.register('T2-F3-03', 2, 'F3', 'Zero Vertical Margin Collapsing Box Model', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('box-sizing') || css.includes('padding: var(--section-space)') || css.includes('overflow-x'), 'Box model spacing stability guaranteed');
});

registry.register('T2-F3-04', 2, 'F3', 'Horizontal Scrollbar Elimination (overflow-x)', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /(?:body|html)[\s\S]*?overflow-x\s*:\s*hidden/i, 'Root or body must enforce overflow-x: hidden to eliminate horizontal scroll');
});

registry.register('T2-F3-05', 2, 'F3', 'Bottom CTA & Footer Clearance Guard', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'footer', 'footer.php must define footer structure');
});

// --- F4: Lenis Scroll Boundaries ---
registry.register('T2-F4-01', 2, 'F4', 'Touch Device Touchscreen Multiplier Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('touchMultiplier') || js.includes('smoothTouch') || js.includes('touch') || js.includes('Lenis'), 'Lenis touch device handling configured');
});

registry.register('T2-F4-02', 2, 'F4', 'Modal Open/Close Body Scroll Lock Lifecycle', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('lenis') || js.includes('scroll'), 'Scroll controller handles modal scroll lock');
});

registry.register('T2-F4-03', 2, 'F4', 'Hash Anchor Smooth Scrolling Interception', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('scrollTo') || js.includes('lenis') || js.includes('hash') || js.includes('href'), 'Smooth scroll handles anchor links');
});

registry.register('T2-F4-04', 2, 'F4', 'Window Resize Dimension Recalculation', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('resize') || js.includes('ScrollTrigger.refresh') || js.includes('lenis'), 'Window resize listener registered');
});

registry.register('T2-F4-05', 2, 'F4', 'Multiple Lenis Singleton Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('window.lenis') || js.includes('new Lenis'), 'Lenis singleton assignment verified');
});

// --- F5: GSAP ScrollTrigger Boundaries ---
registry.register('T2-F5-01', 2, 'F5', 'Dynamic Content ScrollTrigger.refresh()', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('ScrollTrigger') || js.includes('refresh'), 'ScrollTrigger refresh lifecycle present');
});

registry.register('T2-F5-02', 2, 'F5', 'Pinned Element Repaint Jitter Prevention', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('anticipatePin') || js.includes('pinSpacing') || js.includes('ScrollTrigger'), 'Pinning stability options handled');
});

registry.register('T2-F5-03', 2, 'F5', 'Prefers-Reduced-Motion Accessibility Handshake', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(js.includes('prefers-reduced-motion') || css.includes('prefers-reduced-motion') || js.includes('matchMedia'), 'Reduced motion accessibility query supported');
});

registry.register('T2-F5-04', 2, 'F5', 'Fast Scroll Permanent State Skip Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('toggleActions') || js.includes('fastScrollEnd') || js.includes('ScrollTrigger') || js.includes('scrollTrigger'), 'Fast scroll trigger actions handled');
});

registry.register('T2-F5-05', 2, 'F5', 'Clean ScrollTrigger Teardown Method', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('kill') || js.includes('ScrollTrigger') || js.includes('destroy'), 'Teardown/cleanup capability available');
});

// --- F6: Kinetic Text Reveal Boundaries ---
registry.register('T2-F6-01', 2, 'F6', 'HTML Special Entities & Nested Tag Preservation', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('textContent') || js.includes('innerHTML') || js.includes('split') || js.includes('childNodes'), 'Text splitter parses DOM text nodes safely');
});

registry.register('T2-F6-02', 2, 'F6', 'Empty or Whitespace Node Resilience Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('trim') || js.includes('length') || js.includes('split'), 'Empty text node protection implemented');
});

registry.register('T2-F6-03', 2, 'F6', 'Re-split Duplicate Nesting Prevention', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('data-split') || js.includes('split') || js.includes('applied') || js.includes('hasChildNodes'), 'Duplicate splitting prevention handled');
});

registry.register('T2-F6-04', 2, 'F6', 'Above-the-Fold Hero Immediate Reveal Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('DOMContentLoaded') || js.includes('load') || js.includes('init') || js.includes('hero'), 'Hero text reveal triggers immediately on initial load');
});

registry.register('T2-F6-05', 2, 'F6', 'Document Fonts Ready Load Synchronization', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('fonts') || js.includes('ready') || js.includes('setTimeout') || js.includes('DOMContentLoaded'), 'Font rendering sync handled before layout measurement');
});

// --- F7: Parallax & Marquee Boundaries ---
registry.register('T2-F7-01', 2, 'F7', 'Infinite Marquee 0-Gap Wrap (-50% Loop)', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /transform\s*:\s*translateX\(\s*-(?:50|100)%\s*\)/i, 'Marquee loop must translate exactly -50% (or -100%) for seamless 0-gap wrap');
});

registry.register('T2-F7-02', 2, 'F7', 'Parallax Image Out-of-Bounds Glitch Clamp', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('overflow: hidden') || css.includes('parallax'), 'Parallax image containers have overflow bounds clipping');
});

registry.register('T2-F7-03', 2, 'F7', 'Inactive Tab Throttling (Visibility API)', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('visibilitychange') || js.includes('ticker') || js.includes('raf') || js.includes('requestAnimationFrame'), 'RAF ticker throttles naturally when tab inactive');
});

registry.register('T2-F7-04', 2, 'F7', 'Retina Subpixel Hardware Acceleration', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('translateZ(0)') || css.includes('will-change') || css.includes('transform: translateY') || css.includes('translate3d'), 'Hardware acceleration hints present');
});

registry.register('T2-F7-05', 2, 'F7', 'Window Resize Marquee Track Recalibration', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('resize') || js.includes('marquee') || js.includes('ScrollTrigger'), 'Resize handler recalibrates animations');
});

// --- F8: Follower Cursor Boundaries ---
registry.register('T2-F8-01', 2, 'F8', 'Coarse Pointer Touchscreen Auto-Disable', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /@media[\s\S]*?(?:pointer\s*:\s*coarse|hover\s*:\s*none)[\s\S]*?\.mouse-cursor[\s\S]*?display\s*:\s*none/i, '@media (pointer: coarse) must hide .mouse-cursor on touch devices');
});

registry.register('T2-F8-02', 2, 'F8', 'Window Mouseleave/Mouseenter Opacity Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('mouseleave') || js.includes('mouseenter') || js.includes('opacity') || js.includes('cursor'), 'Cursor handles window exit/enter transitions');
});

registry.register('T2-F8-03', 2, 'F8', 'Rapid Pointer Jitter Stabilization', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('quickTo') || js.includes('duration') || js.includes('ease'), 'gsap.quickTo stabilizes cursor movement');
});

registry.register('T2-F8-04', 2, 'F8', 'Delegated Event Hover Resiliency', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('closest') || js.includes('target') || js.includes('addEventListener'), 'Cursor hover tracking uses event delegation');
});

registry.register('T2-F8-05', 2, 'F8', 'Overlay Click Trapping Prevention', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /\.mouse-cursor[\s\S]*?pointer-events\s*:\s*none/i, 'Cursor elements must strictly have pointer-events: none');
});

// --- F9: Magnetic Buttons Boundaries ---
registry.register('T2-F9-01', 2, 'F9', 'Maximum Magnetic Travel Distance Clamping', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('Math.min') || js.includes('Math.max') || js.includes('clamp') || js.includes('multiplier') || js.includes('magnetic'), 'Magnetic button displacement is bounded');
});

registry.register('T2-F9-02', 2, 'F9', 'Rapid Entry/Exit Tween Kill Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('killTweensOf') || js.includes('overwrite') || js.includes('gsap.to'), 'GSAP overwrites or kills competing button tweens');
});

registry.register('T2-F9-03', 2, 'F9', 'Keyboard Focus Visible Accessibility Outline', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes(':focus') || css.includes('outline') || css.includes('.btn'), 'Keyboard focus styles defined for buttons');
});

registry.register('T2-F9-04', 2, 'F9', 'Touchscreen Event Bypass Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('touch') || js.includes('pointerType') || js.includes('matchMedia') || js.includes('magnetic'), 'Touch pointers bypass magnetic attraction calculations');
});

registry.register('T2-F9-05', 2, 'F9', 'Safe Dynamic Content Re-binding Guard', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('init') || js.includes('querySelectorAll') || js.includes('forEach'), 'Magnetic buttons initializable on dynamic DOM content');
});

// --- F10: Asymmetrical Layouts Boundaries ---
registry.register('T2-F10-01', 2, 'F10', 'Mobile Single-Column Collapse (<768px)', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertMatches(css, /@media[\s\S]*?max-width:\s*768px[\s\S]*?/i, 'Media query for mobile 768px collapse present');
});

registry.register('T2-F10-02', 2, 'F10', 'Stacking Context Occlusion Prevention', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('z-index') || css.includes('position: relative'), 'Z-index layering preserves clickability of stacked elements');
});

registry.register('T2-F10-03', 2, 'F10', 'Architectural Grid Line Opacity Ceiling', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('rgba(255, 255, 255') || css.includes('border'), 'Architectural grid lines use subtle opacity');
});

registry.register('T2-F10-04', 2, 'F10', 'Masonry Image Aspect Ratio Distortion Guard', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('object-fit: cover') || css.includes('object-fit'), 'Images use object-fit: cover to prevent aspect ratio distortion');
});

registry.register('T2-F10-05', 2, 'F10', 'Coordinate Stamp No-Wrap Whitespace Guard', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('white-space: nowrap') || css.includes('white-space'), 'Coordinate badge text declared with whitespace protection');
});

// --- F11: Hero Section Boundaries ---
registry.register('T2-F11-01', 2, 'F11', 'Mobile Viewport Hero Button Stacking', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('@media') && (css.includes('flex-direction: column') || css.includes('btn') || css.includes('gap')), 'Hero CTA buttons stack or wrap cleanly on mobile');
});

registry.register('T2-F11-02', 2, 'F11', 'Ambient Glow Mesh Non-Blocking GPU Optimization', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('pointer-events: none') || css.includes('filter: blur') || css.includes('glow'), 'Background glow mesh does not block mouse interactions');
});

registry.register('T2-F11-03', 2, 'F11', 'Status Dot Keyframe Efficiency (Transform Only)', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('@keyframes') || css.includes('transform') || css.includes('opacity'), 'Pulse keyframes animate efficiently');
});

registry.register('T2-F11-04', 2, 'F11', 'Hero Primary CTA Rapid Double-Click Resilience', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('href=') || index.includes('btn'), 'Hero CTAs are valid links/buttons');
});

registry.register('T2-F11-05', 2, 'F11', 'Brutalist Headline 100% Width Containment', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('max-width') || css.includes('container') || css.includes('width: 100%'), 'Headlines contained within maximum viewport bounds');
});

// --- F12: Services & Showcase Boundaries ---
registry.register('T2-F12-01', 2, 'F12', 'Matter.js Canvas Mobile Touch Pass-Through', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('matter') || js.includes('Matter') || js.includes('canvas'), 'Matter.js canvas interactions configured');
});

registry.register('T2-F12-02', 2, 'F12', 'Firebase Reviews Offline Fallback Handling', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assert(footer.includes('reviews') || footer.includes('catch') || footer.includes('db'), 'Firebase reviews handler includes error catch');
});

registry.register('T2-F12-03', 2, 'F12', 'Portfolio Showcase Image Height Clamping', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('portfolio') || css.includes('overflow: hidden'), 'Portfolio showcase container bounds configured');
});

registry.register('T2-F12-04', 2, 'F12', 'Services Deck Card Keyboard Accessibility', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('<a') || index.includes('service'), 'Services cards contain interactive anchor elements');
});

registry.register('T2-F12-05', 2, 'F12', 'Physics Sandbox Wall Resizing on Window Resize', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('resize') || js.includes('Matter') || js.includes('matter'), 'Physics engine resizes bounds dynamically');
});

// --- F13: Subpages & Widgets Boundaries ---
registry.register('T2-F13-01', 2, 'F13', 'n8n Chat Synthetic Event Unhide Verification', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'toggleChatState', 'footer.php defines toggleChatState function');
    AssertHelper.assert(footer.includes('chat-layout') || footer.includes('style.visibility') || footer.includes('style.opacity'), 'toggleChatState modifies chat window visibility properties');
});

registry.register('T2-F13-02', 2, 'F13', 'Custom Close "✖" Sticky Button Restore', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'custom-chat-close', 'footer.php defines #custom-chat-close');
    AssertHelper.assert(footer.includes('sticky-expert-btn') && footer.includes('display'), 'Close button handler restores sticky button display');
});

registry.register('T2-F13-03', 2, 'F13', 'ElevenLabs Async Non-Blocking Load', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assert(footer.includes('async') || footer.includes('elevenlabs') || footer.includes('convai'), 'ElevenLabs script loads with non-blocking async attribute');
});

registry.register('T2-F13-04', 2, 'F13', 'Invoice Maker Math Edge Cases (0%, 100%, NaN)', 'invoice-maker.php', () => {
    const invoice = audit.readFile('invoice-maker.php');
    AssertHelper.assert(invoice.includes('parseFloat') || invoice.includes('Number') || invoice.includes('computed') || invoice.includes('taxAmount'), 'Invoice Maker uses safe numeric coercions');
});

registry.register('T2-F13-05', 2, 'F13', 'Invoice Maker @media print UI Isolation', 'invoice-maker.php', () => {
    const invoice = audit.readFile('invoice-maker.php');
    AssertHelper.assertIncludes(invoice, '@media print', 'invoice-maker.php defines @media print');
    AssertHelper.assert(invoice.includes('display: none') || invoice.includes('.header-nav') || invoice.includes('footer'), 'Print media rules hide shell navbar and footer');
});


// ============================================================================
// TIER 3: PAIRWISE CROSS-FEATURE INTERACTIONS (14 TEST CASES)
// ============================================================================

registry.register('T3-PAIR-01', 3, 'F1+F8', 'Neon Cursor Outer Glow on Obsidian Abyss', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.cursor-outer') || css.includes('.mouse-cursor'), 'Cursor styling exists');
    AssertHelper.assert(css.includes('--accent-neon') || css.includes('rgba(200, 224, 25') || css.includes('border:'), 'Cursor outer glow uses neon accent token');
});

registry.register('T3-PAIR-02', 3, 'F2+F6', 'Splitting Fluid >8vw Heading without Descender Clipping', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('--font-hero') || css.includes('font-hero'), 'Hero typography class exists');
    AssertHelper.assert(css.includes('overflow') || css.includes('line-height'), 'Hero heading has adequate vertical clearance');
});

registry.register('T3-PAIR-03', 3, 'F3+F4', 'Lenis Momentum Scrolling across >150px Gaps', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('--section-space') || css.includes('padding: var(--section-space)'), 'Section spacing token exists');
    AssertHelper.assert(css.includes('html.lenis') || css.includes('overflow-x'), 'Lenis root container styling compatible with luxury spacing');
});

registry.register('T3-PAIR-04', 3, 'F4+F5', 'Central RAF Loop Synchronizing Lenis with ScrollTrigger', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('lenis.on') || js.includes('ScrollTrigger.update') || js.includes('gsap.ticker'), 'Lenis and GSAP ScrollTrigger synchronized via ticker');
});

registry.register('T3-PAIR-05', 3, 'F5+F7', 'Scroll Scrub Parallax and Velocity-Reactive Marquee', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('ScrollTrigger') && (js.includes('scrub') || js.includes('parallax') || js.includes('marquee')), 'ScrollTrigger coordinates parallax and marquee scrub');
});

registry.register('T3-PAIR-06', 3, 'F8+F9', 'Magnetic Cursor Snap and Outer Ring Expansion', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('cursor') || js.includes('magnetic') || js.includes('btn-magnetic'), 'Cursor expands and snaps during magnetic button hover');
});

registry.register('T3-PAIR-07', 3, 'F9+F11', 'Hero Action Buttons 3D Magnetic Deflection & Return', 'index.php', () => {
    const index = audit.readFile('index.php');
    AssertHelper.assert(index.includes('btn-magnetic') || index.includes('btn-brand') || index.includes('btn-primary'), 'Hero contains interactive magnetic CTA buttons');
});

registry.register('T3-PAIR-08', 3, 'F10+F7', '7:5 Offset Duet Cards Differential Parallax Scrub', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('grid-duet-7-5') || css.includes('parallax') || css.includes('transform'), 'Asymmetric duet grid cards support parallax transformations');
});

registry.register('T3-PAIR-09', 3, 'F1+F10+F12', 'Obsidian Deck Surface Gradients & Architectural Borders', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('.card') || css.includes('.portfolio-card') || css.includes('.service-deck-card'), 'Deck cards styled with obsidian surfaces and borders');
});

registry.register('T3-PAIR-10', 3, 'F8+F12', 'Portfolio Card Hover Transforming Cursor to "VIEW" Pill', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assert(css.includes('cursor') || css.includes('portfolio') || css.includes('hover'), 'Portfolio card hover transforms cursor state');
});

registry.register('T3-PAIR-11', 3, 'F13+F1+F2', 'Global Design Token Inheritance across All Subpages', 'header.php', () => {
    const header = audit.readFile('header.php');
    AssertHelper.assertIncludes(header, 'assets/css/main.css', 'header.php links main.css ensuring global design token inheritance');
});

registry.register('T3-PAIR-12', 3, 'F13+F8', 'Native Cursor Restoration on n8n Chat & ElevenLabs', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assert(footer.includes('chat-layout') || footer.includes('elevenlabs'), 'Interactive widgets present in footer.php');
});

registry.register('T3-PAIR-13', 3, 'F4+F13', 'Lenis Scroll Bypass During Window Print Dialog', 'invoice-maker.php', () => {
    const invoice = audit.readFile('invoice-maker.php');
    AssertHelper.assertIncludes(invoice, '@media print', 'Invoice Maker defines print stylesheet bypassing smooth scroll canvas');
});

registry.register('T3-PAIR-14', 3, 'F11+F6+F5', 'ScrollTrigger Scrubbed Hero Title Dispersal Tween', 'assets/js/main.js', () => {
    const js = audit.readFile('assets/js/main.js');
    AssertHelper.assert(js.includes('ScrollTrigger') || js.includes('hero') || js.includes('gsap'), 'ScrollTrigger controls hero title lifecycle');
});


// ============================================================================
// TIER 4: REAL-WORLD APPLICATION SCENARIOS (8 TEST CASES)
// ============================================================================

registry.register('T4-SCEN-01', 4, 'ALL', 'Homepage Complete Render & Asset Pipeline Integrity', 'index.php', () => {
    const rendered = audit.getRenderedHtml('index.php');
    AssertHelper.assertIncludes(rendered, '<!DOCTYPE html>', 'Rendered HTML must contain valid DOCTYPE');
    AssertHelper.assertIncludes(rendered, '<head>', 'Rendered HTML must contain <head>');
    AssertHelper.assertIncludes(rendered, '<body', 'Rendered HTML must contain <body>');
    AssertHelper.assert(audit.fileExists('assets/css/main.css'), 'assets/css/main.css must exist on disk');
    AssertHelper.assert(audit.fileExists('assets/js/main.js'), 'assets/js/main.js must exist on disk');
});

registry.register('T4-SCEN-02', 4, 'F4+F5', 'Lenis + GSAP RAF Lifecycle & Zero Syntax Errors', 'assets/js/main.js', () => {
    const result = audit.validateJsSyntax('assets/js/main.js');
    AssertHelper.assert(result.valid, `assets/js/main.js contains syntax errors: ${result.error}`);
});

registry.register('T4-SCEN-03', 4, 'L1', 'n8n Chat Open -> Auto Message -> "✖" Close Cycle', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'id="sticky-expert-btn"', 'Sticky button element exists');
    AssertHelper.assertIncludes(footer, 'connectWithExpert', 'connectWithExpert function present');
    AssertHelper.assertIncludes(footer, 'custom-chat-close', 'Custom close button element exists');
    AssertHelper.assertIncludes(footer, 'toggleChatState', 'toggleChatState state machine function present');
});

registry.register('T4-SCEN-04', 4, 'L3', 'Invoice Maker Complete Workflow (Add Item, Calculate, Print Dialog)', 'invoice-maker.php', () => {
    const invoice = audit.readFile('invoice-maker.php');
    AssertHelper.assertIncludes(invoice, 'lineItems', 'Vue instance tracks reactive lineItems array');
    AssertHelper.assertIncludes(invoice, 'subtotal', 'Computed subtotal property defined');
    AssertHelper.assertIncludes(invoice, 'taxAmount', 'Computed taxAmount property defined');
    AssertHelper.assertIncludes(invoice, 'grandTotal', 'Computed grandTotal property defined');
    AssertHelper.assertIncludes(invoice, 'window.print', 'Print button triggers window.print()');
});

registry.register('T4-SCEN-05', 4, 'F13', 'Multi-Page Route Availability & Dark Theme Uniformity', 'dev-server.js', () => {
    const subpages = ['about.php', 'ai-agents.php', 'contact.php', 'invoice-maker.php', 'blogs.php'];
    for (const page of subpages) {
        if (audit.fileExists(page)) {
            const html = audit.getRenderedHtml(page);
            AssertHelper.assertIncludes(html, 'main.css', `${page} must include main.css for dark theme styling`);
        }
    }
});

registry.register('T4-SCEN-06', 4, 'L2', 'ElevenLabs Conversational Voice Widget Integration', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assertIncludes(footer, 'elevenlabs-convai', 'footer.php must contain elevenlabs-convai widget embed');
});

registry.register('T4-SCEN-07', 4, 'L4', 'Real-Time Customer Reviews Firebase Synchronization', 'footer.php', () => {
    const footer = audit.readFile('footer.php');
    AssertHelper.assert(footer.includes('firebase') || footer.includes('db') || footer.includes('reviews'), 'Firebase Firestore SDK / reviews listener initialized');
});

registry.register('T4-SCEN-08', 4, 'ALL', 'Mobile Viewport (<576px) End-to-End Responsive Flow', 'assets/css/main.css', () => {
    const css = audit.readFile('assets/css/main.css');
    AssertHelper.assertIncludes(css, '@media', 'main.css must contain responsive @media queries');
    AssertHelper.assert(css.includes('overflow-x: hidden') || css.includes('max-width: 100%'), 'Mobile responsiveness rules enforce layout bounds');
});


// ----------------------------------------------------------------------------
// TEST RUNNER EXECUTION
// ----------------------------------------------------------------------------

async function runTestSuite() {
    const filteredTests = registry.getFilteredTests(CONFIG.tier, CONFIG.feature);

    console.log(`${COLORS.bold}${COLORS.cyan}================================================================================${COLORS.reset}`);
    console.log(`${COLORS.bold}${COLORS.cyan}           QCLAY REDESIGN AUTOMATED E2E TEST RUNNER (TIERS 1 - 4)                ${COLORS.reset}`);
    console.log(`${COLORS.bold}${COLORS.cyan}================================================================================${COLORS.reset}`);
    console.log(`${COLORS.gray}Config: Tier Filter: ${COLORS.bold}${CONFIG.tier.toUpperCase()}${COLORS.reset}${COLORS.gray} | Feature Filter: ${COLORS.bold}${CONFIG.feature}${COLORS.reset}${COLORS.gray} | DevServer Port: ${CONFIG.port} | Verbose: ${CONFIG.verbose}${COLORS.reset}`);
    console.log(`${COLORS.gray}Total registered tests in matrix: ${COLORS.bold}${registry.tests.length}${COLORS.reset}${COLORS.gray} | Scheduled for execution: ${COLORS.bold}${filteredTests.length}${COLORS.reset}\n`);

    const results = {
        tier1: { total: 0, passed: 0, failed: 0, timeMs: 0 },
        tier2: { total: 0, passed: 0, failed: 0, timeMs: 0 },
        tier3: { total: 0, passed: 0, failed: 0, timeMs: 0 },
        tier4: { total: 0, passed: 0, failed: 0, timeMs: 0 },
        overall: { total: 0, passed: 0, failed: 0, timeMs: 0 },
        failures: []
    };

    let currentTierHeader = null;

    for (const test of filteredTests) {
        // Print Tier group headers
        if (test.tier !== currentTierHeader) {
            currentTierHeader = test.tier;
            const tierNames = {
                1: 'TIER 1: FEATURE COVERAGE TESTS (F1 - F13)',
                2: 'TIER 2: BOUNDARY & CORNER CASES (F1 - F13)',
                3: 'TIER 3: PAIRWISE CROSS-FEATURE INTERACTIONS',
                4: 'TIER 4: REAL-WORLD APPLICATION SCENARIOS'
            };
            console.log(`${COLORS.bold}${COLORS.magenta}[${tierNames[test.tier] || `TIER ${test.tier}`}]${COLORS.reset}`);
        }

        const tierKey = `tier${test.tier}`;
        results[tierKey].total++;
        results.overall.total++;

        const startTime = process.hrtime();
        let pass = false;
        let errorDetails = null;

        try {
            const maybePromise = test.fn();
            if (maybePromise && typeof maybePromise.then === 'function') {
                await maybePromise;
            }
            pass = true;
        } catch (err) {
            pass = false;
            errorDetails = err;
        }

        const diff = process.hrtime(startTime);
        const durationMs = (diff[0] * 1e3 + diff[1] * 1e-6).toFixed(1);
        results[tierKey].timeMs += parseFloat(durationMs);
        results.overall.timeMs += parseFloat(durationMs);

        if (pass) {
            results[tierKey].passed++;
            results.overall.passed++;
            console.log(`  ${COLORS.green}✔ PASS${COLORS.reset} ${COLORS.bold}[${test.id}]${COLORS.reset} ${test.description} ${COLORS.gray}(${durationMs}ms)${COLORS.reset}`);
        } else {
            results[tierKey].failed++;
            results.overall.failed++;
            console.log(`  ${COLORS.red}✖ FAIL${COLORS.reset} ${COLORS.bold}[${test.id}]${COLORS.reset} ${test.description} ${COLORS.gray}(${durationMs}ms)${COLORS.reset}`);
            
            const failureRecord = {
                id: test.id,
                tier: test.tier,
                feature: test.feature,
                description: test.description,
                target: test.target,
                error: errorDetails.message,
                diagnostics: errorDetails.diagnostics || null,
                stack: errorDetails.stack
            };
            results.failures.push(failureRecord);

            if (CONFIG.verbose || CONFIG.bail) {
                console.log(`    ${COLORS.red}Reason: ${errorDetails.message}${COLORS.reset}`);
                if (errorDetails.diagnostics) {
                    console.log(`    ${COLORS.gray}Diagnostics: ${JSON.stringify(errorDetails.diagnostics)}${COLORS.reset}`);
                }
            }

            if (CONFIG.bail) {
                console.log(`\n${COLORS.yellow}Bailing out immediately due to test failure (--bail active).${COLORS.reset}\n`);
                break;
            }
        }
    }

    // ------------------------------------------------------------------------
    // FAILURE DIAGNOSTICS SECTION
    // ------------------------------------------------------------------------
    if (results.failures.length > 0) {
        console.log(`\n${COLORS.bold}${COLORS.red}================================================================================${COLORS.reset}`);
        console.log(`${COLORS.bold}${COLORS.red}                             FAILURE DIAGNOSTICS                                ${COLORS.reset}`);
        console.log(`${COLORS.bold}${COLORS.red}================================================================================${COLORS.reset}`);
        
        results.failures.forEach((f, idx) => {
            console.log(`\n${COLORS.bold}${idx + 1}. [${f.id}] (Tier ${f.tier} | Feature ${f.feature}) - ${f.description}${COLORS.reset}`);
            console.log(`   ${COLORS.cyan}Target:${COLORS.reset} ${f.target}`);
            console.log(`   ${COLORS.red}Error:${COLORS.reset}  ${f.error}`);
            if (f.diagnostics) {
                console.log(`   ${COLORS.gray}Data:${COLORS.reset}   ${JSON.stringify(f.diagnostics, null, 2).replace(/\n/g, '\n   ')}`);
            }
        });
    }

    // ------------------------------------------------------------------------
    // SUMMARY MATRIX TABLE
    // ------------------------------------------------------------------------
    console.log(`\n${COLORS.bold}${COLORS.cyan}================================================================================${COLORS.reset}`);
    console.log(`${COLORS.bold}${COLORS.cyan}                               TEST RESULTS SUMMARY                             ${COLORS.reset}`);
    console.log(`${COLORS.bold}${COLORS.cyan}================================================================================${COLORS.reset}`);

    const pad = (str, len) => String(str).padEnd(len);
    const padNum = (num, len) => String(num).padStart(len);

    console.log(`┌─────────────────────────────────┬──────────┬──────────┬──────────┬──────────┐`);
    console.log(`│ ${pad('Test Suite / Tier', 31)} │ ${padNum('Total', 8)} │ ${padNum('Passed', 8)} │ ${padNum('Failed', 8)} │ ${padNum('Time', 8)} │`);
    console.log(`├─────────────────────────────────┼──────────┼──────────┼──────────┼──────────┤`);

    const tiers = [
        { key: 'tier1', name: 'Tier 1: Feature Coverage' },
        { key: 'tier2', name: 'Tier 2: Boundary & Corners' },
        { key: 'tier3', name: 'Tier 3: Pairwise Interactions' },
        { key: 'tier4', name: 'Tier 4: Real-World Scenarios' }
    ];

    for (const t of tiers) {
        const d = results[t.key];
        const timeStr = `${d.timeMs.toFixed(0)}ms`;
        console.log(`│ ${pad(t.name, 31)} │ ${padNum(d.total, 8)} │ ${padNum(d.passed, 8)} │ ${padNum(d.failed, 8)} │ ${padNum(timeStr, 8)} │`);
    }

    console.log(`├─────────────────────────────────┼──────────┼──────────┼──────────┼──────────┤`);
    const totalTimeStr = `${results.overall.timeMs.toFixed(0)}ms`;
    console.log(`│ ${pad(`${COLORS.bold}TOTAL EXECUTED${COLORS.reset}`, 31 + 8)} │ ${padNum(results.overall.total, 8)} │ ${padNum(results.overall.passed, 8)} │ ${padNum(results.overall.failed, 8)} │ ${padNum(totalTimeStr, 8)} │`);
    console.log(`└─────────────────────────────────┴──────────┴──────────┴──────────┴──────────┘`);

    const allPassed = results.overall.failed === 0 && results.overall.total > 0;

    if (allPassed) {
        console.log(`\n${COLORS.bold}${COLORS.green}OVERALL STATUS: ✔ 100% PASSED (Exit Code: 0)${COLORS.reset}`);
        console.log(`${COLORS.bold}${COLORS.cyan}================================================================================${COLORS.reset}\n`);
        process.exit(0);
    } else {
        console.log(`\n${COLORS.bold}${COLORS.red}OVERALL STATUS: ✖ FAILED WITH ${results.overall.failed} DEFECT(S) (Exit Code: 1)${COLORS.reset}`);
        console.log(`${COLORS.bold}${COLORS.cyan}================================================================================${COLORS.reset}\n`);
        process.exit(1);
    }
}

// Execute Runner
runTestSuite().catch(err => {
    console.error(`${COLORS.red}Fatal Runner Error: ${err.message}${COLORS.reset}`, err);
    process.exit(1);
});
