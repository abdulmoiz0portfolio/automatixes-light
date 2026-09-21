const { chromium } = require('playwright');

(async () => {
    let browser;
    try {
        console.log('Launching headless browser for chat toggle verification...');
        browser = await chromium.launch({ headless: true });
        const context = await browser.newContext();
        await context.addInitScript(() => {
            localStorage.setItem('newsletterSeen_baig', 'true');
        });
        const page = await context.newPage();

        page.on('console', msg => {
            const txt = msg.text();
            if (txt.includes('Error') || txt.includes('error')) {
                console.log('PAGE LOG:', txt);
            }
        });
        page.on('pageerror', err => console.log('PAGE ERROR STACK:', err.stack));

        console.log('Navigating to http://localhost:3000...');
        await page.goto('http://localhost:3000/', { waitUntil: 'domcontentloaded', timeout: 30000 });

        // Wait for n8n chat widget container to be attached to DOM
        console.log('Waiting for .chat-window-wrapper to attach...');
        await page.waitForSelector('.chat-window-wrapper, .chat-wrapper', { state: 'attached', timeout: 15000 });
        await page.waitForTimeout(1000);

        const isChatWindowOpen = async () => {
            return await page.evaluate(() => {
                const win = document.querySelector('.chat-window') || document.querySelector('.chat-layout');
                if (!win) return false;
                const rect = win.getBoundingClientRect();
                return rect.width > 0 && rect.height > 0 && window.getComputedStyle(win).display !== 'none' && window.getComputedStyle(win).visibility !== 'hidden';
            });
        };

        // 1. Initial state assertion
        const initialStickyDisplay = await page.$eval('#sticky-expert-btn', el => window.getComputedStyle(el).display);
        const initialChatOpen = await isChatWindowOpen();

        console.log(`Initial State -> Sticky Btn display: "${initialStickyDisplay}", Chat Window Open: ${initialChatOpen}`);

        if (initialStickyDisplay === 'none') {
            throw new Error('Initial state failed: #sticky-expert-btn should be visible (display: flex)');
        }
        if (initialChatOpen) {
            throw new Error('Initial state failed: Chat window should be closed initially');
        }

        // 2. Click Sticky Expert Button to Open Chat (R1)
        console.log('Clicking #sticky-expert-btn ("Connect with an Expert")...');
        await page.click('#sticky-expert-btn');

        console.log('Waiting for chat window to open...');
        await page.waitForFunction(() => {
            const win = document.querySelector('.chat-window') || document.querySelector('.chat-layout');
            if (!win) return false;
            const rect = win.getBoundingClientRect();
            return rect.width > 0 && rect.height > 0 && window.getComputedStyle(win).display !== 'none' && window.getComputedStyle(win).visibility !== 'hidden';
        }, { timeout: 10000 });

        const openStickyDisplay = await page.$eval('#sticky-expert-btn', el => window.getComputedStyle(el).display);
        const openChatOpen = await isChatWindowOpen();

        console.log(`Open State -> Sticky Btn display: "${openStickyDisplay}", Chat Window Open: ${openChatOpen}`);

        if (!openChatOpen) {
            throw new Error('R1 Failed: Chat window did not open');
        }
        if (openStickyDisplay !== 'none') {
            throw new Error('R1 Failed: #sticky-expert-btn was not hidden when chat opened');
        }

        console.log('Waiting for #custom-chat-close ("✖") button...');
        await page.waitForSelector('#custom-chat-close', { state: 'visible', timeout: 5000 });

        // 3. Click Custom Close Button to Close Chat (R2)
        console.log('Clicking #custom-chat-close ("✖") red button...');
        await page.click('#custom-chat-close');

        console.log('Waiting for chat window to close...');
        await page.waitForFunction(() => {
            const win = document.querySelector('.chat-window') || document.querySelector('.chat-layout');
            if (!win) return true;
            const rect = win.getBoundingClientRect();
            return rect.width === 0 || rect.height === 0 || window.getComputedStyle(win).display === 'none' || window.getComputedStyle(win).visibility !== 'hidden';
        }, { timeout: 10000 });

        const closedStickyDisplay = await page.$eval('#sticky-expert-btn', el => window.getComputedStyle(el).display);
        const closedChatOpen = await isChatWindowOpen();

        console.log(`Closed State -> Sticky Btn display: "${closedStickyDisplay}", Chat Window Open: ${closedChatOpen}`);

        if (closedChatOpen) {
            throw new Error('R2 Failed: Chat window was not closed after clicking close button');
        }
        if (closedStickyDisplay === 'none') {
            throw new Error('R2 Failed: #sticky-expert-btn was not restored after closing chat');
        }

        console.log('--------------------------------------------------');
        console.log('✅ VERIFICATION PASSED SUCCESSFULLY:');
        console.log(' - R1: #sticky-expert-btn reliably opens chat window');
        console.log(' - R2: #custom-chat-close reliably closes chat window and restores #sticky-expert-btn');
        console.log(' - R3: Automated verification script executed cleanly');
        console.log('--------------------------------------------------');

        await browser.close();
        process.exit(0);

    } catch (err) {
        console.error('❌ TEST FAILED:', err.message);
        if (browser) await browser.close();
        process.exit(1);
    }
})();
