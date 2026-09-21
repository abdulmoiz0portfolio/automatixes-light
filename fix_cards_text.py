import os

css_path = 'assets/css/main.css'
with open(css_path, 'a', encoding='utf-8') as f:
    f.write('''
/* Fix Card Text Visibility */
.card .text-white, .card .text-white-50 {
    color: #1a1a1a !important;
}
.card p, .card h2, .card h3, .card h4, .card h5, .card h6 {
    color: #1a1a1a !important;
}

/* Fix Missing Heading */
.typewriter-anim { opacity: 1 !important; visibility: visible !important; color: #1a1a1a !important; }
h2 { color: #1a1a1a !important; }

/* Fix AI Comparison Cards */
.comparison-card { background-color: #ffffff !important; }
.comparison-card * { color: #1a1a1a !important; }

/* Fix Logo Marquee */
.client-logo-bar { background-color: #ffffff !important; border-bottom: 1px solid #e2e8f0 !important; }
.client-logo-bar span { color: #1a1a1a !important; }
.client-logo-bar img { filter: invert(1) brightness(0); } /* Make white logos black */

/* Fix Technology Marquee Items */
.scroller li { background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; }
.scroller li span { color: #1a1a1a !important; }
.scroller li img { filter: invert(1) brightness(0); } /* Make white logos black */

/* Fix Footer Text */
footer, .footer-section { background-color: #ffffff !important; color: #1a1a1a !important; }
footer * { color: #1a1a1a !important; }
footer a:hover { color: #00A859 !important; }
''')
print("Added explicit text color fixes to main.css")
