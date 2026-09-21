<?php 
$page_key = 'whatsapp-api'; 
include 'header.php'; 
?>

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden" style="padding-top: 180px; padding-bottom: 120px;">
    <!-- Ambient Glow -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 0; pointer-events: none; overflow: hidden;">
        <div class="position-absolute" style="top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, rgba(37, 211, 102, 0.15) 0%, rgba(0,0,0,0) 70%); filter: blur(70px);"></div>
        <div class="position-absolute" style="bottom: -20%; right: -10%; width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(231,127,35,0.1) 0%, rgba(0,0,0,0) 70%); filter: blur(80px);"></div>
    </div>
    
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center mx-auto" style="max-width: 950px;">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-surface-2 border border-light-subtle mb-4 wow fadeInUp">
                <span class="d-inline-block rounded-circle" style="width:8px; height:8px; background:#25D366; box-shadow: 0 0 10px #25D366;"></span>
                <span class="text-white small fw-semibold tracking-wide text-uppercase">Automatixes WhatsApp Multi-Device Engine v2.0</span>
            </div>
            
            <h1 class="display-3 fw-bold mb-4" style="line-height: 1.15; letter-spacing: -2px; color: #ffffff;">
                High-Performance <br>
                <span style="color: #25D366;">WhatsApp Multi-Device API</span>
            </h1>
            
            <p class="lead mx-auto mb-5" style="max-width: 720px; font-size: 1.2rem; color: #9ca3af;">
                Scale your conversational automation with ultra-low latency Baileys v6+ sockets, multi-tenant instance control, native AI bot integrations, and real-time WebSockets. Built & architected by <strong>Moiz Baig</strong>.
            </p>
            
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="https://github.com/abdulmoiz0portfolio/automatixes-api" target="_blank" rel="noopener noreferrer" class="btn-magnetic btn-magnetic-neon" data-cursor="magnetic">
                    <span class="btn-magnetic-inner"><i class="fa-brands fa-github me-2"></i>View GitHub Repository</span>
                </a>
                <a href="contact" class="btn-magnetic btn-magnetic-primary" data-cursor="magnetic">
                    <span class="btn-magnetic-inner">Book Enterprise Setup <i class="fa-solid fa-arrow-right ms-1"></i></span>
                </a>
            </div>

            <!-- Fast Stats -->
            <div class="row g-4 mt-5 pt-4 border-top border-light-subtle text-center">
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold mb-1 text-white">99.99%</h3>
                    <p class="text-secondary small mb-0">Multi-Device Uptime</p>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold mb-1" style="color: #25D366;">&lt; 50ms</h3>
                    <p class="text-secondary small mb-0">Event Latency</p>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold mb-1 text-white">100%</h3>
                    <p class="text-secondary small mb-0">Self-Hosted & Private</p>
                </div>
                <div class="col-6 col-md-3">
                    <h3 class="fw-bold mb-1 text-white">Zero</h3>
                    <p class="text-secondary small mb-0">Third-Party Tracking</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Features Section -->
<section class="section-padding position-relative border-top border-light-subtle bg-surface-1">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-5">
            <h6 class="text-uppercase tracking-wider fw-bold text-accent-brand mb-2">Core Engine Architecture</h6>
            <h2 class="display-5 fw-bold mb-3 text-white">Engineered for Massive Scale & Reliability</h2>
            <p class="text-secondary">Direct multi-session architecture designed for mission-critical WhatsApp applications.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 p-4 border border-light-subtle bg-surface-2 rounded-4">
                    <div class="mb-3 text-success fs-2"><i class="fa-solid fa-qrcode"></i></div>
                    <h4 class="text-white fw-bold mb-2">QR & Pairing Code Auth</h4>
                    <p class="text-secondary small mb-0">Pair your WhatsApp device in seconds using real-time QR code stream or direct phone pairing code without physical phone scans.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-4 border border-light-subtle bg-surface-2 rounded-4">
                    <div class="mb-3 text-warning fs-2"><i class="fa-solid fa-robot"></i></div>
                    <h4 class="text-white fw-bold mb-2">Native AI Integrations</h4>
                    <p class="text-secondary small mb-0">Direct plug-and-play connections to OpenAI ChatGPT, Google Gemini, Flowise, Typebot, n8n, and Dify with zero custom middle layers.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-4 border border-light-subtle bg-surface-2 rounded-4">
                    <div class="mb-3 text-info fs-2"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="text-white fw-bold mb-2">Real-Time WebSockets & Hooks</h4>
                    <p class="text-secondary small mb-0">Stream every message, status receipt, call, and reaction immediately into your server stack with sub-millisecond dispatch times.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-4 border border-light-subtle bg-surface-2 rounded-4">
                    <div class="mb-3 text-primary fs-2"><i class="fa-solid fa-layer-group"></i></div>
                    <h4 class="text-white fw-bold mb-2">RabbitMQ & Redis Queues</h4>
                    <p class="text-secondary small mb-0">Horizontally scale your outbound broadcasts with native Redis, AWS SQS, and RabbitMQ message queues to prevent throttling.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-4 border border-light-subtle bg-surface-2 rounded-4">
                    <div class="mb-3 text-danger fs-2"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="text-white fw-bold mb-2">Enterprise Security & E2EE</h4>
                    <p class="text-secondary small mb-0">Preserves Signal protocol end-to-end encryption. Strict API key scoping, isolated multi-tenant workspaces, and IP rate limiting.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 p-4 border border-light-subtle bg-surface-2 rounded-4">
                    <div class="mb-3 text-success fs-2"><i class="fa-solid fa-microphone-lines"></i></div>
                    <h4 class="text-white fw-bold mb-2">Voice & Rich Media Engine</h4>
                    <p class="text-secondary small mb-0">Native support for push-to-talk voice notes with automated transcription, HD images, video, document payloads, and location markers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Code Showcase Section -->
<section class="section-padding position-relative border-top border-light-subtle">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <h6 class="text-uppercase tracking-wider fw-bold text-accent-brand mb-2">Simple Developer Experience</h6>
                <h2 class="display-5 fw-bold mb-4 text-white">Send Messages with a Single REST Call</h2>
                <p class="text-secondary mb-4">Integrate Automatixes API with any language or framework—Node.js, Python, PHP, Go, or cURL. Comprehensive error codes and real-time delivery callbacks.</p>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-circle-check text-success fs-5"></i>
                        <span class="text-white">Full JSON payloads with typing presence simulation</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-circle-check text-success fs-5"></i>
                        <span class="text-white">Global API Key & Instance Bearer authentication</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-circle-check text-success fs-5"></i>
                        <span class="text-white">Multi-tenant session routing out-of-the-box</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="rounded-4 overflow-hidden border border-light-subtle shadow-lg" style="background: #0d1117;">
                    <div class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom border-light-subtle bg-surface-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="rounded-circle bg-danger d-inline-block" style="width:10px; height:10px;"></span>
                            <span class="rounded-circle bg-warning d-inline-block" style="width:10px; height:10px;"></span>
                            <span class="rounded-circle bg-success d-inline-block" style="width:10px; height:10px;"></span>
                            <span class="text-muted small font-monospace ms-2">POST /message/sendText/{instance}</span>
                        </div>
                        <span class="badge bg-success small">cURL / REST</span>
                    </div>
                    <div class="p-4 font-monospace small" style="color: #58a6ff; overflow-x: auto;">
                        <pre class="mb-0" style="color: #7ee787;">curl -X POST "http://localhost:8080/message/sendText/TEST2" \
  -H "apikey: D90BC5A8E4FAF6BF4A04DC62495A8CAF" \
  -H "Content-Type: application/json" \
  -d '{
    "number": "923001234567",
    "text": "Hello! Automated message via Automatixes WhatsApp API.",
    "options": {
      "delay": 1200,
      "presence": "composing"
    }
  }'</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community & GitHub Hub -->
<section class="section-padding position-relative border-top border-light-subtle bg-surface-2">
    <div class="container text-center">
        <div class="max-w-700 mx-auto mb-5">
            <h6 class="text-uppercase tracking-wider fw-bold text-accent-brand mb-2">Developer Ecosystem</h6>
            <h2 class="display-5 fw-bold mb-3 text-white">Join the Automatixes Community</h2>
            <p class="text-secondary">Get support directly from <strong>Moiz Baig</strong> and contribute to the open-source GitHub repository.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card p-4 border border-light-subtle bg-surface-1 rounded-4 text-center h-100">
                    <div class="fs-1 mb-3 text-white"><i class="fa-brands fa-github"></i></div>
                    <h4 class="text-white fw-bold mb-2">GitHub Repository</h4>
                    <p class="text-secondary small mb-4">Explore 63,000+ lines of clean TypeScript & Docker automation. Submit issues and feature requests.</p>
                    <a href="https://github.com/abdulmoiz0portfolio/automatixes-api" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light rounded-pill w-100 mt-auto">Star on GitHub</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 border border-light-subtle bg-surface-1 rounded-4 text-center h-100">
                    <div class="fs-1 mb-3 text-indigo" style="color: #5865F2;"><i class="fa-brands fa-discord"></i></div>
                    <h4 class="text-white fw-bold mb-2">Automatixes Discord</h4>
                    <p class="text-secondary small mb-4">Chat with automation builders, ask implementation questions, and share custom AI agent workflows.</p>
                    <a href="contact" class="btn btn-brand rounded-pill w-100 mt-auto">Join Community</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 border border-light-subtle bg-surface-1 rounded-4 text-center h-100">
                    <div class="fs-1 mb-3 text-success"><i class="fa-solid fa-headset"></i></div>
                    <h4 class="text-white fw-bold mb-2">Author Direct Support</h4>
                    <p class="text-secondary small mb-4">Direct enterprise consultation and custom architecture planning with Moiz Baig.</p>
                    <a href="mailto:contact@automatixes.com" class="btn btn-outline-success rounded-pill w-100 mt-auto">Email Moiz Baig</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
