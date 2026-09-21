const { chromium } = require('playwright');

(async () => {
    const browser = await chromium.launch({ headless: true });
    const page = await browser.newPage();
    await page.goto('http://localhost:3000/', { waitUntil: 'domcontentloaded' });

    await page.waitForTimeout(3000);

    const info = await page.evaluate(() => {
        const wrappers = Array.from(document.querySelectorAll('[class*="chat"]'));
        return wrappers.map(w => ({
            tagName: w.tagName,
            className: w.className,
            id: w.id,
            outerHTML: w.outerHTML.slice(0, 300),
            children: Array.from(w.children).map(c => ({
                tagName: c.tagName,
                className: c.className,
                id: c.id,
                outerHTML: c.outerHTML.slice(0, 200)
            }))
        }));
    });

    console.log(JSON.stringify(info, null, 2));
    await browser.close();
})();
