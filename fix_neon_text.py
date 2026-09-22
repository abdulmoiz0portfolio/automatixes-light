import os
import re

# 1. Update CSS to fix text contrast
css_path = 'assets/css/main.css'
with open(css_path, 'r', encoding='utf-8') as f:
    css_content = f.read()

# Add CSS overrides for these specific elements
css_overrides = '''
/* Fix Neon text contrast on light background */
.btn-outline-brand { 
    color: #1a1b18 !important; 
    border-color: #8B9A6E !important; 
    background-color: transparent !important;
}
.btn-outline-brand:hover {
    background-color: #8B9A6E !important;
    color: #F7F2EB !important;
}
.text-accent-brand, .text-accent-neon {
    color: #2C3524 !important; /* Dark earthy color instead of neon for text */
}

/* Fix inline gradient for Notable Projects (and similar) by overriding background-clip text */
h2 span[style*="-webkit-background-clip: text"] {
    background: none !important;
    -webkit-background-clip: initial !important;
    -webkit-text-fill-color: #8B9A6E !important; /* Sage green for emphasis instead of white-to-neon */
    color: #8B9A6E !important;
}
'''
with open(css_path, 'a', encoding='utf-8') as f:
    f.write(css_overrides)

# 2. Fix the specific inline styles in index.php if the CSS override isn't enough
php_path = 'index.php'
with open(php_path, 'r', encoding='utf-8') as f:
    php_content = f.read()

# Replace the specific gradient inline style for 'Projects' to just use a class or simpler style
php_content = php_content.replace(
    'style="background: linear-gradient(135deg, #FFFFFF 30%, #C8E019 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"',
    'class="text-sage" style="color: #8B9A6E !important;"'
)

with open(php_path, 'w', encoding='utf-8') as f:
    f.write(php_content)

print("Fixed neon text contrast.")
