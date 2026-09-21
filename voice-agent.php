<?php 
$page_key = 'voice-agent'; 
include 'header.php'; 
?>

<!-- Voice Agent Hero Section -->
<section class="voice-agent-section position-relative py-5 overflow-hidden" style="background: var(--bg-void, #050505); min-height: 90vh; padding-top: 180px !important;">
    <style>
        #sticky-expert-btn { display: none !important; }
    </style>
    <!-- Ambient Radial Glows -->
    <div class="position-absolute top-0 start-50 translate-middle-x pointer-events-none" style="width: 600px; height: 600px; background: radial-gradient(circle, rgba(200, 224, 25, 0.12) 0%, transparent 70%); filter: blur(60px); z-index: 0;"></div>
    <div class="position-absolute bottom-0 start-0 pointer-events-none" style="width: 400px; height: 400px; background: radial-gradient(circle, rgba(0, 255, 136, 0.08) 0%, transparent 70%); filter: blur(50px); z-index: 0;"></div>

    <div class="container position-relative pb-5" style="z-index: 1;">
        
        <!-- Header & Intro -->
        <div class="text-center max-width-700 mx-auto mb-5">
            <div class="mb-3">
                <span class="badge bg-surface-1 border border-secondary border-opacity-25 text-accent-brand rounded-pill px-3 py-2 fw-semibold shadow-sm">
                    <i class="fa-solid fa-microphone-lines me-2"></i> Next-Gen Conversational AI
                </span>
            </div>
            <h1 class="display-4 fw-extrabold text-white mb-3">
                Experience Our <span class="text-accent-brand">AI Voice Agent</span>
            </h1>
            <p class="lead text-white-50 mx-auto" style="font-size: 1.15rem; line-height: 1.7;">
                Have a real-time voice conversation with our autonomous AI assistant. Speak naturally — our voice agent listens, reasons, and speaks with human cadence and sub-500ms latency.
            </p>
        </div>

        <!-- Central Interactive Voice Terminal Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 col-md-10">
                <div class="voice-card p-4 p-md-5 rounded-5 text-center position-relative">
                    
                    <!-- Live Status Indicators -->
                    <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mb-4">
                        <span class="status-chip d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill text-white small fw-semibold">
                            <span class="pulse-dot"></span> Voice Agent Online
                        </span>
                        <span class="latency-chip d-inline-flex align-items-center gap-1 px-3 py-1 rounded-pill text-white-50 small fw-semibold">
                            <i class="fa-solid fa-bolt text-accent-brand me-1"></i> &lt;500ms Latency
                        </span>
                        <span class="latency-chip d-inline-flex align-items-center gap-1 px-3 py-1 rounded-pill text-white-50 small fw-semibold">
                            <i class="fa-solid fa-shield-halved text-accent-brand me-1"></i> 24/7 Availability
                        </span>
                    </div>

                    <!-- Voice Visualizer & Dograh Voice Agent Centerpiece -->
                    <div class="voice-visualizer-container my-4 position-relative d-flex justify-content-center align-items-center">
                        <!-- Concentric Soundwave Pulse Rings -->
                        <div class="sound-ring sound-ring-3"></div>
                        <div class="sound-ring sound-ring-2"></div>
                        <div class="sound-ring sound-ring-1"></div>
                        
                        <!-- Dograh Voice Call Button -->
                        <div class="dograh-center-embed position-relative d-flex justify-content-center align-items-center" style="z-index: 10;">
                            <button id="start-dograh-call" type="button" onclick="startVoiceAgentCall()" class="btn d-flex align-items-center justify-content-center" style="width: 86px; height: 86px; border-radius: 50%; background: linear-gradient(135deg, #C8E019 0%, #A6BC09 100%); border: 3px solid rgba(255,255,255,0.2); box-shadow: 0 0 35px rgba(200, 224, 25, 0.6); cursor: pointer; transition: transform 0.2s ease, box-shadow 0.2s ease;">
                                <i class="fa-solid fa-microphone" style="font-size: 32px; color: #0b0f19;"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Call To Action Text -->
                    <div class="mt-4">
                        <h4 class="fw-bold text-white mb-2">Click The Microphone To Start Conversation</h4>
                        <p class="text-white-50 small mb-4">Make sure your microphone is enabled in your browser to speak with the AI.</p>
                    </div>

                    <!-- Suggested Prompts -->
                    <div class="prompts-box p-3 rounded-4 mt-4 text-start">
                        <div class="text-accent-brand fw-bold small text-uppercase mb-2 tracking-wider">
                            <i class="fa-regular fa-lightbulb me-1"></i> Try asking the AI Agent:
                        </div>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <div class="prompt-pill p-2 rounded-3 text-white-50 small">
                                    "What AI automation services do you build?"
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prompt-pill p-2 rounded-3 text-white-50 small">
                                    "How can you automate our lead qualification?"
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prompt-pill p-2 rounded-3 text-white-50 small">
                                    "How do I book a consultation with the team?"
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Capabilities Grid -->
        <div class="row g-4 justify-content-center pt-3">
            <div class="col-lg-3 col-md-6">
                <div class="capability-card p-4 rounded-4 h-100 bg-surface-1 border border-secondary border-opacity-25">
                    <div class="capability-icon mb-3">
                        <i class="fa-solid fa-wave-square fs-3 text-accent-brand"></i>
                    </div>
                    <h5 class="fw-bold text-white mb-2">Natural Cadence</h5>
                    <p class="text-white-50 small mb-0">Handles conversational interruptions, pauses, and tone variations with lifelike human responsiveness.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="capability-card p-4 rounded-4 h-100 bg-surface-1 border border-secondary border-opacity-25">
                    <div class="capability-icon mb-3">
                        <i class="fa-solid fa-brain fs-3 text-accent-brand"></i>
                    </div>
                    <h5 class="fw-bold text-white mb-2">Dynamic Knowledge</h5>
                    <p class="text-white-50 small mb-0">Answers deep domain queries accurately using real-time connected knowledge bases and documents.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="capability-card p-4 rounded-4 h-100 bg-surface-1 border border-secondary border-opacity-25">
                    <div class="capability-icon mb-3">
                        <i class="fa-solid fa-diagram-project fs-3 text-accent-brand"></i>
                    </div>
                    <h5 class="fw-bold text-white mb-2">Workflow Triggers</h5>
                    <p class="text-white-50 small mb-0">Directly executes actions during the call: booking calendars, sending SMS/emails, and updating CRMs.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="capability-card p-4 rounded-4 h-100 bg-surface-1 border border-secondary border-opacity-25">
                    <div class="capability-icon mb-3">
                        <i class="fa-solid fa-language fs-3 text-accent-brand"></i>
                    </div>
                    <h5 class="fw-bold text-white mb-2">Multilingual</h5>
                    <p class="text-white-50 small mb-0">Speaks and understands 30+ languages fluently to serve international enterprise customers 24/7.</p>
                </div>
            </div>
        </div>

        <!-- Bottom Call to Action Banner -->
        <div class="mt-5 pt-4 text-center">
            <div class="p-4 p-md-5 rounded-5 bg-surface-1 border border-secondary border-opacity-25 position-relative overflow-hidden">
                <h3 class="fw-bold text-white mb-3">Ready To Deploy An AI Voice Agent For Your Business?</h3>
                <p class="text-white-50 max-width-600 mx-auto mb-4">We design, configure, and integrate custom conversational voice agents with your telephony, CRM, and automation workflows.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="contact" class="btn btn-brand rounded-pill px-4 py-2 fw-bold">
                        Deploy Voice Agent <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="ai-Agent-Automations" class="btn btn-outline-brand rounded-pill px-4 py-2 fw-bold">
                        Explore All Solutions
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Custom Styling for Voice Agent Page -->
<style>
    .voice-card {
        background: var(--bg-surface-1, #111111);
        border: 1px solid rgba(200, 224, 25, 0.25);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8), 0 0 30px rgba(200, 224, 25, 0.05);
        transition: transform 0.3s ease, border-color 0.3s ease;
    }

    .voice-card:hover {
        border-color: rgba(200, 224, 25, 0.4);
    }

    .status-chip {
        background: rgba(34, 197, 94, 0.15);
        border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .latency-chip {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .pulse-dot {
        width: 8px;
        height: 8px;
        background-color: #22c55e;
        border-radius: 50%;
        box-shadow: 0 0 10px #22c55e;
        animation: pulseAnimation 1.5s infinite;
    }

    @keyframes pulseAnimation {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(34, 197, 94, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
    }

    .voice-visualizer-container {
        width: 180px;
        height: 180px;
        margin: 0 auto;
    }

    .sound-ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(200, 224, 25, 0.3);
        pointer-events: none;
    }

    .sound-ring-1 {
        width: 100px;
        height: 100px;
        animation: ringPulse 3s ease-out infinite;
    }

    .sound-ring-2 {
        width: 140px;
        height: 140px;
        animation: ringPulse 3s ease-out infinite 1s;
    }

    .sound-ring-3 {
        width: 180px;
        height: 180px;
        animation: ringPulse 3s ease-out infinite 2s;
    }

    @keyframes ringPulse {
        0% { transform: scale(0.6); opacity: 0.8; }
        50% { opacity: 0.4; border-color: rgba(200, 224, 25, 0.6); }
        100% { transform: scale(1.15); opacity: 0; }
    }

    .dograh-center-embed {
        z-index: 10;
    }

    .dograh-center-embed button:hover {
        transform: scale(1.08);
        box-shadow: 0 0 50px rgba(200, 224, 25, 0.85) !important;
    }

    .dograh-center-embed button:active {
        transform: scale(0.95);
    }

    .prompts-box {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .prompt-pill {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.2s ease;
    }

    .prompt-pill:hover {
        background: rgba(200, 224, 25, 0.1);
        border-color: rgba(200, 224, 25, 0.3);
        color: #ffffff !important;
    }

    .capability-card {
        background: var(--bg-surface-1, #111111) !important;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }

    .capability-card:hover {
        transform: translateY(-6px);
        border-color: rgba(200, 224, 25, 0.4) !important;
    }
</style>

<!-- Dograh Self-Hosted Voice Agent Widget Integration (Connected via Secure Tunnel) -->
<script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://detector-verified-raises-candle.trycloudflare.com/embed/dograh-widget.js?token=emb_automatixes_live_agent_voice_2026&apiEndpoint=https://detector-verified-raises-candle.trycloudflare.com';
    js.setAttribute('data-dograh-context', JSON.stringify({
      page_url: window.location.href,
      agency: 'Automatixes',
      agent: 'Alex'
    }));
    js.async = true;
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'dograh-widget'));

  function startVoiceAgentCall() {
    if (window.DograhWidget && typeof window.DograhWidget.start === 'function') {
      window.DograhWidget.start();
    } else {
      window.open('https://detector-verified-raises-candle.trycloudflare.com', '_blank');
    }
  }
</script>

<?php include 'footer.php'; ?>
