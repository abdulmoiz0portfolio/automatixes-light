import os
import glob

# Search for PHP files
php_files = glob.glob('*.php')

for filepath in php_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Replace hardcoded dark backgrounds
    content = content.replace('background: #080a11;', 'background: var(--bg-void);')
    content = content.replace('background: #0d1322;', 'background: var(--bg-surface-1);')
    content = content.replace('background: #070a12;', 'background: var(--bg-surface-2);')
    content = content.replace('background: #111827;', 'background: var(--bg-surface-2);')
    content = content.replace('background: #161f33;', 'background: var(--bg-surface-1);')
    content = content.replace('background: #1e293b;', 'background: var(--bg-surface-2);')
    
    # Text colors
    content = content.replace('color: #ffffff;', 'color: var(--text-primary);')
    content = content.replace('color: #cbd5e1;', 'color: var(--text-secondary);')
    content = content.replace('color: #94a3b8;', 'color: var(--text-muted);')
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print('Updated inline styles to CSS variables.')
