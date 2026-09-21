"""
Milestone 1 Empirical Challenger Test Suite
QClay Redesign Project — Verification & Stress Testing
"""

import os
import re
import sys
import json
import urllib.parse
from html.parser import HTMLParser

ROOT_DIR = r"C:\Users\Moiz Baig\.gemini\antigravity\scratch\qclay-redesign"
CSS_PATH = os.path.join(ROOT_DIR, "assets", "css", "main.css")
HEADER_PATH = os.path.join(ROOT_DIR, "header.php")

test_results = {
    "passed": 0,
    "failed": 0,
    "details": []
}

def log_test(name, passed, details):
    status = "PASS" if passed else "FAIL"
    if passed:
        test_results["passed"] += 1
    else:
        test_results["failed"] += 1
    test_results["details"].append({
        "test": name,
        "status": status,
        "details": details
    })
    print(f"[{status}] {name}")
    if isinstance(details, dict):
        for k, v in details.items():
            print(f"    - {k}: {v}")
    elif isinstance(details, list):
        for item in details:
            print(f"    - {item}")
    else:
        print(f"    - {details}")

print("=" * 70)
print("RUNNING EMPIRICAL CHALLENGER TEST SUITE (MILESTONE 1)")
print("=" * 70)

# =========================================================================
# TEST 1: Clamp Mathematical Verification
# =========================================================================
print("\n--- 1. FLUID CLAMP MATHEMATICAL VERIFICATION ---")

with open(CSS_PATH, "r", encoding="utf-8") as f:
    css_content = f.read()

# Helper for parsing clamp(min, pref, max)
def parse_clamp(clamp_str):
    m = re.match(r"clamp\(\s*([^,]+)\s*,\s*([^,]+)\s*,\s*([^)]+)\s*\)", clamp_str.strip())
    if not m:
        return None
    return m.groups()

def parse_val_to_px(val_str, rem_base=16.0):
    val_str = val_str.strip()
    if val_str.endswith("rem"):
        return float(val_str[:-3]) * rem_base
    elif val_str.endswith("px"):
        return float(val_str[:-2])
    elif val_str.endswith("em"):
        return float(val_str[:-2]) * rem_base
    return float(val_str)

def eval_clamp(min_px, max_px, pref_func, dim_val):
    pref_px = pref_func(dim_val)
    return max(min_px, min(pref_px, max_px)), pref_px

# 1.1 Test --font-hero: clamp(3.75rem, 8.8vw, 9.5rem)
hero_match = re.search(r"--font-hero:\s*(clamp\([^;]+\));", css_content)
if hero_match:
    hero_raw = hero_match.group(1)
    min_s, pref_s, max_s = parse_clamp(hero_raw)
    min_px = parse_val_to_px(min_s)
    max_px = parse_val_to_px(max_s)
    vw_val = float(pref_s.strip()[:-2]) # 8.8
    
    viewports_w = [375, 768, 1024, 1440, 1920, 2560, 3840]
    hero_calc = {}
    
    for w in viewports_w:
        val, pref_raw = eval_clamp(min_px, max_px, lambda width: (vw_val / 100.0) * width, w)
        req_8vw = 0.08 * w
        hero_calc[f"{w}px"] = {
            "computed_px": round(val, 2),
            "pref_raw_px": round(pref_raw, 2),
            "at_min_bound": val == min_px,
            "at_max_bound": val == max_px,
            "meets_8vw_req": val >= req_8vw or val == min_px # clamped to min on mobile is expected
        }
    
    # Check desktop 1440px specifically
    val_1440 = hero_calc["1440px"]["computed_px"]
    pref_1440 = hero_calc["1440px"]["pref_raw_px"]
    passed_hero = (min_px == 60.0 and max_px == 152.0 and pref_1440 == 126.72 and val_1440 == 126.72 and val_1440 > (0.08 * 1440))
    
    log_test(
        "Hero Fluid Typography (--font-hero)",
        passed_hero,
        {
            "raw_clamp": hero_raw,
            "min_px": f"{min_px}px (3.75rem)",
            "max_px": f"{max_px}px (9.5rem)",
            "pref_vw": f"{vw_val}vw",
            "computed_viewports": hero_calc,
            "desktop_1440_eval": f"{val_1440}px (Requirement: >8vw = 115.2px -> Passed: {val_1440 > 115.2})"
        }
    )
else:
    log_test("Hero Fluid Typography (--font-hero)", False, "Not found in main.css")

# 1.2 Test --section-space: clamp(140px, 16vh, 220px)
space_match = re.search(r"--section-space:\s*(clamp\([^;]+\));", css_content)
if space_match:
    space_raw = space_match.group(1)
    min_s, pref_s, max_s = parse_clamp(space_raw)
    min_px = parse_val_to_px(min_s)
    max_px = parse_val_to_px(max_s)
    vh_val = float(pref_s.strip()[:-2]) # 16
    
    viewports_h = [600, 768, 900, 1080, 1440]
    space_calc = {}
    
    for h in viewports_h:
        val, pref_raw = eval_clamp(min_px, max_px, lambda height: (vh_val / 100.0) * height, h)
        space_calc[f"{h}px_height"] = {
            "computed_px": round(val, 2),
            "pref_raw_px": round(pref_raw, 2),
            "at_min_bound": val == min_px,
            "at_max_bound": val == max_px
        }
    
    val_1080 = space_calc["1080px_height"]["computed_px"]
    passed_space = (min_px == 140.0 and max_px == 220.0 and val_1080 == 172.80 and val_1080 > 150.0)
    
    log_test(
        "Section Spacing Fluid Scale (--section-space)",
        passed_space,
        {
            "raw_clamp": space_raw,
            "min_px": f"{min_px}px",
            "max_px": f"{max_px}px",
            "pref_vh": f"{vh_val}vh",
            "computed_heights": space_calc,
            "desktop_1080_eval": f"{val_1080}px (Requirement: >150px -> Passed: {val_1080 > 150.0})"
        }
    )
else:
    log_test("Section Spacing Fluid Scale (--section-space)", False, "Not found in main.css")

# 1.3 Check other typography and spacing clamps in main.css
all_clamps = re.findall(r"(--[a-zA-Z0-9_-]+):\s*(clamp\([^;]+\));", css_content)
clamp_summary = {}
clamp_valid_count = 0
for var_name, clamp_val in all_clamps:
    parsed = parse_clamp(clamp_val)
    if parsed:
        min_p = parse_val_to_px(parsed[0])
        max_p = parse_val_to_px(parsed[2])
        clamp_valid_count += 1
        clamp_summary[var_name] = {
            "clamp": clamp_val,
            "min_px": min_p,
            "max_px": max_p,
            "valid_bounds": min_p <= max_p
        }

log_test(
    f"All CSS Root Clamps Validation ({len(all_clamps)} detected)",
    clamp_valid_count == len(all_clamps) and all(v["valid_bounds"] for v in clamp_summary.values()),
    clamp_summary
)


# =========================================================================
# TEST 2: Residual Color Scan & CSS Syntax
# =========================================================================
print("\n--- 2. RESIDUAL COLOR & TOKEN AUDIT ---")

prohibited_colors = [
    r"#0B4550", r"#0D6171", r"#114550", r"#C8E019",
    r"rgb\(\s*11\s*,\s*69\s*,\s*80\s*\)",
    r"rgba\(\s*11\s*,\s*69\s*,\s*80",
    r"rgb\(\s*13\s*,\s*97\s*,\s*113\s*\)",
    r"rgb\(\s*17\s*,\s*69\s*,\s*80\s*\)",
    r"rgb\(\s*200\s*,\s*224\s*,\s*25\s*\)"
]

color_violations = []
for p in prohibited_colors:
    matches = list(re.finditer(p, css_content, re.IGNORECASE))
    for m in matches:
        # Find line number
        line_no = css_content[:m.start()].count("\n") + 1
        line_content = css_content.splitlines()[line_no - 1].strip()
        color_violations.append(f"Line {line_no}: Found pattern '{p}' -> '{line_content}'")

log_test(
    "Prohibited Legacy Teal/Lime Colors Audit",
    len(color_violations) == 0,
    color_violations if color_violations else "Clean! 0 residual legacy color matches found."
)

# Verify required dark & neon tokens
required_tokens = {
    "--bg-void": "#050505",
    "--bg-base": "#0a0a0a",
    "--bg-surface-1": "#111113",
    "--bg-surface-2": "#18181b",
    "--accent-neon": "#ccff00",
    "--accent-neon-bright": "#d4ff00",
    "--accent-emerald": "#00ff88",
    "--font-heading": "'Space Grotesk'",
    "--font-body": "'Inter'"
}

token_results = {}
all_tokens_present = True
for token, expected_sub in required_tokens.items():
    found = token in css_content and expected_sub in css_content
    token_results[token] = "Found" if found else "Missing/Mismatch"
    if not found:
        all_tokens_present = False

log_test(
    "Design System Core Tokens Presence",
    all_tokens_present,
    token_results
)

print("\n--- 3. CSS SYNTAX & BRACE INTEGRITY ---")

def check_css_syntax(css):
    errors = []
    # Strip comments first for brace counting
    stripped = re.sub(r"/\*.*?\*/", "", css, flags=re.DOTALL)
    
    # Check open vs closed braces
    open_b = stripped.count("{")
    close_b = stripped.count("}")
    if open_b != close_b:
        errors.append(f"Mismatched braces: {open_b} open '{{' vs {close_b} closed '}}'")
    
    # Check open vs closed parentheses
    open_p = stripped.count("(")
    close_p = stripped.count(")")
    if open_p != close_p:
        errors.append(f"Mismatched parentheses: {open_p} open '(' vs {close_p} closed ')'")
        
    # Check unclosed comments in original
    open_c = css.count("/*")
    close_c = css.count("*/")
    if open_c != close_c:
        errors.append(f"Mismatched comment delimiters: {open_c} '/*' vs {close_c} '*/'")
        
    return errors

syntax_errs = check_css_syntax(css_content)
log_test(
    "CSS Syntax and Block Enclosure",
    len(syntax_errs) == 0,
    syntax_errs if syntax_errs else "Perfect balance: all braces, parens, and comments matched."
)


# =========================================================================
# TEST 3: Header.php Validation
# =========================================================================
print("\n--- 4. HEADER.PHP MARKUP & GOOGLE FONTS VALIDATION ---")

with open(HEADER_PATH, "r", encoding="utf-8") as f:
    header_content = f.read()

# 4.1 Check Google Fonts URL encoding
font_links = re.findall(r'<link\s+[^>]*href=["\'](https://fonts\.googleapis\.com/css2\?[^"\']+)["\'][^>]*>', header_content)
font_valid = False
font_details = {}

if font_links:
    for link in font_links:
        parsed_url = urllib.parse.urlparse(link)
        qs = urllib.parse.parse_qs(parsed_url.query)
        families = qs.get("family", [])
        display = qs.get("display", [])
        
        has_space_grotesk = any("Space Grotesk" in fam for fam in families)
        has_inter = any("Inter" in fam for fam in families)
        has_swap = "swap" in display
        
        font_details = {
            "raw_url": link,
            "families_loaded": families,
            "display_param": display,
            "contains_space_grotesk": has_space_grotesk,
            "contains_inter": has_inter,
            "has_display_swap": has_swap
        }
        if has_space_grotesk and has_inter and has_swap:
            font_valid = True

log_test(
    "Google Fonts URL & Family Integration",
    font_valid,
    font_details
)

# 4.2 Check Cursor DOM Elements in header.php
has_cursor_outer = bool(re.search(r'<div\s+class=["\'][^"\']*mouse-cursor\s+cursor-outer[^"\']*["\']', header_content))
has_cursor_inner = bool(re.search(r'<div\s+class=["\'][^"\']*mouse-cursor\s+cursor-inner[^"\']*["\']', header_content))
has_aria_hidden = bool(re.search(r'<div\s+class=["\'][^"\']*mouse-cursor[^"\']*["\'][^>]*aria-hidden=["\']true["\']', header_content))

# Check DOM position: cursor should be near the top of body before navigation/content
body_pos = header_content.find("<body")
cursor_outer_pos = header_content.find("cursor-outer")
cursor_inner_pos = header_content.find("cursor-inner")
nav_pos = header_content.find("<header")

pos_correct = (body_pos < cursor_outer_pos < nav_pos) and (body_pos < cursor_inner_pos < nav_pos)

cursor_status = has_cursor_outer and has_cursor_inner and pos_correct
log_test(
    "Cursor DOM Elements & Hierarchy",
    cursor_status,
    {
        "has_cursor_outer": has_cursor_outer,
        "has_cursor_inner": has_cursor_inner,
        "aria_hidden_accessible": has_aria_hidden,
        "positioned_at_top_of_body": pos_correct,
        "outer_position_index": cursor_outer_pos,
        "inner_position_index": cursor_inner_pos,
        "nav_position_index": nav_pos
    }
)

# 4.3 HTML Parser & Structure Validation
class HeaderHTMLValidator(HTMLParser):
    def __init__(self):
        super().__init__()
        self.tags = []
        self.errors = []
        self.void_elements = {'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'}
        
    def handle_starttag(self, tag, attrs):
        if tag.lower() not in self.void_elements:
            self.tags.append((tag.lower(), self.getpos()))
            
    def handle_endtag(self, tag):
        tag_l = tag.lower()
        if tag_l in self.void_elements:
            return
        if not self.tags:
            self.errors.append(f"Unexpected closing tag </{tag_l}> at position {self.getpos()}")
            return
        
        last_tag, pos = self.tags[-1]
        if last_tag == tag_l:
            self.tags.pop()
        else:
            # Check if tag is in stack
            stack_tags = [t[0] for t in self.tags]
            if tag_l in stack_tags:
                # Missing closes for preceding tags
                while self.tags and self.tags[-1][0] != tag_l:
                    unclosed, unclosed_pos = self.tags.pop()
                    self.errors.append(f"Unclosed tag <{unclosed}> from line {unclosed_pos[0]} before </{tag_l}> at line {self.getpos()[0]}")
                if self.tags:
                    self.tags.pop()
            else:
                self.errors.append(f"Stray closing tag </{tag_l}> at line {self.getpos()[0]} (expected </{last_tag}> from line {pos[0]})")

# Strip PHP tags for HTML structural parsing
html_only = re.sub(r"<\?php.*?\?>", "", header_content, flags=re.DOTALL)
parser = HeaderHTMLValidator()
parser.feed(html_only)

# Unclosed tags remaining in header.php are expected for unclosed wrappers (like <body>, <div id="smooth-wrapper">, <div id="smooth-content">) which close in footer.php
expected_unclosed = {'html', 'body', 'div'} # div for smooth-wrapper and smooth-content
actual_unclosed = [t[0] for t in parser.tags]
unclosed_div_count = actual_unclosed.count('div')

passed_html = len(parser.errors) == 0 and actual_unclosed.count('html') == 1 and actual_unclosed.count('body') == 1 and unclosed_div_count == 2

log_test(
    "Header HTML Tag Structure & Smooth-Wrapper Balance",
    passed_html,
    {
        "parsing_errors": parser.errors if parser.errors else "None",
        "open_container_tags_for_footer": actual_unclosed,
        "smooth_wrappers_open": f"{unclosed_div_count} divs (#smooth-wrapper and #smooth-content)"
    }
)

# =========================================================================
# SUMMARY
# =========================================================================
print("\n" + "=" * 70)
print(f"VERIFICATION SUMMARY: {test_results['passed']} PASSED, {test_results['failed']} FAILED")
print("=" * 70)

verdict = "APPROVE" if test_results["failed"] == 0 else "REJECT"
print(f"\nCHALLENGER 1 VERDICT: {verdict}")

with open(os.path.join(ROOT_DIR, ".agents", "challenger_m1_1", "test_output.json"), "w", encoding="utf-8") as f:
    json.dump({"verdict": verdict, "results": test_results}, f, indent=2)
