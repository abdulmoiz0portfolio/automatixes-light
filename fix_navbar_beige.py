import os

css_path = 'assets/css/main.css'
with open(css_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Remove the previous Sage override
content = content.replace('.header-nav { background: rgba(139, 154, 110, 0.95) !important; border-bottom: 1px solid rgba(247, 242, 235, 0.15) !important; }', '')
content = content.replace('.header-nav.sticky { background: rgba(139, 154, 110, 0.98) !important; border-bottom: 1px solid #F7F2EB !important; box-shadow: 0 4px 20px rgba(0,0,0,0.15) !important; }', '')
content = content.replace('.header-nav .nav-link { color: #F7F2EB !important; }', '')
content = content.replace('.header-nav .nav-link:hover { color: #C8E019 !important; }', '')

# Append new Beige override
content += '''
/* Navbar Beige Override */
.header-nav { background: rgba(234, 226, 214, 0.95) !important; border-bottom: 1px solid rgba(139, 154, 110, 0.15) !important; }
.header-nav.sticky { background: rgba(234, 226, 214, 0.98) !important; border-bottom: 1px solid #8B9A6E !important; box-shadow: 0 4px 20px rgba(0,0,0,0.05) !important; }
.header-nav .nav-link { color: #1a1b18 !important; }
.header-nav .nav-link:hover { color: #8B9A6E !important; }
'''

with open(css_path, 'w', encoding='utf-8') as f:
    f.write(content)

print("Navbar updated to Beige.")
