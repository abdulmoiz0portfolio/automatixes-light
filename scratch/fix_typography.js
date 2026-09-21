const fs = require('fs');
let html = fs.readFileSync('index.php', 'utf8');

// 1. Remove text-uppercase and font-monospace 
html = html.replace(/text-uppercase/g, '');
html = html.replace(/font-monospace/g, '');

// 2. Change first two section headers to text-start for asymmetry
// First section header
html = html.replace(/<div class="text-center mb-5">/, '<div class="text-start mb-5">');
// Another section header
html = html.replace(/<div class="row justify-content-center text-center mb-5">/, '<div class="row mb-5 text-start">');

// 3. Remove letter-spacing style overrides that look messy
html = html.replace(/style="letter-spacing:\s*[\d.]+px;"/g, '');

fs.writeFileSync('index.php', html, 'utf8');
console.log('Fixed typography and layout variance');
