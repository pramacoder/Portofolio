# Design System — Pramajaya Portfolio

> **Referensi visual**: [rig.ai](https://rig.ai/)
> **Warna**: Menggunakan palet yang sudah ada (hitam, aquamarine, putih)

---

## 1. Visual Language & Prinsip Desain

Desain mengadopsi **aesthetic "signal / technical blueprint"** — rasa seperti sebuah schematic, diagram teknis, atau blueprint arsitektur. Elemen utamanya adalah:

| Konsep | Deskripsi |
|--------|-----------|
| **Outline-first** | Komponen diberi border tipis (1–2px), bukan background solid tebal |
| **Grid lines** | Garis vertikal samar di background halaman untuk memberi kesan struktur |
| **Monospace labels** | Label kecil dengan font monospace + letter-spacing lebar, huruf kapital |
| **Chamfer / corner cut** | Sudut dipotong di tombol dan kartu tertentu (bukan border-radius penuh) |
| **Section dividers** | Garis horizontal tipis antar section, bukan whitespace kosong |
| **Numbered cards** | Setiap card/feature diberi nomor `001`, `002`, dst. di pojok atas kanan |
| **Blueprint decorations** | SVG geometry samar (lingkaran, garis silang) sebagai ornamen background |
| **Scanlines / noise** | Efek grain/noise halus di atas background untuk kedalaman tekstur |
| **Ticker / marquee** | Deretan teks pendek yang berjalan horizontal untuk key-points |
| **Watermark** | Teks atau logo besar dan transparan di background section |

---

## 2. Color Tokens

Gunakan CSS custom properties (atau Tailwind config) berikut:

```css
:root {
  /* Background */
  --color-ink:        #000000;       /* bg utama, paling gelap */
  --color-ink-alt:    #0a0a0a;       /* bg card, sedikit lebih terang */
  --color-surface:    #1A1A1A;       /* section alternating */
  --color-surface-2:  #111111;       /* dropdown, tooltip */

  /* Border / Lines */
  --color-border:     rgba(255,255,255,0.10);   /* border default */
  --color-border-md:  rgba(255,255,255,0.18);   /* border aktif/hover */
  --color-border-hi:  rgba(255,255,255,0.25);   /* border highlight */

  /* Text */
  --color-paper:      #FFFFFF;       /* teks utama */
  --color-paper-60:   rgba(255,255,255,0.60);  /* teks sekunder */
  --color-paper-40:   rgba(255,255,255,0.40);  /* label, hint */
  --color-paper-25:   rgba(255,255,255,0.25);  /* teks sangat redup */
  --color-muted:      #E5E5E5;       /* body text alternatif */

  /* Accent */
  --color-accent:     #7FFFD4;       /* aquamarine — CTA, highlight */
  --color-accent-dim: rgba(127,255,212,0.15);  /* glow, hover bg */
  --color-accent-20:  rgba(127,255,212,0.20);  /* badge bg */
  --color-accent-50:  rgba(127,255,212,0.50);  /* border active */
}
```

---

## 3. Typography

```
Font Stack:
  - Display / Heading  : "Instrument Sans", sans-serif  (bold, heavy)
  - Body               : "Inter", sans-serif
  - Monospace / Label  : "Chivo Mono", monospace  —— atau fallback: ui-monospace
```

### Skala Type

| Token | Size | Weight | Usage |
|-------|------|--------|-------|
| `display` | 4xl–8xl (clamp) | 800–900 | Hero headline |
| `h2` | 3xl–6xl | 700 | Section title |
| `h3` | xl–3xl | 600–700 | Card title |
| `body-lg` | lg–xl | 400 | Deskripsi section |
| `body` | base | 400 | Body teks umum |
| `mono-label` | 0.65–0.75rem | 700 | Badge, card number, ticker |
| `mono-body` | sm | 400–500 | Code snippets, stats |

### Aturan Typography

- **Mono labels** selalu UPPERCASE + `letter-spacing: 0.1–0.2em`
- Heading menggunakan `leading-none` atau `leading-tight` untuk kesan padat
- Body teks di `var(--color-muted)` atau `var(--color-paper-60)`, bukan pure white

---

## 4. Grid & Layout

### Breakpoints
```
sm:  640px
md:  768px
lg:  1024px
xl:  1280px
2xl: 1440px
```

### Container
```
max-width: 1280px
padding:   px-4 | sm:px-8 | lg:px-16 (24px | 32px | 64px)
```

### Content Lines (Background Grid)
Garis vertikal samar di seluruh halaman — diimplementasikan sebagai elemen fixed:

```css
.content-lines {
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  background-image:
    linear-gradient(to right, rgba(255,255,255,0.04) 1px, transparent 1px);
  background-size: 25% 100%;
}
```

### Section Grid Patterns

#### Pattern A — 3-Column Features (Services)
```
[ col 1/3 ]  [ col 2/3 ]  [ col 3/3 ]
Setiap kolom: border kiri tipis, padding kiri, tidak ada border radius besar.
```

#### Pattern B — Problem Cards (2+2 Grid)
```
[ Ilustrasi SVG ] | [ Card 001 ] [ Card 002 ]
                  | [ Card 003 ] [ Card 004 ]
Grid: grid-cols-[1fr_2fr] di desktop, grid-cols-1 di mobile.
```

#### Pattern C — Project List (Full-width rows)
```
[ border-top #7FFFD4 ]
[ Content ]       [ Image ]
[ border-top #7FFFD4 ]
[ Content ]       [ Image ]
Setiap project row dipisah oleh garis horizontal berwarna accent.
```

---

## 5. Component Patterns

### 5.1 Badge / Pill Label

Digunakan sebelum heading section untuk memberikan konteks kategori.

```
[ icon ]  KATEGORI
```

Style:
- `font-family: monospace`
- `font-size: 0.7rem`, `letter-spacing: 0.12em`, `text-transform: uppercase`
- `color: var(--color-accent)`
- `border: 1px solid var(--color-accent-50)`, `padding: 0.3rem 0.75rem`
- `border-radius: 0` — TIDAK ada radius (atau minimal 2px)

---

### 5.2 Numbered Feature Card

```
+----------------------------------+
|  LABEL MONO               001    |
|----------------------------------|
|  Judul card besar.               |
|                                  |
|  Deskripsi lebih ringan.         |
+----------------------------------+
```

Style:
- `border: 1px solid var(--color-border)`
- `padding: 1.5rem`
- `border-radius: 0` — sharp corner
- Header row: flex justify-between → label kiri, nomor kanan
- Hover: `border-color: var(--color-accent-50)`

---

### 5.3 Button — Chamfer Style

Tombol dengan sudut terpotong:

```css
.btn-chamfer {
  clip-path: polygon(0 0, 100% 0, 100% calc(100% - 10px), calc(100% - 10px) 100%, 0 100%);
}
```

Varian:

| Nama | Background | Text | Border |
|------|------------|------|--------|
| `btn-primary` | `#7FFFD4` | `#000` | none |
| `btn-outline` | transparent | `#7FFFD4` | `2px solid #7FFFD4` |
| `btn-ghost` | transparent | `#fff` | `1px solid rgba(255,255,255,0.15)` |

---

### 5.4 Section Divider

```html
<div class="section-divider"></div>
```

```css
.section-divider {
  width: 100%;
  height: 1px;
  background: rgba(255,255,255,0.10);
}
```

---

### 5.5 Ticker / Marquee

Strip horizontal berjalan di bawah Hero:

```
[ Website Developer ] · [ UI/UX Design ] · [ Laravel · Next.js ] · [ Responsive ] · ...
```

```css
.ticker-inner {
  display: flex;
  gap: 2rem;
  animation: marquee 20s linear infinite;
  white-space: nowrap;
}

@keyframes marquee {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}
```

---

### 5.6 Blueprint Decoration (SVG)

SVG geometric ringan sebagai dekorasi background section:

```svg
<svg viewBox="0 0 480 480" opacity="0.06" aria-hidden="true"
     style="position:absolute;inset:0;pointer-events:none">
  <circle cx="240" cy="240" r="220" stroke="#7FFFD4" stroke-width="0.5" fill="none"/>
  <circle cx="240" cy="240" r="160" stroke="#7FFFD4" stroke-width="0.5" fill="none"/>
  <circle cx="240" cy="240" r="100" stroke="#7FFFD4" stroke-width="0.5" fill="none"/>
  <line x1="240" y1="0" x2="240" y2="480" stroke="#7FFFD4" stroke-width="0.3"/>
  <line x1="0" y1="240" x2="480" y2="240" stroke="#7FFFD4" stroke-width="0.3"/>
  <line x1="70" y1="70" x2="410" y2="410" stroke="#7FFFD4" stroke-width="0.3"/>
  <line x1="410" y1="70" x2="70" y2="410" stroke="#7FFFD4" stroke-width="0.3"/>
</svg>
```

---

### 5.7 Outline Skill Card

```
+----------------------+
|                      |
|   [ icon ]           |
|                      |
|   Nama Skill         |
|   KATEGORI           |
+----------------------+
```

Style:
- `border: 1px solid rgba(255,255,255,0.10)`
- `background: #1A1A1A`
- `border-radius: 0` atau `4px`
- Hover: `border-color: rgba(127,255,212,0.50)`, transisi `0.2s`

---

### 5.8 Experience Card

```
+------------------------------------------+
| (accent left border 2px)                 |
|  Nama Posisi              April 2024     |
|  Nama Organisasi  <-- warna accent       |
|                                          |
|  Deskripsi singkat...                    |
+------------------------------------------+
```

- `border: 1px solid rgba(255,255,255,0.10)`
- `border-left: 2px solid #7FFFD4`
- `padding: 1.5rem`

---

## 6. Background & Texture Effects

### Noise / Grain

```css
.noise {
  position: fixed;
  inset: -50%;
  width: 200%;
  height: 200%;
  opacity: 0.025;
  pointer-events: none;
  z-index: 9999;
  /* background: SVG feTurbulence atau PNG grain */
}
```

### Scanlines (opsional, subtle)

```css
.scanlines {
  position: fixed;
  inset: 0;
  background: repeating-linear-gradient(
    to bottom,
    transparent, transparent 2px,
    rgba(0,0,0,0.03) 2px, rgba(0,0,0,0.03) 4px
  );
  pointer-events: none;
  z-index: 9998;
}
```

---

## 7. Micro-Animations & Interactions

| Elemen | Animasi |
|--------|---------|
| Card hover | `border-color` fade 200ms, optional `translateY(-2px)` |
| Button hover | `brightness(1.1)` atau outline shimmer |
| Link hover | `color` fade 200ms |
| Section fade-in | `opacity 0→1 + translateY 16px→0` saat masuk viewport |
| Ticker | `transform: translateX` loop |
| Hero decorasi | Very slow rotation (60s) atau pulse opacity |

```css
/* Fade-in on scroll — pakai IntersectionObserver */
.reveal {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.5s ease, transform 0.5s ease;
}
.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}
```

---

## 8. Per-Page Design Specifications

### 8.1 Home (`/`)

```
+---------------------------------------------------+
| HERO                                              |
| Background: foto + overlay #000/60%               |
| [ Pramajaya ] [ Website Developer ]  <- heading   |
| [ Portfolio btn ] [ Resume btn ]                  |
|                                                   |
| [-- Ticker marquee di bawah Hero --]              |
+---------------------------------------------------+
| DIVIDER                                           |
+---------------------------------------------------+
| SERVICES — 3 col                                  |
| [ Badge: SERVICES ]                               |
| How I Work                                        |
|                                                   |
| +----------+ +----------+ +----------+            |
| | 001      | | 002      | | 003      |            |
| | Custom   | |Responsive| | Perform. |            |
| +----------+ +----------+ +----------+            |
+---------------------------------------------------+
| DIVIDER                                           |
+---------------------------------------------------+
| TESTIMONIALS — 2 col                              |
| ***** "kutipan..."    ***** "kutipan..."           |
+---------------------------------------------------+
| DIVIDER                                           |
+---------------------------------------------------+
| RECENT WORK — full-width list                     |
| -- Viera Resort & Cafe --------------- [ img ]    |
| -- Redesain UI M-Paspor -------------- [ img ]    |
| -- DwipaFresh ------------------------ [ img ]    |
+---------------------------------------------------+
```

Perubahan dari desain lama:
- Tambah **Ticker** di bawah Hero
- Services section pakai **numbered cards** dengan outline border
- Sections dipisah oleh **section-divider** garis tipis

---

### 8.2 About (`/about`)

```
+---------------------------------------------------+
| HERO                                              |
| Background: foto + overlay                        |
| Digital Transformation  [tag][tag][tag]           |
+---------------------------------------------------+
| PROFILE — 2 col                                   |
| [ Foto + watermark teks "PRAMA JAYA" ]            |
| [ Bio text ]                                      |
+---------------------------------------------------+
| EXPERIENCE & EDUCATION — 2 col                    |
| [ Experience cards w/ accent left border ]        |
| [ Education cards                        ]        |
| <- blueprint circles decoration di bg             |
+---------------------------------------------------+
| SKILLS & TOOLS — 4-col grid                       |
| +----+ +----+ +----+ +----+                       |
| |icon| |icon| |icon| |icon| ...                   |
| |name| |name| |name| |name|                       |
| +----+ +----+ +----+ +----+                       |
+---------------------------------------------------+
| CTA — centered                                    |
| Let's Work Together  [ Get In Touch ]             |
+---------------------------------------------------+
```

---

### 8.3 Projects (`/projects`)

```
+---------------------------------------------------+
| HERO — "My Projects"                             |
| blueprint decoration dots di bg                  |
| [ Filter: All | Web | Mobile | Design ]           |
| <- filter buttons: outline style, chamfer         |
+---------------------------------------------------+
| PROJECTS GRID — 3-col                             |
| +--------------+ +--------------+ +------------+  |
| | [ image ]    | | [ image ]    | | [ image ]  |  |
| | WEB   2024   | | DESIGN 2024  | | WEB  2024  |  |
| | Nama Proyek  | | Nama Proyek  | | Nama       |  |
| | [tag][tag]   | | [tag][tag]   | | [tag]      |  |
| +--------------+ +--------------+ +------------+  |
+---------------------------------------------------+
| FEATURED PROJECT                                  |
| [ Image besar kiri ] [ Detail kanan ]             |
|                      [ FEATURED badge ]           |
|                      Nama Proyek                  |
|                      Deskripsi                    |
+---------------------------------------------------+
| CTA — "Have a Project in Mind?"                   |
| [ Let's Talk ]                                    |
+---------------------------------------------------+
```

Project Detail (saat card diklik):
```
[ <- Back to Projects ]
+--------------------------+  [ WEB ] [ 2024 ]
| Gallery / Image viewer   |  Nama Proyek Besar
| <- -> navigation arrows  |  Deskripsi
| [thumb][thumb]           |  [tag][tag]
+--------------------------+  [ View Live ] [ GitHub ]
```

---

### 8.4 Contact (`/contact`)

```
+---------------------------------------------------+
| HEADER — 2 col                                    |
| [ CONTACT label ]                                 |
| Get in touch             Email: ...               |
|                          Phone: ...               |
|                          Office: ...              |
|                          University: ...          |
+---------------------------------------------------+
| FORM + FOLLOW — 2 col                             |
| +---------------------+  +------------------+     |
| | Send a message      |  | Follow Me        |     |
| | [ Name field    ]   |  |                  |     |
| | [ Email field   ]   |  | [ig][li][gh]     |     |
| | [ Subject field ]   |  | [fb][wa][tg]     |     |
| | [ Message area  ]   |  |                  |     |
| | [ Send Message  ]   |  |                  |     |
| +---------------------+  +------------------+     |
+---------------------------------------------------+
| MAP — full width                                  |
| [ Google Maps embed - Udayana Informatics ]       |
+---------------------------------------------------+
```

Form field style:
```css
input, textarea {
  background: transparent;
  border: 1px solid rgba(255,255,255,0.18);  /* outline tipis */
  border-radius: 0;                          /* no radius */
  color: #E5E5E5;
  padding: 0.75rem 1rem;
}
input:focus, textarea:focus {
  border-color: #7FFFD4;
  outline: none;
}
```

---

## 9. Navbar & Footer

### Navbar

```
[ Monk / Logo ]  [ PORTFOLIO ] [ WORK ] [ ABOUT ] [ MORE v ]   [ Hire me! ]
```

Style mengikuti rig.ai:
- Background: `bg-black/95 backdrop-blur`
- Border bawah: `1px solid rgba(255,255,255,0.10)`
- Nav links: `font-family: monospace`, `font-size: 0.75rem`, `letter-spacing: 0.05em`, `UPPERCASE`
- CTA "Hire me!": chamfer style atau `rounded-full bg-[#7FFFD4]`
- Sticky di atas, `z-50`

### Footer

```
+-------------------------------------------+
| [ Brand/desc ]  [ Explore ] [ Follow ]    |
|                 [ Links   ] [ Social ]    |
+-------------------------------------------+
| border-top tipis                          |
| Pramajaya      (c) 2025 All rights        |
|                [bullet] Status dot blink  |
+-------------------------------------------+
```

Footer style:
- Background: `#0a0a0a`
- Grid: `grid-template-columns: 2fr 1fr 1fr` di desktop
- Status dot: `w-2 h-2 bg-[#7FFFD4]` dengan `animation: blink 1.5s step-end infinite`
- Footer watermark: nama besar transparan di kanan bawah

---

## 10. Urutan Implementasi

```
[ ] 1. Update globals.css — CSS tokens, noise, scanlines, content-lines
[ ] 2. Update layout.tsx — tambah noise/scanlines div di body
[ ] 3. Redesign Navbar.tsx — mono font labels, chamfer CTA button
[ ] 4. Redesign Footer.tsx — grid layout + status dot + watermark
[ ] 5. Home page.tsx — Ticker marquee, numbered service cards, section dividers
[ ] 6. About page.tsx — blueprint decoration SVG, experience card accent border
[ ] 7. Projects page.tsx — chamfer filter buttons, numbered grid cards
[ ] 8. Contact page.tsx — zero-radius outline-only form fields
[ ] 9. Polish — reveal-on-scroll animations, micro-interactions
```

---

## 11. Tailwind Config Additions

```js
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      fontFamily: {
        sans:    ['Inter', 'sans-serif'],
        display: ['Instrument Sans', 'sans-serif'],
        mono:    ['Chivo Mono', 'ui-monospace', 'monospace'],
      },
      colors: {
        ink:     '#000000',
        'ink-alt': '#0a0a0a',
        accent:  '#7FFFD4',
        muted:   '#E5E5E5',
        surface: '#1A1A1A',
      },
      keyframes: {
        marquee: {
          '0%':   { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' },
        },
        blink: {
          '0%, 100%': { opacity: '1' },
          '50%':      { opacity: '0' },
        },
      },
      animation: {
        marquee: 'marquee 25s linear infinite',
        blink:   'blink 1.5s step-end infinite',
      },
    },
  },
};
```

---

*Design document dibuat berdasarkan referensi visual rig.ai — mengambil konsep outline, grid, monospace labeling, chamfer aesthetics, ticker, blueprint decorations, dan section dividers. Disesuaikan dengan palet warna portofolio Pramajaya (hitam, aquamarine #7FFFD4, putih).*
