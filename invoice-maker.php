<?php 
$page_key = 'invoice-maker'; 
include 'header.php'; 
?>

<!-- Subpage Hero Section -->
<section class="subpage-hero text-center position-relative no-print">
    <div class="container">
        <span class="badge bg-warm-peach text-accent-brand rounded-pill px-3 py-2 fw-semibold mb-3">
            <i class="fa-solid fa-file-invoice me-1"></i> Free Online Invoice Generator
        </span>
        <h1 class="display-4 fw-extrabold text-white mb-3">Professional Invoice Maker</h1>
        <p class="lead text-white-50 max-width-600 mx-auto">
            Create, customize, and export high-quality A4 PDF invoices instantly. Powered by live calculations and Automatixes design system.
        </p>
    </div>
</section>

<!-- Main Invoice Maker App -->
<div id="app" class="py-4 py-md-5 bg-light-subtle">
    <div class="container">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white invoice-card">
            
            <!-- Top Control Bar (Screen Only) -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom no-print">
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold text-dark fs-5"><i class="fa-solid fa-sliders text-accent-brand me-2"></i>Invoice Builder</span>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" @click="resetForm" class="btn btn-outline-secondary rounded-pill px-3 py-2 btn-sm fw-semibold">
                        <i class="fa-solid fa-rotate-left me-1"></i> Reset
                    </button>
                    <button type="button" id="print-invoice-btn" @click="triggerPrint" class="btn btn-brand rounded-pill px-4 py-2 btn-sm fw-bold shadow-sm">
                        <i class="fa-solid fa-print me-1"></i> Print / Download PDF
                    </button>
                </div>
            </div>

            <!-- Printable Header Banner -->
            <div class="row align-items-start mb-4 pb-3 border-bottom header-row">
                <!-- Company Details (Left) -->
                <div class="col-md-7 mb-3 mb-md-0 position-relative">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        
                        <!-- Logo Container & Controls -->
                        <div v-if="company.showLogo && company.logo" class="logo-box-container position-relative">
                            <img :src="company.logo" alt="Company Logo" class="rounded-2" style="max-height: 54px; max-width: 150px; object-fit: contain; background: #fff;">
                            <div class="no-print mt-1 d-flex gap-1">
                                <label class="btn btn-outline-secondary btn-xs py-0 px-1.5 fw-semibold" style="font-size: 11px; cursor: pointer;" title="Change Logo">
                                    <i class="fa-solid fa-camera"></i> Change
                                    <input type="file" @change="onLogoUpload" accept="image/*" class="d-none">
                                </label>
                                <button type="button" @click="removeLogo" class="btn btn-outline-danger btn-xs py-0 px-1.5 fw-semibold" style="font-size: 11px;" title="Remove Logo">
                                    <i class="fa-solid fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>

                        <!-- Add Logo Button if hidden/removed -->
                        <div v-else class="no-print align-self-center">
                            <label class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1.5 fw-semibold d-inline-flex align-items-center gap-1.5" style="cursor: pointer;">
                                <i class="fa-solid fa-cloud-arrow-up"></i> Upload Logo
                                <input type="file" @change="onLogoUpload" accept="image/*" class="d-none">
                            </label>
                        </div>

                        <div class="flex-grow-1">
                            <input type="text" v-model="company.name" class="form-control form-control-lg fw-bold border-0 p-0 text-dark fs-4 company-name-input" placeholder="Your Company Name">
                            <input type="text" v-model="company.tagline" class="form-control border-0 p-0 text-muted small company-tagline-input" placeholder="Company Tagline / Subtitle">
                        </div>
                    </div>

                    <!-- Company Info Fields -->
                    <div class="ps-1 text-muted small space-y-1">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa-solid fa-location-dot text-accent-brand me-2 no-print" style="width: 14px;"></i>
                            <input type="text" v-model="company.address" class="form-control form-control-sm border-0 p-0 text-secondary company-address-input" placeholder="Company Address (e.g. New York, NY)">
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa-solid fa-phone text-accent-brand me-2 no-print" style="width: 14px;"></i>
                            <input type="text" v-model="company.phone" class="form-control form-control-sm border-0 p-0 text-secondary company-phone-input" placeholder="Company Phone (+1 234 567 890)">
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa-solid fa-envelope text-accent-brand me-2 no-print" style="width: 14px;"></i>
                            <input type="email" v-model="company.email" class="form-control form-control-sm border-0 p-0 text-secondary company-email-input" placeholder="Company Email (contact@company.com)">
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-globe text-accent-brand me-2 no-print" style="width: 14px;"></i>
                            <input type="text" v-model="company.website" class="form-control form-control-sm border-0 p-0 text-secondary company-website-input" placeholder="Company Website (https://company.com)">
                        </div>
                    </div>
                </div>

                <!-- Invoice Meta (Right) -->
                <div class="col-md-5 text-md-end">
                    <h2 class="fw-extrabold text-uppercase text-dark mb-3 tracking-wide">INVOICE</h2>
                    <div class="bg-light-subtle p-3 rounded-3 border d-inline-block text-start w-100 max-width-320">
                        <div class="row g-2 align-items-center mb-2">
                            <label class="col-5 col-form-label col-form-label-sm fw-semibold text-muted">Invoice #:</label>
                            <div class="col-7">
                                <input type="text" v-model="invoiceMeta.number" id="invoice-number-input" class="form-control form-control-sm fw-bold text-end" placeholder="INV-1001">
                            </div>
                        </div>
                        <div class="row g-2 align-items-center mb-2">
                            <label class="col-5 col-form-label col-form-label-sm fw-semibold text-muted">Date:</label>
                            <div class="col-7">
                                <input type="date" v-model="invoiceMeta.date" id="invoice-date-input" class="form-control form-control-sm text-end">
                            </div>
                        </div>
                        <div class="row g-2 align-items-center mb-2">
                            <label class="col-5 col-form-label col-form-label-sm fw-semibold text-muted">Due Date:</label>
                            <div class="col-7">
                                <input type="date" v-model="invoiceMeta.dueDate" id="invoice-duedate-input" class="form-control form-control-sm text-end">
                            </div>
                        </div>
                        <div class="row g-2 align-items-center">
                            <label class="col-4 col-form-label col-form-label-sm fw-semibold text-muted">Currency:</label>
                            <div class="col-8">
                                <select v-model="invoiceMeta.currency" id="currency-select" class="form-select form-select-sm fw-bold mb-1">
                                    <optgroup label="⭐ Major Global">
                                        <option value="$">USD ($) - US Dollar</option>
                                        <option value="€">EUR (€) - Euro</option>
                                        <option value="£">GBP (£) - British Pound</option>
                                        <option value="¥">JPY (¥) - Japanese Yen</option>
                                        <option value="CHF">CHF - Swiss Franc</option>
                                        <option value="C$">CAD (C$) - Canadian Dollar</option>
                                        <option value="A$">AUD (A$) - Australian Dollar</option>
                                        <option value="NZ$">NZD (NZ$) - New Zealand Dollar</option>
                                        <option value="S$">SGD (S$) - Singapore Dollar</option>
                                        <option value="HK$">HKD (HK$) - Hong Kong Dollar</option>
                                        <option value="¥">CNY (¥) - Chinese Yuan</option>
                                    </optgroup>
                                    <optgroup label="🕌 Middle East & Gulf (GCC)">
                                        <option value="AED">AED (د.إ) - UAE Dirham</option>
                                        <option value="SAR">SAR (﷼) - Saudi Riyal</option>
                                        <option value="QAR">QAR (﷼) - Qatari Riyal</option>
                                        <option value="KWD">KWD (د.ك) - Kuwaiti Dinar</option>
                                        <option value="BHD">BHD (ب.د) - Bahraini Dinar</option>
                                        <option value="OMR">OMR (ر.ع) - Omani Rial</option>
                                        <option value="JOD">JOD (د.ا) - Jordanian Dinar</option>
                                        <option value="EGP">EGP (ج.م) - Egyptian Pound</option>
                                        <option value="₺">TRY (₺) - Turkish Lira</option>
                                        <option value="₪">ILS (₪) - Israeli Shekel</option>
                                    </optgroup>
                                    <optgroup label="🌏 South Asia">
                                        <option value="Rs">PKR (Rs) - Pakistani Rupee</option>
                                        <option value="₹">INR (₹) - Indian Rupee</option>
                                        <option value="৳">BDT (৳) - Bangladeshi Taka</option>
                                        <option value="Rs">LKR (Rs) - Sri Lankan Rupee</option>
                                        <option value="₨">NPR (₨) - Nepalese Rupee</option>
                                    </optgroup>
                                    <optgroup label="🌴 Southeast & East Asia">
                                        <option value="RM">MYR (RM) - Malaysian Ringgit</option>
                                        <option value="Rp">IDR (Rp) - Indonesian Rupiah</option>
                                        <option value="₱">PHP (₱) - Philippine Peso</option>
                                        <option value="฿">THB (฿) - Thai Baht</option>
                                        <option value="₫">VND (₫) - Vietnamese Dong</option>
                                        <option value="₩">KRW (₩) - South Korean Won</option>
                                    </optgroup>
                                    <optgroup label="🏰 Europe & Nordic">
                                        <option value="kr">SEK (kr) - Swedish Krona</option>
                                        <option value="kr">NOK (kr) - Norwegian Krone</option>
                                        <option value="kr">DKK (kr) - Danish Krone</option>
                                        <option value="zł">PLN (zł) - Polish Zloty</option>
                                        <option value="Kč">CZK (Kč) - Czech Koruna</option>
                                        <option value="Ft">HUF (Ft) - Hungarian Forint</option>
                                        <option value="lei">RON (lei) - Romanian Leu</option>
                                        <option value="₴">UAH (₴) - Ukrainian Hryvnia</option>
                                        <option value="₽">RUB (₽) - Russian Ruble</option>
                                    </optgroup>
                                    <optgroup label="🌎 Americas">
                                        <option value="Mex$">MXN (Mex$) - Mexican Peso</option>
                                        <option value="R$">BRL (R$) - Brazilian Real</option>
                                        <option value="CLP$">CLP (CLP$) - Chilean Peso</option>
                                        <option value="COP$">COP (COP$) - Colombian Peso</option>
                                        <option value="PEN">PEN (S/.) - Peruvian Sol</option>
                                        <option value="ARS$">ARS (ARS$) - Argentine Peso</option>
                                    </optgroup>
                                    <optgroup label="🌍 Africa">
                                        <option value="R">ZAR (R) - South African Rand</option>
                                        <option value="₦">NGN (₦) - Nigerian Naira</option>
                                        <option value="KSh">KES (KSh) - Kenyan Shilling</option>
                                        <option value="GH₵">GHS (GH₵) - Ghanaian Cedi</option>
                                        <option value="MAD">MAD (د.م.) - Moroccan Dirham</option>
                                    </optgroup>
                                    <optgroup label="⚡ Crypto / Web3">
                                        <option value="₿">BTC (₿) - Bitcoin</option>
                                        <option value="Ξ">ETH (Ξ) - Ethereum</option>
                                        <option value="₮">USDT (₮) - Tether USD</option>
                                        <option value="USDC">USDC - USD Coin</option>
                                        <option value="SOL">SOL - Solana</option>
                                    </optgroup>
                                </select>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="text-muted" style="font-size: 10px;">Custom:</span>
                                    <input type="text" v-model="invoiceMeta.currency" class="form-control form-control-sm py-0 px-1 font-monospace" placeholder="e.g. CAD, Rs, $" style="font-size: 11px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Client Info Section -->
            <div class="row mb-4 client-section">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 border h-100">
                        <h6 class="fw-bold text-dark mb-2 text-uppercase tracking-wider small">
                            <i class="fa-solid fa-user-tag text-accent-brand me-1 no-print"></i> Billed To:
                        </h6>
                        <div class="mb-2">
                            <input type="text" v-model="client.name" id="client-name-input" class="form-control form-control-sm fw-bold text-dark" placeholder="Client Contact Name">
                        </div>
                        <div class="mb-2">
                            <input type="text" v-model="client.company" id="client-company-input" class="form-control form-control-sm text-secondary" placeholder="Client Company Name">
                        </div>
                        <div class="mb-2">
                            <input type="text" v-model="client.address" id="client-address-input" class="form-control form-control-sm text-secondary" placeholder="Billing Address">
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="email" v-model="client.email" id="client-email-input" class="form-control form-control-sm text-secondary" placeholder="Client Email">
                            </div>
                            <div class="col-6">
                                <input type="text" v-model="client.phone" id="client-phone-input" class="form-control form-control-sm text-secondary" placeholder="Client Phone">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Line Items Table -->
            <div class="table-responsive mb-3">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark text-uppercase small">
                        <tr>
                            <th scope="col" style="width: 45%;">Service / Description</th>
                            <th scope="col" class="text-center" style="width: 15%;">Qty</th>
                            <th scope="col" class="text-end" style="width: 20%;">Unit Price ({{ invoiceMeta.currency }})</th>
                            <th scope="col" class="text-end" style="width: 20%;">Total ({{ invoiceMeta.currency }})</th>
                            <th scope="col" class="text-center no-print" style="width: 50px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in lineItems" :key="index" class="line-item-row">
                            <td>
                                <!-- Service Select Dropdown -->
                                <select v-model="item.serviceSelect" @change="handleServiceChange(item)" class="form-select form-select-sm service-select mb-1" :class="{ 'no-print': item.serviceSelect === 'custom' }">
                                    <option v-for="service in defaultServices" :key="service" :value="service">
                                        {{ service }}
                                    </option>
                                    <option value="custom">Custom Service...</option>
                                </select>
                                <!-- Custom Service / Detailed Description Input -->
                                <input type="text" v-model="item.customService" @input="handleServiceChange(item)" v-if="item.serviceSelect === 'custom'" class="form-control form-control-sm custom-service-input mt-1" placeholder="Enter custom service description...">
                            </td>
                            <td class="text-center">
                                <input type="number" min="1" step="1" v-model.number="item.quantity" class="form-control form-control-sm text-center qty-input">
                            </td>
                            <td>
                                <input type="number" min="0" step="0.01" v-model.number="item.price" class="form-control form-control-sm text-end price-input">
                            </td>
                            <td class="text-end fw-bold text-dark row-total">
                                {{ invoiceMeta.currency }} {{ formatMoney(item.quantity * item.price) }}
                            </td>
                            <td class="text-center no-print">
                                <button type="button" @click="removeLineItem(index)" :disabled="lineItems.length <= 1" class="btn btn-sm btn-outline-danger border-0 remove-line-btn" title="Remove Item">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Add Line Item Button (No Print) -->
            <div class="mb-4 no-print">
                <button type="button" id="add-line-item-btn" @click="addLineItem" class="btn btn-outline-brand rounded-pill btn-sm fw-semibold">
                    <i class="fa-solid fa-plus me-1"></i> Add Line Item
                </button>
            </div>

            <!-- Invoice Summary & Totals -->
            <div class="row align-items-start mb-3 totals-section">
                <!-- Left: Payment Notes & Bank Details -->
                <div class="col-md-6 mb-3 mb-md-0 space-y-3">
                    
                    <!-- Notes & Payment Terms (Editable Title & Removable) -->
                    <div v-if="options.showNotes" class="p-3 bg-light rounded-3 border mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <input type="text" v-model="sections.notesTitle" class="form-control form-control-sm border-0 p-0 fw-bold text-dark text-uppercase tracking-wider small" style="width: 80%; background: transparent;" placeholder="NOTES & PAYMENT TERMS">
                            <button type="button" @click="options.showNotes = false" class="btn btn-outline-danger btn-xs py-0 px-1.5 no-print" style="font-size: 11px;">
                                <i class="fa-solid fa-xmark"></i> Hide
                            </button>
                        </div>
                        <textarea v-model="notes" id="notes-input" class="form-control form-control-sm border-0 bg-transparent text-secondary p-0" rows="3" placeholder="Enter payment instructions, terms, or greetings..."></textarea>
                    </div>
                    <div v-else class="no-print mb-2">
                        <button type="button" @click="options.showNotes = true" class="btn btn-outline-primary btn-xs rounded-pill px-2.5 py-1 fw-semibold">
                            <i class="fa-solid fa-plus"></i> Add Notes & Terms Section
                        </button>
                    </div>

                    <!-- Bank & Wire Transfer (Editable Title & Removable) -->
                    <div v-if="options.showBank" class="p-3 bg-light rounded-3 border">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <input type="text" v-model="sections.bankTitle" class="form-control form-control-sm border-0 p-0 fw-bold text-dark text-uppercase tracking-wider small" style="width: 80%; background: transparent;" placeholder="BANK & WIRE TRANSFER:">
                            <button type="button" @click="options.showBank = false" class="btn btn-outline-danger btn-xs py-0 px-1.5 no-print" style="font-size: 11px;">
                                <i class="fa-solid fa-xmark"></i> Hide
                            </button>
                        </div>
                        <div class="row g-2 small">
                            <div class="col-6">
                                <label class="text-muted d-block" style="font-size: 10px;">Bank Name:</label>
                                <input type="text" v-model="bank.name" class="form-control form-control-sm" placeholder="JPMorgan Chase">
                            </div>
                            <div class="col-6">
                                <label class="text-muted d-block" style="font-size: 10px;">Account / IBAN:</label>
                                <input type="text" v-model="bank.iban" class="form-control form-control-sm" placeholder="GB29 CHAS XXX">
                            </div>
                            <div class="col-6">
                                <label class="text-muted d-block" style="font-size: 10px;">Swift / BIC:</label>
                                <input type="text" v-model="bank.swift" class="form-control form-control-sm" placeholder="CHASUS33">
                            </div>
                            <div class="col-6">
                                <label class="text-muted d-block" style="font-size: 10px;">Account Title:</label>
                                <input type="text" v-model="bank.holder" class="form-control form-control-sm" placeholder="Automatixes LLC">
                            </div>
                        </div>
                    </div>
                    <div v-else class="no-print mb-2">
                        <button type="button" @click="options.showBank = true" class="btn btn-outline-primary btn-xs rounded-pill px-2.5 py-1 fw-semibold">
                            <i class="fa-solid fa-plus"></i> Add Bank & Wire Transfer Section
                        </button>
                    </div>

                </div>

                <!-- Totals Calculation Card (Right) -->
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 border">
                        <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                            <span class="fw-semibold text-secondary">Subtotal:</span>
                            <span class="fw-bold text-dark subtotal-display" id="subtotal-val">{{ invoiceMeta.currency }} {{ formatMoney(subtotal) }}</span>
                        </div>

                        <!-- Tax Input & Calculated Amount -->
                        <div class="d-flex justify-content-between align-items-center py-1.5 border-bottom">
                            <div class="d-flex align-items-center gap-1">
                                <span class="fw-semibold text-secondary">Tax Rate (%):</span>
                                <input type="number" min="0" step="any" v-model.number="taxRate" id="tax-rate-input" class="form-control form-control-sm text-end" style="width: 70px;">
                            </div>
                            <span class="fw-bold text-dark tax-amount-display" id="tax-amount-val">+ {{ invoiceMeta.currency }} {{ formatMoney(taxAmount) }}</span>
                        </div>

                        <!-- Discount Input & Calculated Amount -->
                        <div class="d-flex justify-content-between align-items-center py-1.5 border-bottom">
                            <div class="d-flex align-items-center gap-1">
                                <span class="fw-semibold text-secondary">Discount (%):</span>
                                <input type="number" min="0" step="any" v-model.number="discountRate" id="discount-rate-input" class="form-control form-control-sm text-end" style="width: 70px;">
                            </div>
                            <span class="fw-bold text-success discount-amount-display" id="discount-amount-val">- {{ invoiceMeta.currency }} {{ formatMoney(discountAmount) }}</span>
                        </div>

                        <!-- Grand Total -->
                        <div class="d-flex justify-content-between align-items-center pt-2.5 mt-1">
                            <span class="fw-extrabold text-dark fs-5">Grand Total:</span>
                            <span class="fw-extrabold text-accent-brand fs-4 grand-total-display" id="grand-total-val">{{ invoiceMeta.currency }} {{ formatMoney(grandTotal) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Sign-off / Thank you -->
            <div class="invoice-footer-notes text-center pt-3 border-top text-muted small mt-2">
                <p class="mb-0.5 fw-bold text-dark">Thank you for your business!</p>
                <p class="mb-0 text-secondary">If you have any questions regarding this invoice, please contact <a :href="'mailto:' + (company.email || 'contact@automatixes.com')" class="text-accent-brand text-decoration-none fw-semibold">{{ company.email || 'contact@automatixes.com' }}</a></p>
            </div>

            <!-- Watermark Footer (In-Flow Clean Print) -->
            <div class="invoice-watermark mt-3 pt-2 border-top text-center text-muted" style="display: none; font-size: 8.5pt;">
                <span>Invoice Generated by <strong>{{ company.name || 'Automatixes' }}</strong> | {{ company.website || 'automatixes.com' }} | {{ company.phone || '+92 336 6920141' }}</span>
            </div>

        </div>
    </div>
</div>

<!-- In-Depth Content & SEO Guide for Google Indexing -->
<section class="section-padding bg-surface-1 text-white border-top border-secondary border-opacity-25 no-print">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge bg-brand-translucent text-accent-brand mb-2 font-monospace px-3 py-2 border border-brand-50">BILLING & OPERATIONS GUIDE</span>
            <h2 class="display-6 fw-extrabold text-white">Mastering B2B Invoicing & Automated Billing</h2>
            <p class="text-white-50 fs-5">Everything you need to know about creating legally compliant commercial invoices and automating payment pipelines.</p>
        </div>

        <!-- 3 Core Pillars -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="card-glass p-4 rounded-4 h-100">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-dark text-white mb-3 border border-secondary border-opacity-25" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-scale-balanced text-accent-brand"></i>
                    </div>
                    <h4 class="fw-bold text-white mb-2">Legal Compliance</h4>
                    <p class="text-white-50 small mb-0">Discover mandatory line-item requirements, tax identification rules (EIN/VAT), and clear payment dispute terms needed to protect your revenue.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-glass p-4 rounded-4 h-100">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-dark text-white mb-3 border border-secondary border-opacity-25" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-bolt text-accent-neon"></i>
                    </div>
                    <h4 class="fw-bold text-white mb-2">Webhook Automation</h4>
                    <p class="text-white-50 small mb-0">Learn how modern operations teams link CRM deal closures (HubSpot, GoHighLevel) to automatic PDF generation, Stripe links, and accounting syncs.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-glass p-4 rounded-4 h-100">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-dark text-white mb-3 border border-secondary border-opacity-25" style="width: 48px; height: 48px;">
                        <i class="fa-solid fa-globe text-accent-orange"></i>
                    </div>
                    <h4 class="fw-bold text-white mb-2">Global Currencies</h4>
                    <p class="text-white-50 small mb-0">Best practices for cross-border transactions, multi-currency pricing, IBAN/SWIFT wire clearing, and preventing international remittance delays.</p>
                </div>
            </div>
        </div>

        <!-- In-Depth Content Grid -->
        <div class="row g-5 align-items-start mb-5 pb-4 border-bottom border-secondary border-opacity-25">
            <div class="col-lg-6">
                <h3 class="fw-bold text-white mb-3">7 Mandatory Elements of a Commercial Invoice</h3>
                <p class="text-white-50 leading-relaxed mb-4">
                    Incomplete invoices cause payment disputes, delayed remittances, and tax accounting headaches. Whether you are billing an enterprise client or a DTC partner, ensure every invoice contains:
                </p>
                <ul class="list-unstyled text-white-50 d-flex flex-column gap-3 small">
                    <li class="d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1"></i>
                        <div><strong class="text-white">Unique Sequential Identifier:</strong> A distinct numbering schema (e.g. <code>INV-2026-0042</code>) that never repeats, ensuring compliance with general audit practices.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1"></i>
                        <div><strong class="text-white">Both Parties' Legal Entities:</strong> Complete registered company names, physical registered business addresses, contact emails, and tax numbers (VAT/EIN).</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1"></i>
                        <div><strong class="text-white">Issue Date & Strict Due Date:</strong> Explicit dates (e.g. Net 14 or Net 30) rather than ambiguous terms like "Upon Receipt" to enforce overdue interest terms.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1"></i>
                        <div><strong class="text-white">Granular Itemization:</strong> Clear breakdown of each deliverable, hourly rate or unit price, quantity, and subtotal.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1"></i>
                        <div><strong class="text-white">Taxes & Discounts:</strong> Disclosed sales tax, VAT percentages, or pre-negotiated discount amounts applied before the grand total.</div>
                    </li>
                    <li class="d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-check text-accent-neon mt-1"></i>
                        <div><strong class="text-white">Verified Settlement Details:</strong> Exact IBAN, SWIFT/BIC codes, ACH routing numbers, or direct electronic payment links (Stripe / PayPal).</div>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6">
                <h3 class="fw-bold text-white mb-3">Automating Your Invoicing Pipeline with n8n</h3>
                <p class="text-white-50 leading-relaxed mb-4">
                    Manual data entry into invoice generators drains valuable time and invites calculation errors. Automatixes builds autonomous webhook workflows that eliminate manual billing entirely:
                </p>
                <div class="card-glass p-4 rounded-4">
                    <div class="d-flex flex-column gap-3 small">
                        <div class="d-flex align-items-start gap-3">
                            <span class="badge bg-dark text-white rounded-pill px-2.5 py-1 font-monospace border border-secondary border-opacity-25">01</span>
                            <div>
                                <strong class="text-white">Trigger from CRM Won Deal:</strong>
                                <p class="text-white-50 mb-0">When a sales representative marks an opportunity as "Closed-Won" in HubSpot or GoHighLevel, a secure webhook payload fires instantly.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <span class="badge bg-dark text-white rounded-pill px-2.5 py-1 font-monospace border border-secondary border-opacity-25">02</span>
                            <div>
                                <strong class="text-white">Dynamic Computation & PDF Generation:</strong>
                                <p class="text-white-50 mb-0">n8n parses client records, generates a custom-branded vector PDF matching your exact typography and color palette, and attaches live payment links.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <span class="badge bg-dark text-white rounded-pill px-2.5 py-1 font-monospace border border-secondary border-opacity-25">03</span>
                            <div>
                                <strong class="text-white">Dispatch & Accounting Synchronization:</strong>
                                <p class="text-white-50 mb-0">The invoice is dispatched via customer email / WhatsApp, recorded in QuickBooks or Xero, and marked as pending in your internal financial dashboard.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <span class="badge bg-dark text-white rounded-pill px-2.5 py-1 font-monospace border border-secondary border-opacity-25">04</span>
                            <div>
                                <strong class="text-white">Automatic Payment Reconciliation:</strong>
                                <p class="text-white-50 mb-0">When the Stripe charge succeeds, n8n marks the invoice "Paid", issues a receipt, and notifies your team in Slack.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row pt-4">
            <div class="col-12 text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-brand-translucent text-accent-brand mb-2 font-monospace px-3 py-2 border border-brand-50">FREQUENTLY ASKED QUESTIONS</span>
                <h3 class="display-6 fw-extrabold text-white">Questions About Invoicing & Billing Tools</h3>
                <p class="text-white-50">Common questions on free online invoice makers, PDF exports, and payment security.</p>
            </div>

            <div class="col-12">
                <div class="accordion accordion-flush max-w-900 mx-auto" id="invoiceFaqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item bg-transparent border-bottom border-secondary border-opacity-25">
                        <h2 class="accordion-header" id="invHeadingOne">
                            <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#invCollapseOne" aria-expanded="false" aria-controls="invCollapseOne">
                                Is this online invoice generator completely free to use?
                            </button>
                        </h2>
                        <div id="invCollapseOne" class="accordion-collapse collapse" aria-labelledby="invHeadingOne" data-bs-parent="#invoiceFaqAccordion">
                            <div class="accordion-body text-white-50 py-3 leading-relaxed">
                                Yes. The Automatixes Invoice Maker is 100% free with no sign-up, credit card, or recurring subscription required. You can generate unlimited professional invoices, customize currency formats, upload custom brand logos, and export print-ready A4 PDFs directly from your browser.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item bg-transparent border-bottom border-secondary border-opacity-25">
                        <h2 class="accordion-header" id="invHeadingTwo">
                            <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#invCollapseTwo" aria-expanded="false" aria-controls="invCollapseTwo">
                                Are our financial figures and client data stored on your servers?
                            </button>
                        </h2>
                        <div id="invCollapseTwo" class="accordion-collapse collapse" aria-labelledby="invHeadingTwo" data-bs-parent="#invoiceFaqAccordion">
                            <div class="accordion-body text-white-50 py-3 leading-relaxed">
                                No. The generator executes entirely client-side inside your local browser runtime via Vue 3. None of your client names, bank details, tax numbers, or line items are transmitted to or stored on external servers. Your billing information remains private and secure.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item bg-transparent border-bottom border-secondary border-opacity-25">
                        <h2 class="accordion-header" id="invHeadingThree">
                            <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#invCollapseThree" aria-expanded="false" aria-controls="invCollapseThree">
                                How do I save the generated invoice as a PDF?
                            </button>
                        </h2>
                        <div id="invCollapseThree" class="accordion-collapse collapse" aria-labelledby="invHeadingThree" data-bs-parent="#invoiceFaqAccordion">
                            <div class="accordion-body text-white-50 py-3 leading-relaxed">
                                Click the "Print / Download PDF" button at the top right of the builder. In your browser's print dialog window, set the "Destination" dropdown to "Save as PDF", verify that the paper size is set to A4, and click "Save". All navigation menus, buttons, and helper text are automatically stripped out.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item bg-transparent border-bottom border-secondary border-opacity-25">
                        <h2 class="accordion-header" id="invHeadingFour">
                            <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#invCollapseFour" aria-expanded="false" aria-controls="invCollapseFour">
                                Can I change the currency symbol to EUR, GBP, AED, or CAD?
                            </button>
                        </h2>
                        <div id="invCollapseFour" class="accordion-collapse collapse" aria-labelledby="invHeadingFour" data-bs-parent="#invoiceFaqAccordion">
                            <div class="accordion-body text-white-50 py-3 leading-relaxed">
                                Yes. Use the Currency dropdown in the Invoice Meta block to choose from major global currencies including USD ($), EUR (€), GBP (£), CAD ($), AUD ($), AED (د.إ), SAR (﷼), and PKR (Rs). All subtotal and grand total math recalculates dynamically.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item bg-transparent border-bottom border-secondary border-opacity-25">
                        <h2 class="accordion-header" id="invHeadingFive">
                            <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#invCollapseFive" aria-expanded="false" aria-controls="invCollapseFive">
                                Can Automatixes automate our company's end-to-end billing workflow?
                            </button>
                        </h2>
                        <div id="invCollapseFive" class="accordion-collapse collapse" aria-labelledby="invHeadingFive" data-bs-parent="#invoiceFaqAccordion">
                            <div class="accordion-body text-white-50 py-3 leading-relaxed">
                                Yes. While this web application provides immediate on-demand invoice generation, Automatixes engineers custom backend workflows using n8n, Make, and cloud webhooks. We can automatically generate, send, and reconcile hundreds of invoices monthly directly from your CRM or e-commerce store.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="accordion-item bg-transparent border-bottom border-secondary border-opacity-25">
                        <h2 class="accordion-header" id="invHeadingSix">
                            <button class="accordion-button collapsed bg-transparent fw-bold text-white fs-5 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#invCollapseSix" aria-expanded="false" aria-controls="invCollapseSix">
                                What payment terms should I specify on my commercial invoices?
                            </button>
                        </h2>
                        <div id="invCollapseSix" class="accordion-collapse collapse" aria-labelledby="invHeadingSix" data-bs-parent="#invoiceFaqAccordion">
                            <div class="accordion-body text-white-50 py-3 leading-relaxed">
                                Standard B2B terms range from "Net 14" (payment due within 14 calendar days) to "Net 30". For service agencies and software projects, we recommend specifying clear terms including wire transfer details, late payment interest fees, and accepted electronic payment methods.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD WebApplication & FAQPage Schema for Google Indexing -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebApplication",
      "@id": "https://automatixes.com/invoice-maker#webapp",
      "url": "https://automatixes.com/invoice-maker",
      "name": "Free Online Invoice Maker & Generator",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "All modern web browsers",
      "description": "Generate, customize, and export professional A4 PDF invoices instantly with live math calculations, multiple currencies, and custom branding.",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      },
      "provider": {
        "@type": "Organization",
        "name": "Automatixes",
        "url": "https://automatixes.com",
        "logo": "https://automatixes.com/favicon.png"
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://automatixes.com/invoice-maker#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Is this online invoice generator completely free to use?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. The Automatixes Invoice Maker is 100% free with no sign-up, credit card, or recurring subscription required."
          }
        },
        {
          "@type": "Question",
          "name": "Are our financial figures and client data stored on your servers?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. The generator executes entirely client-side inside your local browser runtime via Vue 3. No client names, bank details, or line items are transmitted to external servers."
          }
        },
        {
          "@type": "Question",
          "name": "How do I save the generated invoice as a PDF?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Click the 'Print / Download PDF' button at the top right of the builder. In your browser's print dialog window, set the destination to 'Save as PDF' and select A4."
          }
        },
        {
          "@type": "Question",
          "name": "Can I change the currency symbol to EUR, GBP, AED, or CAD?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Use the Currency dropdown in the Invoice Meta block to choose from major global currencies including USD, EUR, GBP, CAD, AUD, AED, SAR, and PKR."
          }
        },
        {
          "@type": "Question",
          "name": "Can Automatixes automate our company's end-to-end billing workflow?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Automatixes engineers custom backend workflows using n8n, Make, and cloud webhooks to automatically generate, dispatch, and reconcile invoices directly from your CRM."
          }
        },
        {
          "@type": "Question",
          "name": "What payment terms should I specify on my commercial invoices?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Standard B2B terms range from Net 14 to Net 30. For service agencies, we recommend specifying wire transfer details, late payment interest fees, and accepted electronic methods."
          }
        }
      ]
    }
  ]
}
</script>

<!-- Custom Page & Print Stylesheet -->
<style>
/* Custom styling for Invoice Maker */
.invoice-card {
    border-radius: 20px !important;
}

.tracking-wide {
    letter-spacing: 2px;
}

.tracking-wider {
    letter-spacing: 1px;
}

.max-width-320 {
    max-width: 320px;
}

.btn-outline-brand {
    color: #C8E019;
    border-color: #C8E019;
    background-color: transparent;
}
.btn-outline-brand:hover {
    color: #ffffff;
    background-color: #C8E019;
    border-color: #C8E019;
}

.text-accent-brand {
    color: #C8E019 !important;
}

/* Print Styles */
@media print {
    /* Hide non-printable components */
    header,
    #header-sticky,
    footer,
    .footer-area,
    #sticky-expert-btn,
    .newsletter-modal,
    #preloader,
    .mouse-cursor,
    .no-print,
    .subpage-hero,
    .btn,
    .n8n-chat,
    .chat-layout,
    .chat-wrapper,
    .chat-window-wrapper {
        display: none !important;
    }

    @page {
        size: A4 portrait;
        margin: 8mm 12mm;
    }

    body {
        background: #ffffff !important;
        color: #1e293b !important;
        font-size: 10pt !important;
        padding: 0 !important;
        margin: 0 !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    #app, .py-4, .py-md-5, .bg-light-subtle {
        padding: 0 !important;
        background: transparent !important;
    }

    .container {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .invoice-card {
        box-shadow: none !important;
        border: none !important;
        padding: 0 !important;
        background: #ffffff !important;
    }

    /* Transform input and select controls into borderless printed text */
    .form-control,
    .form-select {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        padding: 0 !important;
        color: #0f172a !important;
        font-weight: 500;
        appearance: none !important;
        -webkit-appearance: none !important;
        font-size: 10pt !important;
    }

    .form-select {
        background-image: none !important;
    }

    .table {
        border-color: #cbd5e1 !important;
        margin-bottom: 12px !important;
    }

    .table th, .table td {
        background: transparent !important;
        border-color: #e2e8f0 !important;
        padding: 5px 6px !important;
    }

    .table-dark {
        background-color: #f1f5f9 !important;
        color: #0f172a !important;
        border-color: #cbd5e1 !important;
    }

    .bg-light, .bg-light-subtle {
        background-color: #f8fafc !important;
        border-color: #e2e8f0 !important;
    }

    /* Avoid page-split collisions */
    .header-row,
    .client-section,
    .table-responsive,
    .line-item-row,
    .totals-section,
    .invoice-footer-notes,
    .invoice-watermark {
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }

    /* In-Flow Watermark (Prevents any fixed text collision) */
    .invoice-watermark {
        display: block !important;
        position: static !important;
        margin-top: 14px !important;
        padding-top: 8px !important;
        border-top: 1px solid #e2e8f0 !important;
    }
}
</style>

<!-- Vue 3 CDN -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<!-- Vue 3 App Logic -->
<script>
    const { createApp, ref, computed } = Vue;

    createApp({
        setup() {
            // 1. Company Information (Pre-filled, Editable)
            const company = ref({
                showLogo: true,
                logo: 'assets/img/logo/automatixes-logo-new.png',
                name: 'Automatixes',
                tagline: 'Empowering Businesses with AI & Automation',
                address: 'Remote / Worldwide',
                phone: '+92 336 6920141',
                email: 'contact@automatixes.com',
                website: 'https://automatixes.com'
            });

            // Logo Management Actions
            const onLogoUpload = (e) => {
                const file = e.target.files[0];
                if (!file) return;
                if (file.size > 3 * 1024 * 1024) {
                    alert('Please select an image smaller than 3MB');
                    return;
                }
                const reader = new FileReader();
                reader.onload = (event) => {
                    company.value.logo = event.target.result;
                    company.value.showLogo = true;
                };
                reader.readAsDataURL(file);
            };

            const removeLogo = () => {
                company.value.showLogo = false;
                company.value.logo = '';
            };

            const resetLogo = () => {
                company.value.logo = 'assets/img/logo/automatixes-logo-new.png';
                company.value.showLogo = true;
            };

            // 2. Sections & Options
            const sections = ref({
                clientTitle: 'BILLED TO:',
                notesTitle: 'NOTES & PAYMENT TERMS',
                bankTitle: 'BANK & WIRE TRANSFER:'
            });

            const options = ref({
                showNotes: true,
                showBank: true
            });

            const bank = ref({
                name: 'JPMorgan Chase Bank',
                iban: 'GB29 CHAS 0928 3829 1029 48',
                swift: 'CHASUS33XXX',
                holder: 'Automatixes LLC'
            });

            // 3. Client Details (Editable)
            const client = ref({
                name: 'Acme Corporation',
                company: 'Acme Corp Inc.',
                address: '123 Business Way, Suite 100, New York, NY 10001',
                email: 'billing@acmecorp.com',
                phone: '+1 (555) 019-2834'
            });

            // 4. Invoice Meta
            const todayStr = new Date().toISOString().split('T')[0];
            const defaultDue = new Date();
            defaultDue.setDate(defaultDue.getDate() + 14);
            const dueStr = defaultDue.toISOString().split('T')[0];

            const invoiceMeta = ref({
                number: 'INV-1001',
                date: todayStr,
                dueDate: dueStr,
                currency: '$'
            });

            // 5. Default Core Services
            const defaultServices = [
                'Autonomous AI Agents',
                'AI Automations (n8n/Make)',
                'Web & App Development',
                'UI/UX Design',
                'Commercial Product Shoot',
                'Support & Maintenance'
            ];

            // 6. Reactive Line Items Table Data
            const lineItems = ref([
                {
                    serviceSelect: 'Autonomous AI Agents',
                    customService: '',
                    description: 'Autonomous AI Agents',
                    quantity: 1,
                    price: 1500.00
                },
                {
                    serviceSelect: 'AI Automations (n8n/Make)',
                    customService: '',
                    description: 'AI Automations (n8n/Make)',
                    quantity: 2,
                    price: 750.00
                }
            ]);

            // 7. Tax and Discount Rates (%)
            const taxRate = ref(5);
            const discountRate = ref(0);

            // 8. Payment Notes / Terms
            const notes = ref('Thank you for working with Automatixes! Payment is due within 14 days.');

            // Helper to update service description
            const handleServiceChange = (item) => {
                if (item.serviceSelect !== 'custom') {
                    item.description = item.serviceSelect;
                } else {
                    item.description = item.customService || '';
                }
            };

            // Add new line item row
            const addLineItem = () => {
                lineItems.value.push({
                    serviceSelect: 'Autonomous AI Agents',
                    customService: '',
                    description: 'Autonomous AI Agents',
                    quantity: 1,
                    price: 500.00
                });
            };

            // Remove line item row (minimum 1 row protected)
            const removeLineItem = (index) => {
                if (lineItems.value.length > 1) {
                    lineItems.value.splice(index, 1);
                }
            };

            // Computed Properties for Live Math Calculations
            const subtotal = computed(() => {
                return lineItems.value.reduce((sum, item) => {
                    const qty = parseFloat(item.quantity) || 0;
                    const prc = parseFloat(item.price) || 0;
                    return sum + (qty * prc);
                }, 0);
            });

            const taxAmount = computed(() => {
                const rate = parseFloat(taxRate.value) || 0;
                return (subtotal.value * rate) / 100;
            });

            const discountAmount = computed(() => {
                const rate = parseFloat(discountRate.value) || 0;
                return (subtotal.value * rate) / 100;
            });

            const grandTotal = computed(() => {
                const total = subtotal.value + taxAmount.value - discountAmount.value;
                return Math.max(0, total);
            });

            // Currency formatting helper
            const formatMoney = (val) => {
                const num = parseFloat(val) || 0;
                return num.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            };

            // Window Print Trigger
            const triggerPrint = () => {
                window.print();
            };

            // Form Reset Helper
            const resetForm = () => {
                client.value = { name: '', company: '', address: '', email: '', phone: '' };
                invoiceMeta.value = {
                    number: 'INV-' + Math.floor(1000 + Math.random() * 9000),
                    date: todayStr,
                    dueDate: dueStr,
                    currency: '$'
                };
                lineItems.value = [
                    {
                        serviceSelect: 'Autonomous AI Agents',
                        customService: '',
                        description: 'Autonomous AI Agents',
                        quantity: 1,
                        price: 1000.00
                    }
                ];
                taxRate.value = 5;
                discountRate.value = 0;
            };

            return {
                company,
                onLogoUpload,
                removeLogo,
                resetLogo,
                sections,
                options,
                bank,
                client,
                invoiceMeta,
                defaultServices,
                lineItems,
                taxRate,
                discountRate,
                notes,
                handleServiceChange,
                addLineItem,
                removeLineItem,
                subtotal,
                taxAmount,
                discountAmount,
                grandTotal,
                formatMoney,
                triggerPrint,
                resetForm
            };
        }
    }).mount('#app');
</script>

<?php include 'footer.php'; ?>




