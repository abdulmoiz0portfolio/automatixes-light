const path = require('path');
const fs = require('fs');
const { getProcessedHtml, parseMetaConfig } = require('../dev-server.js');

console.log('--- Verifying Fix 1: dev-server.js PHP Meta Title Handling ---');
const invoiceMakerPath = path.join(__dirname, '..', 'invoice-maker.php');
const html = getProcessedHtml(invoiceMakerPath);
const titleMatch = html.match(/<title>(.*?)<\/title>/);
const title = titleMatch ? titleMatch[1] : '';

console.log('Processed HTML Title:', `"${title}"`);

if (title === 'Free Online Invoice Maker | Automatixes') {
    console.log('✅ Fix 1 PASSED: Title correctly populated from $meta_config["invoice-maker"].');
} else {
    console.error('❌ Fix 1 FAILED: Expected "Free Online Invoice Maker | Automatixes", got:', `"${title}"`);
    process.exit(1);
}

console.log('\n--- Verifying Fix 2: invoice-maker.php Custom Service Print Style ---');
const invoiceMakerContent = fs.readFileSync(invoiceMakerPath, 'utf8');
const classDirective = `:class="{ 'no-print': item.serviceSelect === 'custom' }"`;

if (invoiceMakerContent.includes(classDirective)) {
    console.log('✅ Fix 2 PASSED: Service select element has :class="{ \'no-print\': item.serviceSelect === \'custom\' }".');
} else {
    console.error('❌ Fix 2 FAILED: Service select element missing no-print class directive.');
    process.exit(1);
}

console.log('\n--- Verifying Fix 3: tests/test-invoice-maker.js Infrastructure ---');
const testContent = fs.readFileSync(path.join(__dirname, 'test-invoice-maker.js'), 'utf8');

if (testContent.includes("localStorage.setItem('newsletterSeen_baig', 'true')")) {
    console.log('✅ Fix 3 PASSED: test-invoice-maker.js contains newsletterSeen_baig init script.');
} else {
    console.error('❌ Fix 3 FAILED: test-invoice-maker.js missing newsletterSeen_baig init script.');
    process.exit(1);
}

console.log('\n🎉 ALL STATIC & LOGICAL VERIFICATIONS PASSED 100%!');
