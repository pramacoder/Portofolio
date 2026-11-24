# Reference Website Analysis — https://www.adityafakhri.id/

> **Inspection Method:** Live HTTP + DOM + Stylesheet inspection of `https://www.adityafakhri.id/` and its subpages (`/about`, `/projects`, `/projects/gambaryuk`, `/skills`, `/experience`, `/education`, `/blog`, `/contact`, `/links`).  
> **Limitation Note:** Automated local Chrome DevTools screenshot capture (`DevToolsActivePort`) was unavailable on this workstation because Chrome remote debugging was not enabled. Full rendered SSR/RSC DOM markup, Tailwind CSS layout utilities, and CSS custom property tokens were extracted directly from the live reference site to capture exact measurements and structural fidelity without guesswork.

---

## 1. Global Layout & Shell Architecture

| Property | Reference Value | Notes |
|---|---|---|
| Shell layout | Persistent Left Sidebar + Scrollable Main Column | `flex flex-col md:flex-row min-h-screen w-full overflow-x-hidden` |
| Desktop Sidebar Width (expanded) | `16rem` (`256px`) | `--sidebar-width: 16rem`, fixed left (`fixed inset-y-0 left-0`), right border (`border-r`) |
| Desktop Sidebar Width (collapsed) | `3rem` (`48px`) | `--sidebar-width-icon: 3rem`, icon-only rail mode supported |
| Mobile Header | `h-14` (`56px`) sticky top bar (`md:hidden`) | Left: Hamburger trigger (`h-9 w-9`) + Name; Right: `ID`/`EN` segmented switcher + Theme toggle (`h-9 w-9`) |
| Main Content Container | `container max-w-5xl py-8 px-4 md:px-8` | `max-w-5xl` (`1024px`) centered inside `flex-1 min-w-0` |
| Section Card Pattern | `rounded-xl border p-4 sm:p-6` | Consistent bordered card containers separated by `mt-12` (`48px`) |

---

## 2. Sidebar Anatomy (Top to Bottom)

1. **Sidebar Header (`border-b pb-4`)**
   - Centered circular avatar (`h-20 w-20 rounded-full`)
   - Owner name (`text-xl font-bold`, centered)
   - Two concise role lines (`text-sm text-muted-foreground`, centered)
2. **Sidebar Navigation Groups (`p-2`, `gap-2`, scrollable)**
   - Group label: `text-xs font-medium text-sidebar-foreground/70 px-2 h-8 flex items-center`
   - Menu item: `flex w-full items-center gap-2 rounded-md p-2 h-8 text-sm`, active item highlighted via `bg-sidebar-accent font-medium text-sidebar-accent-foreground`
   - Groups in reference:
     - **Main**: Home (`/`), About (`/about`), Contact (`/contact`)
     - **Portfolio**: Projects & Portfolio (`/projects`), Speaking & Events, Community, Blog (`/blog`), Testimonials
     - **Professional**: Experience (`/experience`), Education (`/education`), Skills (`/skills`), Private Mentoring, Links (`/links`)
   - *Adaptation rule (PRD 3.2)*: Omit Speaking, Community, Testimonials, and Private Mentoring rather than inventing unverified content; keep all real, populated sections (Main: Home, About, Contact; Portfolio: Projects & Portfolio, Blog; Professional: Experience, Education, Skills, Links).
3. **Sidebar Footer (`border-t pt-4 px-4 space-y-4`)**
   - Language switcher (`ID` / `EN`) inside compact bordered segmented control (`border rounded-md p-1`)
   - Social icon buttons row (`flex justify-center space-x-2`, `h-10 w-10 border rounded-md`)
   - Full-width Primary CTA button: **Unduh CV / Download CV** (`h-10 w-full bg-primary text-primary-foreground rounded-md`)
   - Full-width Outline Theme Toggle button: **Mode Gelap / Mode Terang** (`h-9 w-full border rounded-md`)

---

## 3. Homepage Section Order & Composition

1. **Hero Section (`py-12 md:py-20`)**
   - Two-column desktop split (`flex flex-col md:flex-row items-center gap-8`)
   - Left (`flex-1 space-y-6`):
     - `h1` (`text-4xl md:text-5xl font-bold tracking-tight`)
     - Role subtitle (`text-xl text-muted-foreground`)
     - CTA bar: Primary CTA (`h-11 px-8 bg-primary`) + two secondary outline buttons (`h-11 border`, 2-column grid on mobile, inline flex on desktop)
     - 4-column stat strip (`grid grid-cols-2 sm:grid-cols-4`, separated by subtle borders, icon circle `h-7 w-7 bg-primary/10 text-primary`, bold figure, concise label)
   - Right (`w-full md:w-1/3 flex justify-center`):
     - Circular portrait (`w-56 h-56 sm:w-64 sm:h-64 md:w-72 md:h-72 rounded-full overflow-hidden border-4 border-primary/10 shadow-sm`)
2. **Introduction Card (`rounded-xl border p-4 sm:p-6`)**
   - Full-width bordered card containing a clear introductory summary (`text-lg text-muted-foreground`).
3. **Logo / Technology Showcase Card (`mt-12`)**
   - Centered heading (`text-lg font-medium mb-4`)
   - 4-column responsive tile grid (`grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6`), each tile `p-4 bg-muted rounded-lg h-24 flex items-center justify-center` with expandable collapse/show-all toggle.
   - *Adaptation (PRD 4)*: Replaced company partner logos with **Technologies I Work With** verified from `github.com/pramacoder`.
4. **Activities / Highlights Card (`mt-12`)**
   - 3-column card grid (`grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6`) with `h-48` visual top banner, badge pills, title (`font-semibold text-lg line-clamp-2`), and short description.
   - *Adaptation (PRD 4)*: Showcases verified academic, research, and workshop technical highlights.
5. **Core Skills (`Keahlian Utama`) Card (`mt-12`)**
   - 2-column grid (`grid-cols-1 md:grid-cols-2 gap-4`) of bordered cards (`p-6`), each with icon container (`bg-primary/10 p-2 rounded-md`), heading (`font-medium`), and concise technology summary.
6. **Featured Projects (`Proyek Unggulan`) Card (`mt-12`)**
   - 3-column grid (`grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6`) of clickable cards linking to `/projects/{slug}`, with hover lift (`hover:-translate-y-0.5 hover:shadow-md hover:border-primary/40`), title + arrow icon, 2-line excerpt, and rounded tech pills (`bg-muted/80 text-xs px-2.5 py-0.5 rounded-full`).
7. **Latest Blog (`Blog Terbaru`) Card (`mt-12`)**
   - 2-column grid (`grid-cols-1 md:grid-cols-2 gap-6`) with `h-48` cover thumbnail, title (`text-lg font-medium line-clamp-2`), excerpt, and read-more CTA button.
8. **Contact CTA (`Hubungi Saya`) Card (`mt-12`)**
   - Centered card with short invitation copy (`text-lg mb-6`) and primary CTA button linking to `/contact`.

---

## 4. Subpage Structure Patterns

- **Page Header Pattern (all subpages)**: `h1` (`text-2xl sm:text-3xl font-extrabold tracking-tight`) + subtitle (`text-sm sm:text-base text-muted-foreground`), followed by `mt-8` content blocks.
- **`/about`**: Hero highlight gradient banner card (`rounded-2xl border p-6 md:p-8`), 4-column metric/info cards, narrative bio section, focus topics grid, and core values cards.
- **`/projects`**: Search bar + tag/category filter pill bar inside `bg-card border rounded-xl p-4`, followed by Featured Projects section (`md:grid-cols-2 gap-6`) and Additional Projects section (`sm:grid-cols-2 md:grid-cols-3 gap-6`).
- **`/projects/{slug}`**: Back link button + live/GitHub action buttons, category/status/year badges, title & subtitle, metadata strip (role, year, stack), and 3-column layout (`lg:col-span-2` overview/problem/solution/results + `lg:col-span-1` sidebar metadata & tech stack card).
- **`/skills`**: Hard Skills grouped cards (`md:grid-cols-2 gap-8`) with inner `grid-cols-2 sm:grid-cols-3 gap-4` skill tiles, plus Soft Skills & Languages sections.
- **`/experience` & `/education`**: Vertical timeline inside bordered section cards (`relative pl-6 border-l-2 border-muted pb-8` with `h-3 w-3 rounded-full bg-primary` timeline dot, title, institution/period metadata, bullet highlights, and skill pills).
- **`/blog` & `/blog/{slug}`**: Search input + horizontal scrollable pill tab filters (`rounded-full bg-muted/80 p-1`), 2-column article cards, and full clean prose article view with reading time and back navigation.
- **`/contact`**: 3-column grid (`md:col-span-2` interactive contact form inside bordered card + `md:col-span-1` stacked contact info cards for Email, GitHub, Location, Availability/Response).
- **`/links`**: Search + category filter + curated quick-links & developer resources cards.

---

## 5. Responsive & Interactive Behavior

- **Desktop (`>= 768px`, tested at `1280px` and `1440px`)**: Persistent fixed left sidebar (`256px`, collapsible to `64px` icon rail), mobile header hidden, multi-column grids active.
- **Tablet (`768px`)**: Sidebar visible (with optional collapse button for extra reading width), 2-column project/blog/skills grids.
- **Mobile (`390px`, `320px`)**: Fixed sidebar hidden, sticky `56px` mobile top bar visible with slide-over offcanvas drawer + backdrop overlay, single-column stacked hero & cards, zero horizontal overflow.
- **Theme Persistence**: Light / Dark mode toggles `.dark` on `<html>`, persisted in `localStorage` (`theme`), applied synchronously in `<head>` before paint to prevent flash.
- **Bilingual i18n (`ID` / `EN`)**: Switches full website copy (navigation, hero, bios, project writeups, skills, education, experience, blog articles, contact form) via server-backed session locale route.
