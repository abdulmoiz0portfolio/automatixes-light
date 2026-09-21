<?php 
$page_key = 'support-agents'; 
include 'header.php'; 
?>

<!-- Service Hero Section Start -->
<section class="position-relative py-5 overflow-hidden" style="background: linear-gradient(180deg, #050811 0%, #0b1120 50%, #070a12 100%); padding-top: 170px !important; min-height: 80vh;">
    <!-- Ambient Atmospheric Glows -->
    <div class="position-absolute pointer-events-none rounded-circle" style="width: 700px; height: 700px; top: -100px; left: 50%; transform: translateX(-50%); background: radial-gradient(circle, rgba(200, 224, 25, 0.14) 0%, transparent 70%); filter: blur(80px); z-index: 0;"></div>
    <div class="position-absolute pointer-events-none rounded-circle" style="width: 500px; height: 500px; bottom: 0; right: -100px; background: radial-gradient(circle, rgba(56, 189, 248, 0.08) 0%, transparent 70%); filter: blur(70px); z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <!-- Header & Badge -->
        <div class="text-center max-w-850 mx-auto mb-5">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill mb-4" style="background: rgba(200, 224, 25, 0.08); border: 1px solid rgba(200, 224, 25, 0.25); box-shadow: 0 0 25px rgba(200, 224, 25, 0.12);">
                <span class="badge rounded-pill px-2 py-0.5" style="background: #C8E019; color: #000; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.05em;"><i class="fa-solid fa-robot me-1"></i> SERVICE</span>
                <span class="text-white small fw-bold" style="font-size: 0.85rem;">24/7 AUTONOMOUS CUSTOMER SERVICE</span>
            </div>
            
            <h1 class="display-4 fw-extrabold text-white mb-3" style="letter-spacing: -0.03em; line-height: 1.15;">
                Autonomous AI Support Agents with Custom RAG Knowledge
            </h1>
            
            <p class="lead text-white-50 mx-auto" style="max-width: 740px; font-size: 1.15rem; line-height: 1.7;">
                Resolve 70%+ of customer inquiries instantly without increasing headcount. Custom AI agents trained strictly on your documentation, policies, and product catalog with seamless human escalation.
            </p>

            <!-- Actions Row -->
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mt-4 pt-2">
                <a href="#consultation" class="btn btn-brand rounded-pill px-5 py-3 fw-bold d-inline-flex align-items-center gap-2 shadow" style="font-size: 1rem;">
                    <span>Book Strategy Audit</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="case-study" class="btn rounded-pill px-4 py-3 fw-semibold text-white border" style="background: rgba(255,255,255,0.04); border-color: rgba(255,255,255,0.12); font-size: 0.95rem;">
                    <i class="fa-solid fa-flask-vial text-accent-neon me-1"></i> View Live Case Study
                </a>
            </div>
        </div>

        <!-- Metric Counters Row -->
        <div class="row g-3 mb-5">
            
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">70%+</div>
                    <div class="text-white small fw-bold mb-1">Autonomous Resolution</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Tier-1 questions answered with zero human staff</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">< 2s</div>
                    <div class="text-white small fw-bold mb-1">Response Time</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">No customer ever waits on hold again</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">24/7/365</div>
                    <div class="text-white small fw-bold mb-1">Continuous Coverage</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Nights, weekends, and holidays covered</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">0</div>
                    <div class="text-white small fw-bold mb-1">Hallucination Guardrails</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Strict source citation and document bounding</div>
                </div>
            </div>
        </div>

        <!-- Problem vs Solution Breakdown -->
        <div class="row g-4 mb-5">
            <!-- Problem Card -->
            <div class="col-lg-6">
                <div class="p-4 p-md-5 rounded-4 h-100" style="background: rgba(239, 68, 68, 0.03); border: 1px solid rgba(239, 68, 68, 0.2); box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-danger border-opacity-25">
                        <span class="badge rounded-pill px-3 py-1.5 fw-bold text-white shadow-sm" style="background: #ef4444; font-size: 11px;">
                            <i class="fa-solid fa-triangle-exclamation me-1"></i> THE FRICTION
                        </span>
                        <h4 class="h5 fw-bold text-white mb-0">The Customer Support Crunch</h4>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Customer support queues pile up during peak hours, creating frustrated customers and negative reviews.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Hiring, training, and retaining 24/7 multi-shift support staff is expensive and difficult to scale.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Simple repetitive questions ("Where is my order?", "How do I reset my API key?") consume 80% of agent time.</span>
            </li>
                    </ul>
                </div>
            </div>

            <!-- Solution Card -->
            <div class="col-lg-6">
                <div class="p-4 p-md-5 rounded-4 h-100" style="background: rgba(200, 224, 25, 0.03); border: 1px solid rgba(200, 224, 25, 0.25); box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-warning border-opacity-25">
                        <span class="badge rounded-pill px-3 py-1.5 fw-bold text-dark shadow-sm" style="background: #C8E019; font-size: 11px;">
                            <i class="fa-solid fa-check-double me-1"></i> THE BLUEPRINT
                        </span>
                        <h4 class="h5 fw-bold text-white mb-0">Enterprise-Grade Support Agents</h4>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Custom RAG (Retrieval-Augmented Generation) pipeline grounds AI responses strictly in your company documents.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Instant multi-channel presence: one unified brain powering WhatsApp, web chat, Slack, and email ticketing.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Automated ticket creation and escalation: complex or emotional queries transfer to human specialists with full chat history.</span>
            </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Key Engineering Features Grid -->
        <div class="mb-5 pb-3">
            <div class="text-center max-w-700 mx-auto mb-4">
                <h3 class="display-6 fw-bold text-white mb-2">Technical Capabilities</h3>
                <p class="text-white-50 small mb-0">Built for speed, reliability, and enterprise data security.</p>
            </div>
            <div class="row g-4">
                
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-book-bookmark"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Custom Knowledge Base Ingestion</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">We vectorize your PDFs, Notion docs, FAQs, and help center articles for pinpoint factual accuracy.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-arrow-turn-up"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Graceful Human Escalation</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">When sentiment turns negative or questions exceed scope, the bot alerts your team and hands over control.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Ticketing Platform Sync</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Automatically logs tickets, adds tags, and updates conversation status in Zendesk, Freshdesk, or Crisp.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Multi-Lingual Fluency</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Support international customers in 50+ languages natively without hiring multi-lingual agents.</p>
                </div>
            </div>
            </div>
        </div>

        <!-- Technology Stack Tags -->
        <div class="p-4 rounded-4 text-center mb-5" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);">
            <div class="small text-white-50 text-uppercase tracking-wider fw-semibold mb-3 font-monospace">Core Integrations & Engine Stack</div>
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> OpenAI GPT-4o</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> Pinecone / Qdrant RAG</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> n8n</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> Zendesk API</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> WhatsApp API</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> Web Chat</span>
            </div>
        </div>

        <!-- Transparent Pricing & Engagement Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="p-4 p-md-5 rounded-4 text-center position-relative overflow-hidden" style="background: linear-gradient(145deg, #0b1120 0%, #0d1527 100%); border: 2px solid rgba(200, 224, 25, 0.35); box-shadow: 0 15px 40px rgba(0,0,0,0.5);">
                    <span class="badge rounded-pill px-3 py-1.5 text-dark fw-bold mb-3" style="background: #C8E019; font-size: 0.75rem;">TRANSPARENT ENGAGEMENT</span>
                    <h3 class="h2 fw-extrabold text-white mb-2">Starting from $1,800 setup</h3>
                    <p class="text-white-50 small mb-4 mx-auto" style="max-width: 540px; line-height: 1.6;">
                        Includes document vectorization, prompt guardrails, ticket sync, fallback rules, and 30-day refinement.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#consultation" class="btn btn-brand rounded-pill px-5 py-3 fw-bold shadow">
                            <span>Request Custom Scope</span>
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                        <a href="https://wa.me/923366920141?text=Hi%20Automatixes%2C%20I%27m%20interested%20in%20your%20support-agents%20service." target="_blank" class="btn btn-outline-light rounded-pill px-4 py-3 fw-semibold">
                            <i class="fa-brands fa-whatsapp text-success me-1"></i> Quick WhatsApp Chat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Consultation Booking Anchor Form -->
        <div id="consultation" class="pt-4">
            <div class="max-w-700 mx-auto p-4 p-md-5 rounded-4" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08);">
                <div class="text-center mb-4">
                    <span class="badge rounded-pill px-3 py-1 font-monospace mb-2" style="background: rgba(200, 224, 25, 0.1); color: #C8E019; border: 1px solid rgba(200,224,25,0.2);">FREE 20-MIN STRATEGY CALL</span>
                    <h3 class="h3 fw-bold text-white mb-2">Speak With a Solutions Architect</h3>
                    <p class="text-white-50 small mb-0">We will map out your current bottlenecks and present a working architecture blueprint.</p>
                </div>
                <form action="contact" method="GET" class="row g-3">
                    <input type="hidden" name="service" value="Autonomous AI Support Agents with Custom RAG Knowledge">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control bg-dark border-secondary text-white py-2.5" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control bg-dark border-secondary text-white py-2.5" placeholder="Business Email" required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="phone" class="form-control bg-dark border-secondary text-white py-2.5" placeholder="Phone or WhatsApp (with country code)" required>
                    </div>
                    <div class="col-12">
                        <textarea name="notes" class="form-control bg-dark border-secondary text-white py-2.5" rows="3" placeholder="Tell us about your current workflow and tools..."></textarea>
                    </div>
                    <div class="col-12 text-center pt-2">
                        <button type="submit" class="btn btn-brand rounded-pill w-100 py-3 fw-bold shadow">
                            <span>Submit &amp; Schedule Strategy Call</span>
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </button>
                        <span class="text-white-50 d-block mt-2" style="font-size: 11px;"><i class="fa-solid fa-lock me-1"></i> No spam. Strict NDA compliance. Response within 4 hours.</span>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<!-- Service Hero Section End -->

<style>
.service-feature-card:hover {
    transform: translateY(-4px);
    border-color: rgba(200, 224, 25, 0.35) !important;
}
</style>

<?php include 'footer.php'; ?>
