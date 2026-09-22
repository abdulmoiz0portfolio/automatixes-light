import os

css_path = 'assets/css/main.css'
with open(css_path, 'a', encoding='utf-8') as f:
    f.write('''
/* Navbar Sage Green Override */
.header-nav { background: rgba(139, 154, 110, 0.95) !important; border-bottom: 1px solid rgba(247, 242, 235, 0.15) !important; }
.header-nav.sticky { background: rgba(139, 154, 110, 0.98) !important; border-bottom: 1px solid #F7F2EB !important; box-shadow: 0 4px 20px rgba(0,0,0,0.15) !important; }

/* Make navbar text readable on the Sage background */
.header-nav .nav-link { color: #F7F2EB !important; }
.header-nav .nav-link:hover { color: #C8E019 !important; }
'''
    )

print("Navbar updated to Sage Green.")
