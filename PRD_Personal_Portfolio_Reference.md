# PRD — Personal Portfolio Website
## Reference-Based Portfolio Implementation

**Project Owner:** Pramajaya  
**Project Type:** Personal Website / Developer Portfolio  
**Reference Website:** https://www.adityafakhri.id/  
**Primary Goal:** Recreate the reference website's layout, structure, visual hierarchy, and interactions as closely as possible, while using a different color palette, typography, personal content, and original assets.

> Important: Use the reference as inspiration for layout and interaction patterns. Do not copy its source code, private/personal content, photographs, logos, or other protected assets. Build an original implementation using the owner's own identity and content.

---

# 1. Project Overview

Develop a professional personal portfolio website inspired by the reference website.

The website must function as a personal brand platform that showcases:
- Personal identity and professional profile
- Web development projects
- AI, Machine Learning, and NLP projects
- Technical skills
- Education and experience
- Blog articles or technical writing
- Professional contact information

The reference website must be treated as the primary design source for layout, page structure, navigation architecture, component patterns, and interaction behavior.

## Design fidelity objective

Target: High-fidelity reference-inspired implementation.

Closely study and reproduce the following design characteristics:
- Overall page composition
- Sidebar structure and behavior
- Navigation hierarchy
- Section ordering
- Content density
- Grid and card proportions
- Spacing and alignment
- Responsive layout behavior
- Interactive component behavior

The following must be different:
- Brand colors
- Typography
- Personal identity
- Text content
- Profile photographs
- Project images
- Logos and personal assets

---

# 2. Reference Analysis Requirements

Before implementation, the agent MUST inspect the reference website:

https://www.adityafakhri.id/

Use browser inspection and screenshots where available.

Inspect:
1. Homepage at desktop resolution
2. Homepage at tablet resolution
3. Homepage at mobile resolution
4. Sidebar expanded and collapsed, if available
5. Light and dark themes, if available
6. Indonesian and English language states, if available
7. Navigation interactions
8. Project cards
9. Blog cards
10. Footer and contact section
11. At least one representative subpage

Record findings in:

`docs/reference-analysis.md`

The document must include:
- Screenshots or visual references
- Page structure
- Sidebar dimensions and behavior
- Main content width
- Section spacing
- Typography hierarchy
- Card layout
- Responsive behavior
- Interaction observations
- Implementation notes

Do not guess important layout details when they can be inspected. If a page or interaction cannot be accessed, document the limitation and use a reasonable, clearly stated implementation decision.

---

# 3. Information Architecture

## 3.1 Global Layout

The website consists of:
- Persistent personal navigation sidebar
- Main content area
- Responsive mobile navigation
- Global theme controls, if present in the reference
- Language selector, if present in the reference
- Social links
- CV download link

The sidebar must follow the reference's visual structure and behavior as closely as practical.

## 3.2 Navigation Structure

Suggested navigation groups:

### Main
- Home
- About
- Contact

### Portfolio
- Projects & Portfolio
- Community
- Blog
- Testimonials

### Professional
- Experience
- Education
- Skills
- Links

Navigation groups and labels should be adapted to the owner's real content. Do not add empty pages merely to fill the navigation.

---

# 4. Homepage Requirements

The homepage must follow the reference's section order and visual composition. Confirm the exact order during reference inspection.

## Section 1 — Hero

Content:
- Personal name
- Professional title
- Short introduction
- Primary CTA: Contact
- Secondary CTA: View Projects
- Optional CTA: Download CV
- Personal statistics, only if verified
- Profile photograph

Suggested identity:

**Name:** Pramajaya  
**Professional title:** Informatika Student · Web Developer · AI/ML Enthusiast

Suggested description:

> I build modern digital products and explore the intersection of web development, artificial intelligence, and machine learning.

Use the owner's actual profile photograph when available. Do not invent professional achievements or statistics.

## Section 2 — Collaborations / Organizations

Display organizations, communities, or institutions the owner has genuinely collaborated with.

If there are insufficient verified collaborations, replace this section with:
- Technologies I Work With
- Learning & Community
- Featured Certifications

Do not invent company logos or professional partnerships.

## Section 3 — Activities / Community

Display relevant activities such as:
- University activities
- Workshops
- Competitions
- Community involvement
- Technical events

Use a visual card pattern based on the reference where appropriate.

## Section 4 — Skills

Organize skills into categories.

### Web Development
Next.js, React, TypeScript, JavaScript, Tailwind CSS

### AI & Machine Learning
Python, NLP, Machine Learning, Deep Learning

### Tools
Git, GitHub, PostgreSQL, Prisma

Only display technologies the owner can reasonably demonstrate.

## Section 5 — Featured Projects

Display selected projects in a card layout inspired by the reference.

Each project card should contain:
- Project thumbnail
- Project title
- Short description
- Technology stack
- Project category
- GitHub link
- Live demo link, when available

Potential projects:
- Luxury Villa Website
- Dwipa Store
- Academic Information Retrieval System
- NLP / Machine Learning Projects

Project information must be editable through a centralized data structure.

## Section 6 — Latest Blog

Display recent technical articles.

Each card:
- Thumbnail
- Title
- Short excerpt
- Publication date
- Category
- Read more link

If a blog CMS is not available, use local Markdown content or a static article data structure.

## Section 7 — Contact

Display:
- Short invitation to collaborate
- Email contact
- GitHub
- LinkedIn
- Other relevant social platforms

Include a clear CTA button.

---

# 5. Required Pages

## Home
Complete homepage with all major sections.

## About
Personal introduction, background, interests, goals, and professional journey.

## Projects
Full project portfolio with:
- Project listing
- Category filters
- Project detail pages
- Technology stack
- Problem statement
- Solution
- Results
- Repository and demo links

## Experience
Timeline of verified professional, internship, organizational, and project experiences.

## Education
Academic background and relevant achievements.

## Skills
Detailed skills grouped by category.

## Blog
Article listing and article detail pages.

## Contact
Contact information and social links.

Other pages such as Testimonials or Community may be added when sufficient content exists.

---

# 6. Design System

## 6.1 Color Palette

Use a calm, minimal palette.

Suggested initial palette:

| Token | Color |
|---|---|
| Background | `#F8F7F2` |
| Surface | `#FFFFFF` |
| Primary | `#527A61` |
| Primary Hover | `#42644F` |
| Text Primary | `#202820` |
| Text Secondary | `#6F776F` |
| Border | `#E5E7DF` |
| Accent | `#DDE8DA` |

These colors are provisional and must be implemented as design tokens. Adjust them after comparing the implementation with the reference.

## 6.2 Typography

Use a modern sans-serif font.

Suggested:
- Primary: Geist
- Alternative: Inter

Typography requirements:
- Clear heading hierarchy
- Comfortable body text
- Consistent line height
- Responsive font sizing
- No unnecessary decorative fonts

Typography must differ from the reference website.

## 6.3 Spacing

Use a consistent spacing scale:

`4, 8, 12, 16, 24, 32, 48, 64, 80 px`

The spacing scale must support accurate reproduction of the reference layout.

## 6.4 Components

Create reusable components:
- Sidebar
- NavigationGroup
- LanguageSwitcher, if required
- ThemeToggle, if required
- HeroSection
- StatCard
- ProjectCard
- BlogCard
- SkillGroup
- ActivityCard
- ContactSection
- Footer
- MobileNavigation

Do not create multiple visually inconsistent versions of the same component.

---

# 7. Functional Requirements

## Navigation
- All navigation links must work.
- Active page must be visually indicated.
- Sidebar must support expanded and collapsed states if the reference does.
- Mobile navigation must be usable on small screens.

## Theme
If the reference provides theme switching:
- Implement light and dark mode.
- Theme switch must update the entire website.
- Colors must use centralized design tokens.
- Theme preference should persist between sessions.

## Language
If the reference provides language switching:
- Support Indonesian and English.
- Language switch must change actual page content.
- Do not translate only the navigation labels.
- Use a centralized translation structure.

## Projects
- Project cards must link to valid destinations.
- Category filters must work.
- Project data must be centralized.

## Blog
- Blog cards must open article pages.
- Article metadata must be available.
- Empty blog states must be handled gracefully.

## Contact
- Email links must use valid `mailto:` destinations.
- Social links must open the correct profiles.
- No placeholder links in production.

## CV
- Download CV button must point to an actual PDF file.

---

# 8. Technical Requirements

Preferred stack:
- Next.js
- TypeScript
- Tailwind CSS
- shadcn/ui where appropriate
- Lucide icons
- React components

Use the existing project stack if a repository already exists.

Do not introduce a database unless dynamic content management actually requires one.

For the initial portfolio:
- Static project data is acceptable.
- Markdown-based blog content is acceptable.
- Static deployment is preferred.

The website should be compatible with Vercel deployment.

---

# 9. Responsive Requirements

Test at:
- Desktop: 1440px
- Laptop: 1280px
- Tablet: 768px
- Mobile: 390px
- Small mobile: 320px

Requirements:
- No horizontal overflow
- Navigation remains accessible
- Cards adapt to available width
- Images maintain appropriate aspect ratios
- Text remains readable
- Sidebar transforms appropriately on mobile
- Interactive elements have adequate touch targets

Responsive behavior must be based on the reference, not generic assumptions.

---

# 10. SEO & Accessibility

Requirements:
- Page-specific metadata
- Open Graph metadata
- Semantic HTML
- Proper heading hierarchy
- Descriptive image alt text
- Keyboard-accessible navigation
- Visible focus states
- Sufficient color contrast
- Optimized images
- Sitemap and robots.txt

---

# 11. Development Workflow

The agent must follow this sequence.

## Phase 1 — Research
- Inspect the reference website.
- Capture screenshots.
- Analyze the layout.
- Document page structure.
- Identify responsive behavior.
- Identify reusable components.

Deliverable: `docs/reference-analysis.md`

## Phase 2 — Planning
- Inspect the existing repository.
- Identify current framework and dependencies.
- Create implementation plan.
- Define component architecture.
- Define design tokens.
- Define page routes.

Deliverable: `docs/implementation-plan.md`

## Phase 3 — Design System
- Implement typography.
- Implement color tokens.
- Implement spacing.
- Implement sidebar.
- Implement shared components.

Deliverable: Working design system.

## Phase 4 — Homepage
Implement the homepage section by section.

After each section:
1. Compare with reference.
2. Inspect spacing.
3. Inspect typography.
4. Inspect image proportions.
5. Fix visual discrepancies.

## Phase 5 — Subpages
Implement required subpages using the same layout system.

## Phase 6 — Responsive
Test desktop, tablet, and mobile.

## Phase 7 — Quality Assurance
Run:
- Build
- Type checking
- Linting
- Link validation
- Responsive checks
- Accessibility checks

## Phase 8 — Deployment
Prepare the website for Vercel deployment.

Document environment variables if any are required.

---

# 12. Acceptance Criteria

The project is considered complete when:
- [ ] Reference analysis is documented.
- [ ] Homepage structure matches the reference closely.
- [ ] Sidebar behavior matches the reference.
- [ ] Navigation hierarchy is implemented.
- [ ] All required pages are available.
- [ ] Theme switch works, if included.
- [ ] Language switch works, if included.
- [ ] Project cards work.
- [ ] Blog navigation works.
- [ ] Contact links work.
- [ ] Responsive layout is tested.
- [ ] No broken links.
- [ ] No placeholder content remains.
- [ ] No fabricated achievements or collaborations.
- [ ] Build completes successfully.
- [ ] Website is ready for deployment.

---

# 13. Visual Quality Gate

The agent must not declare the project complete based only on successful compilation.

Use screenshot comparison.

Compare:
- Overall composition
- Sidebar width
- Main content position
- Hero height
- Section spacing
- Card dimensions
- Image proportions
- Typography hierarchy
- Responsive behavior

If the implementation looks generic or substantially different from the reference, continue refining it.

---

# 14. Final Deliverables

The agent must provide:
1. Fully implemented website
2. `docs/reference-analysis.md`
3. `docs/implementation-plan.md`
4. `docs/design-system.md`
5. Updated README
6. List of implemented routes
7. Testing report
8. Deployment instructions
9. List of missing owner-provided assets
10. Final screenshot comparison report

The final report must clearly state:
- What has been completed
- What remains incomplete
- What assets are still required
- Whether the website builds successfully
- Whether the website is ready for deployment

---

# 15. Important Agent Instructions

Do not start coding immediately.

First inspect the reference website and existing repository.

Do not replace the reference with a generic portfolio design.

Do not invent personal achievements, work experience, clients, testimonials, or statistics.

Do not use copied personal images, logos, or text from the reference website.

Do not change the project's architecture without explaining why.

Prioritize visual fidelity, maintainability, responsive behavior, and real content.

The final result should feel like a close structural and visual adaptation of the reference, but with an original personal identity and color system.

---

# 16. Main Prompt for AI Coding Agent

Use this prompt after saving this file as `PRD.md`:

> Read `PRD.md` completely before starting.
>
> Your task is to implement a high-fidelity personal portfolio website based on:
>
> https://www.adityafakhri.id/
>
> The reference website is the primary source of truth for layout, structure, navigation, component patterns, and interaction behavior.
>
> Important requirements:
>
> 1. Inspect the reference website before coding.
> 2. Inspect the existing repository before modifying files.
> 3. Create `docs/reference-analysis.md` with screenshots, observations, and layout measurements.
> 4. Create `docs/implementation-plan.md` before implementation.
> 5. Reproduce the reference layout and structure as closely as possible.
> 6. Change only the color palette, typography, personal identity, and original content.
> 7. Use the owner's real projects and information.
> 8. Do not invent achievements, clients, testimonials, or statistics.
> 9. Implement reusable components and centralized content data.
> 10. Test the website at desktop, tablet, and mobile resolutions.
> 11. Use screenshot comparison to identify and correct visual differences.
> 12. Do not stop after the first successful build.
>
> Work in milestones.
>
> After completing each milestone:
> - Explain what was implemented.
> - List files created or modified.
> - Run relevant checks.
> - Report any blockers.
> - Continue to the next milestone only after the current milestone meets its acceptance criteria.
>
> Start with research and planning. Do not begin full implementation until the reference analysis and implementation plan are complete.
>
> The final website must be visually close to the reference while remaining an original personal website owned by Pramajaya.

---

# 17. Suggested Repository Structure

```text
portfolio/
├── PRD.md
├── README.md
├── AGENTS.md
├── docs/
│   ├── reference-analysis.md
│   ├── implementation-plan.md
│   ├── design-system.md
│   ├── content-inventory.md
│   └── qa-report.md
├── public/
│   ├── images/
│   │   ├── profile/
│   │   ├── projects/
│   │   └── blog/
│   ├── documents/
│   │   └── cv.pdf
│   └── favicon.ico
└── src/
    ├── app/
    ├── components/
    │   ├── layout/
    │   ├── navigation/
    │   ├── sections/
    │   └── ui/
    ├── data/
    │   ├── projects.ts
    │   ├── skills.ts
    │   ├── experience.ts
    │   └── blog.ts
    ├── lib/
    └── styles/
```

---

# 18. Owner Assets Checklist

Prepare these assets before final content integration:

- [ ] Profile photograph
- [ ] Name and professional tagline
- [ ] CV PDF
- [ ] GitHub URL
- [ ] LinkedIn URL
- [ ] Email address
- [ ] Other social profile URLs
- [ ] Project thumbnails
- [ ] Project descriptions
- [ ] Technology stacks
- [ ] Education information
- [ ] Experience information
- [ ] Blog articles, if available
- [ ] Final font choice

If assets are missing, use clearly labeled temporary placeholders during development and record them in `docs/content-inventory.md`. Remove all placeholders before production deployment.
