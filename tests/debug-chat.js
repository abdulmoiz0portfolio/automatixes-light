const { chromium } = require('playwright');

(async () => {
    const browser = await chromium.launch({ headless: true });
    const page = await browser.newPage();

    await page.goto('http://localhost:3000/', { waitUntil: 'domcontentloaded' });
    await page.waitForTimeout(3000);

    const initialStructure = await page.evaluate(() => {
        const wrapper = document.querySelector('.chat-wrapper');
        if (!wrapper) return 'No wrapper';
        return {
            wrapperTag: wrapper.tagName,
            wrapperClass: wrapper.className,
            children: Array.from(wrapper.children).map(c => ({
                tagName: c.tagName,
                className: c.className,
                isVis: c.offsetWidth > 0 && c.offsetHeight > 0,
                rect: c.getBoundingClientRect(),
                innerHTML: c.innerHTML.slice(0, 150)
            }))
        };
    });

    console.log('INITIAL STRUCTURE:', JSON.stringify(initialStructure, null, 2));

    await browser.close();
})();
