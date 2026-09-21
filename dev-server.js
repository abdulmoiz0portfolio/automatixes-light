const express = require('express');
const fs = require('fs');
const path = require('path');
const cors = require('cors');

const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Serve static assets
app.use('/assets', express.static(path.join(__dirname, 'assets')));

// Recursive function to emulate PHP includes
function processPhpIncludes(filePath) {
    if (!fs.existsSync(filePath)) {
        return `<!-- File not found: ${filePath} -->`;
    }
    
    let content = fs.readFileSync(filePath, 'utf8');
    
    // Match PHP blocks and extract any included/required files
    const phpBlockRegex = /<\?php[\s\S]*?\?>/g;
    
    content = content.replace(phpBlockRegex, (match) => {
        const includeRegex = /(?:include|require|include_once|require_once)\s*\(?\s*['"]([^'"]+)['"]\s*\)?\s*;/g;
        let blockMatches = [];
        let m;
        while ((m = includeRegex.exec(match)) !== null) {
            blockMatches.push(m[1]);
        }
        if (blockMatches.length > 0) {
            return blockMatches.map(incFile => {
                const includePath = path.join(path.dirname(filePath), incFile);
                return processPhpIncludes(includePath);
            }).join('\n');
        }
        return match;
    });
    
    return content;
}

// Helper to parse $meta_config array from header.php
function parseMetaConfig(headerPath) {
    const metaConfig = {};
    if (!fs.existsSync(headerPath)) return metaConfig;
    const content = fs.readFileSync(headerPath, 'utf8');
    const blockMatch = content.match(/\$meta_config\s*=\s*\[([\s\S]*?)\];/);
    if (blockMatch) {
        const body = blockMatch[1];
        const pageRegex = /['"]([\w-]+)['"]\s*=>\s*\[([\s\S]*?)\]/g;
        let pageMatch;
        while ((pageMatch = pageRegex.exec(body)) !== null) {
            const pageKey = pageMatch[1];
            const pageBody = pageMatch[2];
            metaConfig[pageKey] = {};
            const itemRegex = /['"](\w+)['"]\s*=>\s*['"]([^'"]*)['"]/g;
            let itemMatch;
            while ((itemMatch = itemRegex.exec(pageBody)) !== null) {
                metaConfig[pageKey][itemMatch[1]] = itemMatch[2];
            }
        }
    }
    return metaConfig;
}

function getProcessedHtml(filePath) {
    const rawContent = fs.readFileSync(filePath, 'utf8');
    const pageKeyMatch = rawContent.match(/\$page_key\s*=\s*['"]([^'"]+)['"]/);
    const pageKey = pageKeyMatch ? pageKeyMatch[1] : (path.basename(filePath, '.php') || 'index');

    const headerPath = path.join(__dirname, 'header.php');
    const metaConfig = parseMetaConfig(headerPath);
    const activeMeta = metaConfig[pageKey] || metaConfig['index'] || {
        title: 'AI Automation Agency (n8n, Make, GoHighLevel) | Automatixes',
        desc: 'Automatixes is an AI-first agency building custom AI agents and workflow automations.',
        keywords: 'AI Automation Agency, n8n, Make',
        url: ''
    };

    let htmlContent = processPhpIncludes(filePath);

    // Replace PHP variable echo tags for meta attributes before stripping remaining PHP tags
    htmlContent = htmlContent.replace(/<\?php\s+echo\s+\$active_meta\['title'\];\s*\?>/g, activeMeta.title || '');
    htmlContent = htmlContent.replace(/<\?php\s+echo\s+\$active_meta\['desc'\];\s*\?>/g, activeMeta.desc || '');
    htmlContent = htmlContent.replace(/<\?php\s+echo\s+\$active_meta\['keywords'\];\s*\?>/g, activeMeta.keywords || '');
    htmlContent = htmlContent.replace(/<\?php\s+echo\s+\$canonical_url;\s*\?>/g, `http://localhost:${PORT}/${activeMeta.url || ''}`);
    htmlContent = htmlContent.replace(/<\?php\s+echo\s+\$og_image;\s*\?>/g, `http://localhost:${PORT}/assets/img/services/ai_automations.jpg`);
    htmlContent = htmlContent.replace(/<\?php\s+echo\s+\$protocol;\s*\?>/g, 'http');
    htmlContent = htmlContent.replace(/<\?php\s+echo\s+\$host;\s*\?>/g, `localhost:${PORT}`);

    // Strip any remaining PHP blocks (even if closing tag is missing) to prevent raw code rendering in browser
    htmlContent = htmlContent.replace(/<\?php[\s\S]*?(?:\?>|$)/g, '');
    return htmlContent;
}

// Serve PHP files as HTML
app.get('*', (req, res, next) => {
    let reqPath = req.path;
    
    // Default route
    if (reqPath === '/') {
        reqPath = '/index.php';
    }
    
    // If requesting a path without extension, try appending .php
    if (!path.extname(reqPath)) {
        reqPath += '.php';
    }
    
    const filePath = path.join(__dirname, reqPath);
    
    if (fs.existsSync(filePath) && filePath.endsWith('.php')) {
        try {
            const htmlContent = getProcessedHtml(filePath);
            res.setHeader('Content-Type', 'text/html');
            res.send(htmlContent);
        } catch (err) {
            res.status(500).send(`Error processing PHP includes: ${err.message}`);
        }
    } else {
        next();
    }
});

module.exports = { processPhpIncludes, parseMetaConfig, getProcessedHtml };

// Start Server if run directly
if (require.main === module) {
    app.listen(PORT, () => {
        console.log(`Automatixes PHP Emulator Server running at http://localhost:${PORT}`);
    });
}
