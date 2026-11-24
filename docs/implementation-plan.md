# Implementation Plan — Pramajaya Personal Portfolio

## 1. Architecture & Technology Stack Decision

Per `PRD_Personal_Portfolio_Reference.md` Section 8 (*"Use the existing project stack if a repository already exists. Do not change the project's architecture without explaining why"*):

- **Framework:** Laravel 12 (existing repository in `c:\laragon\www\PortofolioWeb`)
- **Templating:** Blade Components (`resources/views/components/`) + Layouts (`resources/views/layouts/`)
- **Styling:** Tailwind CSS v4 (`@tailwindcss/vite` + CSS custom property design tokens)
- **Interactivity:** Alpine.js 3 (already installed) for sidebar collapse, mobile drawer, live project/blog search & category filtering, expandable tech grid, and theme toggle
- **Data Layer:** Centralized static PHP repository (`app/Data/PortfolioData.php`) containing 100% verified GitHub projects from `https://github.com/pramacoder`, skills, education, verified project/academic experience, bilingual copy (`id` & `en`), and technical articles — zero database dependency required.
- **Routing & Controllers:** `app/Http/Controllers/PortfolioController.php` handling all page routes, detail pages, contact form submission with validation, bilingual locale switching, and dynamic `sitemap.xml`.

---

## 2. Route Architecture

| Route | Name | Description |
|---|---|---|
| `GET /` | `home` | Full homepage matching all 8 reference sections |
| `GET /about` | `about` | Personal profile, Universitas Udayana background, focus areas & values |
| `GET /projects` | `projects` | Searchable, tag-filterable full portfolio of 12 real GitHub projects |
| `GET /projects/{slug}` | `projects.show` | Case study detail: overview, problem, solution, results, tech stack, GitHub & live demo |
| `GET /experience` | `experience` | Verified academic, engineering project, and workshop timeline |
| `GET /education` | `education` | Universitas Udayana (Informatika) & technical learning journey |
| `GET /skills` | `skills` | Detailed Hard Skills grid, Soft Skills, and Languages |
| `GET /blog` | `blog` | Searchable, category-filtered technical articles |
| `GET /blog/{slug}` | `blog.show` | Full article reader with metadata, table of key points, and related links |
| `GET /contact` | `contact` | Working validated inquiry form + direct contact cards |
| `POST /contact` | `contact.submit` | Validates and returns clean confirmation feedback (and mailto fallback) |
| `GET /links` | `links` | Curated links to GitHub, live deployed apps, and key repositories |
| `GET /locale/{lang}` | `locale.switch` | Switches between Indonesian (`id`) and English (`en`), persisted in session |
| `GET /sitemap.xml` | `sitemap` | XML sitemap covering all static and dynamic project/blog routes |

---

## 3. Component Architecture

```text
resources/views/
├── layouts/
│   └── app.blade.php              # Master layout: zero-flash theme script, sidebar, mobile header, main container
├── components/
│   ├── sidebar.blade.php          # Persistent desktop sidebar (expandable/collapsible) + mobile drawer
│   ├── mobile-header.blade.php    # Sticky 56px mobile header (trigger, name, ID/EN, theme)
│   ├── section-card.blade.php     # Reference bordered section wrapper (`rounded-xl border p-4 sm:p-6`)
│   ├── project-card.blade.php     # Reusable project card with custom SVG preview, tags, links
│   ├── blog-card.blade.php        # Reusable article card with editorial cover, category, date, CTA
│   ├── icon.blade.php             # Clean inline Lucide-style SVG icon component (zero external CDN risk)
│   └── footer.blade.php           # Minimal footer inside main column
└── pages/
    ├── home.blade.php
    ├── about.blade.php
    ├── projects.blade.php
    ├── project-detail.blade.php
    ├── experience.blade.php
    ├── education.blade.php
    ├── skills.blade.php
    ├── blog.blade.php
    ├── blog-detail.blade.php
    ├── contact.blade.php
    └── links.blade.php
```

---

## 4. Milestones

1. **Milestone 1 (Complete):** Live reference inspection, existing repo audit, GitHub `pramacoder` API extraction (38 repos + READMEs).
2. **Milestone 2 (Current):** Author `docs/reference-analysis.md`, `docs/implementation-plan.md`, `docs/design-system.md`, `docs/content-inventory.md`, prepare brand logo & downloadable CV PDF.
3. **Milestone 3:** Implement Sage-Editorial Light/Dark design tokens, Geist typography, reusable Blade shell (`app.blade.php`, `sidebar.blade.php`, `mobile-header.blade.php`, `icon.blade.php`, `section-card.blade.php`), and bilingual `PortfolioData.php` + `PortfolioController.php`.
4. **Milestone 4:** Build Homepage with all 8 reference sections and bespoke SVG project/blog visual covers.
5. **Milestone 5:** Build all required subpages (`/about`, `/projects`, `/projects/{slug}`, `/experience`, `/education`, `/skills`, `/blog`, `/blog/{slug}`, `/contact`, `/links`, `/sitemap.xml`).
6. **Milestone 6:** Run `npm run build`, PHP/Blade syntax checks, automated HTTP route tests across all routes & locales, responsive & accessibility verification, and author `docs/qa-report.md` + updated `README.md`.
