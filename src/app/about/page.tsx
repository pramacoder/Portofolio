"use client";

import Link from "next/link";
import Certificates from "@/components/Certificates";

const EXPERIENCE = [
  {
    position: "Event Contribution Coordinator",
    organization: "Supremasi 17",
    period: "April 2024",
    description: "Coordinated and managed contributions for Supremasi event operations. Demonstrated reliability in team collaboration and resource allocation to ensure smooth event execution.",
  },
  {
    position: "Facilities & Equipment Coordinator",
    organization: "DPM FMIPA – Community Service Program",
    period: "March 2025",
    description: "Managed venue arrangements and equipment logistics for community service initiatives. Ensured proper setup and teardown, maintaining operational excellence throughout.",
  },
  {
    position: "Master of Ceremony",
    organization: "National Informatics Webinar – Udayana University",
    period: "April 14, 2025",
    description: "Served as MC for a large-scale national informatics webinar. Facilitated program flow, engaged audience participation, and maintained professional standards throughout.",
  },
  {
    position: "Facilities & Equipment Coordinator",
    organization: "Supremasi 18",
    period: "April 2025",
    description: "Led venue and equipment management for Supremasi 18. Coordinated pre-event setup and post-event logistics, maintaining high standards of organisation.",
  },
];

const EDUCATION = [
  {
    title: "High School Diploma",
    institution: "SMA Negeri 5 Denpasar",
    period: "2020 – 2023",
    major: "Science (MIPA)",
    description: "Completed high school education with focus on Mathematics and Natural Sciences, building strong analytical and problem-solving skills.",
  },
  {
    title: "Bachelor's Degree in Informatics",
    institution: "Udayana University",
    period: "2023 – Present",
    major: null,
    description: "Currently pursuing a Bachelor's degree in Informatics Engineering, focusing on software development, data structures, algorithms, and modern web technologies.",
  },
];

const SKILLS = [
  { name: "Event Management", icon: "eventmanagement.svg" },
  { name: "Public Speaking & MC", icon: "mc.svg" },
  { name: "Team Collaboration", icon: "teamwork.svg" },
  { name: "Logistics Planning", icon: "checklist.svg" },
  { name: "Problem Solving", icon: "problem-solving.svg" },
  { name: "Laravel", icon: "laravel.svg" },
  { name: "PHP", icon: "php.svg" },
  { name: "Next.js", icon: "nextjs-icon-svgrepo-com.svg" },
  { name: "JavaScript", icon: "javascript.svg" },
  { name: "TypeScript", icon: "typescript.svg" },
  { name: "Tailwind CSS", icon: "tailwind-css.svg" },
  { name: "Web Development", icon: "web-development.svg" },
  { name: "Machine Learning & AI", icon: "python.svg" },
  { name: "MySQL", icon: "mysql.svg" },
  { name: "Git & GitHub", icon: "github.svg" },
  { name: "Figma", icon: "figma.svg" },
];

export default function About() {
  return (
    <div className="w-full">

      {/* ═══ HERO ════════════════════════════════════════ */}
      <section
        className="relative flex flex-col justify-end overflow-hidden"
        style={{ minHeight: "80vh" }}
      >
        <div
          className="absolute inset-0 z-0"
          style={{
            backgroundImage: "url('/images/portfolio/hero/AboutHero.jpg')",
            backgroundSize: "cover",
            backgroundPosition: "center",
          }}
        />
        <div className="absolute inset-0 z-0" style={{ background: "linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.7) 60%, rgba(0,0,0,1) 100%)" }} />

        {/* Blueprint decoration */}
        <svg viewBox="0 0 400 400" className="absolute left-0 top-0 h-full w-auto opacity-[0.05] pointer-events-none z-0" aria-hidden="true">
          <circle cx="200" cy="200" r="190" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="200" cy="200" r="130" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="200" cy="200" r="70" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <line x1="200" y1="10" x2="200" y2="390" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="10" y1="200" x2="390" y2="200" stroke="#7FFFD4" strokeWidth="0.3"/>
        </svg>

        <div className="relative z-10 px-6 sm:px-10 lg:px-16 pb-16 pt-32" style={{ maxWidth: '1280px', margin: '0 auto', width: '100%' }}>
          <div className="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-10">
            <div className="flex flex-col gap-6">
              <div className="badge" style={{ alignSelf: 'flex-start' }}>
                <span style={{ width: 6, height: 6, background: '#7FFFD4', display: 'inline-block' }} />
                About Me
              </div>
              <h1 style={{ fontSize: 'clamp(2.5rem, 8vw, 6rem)', fontWeight: 900, lineHeight: 1.0, letterSpacing: '-0.02em', fontFamily: 'var(--font-instrument-sans), sans-serif', margin: 0 }}>
                <span style={{ color: '#fff' }}>Digital</span>
                <br />
                <span style={{ color: '#7FFFD4' }}>Transformat</span>
                <br />
                <span style={{ color: '#7FFFD4' }}>ion</span>
              </h1>
              {/* Tags */}
              <div style={{ display: 'flex', flexWrap: 'wrap', gap: '0.75rem' }}>
                {["Website Creator", "Desain UI", "Barcelona Fans"].map((tag, i) => (
                  <span key={tag} style={{
                    border: i === 2 ? 'none' : '1px solid rgba(255,255,255,0.25)',
                    background: i === 2 ? 'linear-gradient(to right, #ef4444, #3b82f6)' : 'transparent',
                    padding: i === 2 ? '2px' : undefined,
                    borderRadius: 0,
                    display: 'inline-block',
                  }}>
                    <span style={{
                      display: 'block',
                      padding: '0.35rem 0.85rem',
                      background: i === 2 ? '#000' : 'transparent',
                      color: '#fff',
                      fontFamily: "'Chivo Mono', monospace",
                      fontSize: '0.7rem',
                      fontWeight: 700,
                      letterSpacing: '0.1em',
                      textTransform: 'uppercase',
                    }}>
                      {tag}
                    </span>
                  </span>
                ))}
              </div>
            </div>
            <div style={{ maxWidth: '360px' }}>
              <p style={{ color: 'rgba(127,255,212,0.7)', fontSize: '1rem', lineHeight: 1.7 }}>
                A complete redesign that moved the needle. The site now converts better and users stay longer.
              </p>
            </div>
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ PROFILE ══════════════════════════════════════ */}
      <section style={{ background: '#000', padding: '6rem 0' }}>
        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem' }}>
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            {/* Photo */}
            <div style={{ position: 'relative', maxWidth: '420px', margin: '0 auto' }}>
              {/* Watermark */}
              <div className="watermark" style={{ fontSize: '5rem', top: '50%', left: '50%', transform: 'translate(-50%, -50%)', whiteSpace: 'nowrap', opacity: 0.07 }}>
                PRAMA<br />JAYA
              </div>
              <div style={{ position: 'relative', zIndex: 1, border: '1px solid rgba(255,255,255,0.12)', overflow: 'hidden' }}>
                <img
                  src="/Photodiri.png"
                  alt="Pramajaya profile photo"
                  style={{ width: '100%', height: 'auto', objectFit: 'contain', display: 'block' }}
                  onError={e => { (e.currentTarget as HTMLImageElement).style.display = 'none'; }}
                />
                <div style={{ position: 'absolute', bottom: 0, left: 0, right: 0, height: '8rem', background: 'linear-gradient(to top, #000, transparent)' }} />
              </div>
            </div>

            {/* Bio */}
            <div>
              <div className="badge" style={{ marginBottom: '1.5rem' }}>
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
                Profile
              </div>
              <h2 style={{ fontSize: 'clamp(1.75rem, 4vw, 3rem)', fontWeight: 800, color: '#7FFFD4', marginBottom: '1.5rem', lineHeight: 1.2 }}>
                Hi, I'm Pramajaya
              </h2>
              <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem', color: 'rgba(255,255,255,0.65)', fontSize: '1rem', lineHeight: 1.75 }}>
                <p>I'm a full-stack developer with a passion for creating beautiful, functional, and user-centered digital experiences. With experience in web development, I've worked with various technologies and frameworks.</p>
                <p>My expertise includes front-end development with modern JavaScript frameworks, back-end development with Laravel and PHP, and UI/UX design. I'm always eager to learn new technologies and improve my skills.</p>
                <p>When I'm not coding, you can find me exploring new design trends, contributing to open-source projects, or sharing knowledge with the developer community.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ EXPERIENCE & EDUCATION ═══════════════════════ */}
      <section style={{ background: '#0a0a0a', padding: '6rem 0', position: 'relative', overflow: 'hidden' }}>
        {/* Blueprint decoration */}
        <svg viewBox="0 0 400 400" style={{ position: 'absolute', top: '-100px', right: '-100px', width: '500px', opacity: 0.04, pointerEvents: 'none' }} aria-hidden="true">
          <circle cx="200" cy="200" r="190" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="200" cy="200" r="130" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="200" cy="200" r="70" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <line x1="200" y1="10" x2="200" y2="390" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="10" y1="200" x2="390" y2="200" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="60" y1="60" x2="340" y2="340" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="340" y1="60" x2="60" y2="340" stroke="#7FFFD4" strokeWidth="0.3"/>
        </svg>

        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem', position: 'relative', zIndex: 1 }}>
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">

            {/* Experience */}
            <div>
              <div className="badge" style={{ marginBottom: '1.5rem' }}>
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
                Experience
              </div>
              <h2 style={{ fontSize: 'clamp(1.75rem, 3.5vw, 2.5rem)', fontWeight: 800, color: '#7FFFD4', marginBottom: '2rem', lineHeight: 1.2 }}>
                Experience
              </h2>
              <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
                {EXPERIENCE.map((exp, i) => (
                  <div key={i} className="experience-card">
                    <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', gap: '1rem', marginBottom: '0.4rem', flexWrap: 'wrap' }}>
                      <h3 style={{ color: '#fff', fontSize: '1rem', fontWeight: 600, margin: 0 }}>{exp.position}</h3>
                      <span className="mono-label" style={{ color: 'rgba(255,255,255,0.35)', flexShrink: 0 }}>{exp.period}</span>
                    </div>
                    <p style={{ color: '#7FFFD4', fontSize: '0.82rem', fontWeight: 600, marginBottom: '0.6rem', fontFamily: "'Chivo Mono', monospace", letterSpacing: '0.05em' }}>
                      {exp.organization}
                    </p>
                    <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '0.88rem', lineHeight: 1.65, margin: 0 }}>
                      {exp.description}
                    </p>
                  </div>
                ))}
              </div>
            </div>

            {/* Education */}
            <div>
              <div className="badge" style={{ marginBottom: '1.5rem' }}>
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
                Education
              </div>
              <h2 style={{ fontSize: 'clamp(1.75rem, 3.5vw, 2.5rem)', fontWeight: 800, color: '#7FFFD4', marginBottom: '2rem', lineHeight: 1.2 }}>
                Education
              </h2>
              <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
                {EDUCATION.map((edu, i) => (
                  <div key={i} className="experience-card">
                    <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', gap: '1rem', marginBottom: '0.4rem', flexWrap: 'wrap' }}>
                      <h3 style={{ color: '#fff', fontSize: '1rem', fontWeight: 600, margin: 0 }}>{edu.title}</h3>
                      <span className="mono-label" style={{ color: 'rgba(255,255,255,0.35)', flexShrink: 0 }}>{edu.period}</span>
                    </div>
                    <p style={{ color: '#7FFFD4', fontSize: '0.82rem', fontWeight: 600, marginBottom: edu.major ? '0.25rem' : '0.6rem', fontFamily: "'Chivo Mono', monospace", letterSpacing: '0.05em' }}>
                      {edu.institution}
                    </p>
                    {edu.major && (
                      <p style={{ color: 'rgba(127,255,212,0.6)', fontSize: '0.78rem', marginBottom: '0.6rem', fontFamily: "'Chivo Mono', monospace" }}>
                        {edu.major}
                      </p>
                    )}
                    <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '0.88rem', lineHeight: 1.65, margin: 0 }}>
                      {edu.description}
                    </p>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ CERTIFICATES ════════════════════════════════ */}
      <Certificates />

      <div className="section-divider" />

      {/* ═══ SKILLS & TOOLS ══════════════════════════════ */}
      <section style={{ background: '#000', padding: '6rem 0' }}>
        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem' }}>
          {/* Header */}
          <div style={{ textAlign: 'center', maxWidth: '640px', margin: '0 auto 4rem' }}>
            <div className="badge" style={{ marginBottom: '1.5rem', display: 'inline-flex' }}>
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
              Skills
            </div>
            <h2 style={{ fontSize: 'clamp(1.75rem, 4vw, 3rem)', fontWeight: 800, color: '#7FFFD4', marginBottom: '1rem' }}>
              Skills & Tools
            </h2>
            <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '1rem', lineHeight: 1.7 }}>
              Technologies and tools I use to bring ideas to life
            </p>
          </div>

          {/* Grid */}
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fill, minmax(150px, 1fr))', gap: '0' }}>
            {SKILLS.map((skill, i) => (
              <div
                key={i}
                className="skill-card"
                style={{
                  border: '1px solid rgba(255,255,255,0.08)',
                  marginLeft: i % 8 !== 0 ? '-1px' : undefined,
                  marginTop: i >= 8 ? '-1px' : undefined,
                }}
              >
                <img
                  src={`/${skill.icon}`}
                  alt={skill.name}
                  style={{ width: '2rem', height: '2rem', objectFit: 'contain', opacity: 0.8 }}
                  onError={e => { (e.currentTarget as HTMLImageElement).style.display = 'none'; }}
                />
                <span style={{ color: 'rgba(255,255,255,0.65)', fontSize: '0.8rem', fontWeight: 500, textAlign: 'center', lineHeight: 1.4 }}>
                  {skill.name}
                </span>
              </div>
            ))}
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ CTA ══════════════════════════════════════════ */}
      <section style={{ background: '#0a0a0a', padding: '6rem 0' }}>
        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem', textAlign: 'center' }}>
          <div className="badge" style={{ marginBottom: '1.5rem', display: 'inline-flex' }}>
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
            Let's connect
          </div>
          <h2 style={{ fontSize: 'clamp(2rem, 5vw, 3.5rem)', fontWeight: 800, color: '#7FFFD4', marginBottom: '1rem' }}>
            Let's Work Together
          </h2>
          <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '1.1rem', lineHeight: 1.7, maxWidth: '520px', margin: '0 auto 2.5rem' }}>
            I'm always open to discussing new projects, creative ideas, or opportunities to be part of your visions.
          </p>
          <Link href="/contact" className="btn-chamfer btn-primary" style={{ fontSize: '0.8rem', letterSpacing: '0.1em', fontFamily: "'Chivo Mono', monospace", fontWeight: 700, textTransform: 'uppercase', textDecoration: 'none' }}>
            Get In Touch
          </Link>
        </div>
      </section>

      <div className="section-divider" />
    </div>
  );
}
