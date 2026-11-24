# Pramajaya — Personal Developer Portfolio

Personal portfolio website for **Pramajaya** (`@pramacoder`), Informatics student at **Universitas Udayana**, showcasing verified full-stack web applications, AI/ML/NLP research, Information Retrieval systems, skills, academic background, and technical writing.

Built with **Laravel 12**, **Blade Components**, **Tailwind CSS v4**, **Alpine.js 3**, and **Vite 7**, inspired structurally by a calm sidebar-first portfolio layout while implementing an original **Sage-Editorial** Light/Dark design system and **Geist** typography.

---

## Features

- **Persistent Collapsible Sidebar + Mobile Offcanvas Drawer** (`256px` expanded, `68px` icon rail, sticky `56px` mobile header)
- **Light & Dark Theme Switcher** with zero-flash `localStorage` persistence and CSS custom property tokens
- **Full Bilingual Support (`ID` / `EN`)** across navigation, hero, bio, 12 project case studies, skills, experience, education, blog articles, and contact form
- **12 Verified GitHub Projects** sourced directly from [github.com/pramacoder](https://github.com/pramacoder) with live tag filtering, search, and detailed Problem / Solution / Outcomes case studies
- **Technical Blog** with search, category tabs, and full article views linked to related repositories
- **Downloadable PDF CV** (`public/documents/cv-pramajaya.pdf`)
- **Validated Contact Form** with honeypot spam protection and direct contact cards
- **SEO & Accessibility** including per-page meta/Open Graph tags, semantic landmarks, skip-to-content link, keyboard focus rings, `robots.txt`, and dynamic `/sitemap.xml`

---

## Implemented Routes

| Route | Description |
|---|---|
| `/` | Homepage (Hero, Intro, Tech Stack, Exploration Highlights, Core Skills, Featured Projects, Latest Blog, Contact CTA) |
| `/about` | Personal story, Universitas Udayana background, focus areas & principles |
| `/projects` | Full searchable & tag-filterable portfolio (12 verified GitHub repositories) |
| `/projects/{slug}` | Case study detail page (Overview, Problem, Solution, Verification, Stack, GitHub & Live Demo) |
| `/experience` | Verified engineering & academic project timeline |
| `/education` | Universitas Udayana S1 Informatika & continuous learning |
| `/skills` | Hard Skills grid, Soft Skills & Languages |
| `/blog` | Searchable & category-filtered technical articles |
| `/blog/{slug}` | Full article detail reader with related GitHub project |
| `/contact` | Validated contact form & direct contact information |
| `/links` | Quick links to GitHub, live deployed apps, top repositories & CV |
| `/locale/{id\|en}` | Bilingual session language switcher |
| `/sitemap.xml` | Dynamic XML sitemap |

---

## Local Development

```bash
# Install dependencies
composer install
npm install

# Build frontend assets (or run `npm run dev` for HMR)
npm run build

# Run automated test suite
php artisan test

# Serve locally (or open via Laragon)
php artisan serve
```

---

## Deployment Notes

- **Laravel Hosting (Forge / Render / Railway / VPS / Laragon):** Run `composer install --no-dev --optimize-autoloader`, `npm ci && npm run build`, `php artisan config:cache`, `php artisan route:cache`, and `php artisan view:cache`.
- **Environment Variables:** Ensure `APP_KEY`, `APP_URL`, and `APP_ENV=production` are set in `.env`. No external database is required for portfolio content (stored centrally in `app/Data/PortfolioData.php`).
- **Customizing Owner Info:** Update email, social links, or projects in `app/Data/PortfolioData.php`, and replace `public/documents/cv-pramajaya.pdf` with a custom CV PDF anytime.

---

## Project Documentation

- [docs/reference-analysis.md](docs/reference-analysis.md)
- [docs/implementation-plan.md](docs/implementation-plan.md)
- [docs/design-system.md](docs/design-system.md)
- [docs/content-inventory.md](docs/content-inventory.md)
- [docs/qa-report.md](docs/qa-report.md)
