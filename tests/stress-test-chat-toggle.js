const { chromium } = require('playwright');

(async () => {
    let browser;
    try {
        console.log('Starting Empirical Stress Test Harness for n8n Chat Toggle...');
        browser = await chromium.launch({ headless: true });
        const context = await browser.newContext();
        await context.addInitScript(() => {
            localStorage.setItem('newsletterSeen_baig', 'true');
        });
        const page = await context.newPage();

        const errors = [];
        page.on('console', msg => {
            if (msg.type() === 'error') {
                errors.push(`PAGE LOG ERROR: ${msg.text()}`);
            }
        });
        page.on('pageerror', err => errors.push(`PAGE ERROR: ${err.message}`));

        console.log('Navigating to http://localhost:3000...');
        await page.goto('http://localhost:3000/', { waitUntil: 'domcontentloaded', timeout: 30000 });
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

        const getStickyDisplay = async () => {
            return await page.$eval('#sticky-expert-btn', el => window.getComputedStyle(el).display);
        };

        // --- TEST CASE 1: Standard 10-Cycle Open/Close Lifecycle ---
        console.log('\n--- TEST CASE 1: 10-Cycle Sequential Open/Close Lifecycle ---');
        for (let i = 1; i <= 10; i++) {
            // Open
            await page.click('#sticky-expert-btn');
            await page.waitForFunction(() => {
                const win = document.querySelector('.chat-window') || document.querySelector('.chat-layout');
                return win && win.getBoundingClientRect().width > 0;
            }, { timeout: 5000 });

            const stickyOpen = await getStickyDisplay();
            const openState = await isChatWindowOpen();
            if (!openState || stickyOpen !== 'none') {
                throw new Error(`Cycle ${i} OPEN failed: chatOpen=${openState}, stickyDisplay=${stickyOpen}`);
            }

            await page.waitForSelector('#custom-chat-close', { state: 'visible', timeout: 5000 });

            // Verify single close button present in header
            const closeBtnCount = await page.$$eval('#custom-chat-close', btns => btns.length);
            if (closeBtnCount !== 1) {
                throw new Error(`Cycle ${i}: Found ${closeBtnCount} close buttons (#custom-chat-close) in DOM! Expected 1.`);
            }

            // Close
            await page.click('#custom-chat-close');
            await page.waitForFunction(() => {
                const win = document.querySelector('.chat-window') || document.querySelector('.chat-layout');
                return !win || win.getBoundingClientRect().width === 0;
            }, { timeout: 5000 });

            const stickyClosed = await getStickyDisplay();
            const closedState = await isChatWindowOpen();
            if (closedState || stickyClosed === 'none') {
                throw new Error(`Cycle ${i} CLOSE failed: chatOpen=${closedState}, stickyDisplay=${stickyClosed}`);
            }
            console.log(`  Cycle ${i}/10 PASSED`);
        }
        console.log('✅ TEST CASE 1 PASSED: 10 sequential cycles completed perfectly.');

        // --- TEST CASE 2: Rapid Consecutive Toggling (<50ms interval) ---
        console.log('\n--- TEST CASE 2: Rapid Consecutive Toggling (Race Condition Test) ---');
        // Rapidly invoke toggleChatState 5 times within 100ms window
        await page.evaluate(() => {
            const btn = document.getElementById('sticky-expert-btn');
            if (btn) btn.click();
        });
        await page.waitForTimeout(20); // click close inside 100ms window before setTimeout finishes
        await page.evaluate(() => {
            const closeBtn = document.getElementById('custom-chat-close');
            if (closeBtn) closeBtn.click();
            else toggleChatState();
        });
        await page.waitForTimeout(20);
        await page.evaluate(() => {
            const btn = document.getElementById('sticky-expert-btn');
            if (btn) btn.click();
        });

        // Wait for all timeouts and state settles
        await page.waitForTimeout(1000);

        // Check toggle container inline style pollution
        const toggleStylePolluted = await page.evaluate(() => {
            const toggleContainer = document.querySelector('.chat-window-toggle') ||
                                    document.querySelector('.chat-toggle') ||
                                    (document.querySelector('.chat-window-wrapper') ? Array.from(document.querySelector('.chat-window-wrapper').children).find(el => !el.classList.contains('chat-window') && !el.classList.contains('chat-layout')) : null);
            if (!toggleContainer) return null;
            return toggleContainer.getAttribute('style');
        });

        console.log(`Toggle Container Style After Rapid Clicks: "${toggleStylePolluted}"`);

        // Check if style was polluted with temporary override 'position: fixed'
        if (toggleStylePolluted && toggleStylePolluted.includes('z-index: 9999999')) {
            console.error('❌ BUG DETECTED: Rapid clicks corrupted toggle container inline style!');
            throw new Error(`Rapid click race condition bug: toggle container style polluted with temporary override: "${toggleStylePolluted}"`);
        }

        // Check final state consistency (either open or closed, but sticky btn matches chat state)
        const finalChatOpen = await isChatWindowOpen();
        const finalStickyDisplay = await getStickyDisplay();
        console.log(`Final State After Rapid Toggling -> Chat Open: ${finalChatOpen}, Sticky Display: "${finalStickyDisplay}"`);

        if (finalChatOpen && finalStickyDisplay !== 'none') {
            throw new Error(`Inconsistent state after rapid clicks: Chat is open but sticky button is visible ("${finalStickyDisplay}")!`);
        }
        if (!finalChatOpen && finalStickyDisplay === 'none') {
            throw new Error(`Inconsistent state after rapid clicks: Chat is closed but sticky button is hidden ("${finalStickyDisplay}")!`);
        }

        console.log('✅ TEST CASE 2 PASSED: Rapid toggling handled without state corruption or style pollution.');

        // --- TEST CASE 3: Recovery Cycle after Rapid Clicks ---
        console.log('\n--- TEST CASE 3: State Recovery Verification ---');
        // Ensure clean state: if open, close it; if closed, open it then close it.
        if (await isChatWindowOpen()) {
            await page.click('#custom-chat-close');
            await page.waitForTimeout(500);
        }
        await page.click('#sticky-expert-btn');
        await page.waitForTimeout(500);
        const postRecoveryOpen = await isChatWindowOpen();
        await page.click('#custom-chat-close');
        await page.waitForTimeout(500);
        const postRecoveryClosed = await isChatWindowOpen();
        const postRecoverySticky = await getStickyDisplay();

        if (!postRecoveryOpen || postRecoveryClosed || postRecoverySticky === 'none') {
            throw new Error(`State recovery failed after rapid toggling. Open: ${postRecoveryOpen}, Closed: ${!postRecoveryClosed}, Sticky: ${postRecoverySticky}`);
        }
        console.log('✅ TEST CASE 3 PASSED: System fully recovered and functions normally after rapid stress.');

        if (errors.length > 0) {
            console.log('\nWarnings/Errors caught during run:');
            errors.forEach(e => console.log('  -', e));
        }

        console.log('\n==================================================');
        console.log('🎉 ALL EMPIRICAL STRESS TESTS PASSED SUCCESSFULLY!');
        console.log('==================================================');

        await browser.close();
        process.exit(0);

    } catch (err) {
        console.error('\n❌ STRESS TEST FAILED:', err.message);
        if (browser) await browser.close();
        process.exit(1);
    }
})();
