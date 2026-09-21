const { chromium } = require('playwright');
const path = require('path');

// Helper function to simulate smooth mouse movement
async function smoothMove(page, startX, startY, endX, endY, steps = 50) {
    for (let i = 0; i <= steps; i++) {
        const t = i / steps;
        const easeT = t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
        const currentX = startX + (endX - startX) * easeT;
        const currentY = startY + (endY - startY) * easeT;
        await page.mouse.move(currentX, currentY);
        await page.waitForTimeout(10);
    }
}

(async () => {
  console.log("Launching visible browser for demo...");
  
  const browser = await chromium.launch({ headless: false, slowMo: 50 });
  const context = await browser.newContext({
    viewport: { width: 1280, height: 800 }
  });

  const page = await context.newPage();
  
  await page.addInitScript(() => {
      document.addEventListener('DOMContentLoaded', () => {
          const cursor = document.createElement('div');
          cursor.id = 'ai-cursor';
          cursor.style.width = '20px';
          cursor.style.height = '20px';
          cursor.style.position = 'fixed';
          cursor.style.top = '0';
          cursor.style.left = '0';
          cursor.style.zIndex = '999999';
          cursor.style.pointerEvents = 'none';
          cursor.style.background = 'rgba(59, 130, 246, 0.7)';
          cursor.style.border = '2px solid white';
          cursor.style.borderRadius = '50%';
          cursor.style.boxShadow = '0 0 10px rgba(0,0,0,0.5)';
          cursor.style.transition = 'transform 0.05s linear';
          document.body.appendChild(cursor);

          document.addEventListener('mousemove', (e) => {
              cursor.style.transform = "translate(" + (e.clientX - 10) + "px, " + (e.clientY - 10) + "px)";
          });
          
          document.addEventListener('mousedown', (e) => {
              cursor.style.background = 'rgba(255, 0, 0, 0.8)';
              cursor.style.transform = "translate(" + (e.clientX - 10) + "px, " + (e.clientY - 10) + "px) scale(0.8)";
          });
          document.addEventListener('mouseup', (e) => {
              cursor.style.background = 'rgba(59, 130, 246, 0.7)';
              cursor.style.transform = "translate(" + (e.clientX - 10) + "px, " + (e.clientY - 10) + "px) scale(1)";
          });
      });
  });

  console.log("Navigating to BM International...");
  await page.goto('https://bminternational.com.pk/', { waitUntil: 'domcontentloaded', timeout: 60000 });
  
  let currentX = 640;
  let currentY = 100;
  await page.mouse.move(currentX, currentY);
  await page.waitForTimeout(1000);

  console.log("AI is reading the top section...");
  await smoothMove(page, currentX, currentY, 300, 200, 30);
  currentX = 300; currentY = 200;
  await page.waitForTimeout(500);
  
  await smoothMove(page, currentX, currentY, 800, 250, 40);
  currentX = 800; currentY = 250;
  await page.waitForTimeout(800);

  console.log("AI is scrolling down...");
  for(let i=0; i<5; i++) {
      await page.mouse.wheel(0, 300);
      await page.waitForTimeout(800);
  }

  await smoothMove(page, currentX, currentY, 500, 400, 30);
  currentX = 500; currentY = 400;
  await page.waitForTimeout(500);
  
  console.log("AI is clicking to test interactions...");
  await page.mouse.down();
  await page.waitForTimeout(200);
  await page.mouse.up();
  await page.waitForTimeout(1000);

  for(let i=0; i<4; i++) {
      await page.mouse.wheel(0, 400);
      await page.waitForTimeout(800);
  }
  
  await smoothMove(page, currentX, currentY, 800, 600, 40);
  await page.waitForTimeout(1000);

  console.log("AI is scrolling back to top...");
  for(let i=0; i<6; i++) {
      await page.mouse.wheel(0, -500);
      await page.waitForTimeout(400);
  }

  console.log("Demo finished! Closing in 3 seconds...");
  await page.waitForTimeout(3000);
  
  await context.close();
  await browser.close();
  
})();

