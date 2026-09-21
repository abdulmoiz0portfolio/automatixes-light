<?php 
$page_key = 'whatsapp-automation'; 
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
                <span class="badge rounded-pill px-2 py-0.5" style="background: #C8E019; color: #000; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.05em;"><i class="fa-brands fa-whatsapp me-1"></i> SERVICE</span>
                <span class="text-white small fw-bold" style="font-size: 0.85rem;">WHATSAPP BUSINESS AUTOMATION</span>
            </div>
            
            <h1 class="display-4 fw-extrabold text-white mb-3" style="letter-spacing: -0.03em; line-height: 1.15;">
                WhatsApp Automation & Conversational CRM Engine
            </h1>
            
            <p class="lead text-white-50 mx-auto" style="max-width: 740px; font-size: 1.15rem; line-height: 1.7;">
                Turn WhatsApp into your highest-converting sales channel. Connect official WhatsApp Business API with n8n and Make to qualify prospects, trigger drip sequences, and sync CRM pipelines 24/7.
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
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">< 15s</div>
                    <div class="text-white small fw-bold mb-1">Avg Response Time</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Immediate conversational greeting</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">98%</div>
                    <div class="text-white small fw-bold mb-1">Open Rate</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Compared to 20% on traditional email</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">3.2x</div>
                    <div class="text-white small fw-bold mb-1">Conversion Lift</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Verified across B2B qualification</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">24/7</div>
                    <div class="text-white small fw-bold mb-1">Autonomous Uptime</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Zero missed inbound opportunities</div>
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
                        <h4 class="h5 fw-bold text-white mb-0">The WhatsApp Bottleneck</h4>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Inbound chats sit unanswered outside of office hours, losing impatient buyers to competitors.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Sales reps spend hours manually copying contact numbers and chats into your CRM.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Manual follow-ups are forgotten or sent days too late, dropping pipeline engagement.</span>
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
                        <h4 class="h5 fw-bold text-white mb-0">The Automatixes Solution</h4>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Sub-15s AI instant response with dynamic knowledge retrieval tailored to your offerings.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Automated 2-way CRM synchronization (HubSpot, GoHighLevel, Zoho) for every message and lead status.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Scheduled multi-touch nurturing drips triggered automatically by customer actions.</span>
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
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Multi-Agent Smart Triage</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">AI qualifies lead intent, answers FAQs, and routes high-ticket buyers directly to human reps on duty.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Native Calendar Booking</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Prospects can pick dates and book meetings directly within WhatsApp chat with Cal.com or Calendly sync.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Dynamic Document Dispatch</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Instantly send personalized proposals, brochures, and invoice PDFs on request with zero delay.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Instant Rep SMS/Slack Alerts</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Notify sales managers on Slack or SMS the second a high-intent prospect asks for live pricing.</p>
                </div>
            </div>
            </div>
        </div>

        <!-- Technology Stack Tags -->
        <div class="p-4 rounded-4 text-center mb-5" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);">
            <div class="small text-white-50 text-uppercase tracking-wider fw-semibold mb-3 font-monospace">Core Integrations & Engine Stack</div>
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> WhatsApp Cloud API</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> n8n Workflows</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> Make.com</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> OpenAI GPT-4o</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> GoHighLevel</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> HubSpot</span>
            </div>
        </div>

        <!-- Transparent Pricing & Engagement Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="p-4 p-md-5 rounded-4 text-center position-relative overflow-hidden" style="background: linear-gradient(145deg, #0b1120 0%, #0d1527 100%); border: 2px solid rgba(200, 224, 25, 0.35); box-shadow: 0 15px 40px rgba(0,0,0,0.5);">
                    <span class="badge rounded-pill px-3 py-1.5 text-dark fw-bold mb-3" style="background: #C8E019; font-size: 0.75rem;">TRANSPARENT ENGAGEMENT</span>
                    <h3 class="h2 fw-extrabold text-white mb-2">Starting from $1,200 setup</h3>
                    <p class="text-white-50 small mb-4 mx-auto" style="max-width: 540px; line-height: 1.6;">
                        Includes custom prompt engineering, API credential setup, CRM mapping, and 30-day workflow guarantee.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#consultation" class="btn btn-brand rounded-pill px-5 py-3 fw-bold shadow">
                            <span>Request Custom Scope</span>
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                        <a href="https://wa.me/923366920141?text=Hi%20Automatixes%2C%20I%27m%20interested%20in%20your%20whatsapp-automation%20service." target="_blank" class="btn btn-outline-light rounded-pill px-4 py-3 fw-semibold">
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
                    <input type="hidden" name="service" value="WhatsApp Automation & Conversational CRM Engine">
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
