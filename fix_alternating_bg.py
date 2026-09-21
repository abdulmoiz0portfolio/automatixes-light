import os

css_path = 'assets/css/main.css'
with open(css_path, 'r', encoding='utf-8') as f:
    content = f.read()

alternating_css = '''
/* Alternating Section Backgrounds (Light Theme) */
#about-section { background-color: #ffffff !important; }
#services-section { background-color: #f4f5f7 !important; }
#portfolio-section { background-color: #f4f5f7 !important; }
#technologies-section { background-color: #ffffff !important; }
#process-section { background-color: #f4f5f7 !important; }
.cta-section { background-color: #ffffff !important; }
#testimonials-section { background-color: #f4f5f7 !important; }
#faq-section { background-color: #ffffff !important; }
#contact-section { background-color: #f4f5f7 !important; }

/* Force Inner Cards to alternate cleanly against their parent sections */
#services-section .card { background-color: #ffffff !important; border-color: #e2e8f0 !important; }
#portfolio-section .card { background-color: #ffffff !important; }
#technologies-section .card { background-color: #f4f5f7 !important; border-color: #e2e8f0 !important; }
#process-section .card { background-color: #ffffff !important; border-color: #e2e8f0 !important; }
#testimonials-section .card { background-color: #ffffff !important; border-color: #e2e8f0 !important; }

/* AI Comparison Section - It immediately follows services-section */
section.bg-dark { background-color: #ffffff !important; }

/* Fix missing h2 bug */
.typewriter-anim, h2.text-white, h3.text-white { color: #1a1a1a !important; }

/* Fix Navbar Links */
.navbar-nav .nav-link { color: #1a1a1a !important; font-weight: 600; }
.navbar-brand img { filter: invert(1); } /* Invert logo for light theme */
.header-nav { background: rgba(255, 255, 255, 0.95) !important; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
.header-nav.sticky { background: rgba(255, 255, 255, 0.98) !important; }

/* Fix Marquee / Technology Bar items */
.scroller__inner li { background-color: #ffffff !important; color: #1a1a1a !important; border: 1px solid #e2e8f0 !important; }
'''

if 'Alternating Section Backgrounds' not in content:
    with open(css_path, 'a', encoding='utf-8') as f:
        f.write(alternating_css)
    print("Alternating CSS appended.")
else:
    print("Alternating CSS already exists.")
