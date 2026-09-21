<?php 
$page_key = 'case-study'; 
include 'header.php'; 
?>

<!-- Case Study Hero Section Start -->
<section class="position-relative py-5 overflow-hidden" style="background: linear-gradient(180deg, #050811 0%, #0b1120 50%, #070a12 100%); padding-top: 170px !important; min-height: 80vh;">
    <!-- Ambient Atmospheric Glows -->
    <div class="position-absolute pointer-events-none rounded-circle" style="width: 700px; height: 700px; top: -100px; left: 50%; transform: translateX(-50%); background: radial-gradient(circle, rgba(200, 224, 25, 0.15) 0%, transparent 70%); filter: blur(80px); z-index: 0;"></div>
    <div class="position-absolute pointer-events-none rounded-circle" style="width: 500px; height: 500px; bottom: 0; right: -100px; background: radial-gradient(circle, rgba(56, 189, 248, 0.08) 0%, transparent 70%); filter: blur(70px); z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <!-- Header & Breadcrumb -->
        <div class="text-center max-w-850 mx-auto mb-5">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill mb-4" style="background: rgba(200, 224, 25, 0.08); border: 1px solid rgba(200, 224, 25, 0.25); box-shadow: 0 0 25px rgba(200, 224, 25, 0.12);">
                <span class="badge rounded-pill px-2 py-0.5" style="background: #C8E019; color: #000; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.05em;">CASE STUDY</span>
                <span class="text-white small fw-bold" style="font-size: 0.85rem;"><i class="fa-solid fa-bolt text-accent-neon me-1"></i> Production n8n Architecture</span>
            </div>
            
            <h1 class="display-4 fw-extrabold text-white mb-3" style="letter-spacing: -0.03em;">
                Autonomous n8n <span style="background: linear-gradient(135deg, #FFFFFF 30%, #C8E019 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Lead Recovery</span> Engine
            </h1>
            
            <p class="lead text-white-50 mx-auto" style="max-width: 720px; font-size: 1.15rem; line-height: 1.7;">
                How B2B lead generation agencies stop pipeline leakage, eliminate manual spreadsheet scrubbing, verify DNS/MX records in real time, and trigger sub-60s warm replies before prospects go cold.
            </p>

            <!-- Quick Meta Tags Row -->
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mt-4 pt-2">
                <span class="d-inline-flex align-items-center gap-1.5 px-3 py-1 rounded-pill text-white small" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                    <i class="fa-solid fa-layer-group text-accent-brand"></i> Stack: n8n + Cloudflare DNS + Google Sheets
                </span>
                <span class="d-inline-flex align-items-center gap-1.5 px-3 py-1 rounded-pill text-white small" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                    <i class="fa-solid fa-stopwatch text-accent-brand"></i> Speed-to-Lead: &lt;60 Seconds
                </span>
                <span class="d-inline-flex align-items-center gap-1.5 px-3 py-1 rounded-pill text-white small" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                    <i class="fa-solid fa-check-double text-accent-brand"></i> Verification Rate: 99.2%
                </span>
            </div>
        </div>

        <!-- Verified Impact Metric Counters Row -->
        <div class="row g-3 text-center mb-5">
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); backdrop-filter: blur(10px);">
                    <div class="display-6 fw-extrabold text-accent-brand font-monospace mb-1">&lt; 60s</div>
                    <div class="text-white small fw-bold mb-1">Speed-to-Lead</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">From initial form fill to verified CRM sync</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);">
                    <div class="display-6 fw-extrabold text-white font-monospace mb-1">99.2%</div>
                    <div class="text-white small fw-bold mb-1">Deliverability Score</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Cloudflare DNS MX verification halts hard bounces</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);">
                    <div class="display-6 fw-extrabold font-monospace mb-1" style="color: #38bdf8;">+34%</div>
                    <div class="text-white small fw-bold mb-1">Pipeline Recovery</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Warm replies caught before losing buyer attention</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4 rounded-4 h-100" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);">
                    <div class="display-6 fw-extrabold font-monospace mb-1" style="color: #4ade80;">12+ hrs</div>
                    <div class="text-white small fw-bold mb-1">Saved Per SDR/Wk</div>
                    <div class="text-white-50" style="font-size: 0.75rem;">Tedious manual data cleaning completely removed</div>
                </div>
            </div>
        </div>
        <div class="text-center text-white-50 small mt-2 mb-4" style="font-size: 0.8rem; font-style: italic;">* Based on internal benchmark / demo deployment</div>

        <!-- Problem vs Solution Breakdown -->
        <div class="row g-4 mb-5">
            <!-- Problem Card -->
            <div class="col-lg-6">
                <div class="p-4 p-md-4 rounded-4 h-100" style="background: rgba(239, 68, 68, 0.03); border: 1px solid rgba(239, 68, 68, 0.2); box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-danger border-opacity-25">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge rounded-pill px-3 py-1.5 fw-bold text-white shadow-sm" style="background: #ef4444; color: #ffffff !important; letter-spacing: 0.5px; border: none; font-size: 11px;">
                                <i class="fa-solid fa-triangle-exclamation me-1" style="color: #ffffff !important;"></i> THE BOTTLENECK
                            </span>
                            <h4 class="h5 fw-bold text-white mb-0">The Leaky Pipeline</h4>
                        </div>
                        <span class="small font-monospace fw-bold" style="color: #f87171 !important;"><i class="fa-solid fa-arrow-trend-down me-1"></i>Lost Revenue</span>
                    </div>
                    
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-4">
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 28px; height: 28px;">
                                <i class="fa-solid fa-hourglass-half" style="font-size: 13px;"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block">Speed-to-Lead Drop-off (Leads Go Ice-Cold)</strong>
                                <span class="text-white-50 small">78% of B2B buyers purchase from the vendor who replies first. Leaving inquiries or replies sitting for 15+ minutes causes lead qualification rates to plummet by up to 391%.</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 28px; height: 28px;">
                                <i class="fa-solid fa-envelope-circle-check" style="font-size: 13px;"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block">High Bounce Rates &amp; Burned Domains</strong>
                                <span class="text-white-50 small">Scraped raw leads contain typos, non-existent corporate domains, and dead inboxes. Blasting unchecked data wrecks domain reputation and triggers spam filters.</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); width: 28px; height: 28px;">
                                <i class="fa-solid fa-table-list" style="font-size: 13px;"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block">Manual CSV Scrubbing Drains SDR Hours</strong>
                                <span class="text-white-50 small">Sales reps waste 10–14 hours per week manually formatting strings, stripping "LLC/Inc" suffixes, and cross-checking records instead of taking calls and closing.</span>
                            </div>
                        </li>
                    </ul>

                    <div class="p-3 rounded-3" style="background: rgba(239, 68, 68, 0.08); border: 1px dashed rgba(239, 68, 68, 0.3);">
                        <span class="fw-bold small" style="color: #f87171 !important;"><i class="fa-solid fa-xmark me-1"></i> Net Impact:</span>
                        <span class="text-white small ms-1">Agencies lose 25–40% of potentially closed-won revenue simply due to delayed response times and bad data hygiene.</span>
                    </div>
                </div>
            </div>

            <!-- Solution Card -->
            <div class="col-lg-6">
                <div class="p-4 p-md-4 rounded-4 h-100" style="background: rgba(200, 224, 25, 0.03); border: 1px solid rgba(200, 224, 25, 0.25); box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-light border-opacity-10">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge rounded-pill px-3 py-1.5 text-dark fw-bold shadow-sm" style="background: #D4FF3D; color: #0a0e1a !important; letter-spacing: 0.5px; border: none; font-size: 11px;">
                                <i class="fa-solid fa-check-double me-1" style="color: #0a0e1a !important;"></i> OUR AUTOMATION
                            </span>
                            <h4 class="h5 fw-bold text-white mb-0">Autonomous n8n Recovery Engine</h4>
                        </div>
                        <span class="small font-monospace fw-bold" style="color: #D4FF3D !important;"><i class="fa-solid fa-bolt me-1"></i>Sub-60s Action</span>
                    </div>

                    <ul class="list-unstyled d-flex flex-column gap-3 mb-4">
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle text-dark d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: #D4FF3D; color: #0a0e1a !important; width: 28px; height: 28px;">
                                <i class="fa-solid fa-bolt-lightning" style="font-size: 13px;"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block">Instant Trigger &amp; Sub-60s Speed-to-Lead</strong>
                                <span class="text-white-50 small">Webhooks and scheduled polling monitor incoming form fills and inbox replies 24/7. When a prospect engages, the pipeline catches it within seconds before they go cold.</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle text-dark d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: #D4FF3D; color: #0a0e1a !important; width: 28px; height: 28px;">
                                <i class="fa-solid fa-network-wired" style="font-size: 13px;"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block">Autonomous Cloudflare DNS MX Validation</strong>
                                <span class="text-white-50 small">The workflow queries live DNS servers to verify mail exchange records on the fly, auto-flagging invalid mailboxes and protecting sender reputation with zero paid API costs.</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="rounded-circle text-dark d-flex align-items-center justify-content-center flex-shrink-0 mt-1" style="background: #D4FF3D; color: #0a0e1a !important; width: 28px; height: 28px;">
                                <i class="fa-solid fa-wand-magic-sparkles" style="font-size: 13px;"></i>
                            </div>
                            <div>
                                <strong class="text-white d-block">JavaScript Data Sanitization &amp; CRM Sync</strong>
                                <span class="text-white-50 small">Embedded JavaScript cleans names to proper Title Case, strips entity tags (LLC, Inc, Corp), and appends clean data directly into Google Sheets, Airtable, or your CRM.</span>
                            </div>
                        </li>
                    </ul>

                    <div class="p-3 rounded-3" style="background: rgba(200, 224, 25, 0.08); border: 1px dashed rgba(200, 224, 25, 0.35);">
                        <span class="fw-bold small" style="color: #D4FF3D !important;"><i class="fa-solid fa-circle-check me-1"></i> Measurable Result:</span>
                        <span class="text-white small ms-1">Zero dropped leads, 99.2% verified deliverability rate, and 12+ hours saved every week per account.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Workflow Visual Demo & Video Player Card -->
        <div class="card rounded-4 overflow-hidden mb-5" style="background: #0d1322; border: 1px solid rgba(200, 224, 25, 0.2); box-shadow: 0 20px 40px rgba(0,0,0,0.4);">
            <!-- Window Title Bar / Tab Bar -->
            <div class="px-4 py-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3" style="background: rgba(255,255,255,0.03); border-color: rgba(255,255,255,0.07) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center gap-1.5">
                        <span class="rounded-circle d-inline-block" style="width: 11px; height: 11px; background: #ff5f56;"></span>
                        <span class="rounded-circle d-inline-block" style="width: 11px; height: 11px; background: #ffbd2e;"></span>
                        <span class="rounded-circle d-inline-block" style="width: 11px; height: 11px; background: #27c93f;"></span>
                    </div>
                    <span class="text-white-50 small font-monospace ms-2 d-none d-sm-inline">lead-recovery-workflow.n8n · Production v2.4</span>
                </div>

                <!-- View Switcher Tabs -->
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-sm px-3 py-1.5 rounded-pill fw-semibold active case-study-tab-btn" id="csPageTabBtnArchitecture" onclick="switchCsPageTab('architecture')" style="font-size: 0.8rem; background: #C8E019; color: #000; border: 1px solid #C8E019;">
                        <i class="fa-solid fa-diagram-project me-1.5"></i> Workflow Blueprint
                    </button>
                    <button type="button" class="btn btn-sm px-3 py-1.5 rounded-pill fw-semibold case-study-tab-btn" id="csPageTabBtnVideo" onclick="switchCsPageTab('video')" style="font-size: 0.8rem; background: rgba(255,255,255,0.05); color: #cbd5e1; border: 1px solid rgba(255,255,255,0.1);">
                        <i class="fa-solid fa-circle-play me-1.5"></i> Video Walkthrough
                    </button>
                    <a href="https://screenrec.com/share/7SxeCZsImJ" target="_blank" rel="noopener noreferrer" class="btn btn-sm px-3 py-1.5 rounded-pill fw-semibold d-none d-md-inline-flex align-items-center gap-1 text-white" style="font-size: 0.8rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                        <span>ScreenRec HD</span>
                        <i class="fa-solid fa-arrow-up-right-from-square small"></i>
                    </a>
                </div>
            </div>

            <!-- Tab Content 1: Architecture Blueprint (Image) -->
            <div id="csPageTabContentArchitecture" class="p-3 p-md-4 text-center">
                <div class="position-relative rounded-3 overflow-hidden" style="border: 1px solid rgba(255,255,255,0.08); background: #07090e; max-height: 560px;">
                    <img src="assets/media/n8n/n8n-workflow.webp" alt="n8n Lead Cleaner and Recovery Production Workflow" class="img-fluid w-100" style="object-fit: cover; object-position: center; cursor: zoom-in;" onclick="openCsPageWorkflowModal()" title="Click to view full blueprint">
                    
                    <div class="position-absolute bottom-0 start-0 end-0 p-3 d-flex flex-wrap align-items-center justify-content-between gap-2" style="background: linear-gradient(to top, rgba(7,9,14,0.95) 0%, rgba(7,9,14,0) 100%);">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-dark bg-opacity-75 text-accent-brand border border-secondary border-opacity-50 px-2.5 py-1">
                                <i class="fa-solid fa-code-branch me-1"></i> 6 Production Nodes
                            </span>
                            <span class="text-white small d-none d-sm-inline">Click diagram to expand full view</span>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1" onclick="openCsPageWorkflowModal()">
                            <i class="fa-solid fa-expand me-1"></i> Fullscreen Blueprint
                        </button>
                    </div>
                </div>

                <!-- 6 Step Pipeline Flow Badges -->
                <div class="row g-2 mt-3 pt-2 text-start">
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="p-2.5 rounded-3 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                            <div class="text-accent-brand font-monospace small fw-bold mb-1">01 • TRIGGER</div>
                            <div class="text-white small fw-semibold">Webhook / Poll</div>
                            <div class="text-white-50" style="font-size: 0.72rem;">Detects new reply or form entry</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="p-2.5 rounded-3 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                            <div class="text-accent-brand font-monospace small fw-bold mb-1">02 • INGEST</div>
                            <div class="text-white small fw-semibold">Read Google Sheet</div>
                            <div class="text-white-50" style="font-size: 0.72rem;">Streams raw prospect data</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="p-2.5 rounded-3 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                            <div class="text-accent-brand font-monospace small fw-bold mb-1">03 • CLEANSE</div>
                            <div class="text-white small fw-semibold">Format &amp; Suffixes</div>
                            <div class="text-white-50" style="font-size: 0.72rem;">Removes LLC/Inc, fixes casing</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="p-2.5 rounded-3 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                            <div class="text-accent-brand font-monospace small fw-bold mb-1">04 • DNS LOOKUP</div>
                            <div class="text-white small fw-semibold">Cloudflare MX Check</div>
                            <div class="text-white-50" style="font-size: 0.72rem;">Validates real mail servers</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="p-2.5 rounded-3 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                            <div class="text-accent-brand font-monospace small fw-bold mb-1">05 • EVALUATE</div>
                            <div class="text-white small fw-semibold">Delivery Logic Gate</div>
                            <div class="text-white-50" style="font-size: 0.72rem;">Filters valid vs dead records</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="p-2.5 rounded-3 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                            <div class="text-accent-brand font-monospace small fw-bold mb-1">06 • SYNC &amp; ROUTE</div>
                            <div class="text-white small fw-semibold">Append &amp; Alert</div>
                            <div class="text-white-50" style="font-size: 0.72rem;">Pushes to clean sheet &amp; Slack</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content 2: Live Video Walkthrough -->
            <div id="csPageTabContentVideo" class="p-3 p-md-4 d-none">
                <div class="rounded-3 overflow-hidden position-relative" style="background: #000; border: 1px solid rgba(255,255,255,0.1); max-height: 560px;">
                    <video id="csPageVideoPlayer" class="w-100" controls preload="metadata" poster="assets/media/n8n/n8n-workflow.webp" style="max-height: 520px; object-fit: contain; outline: none; display: block; margin: 0 auto;">
                        <source src="assets/media/n8n/n8n-demo.mp4" type="video/mp4">
                        Your browser does not support HTML5 video. You can view the demo directly on <a href="https://screenrec.com/share/7SxeCZsImJ" target="_blank" class="text-accent-brand">ScreenRec</a>.
                    </video>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 pt-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success bg-opacity-20 text-success border border-success border-opacity-50 px-2.5 py-1">
                            <i class="fa-solid fa-play me-1"></i> Live Execution Demo
                        </span>
                        <span class="text-white-50 small">Watch how the workflow handles live lead ingestion and verification end-to-end.</span>
                    </div>
                    <a href="https://screenrec.com/share/7SxeCZsImJ" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1.5">
                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Open in ScreenRec
                    </a>
                </div>
            </div>
        </div>

        <!-- Technical Deep-Dive Architecture Cards -->
        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="text-center mb-4">
                    <span class="badge rounded-pill border border-secondary text-light mb-2 px-3 py-1.5" style="background: rgba(255,255,255,0.05); letter-spacing: 1px;">BEHIND THE SCENES</span>
                    <h3 class="h4 fw-bold text-white">How The 6-Node Architecture Executes</h3>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100" style="background: #0f172a; border: 1px solid rgba(255,255,255,0.07);">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge rounded-circle p-2 bg-brand text-dark fw-bold" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">1</span>
                        <h5 class="text-white fw-bold mb-0">Ingestion &amp; Normalization</h5>
                    </div>
                    <p class="text-white-50 small mb-0">
                        Pulls incoming rows from any Google Sheet, webhook, or inbox. Maps inconsistent header keys (<code>'Name'</code>, <code>'Raw Name'</code>, <code>'company'</code>) into strict normalized schema keys.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100" style="background: #0f172a; border: 1px solid rgba(255,255,255,0.07);">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge rounded-circle p-2 bg-brand text-dark fw-bold" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">2</span>
                        <h5 class="text-white fw-bold mb-0">RegEx Cleansing Engine</h5>
                    </div>
                    <p class="text-white-50 small mb-0">
                        Capitalizes names to clean Title Case. Regex strips corporate suffixes (<code>LLC, Inc, Corp, Ltd, GmbH</code>) and extracts clean root domains for deliverability checks.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100" style="background: #0f172a; border: 1px solid rgba(255,255,255,0.07);">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge rounded-circle p-2 bg-brand text-dark fw-bold" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;">3</span>
                        <h5 class="text-white fw-bold mb-0">Zero-Cost MX DNS Gate</h5>
                    </div>
                    <p class="text-white-50 small mb-0">
                        Calls Cloudflare DNS API (<code>dns-query?type=MX</code>) directly. Validates whether the recipient domain actually has active mail exchangers without costly third-party API subscriptions.
                    </p>
                </div>
            </div>
        </div>

        <!-- High-Impact CTA Banner -->
        <div id="audit-cta" class="p-4 p-md-5 rounded-4 text-center position-relative overflow-hidden mb-5" style="background: radial-gradient(ellipse at center, rgba(200, 224, 25, 0.12) 0%, rgba(15, 23, 42, 0.95) 75%), #0d1424; border: 1px solid rgba(200, 224, 25, 0.35); box-shadow: 0 0 50px rgba(200, 224, 25, 0.1);">
            <div class="position-relative" style="z-index: 2;">
                <div class="badge rounded-pill px-3 py-1.5 mb-3" style="background: rgba(200, 224, 25, 0.15); color: #C8E019; border: 1px solid rgba(200, 224, 25, 0.3); font-size: 0.75rem; letter-spacing: 0.5px;">
                    <i class="fa-solid fa-clock-rotate-left me-1"></i> ZERO PITCH · 100% TECHNICAL VALUE
                </div>
                <h3 class="display-6 fw-extrabold text-white mb-3">
                    Want to plug the leaks in your agency's lead pipeline?
                </h3>
                <p class="lead text-white-50 mx-auto mb-4" style="max-width: 640px; font-size: 1.1rem; line-height: 1.6;">
                    Book a free 15-minute workflow audit. We will inspect your current lead intake, CRM connections, and reply speed — and outline the exact n8n or Make.com blueprint to automate it completely.
                </p>
                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                    <a href="contact" class="btn btn-brand btn-lg rounded-pill px-5 py-3 fw-extrabold text-dark shadow d-inline-flex align-items-center gap-2" style="background: #C8E019; border: none; font-size: 1.05rem;">
                        <i class="fa-solid fa-calendar-check fs-5"></i>
                        <span>Book a 15-min workflow audit</span>
                        <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="mt-3 text-white-50 small">
                    <i class="fa-solid fa-shield-halved text-accent-neon me-1"></i> Free 1-on-1 audit with an automation engineer. No high-pressure sales.
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Fullscreen Blueprint Modal -->
<div class="modal fade" id="csPageWorkflowModal" tabindex="-1" aria-labelledby="csPageWorkflowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content text-white" style="background: #0b0f19; border: 1px solid rgba(200, 224, 25, 0.3); box-shadow: 0 0 50px rgba(0,0,0,0.8);">
            <div class="modal-header border-bottom border-light border-opacity-10 py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill px-2.5 py-1 text-dark fw-bold" style="background: #C8E019;">n8n Production Canvas</span>
                    <h5 class="modal-title h6 mb-0 text-white" id="csPageWorkflowModalLabel">Lead Cleaner &amp; Email Validator Workflow</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2 text-center" style="background: #07090e; overflow-x: auto;">
                <img src="assets/media/n8n/n8n-workflow.webp" alt="Full Blueprint" class="img-fluid rounded-2" style="min-width: 100%; object-fit: contain;">
            </div>
            <div class="modal-footer border-top border-light border-opacity-10 py-2.5 px-4 d-flex justify-content-between">
                <span class="text-white-50 small">6 active nodes: Manual/Schedule Trigger &rarr; Google Sheet Ingestion &rarr; Regex Cleanse &rarr; Cloudflare DNS MX &rarr; Validation Gate &rarr; Clean Sheet Sync</span>
                <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Case Study Interactive Script -->
<script>
function switchCsPageTab(tab) {
    var archTab = document.getElementById('csPageTabContentArchitecture');
    var vidTab = document.getElementById('csPageTabContentVideo');
    var archBtn = document.getElementById('csPageTabBtnArchitecture');
    var vidBtn = document.getElementById('csPageTabBtnVideo');
    var videoPlayer = document.getElementById('csPageVideoPlayer');

    if (tab === 'architecture') {
        archTab.classList.remove('d-none');
        vidTab.classList.add('d-none');
        archBtn.style.background = '#C8E019';
        archBtn.style.color = '#000';
        archBtn.style.borderColor = '#C8E019';
        vidBtn.style.background = 'rgba(255,255,255,0.05)';
        vidBtn.style.color = '#cbd5e1';
        vidBtn.style.borderColor = 'rgba(255,255,255,0.1)';
        if (videoPlayer) videoPlayer.pause();
    } else {
        archTab.classList.add('d-none');
        vidTab.classList.remove('d-none');
        vidBtn.style.background = '#C8E019';
        vidBtn.style.color = '#000';
        vidBtn.style.borderColor = '#C8E019';
        archBtn.style.background = 'rgba(255,255,255,0.05)';
        archBtn.style.color = '#cbd5e1';
        archBtn.style.borderColor = 'rgba(255,255,255,0.1)';
    }
}

function openCsPageWorkflowModal() {
    var modalEl = document.getElementById('csPageWorkflowModal');
    if (modalEl && typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        var modal = new bootstrap.Modal(modalEl);
        modal.show();
    } else if (modalEl) {
        modalEl.classList.add('show');
        modalEl.style.display = 'block';
        document.body.classList.add('modal-open');
    }
}
</script>

<?php include 'footer.php'; ?>
