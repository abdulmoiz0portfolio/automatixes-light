const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto('https://automatixes.com/');
    
    // Wait for chat to load
    await new Promise(r => setTimeout(r, 5000));
    
    // Find the toggle button
    const html = await page.evaluate(() => {
        // Find the chat button, it's usually at the bottom right
        return document.body.innerHTML.match(/<button[^>]*>.*?<\/button>/gi);
    });
    
    console.log(html.filter(b => !b.includes('Connect with an Expert') && !b.includes('Claim Now')).join('\n'));
    await browser.close();
})();
