<?php $page_key = 'index'; include 'header.php'; ?>

<!-- Hero Section Start -->
<section class="hero-section position-relative d-flex align-items-center justify-content-center text-center" style="min-height: 100vh; overflow: hidden; padding-top: 100px;">
    <!-- Abstract Glowing Orbs (Automatixes Style) -->
    <div class="position-absolute rounded-circle" style="background: radial-gradient(circle, rgba(200, 224, 25,0.35) 0%, rgba(0,0,0,0) 70%); width: 700px; height: 700px; top: -100px; left: -150px; filter: blur(80px); z-index: 0; pointer-events: none;"></div>
    <div class="position-absolute rounded-circle" style="background: radial-gradient(circle, rgba(168,85,247,0.2) 0%, rgba(0,0,0,0) 70%); width: 600px; height: 600px; bottom: -50px; right: -100px; filter: blur(80px); z-index: 0; pointer-events: none;"></div>
    
    <!-- Floating Automation Workflow Nodes (Left) -->
    <style>
        @keyframes heroFloat {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
    <!-- Floating Automation Workflow Nodes (Left - n8n Workflow) -->
    <div class="position-absolute d-none d-lg-block" style="top: 25%; left: 8%; z-index: 0; opacity: 0.3; pointer-events: none; animation: heroFloat 6s ease-in-out infinite;">
        <svg width="240" height="280" viewBox="0 0 240 280" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
            <defs>
                <!-- Canvas Grid Pattern -->
                <pattern id="n8nCanvasGrid" x="0" y="0" width="16" height="16" patternUnits="userSpaceOnUse">
                    <circle cx="8" cy="8" r="0.75" fill="#ffffff" fill-opacity="0.15"/>
                </pattern>
                
                <!-- Connection Gradients -->
                <linearGradient id="n8nGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#C8E019" stop-opacity="0.9"/>
                    <stop offset="100%" stop-color="#ffffff" stop-opacity="0.7"/>
                </linearGradient>
                <linearGradient id="n8nGrad2" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.7"/>
                    <stop offset="100%" stop-color="#C8E019" stop-opacity="0.9"/>
                </linearGradient>
                <linearGradient id="n8nGrad3" x1="100%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.7"/>
                    <stop offset="100%" stop-color="#94a3b8" stop-opacity="0.5"/>
                </linearGradient>
            </defs>

            <!-- Background Canvas Texture -->
            <rect width="240" height="280" fill="url(#n8nCanvasGrid)" rx="16"/>

            <!-- Connection Paths -->
            <!-- Path 1: Trigger to AI Engine -->
            <path d="M68 44 C118 44, 102 110, 152 110" stroke="url(#n8nGrad1)" stroke-width="1.75" stroke-linecap="round" fill="none"/>
            <!-- Path 2: AI Engine to Action Sync (Vertical Primary) -->
            <path d="M176 134 L176 208" stroke="url(#n8nGrad2)" stroke-width="1.75" stroke-linecap="round" fill="none"/>
            <!-- Path 3: AI Engine to Dispatch/Notification (Branch Secondary) -->
            <path d="M152 122 C100 122, 120 198, 68 198" stroke="url(#n8nGrad3)" stroke-width="1.75" stroke-dasharray="4 4" stroke-linecap="round" fill="none"/>

            <!-- Data Packet Pulse Indicators -->
            <circle cx="110" cy="77" r="2.5" fill="#C8E019"/>
            <circle cx="176" cy="171" r="2.5" fill="#C8E019"/>
            <circle cx="108" cy="160" r="2" fill="#ffffff" fill-opacity="0.8"/>

            <!-- Node 1: Webhook Trigger (Top Left) -->
            <g id="node-trigger">
                <rect x="20" y="20" width="48" height="48" rx="12" fill="#ffffff" fill-opacity="0.04" stroke="#C8E019" stroke-width="1.5"/>
                <!-- Lightning Trigger Glyph -->
                <path d="M45 32 L37 44 L43 44 L41 56 L51 42 L45 42 Z" fill="#C8E019"/>
                <!-- Status Indicator -->
                <circle cx="62" cy="24" r="4.5" fill="#111827" stroke="#C8E019" stroke-width="1.2"/>
                <path d="M60 24 L61.5 25.5 L64.5 22.5" fill="none" stroke="#C8E019" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <!-- Output Port -->
                <circle cx="68" cy="44" r="3" fill="#C8E019" stroke="#111827" stroke-width="1"/>
            </g>

            <!-- Node 2: AI Processor / Router (Center Right) -->
            <g id="node-router">
                <rect x="152" y="86" width="48" height="48" rx="12" fill="#ffffff" fill-opacity="0.04" stroke="#ffffff" stroke-opacity="0.6" stroke-width="1.5"/>
                <!-- AI Sparkle Icon -->
                <path d="M176 99 C176 105 181 110 187 110 C181 110 176 115 176 121 C176 115 171 110 165 110 C171 110 176 105 176 99 Z" fill="#C8E019"/>
                <path d="M185 94 C185 96.5 187.5 99 190 99 C187.5 99 185 101.5 185 104 C185 101.5 182.5 99 180 99 C182.5 99 185 96.5 185 94 Z" fill="#ffffff" fill-opacity="0.8"/>
                <!-- Input Port -->
                <circle cx="152" cy="110" r="3" fill="#ffffff" stroke="#111827" stroke-width="1"/>
                <!-- Output Ports -->
                <circle cx="176" cy="134" r="3" fill="#C8E019" stroke="#111827" stroke-width="1"/>
                <circle cx="152" cy="122" r="3" fill="#94a3b8" stroke="#111827" stroke-width="1"/>
            </g>

            <!-- Node 3: Database / CRM Action (Bottom Right) -->
            <g id="node-database">
                <rect x="152" y="208" width="48" height="48" rx="12" fill="#ffffff" fill-opacity="0.04" stroke="#C8E019" stroke-width="1.5"/>
                <!-- Database / Storage Icon -->
                <ellipse cx="176" cy="223" rx="10" ry="3.5" fill="none" stroke="#C8E019" stroke-width="1.5"/>
                <path d="M166 228 C166 231 170.5 232.5 176 232.5 C181.5 232.5 186 231 186 228" fill="none" stroke="#C8E019" stroke-width="1.5"/>
                <path d="M166 234 C166 237 170.5 238.5 176 238.5 C181.5 238.5 186 237 186 234" fill="none" stroke="#C8E019" stroke-width="1.5"/>
                <line x1="166" y1="223" x2="166" y2="234" stroke="#C8E019" stroke-width="1.5"/>
                <line x1="186" y1="223" x2="186" y2="234" stroke="#C8E019" stroke-width="1.5"/>
                <!-- Input Port -->
                <circle cx="176" cy="208" r="3" fill="#C8E019" stroke="#111827" stroke-width="1"/>
            </g>

            <!-- Node 4: Dispatch / Notification (Bottom Left) -->
            <g id="node-notification">
                <rect x="20" y="174" width="48" height="48" rx="12" fill="#ffffff" fill-opacity="0.04" stroke="#ffffff" stroke-opacity="0.6" stroke-width="1.5"/>
                <!-- Paper Plane / Send Icon -->
                <path d="M35 199 L53 189 L45 207 L42 200 Z" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linejoin="round" stroke-linecap="round"/>
                <line x1="53" y1="189" x2="42" y2="200" stroke="#C8E019" stroke-width="1.5" stroke-linecap="round"/>
                <!-- Input Port -->
                <circle cx="68" cy="198" r="3" fill="#ffffff" stroke="#111827" stroke-width="1"/>
            </g>
        </svg>
    </div>
    
    <!-- Floating Automation Workflow Nodes (Right - CRM / Make Stack) -->
    <div class="position-absolute d-none d-lg-block" style="bottom: 15%; right: 10%; z-index: 0; opacity: 0.3; pointer-events: none; animation: heroFloat 8s ease-in-out infinite reverse;">
        <svg width="260" height="260" viewBox="0 0 260 260" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
            <defs>
                <!-- Flow Gradients -->
                <linearGradient id="makeFlow1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#C8E019" stop-opacity="0.9"/>
                    <stop offset="100%" stop-color="#ffffff" stop-opacity="0.7"/>
                </linearGradient>
                <linearGradient id="makeFlow2" x1="0%" y1="100%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.7"/>
                    <stop offset="100%" stop-color="#C8E019" stop-opacity="0.9"/>
                </linearGradient>
                <linearGradient id="makeFlow3" x1="0%" y1="0%" x2="100%" y2="50%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.8"/>
                    <stop offset="100%" stop-color="#C8E019" stop-opacity="0.8"/>
                </linearGradient>
                <linearGradient id="makeFlow4" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.8"/>
                    <stop offset="100%" stop-color="#94a3b8" stop-opacity="0.6"/>
                </linearGradient>
                <linearGradient id="makeFlow5" x1="100%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#C8E019" stop-opacity="0.8"/>
                    <stop offset="100%" stop-color="#94a3b8" stop-opacity="0.5"/>
                </linearGradient>
            </defs>

            <!-- Background Orbital Guide Rings (Make.com Canvas Texture) -->
            <circle cx="130" cy="130" r="55" stroke="#ffffff" stroke-opacity="0.08" stroke-dasharray="3 5" fill="none"/>
            <circle cx="130" cy="130" r="95" stroke="#C8E019" stroke-opacity="0.08" stroke-dasharray="4 6" fill="none"/>
            <circle cx="130" cy="130" r="120" stroke="#ffffff" stroke-opacity="0.04" stroke-dasharray="6 8" fill="none"/>

            <!-- Connection Conduits -->
            <!-- Conduit 1: Trigger -> Hub -->
            <path d="M63 90 C90 90, 95 130, 105 130" stroke="url(#makeFlow1)" stroke-width="1.75" stroke-linecap="round" fill="none"/>
            <!-- Conduit 2: Hub -> CRM Target -->
            <path d="M151 118 C170 100, 185 60, 197 60" stroke="url(#makeFlow2)" stroke-width="1.75" stroke-linecap="round" fill="none"/>
            <!-- Conduit 3: Hub -> Database Sync -->
            <path d="M155 135 C175 135, 185 155, 209 155" stroke="url(#makeFlow3)" stroke-width="1.75" stroke-linecap="round" fill="none"/>
            <!-- Conduit 4: Hub -> Instant Messaging -->
            <path d="M145 151 C155 175, 162 195, 173 214" stroke="url(#makeFlow4)" stroke-width="1.75" stroke-linecap="round" fill="none"/>
            <!-- Conduit 5: Hub -> AI Lead Scoring (Secondary Branch) -->
            <path d="M112 148 C95 170, 88 185, 77 204" stroke="url(#makeFlow5)" stroke-width="1.5" stroke-dasharray="3 3" stroke-linecap="round" fill="none"/>

            <!-- Filter Badge (Between Trigger and Hub) -->
            <g id="filter-badge">
                <circle cx="84" cy="110" r="6.5" fill="#111827" stroke="#C8E019" stroke-width="1.2"/>
                <path d="M81.5 107.5 L86.5 107.5 L84.5 110 L84.5 113 L83.5 113 L83.5 110 Z" fill="#C8E019"/>
            </g>

            <!-- Data Pulse Packets -->
            <circle cx="73" cy="98" r="2" fill="#ffffff"/>
            <circle cx="178" cy="84" r="2.5" fill="#C8E019"/>
            <circle cx="184" cy="147" r="2" fill="#ffffff"/>
            <circle cx="156" cy="178" r="2.5" fill="#C8E019"/>
            <circle cx="98" cy="172" r="2" fill="#C8E019"/>

            <!-- Module 1: Webhook / Lead Ingest Trigger (Top-Left) -->
            <g id="module-trigger">
                <circle cx="45" cy="90" r="23" stroke="#C8E019" stroke-opacity="0.3" stroke-width="1.25" stroke-dasharray="3 3" fill="none"/>
                <circle cx="45" cy="90" r="18" fill="#ffffff" fill-opacity="0.05" stroke="#C8E019" stroke-width="1.5"/>
                <!-- Lightning Bolt Ingest Glyph -->
                <path d="M47 81 L41 89 L46 89 L43 99 L51 88 L46 88 Z" fill="#C8E019"/>
                <!-- Connection Output Port -->
                <circle cx="63" cy="90" r="2.5" fill="#C8E019" stroke="#111827" stroke-width="0.75"/>
            </g>

            <!-- Module 2: Central Make Router / Orchestrator Hub (Center) -->
            <g id="module-router-hub">
                <circle cx="130" cy="130" r="32" stroke="#C8E019" stroke-opacity="0.2" stroke-width="1.5" stroke-dasharray="2 3" fill="none"/>
                <circle cx="130" cy="130" r="25" fill="#ffffff" fill-opacity="0.06" stroke="#ffffff" stroke-width="1.75"/>
                <circle cx="130" cy="130" r="15" fill="#C8E019" fill-opacity="0.12" stroke="#C8E019" stroke-width="1.25"/>
                <!-- Make Router Split Glyph -->
                <circle cx="130" cy="130" r="3.5" fill="#C8E019"/>
                <path d="M130 126.5 L130 120 M132.5 131.5 L138 135 M127.5 131.5 L122 135" stroke="#C8E019" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="130" cy="119" r="1.5" fill="#ffffff"/>
                <circle cx="139" cy="136" r="1.5" fill="#ffffff"/>
                <circle cx="121" cy="136" r="1.5" fill="#ffffff"/>
                <!-- Hub Connection Ports -->
                <circle cx="105" cy="130" r="2.5" fill="#C8E019"/>
                <circle cx="151" cy="118" r="2.5" fill="#C8E019"/>
                <circle cx="155" cy="135" r="2.5" fill="#ffffff"/>
                <circle cx="145" cy="151" r="2.5" fill="#ffffff"/>
                <circle cx="112" cy="148" r="2.5" fill="#94a3b8"/>
            </g>

            <!-- Module 3: CRM Lead Profile Target (Top-Right) -->
            <g id="module-crm-lead">
                <circle cx="215" cy="60" r="22" stroke="#ffffff" stroke-opacity="0.3" stroke-width="1.25" stroke-dasharray="3 3" fill="none"/>
                <circle cx="215" cy="60" r="18" fill="#ffffff" fill-opacity="0.05" stroke="#ffffff" stroke-width="1.5"/>
                <!-- CRM User Avatar Glyph -->
                <circle cx="215" cy="55" r="3.5" stroke="#C8E019" stroke-width="1.3" fill="none"/>
                <path d="M208 67 C208 63 211 61 215 61 C219 61 222 63 222 67" stroke="#C8E019" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                <circle cx="221" cy="53" r="2" fill="#C8E019"/>
                <!-- Input Port -->
                <circle cx="197" cy="60" r="2.5" fill="#ffffff" stroke="#111827" stroke-width="0.75"/>
            </g>

            <!-- Module 4: Cloud Database / Store Sync (Middle-Right) -->
            <g id="module-database-sync">
                <circle cx="225" cy="155" r="20" stroke="#C8E019" stroke-opacity="0.3" stroke-width="1.25" fill="none"/>
                <circle cx="225" cy="155" r="16" fill="#ffffff" fill-opacity="0.05" stroke="#C8E019" stroke-width="1.5"/>
                <!-- Database Cylinder Stack Glyph -->
                <ellipse cx="225" cy="148" rx="6.5" ry="2.5" fill="none" stroke="#ffffff" stroke-width="1.2"/>
                <path d="M218.5 148 L218.5 158 C218.5 160 221.5 161.5 225 161.5 C228.5 161.5 231.5 160 231.5 158 L231.5 148" fill="none" stroke="#ffffff" stroke-width="1.2"/>
                <path d="M218.5 153 C218.5 155 221.5 156.5 225 156.5 C228.5 156.5 231.5 155 231.5 153" fill="none" stroke="#C8E019" stroke-width="1.2"/>
                <!-- Input Port -->
                <circle cx="209" cy="155" r="2.5" fill="#C8E019" stroke="#111827" stroke-width="0.75"/>
            </g>

            <!-- Module 5: Instant Communications / Slack / SMS (Bottom-Right) -->
            <g id="module-messaging">
                <circle cx="185" cy="225" r="22" stroke="#ffffff" stroke-opacity="0.3" stroke-width="1.25" stroke-dasharray="4 3" fill="none"/>
                <circle cx="185" cy="225" r="17" fill="#ffffff" fill-opacity="0.05" stroke="#ffffff" stroke-width="1.5"/>
                <!-- Message Bubble Notification Glyph -->
                <path d="M178 221 C178 217.5 181 215 185 215 C189 215 192 217.5 192 221 C192 224 189 226.5 185 226.5 C184 226.5 183 226.3 182 226 L179 228 L179.5 225 C178.5 224 178 222.5 178 221 Z" fill="none" stroke="#C8E019" stroke-width="1.2" stroke-linejoin="round"/>
                <line x1="182" y1="220" x2="188" y2="220" stroke="#ffffff" stroke-width="1" stroke-linecap="round"/>
                <!-- Input Port -->
                <circle cx="173" cy="214" r="2.5" fill="#ffffff" stroke="#111827" stroke-width="0.75"/>
            </g>

            <!-- Module 6: AI Lead Scoring / Analytics (Bottom-Left) -->
            <g id="module-ai-scoring">
                <circle cx="65" cy="215" r="20" stroke="#C8E019" stroke-opacity="0.3" stroke-width="1.25" stroke-dasharray="2 3" fill="none"/>
                <circle cx="65" cy="215" r="16" fill="#ffffff" fill-opacity="0.05" stroke="#C8E019" stroke-width="1.5"/>
                <!-- Bar Chart & AI Spark Glyph -->
                <path d="M59 222 L59 217 M63 222 L63 213 M67 222 L67 215 M71 222 L71 210" stroke="#C8E019" stroke-width="1.3" stroke-linecap="round"/>
                <path d="M58 209 C60 209 61 207 61 205 C61 207 62 209 64 209 C62 209 61 211 61 213 C61 211 60 209 58 209 Z" fill="#ffffff"/>
                <!-- Input Port -->
                <circle cx="77" cy="204" r="2.5" fill="#C8E019" stroke="#111827" stroke-width="0.75"/>
            </g>
        </svg>
    </div>
    
    <div class="container position-relative z-1 hero-content py-5" style="color: var(--text-primary);">
        <span class="badge rounded-pill border border-secondary text-light mb-4 px-4 py-2" style="background: rgba(255,255,255,0.03); letter-spacing: 2px; font-size: 0.75rem; text-transform: uppercase;">
            <span style="color: #C8E019;" class="me-2">🚀</span> DIGITAL AGENCY FOR AMBITIOUS BRANDS
        </span>
        
        <h1 class="display-3 fw-bold mb-3" style="line-height: 1.15; letter-spacing: -1.5px; color: var(--text-primary);">
            We Build Systems That Work <br>
            <span style="color: var(--accent-neon);">While You Sleep.</span>
        </h1>

        <!-- Concrete Proof Line -->
        <div class="d-inline-flex flex-wrap justify-content-center align-items-center gap-2 gap-md-3 px-3 py-1.5 rounded-pill mb-4" style="background: rgba(200, 224, 25, 0.08); border: 1px solid rgba(200, 224, 25, 0.25);">
            <span class="text-white small fw-bold"><i class="fa-solid fa-chart-line text-accent-neon me-1"></i> 30%+ Pipeline Recovered</span>
            <span class="text-white-50 small">•</span>
            <span class="text-white small fw-bold"><i class="fa-solid fa-stopwatch text-accent-neon me-1"></i> Sub-60s Speed-to-Lead</span>
            <span class="text-white-50 small">•</span>
            <span class="text-white small fw-bold"><i class="fa-solid fa-clock text-accent-neon me-1"></i> 100+ Hours Saved / Month</span>
        </div>
        
        <p class="lead mx-auto mb-5" style="max-width: 720px; font-size: 1.15rem; color: var(--text-secondary); line-height: 1.7;">
            We design and deploy custom AI agents, CRM automations, and voice systems for growing businesses across industries — from real estate to e-commerce to professional services. Built on n8n, Make, and OpenAI.
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap wow fadeInUp" data-wow-delay=".4s">
            <a href="contact" class="btn text-white rounded-pill px-5 py-3 fw-semibold d-flex align-items-center" style="background: linear-gradient(135deg, #0D6171, #C8E019); border: none; box-shadow: 0 10px 25px rgba(200, 224, 25,0.4); transition: transform 0.2s;">
                Start Your Project <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
            <a href="#portfolio-section" class="btn rounded-pill px-5 py-3 fw-semibold border" style="background: rgba(255,255,255,0.05); color: var(--text-primary); border-color: rgba(255,255,255,0.1); transition: background 0.2s;">
                View Our Work
            </a>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Trusted Tools & Partnerships Strip Start -->
<div class="py-4 border-top border-bottom border-light-subtle position-relative overflow-hidden" style="background: var(--bg-void);">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 gap-md-5 text-center">
            <span class="text-white-50 small text-uppercase font-monospace fw-semibold me-md-2" style="letter-spacing: 1.5px; font-size: 11px;">
                <i class="fa-solid fa-shield-halved text-accent-neon me-1"></i> Certified Stack &amp; Partners:
            </span>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <img src="https://cdn.simpleicons.org/n8n/EA4B71" alt="n8n" style="width: 16px; height: 16px;">
                <span class="text-white small fw-semibold">n8n Certified</span>
            </div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <i class="fa-solid fa-bolt text-accent-brand" style="font-size: 13px;"></i>
                <span class="text-white small fw-semibold">GoHighLevel Partner</span>
            </div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <img src="https://cdn.simpleicons.org/openai/10A37F" alt="OpenAI" style="width: 16px; height: 16px;">
                <span class="text-white small fw-semibold">OpenAI API Specialist</span>
            </div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <img src="https://cdn.simpleicons.org/make/6D3A9C" alt="Make" style="width: 16px; height: 16px;">
                <span class="text-white small fw-semibold">Make.com Partner</span>
            </div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <img src="https://cdn.simpleicons.org/zapier/FF4A00" alt="Zapier" style="width: 16px; height: 16px;">
                <span class="text-white small fw-semibold">Zapier Expert</span>
            </div>
        </div>
    </div>
</div>
<!-- Trusted Tools & Partnerships Strip End -->

<!-- About Section Start -->
<section id="about-section" class="about-section fix section-padding" style="background: var(--bg-void);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="about-image-wrapper wow fadeInLeft position-relative" data-wow-delay=".3s">
                    <img src="assets/img/about-team.jpg" alt="AI Automation Team at Automatixes" loading="lazy" class="img-fluid rounded-4 shadow-lg border border-secondary" style="object-fit: cover; width: 100%; aspect-ratio: 4/3; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-content ps-lg-4">
                    <div class="section-title">
                        <div class="sub-title bg-color-2 wow fadeInUp mb-3">
                            <span>About Automatixes</span>
                        </div>
                        <h2 class="wow fadeInUp text-white fw-extrabold display-5 mb-4" data-wow-delay=".3s">
                            Who We Are
                        </h2>
                    </div>
                    <p class="mt-3 wow fadeInUp text-white-50 fs-5" data-wow-delay=".5s" style="line-height: 1.7;">
                        We help growing businesses across industries eliminate repetitive manual work. From lead qualification to invoice processing, we design systems that run without human intervention — built on n8n, Make, and GoHighLevel.
                    </p>
                    
                    <h5 class="fw-bold text-white mt-4 mb-3 wow fadeInUp" data-wow-delay=".3s">Who We Serve:</h5>
                    <div class="list-items wow fadeInUp" data-wow-delay=".4s">
                        <ul class="list-unstyled">
                            <li class="mb-2 d-flex align-items-start fs-6 text-white-50">
                                <i class="fa-solid fa-house-chimney text-accent-brand me-3 mt-1"></i>
                                <span><strong class="text-white">Real Estate:</strong> Automated SMS replies, lead dispatch, and calendar booking.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start fs-6 text-white-50">
                                <i class="fa-solid fa-graduation-cap text-accent-brand me-3 mt-1"></i>
                                <span><strong class="text-white">Coaches & Consultants:</strong> Automated onboarding, email nurture, and CRM updates.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start fs-6 text-white-50">
                                <i class="fa-solid fa-cart-shopping text-accent-brand me-3 mt-1"></i>
                                <span><strong class="text-white">E-Commerce:</strong> Inventory sync, abandoned cart tracking, and orders notification.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start fs-6 text-white-50">
                                <i class="fa-solid fa-wrench text-accent-brand me-3 mt-1"></i>
                                <span><strong class="text-white">Service Businesses:</strong> Auto-invoicing, feedback loops, and internal team alerts.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="main-button mt-4 wow fadeInUp" data-wow-delay=".5s">
                        <a href="about" class="btn btn-brand">
                            <span>Meet the Team</span>
                            <span class="arrow-btn"><i class="fa-solid fa-arrow-up-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Toss-away physics section removed per revamp instruction -->

<!-- Services Section Start -->
<!-- Services Section Start (3-Column Grid Matching Reference) -->
<section id="services-section" class="section-padding bg-surface text-white">
    <div class="container">
        <div class="text-center mb-5 max-w-700 mx-auto">
            <span class="badge rounded-pill border border-secondary text-light mb-3 px-3 py-2" style="background: rgba(255,255,255,0.05); letter-spacing: 1px;">SERVICES WE PROVIDE</span>
            <h2 class="display-5 fw-extrabold mb-3 text-white typewriter-anim">Our Core Offerings</h2>
            <p class="text-white-50 fs-5">We combine autonomous AI voice intelligence, smart agents, and workflow automations to scale your business.</p>
        </div>
        
        <!-- 6 Core Offerings Grid (3 Columns per Row) -->
        <div class="row g-4 justify-content-center">
            
            <!-- 1. WhatsApp Business Automation -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column service-grid-card" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="position-relative overflow-hidden" style="height: 190px; background: var(--bg-surface-2);">
                        <img src="assets/media/n8n/workflows/Customer Support Website agent.png" alt="WhatsApp Business Automation" class="w-100 h-100 object-fit-cover" loading="lazy">
                        <span class="badge rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3 shadow fw-bold" style="font-size: 10px; background: var(--bg-void); color: var(--text-primary);">
                            <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp API
                        </span>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="background: rgba(37, 211, 102, 0.12); color: #25D366; width: 42px; height: 42px; font-size: 1.15rem;">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <h4 class="h5 fw-bold text-white mb-2"><a href="whatsapp-automation" class="text-white text-decoration-none hover-neon">WhatsApp Business Automation</a></h4>
                        <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                            Sub-15s conversational AI response, instant lead qualification, dynamic PDF catalog dispatch, and automated 2-way CRM synchronization.
                        </p>
                        <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <a href="whatsapp-automation" class="text-accent-brand fw-bold small text-decoration-none d-inline-flex align-items-center gap-1.5">
                                <span>Learn More</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. CRM Lead Sync & Data Integration -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column service-grid-card" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="position-relative overflow-hidden" style="height: 190px; background: var(--bg-surface-2);">
                        <img src="assets/media/n8n/workflows/image 1.png" alt="CRM Lead Sync & Data Integration" class="w-100 h-100 object-fit-cover" loading="lazy">
                        <span class="badge rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3 shadow fw-bold" style="font-size: 10px; background: var(--bg-void); color: #000;">
                            <i class="fa-solid fa-diagram-project me-1"></i> Bi-Directional
                        </span>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; width: 42px; height: 42px; font-size: 1.15rem;">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <h4 class="h5 fw-bold text-white mb-2"><a href="crm-integration" class="text-white text-decoration-none hover-neon">CRM Lead Sync &amp; Data Integration</a></h4>
                        <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                            Connect GoHighLevel, HubSpot, and custom backends. Real-time deduplication, automated field mapping, and zero manual copy-paste.
                        </p>
                        <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <a href="crm-integration" class="text-accent-brand fw-bold small text-decoration-none d-inline-flex align-items-center gap-1.5">
                                <span>Learn More</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Email Follow-up & Nurture Automation -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column service-grid-card" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="position-relative overflow-hidden" style="height: 190px; background: var(--bg-surface-2);">
                        <img src="assets/media/n8n/workflows/Email Marketing.png" alt="Email Follow-up & Nurture Automation" class="w-100 h-100 object-fit-cover" loading="lazy">
                        <span class="badge rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3 shadow fw-bold" style="font-size: 10px; background: var(--bg-void); color: #000;">
                            <i class="fa-solid fa-envelope-open-text me-1"></i> Multi-Mailbox
                        </span>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="background: rgba(234, 179, 8, 0.12); color: #eab308; width: 42px; height: 42px; font-size: 1.15rem;">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                        <h4 class="h5 fw-bold text-white mb-2"><a href="email-automation" class="text-white text-decoration-none hover-neon">Email Follow-up &amp; Nurture Automation</a></h4>
                        <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                            Pre-verified DNS/MX zero-bounce workflows, AI reply intent sorting, and multi-touch contextual drip sequences that convert.
                        </p>
                        <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <a href="email-automation" class="text-accent-brand fw-bold small text-decoration-none d-inline-flex align-items-center gap-1.5">
                                <span>Learn More</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Cold Outreach & Lead Recovery Automation -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column service-grid-card" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="position-relative overflow-hidden" style="height: 190px; background: var(--bg-surface-2);">
                        <img src="assets/media/n8n/workflows/n8n-email-marketing-workflow.png" alt="Cold Outreach & Lead Recovery" class="w-100 h-100 object-fit-cover" loading="lazy">
                        <span class="badge rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3 shadow fw-bold" style="font-size: 10px; background: var(--bg-void); color: #000;">
                            <i class="fa-solid fa-life-ring me-1"></i> &lt;60s Recovery
                        </span>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="background: rgba(200, 224, 25, 0.12); color: #C8E019; width: 42px; height: 42px; font-size: 1.15rem;">
                            <i class="fa-solid fa-life-ring"></i>
                        </div>
                        <h4 class="h5 fw-bold text-white mb-2"><a href="lead-recovery" class="text-white text-decoration-none hover-neon">Cold Outreach &amp; Lead Recovery</a></h4>
                        <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                            Sub-60s instant speed-to-lead reply engine, DNS record validation, and automated reactivation of stalled CRM pipelines.
                        </p>
                        <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <a href="lead-recovery" class="text-accent-brand fw-bold small text-decoration-none d-inline-flex align-items-center gap-1.5">
                                <span>Learn More</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Knowledge-Base / Support Chatbot Agents -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column service-grid-card" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="position-relative overflow-hidden" style="height: 190px; background: var(--bg-surface-2);">
                        <img src="assets/img/services/ai_agents.jpg" alt="Knowledge-Base Support Chatbot Agents" class="w-100 h-100 object-fit-cover" loading="lazy">
                        <span class="badge rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3 shadow fw-bold" style="font-size: 10px; background: var(--bg-void); color: #fff;">
                            <i class="fa-solid fa-robot me-1"></i> RAG Agents
                        </span>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="background: rgba(168, 85, 247, 0.12); color: #a855f7; width: 42px; height: 42px; font-size: 1.15rem;">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <h4 class="h5 fw-bold text-white mb-2"><a href="support-agents" class="text-white text-decoration-none hover-neon">Support Chatbot Agents (Custom RAG)</a></h4>
                        <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                            Resolve 70%+ of Tier-1 support queries instantly with custom knowledge-base retrieval, zero hallucinations, and human team escalation.
                        </p>
                        <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <a href="support-agents" class="text-accent-brand fw-bold small text-decoration-none d-inline-flex align-items-center gap-1.5">
                                <span>Learn More</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. Lead Scoring & Data Extraction Automation -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column service-grid-card" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="position-relative overflow-hidden" style="height: 190px; background: var(--bg-surface-2);">
                        <img src="assets/media/n8n/workflows/workflow-02-real-estate-ai-agent.png" alt="Lead Scoring & Data Extraction" class="w-100 h-100 object-fit-cover" loading="lazy">
                        <span class="badge rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3 shadow fw-bold" style="font-size: 10px; background: var(--bg-void); color: #fff;">
                            <i class="fa-solid fa-bullseye me-1"></i> AI Intent
                        </span>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-3" style="background: rgba(239, 68, 68, 0.12); color: #f87171; width: 42px; height: 42px; font-size: 1.15rem;">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <h4 class="h5 fw-bold text-white mb-2"><a href="lead-scoring" class="text-white text-decoration-none hover-neon">Lead Scoring &amp; Data Extraction</a></h4>
                        <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                            Algorithmic ICP qualification, real-time company enrichment, and priority round-robin routing to your top account closers.
                        </p>
                        <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <a href="lead-scoring" class="text-accent-brand fw-bold small text-decoration-none d-inline-flex align-items-center gap-1.5">
                                <span>Learn More</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Center CTA Button: View All Services (Matching Image 1) -->
        <div class="text-center pt-5 mt-2">
            <a href="service" class="btn btn-brand rounded-pill px-5 py-3 fw-bold d-inline-flex align-items-center gap-2 shadow" style="font-size: 1rem;">
                <span>View All Services</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- AI Comparison Section Start -->
<section id="comparison-section" class="py-5 bg-dark text-white border-top border-light-subtle">
    <div class="container max-w-1000">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".1s">
            <span class="badge rounded-pill border border-secondary text-light mb-3 px-3 py-2" style="background: rgba(255,255,255,0.05); letter-spacing: 1px;">CHOOSE YOUR SOLUTION</span>
            <h2 class="display-6 fw-extrabold mb-3 typewriter-anim">AI Agents vs AI Automations</h2>
            <p class="text-white-50 fs-5 mx-auto max-w-700">Not sure which service fits your business? Here is the core difference.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- AI Agents Column -->
            <div class="col-md-6 wow fadeInLeft" data-wow-delay=".2s">
                <div class="p-4 p-md-5 h-100 rounded-4 d-flex flex-column" style="background: var(--bg-surface-2); border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 15px 35px rgba(0,0,0,0.3);">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-brand-translucent text-accent-brand rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 56px; height: 56px; font-size: 24px;">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-0 text-white">Autonomous AI Agents</h3>
                    </div>
                    <p class="text-accent-brand fw-bold mb-3 small text-uppercase font-monospace" style="letter-spacing: 1.5px;">The "Decision Makers"</p>
                    <p class="text-white-50 mb-4 fs-6 lh-lg flex-grow-1">Intelligent virtual assistants that understand context and make dynamic decisions. Ideal for handling customer conversations, qualifying leads, and providing 24/7 support without strict rule paths.</p>
                    <ul class="list-unstyled text-white-50 mb-5">
                        <li class="mb-3 d-flex align-items-start"><i class="fa-solid fa-check text-success mt-1 me-3"></i> <span>Natural language understanding</span></li>
                        <li class="mb-3 d-flex align-items-start"><i class="fa-solid fa-check text-success mt-1 me-3"></i> <span>Dynamic problem solving</span></li>
                        <li class="mb-3 d-flex align-items-start"><i class="fa-solid fa-check text-success mt-1 me-3"></i> <span>Custom trained on your knowledge base</span></li>
                    </ul>
                    <a href="ai-Agent-Automations" class="btn btn-outline-light btn-lg w-100 fw-bold border-2">Explore AI Agents <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>

            <!-- AI Automations Column -->
            <div class="col-md-6 wow fadeInRight" data-wow-delay=".3s">
                <div class="p-4 p-md-5 h-100 rounded-4 d-flex flex-column" style="background: var(--bg-surface-2); border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 15px 35px rgba(0,0,0,0.3);">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-brand-translucent text-accent-brand rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 56px; height: 56px; font-size: 24px;">
                            <i class="fa-solid fa-gears"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-0 text-white">End-to-End Automations</h3>
                    </div>
                    <p class="text-accent-brand fw-bold mb-3 small text-uppercase font-monospace" style="letter-spacing: 1.5px;">The "Task Doers"</p>
                    <p class="text-white-50 mb-4 fs-6 lh-lg flex-grow-1">Strict, rule-based workflows that connect your existing software stack. Best for moving data, syncing CRMs, triggering emails, and eliminating manual copy-paste tasks instantly.</p>
                    <ul class="list-unstyled text-white-50 mb-5">
                        <li class="mb-3 d-flex align-items-start"><i class="fa-solid fa-check text-success mt-1 me-3"></i> <span>Rule-based exact execution</span></li>
                        <li class="mb-3 d-flex align-items-start"><i class="fa-solid fa-check text-success mt-1 me-3"></i> <span>API & Webhook integrations</span></li>
                        <li class="mb-3 d-flex align-items-start"><i class="fa-solid fa-check text-success mt-1 me-3"></i> <span>100% predictable outcomes</span></li>
                    </ul>
                    <a href="ai-Agent-Automations" class="btn btn-outline-light btn-lg w-100 fw-bold border-2">Explore Automations <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- AI Comparison Section End -->

<!-- =========================================================================
     NOTABLE PROJECTS / PORTFOLIO SECTION (#portfolio-section)
     ========================================================================= -->
<section id="portfolio-section" class="py-5 text-white position-relative overflow-hidden" style="background: var(--bg-void); border-top: 1px solid rgba(255,255,255,0.06);">
    <!-- Ambient Atmospheric Glows -->
    <div class="position-absolute rounded-circle pointer-events-none" style="background: radial-gradient(circle, rgba(200, 224, 25, 0.12) 0%, rgba(0,0,0,0) 70%); width: 600px; height: 600px; top: 0; left: 10%; filter: blur(90px); z-index: 0;"></div>
    <div class="position-absolute rounded-circle pointer-events-none" style="background: radial-gradient(circle, rgba(56, 189, 248, 0.08) 0%, rgba(0,0,0,0) 70%); width: 500px; height: 500px; bottom: 0; right: 5%; filter: blur(85px); z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <!-- Header -->
        <div class="text-center mb-5 max-w-800 mx-auto">
            <span class="badge rounded-pill px-3 py-1.5 font-monospace mb-3" style="background: rgba(200, 224, 25, 0.08); color: var(--accent-neon, #C8E019); border: 1px solid rgba(200, 224, 25, 0.25); font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase;">
                OUR PORTFOLIO
            </span>
            <h2 class="display-5 fw-extrabold text-white mb-3" style="letter-spacing: -0.03em;">
                Notable <span style="background: linear-gradient(135deg, #FFFFFF 30%, #C8E019 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Projects</span>
            </h2>
            <p class="text-white-50 fs-5 mx-auto" style="max-width: 680px; line-height: 1.6;">
                Explore our extensive portfolio of production AI agents, autonomous workflows, and custom engineering deployments.
            </p>
        </div>

        <!-- 3-Card Portfolio Grid -->
        <div class="row g-4 mb-5 justify-content-center">
            <!-- Project 1: Voice Calling Agent -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease; box-shadow: 0 10px 30px rgba(0,0,0,0.35);">
                    <!-- Project Image with Floating Badge -->
                    <div class="position-relative overflow-hidden" style="height: 230px; background: var(--bg-surface-2);">
                        <img src="assets/img/services/ai_agents.jpg" 
                             alt="Autonomous Calling Voice Bot" 
                             class="w-100 h-100 object-fit-cover" 
                             loading="lazy" 
                             style="transition: transform 0.4s ease;">
                        <span class="badge rounded-pill px-3 py-1.5 position-absolute top-0 start-0 m-3 shadow" style="background: var(--bg-void); color: var(--text-primary); font-size: 0.72rem; font-weight: 700; letter-spacing: 0.04em;">
                            <i class="fa-solid fa-microphone-lines me-1"></i> Conversational Voice
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div>
                            <h4 class="h5 fw-bold text-white mb-2 d-flex align-items-center" style="min-height: 52px; line-height: 1.35;">Autonomous Inbound &amp; Outbound Voice Bot</h4>
                            <p class="text-secondary small mb-3" style="line-height: 1.6; min-height: 90px;">
                                Production conversational voice agent answering customer calls, qualifying high-intent prospects, answering objections, and synchronizing appointments directly into HubSpot &amp; Calendar.
                            </p>
                            <div class="d-flex align-items-center gap-2 text-white-50 small mb-3 font-monospace" style="min-height: 24px; font-size: 0.78rem;">
                                <i class="fa-solid fa-phone-volume text-info flex-shrink-0"></i>
                                <span class="text-truncate">Global Telephony • Real-Time Voice</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <span class="badge bg-dark text-info border border-info border-opacity-25 font-monospace small px-2.5 py-1.5" title="Interactive Browser Voice Bot">
                                <i class="fa-solid fa-bolt text-info me-1" style="font-size: 9px;"></i> Live Interactive Demo
                            </span>
                            <a href="voice-agent" class="btn btn-sm btn-brand rounded-pill px-3 py-1.5 fw-bold d-inline-flex align-items-center gap-1.5 text-nowrap" style="font-size: 0.8rem; white-space: nowrap;">
                                <span>Try Voice Demo</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 2: Automated Cold Email Outreach Engine -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease; box-shadow: 0 10px 30px rgba(0,0,0,0.35);">
                    <!-- Project Image with Floating Badge -->
                    <div class="position-relative overflow-hidden" style="height: 230px; background: var(--bg-surface-2);">
                        <img src="assets/media/n8n/workflows/n8n-email-marketing-workflow.png" 
                             alt="Automated Cold Email Engine" 
                             class="w-100 h-100 object-fit-cover" 
                             loading="lazy" 
                             style="transition: transform 0.4s ease;">
                        <span class="badge rounded-pill px-3 py-1.5 position-absolute top-0 start-0 m-3 shadow" style="background: var(--bg-void); color: var(--text-primary); font-size: 0.72rem; font-weight: 700; letter-spacing: 0.04em;">
                            <i class="fa-solid fa-diagram-project me-1"></i> n8n Enterprise Workflow
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div>
                            <h4 class="h5 fw-bold text-white mb-2 d-flex align-items-center" style="min-height: 52px; line-height: 1.35;">Automated Cold Outreach &amp; Deliverability Engine</h4>
                            <p class="text-secondary small mb-3" style="line-height: 1.6; min-height: 90px;">
                                Multi-mailbox distributed cold outreach architecture integrating Zoho Mail, Google Sheets API, and DNS MX validation with automated reply sentiment tracking and zero-bounce safeguard.
                            </p>
                            <div class="d-flex align-items-center gap-2 text-white-50 small mb-3 font-monospace" style="min-height: 24px; font-size: 0.78rem;">
                                <i class="fa-solid fa-shield-halved text-success flex-shrink-0"></i>
                                <span class="text-truncate">Multi-Mailbox • 0% Bounce Loss</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <span class="badge bg-dark text-warning border border-warning border-opacity-25 font-monospace small px-2.5 py-1.5" title="Verified Architecture Blueprint">
                                <i class="fa-solid fa-diagram-project text-warning me-1" style="font-size: 9px;"></i> Production Blueprint / Internal Benchmark
                            </span>
                            <a href="ai-Agent-Automations" class="btn btn-sm btn-brand rounded-pill px-3 py-1.5 fw-bold d-inline-flex align-items-center gap-1.5 text-nowrap" style="font-size: 0.8rem; white-space: nowrap;">
                                <span>Inspect Workflow</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 3: Real Estate Concierge -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 rounded-4 overflow-hidden border border-secondary border-opacity-25 d-flex flex-column" style="background: var(--bg-surface-1); transition: transform 0.3s ease, box-shadow 0.3s ease; box-shadow: 0 10px 30px rgba(0,0,0,0.35);">
                    <!-- Project Image with Floating Badge -->
                    <div class="position-relative overflow-hidden" style="height: 230px; background: var(--bg-surface-2);">
                        <img src="assets/media/n8n/workflows/workflow-02-real-estate-ai-agent.png" 
                             alt="Property Advisor - Real Estate Concierge" 
                             class="w-100 h-100 object-fit-cover" 
                             loading="lazy" 
                             style="transition: transform 0.4s ease;">
                        <span class="badge rounded-pill px-3 py-1.5 position-absolute top-0 start-0 m-3 shadow" style="background: var(--bg-void); color: var(--text-primary); font-size: 0.72rem; font-weight: 700; letter-spacing: 0.04em;">
                            <i class="fa-solid fa-building-columns me-1"></i> Real Estate Concierge
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div>
                            <h4 class="h5 fw-bold text-white mb-2 d-flex align-items-center" style="min-height: 52px; line-height: 1.35;">Property Advisor — Real Estate Concierge</h4>
                            <p class="text-secondary small mb-3" style="line-height: 1.6; min-height: 90px;">
                                Interactive digital concierge for prime developments. Qualifies buyer criteria, delivers verified pricing benchmarks, clarifies documentation (NOC &amp; Fard), and schedules private viewings 24/7.
                            </p>
                            <div class="d-flex align-items-center gap-2 text-white-50 small mb-3 font-monospace" style="min-height: 24px; font-size: 0.78rem;">
                                <i class="fa-solid fa-location-dot text-danger flex-shrink-0"></i>
                                <span class="text-truncate">Pakistan Property • 24/7 Concierge</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-25 mt-auto">
                            <span class="badge bg-dark text-success border border-success border-opacity-25 font-monospace small px-2.5 py-1.5" title="Internal Demonstration Build">
                                <i class="fa-solid fa-laptop-code text-success me-1" style="font-size: 9px;"></i> Demo Project / Internal Build
                            </span>
                            <a href="propertybot" class="btn btn-sm btn-brand rounded-pill px-3 py-1.5 fw-bold d-inline-flex align-items-center gap-1.5 text-nowrap" style="font-size: 0.8rem; white-space: nowrap;">
                                <span>Try Live Demo</span>
                                <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center CTA Button: View All Projects -->
        <div class="text-center pt-2">
            <a href="portfolio" class="btn btn-brand rounded-pill px-5 py-3 fw-bold d-inline-flex align-items-center gap-2 shadow" style="font-size: 1.05rem;">
                <span>View All Projects</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- Notable Projects Section End -->



<!-- Technologies We Engineer With Marquee Section Start -->
<section id="technologies-section" class="py-5 bg-surface text-white border-top border-light-subtle overflow-hidden">
    <div class="container mb-4">
        <div class="text-center">
            <span class="badge rounded-pill border border-secondary text-light mb-2 px-3 py-1 font-monospace" style="background: rgba(255,255,255,0.05); font-size: 11px;">ARCHITECTURE STACK</span>
            <h3 class="fw-extrabold text-white m-0 fs-3 text-uppercase" style="letter-spacing: 1px;">Technologies We Engineer With</h3>
            <p class="text-white-50 small mt-1 mb-0">Production-hardened automation tools, AI models, and enterprise APIs.</p>
        </div>
    </div>

    <!-- Infinite Scrolling Marquee -->
    <div class="marquee-wrapper">
        <div class="marquee-track">
            <!-- Original Set -->
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/n8n/EA4B71" alt="n8n" width="32" height="32" loading="lazy">
                <span>n8n</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/make/6D3A9C" alt="Make.com" width="32" height="32" loading="lazy">
                <span>Make.com</span>
            </div>
            <div class="tech-card">
                <div class="tech-icon-box" style="color: #C8E019;"><i class="fa-solid fa-bolt fs-4"></i></div>
                <span>GoHighLevel</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/openai/10A37F" alt="OpenAI" width="32" height="32" loading="lazy">
                <span>OpenAI</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/anthropic/D97706" alt="Claude" width="32" height="32" loading="lazy">
                <span>Claude</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/supabase/3ECF8E" alt="Supabase" width="32" height="32" loading="lazy">
                <span>Supabase</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/postgresql/4169E1" alt="PostgreSQL" width="32" height="32" loading="lazy">
                <span>PostgreSQL</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/hubspot/FF7A59" alt="HubSpot" width="32" height="32" loading="lazy">
                <span>HubSpot</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/whatsapp/25D366" alt="WhatsApp API" width="32" height="32" loading="lazy">
                <span>WhatsApp API</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/twilio/F22F46" alt="Twilio" width="32" height="32" loading="lazy">
                <span>Twilio</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/airtable/18BFFF" alt="Airtable" width="32" height="32" loading="lazy">
                <span>Airtable</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/googlesheets/34A853" alt="Google Sheets API" width="32" height="32" loading="lazy">
                <span>Google Sheets API</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/slack/ECB22E" alt="Slack" width="32" height="32" loading="lazy">
                <span>Slack</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/firebase/FFCA28" alt="Firebase" width="32" height="32" loading="lazy">
                <span>Firebase</span>
            </div>
            <div class="tech-card">
                <div class="tech-icon-box" style="color: #C8E019;"><i class="fa-solid fa-microphone-lines fs-4"></i></div>
                <span>Retell AI</span>
            </div>

            <!-- Exact Duplicate Set (for seamless -50% infinite loop) -->
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/n8n/EA4B71" alt="n8n" width="32" height="32" loading="lazy">
                <span>n8n</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/make/6D3A9C" alt="Make.com" width="32" height="32" loading="lazy">
                <span>Make.com</span>
            </div>
            <div class="tech-card">
                <div class="tech-icon-box" style="color: #C8E019;"><i class="fa-solid fa-bolt fs-4"></i></div>
                <span>GoHighLevel</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/openai/10A37F" alt="OpenAI" width="32" height="32" loading="lazy">
                <span>OpenAI</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/anthropic/D97706" alt="Claude" width="32" height="32" loading="lazy">
                <span>Claude</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/supabase/3ECF8E" alt="Supabase" width="32" height="32" loading="lazy">
                <span>Supabase</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/postgresql/4169E1" alt="PostgreSQL" width="32" height="32" loading="lazy">
                <span>PostgreSQL</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/hubspot/FF7A59" alt="HubSpot" width="32" height="32" loading="lazy">
                <span>HubSpot</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/whatsapp/25D366" alt="WhatsApp API" width="32" height="32" loading="lazy">
                <span>WhatsApp API</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/twilio/F22F46" alt="Twilio" width="32" height="32" loading="lazy">
                <span>Twilio</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/airtable/18BFFF" alt="Airtable" width="32" height="32" loading="lazy">
                <span>Airtable</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/googlesheets/34A853" alt="Google Sheets API" width="32" height="32" loading="lazy">
                <span>Google Sheets API</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/slack/ECB22E" alt="Slack" width="32" height="32" loading="lazy">
                <span>Slack</span>
            </div>
            <div class="tech-card">
                <img src="https://cdn.simpleicons.org/firebase/FFCA28" alt="Firebase" width="32" height="32" loading="lazy">
                <span>Firebase</span>
            </div>
            <div class="tech-card">
                <div class="tech-icon-box" style="color: #C8E019;"><i class="fa-solid fa-microphone-lines fs-4"></i></div>
                <span>Retell AI</span>
            </div>

        </div>
    </div>
</section>
<!-- Technologies We Engineer With Marquee Section End -->

<style>
.marquee-wrapper {
    overflow: hidden;
    position: relative;
    width: 100%;
    padding: 12px 0;
    -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
}

.marquee-track {
    display: flex;
    gap: 1.5rem;
    width: max-content;
    animation: scroll-marquee 50s linear infinite;
    will-change: transform;
}

.marquee-wrapper:hover .marquee-track {
    animation-play-state: paused;
}

@keyframes scroll-marquee {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}

.tech-card {
    flex: 0 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1.25rem 1.5rem;
    background: var(--bg-void);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    min-width: 130px;
    height: 98px;
    position: relative;
    z-index: 2;
    overflow: hidden;
    transition: border-color 0.25s ease, background 0.25s ease, transform 0.25s ease;
}

.tech-card:hover {
    border-color: rgba(200, 224, 25, 0.4) !important;
    background: var(--bg-void);
    transform: translateY(-2px);
}

.tech-card img {
    width: 32px;
    height: 32px;
    object-fit: contain;
    display: block;
}

.tech-card .tech-icon-box {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.tech-card span {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-primary);
    white-space: nowrap;
    letter-spacing: 0.2px;
    line-height: 1.2;
    text-align: center;
}
</style>


<!-- Our Process Section Start -->
<section id="process-section" class="py-5 bg-surface text-white border-top border-light-subtle">
    <div class="container">
        <div class="p-4 p-md-4 rounded-4 text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-2 gap-md-4 mb-3">
                <span class="badge rounded-pill px-3 py-1 text-dark fw-bold" style="background: var(--bg-void); font-size: 11px;">HOW WE WORK</span>
                <span class="text-white fw-bold fs-5 d-flex align-items-center gap-2">
                    <span>Audit</span> <i class="fa-solid fa-arrow-right text-accent-brand" style="font-size: 12px;"></i>
                    <span>Architecture</span> <i class="fa-solid fa-arrow-right text-accent-brand" style="font-size: 12px;"></i>
                    <span>Build</span> <i class="fa-solid fa-arrow-right text-accent-brand" style="font-size: 12px;"></i>
                    <span>Deploy &amp; Monitor</span>
                </span>
            </div>
            <p class="text-white-50 small mb-3">From identifying manual bottlenecks to deploying self-healing production pipelines with 24/7 telemetry.</p>
            <a href="process" class="btn btn-sm btn-outline-brand rounded-pill px-4 py-2 fw-bold d-inline-flex align-items-center gap-2">
                <span>See our 4-step process in detail</span>
                <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
            </a>
        </div>
    </div>
</section>
<!-- Our Process Section End -->





<!-- CTA Section Start -->
<section class="cta-section section-padding bg-surface border-top border-light-subtle text-center">
    <div class="container max-w-700">
        <span class="badge rounded-pill border border-secondary text-light mb-3 px-3 py-2" style="background: rgba(255,255,255,0.05); letter-spacing: 1px;">LET'S BUILD SOMETHING GREAT</span>
        <h2 class="display-4 fw-extrabold mb-4 text-white">Ready to grow your business online?</h2>
        <p class="fs-5 text-white-50 mb-5">Book a free, no-pressure consultation. We'll review your goals and tell you exactly what it'll take.</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="contact" class="btn btn-brand btn-lg px-5 py-3 shadow-sm">
                <span>Book a Free Consultation</span>
                <span class="arrow-btn"><i class="fa-solid fa-calendar-check"></i></span>
            </a>
            <a href="ai-Agent-Automations" class="btn btn-outline-light btn-lg px-5 py-3">
                <span>See Services</span>
            </a>
        </div>
    </div>
</section>
<!-- CTA Section End -->
<!-- Testimonials / Honesty Positioning Section Start -->
<section id="testimonials-section" class="py-5 bg-surface text-white border-top border-light-subtle">
    <div class="container max-w-800 text-center">
        <div class="p-4 p-md-5 rounded-4" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08);">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(200, 224, 25, 0.1); border: 1px solid rgba(200, 224, 25, 0.25);">
                <span class="text-accent-brand small fw-bold"><i class="fa-solid fa-handshake text-accent-neon me-1"></i> HONESTY FIRST</span>
            </div>
            <h3 class="display-6 fw-bold text-white mb-3">Proof Over Promises</h3>
            <p class="fs-5 text-white-50 mb-4" style="line-height: 1.7;">
                We're a new agency. Instead of inflated testimonials, we let our working systems speak for themselves. Test our live voice assistant or inspect our technical lead recovery blueprint.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="voice-agent" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold d-inline-flex align-items-center gap-2 shadow">
                    <i class="fa-solid fa-microphone-lines"></i>
                    <span>Try Live Voice Demo</span>
                </a>
                <a href="case-study" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold d-inline-flex align-items-center gap-2">
                    <i class="fa-solid fa-diagram-project text-accent-brand"></i>
                    <span>Inspect n8n Case Study</span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials / Honesty Positioning Section End -->

<!-- FAQ Section Start -->
<section id="faq-section" class="section-padding bg-transparent text-white border-top border-light-subtle">
    <div class="container max-w-800">
        <div class="text-center mb-5">
            <span class="badge rounded-pill border border-secondary text-light mb-3 px-3 py-2" style="background: rgba(255,255,255,0.05); letter-spacing: 1px;">QUESTIONS</span>
            <h2 class="display-5 fw-extrabold mb-3 text-white typewriter-anim">Frequently Asked Questions</h2>
            <p class="text-white-50 fs-5">Common queries answered about our AI Voice Agents and automation systems.</p>
        </div>
        
        <div class="accordion accordion-flush" id="faqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        How long does an AI Automation workflow setup take?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white-50 py-3">
                        Generally, standard workflow automations (like email pipelines, CRM syncing, or simple chatbots) take between 1 to 2 weeks to design, integrate, test, and launch.
                    </div>
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Are my client leads and databases secure with your setup?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white-50 py-3">
                        Yes. Your data is protected by strict Firestore security rules that control exactly who can read or write it, and all form submissions are validated and sanitized server-side to block spam and malicious input.
                    </div>
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Can we link third-party tools like Slack or WhatsApp?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white-50 py-3">
                        Yes, we integrate n8n, Make, or custom API endpoints to route data triggers to WhatsApp business channels, Slack workspaces, or local Discord systems.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ Section End -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How long does an AI Automation workflow setup take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Generally, standard workflow automations (like email pipelines, CRM syncing, or simple chatbots) take between 1 to 2 weeks to design, integrate, test, and launch."
      }
    },
    {
      "@type": "Question",
      "name": "Are my client leads and databases secure with your setup?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Your data is protected by strict Firestore security rules that control exactly who can read or write it, and all form submissions are validated and sanitized server-side to block spam and malicious input."
      }
    },
    {
      "@type": "Question",
      "name": "Can we link third-party tools like Slack or WhatsApp?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we integrate n8n, Make, or custom API endpoints to route data triggers to WhatsApp business channels, Slack workspaces, or local Discord systems."
      }
    }
  ]
}
</script>

<!-- Contact Section Start -->
<section id="contact-section" class="section-padding bg-surface text-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <span class="badge rounded-pill border border-secondary text-light mb-3 px-3 py-2" style="background: rgba(255,255,255,0.05); letter-spacing: 1px;">GET IN TOUCH</span>
                <h2 class="display-6 fw-extrabold text-white mb-4 typewriter-anim">Start Your Automation Journey</h2>
                <p class="text-white-50 fs-5 mb-4">
                    Send us your details. Submitting this form writes directly to our Firestore database and triggers our notifications.
                </p>
                <div class="contact-details mt-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box me-3"><i class="fa-solid fa-envelope text-accent-brand"></i></div>
                        <div>
                            <h6 class="mb-0 text-white-50">Email Us</h6>
                            <a href="mailto:contact@automatixes.com" class="text-white text-decoration-none fw-bold">contact@automatixes.com</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="icon-box me-3"><i class="fa-solid fa-phone text-accent-brand"></i></div>
                        <div>
                            <h6 class="mb-0 text-white-50">Call Us</h6>
                            <a href="tel:+923366920141" class="text-white text-decoration-none fw-bold">+92 336 6920141</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="contact-form-wrapper p-4 p-md-5 rounded-4 shadow-sm bg-surface-1 border border-secondary border-opacity-25">
                    <form id="contact-firebase-form" novalidate>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="contact-name" class="form-label text-white fw-bold">Full Name</label>
                                <input type="text" class="form-control border-light-subtle bg-transparent text-white" id="contact-name" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact-email" class="form-label text-white fw-bold">Email Address</label>
                                <input type="email" class="form-control border-light-subtle bg-transparent text-white" id="contact-email" placeholder="john@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact-phone" class="form-label text-white fw-bold">Phone</label>
                                <input type="tel" class="form-control border-light-subtle bg-transparent text-white" id="contact-phone" placeholder="+92 300 1234567">
                            </div>
                            <div class="col-md-6">
                                <label for="contact-biz-link" class="form-label text-white fw-bold">Business / Freelancer Link</label>
                                <input type="url" class="form-control border-light-subtle bg-transparent text-white" id="contact-biz-link" placeholder="https://yourprofile.com">
                            </div>
                            <div class="col-12">
                                <label for="contact-service" class="form-label text-white fw-bold">Service Required</label>
                                <select class="form-select border-light-subtle bg-transparent text-white" id="contact-service" required>
                                    <option value="" disabled selected>Select a Service</option>
                                    <option value="AI Voice Agents">Autonomous AI Voice Agents</option>
                                    <option value="AI Automations">AI Automations (n8n/Make)</option>
                                    <option value="CRM Integration">CRM & Custom API Integration</option>
                                    <option value="Consultation">General Automation Consultation</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="contact-message" class="form-label text-white fw-bold">Project Description</label>
                                <textarea class="form-control border-light-subtle bg-transparent text-white" id="contact-message" rows="4" placeholder="Tell us about your requirements..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-brand w-100 py-3"><span>Send Message</span> <span class="arrow-btn"><i class="fa-solid fa-arrow-up-right"></i></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- JSON-LD FAQ and Review Schemas -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "How long does an AI Automation workflow setup take?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Generally, standard workflow automations (like email pipelines, CRM syncing, or simple chatbots) take between 1 to 2 weeks to design, integrate, test, and launch."
    }
  },{
    "@type": "Question",
    "name": "Are my client leads and databases secure with your setup?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes. Your data is protected by strict Firestore security rules that control exactly who can read or write it, and all form submissions are validated and sanitized server-side to block spam and malicious input."
    }
  },{
    "@type": "Question",
    "name": "Can we link third-party tools like Slack or WhatsApp?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, we integrate n8n, Make, or custom API endpoints to route data triggers to WhatsApp business channels, Slack workspaces, or local Discord systems."
    }
  }]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Review",
  "itemReviewed": {
    "@type": "LocalBusiness",
    "name": "Automatixes"
  },
  "author": {
    "@type": "Person",
    "name": "M. Ibrahim"
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": "5"
  },
  "reviewBody": "Automatixes transformed our sales onboarding. They built a custom n8n lead scoring agent that synced our calendar, CRM, and emails seamlessly. The team was fast, professional, and precise!"
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Review",
  "itemReviewed": {
    "@type": "LocalBusiness",
    "name": "Automatixes"
  },
  "author": {
    "@type": "Person",
    "name": "Sarah K."
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": "5"
  },
  "reviewBody": "The AI Voice Agent they deployed handles our customer queries and call bookings around the clock without latency. Coupled with their custom automated lead pipelines, our response speed and conversion rate skyrocketed!"
}
</script>

<?php include 'footer.php'; ?>






