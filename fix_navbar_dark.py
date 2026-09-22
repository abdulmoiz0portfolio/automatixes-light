import os

css_path = 'assets/css/main.css'
with open(css_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Remove the beige override block
beige_block = '''/* Navbar Beige Override */
.header-nav { background: rgba(234, 226, 214, 0.95) !important; border-bottom: 1px solid rgba(139, 154, 110, 0.15) !important; }
.header-nav.sticky { background: rgba(234, 226, 214, 0.98) !important; border-bottom: 1px solid #8B9A6E !important; box-shadow: 0 4px 20px rgba(0,0,0,0.05) !important; }
.header-nav .nav-link { color: #1a1b18 !important; }
.header-nav .nav-link:hover { color: #8B9A6E !important; }'''

content = content.replace(beige_block, '')

# Append Dark override
dark_block = '''
/* Navbar Dark Override (Matches Hero Section) */
.header-nav { background: #080c16 !important; border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important; }
.header-nav.sticky { background: rgba(8, 12, 22, 0.98) !important; border-bottom: 1px solid rgba(200, 224, 25, 0.2) !important; box-shadow: 0 4px 20px rgba(0,0,0,0.3) !important; }
.header-nav .nav-link { color: #F7F2EB !important; }
.header-nav .nav-link:hover { color: #C8E019 !important; }
'''

with open(css_path, 'w', encoding='utf-8') as f:
    f.write(content + dark_block)

print("Navbar updated to Dark to match Hero.")
