<?php 
$page_key = 'tools'; 
include 'header.php'; 
?>

<!-- Tools Showcase Hero Section Start -->
<section class="position-relative py-5 overflow-hidden" style="background: linear-gradient(180deg, #050811 0%, #0b1120 50%, #070a12 100%); padding-top: 170px !important; min-height: 85vh;">
    <!-- Ambient Atmospheric Glows -->
    <div class="position-absolute pointer-events-none rounded-circle" style="width: 700px; height: 700px; top: -100px; left: 50%; transform: translateX(-50%); background: radial-gradient(circle, rgba(200, 224, 25, 0.12) 0%, transparent 70%); filter: blur(80px); z-index: 0;"></div>

    <div class="container position-relative" style="z-index: 1;">
        <!-- Header -->
        <div class="text-center max-w-850 mx-auto mb-5">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill mb-4" style="background: rgba(200, 224, 25, 0.08); border: 1px solid rgba(200, 224, 25, 0.25);">
                <span class="badge rounded-pill px-2 py-0.5" style="background: #C8E019; color: #000; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.05em;">LABS &amp; UTILITIES</span>
                <span class="text-white small fw-bold" style="font-size: 0.85rem;"><i class="fa-solid fa-screwdriver-wrench text-accent-neon me-1"></i> Automatixes Toolset</span>
            </div>
            
            <h1 class="display-4 fw-extrabold text-white mb-3" style="letter-spacing: -0.03em;">
                Internal Utilities &amp; <span style="background: linear-gradient(135deg, #FFFFFF 30%, #C8E019 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">SaaS Blueprints</span>
            </h1>
            
            <p class="lead text-white-50 mx-auto" style="max-width: 720px; font-size: 1.15rem; line-height: 1.7;">
                In addition to enterprise client automations, our engineering team designs and maintains standalone productivity tools, client portals, and conversational demos.
            </p>
        </div>

        <!-- 6 Tools Grid -->
        <div class="row g-4 mb-5">
            <!-- Tool 1: Invoice Maker -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 h-100 d-flex flex-column" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2" style="background: rgba(200, 224, 25, 0.1); color: #C8E019; width: 44px; height: 44px; font-size: 1.2rem;">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 font-monospace small px-2.5 py-1">FREE UTILITY</span>
                    </div>
                    <h3 class="h5 fw-bold text-white mb-2">Online Invoice Maker</h3>
                    <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                        Generate clean, professional PDF invoices with real-time tax calculations, customizable currency symbols, dynamic line items, and print-ready export.
                    </p>
                    <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                        <a href="invoice-maker" class="btn btn-sm btn-brand rounded-pill w-100 py-2 fw-bold d-flex align-items-center justify-content-center gap-2">
                            <span>Open Invoice Maker</span>
                            <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tool 2: Dynamic QR Studio -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 h-100 d-flex flex-column" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2" style="background: rgba(56, 189, 248, 0.1); color: #38bdf8; width: 44px; height: 44px; font-size: 1.2rem;">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <span class="badge bg-info bg-opacity-25 text-info border border-info border-opacity-25 font-monospace small px-2.5 py-1">LIVE TOOL</span>
                    </div>
                    <h3 class="h5 fw-bold text-white mb-2">Dynamic QR Studio</h3>
                    <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                        Create branded vector QR codes with custom logos, high-contrast gradient styles, scan analytics, and dynamic redirect capabilities.
                    </p>
                    <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                        <a href="https://qrcode.automatixes.com/" target="_blank" class="btn btn-sm btn-outline-light rounded-pill w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <span>Launch QR Studio</span>
                            <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tool 3: WhatsApp Multi-Device API Engine -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 h-100 d-flex flex-column" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2" style="background: rgba(37, 211, 102, 0.1); color: #25D366; width: 44px; height: 44px; font-size: 1.2rem;">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 font-monospace small px-2.5 py-1">DEVELOPER API</span>
                    </div>
                    <h3 class="h5 fw-bold text-white mb-2">WhatsApp Multi-Device API</h3>
                    <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                        High-concurrency Baileys v6+ REST &amp; WebSocket gateway for multi-tenant WhatsApp bot orchestration, media dispatch, and message event listeners.
                    </p>
                    <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                        <a href="whatsapp-api" class="btn btn-sm btn-outline-light rounded-pill w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <span>Inspect API Blueprint</span>
                            <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tool 4: Commercial AI Product Shoot Generator -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 h-100 d-flex flex-column" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2" style="background: rgba(234, 179, 8, 0.1); color: #eab308; width: 44px; height: 44px; font-size: 1.2rem;">
                            <i class="fa-solid fa-camera-retro"></i>
                        </div>
                        <span class="badge bg-warning bg-opacity-25 text-warning border border-warning border-opacity-25 font-monospace small px-2.5 py-1">AI LAB</span>
                    </div>
                    <h3 class="h5 fw-bold text-white mb-2">Commercial Product Shoot</h3>
                    <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                        Photorealistic commercial staging and studio lighting synthesis for e-commerce products without expensive physical photography sets.
                    </p>
                    <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                        <a href="product-shoot" class="btn btn-sm btn-outline-light rounded-pill w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <span>Explore Studio</span>
                            <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tool 5: AI Image Generator Studio -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 h-100 d-flex flex-column" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2" style="background: rgba(168, 85, 247, 0.1); color: #a855f7; width: 44px; height: 44px; font-size: 1.2rem;">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                        </div>
                        <span class="badge bg-primary bg-opacity-25 text-primary border border-primary border-opacity-25 font-monospace small px-2.5 py-1">GENERATIVE STUDIO</span>
                    </div>
                    <h3 class="h5 fw-bold text-white mb-2">AI Image Generator</h3>
                    <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                        Prompt-to-asset visual generation engine tailored for branding concepts, high-resolution textures, and marketing collateral ideation.
                    </p>
                    <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                        <a href="ai-image-generator" class="btn btn-sm btn-outline-light rounded-pill w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <span>Open Image Generator</span>
                            <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tool 6: Property Advisor Concierge -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 h-100 d-flex flex-column" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); transition: transform 0.3s ease, border-color 0.3s ease;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2" style="background: rgba(200, 224, 25, 0.1); color: #C8E019; width: 44px; height: 44px; font-size: 1.2rem;">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 font-monospace small px-2.5 py-1">DEMO BUILD</span>
                    </div>
                    <h3 class="h5 fw-bold text-white mb-2">Property Advisor Concierge</h3>
                    <p class="text-white-50 small mb-4 flex-grow-1" style="line-height: 1.6;">
                        Interactive advisory portal demonstrating buyer qualification, legal document guidance (Fard &amp; NOC), and private site viewing booking.
                    </p>
                    <div class="pt-3 border-top border-secondary border-opacity-25 mt-auto">
                        <a href="propertybot" class="btn btn-sm btn-brand rounded-pill w-100 py-2 fw-bold d-flex align-items-center justify-content-center gap-2">
                            <span>Try Concierge Demo</span>
                            <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Tool Development CTA Banner -->
        <div class="p-4 p-md-5 rounded-4 text-center" style="background: rgba(200, 224, 25, 0.04); border: 1px solid rgba(200, 224, 25, 0.25);">
            <h3 class="h3 fw-bold text-white mb-2">Need a Custom Internal Tool for Your Business?</h3>
            <p class="text-white-50 small mb-4 mx-auto" style="max-width: 600px; line-height: 1.6;">
                We design custom client portals, automated calculators, customer-facing AI bots, and operational dashboards tailored to your exact business specifications.
            </p>
            <a href="contact" class="btn btn-brand rounded-pill px-5 py-3 fw-bold shadow">
                <span>Discuss Your Custom Tool</span>
                <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
<!-- Tools Showcase Hero Section End -->

<?php include 'footer.php'; ?>
