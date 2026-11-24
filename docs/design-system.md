# Design System — Pramajaya Portfolio

> **Objective:** Preserve the reference website's clean, calm, sidebar-first structural ergonomics while establishing a distinct, original visual identity using the PRD's warm sage-editorial color system and **Geist** typography.

---

## 1. Color Tokens

Implemented via CSS custom properties in `resources/css/app.css` and mapped directly into Tailwind CSS v4 `@theme` utilities.

### Light Mode (`:root`)

| Token | Hex | Usage |
|---|---|---|
| `--bg-background` | `#F8F7F2` | Global warm alabaster page canvas |
| `--bg-surface` | `#FFFFFF` | Cards, panels, inputs |
| `--bg-sidebar` | `#F3F2EC` | Persistent sidebar surface |
| `--bg-muted` | `#ECEEE8` | Badges, icon containers, secondary tiles |
| `--color-primary` | `#527A61` | Primary CTAs, active indicators, timeline dots |
| `--color-primary-hover` | `#42644F` | Primary CTA hover state |
| `--color-primary-foreground` | `#FFFFFF` | Text on primary backgrounds |
| `--color-foreground` | `#202820` | Headings and primary body copy (13.4:1 contrast on `#F8F7F2`) |
| `--color-muted-foreground` | `#5B665C` | Secondary descriptions & metadata (5.4:1 WCAG AA contrast) |
| `--color-border` | `#E2E5DC` | Card, sidebar, and input borders |
| `--color-accent` | `#DDE8DA` | Active sidebar item & subtle hover highlights |
| `--color-accent-foreground` | `#1F3828` | Text on accent surfaces |

### Dark Mode (`.dark`)

| Token | Hex | Usage |
|---|---|---|
| `--bg-background` | `#111613` | Deep botanical obsidian canvas |
| `--bg-surface` | `#171E1A` | Elevated card surfaces |
| `--bg-sidebar` | `#141A16` | Persistent dark sidebar surface |
| `--bg-muted` | `#212B25` | Dark badges & icon wells |
| `--color-primary` | `#77AA8A` | Luminous sage accent (6.8:1 contrast on `#171E1A`) |
| `--color-primary-hover` | `#8ABC9C` | Dark hover state |
| `--color-primary-foreground` | `#0D1510` | High-contrast label on primary buttons |
| `--color-foreground` | `#EDF2EE` | Primary dark-mode text |
| `--color-muted-foreground` | `#9CA99E` | Secondary dark-mode metadata (6.1:1 contrast) |
| `--color-border` | `#28342C` | Crisp hairline dark borders |
| `--color-accent` | `#213227` | Active sidebar highlight in dark mode |
| `--color-accent-foreground` | `#D7E8DC` | Active dark sidebar text |

---

## 2. Typography

Distinct from the reference website (`Inter`):
- **Primary Sans:** `Geist` (loaded via Google Fonts, weights `400, 500, 600, 700, 800`)
- **Monospace Accent:** `Geist Mono` (weights `400, 500`) for technical metrics, repository names, and code snippets

### Scale

| Role | Classes | Size |
|---|---|---|
| Hero H1 | `text-4xl md:text-5xl font-bold tracking-tight` | 36px / 48px |
| Subpage H1 | `text-2xl sm:text-3xl font-extrabold tracking-tight` | 24px / 30px |
| Section H2 | `text-lg sm:text-xl font-semibold tracking-tight` | 18px / 20px |
| Card Title H3 | `text-base sm:text-lg font-semibold leading-snug` | 16px / 18px |
| Body Copy | `text-sm sm:text-base leading-relaxed` | 14px / 16px |
| Metadata / Pills | `text-xs font-medium` | 12px |

---

## 3. Spacing, Radius & Elevation

- **Spacing Scale:** `4, 8, 12, 16, 24, 32, 48, 64, 80px` (`p-4 sm:p-6`, `mt-12`, `py-12 md:py-20`, `gap-4 sm:gap-6`)
- **Radii:**
  - Buttons / inputs / nav links: `rounded-md` (`6px`)
  - Cards: `rounded-lg` (`8px`)
  - Section wrappers: `rounded-xl` (`12px`)
  - Badges / avatars: `rounded-full`
- **Elevation:** Flat border-first hierarchy (`border border-border`) with subtle `shadow-sm` on cards and `hover:shadow-md` on interactive links — zero heavy drop shadows or noisy gradients.
