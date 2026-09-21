# Project: Hero Section Background SVGs Modernization

## Architecture
- Target files: `index.php` and `index.html` in workspace root `C:\Users\Moiz Baig\.gemini\antigravity\scratch\automatixes.com`.
- Section: Hero section decorative background containers.
- Left background SVG: Represents an n8n workflow diagram (4 small circular/square nodes connected by bezier curve paths, canvas dot grid background, pulse badges).
- Right background SVG: Represents a CRM / Make.com stack automation diagram (6 modular circular nodes, central router hub, orbital guide rings, filter badge).
- Opacity: 15% (`opacity: 0.15;`, strictly within 12% - 18%).
- Palette: Lime-green (`#C8E019`) and white/slate/gray tones (`#ffffff`, `#e2e8f0`, `#94a3b8`, `#64748b`, `#111827`).
- Role: Pure background texture / illustration (no UI card borders, no legible typography/text cards).
- Layout & Responsiveness: Exact positioning wrappers (`top: 25%; left: 8%;` and `bottom: 15%; right: 10%;`), responsive class (`d-none d-lg-block`), animations (`heroFloat`), and z-index (`z-index: 0` vs `z-1`). Hero content, CTA buttons, headlines, and chat widgets remain intact.

## Feature Inventory
| # | Feature | Description | Milestone | Source | Status |
|---|---------|-------------|-----------|--------|--------|
| 1 | Left SVG - n8n Workflow | Inline SVG depicting 4 connected workflow nodes (n8n style) with lime-green & white/gray accents at 15% opacity | M1 | ORIGINAL_REQUEST.md §R1 | VERIFIED |
| 2 | Right SVG - CRM/Make Stack | Inline SVG depicting 6 modular CRM/Make connected stack nodes with lime-green & white/gray accents at 15% opacity | M1 | ORIGINAL_REQUEST.md §R2 | VERIFIED |
| 3 | Container & Layout Integrity | Keep exact positioning wrappers, classes (`d-none d-lg-block`), pointer-events, and prevent overlap with hero text | M1 | ORIGINAL_REQUEST.md §R3 | VERIFIED |
| 4 | index.php & index.html Parity | Both files have identical, verified SVG markup and positioning | M1 | ORIGINAL_REQUEST.md §Acceptance | VERIFIED |

## Milestones
| # | Name | Scope | Dependencies | Status |
|---|------|-------|-------------|--------|
| 1 | Hero Background SVGs Replacement | Replace left & right background SVGs in index.php and index.html according to R1-R3 | none | DONE |

## Code Layout
- `index.php`: Main landing page template (PHP) - Hero section lines 3–265
- `index.html`: Static landing page template (HTML) - Hero section lines 296–558
- `.agents/`: Coordination and metadata directories

## Interface Contracts
- Both `index.php` and `index.html` share the exact same SVG structure, attributes, and styling.
- Container elements surrounding the SVGs preserve all responsive classes, positioning, and animation properties.
