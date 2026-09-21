<?php $page_key = 'contact'; include 'header.php'; ?>

<!-- Contact Hero Section -->
<section class="subpage-hero text-center text-white">
    <div class="container">
        <span class="badge bg-brand-translucent text-accent-brand mb-3 font-monospace px-3 py-2 border border-brand-50">GET IN TOUCH</span>
        <h1 class="display-4 fw-extrabold text-white">Contact Automatixes</h1>
        <div class="title-underline"></div>
        <p class="lead text-white-50 mx-auto mt-4 max-w-700">
            Have questions about AI integrations or need a web build? Send us a message below.
        </p>
    </div>
</section>

<!-- Detailed Contact Form Section -->
<section class="section-padding bg-transparent text-white">
    <div class="container">
        <!-- Direct Communication Channels -->
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="card-glass p-4 rounded-4 h-100 text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-surface-2 mb-3" style="width: 52px; height: 52px;">
                        <i class="fa-brands fa-whatsapp fs-3 text-success"></i>
                    </div>
                    <h5 class="text-white fw-bold mb-1">WhatsApp Direct</h5>
                    <p class="text-muted small mb-3">Instant chat & voice inquiries</p>
                    <a href="https://wa.me/923366920141" target="_blank" rel="noopener" class="btn btn-sm btn-outline-light rounded-pill px-3">
                        +92 336 6920141 <i class="fa-solid fa-arrow-up-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-glass p-4 rounded-4 h-100 text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-surface-2 mb-3" style="width: 52px; height: 52px;">
                        <i class="fa-solid fa-envelope fs-3 text-accent-brand"></i>
                    </div>
                    <h5 class="text-white fw-bold mb-1">Direct Email</h5>
                    <p class="text-muted small mb-3">RFPs & architecture briefs</p>
                    <a href="mailto:contact@automatixes.com" class="btn btn-sm btn-outline-light rounded-pill px-3">
                        contact@automatixes.com <i class="fa-solid fa-paper-plane ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-glass p-4 rounded-4 h-100 text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-surface-2 mb-3" style="width: 52px; height: 52px;">
                        <i class="fa-solid fa-clock-rotate-left fs-3 text-accent-neon"></i>
                    </div>
                    <h5 class="text-white fw-bold mb-1">Response SLA</h5>
                    <p class="text-muted small mb-3">Guaranteed initial reply</p>
                    <span class="badge bg-surface-2 border border-light-subtle text-accent-neon px-3 py-2 font-monospace">&lt; 12 Hours SLA</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-glass p-4 rounded-4 h-100 text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-surface-2 mb-3" style="width: 52px; height: 52px;">
                        <i class="fa-solid fa-earth-americas fs-3 text-accent-orange"></i>
                    </div>
                    <h5 class="text-white fw-bold mb-1">Global Coverage</h5>
                    <p class="text-muted small mb-3">US, UK, EU, UAE, & APAC</p>
                    <span class="badge bg-surface-2 border border-light-subtle text-white px-3 py-2 font-monospace">Remote Worldwide</span>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form-wrapper p-4 p-md-5 rounded-4 shadow-sm bg-surface-1 border border-secondary border-opacity-25">
                    <h3 class="mb-4 fw-extrabold text-white text-center">Project Proposal Form</h3>

                    <form id="contact-firebase-form-page" novalidate>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="contact-name-page" class="form-label text-white fw-bold">Full Name</label>
                                <input type="text" class="form-control border-light-subtle bg-transparent text-white" id="contact-name-page" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact-email-page" class="form-label text-white fw-bold">Email Address</label>
                                <input type="email" class="form-control border-light-subtle bg-transparent text-white" id="contact-email-page" placeholder="john@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact-phone-page" class="form-label text-white fw-bold">Phone</label>
                                <input type="tel" class="form-control border-light-subtle bg-transparent text-white" id="contact-phone-page" placeholder="+92 300 1234567">
                            </div>
                            <div class="col-md-6">
                                <label for="contact-biz-link-page" class="form-label text-white fw-bold">Business / Freelancer Link</label>
                                <input type="url" class="form-control border-light-subtle bg-transparent text-white" id="contact-biz-link-page" placeholder="https://yourprofile.com">
                            </div>
                            <div class="col-12">
                                <label for="contact-service-page" class="form-label text-white fw-bold">Service Required</label>
                                <select class="form-select border-light-subtle bg-transparent text-white" id="contact-service-page" required>
                                    <option value="" disabled selected>Select a Service</option>
                                    <option value="AI Agents">AI Agents Integration</option>
                                    <option value="AI Automations">AI Automations (n8n/Make)</option>
                                    <option value="Web Development">Web &amp; App Development</option>
                                    <option value="UI/UX Design">UI/UX Design</option>
                                    <option value="Support">Support</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="contact-message-page" class="form-label text-white fw-bold">Project Description</label>
                                <textarea class="form-control border-light-subtle bg-transparent text-white" id="contact-message-page" rows="5" placeholder="Tell us about your requirements..." required></textarea>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-brand w-100 py-3"><span>Send Message</span> <span class="arrow-btn"><i class="fa-solid fa-arrow-up-right"></i></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What to Expect: 3-Step Consultation Timeline -->
<section class="section-padding bg-surface-1 text-white border-top border-secondary border-opacity-25">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge bg-surface-2 border border-light-subtle text-accent-neon font-monospace px-3 py-2 mb-3">COLLABORATION TIMELINE</span>
            <h2 class="display-5 fw-bold text-white mb-3">What Happens <span style="color: var(--accent-neon);">After You Reach Out</span></h2>
            <p class="fs-5 text-secondary">Our transparent 3-step consultation and discovery roadmap designed to respect your time.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-glass p-4 rounded-4 h-100 border-start border-4 border-accent-brand">
                    <span class="badge bg-dark border border-light-subtle text-accent-brand px-3 py-1 font-monospace mb-3">STEP 01</span>
                    <h4 class="text-white fw-bold mb-2">Systems Audit & Discovery</h4>
                    <p class="text-secondary small mb-0">We conduct a focused 30-minute discovery call or review your submitted workflow brief to understand your tech stack (CRM, databases, communication apps) and pinpoint high-friction manual bottlenecks.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-glass p-4 rounded-4 h-100 border-start border-4 border-accent-neon">
                    <span class="badge bg-dark border border-light-subtle text-accent-neon px-3 py-1 font-monospace mb-3">STEP 02</span>
                    <h4 class="text-white fw-bold mb-2">Architectural Blueprint & Scope</h4>
                    <p class="text-secondary small mb-0">Within 48 hours of discovery, our engineering team supplies a detailed architecture diagram, node payload schema, API dependency list, and guaranteed fixed milestone budget.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-glass p-4 rounded-4 h-100 border-start border-4 border-accent-orange">
                    <span class="badge bg-dark border border-light-subtle text-accent-orange px-3 py-1 font-monospace mb-3">STEP 03</span>
                    <h4 class="text-white fw-bold mb-2">Sandbox Build & Cutover</h4>
                    <p class="text-secondary small mb-0">Upon proposal approval, we construct and stress-test your pipelines in an isolated sandbox, run live test data, and execute a zero-downtime production cutover with full Loom training videos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client Preparation Checklist Section -->
<section class="section-padding bg-transparent text-white border-top border-secondary border-opacity-25">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-surface-2 border border-light-subtle text-accent-brand font-monospace px-3 py-2 mb-3">CLIENT ONBOARDING CHECKLIST</span>
                <h2 class="display-6 fw-bold text-white mb-4">How to Prepare for a Rapid Project Kickoff</h2>
                <p class="text-secondary mb-4">To help us deliver your custom architecture proposal and quote in the fastest possible timeframe, having the following items ready is helpful:</p>
                <div class="d-flex flex-column gap-3 small text-secondary">
                    <div class="d-flex align-items-start gap-3">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1 fs-5"></i>
                        <div><strong class="text-white">Active Software Subscriptions:</strong> Names of your existing CRM (HubSpot, GoHighLevel), databases (Airtable, PostgreSQL), or customer messaging channels.</div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1 fs-5"></i>
                        <div><strong class="text-white">Workflow Description / Screen Recording:</strong> A 2-minute Loom screen share or bullet-point list demonstrating the manual steps your staff performs daily.</div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1 fs-5"></i>
                        <div><strong class="text-white">Desired Business Outcome:</strong> Your core KPI target (e.g. reduce lead response time to &lt;60s, automate 70% of customer support inquiries, or sync invoices to accounting).</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-glass p-4 p-md-5 rounded-4 border border-light-subtle">
                    <h4 class="text-white fw-bold mb-3"><i class="fa-solid fa-shield-halved text-accent-brand me-2"></i>Confidentiality & NDA Policy</h4>
                    <p class="text-secondary small leading-relaxed mb-3">
                        We take proprietary enterprise intellectual property seriously. If your organization requires a mutual Non-Disclosure Agreement (NDA) prior to sharing internal workflows, database schemas, or API credentials, let us know and we will execute your corporate NDA or supply our standard mutual agreement within 4 business hours.
                    </p>
                    <div class="d-flex align-items-center gap-2 text-muted small font-monospace">
                        <i class="fa-solid fa-lock text-success"></i> 256-bit encrypted communication & zero data-training guarantee
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding bg-surface-1 text-white border-top border-secondary border-opacity-25">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge bg-surface-2 border border-light-subtle text-accent-neon font-monospace px-3 py-2 mb-3">FREQUENTLY ASKED QUESTIONS</span>
            <h2 class="display-5 fw-bold text-white mb-3">Consultation & <span style="color: var(--accent-neon);">Engagement FAQs</span></h2>
            <p class="fs-5 text-secondary">Frequently asked questions about scheduling a consultation and kicking off development.</p>
        </div>

        <div class="accordion accordion-flush max-w-900 mx-auto" id="contactFaqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="cHeadingOne">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#cCollapseOne" aria-expanded="false" aria-controls="cCollapseOne">
                        How fast will someone from the Automatixes team reply to our inquiry?
                    </button>
                </h2>
                <div id="cCollapseOne" class="accordion-collapse collapse" aria-labelledby="cHeadingOne" data-bs-parent="#contactFaqAccordion">
                    <div class="accordion-body text-secondary py-3 leading-relaxed">
                        We maintain a strict response service-level agreement (SLA) of under 12 hours for all form submissions and emails. If you require immediate real-time assistance, you can message our direct WhatsApp engineering desk at +92 336 6920141.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="cHeadingTwo">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#cCollapseTwo" aria-expanded="false" aria-controls="cCollapseTwo">
                        Is the initial 30-minute discovery consultation free?
                    </button>
                </h2>
                <div id="cCollapseTwo" class="accordion-collapse collapse" aria-labelledby="cHeadingTwo" data-bs-parent="#contactFaqAccordion">
                    <div class="accordion-body text-secondary py-3 leading-relaxed">
                        Yes, our initial 30-minute discovery call and systems audit is 100% complimentary. We examine your existing tools, determine feasibility, and provide actionable automation recommendations with no commitment required.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="cHeadingThree">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#cCollapseThree" aria-expanded="false" aria-controls="cCollapseThree">
                        Do we need a formal technical specification document before contacting you?
                    </button>
                </h2>
                <div id="cCollapseThree" class="accordion-collapse collapse" aria-labelledby="cHeadingThree" data-bs-parent="#contactFaqAccordion">
                    <div class="accordion-body text-secondary py-3 leading-relaxed">
                        No. Many clients come to us with just a high-level operational goal or a screen recording of their current manual process. Our systems architects will translate your business goals into complete technical specifications, schema mappings, and API architectures.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="cHeadingFour">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#cCollapseFour" aria-expanded="false" aria-controls="cCollapseFour">
                        Can you sign our company's Non-Disclosure Agreement (NDA)?
                    </button>
                </h2>
                <div id="cHeadingFour" class="accordion-collapse collapse" aria-labelledby="cHeadingFour" data-bs-parent="#contactFaqAccordion">
                    <div class="accordion-body text-secondary py-3 leading-relaxed">
                        Yes. We routinely execute mutual NDAs prior to reviewing proprietary internal databases, sensitive customer workflows, or commercial strategy documents.
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="cHeadingFive">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#cCollapseFive" aria-expanded="false" aria-controls="cCollapseFive">
                        Do you work with international clients across different time zones?
                    </button>
                </h2>
                <div id="cHeadingFive" class="accordion-collapse collapse" aria-labelledby="cHeadingFive" data-bs-parent="#contactFaqAccordion">
                    <div class="accordion-body text-secondary py-3 leading-relaxed">
                        Yes. Over 80% of our clients are based across the United States, United Kingdom, European Union, UAE, Canada, and Australia. We accommodate overlapping communication hours for discovery calls, sprint updates, and live deployments.
                    </div>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="accordion-item bg-transparent border-bottom border-light-subtle">
                <h2 class="accordion-header" id="cHeadingSix">
                    <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#cCollapseSix" aria-expanded="false" aria-controls="cCollapseSix">
                        What payment models and engagement structures do you offer?
                    </button>
                </h2>
                <div id="cHeadingSix" class="accordion-collapse collapse" aria-labelledby="cHeadingSix" data-bs-parent="#contactFaqAccordion">
                    <div class="accordion-body text-secondary py-3 leading-relaxed">
                        We offer fixed-scope milestone pricing for defined workflow automations and agent builds (typically 50% upon project kickoff and 50% upon successful sandbox acceptance). For organizations requiring continuous sprint development and system maintenance, we offer dedicated monthly engineering retainers.
                    </div>
                </div>
            </div>
        </div>

        <!-- Share Reviews Page CTA -->
        <div class="text-center mt-5 p-4 rounded-4 border border-secondary border-opacity-25 card-glass max-w-700 mx-auto">
            <p class="text-muted mb-2 fw-semibold"><i class="fa-solid fa-star text-accent-brand me-2"></i>Happy with our service?</p>
            <h5 class="fw-extrabold text-white mb-3">Leave a Review &amp; Help Others Decide</h5>
            <a href="reviews" class="btn btn-brand px-4 py-2">
                <span>Write a Review</span>
                <span class="arrow-btn"><i class="fa-solid fa-arrow-up-right"></i></span>
            </a>
        </div>
    </div>
</section>

<!-- JSON-LD ContactPage, LocalBusiness & FAQPage Schema for Google Indexing -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "ContactPage",
      "@id": "https://automatixes.com/contact#webpage",
      "url": "https://automatixes.com/contact",
      "name": "Contact Automatixes | Book Free AI Operations Audit",
      "description": "Schedule a free 30-minute consultation with Automatixes AI automation engineers. Connect your CRM, WhatsApp, and workflows.",
      "publisher": {
        "@type": "Organization",
        "name": "Automatixes",
        "url": "https://automatixes.com",
        "logo": "https://automatixes.com/favicon.png"
      }
    },
    {
      "@type": "LocalBusiness",
      "@id": "https://automatixes.com/#organization",
      "name": "Automatixes",
      "url": "https://automatixes.com",
      "logo": "https://automatixes.com/favicon.png",
      "image": "https://automatixes.com/assets/img/services/ai_automations.jpg",
      "telephone": "+923366920141",
      "email": "contact@automatixes.com",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "Remote / Worldwide"
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
          "Sunday"
        ],
        "opens": "00:00",
        "closes": "23:59"
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://automatixes.com/contact#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How fast will someone from the Automatixes team reply to our inquiry?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "We maintain a strict response SLA of under 12 hours for all form submissions and emails, with real-time WhatsApp support available at +92 336 6920141."
          }
        },
        {
          "@type": "Question",
          "name": "Is the initial 30-minute discovery consultation free?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, our initial 30-minute discovery call and systems audit is 100% complimentary with no commitment required."
          }
        },
        {
          "@type": "Question",
          "name": "Do we need a formal technical specification document before contacting you?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. Our systems architects will translate your business goals and current manual processes into complete technical specifications and API architectures."
          }
        },
        {
          "@type": "Question",
          "name": "Can you sign our company's Non-Disclosure Agreement (NDA)?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. We routinely execute mutual NDAs prior to reviewing proprietary internal databases or sensitive customer workflows."
          }
        },
        {
          "@type": "Question",
          "name": "Do you work with international clients across different time zones?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Over 80% of our clients are based across the US, UK, EU, UAE, Canada, and Australia, with flexible overlapping communication schedules."
          }
        },
        {
          "@type": "Question",
          "name": "What payment models and engagement structures do you offer?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "We offer fixed-scope milestone pricing for defined workflow projects and dedicated monthly engineering retainers for continuous development and maintenance."
          }
        }
      ]
    }
  ]
}
</script>

<?php include 'footer.php'; ?>


