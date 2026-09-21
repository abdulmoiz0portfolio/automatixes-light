import os

css_path = 'assets/css/main.css'
with open(css_path, 'r', encoding='utf-8') as f:
    content = f.read()

overrides = '''

/* ==========================================================================
   LIGHT THEME OVERRIDES (Global)
   ========================================================================== */
:root {
    --bg-void: #ffffff;
    --bg-base: #f4f5f7;
    --bg-surface-1: #ffffff;
    --bg-surface-2: #f4f5f7;
    --bg-surface-3: #ffffff;
    --bg-glass: rgba(255, 255, 255, 0.85);
    --bg-glass-heavy: rgba(244, 245, 247, 0.95);
    
    --text-primary: #1a1a1a;
    --text-secondary: #4b5563;
    --text-muted: #64748b;
    --text-dim: rgba(26, 26, 26, 0.6);
    --text-faint: rgba(26, 26, 26, 0.25);
    
    --text-on-neon: #1a1a1a;
    --text-dark: #1a1a1a;
    
    --bg-light: #f4f5f7;
    --bg-surface: #ffffff;
    --bg-warm-peach: #ffffff;
    --bg-light-gray: #f4f5f7;
    --bg-preloader: #f4f5f7;

    --border-subtle: #e2e8f0;
    --border-medium: #cbd5e1;
}

/* Force Bootstrap utilities to Light */
.bg-dark, .bg-black { background-color: var(--bg-void) !important; }
.text-white { color: var(--text-primary) !important; }
.text-white-50 { color: var(--text-secondary) !important; }
.border-light-subtle { border-color: var(--border-subtle) !important; }
.bg-dark-subtle { background-color: var(--bg-surface-1) !important; }
.text-light { color: var(--text-secondary) !important; }

/* Keep Hero exactly as is (Dark) */
.hero-section {
    background-color: #0b0f19 !important;
    color: #ffffff !important;
}
.hero-section .text-white, .hero-section .text-primary { color: #ffffff !important; }
.hero-section .text-white-50 { color: rgba(255,255,255,0.5) !important; }
.hero-section .text-muted { color: #94a3b8 !important; }
.hero-section .text-on-neon { color: #0b0f19 !important; }

/* Preloader specific overrides for white background */
#preloader { background-color: #ffffff !important; }
.letters-loading { 
    color: rgba(0, 0, 0, 0.05) !important; 
    -webkit-text-stroke: 1.5px rgba(0, 0, 0, 0.15) !important; 
}

/* WhatsApp Button subtle shadow for light bg */
.n8n-chat-trigger {
    box-shadow: 0 4px 15px rgba(0,0,0,0.15) !important;
}
'''

if 'LIGHT THEME OVERRIDES (Global)' not in content:
    with open(css_path, 'a', encoding='utf-8') as f:
        f.write(overrides)
    print("CSS updated successfully.")
else:
    print("CSS already contains overrides.")
