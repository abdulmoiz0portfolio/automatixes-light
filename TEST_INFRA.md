# QClay Redesign: End-to-End Test Infrastructure Specification (TEST_INFRA.md)

## 1. Executive Overview & Test Philosophy

### 1.1 Purpose
This document defines the architectural specification, methodology, feature inventory, execution mechanics, and coverage thresholds for the End-to-End (E2E) Testing Track of the **QClay-Style Website Redesign** project. The test suite operates as the authoritative quality gate across all visual tokens, fluid typography formulas, negative space systems, motion lifecycles (Lenis & GSAP ScrollTrigger), interactive physics (follower cursor & 3D magnetic buttons), asymmetrical grid layouts, subpages, and legacy mission-critical integrations (n8n chat widget, Vue 3 Invoice Maker, ElevenLabs conversational AI, and Firebase Firestore).

### 1.2 Test Philosophy: Requirement-Driven Opaque-Box Validation
The test infrastructure adheres strictly to **Opaque-Box Requirement-Driven Testing**:
- **Behavioral Verification**: Tests assert observable outcomes, DOM structures, computed styles, CSS custom properties, and HTTP responses derived directly from `ORIGINAL_REQUEST.md` and `PROJECT.md`.
- **Integrity Guarantee**: Zero facade tests, zero hardcoded vacuous assertions, and zero mocking shortcuts. All assertions validate genuine templates, stylesheets, scripts, and runtime outputs.
- **Progressive Testability**: The test runner evaluates all tests deterministically, diagnosing missing or pending features with precise expected vs. actual diffs without crashing the runner engine.
- **Zero External Dependencies**: The test runner is self-contained using Node.js standard built-in modules (`fs`, `path`, `http`, `https`, `vm`, `assert`, `child_process`), ensuring 100% reproducibility across environments without requiring external browser binary downloads or display servers.

### 1.3 Formal Testing Techniques Applied
1. **Category-Partition Method (CPM)**: Decomposes each feature into input categories (e.g., viewport width, mouse velocity, scroll position, user form entries) and environmental partitions (e.g., desktop 1080p, mobile 375px, 4K ultrawide, reduced-motion preferences).
2. **Boundary Value Analysis (BVA)**: Focuses assertions at extreme edges of fluid CSS `clamp()` formulas, minimum/maximum viewport scales, 0-value math calculations, and rapid entry/exit coordinate bounds.
3. **Pairwise / Orthogonal Interaction Testing**: Validates combinations of interdependent features (e.g., Lenis inertia scrolling combined with GSAP ScrollTrigger pinning; Follower cursor hover tracking over 3D magnetic buttons; `@media print` isolation suppressing dynamic canvas/widgets).
4. **Real-World Workload & Flow Testing**: Simulates complete end-to-end user journeys including invoice creation with live line item computations, n8n expert chat open/close cycles, and multi-page routing across the local Express PHP emulation server.

---

## 2. Dual-Mode Test Architecture

The test harness operates on a high-speed, dual-mode verification pipeline:

```
┌────────────────────────────────────────────────────────────────────────────────────────┐
│                        AUTOMATED E2E TEST RUNNER ARCHITECTURE                          │
│                                tests/e2e-test-runner.js                                │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ 1. CLI ARGUMENT PARSER & CONFIGURATION ENGINE                                          │
│    Flags: --tier=<1|2|3|4|all>  --feature=<F1..F13>  --verbose  --bail  --port=<num>    │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ 2. DUAL-MODE TEST ENGINES                                                              │
│    ┌──────────────────────────────────────┐  ┌──────────────────────────────────────┐  │
│    │ Mode A: Static AST & Token Engine    │  │ Mode B: Live DevServer HTTP Client   │  │
│    │ • PHP Template & Include Parser      │  │ • Express In-Process Auto-Spawn      │  │
│    │ • CSS Custom Property Token AST      │  │ • HTTP 200 Route Matrix Verifier     │  │
│    │ • JavaScript VM Syntax Compilation   │  │ • Live Rendered DOM & Meta Analyzer  │  │
│    │ • Fluid Clamp() Formula Evaluator    │  │ • Interactive State Machine Verifier │  │
│    └──────────────────────────────────────┘  └──────────────────────────────────────┘  │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ 3. 4-TIER TEST SUITE REGISTRY (152 Granular Tests)                                     │
│    ├── Tier 1: Feature Coverage (F1–F13: 65 tests, 5 per feature)                      │
│    ├── Tier 2: Boundary & Corner Cases (F1–F13: 65 tests, 5 per feature)               │
│    ├── Tier 3: Pairwise Cross-Feature Combinations (14 tests)                          │
│    └── Tier 4: Real-World Application Workflows (8 tests)                              │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ 4. ANSI DIAGNOSTIC REPORTER & SUMMARY TABLE                                            │
│    • Real-time suite progress indicators (✔ PASS, ✖ FAIL)                              │
│    • Granular failure diagnostics (Test ID, Target File/URL, Expected, Actual, Stack)  │
│    • Formatted ASCII execution matrix with pass/fail counts and timing per tier        │
│    • Process Exit Code contract: 0 (All Passed) | 1 (Any Failed)                       │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 3. Feature Inventory & Multi-Tier Mapping Matrix

The project consists of 13 core redesign features (F1 through F13) and 4 legacy integrations (L1 through L4). The table below details the inventory and test case allocation across Tiers 1–3:

| Feature ID | Category | Feature Name & Scope | Source Requirement | Tier 1 Tests | Tier 2 Tests | Tier 3 Tests | Total Tests |
|---|---|---|---|---|---|---|---|
| **F1** | Design Tokens | **Obsidian Abyss & Neon Palette**<br>Ultra-deep base (`#050505`, `#0a0a0a`), neon accents (`#ccff00`, `#00ff88`), high-contrast text (`#ffffff`). | `PROJECT.md:18`<br>`ORIGINAL_REQUEST.md:92` | 5 | 5 | 3 | **13** |
| **F2** | Typography | **Massive Space Grotesk Typography**<br>Geometric sans-serif headings, fluid hero clamp (`clamp(3.75rem, 8.8vw, 9.5rem)`), Inter body. | `PROJECT.md:19`<br>`ORIGINAL_REQUEST.md:83` | 5 | 5 | 2 | **12** |
| **F3** | Negative Space | **>150px Negative Space System**<br>Luxury vertical spacing (`clamp(140px, 16vh, 220px)`), `.section-qclay`, ultra-wide container. | `PROJECT.md:20`<br>`ORIGINAL_REQUEST.md:83` | 5 | 5 | 1 | **11** |
| **F4** | Motion Engine | **Lenis Smooth Scroll Engine**<br>Studio Freight Lenis v1.1.x, native window scroll without DOM hijacking, smooth inertia. | `PROJECT.md:21`<br>`ORIGINAL_REQUEST.md:86` | 5 | 5 | 3 | **13** |
| **F5** | Motion Sync | **GSAP ScrollTrigger Synchronization**<br>Central RAF ticker integration (`lenis.on('scroll', ScrollTrigger.update)`), `lagSmoothing(0)`. | `PROJECT.md:22`<br>`ORIGINAL_REQUEST.md:86` | 5 | 5 | 3 | **13** |
| **F6** | Text Reveal | **Kinetic Text Reveal System**<br>Zero-dependency character/word splitting, masked slide-up, 3D angular perspective tilt. | `PROJECT.md:23`<br>`ORIGINAL_REQUEST.md:86` | 5 | 5 | 2 | **12** |
| **F7** | Parallax & Marquee | **Parallax & Dynamic Infinite Marquee**<br>Scrubbed image transforms (`scale: 1.2`, `yPercent: -15..15`), velocity-reactive marquee. | `PROJECT.md:24`<br>`ORIGINAL_REQUEST.md:86` | 5 | 5 | 2 | **12** |
| **F8** | Cursor Physics | **High-Performance Follower Cursor**<br>Dual-layer dot+ring, `gsap.quickTo` at 120fps, multi-state hovers (`cursor-pointer`, `cursor-view`). | `PROJECT.md:25`<br>`ORIGINAL_REQUEST.md:89` | 5 | 5 | 3 | **13** |
| **F9** | Tactile Physics | **Tactile 3D Magnetic Buttons**<br>Dual-layer container/content physics attraction, bounds delta math, elastic bounce return. | `PROJECT.md:26`<br>`ORIGINAL_REQUEST.md:89` | 5 | 5 | 2 | **12** |
| **F10** | Grid Breaking | **Asymmetrical & Overlapping Layouts**<br>7:5 offset duets, overlapping depth cards, architectural grid lines, coordinate badges. | `PROJECT.md:27`<br>`ORIGINAL_REQUEST.md:93` | 5 | 5 | 2 | **12** |
| **F11** | Hero Section | **Hero Section Redesign**<br>Brutalist >8vw headline, pulsing availability status pill, dual magnetic CTAs, glowing backdrop. | `PROJECT.md:28`<br>`ORIGINAL_REQUEST.md:83` | 5 | 5 | 2 | **12** |
| **F12** | Showcase & Deck | **Services, Showcase & Sandbox Overhaul**<br>Brutalist numbered deck (`01`-`04`), Matter.js 2D physics sandbox, dark live reviews feed. | `PROJECT.md:29`<br>`ORIGINAL_REQUEST.md:86` | 5 | 5 | 2 | **12** |
| **F13** | Subpages & Legacy | **Subpages & Legacy Integrations**<br>Universal dark theme across subpages, n8n chat open/close, ElevenLabs widget, Vue 3 Invoice Maker. | `PROJECT.md:30`<br>`ORIGINAL_REQUEST.md:3-69` | 5 | 5 | 3 | **13** |
| **—** | **Suite Totals** | **Full Feature Spectrum** | **M1–M4 & Legacy Scope** | **65** | **65** | **14** | **144** |
| **Tier 4** | E2E Workflows | **Real-World Application Scenarios** (Listed in §5) | Full local deployment | — | — | — | **8** |
| **TOTAL** | **Comprehensive Matrix** | **152 Granular Automated Test Cases** | Complete System | **65** | **65** | **14** | **152** |

---

## 4. Test Architecture & Runner Specification

### 4.1 Invocation Commands & CLI Flags
The automated test runner is located at `tests/e2e-test-runner.js` and executed via Node.js:

```powershell
# Run the entire 152-test suite across all 4 tiers
node tests/e2e-test-runner.js

# Run a specific tier (1, 2, 3, or 4)
node tests/e2e-test-runner.js --tier=1
node tests/e2e-test-runner.js --tier=2
node tests/e2e-test-runner.js --tier=3
node tests/e2e-test-runner.js --tier=4

# Filter tests by specific feature (F1 through F13)
node tests/e2e-test-runner.js --feature=F1
node tests/e2e-test-runner.js --feature=F8 --verbose

# Additional execution controls
node tests/e2e-test-runner.js --bail            # Stop immediately on first test failure
node tests/e2e-test-runner.js --port=3001        # Specify custom DevServer port (default: 3000)
node tests/e2e-test-runner.js --verbose          # Output detailed diagnostic logs for each test
node tests/e2e-test-runner.js --help             # Display CLI usage manual
```

### 4.2 Pass / Fail Semantics & Exit Codes
- **Pass (Exit Code 0)**: All executed test cases meet their assertions. The runner prints a green summary confirmation.
- **Fail (Exit Code 1)**: One or more test assertions fail. The runner prints detailed red failure blocks with exact file locations, expected vs. actual values, and exits with code 1 to block CI/CD or milestone progression.

### 4.3 Directory & File Layout
```
qclay-redesign/
├── assets/
│   ├── css/
│   │   └── main.css             # Design tokens, typography, grid, cursor, animations
│   └── js/
│       └── main.js              # Lenis, GSAP sync, text reveal, cursor, magnetic physics
├── header.php                   # Google fonts, meta config, cursor DOM, layout wrappers
├── footer.php                   # Scripts, external widgets (n8n, ElevenLabs, Firebase)
├── index.php                    # Redesigned homepage sections
├── invoice-maker.php            # Vue 3 reactive invoice application
├── dev-server.js                # Express local PHP emulation server
├── TEST_INFRA.md                # E2E Test Infrastructure Specification (this file)
└── tests/
    ├── e2e-test-runner.js       # Production-grade 152-test automated test runner
    ├── test-chat-toggle.js      # Dedicated n8n chat toggle verification script
    └── test-invoice-maker.js    # Dedicated Vue 3 invoice maker test script
```

---

## 5. Real-World Application Scenarios (Tier 4 Catalog)

Tier 4 exercises full user workflows and integration boundaries against the local runtime:

| Test ID | Scenario Name | Target Endpoints / Files | Verification & Assertion Scope |
|---|---|---|---|
| **T4-SCEN-01** | **Homepage Full Render & Asset Pipeline Integrity** | `http://localhost:3000/`<br>`index.php`, `dev-server.js` | Emulates HTTP GET request to homepage, validates HTTP 200 status, confirms valid HTML document with `<head>` and `<body>`, and asserts that 100% of referenced local stylesheets, scripts, and SVG icons resolve on disk. |
| **T4-SCEN-02** | **Lenis + GSAP RAF Lifecycle & Zero Console Errors** | `assets/js/main.js`<br>`footer.php` | Validates initialization of `window.lenis`, `window.gsap`, `window.ScrollTrigger`, confirms ticker tick registration (`gsap.ticker.add`), and verifies absence of syntax errors or invalid function calls. |
| **T4-SCEN-03** | **n8n Chat Open -> Auto Message -> "✖" Close Cycle** | `footer.php`<br>`assets/js/main.js` | Tests n8n chat widget state machine: verifies unsuppressed event dispatching on `#sticky-expert-btn`, opens `.chat-layout`, injects `#custom-chat-close` and `#in-chat-quick-replies`, and verifies close event restores the sticky button. |
| **T4-SCEN-04** | **Invoice Maker Complete Workflow & Print Isolation** | `http://localhost:3000/invoice-maker`<br>`invoice-maker.php` | Tests Vue 3 reactivity: validates pre-filled company details, dynamic line item row addition, live calculation of subtotal, 10% tax, 5% discount, grand total, and verifies `@media print` rules hide header, footer, and buttons. |
| **T4-SCEN-05** | **Multi-Page Route Availability & Dark Theme Uniformity** | 9 Subpages (`/`, `/about`, `/ai-agents`, `/contact`, `/blogs`, etc.) | Queries all 9 canonical subpage routes through `dev-server.js`, asserts HTTP 200 status, valid `$meta_config` SEO title extraction, and presence of `assets/css/main.css` link tag. |
| **T4-SCEN-06** | **ElevenLabs Voice Agent Widget Integration** | `footer.php`<br>`index.php`, `voice-agent.php` | Asserts presence of `<elevenlabs-convai>` element in DOM, validates configured `agent-id` attribute, and verifies non-blocking `async` script loader. |
| **T4-SCEN-07** | **Firebase Live Reviews Synchronization & DOM Mount** | `footer.php`<br>`assets/js/main.js` | Validates Firebase SDK initialization (`window.db`), confirms `reviews` collection onSnapshot snapshot listener binding, and verifies dark card render styling. |
| **T4-SCEN-08** | **Mobile Viewport (<576px) End-to-End Responsive Flow** | `assets/css/main.css`<br>`header.php`, `index.php` | Validates mobile responsive rules: asserts `@media (pointer: coarse)` disables follower cursor, verifies `.grid-duet-7-5` collapses to single column, and ensures zero horizontal overflow (`overflow-x: hidden`). |

---

## 6. Coverage Thresholds & Quality Gate Criteria

To ensure complete specification compliance, the automated test suite enforces the following strict quantitative thresholds:

| Test Tier | Focus & Scope | Minimum Required | Designed & Implemented | Gate Threshold |
|---|---|---|---|---|
| **Tier 1** | Feature Coverage (Direct Sanity) | >= 65 tests | **65 tests** (5 per F1–F13) | 100% Pass Required |
| **Tier 2** | Boundary & Corner Cases | >= 65 tests | **65 tests** (5 per F1–F13) | 100% Pass Required |
| **Tier 3** | Pairwise Cross-Feature Interactions | >= 13 tests | **14 tests** | 100% Pass Required |
| **Tier 4** | Real-World Application Workflows | >= 7 tests | **8 tests** | 100% Pass Required |
| **OVERALL** | **Complete Redesign Test Suite** | **>= 150 tests** | **152 tests** | **100% Pass Required (Exit Code 0)** |

---

## 7. Independent Audit & Integrity Protocol

1. **Auditor Verification**: Any external auditor or orchestrator can run `node tests/e2e-test-runner.js` in a clean environment without installing extra npm packages.
2. **Assertion Verifiability**: Every test asserts explicit properties against actual files (`assets/css/main.css`, `header.php`, `footer.php`, `assets/js/main.js`, `index.php`, `invoice-maker.php`) or live Express responses.
3. **Escalation Protocol**: When a test fails due to missing or incomplete implementation in an assigned milestone (e.g., M1, M2, M3, M4), the runner clearly reports the failure diagnostic without modifying implementation code, maintaining strict separation between QA testing and feature development.
