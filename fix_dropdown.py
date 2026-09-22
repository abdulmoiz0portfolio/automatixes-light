import os

css_path = 'assets/css/main.css'
with open(css_path, 'a', encoding='utf-8') as f:
    f.write('''
/* Language Dropdown Fixes */
.dropdown-menu {
    background-color: #F7F2EB !important;
    border: 1px solid rgba(139, 154, 110, 0.2) !important;
}
.dropdown-item {
    color: #1a1b18 !important;
}
.dropdown-item:hover, .dropdown-item:focus, .dropdown-item.active {
    background-color: #8B9A6E !important;
    color: #F7F2EB !important;
}
.dropdown-header {
    color: #5a6647 !important;
}
.dropdown-divider {
    border-color: rgba(139, 154, 110, 0.2) !important;
}

/* Override inline neon styles inside dropdowns */
.dropdown-item span[style*="color"], .dropdown-item .badge {
    color: inherit !important;
}
.dropdown-item:hover span[style*="color"], .dropdown-item:hover .badge {
    color: #F7F2EB !important;
}
.dropdown-item small {
    color: #5a6647 !important;
}
.dropdown-item:hover small, .dropdown-item.active small {
    color: #F7F2EB !important;
}
'''
    )

print("Dropdown CSS updated.")
