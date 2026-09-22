<?php 
include_once 'security.php'; 

if (!isset($page_key)) {
    $page_key = 'index';
}

$meta_config = [
        'service' => [
        'title' => 'AI Automation & Autonomous Voice Services | Automatixes',
        'desc' => 'Explore our full suite of AI automations: WhatsApp business workflows, CRM data sync, cold email recovery, 24/7 support agents, and voice bots.',
        'keywords' => 'AI Services, WhatsApp Automation, CRM Integration, Voice Agents, n8n agency, Automatixes services',
        'url' => 'service'
    ],
    'index' => [
        'title' => 'AI Automation Agency (n8n, Make, GoHighLevel) | Automatixes',
        'desc' => 'Automatixes is an AI-first agency building custom AI agents and workflow automations to connect your CRM, WhatsApp, and emails. Scale operations 24/7.',
        'keywords' => 'AI Automation Agency, n8n, Make, GoHighLevel, Zapier, AI Agents, software development, CRM integration',
        'url' => ''
    ],
        'portfolio' => [
        'title' => 'Client Case Studies & AI Deployment Portfolio | Automatixes',
        'desc' => 'Explore live case studies of custom autonomous AI agents, n8n CRM automations, voice qualification bots, and SaaS tools built by Automatixes.',
        'keywords' => 'AI Portfolio, Automation Case Studies, n8n deployments, AI Voice Agents portfolio, Automatixes',
        'url' => 'portfolio'
    ],
    'about' => [
        'title' => 'Our Mission & Automation Experts | Automatixes',
        'desc' => 'Meet Automatixes. We design custom AI agent systems, API integrations, and e-commerce growth strategies to help small & mid-sized businesses automate operations.',
        'keywords' => 'About Automatixes, AI Engineers, CRM automation experts, n8n consultants',
        'url' => 'about'
    ],
    'ai-Agent-Automations' => [
        'title' => 'AI Agent & Automation Systems (Autonomous Agents & n8n Workflows) | Automatixes',
        'desc' => 'Deploy custom autonomous AI agents and end-to-end workflow automations connecting WhatsApp, CRM, Slack, and email. Scale your operations 24/7 with Automatixes.',
        'keywords' => 'AI Agent, AI Automation, Autonomous AI Agents, n8n agency, Make.com integration, custom RAG, workflow automation',
        'url' => 'ai-Agent-Automations'
    ],
    'ai-agent-automations' => [
        'title' => 'AI Agent & Automation Systems (Autonomous Agents & n8n Workflows) | Automatixes',
        'desc' => 'Deploy custom autonomous AI agents and end-to-end workflow automations connecting WhatsApp, CRM, Slack, and email. Scale your operations 24/7 with Automatixes.',
        'keywords' => 'AI Agent, AI Automation, Autonomous AI Agents, n8n agency, Make.com integration, custom RAG, workflow automation',
        'url' => 'ai-Agent-Automations'
    ],
    'ai-automated-solutions' => [
        'title' => 'AI Agent & Automation Systems (Autonomous Agents & n8n Workflows) | Automatixes',
        'desc' => 'Deploy custom autonomous AI agents and end-to-end workflow automations connecting WhatsApp, CRM, Slack, and email. Scale your operations 24/7 with Automatixes.',
        'keywords' => 'AI Agent, AI Automation, Autonomous AI Agents, n8n agency, Make.com integration, custom RAG, workflow automation',
        'url' => 'ai-Agent-Automations'
    ],
    'contact' => [
        'title' => 'Book a Free AI Operations Audit & Consultation | Automatixes',
        'desc' => 'Ready to automate your operations? Contact Automatixes to schedule a free automation audit. We connect your calendar, CRM, and communication tools.',
        'keywords' => 'Contact Automatixes, AI operations audit, book consultation, digital agency',
        'url' => 'contact'
    ],
    'admin' => [
        'title' => 'CRM Lead Logs Control Panel | Automatixes',
        'desc' => 'Internal dashboard for Automatixes administrators to track real-time contact leads, newsletter subscribers, and automated cost quote submissions.',
        'keywords' => 'Admin dashboard, lead tracking, CRM logs',
        'url' => 'admin'
    ],
    'invoice-maker' => [
        'title' => 'Free Online Invoice Maker | Automatixes',
        'desc' => 'Generate professional, customizable invoices instantly with live math calculations, dynamic line items, and print/PDF export from Automatixes.',
        'keywords' => 'Free Invoice Maker, online invoice generator, Automatixes invoice tool, automated invoice PDF, billing software',
        'url' => 'invoice-maker'
    ],
    'whatsapp-api' => [
        'title' => 'Automatixes WhatsApp Multi-Device API & Automation Engine | Moiz Baig',
        'desc' => 'Connect, automate, and scale WhatsApp conversations with ultra-fast Baileys v6+ REST & WebSocket API, native AI bots, and multi-tenant management.',
        'keywords' => 'WhatsApp API, Automatixes WhatsApp API, WhatsApp Multi-Device API, WhatsApp Chatbot, WhatsApp Baileys REST API, Moiz Baig',
        'url' => 'whatsapp-api'
    ],
    'voice-agent' => [
        'title' => 'Talk to our AI Voice Agent | Automatixes',
        'desc' => 'Experience the future of customer support. Click to start a live voice conversation with our autonomous AI agent.',
        'keywords' => 'AI Voice Agent, Vapi AI, Retell AI, conversational AI, voicebot demo',
        'url' => 'voice-agent'
    ],
    'blogs' => [
        'title' => 'Insights & Updates | Automatixes',
        'desc' => 'Read our latest insights on AI automation, web development, and digital marketing strategies for growing your business.',
        'keywords' => 'Automatixes blog, AI automation insights, web development tips, business growth',
        'url' => 'blogs'
    ],
    'blog-detail' => [
        'title' => 'Blog Detail | Automatixes',
        'desc' => 'Read the full article and gain insights into AI automation, digital operations, and bespoke software development.',
        'keywords' => 'Automatixes blog, article',
        'url' => 'blog-detail'
    ],
    'case-study' => [
        'title' => 'Case Study: n8n Lead Recovery & Verification Engine | Automatixes',
        'desc' => 'How B2B lead generation agencies recover 30%+ lost pipeline with autonomous n8n workflows, Cloudflare DNS MX verification, and <60s speed-to-lead.',
        'keywords' => 'n8n Case Study, Lead Recovery Automation, Speed to Lead, DNS MX verification, Automatixes Case Study, n8n workflow',
        'url' => 'case-study'
    ],
    'whatsapp-automation' => [
        'title' => 'WhatsApp Automation & Conversational CRM Engine | Automatixes',
        'desc' => 'Connect official WhatsApp Business API with n8n and Make to qualify prospects, trigger drip sequences, and sync CRM pipelines 24/7.',
        'keywords' => 'WhatsApp Automation, WhatsApp Business API, n8n WhatsApp, Make WhatsApp, Conversational CRM',
        'url' => 'whatsapp-automation'
    ],
    'crm-integration' => [
        'title' => 'Enterprise CRM Integration & Bi-Directional Sync (HubSpot, GoHighLevel) | Automatixes',
        'desc' => 'Seamless bi-directional syncing between your CRM, email, calendar, and payment systems using n8n and custom webhook APIs.',
        'keywords' => 'CRM Integration, HubSpot integration, GoHighLevel integration, n8n CRM sync, bi-directional sync',
        'url' => 'crm-integration'
    ],
    'email-automation' => [
        'title' => 'Automated Cold Email & Inbound Lead Routing Workflows | Automatixes',
        'desc' => 'Multi-mailbox automated outbound email systems with real-time MX DNS verification, warm reply triage, and zero bounce loss.',
        'keywords' => 'Email Automation, cold outreach automation, DNS MX verification, email warmup, n8n email workflow',
        'url' => 'email-automation'
    ],
    'lead-recovery' => [
        'title' => 'Autonomous Lead Recovery & Speed-to-Lead Engine | Automatixes',
        'desc' => 'Stop lead leakage. Sub-60s instant automated reply, real-time validation, and automated warm re-engagement to recover 30%+ lost pipeline.',
        'keywords' => 'Lead Recovery, Speed to Lead, pipeline recovery, n8n lead automation, B2B lead response',
        'url' => 'lead-recovery'
    ],
    'support-agents' => [
        'title' => '24/7 Autonomous Customer Support AI Agents (Custom RAG) | Automatixes',
        'desc' => 'Deploy custom RAG knowledge-base customer support agents that resolve 70%+ of tier-1 inquiries across web, WhatsApp, and email.',
        'keywords' => 'AI Support Agents, Customer Service AI, RAG Knowledge Base, Tier-1 support automation, Zendesk AI',
        'url' => 'support-agents'
    ],
    'lead-scoring' => [
        'title' => 'AI Lead Scoring, Qualification & Priority Routing | Automatixes',
        'desc' => 'Classify inbound inquiries with AI intent analysis, score high-value prospects, and route directly to top closers in real time.',
        'keywords' => 'AI Lead Scoring, ICP qualification, lead routing automation, CRM deal scoring, sales qualification',
        'url' => 'lead-scoring'
    ],
    'inbound-voice' => [
        'title' => 'Inbound AI Voice Receptionist & Call Answering Bot | Automatixes',
        'desc' => '24/7 AI receptionist that answers inbound phone calls, handles inquiries, qualifies prospects, and books calendar slots in under 500ms.',
        'keywords' => 'Inbound Voice AI, AI Receptionist, phone call bot, Retell AI, Vapi, automated call booking',
        'url' => 'inbound-voice'
    ],
    'outbound-voice' => [
        'title' => 'Outbound AI Voice Qualification & Reactivation Bot | Automatixes',
        'desc' => 'Scale telephone qualification and stale lead re-activation with human-cadence conversational outbound AI agents.',
        'keywords' => 'Outbound Voice AI, cold call AI bot, lead reactivation, telephony qualification, Retell AI outbound',
        'url' => 'outbound-voice'
    ],
    'tools' => [
        'title' => 'Internal AI Utilities, Tools & SaaS Blueprints | Automatixes',
        'desc' => 'Explore our collection of specialized production tools, client utility bots, and internal AI automation demos.',
        'keywords' => 'Automatixes Tools, invoice maker, QR generator, WhatsApp API engine, AI utilities',
        'url' => 'tools'
    ],
    'propertybot' => [
        'title' => 'Property Advisor — Digital Real Estate Concierge | Automatixes',
        'desc' => 'Connect with our dedicated Property Advisory Desk for verified pricing benchmarks, documentation compliance (Fard & NOC), and private site viewings across prime developments in Pakistan.',
        'keywords' => 'Property Advisor, Real Estate Concierge, DHA Lahore, Bahria Town, Real Estate Consultant, Automatixes',
        'url' => 'propertybot'
    ]
];

// Support dynamic meta tags supplied by individual pages (e.g. blog-detail.php)
$default_meta = isset($meta_config[$page_key]) ? $meta_config[$page_key] : $meta_config['index'];
$active_meta = (isset($custom_meta) && is_array($custom_meta)) ? array_merge($default_meta, $custom_meta) : $default_meta;

// Standardize canonical domain (https://automatixes.com)
$canonical_base = "https://automatixes.com";
$canonical_url = $canonical_base . (!empty($active_meta['url']) ? '/' . ltrim($active_meta['url'], '/') : '');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https" : "http";
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'automatixes.com';

// Dynamic or standard OpenGraph image
$og_image = (!empty($active_meta['image'])) 
    ? (strpos($active_meta['image'], 'http') === 0 ? $active_meta['image'] : $canonical_base . '/' . ltrim($active_meta['image'], '/'))
    : "{$canonical_base}/assets/img/services/ai_automations.jpg";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Consent Mode v2 (must fire BEFORE gtag.js) -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('consent', 'default', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied',
        'wait_for_update': 500
      });
      gtag('set', 'ads_data_redaction', true);
      gtag('set', 'url_passthrough', true);

      if (localStorage.getItem('cookie_consent') === 'granted') {
        gtag('consent', 'update', {
          'ad_storage': 'granted',
          'ad_user_data': 'granted',
          'ad_personalization': 'granted',
          'analytics_storage': 'granted'
        });
      }
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QNFRW1GPJR"></script>
    <script>
      gtag('js', new Date());
      gtag('config', 'G-QNFRW1GPJR');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $active_meta['title']; ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="manifest" href="site.webmanifest">
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    
    <!-- Meta SEO Tags -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="description" content="<?php echo $active_meta['desc']; ?>">
    <meta name="keywords" content="<?php echo $active_meta['keywords']; ?>">
    <meta name="author" content="Automatixes">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $canonical_url; ?>">
    <meta property="og:title" content="<?php echo $active_meta['title']; ?>">
    <meta property="og:description" content="<?php echo $active_meta['desc']; ?>">
    <meta property="og:image" content="<?php echo $og_image; ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo $canonical_url; ?>">
    <meta name="twitter:title" content="<?php echo $active_meta['title']; ?>">
    <meta name="twitter:description" content="<?php echo $active_meta['desc']; ?>">
    <meta name="twitter:image" content="<?php echo $og_image; ?>">

    <!-- Hreflang Tags for SEO/GEO -->
    <link rel="alternate" hreflang="x-default" href="<?php echo $canonical_url; ?>">
    <link rel="alternate" hreflang="en" href="<?php echo $canonical_url; ?>">
    <link rel="alternate" hreflang="en-us" href="<?php echo $canonical_url; ?>">
    <link rel="alternate" hreflang="en-gb" href="<?php echo $canonical_url; ?>">
    <link rel="alternate" hreflang="en-ca" href="<?php echo $canonical_url; ?>">
    <link rel="alternate" hreflang="ar" href="<?php echo $canonical_url; ?>">
    <link rel="alternate" hreflang="fa" href="<?php echo $canonical_url; ?>">

    <!-- JSON-LD Structured Data Schema -->
    <!-- WebSite Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Automatixes",
      "url": "<?php echo $canonical_base; ?>",
      "description": "An AI-first automation agency that designs custom AI agents and workflow automations to run business operations 24/7."
    }
    </script>

    <!-- LocalBusiness & Organization Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Automatixes",
      "url": "<?php echo $canonical_base; ?>",
      "logo": "<?php echo $canonical_base; ?>/assets/img/logo/automatixes-logo-clean.png",
      "image": "<?php echo $canonical_base; ?>/assets/img/services/ai_automations.jpg",
      "description": "An AI-first automation agency that designs custom AI agents and workflow automations to run business operations 24/7.",
      "telephone": "+92-336-6920141",
      "email": "contact@automatixes.com",
      "areaServed": [
        {"@type": "Country", "name": "USA"},
        {"@type": "Country", "name": "Canada"},
        {"@type": "Region", "name": "Europe"},
        {"@type": "Region", "name": "Arabian Peninsula"},
        {"@type": "Country", "name": "Global"}
      ]
    }
    </script>

    <!-- Service Schema -->
    <?php if (in_array($page_key, ['ai-Agent-Automations', 'ai-agent-automations', 'ai-automated-solutions', 'website-development', 'whatsapp-automation', 'crm-integration', 'email-automation', 'lead-recovery', 'support-agents', 'lead-scoring', 'inbound-voice', 'outbound-voice'])): ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "name": "<?php echo $active_meta['title']; ?>",
      "serviceType": "<?php echo str_replace(' | Automatixes', '', $active_meta['title']); ?>",
      "provider": {
        "@type": "Organization",
        "name": "Automatixes",
        "url": "<?php echo $canonical_base; ?>"
      },
      "description": "<?php echo $active_meta['desc']; ?>",
      "areaServed": {
        "@type": "Place",
        "name": "Worldwide"
      }
    }
    </script>
    <?php endif; ?>

    <!-- BreadcrumbList Schema -->
    <?php if ($page_key !== 'index'): ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "<?php echo $canonical_base; ?>"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "<?php echo str_replace(' | Automatixes', '', $active_meta['title']); ?>",
        "item": "<?php echo $canonical_url; ?>"
      }]
    }
    </script>
    <?php endif; ?>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome CDN for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts: Syne (Preloader) / Outfit (Headings) / Plus Jakarta Sans (Body) / Space Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Mono:wght@400;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Custom Main CSS -->
    <link rel="stylesheet" href="assets/css/main.css?v=14.1.1">

        <!-- Google Sitelinks & SiteNavigationElement Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "ItemList",
          "name": "Automatixes AI Solutions & Tools",
          "itemListElement": [
            {
              "@type": "SiteNavigationElement",
              "position": 1,
              "name": "AI Agent & Automations",
              "description": "Custom autonomous AI agents and n8n/Make workflows for CRM, lead qualification, and support.",
              "url": "https://www.automatixes.com/ai-Agent-Automations"
            },
            {
              "@type": "SiteNavigationElement",
              "position": 2,
              "name": "AI Voice Agents",
              "description": "Human-like conversational AI voice agents for inbound support and automated outbound qualification.",
              "url": "https://www.automatixes.com/voice-agent"
            },
            {
              "@type": "SiteNavigationElement",
              "position": 3,
              "name": "Our Process & Methodology",
              "description": "4-stage engineering blueprint: Audit, Architecture, Integration, and 24/7 Operations.",
              "url": "https://www.automatixes.com/process"
            },
            {
              "@type": "SiteNavigationElement",
              "position": 4,
              "name": "Customer Ratings & Reviews",
              "description": "Verified client testimonials and real ROI case studies from enterprise automation deployments.",
              "url": "https://www.automatixes.com/reviews"
            },
            {
              "@type": "SiteNavigationElement",
              "position": 6,
              "name": "Book Free AI Consultation",
              "description": "Schedule a 1-on-1 strategy call to identify automation bottlenecks and calculate projected ROI.",
              "url": "https://www.automatixes.com/contact"
            },
            {
              "@type": "SiteNavigationElement",
              "position": 7,
              "name": "Free Dynamic QR Studio",
              "description": "Enterprise-grade QR generator with custom logo branding and live scan telemetry.",
              "url": "https://qrcode.automatixes.com/"
            },
            {
              "@type": "SiteNavigationElement",
              "position": 8,
              "name": "Free Invoice Maker & PDF Ledger",
              "description": "Professional A4 PDF financial ledger generator with instant tax calculations.",
              "url": "https://invoicemaker.automatixes.com/"
            }
          ]
        }
      ]
    }
    </script>

</head>
<body>

    <!-- Preloader Start -->
    <div id="preloader" style="direction: ltr !important; unicode-bidi: isolate !important;">
        <div class="animation-preloader" style="direction: ltr !important; unicode-bidi: isolate !important;">
            <div class="spinner"></div>
            <div class="txt-loading" style="direction: ltr !important; unicode-bidi: isolate !important; flex-direction: row !important;">
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="U" class="letters-loading">U</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
                <span data-text-preloader="O" class="letters-loading">O</span>
                <span data-text-preloader="M" class="letters-loading">M</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="X" class="letters-loading">X</span>
                <span data-text-preloader="E" class="letters-loading">E</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
            </div>
            <p class="text-center loading-subtitle" style="direction: ltr !important;">Loading</p>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Header Navigation Start -->
    <header id="header-sticky" class="header-nav">
        <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-0">
                <a class="navbar-brand d-flex align-items-center" href="index">
                    <img src="assets/img/logo/automatixes-logo-clean.png" alt="Automatixes Logo" style="height: 45px; width: auto; object-fit: contain;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                                <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="mainNavbar">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item"><a class="nav-link active" href="index">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                        <li class="nav-item"><a class="nav-link text-nowrap<?php echo ($page_key === 'service' ? ' active' : ''); ?>" href="service">Services</a></li>
                        <li class="nav-item"><a class="nav-link text-nowrap" href="portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link text-nowrap" href="process">Process</a></li>
                        <li class="nav-item"><a class="nav-link text-nowrap" href="blogs">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link text-nowrap" href="contact">Contact us</a></li>

                        <!-- Mobile Language Switcher -->
                        <li class="nav-item d-lg-none mt-2 pt-2 border-top border-secondary">
                            <div class="d-flex align-items-center justify-content-between px-2">
                                <span class="text-white-50 small"><i class="fa-solid fa-globe me-2 text-accent-neon"></i>Language</span>
                                <select class="form-select form-select-sm bg-dark text-white border-secondary w-auto" onchange="setSiteLanguage(this.value)">
                                    <option value="en">English (EN)</option>
                                    <option value="fa">فارسی (Persian)</option>
                                    <option value="ar">العربية (Arabic)</option>
                                    <option value="ur">اردو (Urdu)</option>
                                    <option value="es">Español (Spanish)</option>
                                    <option value="fr">Français (French)</option>
                                    <option value="de">Deutsch (German)</option>
                                    <option value="ru">Русский (Russian)</option>
                                    <option value="zh-CN">中文 (Chinese)</option>
                                    <option value="tr">Türkçe (Turkish)</option>
                                </select>
                            </div>
                        </li>
                    </ul>

                    <!-- Desktop Actions: Language Selector & CTA -->
                    <div class="d-none d-lg-flex align-items-center gap-3">
                        <div class="dropdown language-switcher-dropdown">
                            <button class="btn btn-sm btn-outline-light rounded-pill px-3 py-1.5 d-flex align-items-center gap-2 border-secondary" type="button" id="langDropdownBtn" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 13px; background: rgba(255,255,255,0.05);">
                                <i class="fa-solid fa-globe text-accent-neon"></i>
                                <span id="activeLangText">EN</span>
                                <i class="fa-solid fa-chevron-down opacity-50" style="font-size: 10px;"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 bg-dark py-2" aria-labelledby="langDropdownBtn" style="min-width: 200px; border: 1px solid rgba(255,255,255,0.12) !important; border-radius: 12px; z-index: 1050;">
                                <li><h6 class="dropdown-header text-uppercase text-muted" style="font-size: 10px; letter-spacing: 1px;">Select Language</h6></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('en')"><span>English</span> <small class="text-white-50">EN</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('fa')"><span class="fw-bold" style="color: var(--accent-neon);">فارسی (Persian)</span> <small class="badge bg-surface-2 text-accent-neon">FA</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('ar')"><span>العربية (Arabic)</span> <small class="text-white-50">AR</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('ur')"><span>اردو (Urdu)</span> <small class="text-white-50">UR</small></a></li>
                                <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('es')"><span>Español (Spanish)</span> <small class="text-white-50">ES</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('fr')"><span>Français (French)</span> <small class="text-white-50">FR</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('de')"><span>Deutsch (German)</span> <small class="text-white-50">DE</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('ru')"><span>Русский (Russian)</span> <small class="text-white-50">RU</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('zh-CN')"><span>中文 (Chinese)</span> <small class="text-white-50">ZH</small></a></li>
                                <li><a class="dropdown-item py-1.5 text-white d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="setSiteLanguage('tr')"><span>Türkçe (Turkish)</span> <small class="text-white-50">TR</small></a></li>
                            </ul>
                        </div>
                        <a href="contact" class="btn btn-brand rounded-pill px-4 py-2 fw-semibold text-nowrap">Get Started</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header Navigation End -->

    <!-- Hidden Google Translate Element -->
    <div id="google_translate_element" style="display: none !important;"></div>

    <div id="smooth-wrapper">
        <div id="smooth-content">








