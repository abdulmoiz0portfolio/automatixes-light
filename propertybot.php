<?php
$page_key = 'propertybot';
$custom_meta = [
    'title' => 'Property Advisor — Digital Real Estate Concierge | Automatixes',
    'desc' => 'Connect with our dedicated Property Advisory Desk for verified pricing benchmarks, documentation compliance (Fard & NOC), and private site viewings across prime developments in Pakistan.',
    'keywords' => 'Property Advisor, Real Estate Concierge, DHA Lahore, Bahria Town, Real Estate Consultant, Automatixes',
    'url' => 'propertybot'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $custom_meta['title']; ?></title>
    <meta name="description" content="<?php echo $custom_meta['desc']; ?>">
    <link rel="canonical" href="https://automatixes.com/propertybot">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#070B14',
                            card: '#0D1527',
                            border: '#1E293B',
                            emerald: '#10B981',
                            accent: '#D4FF3D'
                        }
                    }
                }
            }
        }
    </script>

    <!-- FontAwesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #070B14;
            color: #F8FAFC;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.5);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 9999px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #10B981;
        }
        @keyframes fadeInSlideUp {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .message-animate {
            animation: fadeInSlideUp 0.22s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .typing-dot {
            width: 6px;
            height: 6px;
            background-color: #10B981;
            border-radius: 50%;
            animation: typingBounce 1.4s infinite ease-in-out both;
        }
        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }
        @keyframes typingBounce {
            0%, 80%, 100% { transform: scale(0); opacity: 0.3; }
            40% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased">

    <!-- Executive Header Navigation -->
    <header class="border-b border-slate-200/80 bg-slate-50/80 backdrop-blur-xl sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <!-- Brand & Advisory Desk Identity -->
            <div class="flex items-center gap-3">
                <a href="index" class="flex items-center gap-2 group" title="Return to Automatixes">
                    <img src="assets/img/logo/automatixes-logo-new.png" alt="Automatixes" class="h-8 w-auto object-contain opacity-90 group-hover:opacity-100 transition-opacity">
                </a>
                <div class="h-5 w-px bg-slate-100 mx-1 hidden sm:block"></div>
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-sm">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h1 class="font-heading font-bold text-sm sm:text-base text-slate-900 tracking-tight">Property Advisor</h1>
                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 uppercase tracking-wider">Official Desk</span>
                        </div>
                        <p class="text-[11px] text-slate-600 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Senior Real Estate Advisory • Active 24/7</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Controls -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- Direct Official WhatsApp Escalation -->
                <a href="https://wa.me/923366920141?text=Hello%20Automatixes%20Advisory%20Desk,%20I%20am%20inquiring%20about%20prime%20property%20consultation." 
                   target="_blank" 
                   rel="noopener" 
                   class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-950/60 hover:bg-emerald-900/60 border border-emerald-700/40 text-emerald-300 text-xs font-medium transition-all"
                   title="Official Meta WhatsApp Business Cloud API Desk">
                    <i class="fa-brands fa-whatsapp text-emerald-400 text-sm"></i>
                    <span>Official WhatsApp Desk</span>
                </a>

                <a href="index" class="px-3 py-1.5 rounded-lg border border-slate-300/80 bg-white/80 hover:bg-slate-100 text-slate-700 hover:text-slate-900 text-xs font-medium transition-all flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-left text-[11px]"></i>
                    <span class="hidden sm:inline">Back to Automatixes</span>
                    <span class="sm:hidden">Exit</span>
                </a>

                <button id="btn-clear-chat" title="Clear Session" class="p-2 rounded-lg border border-slate-300/80 bg-white/80 hover:bg-rose-500/20 hover:border-rose-500/40 hover:text-rose-400 text-slate-600 text-xs transition-all">
                    <i class="fa-solid fa-rotate-left"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Advisory Chat Showcase Container -->
    <main class="flex-1 max-w-5xl w-full mx-auto p-2 sm:p-4 flex flex-col h-[calc(100vh-4rem)]">
        <div class="flex-1 flex flex-col rounded-2xl border border-slate-200/80 bg-white/40 backdrop-blur-md overflow-hidden shadow-2xl">
            
            <!-- Message Transcript Area -->
            <div id="chat-messages" class="flex-1 overflow-y-auto p-4 sm:p-6 space-y-4 custom-scrollbar">
                <!-- Injected via JavaScript -->
            </div>

            <!-- Suggested Inquiry Topics Bar -->
            <div class="px-4 py-3 bg-slate-50/70 border-t border-slate-200/70">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-1.5 text-[11px] font-semibold text-slate-600">
                        <i class="fa-solid fa-compass text-emerald-400"></i>
                        <span>Frequently Inquired Topics:</span>
                    </div>
                    <span class="text-[10px] text-slate-500 font-mono hidden sm:inline">Official Benchmark Registry</span>
                </div>
                <div class="overflow-x-auto whitespace-nowrap flex gap-2 pb-1 custom-scrollbar">
                    <button class="quick-prompt px-3 py-1.5 rounded-lg bg-white/90 hover:bg-emerald-950/60 hover:border-emerald-500/50 border border-slate-200 text-xs text-slate-800 hover:text-emerald-300 transition-all flex items-center gap-1.5 shrink-0" data-prompt="DHA aur Bahria Town me 1 Kanal plot ka kya rate chal raha hai?">
                        <i class="fa-solid fa-map-pin text-emerald-400 text-[11px]"></i>
                        <span>1 Kanal Benchmarks (DHA / Bahria)</span>
                    </button>
                    <button class="quick-prompt px-3 py-1.5 rounded-lg bg-white/90 hover:bg-emerald-950/60 hover:border-emerald-500/50 border border-slate-200 text-xs text-slate-800 hover:text-emerald-300 transition-all flex items-center gap-1.5 shrink-0" data-prompt="Property khareedne ke liye kon se documents zaroori hotay hain?">
                        <i class="fa-solid fa-file-shield text-blue-400 text-[11px]"></i>
                        <span>Required Documents (Fard / NOC)</span>
                    </button>
                    <button class="quick-prompt px-3 py-1.5 rounded-lg bg-white/90 hover:bg-emerald-950/60 hover:border-emerald-500/50 border border-slate-200 text-xs text-slate-800 hover:text-emerald-300 transition-all flex items-center gap-1.5 shrink-0" data-prompt="5 Marla ghar ke liye kitni down payment deni hogi?">
                        <i class="fa-solid fa-calculator text-amber-400 text-[11px]"></i>
                        <span>5 Marla Down Payment & Installments</span>
                    </button>
                    <button class="quick-prompt px-3 py-1.5 rounded-lg bg-white/90 hover:bg-emerald-950/60 hover:border-emerald-500/50 border border-slate-200 text-xs text-slate-800 hover:text-emerald-300 transition-all flex items-center gap-1.5 shrink-0" data-prompt="Commercial plots ka rental yield aur ROI kaisa hai?">
                        <i class="fa-solid fa-chart-line text-teal-400 text-[11px]"></i>
                        <span>Commercial vs Residential ROI</span>
                    </button>
                    <button class="quick-prompt px-3 py-1.5 rounded-lg bg-white/90 hover:bg-emerald-950/60 hover:border-emerald-500/50 border border-slate-200 text-xs text-slate-800 hover:text-emerald-300 transition-all flex items-center gap-1.5 shrink-0" data-prompt="Fard aur Intiqal me kya farq hota hai?">
                        <i class="fa-solid fa-stamp text-indigo-400 text-[11px]"></i>
                        <span>Fard vs Intiqal (Registry Status)</span>
                    </button>
                </div>
            </div>

            <!-- Input Bar -->
            <div class="p-3 sm:p-4 bg-slate-50/95 border-t border-slate-200/80">
                <form id="chat-form" class="flex items-center gap-2">
                    <div class="relative flex-1">
                        <input 
                            type="text" 
                            id="chat-input" 
                            placeholder="Inquire about property rates, documentation verification, or site viewings..."
                            class="w-full bg-white/90 border border-slate-300/80 rounded-xl px-4 py-3 text-sm text-slate-900 placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 shadow-inner"
                            autocomplete="off"
                        >
                    </div>
                    <button 
                        type="submit" 
                        id="btn-send"
                        class="px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-slate-900 font-semibold text-sm shadow-lg shadow-emerald-600/20 transition-all flex items-center justify-center gap-2 shrink-0 cursor-pointer disabled:opacity-50"
                    >
                        <span>Send</span>
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                    </button>
                </form>
                <div class="mt-2 flex items-center justify-between text-[11px] text-slate-500 px-1">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-shield-halved text-emerald-500/70"></i>
                        <span>Official Advisory Protocol • English / Roman Urdu</span>
                    </span>
                    <a href="https://wa.me/923366920141" target="_blank" rel="noopener" class="hover:text-emerald-400 transition-colors flex items-center gap-1">
                        <i class="fa-brands fa-whatsapp text-emerald-400"></i>
                        <span>Meta WhatsApp Business API</span>
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- Client Logic -->
    <script>
        function getOrCreateSessionId() {
            let sid = localStorage.getItem("automatixes_property_session");
            if (!sid) {
                sid = "session_" + Math.random().toString(36).substring(2, 11) + "_" + Date.now();
                localStorage.setItem("automatixes_property_session", sid);
            }
            return sid;
        }

        const state = {
            webhookUrl: "https://n8n.bminternational.com.pk/webhook/6c925c11-65e3-41dd-a8be-2d495f04859c",
            sessionId: getOrCreateSessionId(),
            chatHistory: []
        };

        const chatMessages = document.getElementById("chat-messages");
        const chatForm = document.getElementById("chat-form");
        const chatInput = document.getElementById("chat-input");
        const btnSend = document.getElementById("btn-send");
        const btnClearChat = document.getElementById("btn-clear-chat");

        document.addEventListener("DOMContentLoaded", () => {
            initQuickPrompts();
            if (state.chatHistory.length === 0) {
                sendWelcomeMessage();
            }
        });

        function sendWelcomeMessage() {
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            const msgEl = document.createElement("div");
            msgEl.className = "flex items-start gap-3 message-animate";

            msgEl.innerHTML = `
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-800 flex items-center justify-center text-slate-900 text-sm shrink-0 shadow-md shadow-emerald-500/20">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="max-w-[95%] sm:max-w-[85%]">
                    <div class="bg-white/90 border border-slate-200 text-slate-900 p-4 sm:p-5 rounded-2xl rounded-tl-none shadow-xl text-xs sm:text-sm leading-relaxed">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-sm sm:text-base font-bold text-slate-900 flex items-center gap-2">
                                <span>Assalam-o-Alaikum, welcome to the Property Advisory Desk. 👋</span>
                            </h3>
                        </div>
                        <p class="text-slate-700 text-xs sm:text-sm mb-3.5 leading-relaxed">
                            I am your dedicated Property Consultant. I assist clients with verified pricing benchmarks, documentation verification (NOC & Fard), installment schedules, and scheduling private site viewings across prime developments in Pakistan.
                        </p>

                        <div class="bg-slate-50/80 border border-slate-200/90 rounded-xl p-3.5 mb-2">
                            <p class="text-xs font-semibold text-emerald-400 mb-2.5 flex items-center gap-1.5">
                                <i class="fa-solid fa-layer-group"></i>
                                Select an inquiry topic to begin:
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                <button onclick="askSuggestedQuestion('DHA aur Bahria Town me 1 Kanal plot ka kya rate chal raha hai?')" class="text-left p-2.5 rounded-lg bg-white hover:bg-emerald-950/40 border border-slate-200 hover:border-emerald-500/40 text-xs text-slate-800 transition-all flex items-center gap-2">
                                    <i class="fa-solid fa-map-pin text-emerald-400 shrink-0 text-[11px]"></i>
                                    <span class="truncate">1 Kanal plot rates (DHA/Bahria)</span>
                                </button>
                                <button onclick="askSuggestedQuestion('Property khareedne ke liye kon se documents zaroori hotay hain?')" class="text-left p-2.5 rounded-lg bg-white hover:bg-emerald-950/40 border border-slate-200 hover:border-emerald-500/40 text-xs text-slate-800 transition-all flex items-center gap-2">
                                    <i class="fa-solid fa-file-shield text-blue-400 shrink-0 text-[11px]"></i>
                                    <span class="truncate">Zaroori Documents (Fard / NOC)</span>
                                </button>
                                <button onclick="askSuggestedQuestion('5 Marla ghar ke liye kitni down payment deni hogi?')" class="text-left p-2.5 rounded-lg bg-white hover:bg-emerald-950/40 border border-slate-200 hover:border-emerald-500/40 text-xs text-slate-800 transition-all flex items-center gap-2">
                                    <i class="fa-solid fa-calculator text-amber-400 shrink-0 text-[11px]"></i>
                                    <span class="truncate">5 Marla Down Payment & Qist</span>
                                </button>
                                <button onclick="askSuggestedQuestion('Commercial plots ka rental yield aur ROI kaisa hai?')" class="text-left p-2.5 rounded-lg bg-white hover:bg-emerald-950/40 border border-slate-200 hover:border-emerald-500/40 text-xs text-slate-800 transition-all flex items-center gap-2">
                                    <i class="fa-solid fa-chart-line text-teal-400 shrink-0 text-[11px]"></i>
                                    <span class="truncate">Commercial vs Residential ROI</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="text-[10px] text-slate-500 mt-1">${time}</div>
                </div>
            `;

            chatMessages.appendChild(msgEl);
            scrollToBottom();
        }

        function initQuickPrompts() {
            document.querySelectorAll(".quick-prompt").forEach(btn => {
                btn.onclick = () => {
                    const prompt = btn.getAttribute("data-prompt");
                    if (prompt) {
                        askSuggestedQuestion(prompt);
                    }
                };
            });
        }

        window.askSuggestedQuestion = function(questionText) {
            if (!questionText) return;
            addUserMessage(questionText);
            processUserQuery(questionText);
        };

        function addUserMessage(text) {
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            const msgEl = document.createElement("div");
            msgEl.className = "flex justify-end message-animate";
            msgEl.innerHTML = `
                <div class="max-w-[85%] sm:max-w-[75%]">
                    <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-slate-900 px-4 py-3 rounded-2xl rounded-tr-none shadow-md text-xs sm:text-sm leading-relaxed">
                        ${escapeHTML(text)}
                    </div>
                    <div class="text-[10px] text-slate-500 text-right mt-1">${time}</div>
                </div>
            `;
            chatMessages.appendChild(msgEl);
            scrollToBottom();
            state.chatHistory.push({ role: "user", content: text, time });
        }

        function showTypingIndicator() {
            const typingEl = document.createElement("div");
            typingEl.id = "typing-indicator";
            typingEl.className = "flex items-start gap-3 message-animate";
            typingEl.innerHTML = `
                <div class="w-9 h-9 rounded-xl bg-slate-100 border border-slate-300 flex items-center justify-center text-emerald-400 text-xs shrink-0">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="bg-white border border-slate-200 px-4 py-3 rounded-2xl rounded-tl-none flex items-center gap-1.5 shadow-md">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            `;
            chatMessages.appendChild(typingEl);
            scrollToBottom();
        }

        function hideTypingIndicator() {
            const typingEl = document.getElementById("typing-indicator");
            if (typingEl) typingEl.remove();
        }

        function sendConsultantMessage(markdownText) {
            hideTypingIndicator();
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            const msgEl = document.createElement("div");
            msgEl.className = "flex items-start gap-3 message-animate";

            let formattedContent = formatMarkdown(markdownText);

            msgEl.innerHTML = `
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-800 flex items-center justify-center text-slate-900 text-xs shrink-0 shadow-md shadow-emerald-500/20">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="max-w-[95%] sm:max-w-[85%]">
                    <div class="bg-white/90 border border-slate-200 text-slate-900 px-4 py-3.5 rounded-2xl rounded-tl-none shadow-md text-xs sm:text-sm leading-relaxed">
                        ${formattedContent}
                    </div>
                    <div class="text-[10px] text-slate-500 mt-1">${time}</div>
                </div>
            `;

            chatMessages.appendChild(msgEl);
            scrollToBottom();
            state.chatHistory.push({ role: "assistant", content: markdownText, time });
        }

        function scrollToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function formatMarkdown(text) {
            if (typeof text !== "string") {
                text = JSON.stringify(text);
            }
            let html = escapeHTML(text);
            html = html.replace(/\*\*(.*?)\*\*/g, '<strong class="text-slate-900 font-bold">$1</strong>');
            html = html.replace(/\*(.*?)\*/g, '<em class="text-slate-700">$1</em>');
            html = html.replace(/^\s*[-•]\s+(.*)$/gm, '<li class="ml-4 list-disc text-slate-700 my-0.5">$1</li>');
            html = html.replace(/^\s*(\d+)\.\s+(.*)$/gm, '<li class="ml-4 list-decimal text-slate-700 my-0.5">$2</li>');
            html = html.replace(/\n/g, '<br/>');
            return html;
        }

        function escapeHTML(str) {
            return String(str)
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        chatForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const query = chatInput.value.trim();
            if (!query) return;

            chatInput.value = "";
            addUserMessage(query);
            processUserQuery(query);
        });

        async function processUserQuery(query) {
            showTypingIndicator();

            try {
                const response = await callN8nWebhook(query);
                if (response) {
                    sendConsultantMessage(response);
                    return;
                }
            } catch (err) {
                console.warn("Advisory Webhook Notice:", err);
                const fallback = evaluateRealEstateQuery(query);
                sendConsultantMessage(fallback.message);
                return;
            }
        }

        async function callN8nWebhook(messageText) {
            const recentHistory = state.chatHistory.slice(-10).map(m => `${m.role === 'user' ? 'Client' : 'Advisor'}: ${m.content}`).join("\n");

            const payload = {
                message: messageText,
                chatInput: messageText,
                sessionId: state.sessionId,
                history: recentHistory,
                chatHistory: state.chatHistory.slice(-10),
                timestamp: new Date().toISOString(),
                user: "Client Inquiry"
            };

            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 20000);

            try {
                const response = await fetch(state.webhookUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text/plain, */*"
                    },
                    body: JSON.stringify(payload),
                    signal: controller.signal
                });

                clearTimeout(timeoutId);

                if (!response.ok) {
                    throw new Error(`Status ${response.status}`);
                }

                const contentType = response.headers.get("content-type") || "";
                if (contentType.includes("application/json")) {
                    const data = await response.json();
                    if (typeof data === "string") return data;
                    if (data.output) return data.output;
                    if (data.response) return data.response;
                    if (data.text) return data.text;
                    if (data.message) return data.message;
                    if (data.content) return data.content;
                    if (data.data && data.data.output) return data.data.output;
                    if (Array.isArray(data) && data.length > 0) {
                        const first = data[0];
                        if (typeof first === "string") return first;
                        if (first.output) return first.output;
                        if (first.text) return first.text;
                        if (first.message) return first.message;
                        if (first.response) return first.response;
                    }
                    return JSON.stringify(data, null, 2);
                } else {
                    const textData = await response.text();
                    return textData || "Aapka inquiry note receive ho gaya hai.";
                }
            } catch (err) {
                clearTimeout(timeoutId);
                throw err;
            }
        }

        function evaluateRealEstateQuery(rawQuery) {
            const q = rawQuery.toLowerCase().trim();

            const outOfScopePatterns = [
                /imran khan|nawaz sharif|election|siyasat|politics|pti|pmln|vote/i,
                /python|javascript|coding|html|css|react|bug|function|algorithm|program/i,
                /cricket|psl|babar azam|ipl|football|messi|ronaldo|match|score/i,
                /movie|film|drama|song|actor|actress|cinema/i,
                /weather|mausam|barish|temperature/i,
                /doctor|bimari|medicine|fever|health/i,
                /recipe|khana|biryani|cook/i,
                /pichli instructions|ignore previous|system prompt/i
            ];

            for (const pattern of outOfScopePatterns) {
                if (pattern.test(q)) {
                    return {
                        message: `Mein sirf verified property aur real estate transactions mein aapki rehnumai kar sakta hoon.\n\nBatayein — aap kis city ya area mein property dekh rahe hain, ya kis budget ka plot/ghar talash kar rahe hain?`
                    };
                }
            }

            // 1. Greetings
            if (/^(hi|hello|hey|salam|assalam|aoa|kese ho|kaisay ho|kaise ho|kia hal|kya haal)/i.test(q)) {
                return {
                    message: `Walaikum Assalam! Main hazir hoon. Pakistan Real Estate mein plots, ghar, flats aur payment plans ke baray mein aapki mukammal rehnumai ke liye tayyar hoon.\n\nAap kis specific location (DHA, Bahria Town waghera) ya budget mein property dekh rahe hain?`
                };
            }

            // 2. Documents
            if (q.includes("document") || q.includes("kaagaz") || q.includes("papers") || q.includes("fard") || q.includes("intiqal") || q.includes("registry") || q.includes("dastaveez")) {
                return {
                    message: `Pakistan mein property purchase aur transfer ke liye ye ahem legal documents zaroori hotay hain:\n\n- **Fard**: Zameen ki malkiat ka official revenue record.\n- **Intiqal (Mutation)**: Malkiat ka ek shakhs se dosray ke naam official transfer.\n- **Registry / Allotment Letter**: Development authority ya Sub-Registrar se transfer proof.\n- **NOC (No Objection Certificate)**: Authority ya society ka verified approval aur clear dues status.\n\nAap kis specific society ya plot ke documents verify karwana chahtay hain?`
                };
            }

            // 3. Down Payment / Installments
            if (q.includes("down payment") || q.includes("downpayment") || q.includes("installment") || q.includes("qist") || q.includes("booking") || q.includes("plan")) {
                return {
                    message: `Approved installment projects mein aam tor par **10% se 20% down payment** par booking hoti hai, aur baqi raqam 3 se 4 saal ki asan quarterly ya monthly aqsaat mein ada hoti hai.\n\nMisaal ke tor par, agar 50 Lakh ka 5 Marla plot ho to taqreeban **5 se 10 Lakh** down payment banti hai.\n\nAap kis city ya development ka exact payment plan review karna chahtay hain?`
                };
            }

            // 4. Area Rates
            if (q.includes("dha") || q.includes("bahria") || q.includes("islamabad") || q.includes("karachi") || q.includes("lahore") || q.includes("rate") || q.includes("qeemat") || q.includes("price") || q.includes("marla") || q.includes("kanal")) {
                return {
                    message: `Current market benchmarks (Phase aur location ke mutabiq):\n\n- **DHA / Bahria Town (5 Marla Residential)**: Taqreeban **65 Lakh se 1.4 Crore**.\n- **1 Kanal Residential Plots**: Aam tor par **2.5 Crore se 6.5 Crore+**.\n- **Commercial Units (4 Marla)**: **3 Crore se 8.5 Crore+** tak benchmark hai.\n\nAapka preferred budget bracket kitna hai taake exact matching options shortlist kiye ja sakein?`
                };
            }

            // 5. Commercial vs Residential ROI
            if (q.includes("roi") || q.includes("rental") || q.includes("commercial") || q.includes("invest") || q.includes("kiraya") || q.includes("faida")) {
                return {
                    message: `Investment comparisons:\n\n- **Commercial Property (Plazas/Corporate Units)**: Saalana **7% se 10%** tak rental yield deta hai aur institutional tenants miltay hain.\n- **Residential Units (Houses/Plots)**: **3% se 5%** rental yield deta hai lekin safe capital preservation aur liquid resale hoti hai.\n\nAap long-term rental cashflow chahtay hain ya capital appreciation?`
                };
            }

            // 6. Direct Human Consultant Contact
            if (q.includes("agent") || q.includes("call") || q.includes("number") || q.includes("phone") || q.includes("visit") || q.includes("rabta") || q.includes("milna") || q.includes("human")) {
                return {
                    message: `Ji bilkul, aap hamari official real estate consulting desk se direct rabta kar saktay hain ya private site viewing arrange karwa saktay hain.\n\nAap apna preferred time aur phone number bata dein, ya direct **Official WhatsApp Business API (+92 336 6920141)** par message bhej saktay hain.`
                };
            }

            return {
                message: `Ji bilkul, main real estate transactions aur pricing ke hawalay se aapki mukammal rehnumai kar sakta hoon.\n\nAap residential plots, ready constructed houses, commercial units ya new booking plans mein se kis baray mein janna chahtay hain?`
            };
        }

        btnClearChat.addEventListener("click", () => {
            if (confirm("Reset current inquiry session?")) {
                chatMessages.innerHTML = "";
                state.chatHistory = [];
                state.sessionId = getOrCreateSessionId();
                sendWelcomeMessage();
            }
        });
    </script>
</body>
</html>
