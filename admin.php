<?php $page_key = 'admin'; include 'header.php'; ?>

<!-- Admin Header Section -->
<section class="subpage-hero text-center text-white">
    <div class="container">
        <span class="badge bg-brand-translucent text-accent-brand mb-3 font-monospace px-3 py-2 border border-brand-50">Automatixes CRM</span>
        <h1 class="display-4 fw-extrabold text-white">Lead Logs & Database Viewer</h1>
        <div class="title-underline"></div>
        <p class="lead text-secondary mx-auto mt-4 max-w-700">
            Real-time viewer querying contact queries and newsletter subscribers directly from Firebase Firestore.
        </p>
    </div>
</section>

<!-- Leads Data Section -->
<section class="section-padding bg-surface-1 text-white border-top border-secondary border-opacity-25">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Submissions Table -->
            <div class="col-12">
                <div class="card card-glass rounded-4 p-4 p-md-5 mb-5 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <h3 class="fw-extrabold text-white mb-0"><i class="fa-solid fa-list-check text-accent-brand me-2"></i> Project Leads</h3>
                        <button id="refresh-contact-leads" class="btn btn-outline-neon btn-sm"><i class="fa-solid fa-arrows-rotate me-1"></i> Refresh</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-white" id="contact-leads-table">
                            <thead>
                                <tr class="text-secondary border-secondary border-opacity-25">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <div class="spinner-border text-accent-brand spinner-border-sm me-2" role="status"></div> Loading Firestore records...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Calculator Project Quotes Table -->
            <div class="col-12">
                <div class="card card-glass rounded-4 p-4 p-md-5 mb-5 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-extrabold text-white mb-0"><i class="fa-solid fa-calculator text-accent-brand me-2"></i> Project Cost Quote Queries</h4>
                        <button id="refresh-calc-leads" class="btn btn-outline-neon"><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-white" id="calc-table">
                            <thead>
                                <tr class="text-secondary border-secondary border-opacity-25">
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Selected Services</th>
                                    <th>Scope (Pages)</th>
                                    <th>Estimated Total</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <div class="spinner-border text-accent-brand spinner-border-sm me-2" role="status"></div> Loading quote requests...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Newsletter Subscribers Table -->
            <div class="col-12 col-lg-6">
                <div class="card card-glass rounded-4 p-4 shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-extrabold text-white mb-0"><i class="fa-solid fa-envelope text-accent-brand me-2"></i> Subscribers</h4>
                        <button id="refresh-sub-leads" class="btn btn-outline-neon btn-sm"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-white" id="subscribers-table">
                            <thead>
                                <tr class="text-secondary border-secondary border-opacity-25">
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Subscribed On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        <div class="spinner-border text-accent-brand spinner-border-sm me-2" role="status"></div> Loading subscribers...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Simulated Logs Terminal -->
            <div class="col-12 col-lg-6">
                <div class="card card-glass rounded-4 p-4 shadow-sm h-100">
                    <h4 class="fw-extrabold text-white mb-4"><i class="fa-solid fa-terminal text-accent-brand me-2"></i> Live Integration Logs</h4>
                    <div class="terminal-body bg-dark text-success p-3 rounded font-monospace border border-secondary border-opacity-25" id="admin-terminal" style="height: 250px; overflow-y: auto; font-size: 13px; line-height: 1.5;">
                        <div class="text-white-50">// System initialized. Webhook listeners online.</div>
                        <div class="text-white-50">// Slack notifications route: ACTIVE [Mock]</div>
                        <div class="text-white-50">// n8n chat widget connected: ACTIVE</div>
                        <div class="text-white-50">// Waiting for form trigger...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Admin Page Specific Logic -->
<script type="module">
    import { collection, getDocs, query, orderBy } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";
    
    // Refresh function for Contacts
    async function loadContacts() {
        const tbody = document.querySelector("#contact-leads-table tbody");
        tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted"><div class="spinner-border text-accent-brand spinner-border-sm me-2"></div>Loading...</td></tr>`;
        
        try {
            if (!window.db) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i> Firebase Firestore not connected.</td></tr>`;
                return;
            }
            const q = query(collection(window.db, "contacts"), orderBy("timestamp", "desc"));
            const querySnapshot = await getDocs(q);
            
            if (querySnapshot.empty) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted"><i class="fa-solid fa-folder-open me-2"></i> No records found in Firestore yet.</td></tr>`;
                return;
            }
            
            tbody.innerHTML = "";
            let idx = 1;
            querySnapshot.forEach((doc) => {
                const data = doc.data();
                const name = data.name || "N/A";
                const email = data.email || "N/A";
                const service = data.service || "N/A";
                const description = data.description || "N/A";
                let dateStr = "N/A";
                
                if (data.timestamp) {
                    dateStr = new Date(data.timestamp.seconds * 1000).toLocaleString();
                }
                
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${idx++}</td>
                    <td class="fw-bold text-white">${name}</td>
                    <td><a href="mailto:${email}" class="text-accent-brand">${email}</a></td>
                    <td><span class="badge bg-brand-translucent text-accent-brand border border-brand-50">${service}</span></td>
                    <td class="text-secondary" style="max-width: 250px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">${description}</td>
                    <td class="text-muted">${dateStr}</td>
                `;
                tbody.appendChild(tr);
            });
        } catch (error) {
            console.error("Error reading contacts:", error);
            tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-danger"><i class="fa-solid fa-triangle-exclamation me-2"></i> Error: ${error.message}</td></tr>`;
        }
    }

    // Refresh function for Newsletter
    async function loadNewsletter() {
        const tbody = document.querySelector("#subscribers-table tbody");
        tbody.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-muted"><div class="spinner-border text-accent-brand spinner-border-sm me-2"></div>Loading...</td></tr>`;
        
        try {
            if (!window.db) {
                tbody.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-danger">Firebase not connected.</td></tr>`;
                return;
            }
            const q = query(collection(window.db, "subscribers"), orderBy("timestamp", "desc"));
            const querySnapshot = await getDocs(q);
            
            if (querySnapshot.empty) {
                tbody.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-muted"><i class="fa-solid fa-folder-open me-2"></i> No subscribers.</td></tr>`;
                return;
            }
            
            tbody.innerHTML = "";
            let idx = 1;
            querySnapshot.forEach((doc) => {
                const data = doc.data();
                const email = data.email || "N/A";
                let dateStr = "N/A";
                
                if (data.timestamp) {
                    dateStr = new Date(data.timestamp.seconds * 1000).toLocaleString();
                }
                
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${idx++}</td>
                    <td><a href="mailto:${email}" class="text-accent-brand">${email}</a></td>
                    <td class="text-muted">${dateStr}</td>
                `;
                tbody.appendChild(tr);
            });
        } catch (error) {
            console.error("Error reading subscribers:", error);
            tbody.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-danger">Error: ${error.message}</td></tr>`;
        }
    }

    // Refresh function for Cost Calculator Queries
    async function loadCalculatorQueries() {
        const tbody = document.querySelector("#calc-table tbody");
        tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted"><div class="spinner-border text-accent-brand spinner-border-sm me-2"></div>Loading...</td></tr>`;
        
        try {
            if (!window.db) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-danger">Firebase not connected.</td></tr>`;
                return;
            }
            const q = query(collection(window.db, "calculator_queries"), orderBy("timestamp", "desc"));
            const querySnapshot = await getDocs(q);
            
            if (querySnapshot.empty) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted"><i class="fa-solid fa-folder-open me-2"></i> No quote requests.</td></tr>`;
                return;
            }
            
            tbody.innerHTML = "";
            let idx = 1;
            querySnapshot.forEach((doc) => {
                const data = doc.data();
                const email = data.email || "N/A";
                const services = Array.isArray(data.services) ? data.services.join(", ") : (data.services || "N/A");
                const scope = data.scope || "N/A";
                const total = data.estimatedTotal ? `$${data.estimatedTotal.toLocaleString()}` : "N/A";
                let dateStr = "N/A";
                
                if (data.timestamp) {
                    dateStr = new Date(doc.createTime ? doc.createTime.seconds * 1000 : Date.now()).toLocaleString();
                    if (data.timestamp.seconds) {
                        dateStr = new Date(data.timestamp.seconds * 1000).toLocaleString();
                    } else if (typeof data.timestamp === "string") {
                        dateStr = new Date(data.timestamp).toLocaleString();
                    }
                }
                
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${idx++}</td>
                    <td><a href="mailto:${email}" class="text-accent-brand fw-bold">${email}</a></td>
                    <td class="text-secondary">${services}</td>
                    <td><span class="badge bg-secondary-subtle text-white border border-secondary border-opacity-25">${scope}</span></td>
                    <td class="fw-bold text-accent-brand">${total}</td>
                    <td class="text-muted">${dateStr}</td>
                `;
                tbody.appendChild(tr);
            });
        } catch (error) {
            console.error("Error reading calculator queries:", error);
            tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-danger">Error: ${error.message}</td></tr>`;
        }
    }

    // Setup events
    window.addEventListener("load", () => {
        setTimeout(() => {
            loadContacts();
            loadNewsletter();
            loadCalculatorQueries();
        }, 1500);

        document.getElementById("refresh-contact-leads").onclick = loadContacts;
        document.getElementById("refresh-sub-leads").onclick = loadNewsletter;
        document.getElementById("refresh-calc-leads").onclick = loadCalculatorQueries;
        
        const terminal = document.getElementById("admin-terminal");
        window.addEventListener("storage", () => {
            const logs = JSON.parse(localStorage.getItem("admin_integration_logs") || "[]");
            if (logs.length > 0) {
                logs.forEach(log => {
                    const div = document.createElement("div");
                    div.className = "text-accent-brand";
                    div.innerText = log;
                    terminal.appendChild(div);
                });
                terminal.scrollTop = terminal.scrollHeight;
                localStorage.removeItem("admin_integration_logs");
            }
        });
    });
</script>

<?php include 'footer.php'; ?>


