"use client";

import Link from "next/link";

const TICKER_ITEMS = [
  "Website Developer",
  "UI/UX Design",
  "Laravel · Next.js",
  "Responsive Design",
  "Clean Code",
  "Fast Performance",
  "Open for Work",
  "Udayana University",
];

const SERVICES = [
  {
    num: "001",
    label: "Custom Design",
    title: "Custom web design",
    desc: "Sites built from scratch, tailored to your vision and your users.",
  },
  {
    num: "002",
    label: "Responsive Dev",
    title: "Responsive development",
    desc: "Your site works everywhere, on any screen, at any size.",
  },
  {
    num: "003",
    label: "Performance",
    title: "Performance first",
    desc: "Fast loading times and smooth interactions keep users engaged.",
  },
];

const TESTIMONIALS = [
  {
    quote: '"I am his university friend, and I see that Prama is a reliable person to work with."',
    name: "Mario",
    role: "Owner of Viera Resort",
    ig: "@_alxtethool",
  },
  {
    quote: '"I am a colleague of his, he works professionally."',
    name: "Andika",
    role: "Udayana Informatics",
    ig: "@andika_arsana",
  },
];

const RECENT_PROJECTS = [
  {
    title: "Viera Resort & Cafe",
    desc: "Simple landing page for a resort in Nguarbloat, Kei Kecil.",
    tags: ["Resort", "Laravel"],
    image: "/images/portfolio/projects/Viera.png",
  },
  {
    title: "Redesain UI M-Paspor",
    desc: "Redesigned M-Passport UI based on a user-centred approach.",
    tags: ["Figma", "UI/UX"],
    image: "/images/portfolio/projects/Pasporid.png",
  },
  {
    title: "DwipaFresh E-Commerce",
    desc: "Implementing grocery store sales system online through e-commerce.",
    tags: ["Next.js", "Figma"],
    image: "/images/portfolio/projects/logodwipafresh.jpeg",
  },
];

export default function Home() {
  const tickerItems = [...TICKER_ITEMS, ...TICKER_ITEMS]; // duplicate for seamless loop

  return (
    <div className="w-full">

      {/* ═══ HERO ════════════════════════════════════════ */}
      <section
        className="relative flex flex-col justify-end overflow-hidden"
        style={{ minHeight: "92vh" }}
      >
        {/* Background image */}
        <div
          className="absolute inset-0 z-0"
          style={{
            backgroundImage: "url('/images/portfolio/hero/Homepage.jpeg')",
            backgroundSize: "cover",
            backgroundPosition: "center",
          }}
        />
        {/* Overlay gradient */}
        <div className="absolute inset-0 z-0" style={{ background: "linear-gradient(to bottom, rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.75) 70%, rgba(0,0,0,1) 100%)" }} />

        {/* Blueprint decoration */}
        <svg
          viewBox="0 0 480 480"
          className="absolute right-0 top-0 w-[40vw] max-w-[560px] opacity-[0.06] z-0 pointer-events-none"
          aria-hidden="true"
        >
          <circle cx="240" cy="240" r="220" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="240" cy="240" r="160" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="240" cy="240" r="100" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="240" cy="240" r="50" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <line x1="240" y1="0" x2="240" y2="480" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="0" y1="240" x2="480" y2="240" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="70" y1="70" x2="410" y2="410" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="410" y1="70" x2="70" y2="410" stroke="#7FFFD4" strokeWidth="0.3"/>
          {/* Corner ticks */}
          <polyline points="40,70 40,40 70,40" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
          <polyline points="410,40 440,40 440,70" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
          <polyline points="440,410 440,440 410,440" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
          <polyline points="70,440 40,440 40,410" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
        </svg>

        {/* Hero content */}
        <div className="relative z-10 px-6 sm:px-10 lg:px-16 pb-16 pt-32" style={{ maxWidth: '1280px', margin: '0 auto', width: '100%' }}>
          <div className="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-10">
            {/* Left */}
            <div className="flex flex-col gap-8">
              {/* Badge */}
              <div className="badge" style={{ alignSelf: 'flex-start' }}>
                <span style={{ width: 6, height: 6, background: '#7FFFD4', display: 'inline-block' }} />
                Website Developer · Bali, Indonesia
              </div>

              {/* Heading */}
              <h1 style={{ fontSize: 'clamp(3rem, 9vw, 7rem)', fontWeight: 900, lineHeight: 1.0, letterSpacing: '-0.02em', fontFamily: 'var(--font-instrument-sans), sans-serif', margin: 0 }}>
                <span style={{ color: '#fff' }}>Pramajaya</span>
                <br />
                <span style={{ color: '#7FFFD4' }}>Website</span>
                <br />
                <span style={{ color: '#7FFFD4' }}>Developer</span>
              </h1>

              {/* CTA buttons */}
              <div className="flex flex-wrap gap-4">
                <Link href="/projects" className="btn-chamfer btn-primary">
                  View Portfolio
                </Link>
                <Link href="/contact" className="btn-chamfer btn-ghost">
                  Hire me
                </Link>
              </div>
            </div>

            {/* Right — quote */}
            <div style={{ maxWidth: '380px' }}>
              <p style={{ color: 'rgba(127,255,212,0.75)', fontSize: '1.05rem', lineHeight: 1.7, fontStyle: 'italic' }}>
                "Clean design meets purposeful code. Every site we create tells a story worth telling."
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* ═══ TICKER ══════════════════════════════════════ */}
      <div className="ticker-wrap">
        <div className="ticker-inner" aria-hidden="true">
          {tickerItems.map((item, i) => (
            <span key={i} className="ticker-item">
              <span className="ticker-dot" />
              {item}
            </span>
          ))}
        </div>
      </div>

      {/* ═══ SECTION DIVIDER ═════════════════════════════ */}
      <div className="section-divider" />

      {/* ═══ SERVICES ════════════════════════════════════ */}
      <section id="services" style={{ background: '#000', padding: '6rem 0' }}>
        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem' }}>
          {/* Header */}
          <div style={{ maxWidth: '640px', marginBottom: '4rem' }}>
            <div className="badge" style={{ marginBottom: '1.5rem' }}>
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/><rect x="0" y="0" width="2" height="2" fill="#7FFFD4" opacity="0.5"/><rect x="8" y="0" width="2" height="2" fill="#7FFFD4" opacity="0.5"/><rect x="0" y="8" width="2" height="2" fill="#7FFFD4" opacity="0.5"/><rect x="8" y="8" width="2" height="2" fill="#7FFFD4" opacity="0.5"/></svg>
              Services
            </div>
            <h2 style={{ fontSize: 'clamp(2rem, 5vw, 3.5rem)', fontWeight: 800, color: '#7FFFD4', lineHeight: 1.1, margin: 0 }}>
              How I Work
            </h2>
            <p style={{ color: 'rgba(255,255,255,0.55)', fontSize: '1.1rem', marginTop: '1rem', lineHeight: 1.7 }}>
              We focus on the fundamentals. Good design is invisible until it isn't there.
            </p>
          </div>

          {/* Numbered cards */}
          <div className="grid grid-cols-1 md:grid-cols-3" style={{ border: '1px solid rgba(255,255,255,0.10)' }}>
            {SERVICES.map(({ num, label, title, desc }, i) => (
              <div
                key={num}
                className="numbered-card"
                style={{
                  borderLeft: i > 0 ? '1px solid rgba(255,255,255,0.10)' : undefined,
                  borderRight: 'none', borderTop: 'none', borderBottom: 'none',
                  ...(i === 0 ? { border: 'none' } : { border: 'none', borderLeft: '1px solid rgba(255,255,255,0.10)' })
                }}
              >
                <div className="numbered-card-header">
                  <span className="numbered-card-label">{label}</span>
                  <span className="numbered-card-number">{num}</span>
                </div>
                <h3 style={{ color: '#fff', fontSize: '1.4rem', fontWeight: 700, marginBottom: '0.75rem', lineHeight: 1.3 }}>
                  {title}
                </h3>
                <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '0.95rem', lineHeight: 1.7, margin: 0 }}>
                  {desc}
                </p>
              </div>
            ))}
          </div>

          {/* Actions */}
          <div className="flex flex-wrap gap-6 mt-12">
            <Link href="/projects" className="btn-chamfer btn-outline">
              Explore Work
            </Link>
            <Link href="/about" style={{ display: 'inline-flex', alignItems: 'center', gap: '0.5rem', color: '#7FFFD4', fontFamily: "'Chivo Mono', monospace", fontSize: '0.7rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', textDecoration: 'none' }}>
              Learn More
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="#7FFFD4" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
            </Link>
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ HOW I BUILD ═════════════════════════════════ */}
      <section style={{ background: '#0a0a0a', padding: '6rem 0', position: 'relative', overflow: 'hidden' }}>
        {/* Blueprint decoration — corner ticks */}
        <svg viewBox="0 0 560 280" style={{ position: 'absolute', left: '50%', top: '50%', transform: 'translate(-50%,-50%)', width: '100%', maxWidth: '900px', opacity: 0.04, pointerEvents: 'none' }} aria-hidden="true">
          <rect x="4" y="4" width="552" height="272" stroke="#7FFFD4" strokeWidth="0.5" fill="none" strokeDasharray="4 6"/>
          <polyline points="4,30 4,4 30,4" fill="none" stroke="#7FFFD4" strokeWidth="1"/>
          <polyline points="530,4 556,4 556,30" fill="none" stroke="#7FFFD4" strokeWidth="1"/>
          <polyline points="556,250 556,276 530,276" fill="none" stroke="#7FFFD4" strokeWidth="1"/>
          <polyline points="30,276 4,276 4,250" fill="none" stroke="#7FFFD4" strokeWidth="1"/>
          <line x1="140" y1="4" x2="140" y2="276" stroke="#7FFFD4" strokeWidth="0.3" strokeDasharray="2 8"/>
          <line x1="280" y1="4" x2="280" y2="276" stroke="#7FFFD4" strokeWidth="0.3" strokeDasharray="2 8"/>
          <line x1="420" y1="4" x2="420" y2="276" stroke="#7FFFD4" strokeWidth="0.3" strokeDasharray="2 8"/>
        </svg>

        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem', position: 'relative', zIndex: 1 }}>
          {/* Header */}
          <div style={{ maxWidth: '640px', marginBottom: '4rem' }}>
            <div className="badge" style={{ marginBottom: '1.5rem' }}>
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none">
                <rect x="0" y="4" width="2" height="2" fill="#7FFFD4"/>
                <rect x="4" y="4" width="2" height="2" fill="#7FFFD4"/>
                <rect x="8" y="4" width="2" height="2" fill="#7FFFD4"/>
                <rect x="2" y="2" width="2" height="2" fill="#7FFFD4" opacity="0.4"/>
                <rect x="6" y="2" width="2" height="2" fill="#7FFFD4" opacity="0.4"/>
              </svg>
              Process
            </div>
            <h2 style={{ fontSize: 'clamp(2rem, 5vw, 3.5rem)', fontWeight: 800, color: '#7FFFD4', lineHeight: 1.1, margin: 0 }}>
              How I build
            </h2>
            <p style={{ color: 'rgba(255,255,255,0.45)', fontSize: '1rem', lineHeight: 1.75, marginTop: '1rem' }}>
              Every project follows the same disciplined path — from first conversation to final deployment.
            </p>
          </div>

          {/* Flow diagram — 4 steps */}
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(4, 1fr)', gap: '0', border: '1px solid rgba(255,255,255,0.10)' }} className="process-grid">

            {/* Step 01 — Understanding */}
            <div style={{ padding: '2rem', borderRight: '1px solid rgba(255,255,255,0.10)', position: 'relative' }}>
              {/* Connector arrow (desktop only) */}
              <div className="process-arrow" style={{ position: 'absolute', right: '-13px', top: '50%', transform: 'translateY(-50%)', zIndex: 2 }}>
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                  <rect x="1" y="1" width="24" height="24" fill="#0a0a0a" stroke="rgba(127,255,212,0.3)" strokeWidth="1"/>
                  <path d="M8 13h10M14 9l4 4-4 4" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round"/>
                </svg>
              </div>
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: '1.5rem' }}>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.15em', textTransform: 'uppercase', color: '#7FFFD4' }}>Understanding</span>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.1em', color: 'rgba(255,255,255,0.20)' }}>01</span>
              </div>
              {/* Icon */}
              <div style={{ marginBottom: '1.25rem' }}>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <rect x="4" y="4" width="24" height="24" rx="0" stroke="rgba(127,255,212,0.5)" strokeWidth="1"/>
                  <circle cx="16" cy="14" r="4" stroke="#7FFFD4" strokeWidth="1.2" fill="none"/>
                  <path d="M10 24c0-3.3 2.7-6 6-6s6 2.7 6 6" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round" fill="none"/>
                  <line x1="4" y1="4" x2="8" y2="8" stroke="rgba(127,255,212,0.3)" strokeWidth="0.5"/>
                  <line x1="28" y1="4" x2="24" y2="8" stroke="rgba(127,255,212,0.3)" strokeWidth="0.5"/>
                </svg>
              </div>
              <h3 style={{ color: '#fff', fontSize: '1.15rem', fontWeight: 700, marginBottom: '0.75rem', lineHeight: 1.3 }}>
                Listen & discover
              </h3>
              <p style={{ color: 'rgba(255,255,255,0.45)', fontSize: '0.875rem', lineHeight: 1.75, margin: 0 }}>
                I start by understanding your goals, target audience, and constraints. No assumptions — only the right questions to build a solid foundation.
              </p>
              <ul style={{ marginTop: '1.25rem', paddingLeft: 0, listStyle: 'none', display: 'flex', flexDirection: 'column', gap: '0.4rem' }}>
                {['Goal mapping', 'Audience research', 'Requirement gathering'].map(item => (
                  <li key={item} style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', color: 'rgba(255,255,255,0.35)', fontSize: '0.8rem', fontFamily: "'Chivo Mono', monospace", letterSpacing: '0.05em' }}>
                    <span style={{ width: 4, height: 4, background: 'rgba(127,255,212,0.6)', flexShrink: 0, display: 'inline-block' }}/>
                    {item}
                  </li>
                ))}
              </ul>
            </div>

            {/* Step 02 — Design */}
            <div style={{ padding: '2rem', borderRight: '1px solid rgba(255,255,255,0.10)', position: 'relative', background: 'rgba(127,255,212,0.02)' }}>
              <div className="process-arrow" style={{ position: 'absolute', right: '-13px', top: '50%', transform: 'translateY(-50%)', zIndex: 2 }}>
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                  <rect x="1" y="1" width="24" height="24" fill="rgba(10,10,10,0.95)" stroke="rgba(127,255,212,0.3)" strokeWidth="1"/>
                  <path d="M8 13h10M14 9l4 4-4 4" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round"/>
                </svg>
              </div>
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: '1.5rem' }}>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.15em', textTransform: 'uppercase', color: '#7FFFD4' }}>Design</span>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.1em', color: 'rgba(255,255,255,0.20)' }}>02</span>
              </div>
              <div style={{ marginBottom: '1.25rem' }}>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <rect x="4" y="4" width="24" height="24" rx="0" stroke="rgba(127,255,212,0.5)" strokeWidth="1"/>
                  <rect x="9" y="9" width="6" height="6" stroke="#7FFFD4" strokeWidth="1" fill="none"/>
                  <rect x="17" y="9" width="6" height="6" stroke="#7FFFD4" strokeWidth="1" fill="none"/>
                  <rect x="9" y="17" width="6" height="6" stroke="#7FFFD4" strokeWidth="1" fill="none"/>
                  <rect x="17" y="17" width="6" height="6" stroke="#7FFFD4" strokeWidth="1" fill="rgba(127,255,212,0.15)"/>
                </svg>
              </div>
              <h3 style={{ color: '#fff', fontSize: '1.15rem', fontWeight: 700, marginBottom: '0.75rem', lineHeight: 1.3 }}>
                Wireframe & prototype
              </h3>
              <p style={{ color: 'rgba(255,255,255,0.45)', fontSize: '0.875rem', lineHeight: 1.75, margin: 0 }}>
                Translating ideas into visual structure. I design layouts, colour systems, and interaction flows in Figma before a single line of code is written.
              </p>
              <ul style={{ marginTop: '1.25rem', paddingLeft: 0, listStyle: 'none', display: 'flex', flexDirection: 'column', gap: '0.4rem' }}>
                {['Wireframing', 'UI system design', 'Figma prototype'].map(item => (
                  <li key={item} style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', color: 'rgba(255,255,255,0.35)', fontSize: '0.8rem', fontFamily: "'Chivo Mono', monospace", letterSpacing: '0.05em' }}>
                    <span style={{ width: 4, height: 4, background: 'rgba(127,255,212,0.6)', flexShrink: 0, display: 'inline-block' }}/>
                    {item}
                  </li>
                ))}
              </ul>
            </div>

            {/* Step 03 — Code */}
            <div style={{ padding: '2rem', borderRight: '1px solid rgba(255,255,255,0.10)', position: 'relative' }}>
              <div className="process-arrow" style={{ position: 'absolute', right: '-13px', top: '50%', transform: 'translateY(-50%)', zIndex: 2 }}>
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                  <rect x="1" y="1" width="24" height="24" fill="#0a0a0a" stroke="rgba(127,255,212,0.3)" strokeWidth="1"/>
                  <path d="M8 13h10M14 9l4 4-4 4" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round"/>
                </svg>
              </div>
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: '1.5rem' }}>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.15em', textTransform: 'uppercase', color: '#7FFFD4' }}>Code</span>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.1em', color: 'rgba(255,255,255,0.20)' }}>03</span>
              </div>
              <div style={{ marginBottom: '1.25rem' }}>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <rect x="4" y="4" width="24" height="24" rx="0" stroke="rgba(127,255,212,0.5)" strokeWidth="1"/>
                  <path d="M11 12l-4 4 4 4" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round"/>
                  <path d="M21 12l4 4-4 4" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round"/>
                  <line x1="17" y1="10" x2="15" y2="22" stroke="rgba(127,255,212,0.6)" strokeWidth="1" strokeLinecap="round"/>
                </svg>
              </div>
              <h3 style={{ color: '#fff', fontSize: '1.15rem', fontWeight: 700, marginBottom: '0.75rem', lineHeight: 1.3 }}>
                Build with precision
              </h3>
              <p style={{ color: 'rgba(255,255,255,0.45)', fontSize: '0.875rem', lineHeight: 1.75, margin: 0 }}>
                Clean, maintainable code using modern stacks — Laravel, Next.js, TypeScript. Responsive by default, accessible by design, fast by engineering.
              </p>
              <ul style={{ marginTop: '1.25rem', paddingLeft: 0, listStyle: 'none', display: 'flex', flexDirection: 'column', gap: '0.4rem' }}>
                {['Next.js / Laravel', 'Responsive & a11y', 'Clean architecture'].map(item => (
                  <li key={item} style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', color: 'rgba(255,255,255,0.35)', fontSize: '0.8rem', fontFamily: "'Chivo Mono', monospace", letterSpacing: '0.05em' }}>
                    <span style={{ width: 4, height: 4, background: 'rgba(127,255,212,0.6)', flexShrink: 0, display: 'inline-block' }}/>
                    {item}
                  </li>
                ))}
              </ul>
            </div>

            {/* Step 04 — Deploy */}
            <div style={{ padding: '2rem', position: 'relative', background: 'rgba(127,255,212,0.02)' }}>
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: '1.5rem' }}>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.15em', textTransform: 'uppercase', color: '#7FFFD4' }}>Deploy</span>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.1em', color: 'rgba(255,255,255,0.20)' }}>04</span>
              </div>
              <div style={{ marginBottom: '1.25rem' }}>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <rect x="4" y="4" width="24" height="24" rx="0" stroke="rgba(127,255,212,0.5)" strokeWidth="1"/>
                  <path d="M16 22V14" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round"/>
                  <path d="M12 17l4-4 4 4" stroke="#7FFFD4" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round"/>
                  <line x1="9" y1="23" x2="23" y2="23" stroke="rgba(127,255,212,0.5)" strokeWidth="1" strokeLinecap="round"/>
                  <circle cx="16" cy="10" r="1.5" fill="#7FFFD4" opacity="0.6"/>
                </svg>
              </div>
              <h3 style={{ color: '#fff', fontSize: '1.15rem', fontWeight: 700, marginBottom: '0.75rem', lineHeight: 1.3 }}>
                Ship & support
              </h3>
              <p style={{ color: 'rgba(255,255,255,0.45)', fontSize: '0.875rem', lineHeight: 1.75, margin: 0 }}>
                Launch to production with confidence. I handle domain setup, hosting configuration, and stay available for post-launch questions and improvements.
              </p>
              <ul style={{ marginTop: '1.25rem', paddingLeft: 0, listStyle: 'none', display: 'flex', flexDirection: 'column', gap: '0.4rem' }}>
                {['Vercel / server deploy', 'Domain & DNS setup', 'Post-launch support'].map(item => (
                  <li key={item} style={{ display: 'flex', alignItems: 'center', gap: '0.5rem', color: 'rgba(255,255,255,0.35)', fontSize: '0.8rem', fontFamily: "'Chivo Mono', monospace", letterSpacing: '0.05em' }}>
                    <span style={{ width: 4, height: 4, background: 'rgba(127,255,212,0.6)', flexShrink: 0, display: 'inline-block' }}/>
                    {item}
                  </li>
                ))}
              </ul>
              {/* Live indicator */}
              <div style={{ display: 'inline-flex', alignItems: 'center', gap: '0.5rem', marginTop: '1.5rem', padding: '0.4rem 0.9rem', border: '1px solid rgba(127,255,212,0.25)', background: 'rgba(127,255,212,0.06)' }}>
                <span className="status-dot" style={{ background: '#7FFFD4' }}/>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.6rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'rgba(127,255,212,0.8)' }}>Live & running</span>
              </div>
            </div>
          </div>

          {/* Mobile: responsive grid override */}
          <style>{`
            @media (max-width: 767px) {
              .process-grid {
                grid-template-columns: 1fr !important;
              }
              .process-grid > div {
                border-right: none !important;
                border-bottom: 1px solid rgba(255,255,255,0.10) !important;
              }
              .process-arrow {
                display: none !important;
              }
            }
            @media (min-width: 768px) and (max-width: 1023px) {
              .process-grid {
                grid-template-columns: 1fr 1fr !important;
              }
              .process-grid > div:nth-child(2) {
                border-right: none !important;
              }
              .process-grid > div:nth-child(3) {
                border-top: 1px solid rgba(255,255,255,0.10) !important;
              }
              .process-arrow:nth-child(2), .process-arrow:last-child {
                display: none !important;
              }
            }
          `}</style>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ TESTIMONIALS ════════════════════════════════ */}

      <section style={{ background: '#0a0a0a', padding: '6rem 0', position: 'relative', overflow: 'hidden' }}>
        {/* Blueprint BG */}
        <svg viewBox="0 0 300 300" className="absolute left-0 top-0 h-full opacity-[0.04] pointer-events-none" aria-hidden="true" style={{ fill: 'none' }}>
          <circle cx="150" cy="150" r="140" stroke="#7FFFD4" strokeWidth="0.5"/>
          <circle cx="150" cy="150" r="90" stroke="#7FFFD4" strokeWidth="0.5"/>
          <circle cx="150" cy="150" r="40" stroke="#7FFFD4" strokeWidth="0.5"/>
          <line x1="150" y1="10" x2="150" y2="290" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="10" y1="150" x2="290" y2="150" stroke="#7FFFD4" strokeWidth="0.3"/>
        </svg>

        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem', position: 'relative', zIndex: 1 }}>
          {/* Header */}
          <div style={{ marginBottom: '4rem' }}>
            <div className="badge" style={{ marginBottom: '1.5rem' }}>
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/><rect x="0" y="0" width="2" height="2" fill="#7FFFD4" opacity="0.5"/></svg>
              Testimonials
            </div>
            <h2 style={{ fontSize: 'clamp(2rem, 5vw, 3.5rem)', fontWeight: 800, color: '#7FFFD4', lineHeight: 1.1, margin: 0 }}>
              What clients say
            </h2>
          </div>

          {/* Cards */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-0" style={{ border: '1px solid rgba(255,255,255,0.10)' }}>
            {TESTIMONIALS.map((t, i) => (
              <div
                key={i}
                style={{
                  padding: '2.5rem',
                  borderLeft: i > 0 ? '1px solid rgba(255,255,255,0.10)' : undefined,
                }}
              >
                {/* Stars */}
                <div style={{ display: 'flex', gap: '4px', marginBottom: '1.5rem' }}>
                  {[1,2,3,4,5].map(s => (
                    <span key={s} style={{ color: '#7FFFD4', fontSize: '1rem' }}>★</span>
                  ))}
                </div>
                {/* Quote */}
                <p style={{ color: '#fff', fontSize: '1.15rem', fontWeight: 700, lineHeight: 1.6, marginBottom: '2rem' }}>
                  {t.quote}
                </p>
                {/* Author */}
                <div style={{ display: 'flex', alignItems: 'center', gap: '1rem' }}>
                  <div style={{ width: 44, height: 44, background: 'rgba(127,255,212,0.15)', border: '1px solid rgba(127,255,212,0.3)', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                    <span style={{ color: '#7FFFD4', fontWeight: 700, fontSize: '1rem' }}>{t.name[0]}</span>
                  </div>
                  <div>
                    <div style={{ color: '#fff', fontWeight: 600, fontSize: '0.95rem' }}>{t.name}</div>
                    <div style={{ color: 'rgba(255,255,255,0.45)', fontSize: '0.8rem' }}>{t.role}</div>
                    <div style={{ color: 'rgba(127,255,212,0.7)', fontSize: '0.75rem', fontFamily: "'Chivo Mono', monospace" }}>{t.ig}</div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ RECENT WORK ═════════════════════════════════ */}
      <section style={{ background: '#000', padding: '6rem 0' }}>
        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem' }}>
          {/* Header */}
          <div style={{ marginBottom: '4rem', display: 'flex', justifyContent: 'space-between', alignItems: 'flex-end', flexWrap: 'wrap', gap: '1.5rem' }}>
            <div>
              <div className="badge" style={{ marginBottom: '1.5rem' }}>
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
                Portfolio
              </div>
              <h2 style={{ fontSize: 'clamp(2rem, 5vw, 3.5rem)', fontWeight: 800, color: '#7FFFD4', lineHeight: 1.1, margin: 0 }}>
                Recent work
              </h2>
            </div>
            <div style={{ display: 'flex', gap: '1rem', alignItems: 'center', flexWrap: 'wrap' }}>
              <a 
                href="https://github.com/pramacoder" 
                target="_blank" 
                rel="noopener noreferrer" 
                className="btn-chamfer btn-outline"
                style={{ textDecoration: 'none' }}
              >
                View Project on GitHub
              </a>
              <Link href="/projects" className="btn-chamfer btn-ghost" style={{ flexShrink: 0 }}>
                View all
              </Link>
            </div>
          </div>

          {/* Project list */}
          <div>
            {RECENT_PROJECTS.map((project, i) => (
              <div
                key={i}
                style={{
                  borderTop: '1px solid rgba(127,255,212,0.3)',
                  padding: '2.5rem 0',
                  display: 'grid',
                  gridTemplateColumns: '1fr auto',
                  gap: '2rem',
                  alignItems: 'center',
                }}
                className="project-row"
              >
                {/* Content */}
                <div>
                  {/* Number + tags */}
                  <div style={{ display: 'flex', alignItems: 'center', gap: '1rem', marginBottom: '0.75rem' }}>
                    <span className="mono-label" style={{ color: 'rgba(255,255,255,0.25)' }}>
                      {String(i + 1).padStart(2, '0')}
                    </span>
                    {project.tags.map(tag => (
                      <span key={tag} style={{
                        padding: '2px 10px',
                        border: '1px solid rgba(255,255,255,0.15)',
                        fontFamily: "'Chivo Mono', monospace",
                        fontSize: '0.62rem',
                        fontWeight: 700,
                        letterSpacing: '0.1em',
                        textTransform: 'uppercase',
                        color: 'rgba(255,255,255,0.45)',
                      }}>
                        {tag}
                      </span>
                    ))}
                  </div>
                  <h3 style={{ color: '#fff', fontSize: 'clamp(1.25rem, 3vw, 2rem)', fontWeight: 700, marginBottom: '0.5rem', lineHeight: 1.2 }}>
                    {project.title}
                  </h3>
                  <p style={{ color: 'rgba(255,255,255,0.45)', fontSize: '0.9rem', lineHeight: 1.6, marginBottom: '1.25rem', maxWidth: '480px' }}>
                    {project.desc}
                  </p>
                  <Link
                    href="/projects"
                    style={{ display: 'inline-flex', alignItems: 'center', gap: '0.5rem', color: 'rgba(255,255,255,0.55)', fontFamily: "'Chivo Mono', monospace", fontSize: '0.65rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', textDecoration: 'none', transition: 'color 0.2s' }}
                    onMouseEnter={e => (e.currentTarget.style.color = '#7FFFD4')}
                    onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,255,255,0.55)')}
                  >
                    View project
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
                  </Link>
                </div>

                {/* Image */}
                <div style={{ width: '200px', height: '130px', flexShrink: 0, border: '1px solid rgba(255,255,255,0.10)', overflow: 'hidden', display: 'flex', alignItems: 'center', justifyContent: 'center', background: '#111' }} className="hidden sm:flex">
                  <img
                    src={project.image}
                    alt={project.title}
                    style={{ width: '100%', height: '100%', objectFit: 'cover', transition: 'transform 0.4s ease' }}
                    onMouseEnter={e => (e.currentTarget.style.transform = 'scale(1.05)')}
                    onMouseLeave={e => (e.currentTarget.style.transform = 'scale(1)')}
                    onError={e => { (e.currentTarget as HTMLImageElement).style.display = 'none'; }}
                  />
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <div className="section-divider" />
    </div>
  );
}
