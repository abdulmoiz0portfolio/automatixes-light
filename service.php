<?php 
$page_key = 'service'; 
include 'header.php'; 
?>

<!-- Services Hero Header Section Start -->
<section class="position-relative py-5 overflow-hidden" style="background: linear-gradient(180deg, #050811 0%, #0b1120 50%, #070a12 100%); padding-top: 170px !important; min-height: 45vh;">
    <!-- Ambient Atmospheric Glows -->
    <div class="position-absolute pointer-events-none rounded-circle" style="width: 700px; height: 700px; top: -100px; left: 50%; transform: translateX(-50%); background: radial-gradient(circle, rgba(200, 224, 25, 0.12) 0%, transparent 70%); filter: blur(80px); z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="text-center max-w-850 mx-auto">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill mb-4" style="background: rgba(200, 224, 25, 0.08); border: 1px solid rgba(200, 224, 25, 0.25);">
                <span class="badge rounded-pill px-2 py-0.5" style="background: #C8E019; color: #000; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.05em;">WHAT WE OFFER</span>
                <span class="text-white small fw-bold" style="font-size: 0.85rem;"><i class="fa-solid fa-gears text-accent-neon me-1"></i> Production Capabilities</span>
            </div>
            
            <h1 class="display-4 fw-extrabold text-white mb-3" style="letter-spacing: -0.03em;">
                Our <span style="background: linear-gradient(135deg, #FFFFFF 30%, #C8E019 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Services</span>
            </h1>
            
            <p class="lead text-white-50 mx-auto" style="max-width: 760px; font-size: 1.15rem; line-height: 1.7;">
                We combine autonomous AI voice intelligence, smart agents, and workflow automations to scale your business operations 24/7 with zero human lag.
            </p>
        </div>
    </div>
</section>
<!-- Services Hero Header Section End -->

<!-- Alternating Zig-Zag Services Showcase (Matching Reference Images 2 & 3) -->
<section class="py-5 text-white position-relative overflow-hidden" style="background: #080c16;">
    <div class="container py-4">

        <!-- =========================================================================
             SERVICE 1: WhatsApp Business Automation (Left Text / Right Image)
             ========================================================================= -->
        <div class="row align-items-center g-5 mb-5 pb-5 border-bottom border-secondary border-opacity-25">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2.5 mb-3" style="background: rgba(37, 211, 102, 0.12); color: #25D366; width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <h2 class="display-6 fw-bold text-white mb-3">WhatsApp Business Automation</h2>
                <p class="text-white-50 fs-6 mb-4" style="line-height: 1.8;">
                    Turn WhatsApp into your most lucrative direct-response channel. We integrate official WhatsApp Cloud APIs with intelligent n8n workflows to qualify incoming customer inquiries, send instant proposals, and sync contact timelines straight into your CRM.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 mb-4">
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Sub-15s Speed:</strong> Instant dynamic conversational greetings and intent triage.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">CRM Auto-Sync:</strong> Bi-directional contact creation, note updates, and deal staging.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Dynamic Media Dispatch:</strong> Send brochures, rate cards, and invoices on command.</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3">
                    <a href="whatsapp-automation" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold shadow">
                        <span>Explore WhatsApp Engine</span>
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="contact?service=WhatsApp+Automation" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>Request a Quote</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-3 rounded-4 position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.4);">
                    <img src="assets/media/n8n/workflows/Customer Support Website agent.png" alt="WhatsApp Business Automation Architecture" class="img-fluid rounded-3 w-100" style="object-fit: cover; aspect-ratio: 16/10;">
                </div>
            </div>
        </div>

        <!-- =========================================================================
             SERVICE 2: CRM Lead Sync & Data Integration (Left Image / Right Text)
             ========================================================================= -->
        <div class="row align-items-center g-5 mb-5 pb-5 flex-lg-row-reverse border-bottom border-secondary border-opacity-25">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2.5 mb-3" style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
                <h2 class="display-6 fw-bold text-white mb-3">CRM Lead Sync &amp; Data Integration</h2>
                <p class="text-white-50 fs-6 mb-4" style="line-height: 1.8;">
                    Eliminate manual copy-pasting between spreadsheets, forms, and CRMs. We engineer bulletproof webhook listeners and API pipelines connecting GoHighLevel, HubSpot, Salesforce, ClickUp, and custom PostgreSQL databases.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 mb-4">
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Zero Data Loss:</strong> Automatic retry queues, deduplication, and format validation.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Two-Way Pipeline Sync:</strong> Stage updates trigger instant Slack, SMS, and invoice events.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Custom REST API Nodes:</strong> Tailored connectors for legacy software and ERPs.</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3">
                    <a href="crm-integration" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold shadow">
                        <span>Explore CRM Solutions</span>
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="contact?service=CRM+Integration" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>Request a Quote</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-3 rounded-4 position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.4);">
                    <img src="assets/media/n8n/workflows/image 1.png" alt="CRM Lead Sync and Integration Pipeline" class="img-fluid rounded-3 w-100" style="object-fit: cover; aspect-ratio: 16/10;">
                </div>
            </div>
        </div>

        <!-- =========================================================================
             SERVICE 3: Email Follow-up & Nurture Automation (Left Text / Right Image)
             ========================================================================= -->
        <div class="row align-items-center g-5 mb-5 pb-5 border-bottom border-secondary border-opacity-25">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2.5 mb-3" style="background: rgba(234, 179, 8, 0.12); color: #eab308; width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
                <h2 class="display-6 fw-bold text-white mb-3">Email Follow-up &amp; Nurture Automation</h2>
                <p class="text-white-50 fs-6 mb-4" style="line-height: 1.8;">
                    Keep your pipeline warm with multi-touch contextual email cadences. We configure distributed multi-mailbox architectures with zero-bounce DNS/MX validation, ensuring your emails land directly in the primary inbox rather than spam.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 mb-4">
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Zero-Bounce DNS Verification:</strong> Real-time MX checks prevent sending to dead domains.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">AI Reply Categorization:</strong> Classifies replies as "Interested", "Objection", or "Out of Office".</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">1-Click Booking Links:</strong> Converts interested leads into calendar bookings without delay.</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3">
                    <a href="email-automation" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold shadow">
                        <span>Explore Email Automation</span>
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="contact?service=Email+Automation" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>Request a Quote</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-3 rounded-4 position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.4);">
                    <img src="assets/media/n8n/workflows/Email Marketing.png" alt="Email Follow-up and Nurture Automation" class="img-fluid rounded-3 w-100" style="object-fit: cover; aspect-ratio: 16/10;">
                </div>
            </div>
        </div>

        <!-- =========================================================================
             SERVICE 4: Cold Outreach & Lead Recovery Automation (Left Image / Right Text)
             ========================================================================= -->
        <div class="row align-items-center g-5 mb-5 pb-5 flex-lg-row-reverse border-bottom border-secondary border-opacity-25">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2.5 mb-3" style="background: rgba(200, 224, 25, 0.12); color: #C8E019; width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-solid fa-life-ring"></i>
                </div>
                <h2 class="display-6 fw-bold text-white mb-3">Cold Outreach &amp; Lead Recovery Automation</h2>
                <p class="text-white-50 fs-6 mb-4" style="line-height: 1.8;">
                    78% of B2B buyers purchase from the vendor who replies first. Our autonomous n8n workflows catch website leads, verify their deliverability in real time, and trigger multi-channel warm replies (WhatsApp + Email) in under 60 seconds.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 mb-4">
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Sub-60s Speed-to-Lead:</strong> Immediate engagement while prospect attention is at its peak.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">30%+ Pipeline Recovered:</strong> Systematically recovers cold or abandoned CRM contacts.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Real-Time Team Alerts:</strong> Instant notifications on Slack and SMS for high-intent replies.</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3">
                    <a href="lead-recovery" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold shadow">
                        <span>Explore Lead Recovery</span>
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="case-study" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>View Technical Case Study</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-3 rounded-4 position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.4);">
                    <img src="assets/media/n8n/workflows/n8n-email-marketing-workflow.png" alt="Lead Recovery Engine Blueprint" class="img-fluid rounded-3 w-100" style="object-fit: cover; aspect-ratio: 16/10;">
                </div>
            </div>
        </div>

        <!-- =========================================================================
             SERVICE 5: Knowledge-Base / Support Chatbot Agents (Left Text / Right Image)
             ========================================================================= -->
        <div class="row align-items-center g-5 mb-5 pb-5 border-bottom border-secondary border-opacity-25">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2.5 mb-3" style="background: rgba(168, 85, 247, 0.12); color: #a855f7; width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-solid fa-robot"></i>
                </div>
                <h2 class="display-6 fw-bold text-white mb-3">Knowledge-Base / Support Chatbot Agents</h2>
                <p class="text-white-50 fs-6 mb-4" style="line-height: 1.8;">
                    Resolve 70%+ of customer support questions without increasing support headcount. We build custom RAG (Retrieval-Augmented Generation) agents trained strictly on your documentation, policies, and product catalog with graceful human escalation.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 mb-4">
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Strict Source Bounding:</strong> Pinpoint factual accuracy with zero hallucinations.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">24/7/365 Coverage:</strong> Instant resolution across web chat, WhatsApp, and ticketing tools.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Smart Human Escalation:</strong> Seamlessly transfers complex queries with complete chat history.</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3">
                    <a href="support-agents" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold shadow">
                        <span>Explore Support Agents</span>
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="contact?service=Support+Agents" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>Request a Quote</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-3 rounded-4 position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.4);">
                    <img src="assets/img/services/ai_agents.jpg" alt="Autonomous AI Support Agent Architecture" class="img-fluid rounded-3 w-100" style="object-fit: cover; aspect-ratio: 16/10;">
                </div>
            </div>
        </div>

        <!-- =========================================================================
             SERVICE 6: Lead Scoring & Data Extraction Automation (Left Image / Right Text)
             ========================================================================= -->
        <div class="row align-items-center g-5 mb-5 pb-5 flex-lg-row-reverse border-bottom border-secondary border-opacity-25">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2.5 mb-3" style="background: rgba(239, 68, 68, 0.12); color: #f87171; width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h2 class="display-6 fw-bold text-white mb-3">Lead Scoring &amp; Data Extraction Automation</h2>
                <p class="text-white-50 fs-6 mb-4" style="line-height: 1.8;">
                    Stop letting high-ticket buyers wait while reps waste time on unqualified inquiries. Our AI scoring engine analyzes company domain, budget indicators, and intent sentiment in under 5 seconds, routing high-fit prospects straight to executive calendars.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 mb-4">
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Predictive ICP Scoring:</strong> Algorithmic lead classification into Priority Tier A, B, and C.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Automated Enrichment:</strong> Pulls company size, tech stack, and location data instantly.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Round-Robin Routing:</strong> Fairly distributes qualified calls among designated reps.</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3">
                    <a href="lead-scoring" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold shadow">
                        <span>Explore Lead Scoring</span>
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="contact?service=Lead+Scoring" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>Request a Quote</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-3 rounded-4 position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.4);">
                    <img src="assets/media/n8n/workflows/workflow-02-real-estate-ai-agent.png" alt="Lead Scoring and Data Extraction Workflow" class="img-fluid rounded-3 w-100" style="object-fit: cover; aspect-ratio: 16/10;">
                </div>
            </div>
        </div>

        <!-- =========================================================================
             SERVICE 7: Autonomous AI Voice Agents (Inbound & Outbound Calling)
             ========================================================================= -->
        <div class="row align-items-center g-5 mb-5 pb-5">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2.5 mb-3" style="background: rgba(200, 224, 25, 0.12); color: #C8E019; width: 48px; height: 48px; font-size: 1.35rem;">
                    <i class="fa-solid fa-microphone-lines"></i>
                </div>
                <h2 class="display-6 fw-bold text-white mb-3">Autonomous AI Voice Agents</h2>
                <p class="text-white-50 fs-6 mb-4" style="line-height: 1.8;">
                    Human-cadence conversational voice agents that answer inbound telephone calls, handle objections, qualify buyers, and dial outbound leads in under 500ms latency. Speaks with natural pauses, realistic inflection, and seamless calendar integration.
                </p>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 mb-4">
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">Sub-500ms Latency:</strong> Conversational fluid speech with natural interruptions handling.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">24/7 Telephone Receptionist:</strong> Zero missed incoming customer calls outside work hours.</span>
                    </li>
                    <li class="d-flex align-items-center gap-2.5">
                        <i class="fa-solid fa-circle-check text-accent-brand fs-6"></i>
                        <span><strong class="text-white">CRM Call Transcripts:</strong> Audio recordings and full text notes logged automatically.</span>
                    </li>
                </ul>
                <div class="d-flex flex-wrap gap-3">
                    <a href="voice-agent" class="btn btn-brand rounded-pill px-4 py-2.5 fw-bold shadow">
                        <i class="fa-solid fa-microphone-lines me-1"></i>
                        <span>Try Live Voice Demo</span>
                    </a>
                    <a href="inbound-voice" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>Inbound Details</span>
                    </a>
                    <a href="outbound-voice" class="btn btn-outline-light rounded-pill px-4 py-2.5 fw-semibold">
                        <span>Outbound Details</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-3 rounded-4 position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 15px 35px rgba(0,0,0,0.4);">
                    <img src="assets/img/services/ai_automations.jpg" alt="Autonomous AI Voice Agent System" class="img-fluid rounded-3 w-100" style="object-fit: cover; aspect-ratio: 16/10;">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Need More Information? CTA Banner Section (Exact Match to Image 3) -->
<section class="py-5 position-relative overflow-hidden" style="background: #C8E019; color: #080c16;">
    <div class="container text-center py-4">
        <h2 class="display-5 fw-extrabold mb-3" style="color: #080c16; letter-spacing: -0.5px;">Need More Information?</h2>
        <p class="fs-5 mb-4 mx-auto fw-medium" style="max-width: 680px; color: rgba(8, 12, 22, 0.85); line-height: 1.6;">
            For more information about our services or a custom quotation on a project, please reach out to our team.
        </p>
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
            <a href="mailto:contact@automatixes.com" class="btn btn-dark rounded-pill px-4 py-3 fw-bold d-inline-flex align-items-center gap-2 shadow" style="background: #080c16; color: #ffffff; border: none; font-size: 15px;">
                <i class="fa-solid fa-envelope text-accent-neon"></i>
                <span>contact@automatixes.com</span>
            </a>
            <a href="https://wa.me/923366920141" target="_blank" class="btn btn-dark rounded-pill px-4 py-3 fw-bold d-inline-flex align-items-center gap-2 shadow" style="background: #080c16; color: #ffffff; border: none; font-size: 15px;">
                <i class="fa-brands fa-whatsapp text-success"></i>
                <span>+92 336 6920141</span>
            </a>
            <a href="contact" class="btn rounded-pill px-4 py-3 fw-bold d-inline-flex align-items-center gap-2 shadow" style="background: #ffffff; color: #080c16; border: none; font-size: 15px;">
                <i class="fa-solid fa-calendar-check"></i>
                <span>Book 1-on-1 Strategy Call</span>
            </a>
        </div>
    </div>
</section>
<!-- Need More Information Banner End -->

<style>
.service-grid-card:hover {
    transform: translateY(-6px);
    border-color: rgba(200, 224, 25, 0.35) !important;
    box-shadow: 0 15px 35px rgba(0,0,0,0.45) !important;
}
.hover-neon:hover {
    color: #C8E019 !important;
}
</style>

<?php include 'footer.php'; ?>
