const { chromium } = require('playwright');
const http = require('http');

(async () => {
    let browser;
    try {
        console.log('--- Starting Automated E2E Verification for Invoice Maker ---');

        // Check if dev-server is reachable
        const checkServer = () => new Promise((resolve) => {
            const req = http.get('http://localhost:3000/invoice-maker', (res) => {
                resolve(res.statusCode === 200);
            });
            req.on('error', () => resolve(false));
            req.end();
        });

        const isRunning = await checkServer();
        if (!isRunning) {
            console.log('Dev server not detected on http://localhost:3000. Please start node dev-server.js.');
        } else {
            console.log('Dev server is running at http://localhost:3000');
        }

        console.log('Launching headless browser...');
        browser = await chromium.launch({ headless: true });
        const context = await browser.newContext();
        await context.addInitScript(() => {
            localStorage.setItem('newsletterSeen_baig', 'true');
        });
        const page = await context.newPage();

        // Listen for console and page errors
        page.on('console', msg => {
            const txt = msg.text();
            if (txt.includes('Error') || txt.includes('error') || txt.includes('Exception')) {
                console.log('PAGE LOG:', txt);
            }
        });
        page.on('pageerror', err => console.log('PAGE ERROR STACK:', err.stack));

        // 1. Load /invoice-maker page
        console.log('Navigating to http://localhost:3000/invoice-maker ...');
        const response = await page.goto('http://localhost:3000/invoice-maker', { waitUntil: 'domcontentloaded', timeout: 30000 });
        
        if (!response || response.status() !== 200) {
            throw new Error(`Failed to load page. HTTP status code: ${response ? response.status() : 'No response'}`);
        }
        console.log('✅ 1. Page loaded with HTTP status 200.');

        // Verify Page Title from $meta_config
        const pageTitle = await page.title();
        console.log(`Page title: "${pageTitle}"`);
        if (!pageTitle.includes('Free Online Invoice Maker | Automatixes')) {
            throw new Error(`Page title mismatch. Expected "Free Online Invoice Maker | Automatixes", got "${pageTitle}"`);
        }
        console.log('✅ 2. Meta title verified from $meta_config.');

        // 2. Verify Vue 3 Mount & Pre-filled Company Details
        await page.waitForSelector('#app', { state: 'visible', timeout: 10000 });
        await page.waitForSelector('.company-name-input', { state: 'visible', timeout: 5000 });

        const companyName = await page.$eval('.company-name-input', el => el.value);
        const companyEmail = await page.$eval('.company-email-input', el => el.value);
        const companyPhone = await page.$eval('.company-phone-input', el => el.value);
        const companyAddress = await page.$eval('.company-address-input', el => el.value);
        const companyWebsite = await page.$eval('.company-website-input', el => el.value);

        console.log(`Pre-filled Company Info: Name="${companyName}", Email="${companyEmail}", Phone="${companyPhone}", Address="${companyAddress}", Web="${companyWebsite}"`);

        if (companyName !== 'Automatixes' || companyEmail !== 'contact@automatixes.com' || companyPhone !== '+92 336 6920141' || !companyAddress.includes('Worldwide') || companyWebsite !== 'https://automatixes.com') {
            throw new Error('Pre-filled company details do not match expected Automatixes info.');
        }
        console.log('✅ 3. Vue 3 instance mounted & pre-filled company details verified.');

        // 3. Verify Navigation Links (Header dropdown & Footer list)
        const headerLink = await page.$('ul.dropdown-menu a[href="invoice-maker"]');
        const footerLink = await page.$('footer a[href="invoice-maker"]');

        if (!headerLink) throw new Error('Header Services dropdown link for "invoice-maker" not found.');
        if (!footerLink) throw new Error('Footer "Our Services" link for "invoice-maker" not found.');
        console.log('✅ 4. Header dropdown and Footer services links verified.');

        // 4. Dynamic Line Items Verification
        const initialRows = await page.$$('.line-item-row');
        console.log(`Initial line item count: ${initialRows.length}`);
        if (initialRows.length !== 2) throw new Error(`Expected 2 initial line items, found ${initialRows.length}`);

        // Add line item
        console.log('Clicking "#add-line-item-btn" to add a 3rd line item...');
        await page.click('#add-line-item-btn');
        await page.waitForTimeout(300);

        const updatedRows = await page.$$('.line-item-row');
        if (updatedRows.length !== 3) throw new Error(`Expected 3 line items after click, found ${updatedRows.length}`);

        // Modify 3rd line item quantity and price
        const qtyInputs = await page.$$('.qty-input');
        const priceInputs = await page.$$('.price-input');
        const serviceSelects = await page.$$('.service-select');

        // Select Custom Service on item 3
        await serviceSelects[2].selectOption('custom');
        await page.waitForTimeout(200);
        await page.fill('.custom-service-input', 'Custom AI RAG Pipeline Setup');

        await qtyInputs[2].fill('3');
        await priceInputs[2].fill('500');

        console.log('Line item 3 set to 3 units @ $500.00 each = $1,500.00');

        // Remove line item 2
        const removeBtns = await page.$$('.remove-line-btn');
        console.log('Clicking remove button on line item 2...');
        await removeBtns[1].click();
        await page.waitForTimeout(300);

        const finalRows = await page.$$('.line-item-row');
        if (finalRows.length !== 2) throw new Error(`Expected 2 line items after deletion, found ${finalRows.length}`);
        console.log('✅ 5. Dynamic line items addition, custom input, and deletion verified.');

        // 5. Verify Live Math Calculations (Subtotal, Tax, Discount, Grand Total)
        // Item 1: 1 x 1500 = 1500
        // Item 2 (formerly item 3): 3 x 500 = 1500
        // Expected Subtotal: 3000.00
        // Tax 10%: 300.00
        // Discount 5%: 150.00
        // Expected Grand Total: 3000 + 300 - 150 = 3150.00

        await page.fill('#tax-rate-input', '10');
        await page.fill('#discount-rate-input', '5');
        await page.waitForTimeout(300);

        const subtotalTxt = await page.$eval('#subtotal-val', el => el.innerText);
        const taxAmountTxt = await page.$eval('#tax-amount-val', el => el.innerText);
        const discountAmountTxt = await page.$eval('#discount-amount-val', el => el.innerText);
        const grandTotalTxt = await page.$eval('#grand-total-val', el => el.innerText);

        console.log(`Calculated Totals -> Subtotal: "${subtotalTxt}", Tax: "${taxAmountTxt}", Discount: "${discountAmountTxt}", Grand Total: "${grandTotalTxt}"`);

        if (!subtotalTxt.includes('3,000.00')) throw new Error(`Subtotal incorrect: expected 3,000.00, got ${subtotalTxt}`);
        if (!taxAmountTxt.includes('300.00')) throw new Error(`Tax amount incorrect: expected 300.00, got ${taxAmountTxt}`);
        if (!discountAmountTxt.includes('150.00')) throw new Error(`Discount amount incorrect: expected 150.00, got ${discountAmountTxt}`);
        if (!grandTotalTxt.includes('3,150.00')) throw new Error(`Grand Total incorrect: expected 3,150.00, got ${grandTotalTxt}`);

        console.log('✅ 6. Real-time math calculations (Subtotal, Tax, Discount, Grand Total) verified accurately.');

        // 6. Verify @media print CSS rules
        console.log('Emulating print media mode...');
        await page.emulateMedia({ media: 'print' });

        const headerDisplay = await page.evaluate(() => {
            const el = document.querySelector('#header-sticky');
            return el ? window.getComputedStyle(el).display : 'none';
        });
        const footerDisplay = await page.evaluate(() => {
            const el = document.querySelector('footer');
            return el ? window.getComputedStyle(el).display : 'none';
        });
        const stickyBtnDisplay = await page.evaluate(() => {
            const el = document.querySelector('#sticky-expert-btn');
            return el ? window.getComputedStyle(el).display : 'none';
        });
        const printBtnDisplay = await page.evaluate(() => {
            const el = document.querySelector('#print-invoice-btn');
            return el ? window.getComputedStyle(el).display : 'none';
        });

        console.log(`Print Media Styles -> Header: "${headerDisplay}", Footer: "${footerDisplay}", Sticky Btn: "${stickyBtnDisplay}", Print Btn: "${printBtnDisplay}"`);

        if (headerDisplay !== 'none' || footerDisplay !== 'none' || stickyBtnDisplay !== 'none' || printBtnDisplay !== 'none') {
            throw new Error('@media print failed to hide non-printable UI elements (header, footer, buttons).');
        }
        console.log('✅ 7. @media print stylesheet verified: header, footer, sticky button, and print actions are hidden.');

        console.log('--------------------------------------------------');
        console.log('🎉 ALL INVOICE MAKER VERIFICATION TESTS PASSED!');
        console.log('--------------------------------------------------');

        await browser.close();
        process.exit(0);

    } catch (err) {
        console.error('❌ E2E TEST FAILED:', err.message);
        if (browser) await browser.close();
        process.exit(1);
    }
})();
