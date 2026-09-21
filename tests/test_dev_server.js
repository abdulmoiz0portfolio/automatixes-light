const fs = require('fs');
const path = require('path');

const headerPath = path.join(__dirname, '..', 'header.php');
const content = fs.readFileSync(headerPath, 'utf8');

const blockMatch = content.match(/\$meta_config\s*=\s*\[([\s\S]*?)\];/);
console.log('blockMatch:', !!blockMatch);
if (blockMatch) {
    console.log('blockMatch length:', blockMatch[1].length);
    const body = blockMatch[1];
    const pageRegex = /['"]([\w-]+)['"]\s*=>\s*\[([\s\S]*?)\]/g;
    let pageMatch;
    let pages = [];
    while ((pageMatch = pageRegex.exec(body)) !== null) {
        pages.push(pageMatch[1]);
    }
    console.log('Pages parsed:', pages);
}
