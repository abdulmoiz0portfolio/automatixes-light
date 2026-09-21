<?php 
$page_key = 'process'; 
include 'header.php'; 
?>

<style>
/* Base Page Reset for process */
.process-hero {
    padding: 120px 0 60px;
    background: var(--bg-base);
    text-align: center;
}

/* n8n Workflow Styles */
.n8n-workflow-container {
    background: #0d0d12;
    background-image: radial-gradient(rgba(193, 241, 29, 0.05) 1px, transparent 1px);
    background-size: 20px 20px;
    padding: 80px 20px;
    overflow-x: hidden;
}

.n8n-workflow {
    position: relative;
    max-width: 600px;
    margin: 0 auto;
    padding: 40px 0;
}

/* The Background Track for the line */
.n8n-line-track {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 50%;
    width: 2px;
    background: rgba(255, 255, 255, 0.05);
    transform: translateX(-50%);
    z-index: 1;
}

/* The Animated Drawing Line */
.n8n-line-draw {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    background: #c1f11d;
    height: 0%; /* Animates via GSAP */
    z-index: 2;
    box-shadow: 0 0 10px rgba(193, 241, 29, 0.6);
}

/* Pulsing animated dot representing data flow */
.n8n-flow-dot {
    position: absolute;
    top: 0;
    left: 50%;
    width: 10px;
    height: 10px;
    background: #fff;
    border-radius: 50%;
    transform: translateX(-50%);
    box-shadow: 0 0 15px 3px #c1f11d;
    z-index: 3;
    /* GSAP will animate this down the track */
}

/* The Node Card */
.n8n-node {
    position: relative;
    background: #1e1e2d;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 20px;
    margin: 80px auto;
    width: 100%;
    max-width: 420px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
    z-index: 4;
    transition: transform 0.3s ease, border-color 0.3s ease;
}

.n8n-node:hover {
    border-color: rgba(193, 241, 29, 0.4);
    transform: translateY(-5px);
}

/* Handles on top/bottom of nodes */
.n8n-handle {
    position: absolute;
    left: 50%;
    width: 12px;
    height: 12px;
    background: #1e1e2d;
    border: 2px solid #c1f11d;
    border-radius: 50%;
    transform: translateX(-50%);
    z-index: 5;
}
.n8n-handle.top { top: -6px; }
.n8n-handle.bottom { bottom: -6px; }

/* Active node state */
.n8n-node.active .n8n-handle {
    background: #c1f11d;
    box-shadow: 0 0 10px rgba(193, 241, 29, 0.8);
}

.n8n-node.active {
    border-color: rgba(193, 241, 29, 0.6);
}

/* Node Icon */
.n8n-icon {
    width: 50px;
    height: 50px;
    background: rgba(193, 241, 29, 0.1);
    color: #c1f11d;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

/* Node Text */
.n8n-content {
    text-align: left;
}
.n8n-content h4 {
    color: #fff;
    margin: 0 0 6px 0;
    font-size: 18px;
    font-weight: 700;
    font-family: 'Outfit', sans-serif;
}
.n8n-content p {
    color: #a0a0a0;
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}

/* Responsive tweaks */
@media (max-width: 576px) {
    .n8n-workflow { padding: 20px 15px; }
    .n8n-node { margin: 60px auto; padding: 15px; max-width: 100%; }
    .n8n-content h4 { font-size: 16px; }
    .n8n-content p { font-size: 13px; }
}
</style>

<section class="process-hero">
    <div class="container">
        <span class="badge bg-brand-translucent text-accent-brand mb-3 font-monospace px-3 py-2 border border-brand-50">HOW WE WORK</span>
        <h1 class="display-4 fw-extrabold text-white mb-3">Our Process</h1>
        <div class="title-underline mx-auto"></div>
        <p class="lead text-secondary mx-auto mt-4 max-w-700">
            From initial concept to deployment and beyond. Here is exactly how we execute complex automation architectures for our clients.
        </p>
    </div>
</section>

<section class="n8n-workflow-container">
    <div class="container">
        <div class="n8n-workflow">
            <!-- The connector track -->
            <div class="n8n-line-track">
                <div class="n8n-line-draw"></div>
            </div>
            
            <!-- Animated Flowing Dot -->
            <div class="n8n-flow-dot"></div>

            <!-- Step 1 -->
            <div class="n8n-node">
                <div class="n8n-handle top"></div>
                <div class="n8n-icon"><i class="fa-solid fa-phone"></i></div>
                <div class="n8n-content">
                    <h4>Discovery Call</h4>
                    <p>Understand your operational bottlenecks, voice calling requirements, and automation potential.</p>
                </div>
                <div class="n8n-handle bottom"></div>
            </div>

            <!-- Step 2 -->
            <div class="n8n-node">
                <div class="n8n-handle top"></div>
                <div class="n8n-icon"><i class="fa-solid fa-lightbulb"></i></div>
                <div class="n8n-content">
                    <h4>Strategy & Architecture</h4>
                    <p>We design a custom AI agent blueprint and outline clear time and cost savings for your business.</p>
                </div>
                <div class="n8n-handle bottom"></div>
            </div>

            <!-- Step 3 -->
            <div class="n8n-node">
                <div class="n8n-handle top"></div>
                <div class="n8n-icon"><i class="fa-solid fa-robot"></i></div>
                <div class="n8n-content">
                    <h4>AI Agent & Pipeline Build</h4>
                    <p>Building your autonomous AI voice agents, LLM prompts, and n8n workflows from the ground up.</p>
                </div>
                <div class="n8n-handle bottom"></div>
            </div>

            <!-- Step 4 -->
            <div class="n8n-node">
                <div class="n8n-handle top"></div>
                <div class="n8n-icon"><i class="fa-solid fa-vial-circle-check"></i></div>
                <div class="n8n-content">
                    <h4>Latency & Integration Testing</h4>
                    <p>Rigorous testing of voice latency, CRM sync triggers, and webhook error handling.</p>
                </div>
                <div class="n8n-handle bottom"></div>
            </div>

            <!-- Step 5 -->
            <div class="n8n-node">
                <div class="n8n-handle top"></div>
                <div class="n8n-icon"><i class="fa-solid fa-rocket"></i></div>
                <div class="n8n-content">
                    <h4>Deployment & Handover</h4>
                    <p>Going live. We connect production numbers, activate live bots, and train your team.</p>
                </div>
                <div class="n8n-handle bottom"></div>
            </div>

            <!-- Step 6 -->
            <div class="n8n-node">
                <div class="n8n-handle top"></div>
                <div class="n8n-icon"><i class="fa-solid fa-chart-line"></i></div>
                <div class="n8n-content">
                    <h4>Continuous Monitoring & Scaling</h4>
                    <p>24/7 uptime monitoring, prompt tuning, and ongoing scaling support as you grow.</p>
                </div>
                <div class="n8n-handle bottom"></div>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding bg-surface-1 text-white border-top border-secondary border-opacity-25 text-center">
    <div class="container max-w-700">
        <h2 class="display-6 fw-extrabold text-white mb-4">Ready to automate your workflows?</h2>
        <a href="contact" class="btn btn-brand btn-lg">
            <span>Book a Discovery Call</span>
            <span class="arrow-btn"><i class="fa-solid fa-arrow-up-right"></i></span>
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Make sure GSAP and ScrollTrigger are loaded (they are in footer, so this runs after)
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Draw the line vertically as user scrolls
        gsap.to('.n8n-line-draw', {
            height: '100%',
            ease: "none",
            scrollTrigger: {
                trigger: '.n8n-workflow',
                start: 'top center', // starts drawing when top of workflow hits center of viewport
                end: 'bottom center', // ends when bottom hits center
                scrub: true
            }
        });

        // 2. Animate nodes sliding and fading in
        const nodes = gsap.utils.toArray('.n8n-node');
        nodes.forEach((node, i) => {
            gsap.from(node, {
                y: 50,
                opacity: 0,
                duration: 0.8,
                ease: "back.out(1.5)",
                scrollTrigger: {
                    trigger: node,
                    start: "top 80%", // trigger when node is 80% down the viewport
                    toggleActions: "play none none reverse",
                    onEnter: () => node.classList.add('active'),
                    onLeaveBack: () => node.classList.remove('active')
                }
            });
        });

        // 3. Constant flowing dot animation down the entire track length
        gsap.to('.n8n-flow-dot', {
            top: '100%',
            duration: 3,
            ease: "linear",
            repeat: -1
        });
    }
});
</script>

<?php include 'footer.php'; ?>
