import os

css_path = 'assets/css/main.css'
with open(css_path, 'a', encoding='utf-8') as f:
    f.write('''
/* ==========================================================================
   USER CUSTOM PALETTE OVERRIDES
   Palette: Sage (#8B9A6E), White/Cream (#F7F2EB), Beige (#EAE2D6), Grey (#EEEEEE)
   Note: Keeping Brand Neon untouched!
   ========================================================================== */

:root {
    --bg-void: #F7F2EB !important;
    --bg-base: #EAE2D6 !important;
    --bg-surface-1: #EEEEEE !important;
    --bg-surface-2: #EAE2D6 !important;
    --bg-surface-3: #F7F2EB !important;
    
    --border-subtle: #8B9A6E !important;
    --border-medium: #8B9A6E !important;
    
    /* Text Colors - Darkened for readability on warm backgrounds */
    --text-primary: #1a1b18 !important; 
    --text-secondary: #3d4530 !important; /* Dark sage */
    --text-muted: #5a6647 !important; 
}

/* Base Body and Text */
body, html {
    background-color: #F7F2EB !important;
    color: var(--text-primary) !important;
}

/* Alternating Sections */
#about-section, #portfolio-section, #process-section, #testimonials-section, #contact-section { 
    background-color: #F7F2EB !important; 
}
#services-section, #technologies-section, #faq-section, .cta-section, footer, .footer-section, section.bg-dark, #comparison-section { 
    background-color: #EAE2D6 !important; 
}

/* Cards & Elements Background */
.card, .tech-card, .scroller li, .client-logo-bar, .comparison-card, #comparison-section .p-4.p-md-5, .service-grid-card { 
    background-color: #EEEEEE !important; 
    border-color: #8B9A6E !important; 
}

/* Preloader Background */
#preloader { background-color: #F7F2EB !important; }

/* Navbar */
.header-nav { background: rgba(247, 242, 235, 0.95) !important; border-bottom: 1px solid rgba(139, 154, 110, 0.2) !important; }
.header-nav.sticky { background: rgba(247, 242, 235, 0.98) !important; border-bottom: 1px solid #8B9A6E !important; }

/* Specific fixes for text inside cards */
.card *, .tech-card *, #comparison-section .p-4.p-md-5 * {
    color: var(--text-primary) !important;
}
.text-white, .text-white-50, .text-light, h2.text-white, h3.text-white {
    color: var(--text-primary) !important;
}

/* Hero Section EXCEPTION - Must remain dark! */
.hero-section {
    background-color: #0b0f19 !important;
    color: #ffffff !important;
}
.hero-section .text-white, .hero-section .text-primary { color: #ffffff !important; }
.hero-section .text-white-50 { color: rgba(255,255,255,0.5) !important; }
.hero-section .text-muted { color: #94a3b8 !important; }
.hero-section .text-on-neon { color: #0b0f19 !important; }
'''
    )

print("New palette applied successfully.")
