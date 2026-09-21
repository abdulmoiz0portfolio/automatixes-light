const http = require('http');
http.get('http://localhost:3000/invoice-maker', (res) => {
    let data = '';
    res.on('data', chunk => data += chunk);
    res.on('end', () => {
        console.log('STATUS:', res.statusCode);
        const titleMatch = data.match(/<title>(.*?)<\/title>/);
        console.log('TITLE:', titleMatch ? titleMatch[1] : 'NO TITLE FOUND');
    });
}).on('error', err => console.log('HTTP ERROR:', err.message));
