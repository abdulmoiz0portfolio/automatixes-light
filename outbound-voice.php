<?php 
$page_key = 'outbound-voice'; 
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
                <span class="badge rounded-pill px-2 py-0.5" style="background: #C8E019; color: #000; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.05em;"><i class="fa-solid fa-phone-arrow-up-right me-1"></i> SERVICE</span>
                <span class="text-white small fw-bold" style="font-size: 0.85rem;">AI OUTBOUND TELEPHONY</span>
            </div>
            
            <h1 class="display-4 fw-extrabold text-white mb-3" style="letter-spacing: -0.03em; line-height: 1.15;">
                Autonomous Outbound Voice Qualification & Reactivation Bot
            </h1>
            
            <p class="lead text-white-50 mx-auto" style="max-width: 740px; font-size: 1.15rem; line-height: 1.7;">
                Supercharge your outbound pipeline without hiring an army of junior SDRs. Deploy conversational AI agents that dial opt-in leads within 60 seconds, re-activate stale lists, and confirm calendar bookings.
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
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">< 60s</div>
                    <div class="text-white small fw-bold mb-1">Speed-to-Call</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Dials inbound web leads instantly</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">4.5x</div>
                    <div class="text-white small fw-bold mb-1">Connect Rate</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Versus slow next-day manual dialers</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">300+</div>
                    <div class="text-white small fw-bold mb-1">Calls Per Hour</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Scales effortlessly without burnout</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(8px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">100%</div>
                    <div class="text-white small fw-bold mb-1">Compliance</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Strict TCPA and local calling window rules</div>
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
                        <h4 class="h5 fw-bold text-white mb-0">The Outbound SDR Struggle</h4>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Manual outbound dialing is slow, draining, and yields low connect rates when done hours later.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">High SDR turnover means constant recruitment, onboarding, and training costs for mediocre results.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Thousands of dollars in past paid leads sit untouched in your CRM because no one has time to call them.</span>
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
                        <h4 class="h5 fw-bold text-white mb-0">Autonomous Outbound Telephony</h4>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Triggers an instant outbound phone call the moment an interested lead submits an opt-in form on your landing page.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Systematically re-contacts cold database contacts with polite, conversational reactivation offers.</span>
            </li>
            <li class="d-flex align-items-start gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); width: 26px; height: 26px; font-size: 11px;">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="text-white-50 small" style="line-height: 1.6;">Automatically sends appointment confirmation calls 24 hours prior, reducing no-show rates by up to 45%.</span>
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
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Instant Lead Callback</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Call web leads within 60 seconds of submission while their interest and attention are at their peak.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-fire-burner"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Database Reactivation Sequences</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Breathe life into stalled CRM contacts with personalized, conversational outreach campaigns.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">No-Show Reduction Calls</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Automated courtesy calls to confirm high-ticket sales calls, allowing callers to reschedule easily.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 h-100 service-feature-card" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3 p-2.5" style="background: rgba(200, 224, 25, 0.1); color: var(--accent-neon, #C8E019); width: 44px; height: 44px; font-size: 1.15rem;">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <h4 class="h5 fw-bold text-white mb-2">Automated Disposition Tagging</h4>
                    <p class="text-white-50 small mb-0" style="line-height: 1.6;">Updates CRM contact stages with "Left Voicemail", "Qualified", "Rescheduled", or "Wrong Number".</p>
                </div>
            </div>
            </div>
        </div>

        <!-- Technology Stack Tags -->
        <div class="p-4 rounded-4 text-center mb-5" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);">
            <div class="small text-white-50 text-uppercase tracking-wider fw-semibold mb-3 font-monospace">Core Integrations & Engine Stack</div>
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> Retell AI</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> Twilio / Telnyx</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> n8n Workflows</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> GoHighLevel</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> HubSpot API</span> <span class="badge rounded-pill px-3 py-1.5 small text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.8rem;"><i class="fa-solid fa-code-commit text-accent-neon me-1"></i> OpenAI</span>
            </div>
        </div>

        <!-- Transparent Pricing & Engagement Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="p-4 p-md-5 rounded-4 text-center position-relative overflow-hidden" style="background: linear-gradient(145deg, #0b1120 0%, #0d1527 100%); border: 2px solid rgba(200, 224, 25, 0.35); box-shadow: 0 15px 40px rgba(0,0,0,0.5);">
                    <span class="badge rounded-pill px-3 py-1.5 text-dark fw-bold mb-3" style="background: #C8E019; font-size: 0.75rem;">TRANSPARENT ENGAGEMENT</span>
                    <h3 class="h2 fw-extrabold text-white mb-2">Starting from $2,000 setup</h3>
                    <p class="text-white-50 small mb-4 mx-auto" style="max-width: 540px; line-height: 1.6;">
                        Includes outbound campaign logic, opt-in compliance guards, calendar booking scripts, and telephony setup.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#consultation" class="btn btn-brand rounded-pill px-5 py-3 fw-bold shadow">
                            <span>Request Custom Scope</span>
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                        <a href="https://wa.me/923366920141?text=Hi%20Automatixes%2C%20I%27m%20interested%20in%20your%20outbound-voice%20service." target="_blank" class="btn btn-outline-light rounded-pill px-4 py-3 fw-semibold">
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
                    <input type="hidden" name="service" value="Autonomous Outbound Voice Qualification & Reactivation Bot">
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
