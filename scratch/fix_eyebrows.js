const fs = require('fs');
let html = fs.readFileSync('index.php', 'utf8');

const regex = /<span class="badge bg-brand-translucent text-accent-brand mb-3 font-monospace px-3 py-2 border border-brand-50">.*?<\/span>\s*/g;
let matches = html.match(regex);
console.log("Found matches:", matches ? matches.length : 0);

if (matches) {
    let keepIndex = 3; // Keep the 'CASE STUDIES' one, which is the 4th match (index 3)
    let replaceCount = 0;
    html = html.replace(regex, (match) => {
        if (replaceCount === keepIndex) {
            replaceCount++;
            return match; // Keep this one
        }
        replaceCount++;
        return ''; // Remove others
    });
    fs.writeFileSync('index.php', html, 'utf8');
    console.log("Replaced unnecessary eyebrows.");
}
