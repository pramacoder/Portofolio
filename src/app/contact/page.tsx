"use client";

import React, { FormEvent } from 'react';

const SOCIALS = [
  { href: 'https://instagram.com/pramajaya__', label: 'Instagram', icon: '/instagram.svg' },
  { href: 'https://www.linkedin.com/in/i-gusti-nyoman-pramajaya-3560b9285/', label: 'LinkedIn', icon: '/linkedin.svg' },
  { href: 'https://github.com/pramacoder', label: 'GitHub', icon: '/github.svg' },
  { href: 'https://facebook.com/Pramajaya', label: 'Facebook', icon: '/facebook.svg' },
  { href: 'https://wa.me/6287743447062', label: 'WhatsApp', icon: '/whatsapp.svg' },
  { href: 'https://t.me/6287743447062', label: 'Telegram', icon: '/telegram.svg' },
];

const CONTACT_INFO = [
  {
    icon: '/mailIcon.svg',
    label: 'Email',
    value: 'pramajaya456@gmail.com',
    href: 'mailto:pramajaya456@gmail.com',
  },
  {
    icon: '/callIcon.svg',
    label: 'Phone',
    value: '+62 877 4344 7062',
    href: 'tel:+6287743447062',
  },
  {
    icon: '/locationIcon.svg',
    label: 'Office',
    value: 'Work remotely worldwide',
    href: null,
  },
  {
    icon: '/locationIcon.svg',
    label: 'Udayana University',
    value: 'Computer Science, Faculty of Mathematics and Natural Sciences.',
    href: null,
  },
];

export default function Contact() {
  const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    const fd = new FormData(e.currentTarget);
    const subject = fd.get('subject') as string;
    const name = fd.get('name') as string;
    const email = fd.get('email') as string;
    const message = fd.get('message') as string;
    const link = `mailto:pramajaya456@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`)}`;
    window.location.href = link;
  };

  return (
    <div className="w-full">

      {/* ═══ CONTACT HEADER ══════════════════════════════ */}
      <section style={{ background: '#000', padding: '5rem 0 4rem', position: 'relative', overflow: 'hidden' }}>
        {/* Blueprint decoration */}
        <svg viewBox="0 0 400 400" style={{ position: 'absolute', right: 0, top: 0, width: '400px', opacity: 0.04, pointerEvents: 'none' }} aria-hidden="true">
          <circle cx="200" cy="200" r="190" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="200" cy="200" r="130" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="200" cy="200" r="70" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <line x1="200" y1="10" x2="200" y2="390" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="10" y1="200" x2="390" y2="200" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="60" y1="60" x2="340" y2="340" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="340" y1="60" x2="60" y2="340" stroke="#7FFFD4" strokeWidth="0.3"/>
          <polyline points="30,60 30,30 60,30" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
          <polyline points="340,30 370,30 370,60" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
        </svg>

        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem', position: 'relative', zIndex: 1 }}>
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
            {/* Left */}
            <div>
              <div className="badge" style={{ marginBottom: '1.5rem' }}>
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
                Contact
              </div>
              <h1 style={{ fontSize: 'clamp(2.5rem, 6vw, 4.5rem)', fontWeight: 900, color: '#7FFFD4', lineHeight: 1.1, marginBottom: '1rem' }}>
                Get in touch
              </h1>
              <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '1.05rem', lineHeight: 1.75 }}>
                Have a project in mind or just want to say hello? I'd like to hear from you.
              </p>
            </div>

            {/* Right — contact info */}
            <div style={{ display: 'flex', flexDirection: 'column', gap: '0', border: '1px solid rgba(255,255,255,0.10)' }}>
              {CONTACT_INFO.map((item, i) => (
                <div key={i} style={{ display: 'flex', gap: '1rem', alignItems: 'flex-start', padding: '1.25rem 1.5rem', borderBottom: i < CONTACT_INFO.length - 1 ? '1px solid rgba(255,255,255,0.08)' : 'none' }}>
                  <div style={{ width: '20px', height: '20px', flexShrink: 0, marginTop: '2px', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                    <img src={item.icon} alt="" style={{ width: '16px', height: '16px', objectFit: 'contain', opacity: 0.5 }} />
                  </div>
                  <div>
                    <div className="mono-label" style={{ color: 'rgba(255,255,255,0.35)', marginBottom: '0.25rem', fontSize: '0.6rem' }}>{item.label}</div>
                    {item.href ? (
                      <a href={item.href} style={{ color: '#fff', fontSize: '0.95rem', textDecoration: 'underline', textDecorationColor: 'rgba(127,255,212,0.4)', transition: 'color 0.2s' }}
                        onMouseEnter={e => (e.currentTarget.style.color = '#7FFFD4')}
                        onMouseLeave={e => (e.currentTarget.style.color = '#fff')}
                      >{item.value}</a>
                    ) : (
                      <span style={{ color: '#fff', fontSize: '0.95rem' }}>{item.value}</span>
                    )}
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ FORM + FOLLOW ═══════════════════════════════ */}
      <section id="message" style={{ background: '#0a0a0a', padding: '5rem 0', scrollMarginTop: '80px' }}>
        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem' }}>
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">

            {/* Form */}
            <div>
              <h2 style={{ fontSize: '1.5rem', fontWeight: 700, color: '#fff', marginBottom: '2rem' }}>
                Send a message
              </h2>
              <form onSubmit={handleSubmit} style={{ display: 'flex', flexDirection: 'column', gap: '1.25rem' }}>
                {[
                  { name: 'name', label: 'Name', type: 'text' },
                  { name: 'email', label: 'Email', type: 'email' },
                  { name: 'subject', label: 'Subject', type: 'text' },
                ].map(field => (
                  <div key={field.name}>
                    <label htmlFor={field.name} className="field-label">{field.label}</label>
                    <input
                      type={field.type}
                      id={field.name}
                      name={field.name}
                      required
                      className="field-input"
                    />
                  </div>
                ))}
                <div>
                  <label htmlFor="message" className="field-label">Message</label>
                  <textarea
                    id="message"
                    name="message"
                    rows={6}
                    required
                    className="field-input"
                    style={{ resize: 'none' }}
                  />
                </div>
                <div>
                  <button type="submit" className="btn-chamfer btn-primary" style={{ fontFamily: "'Chivo Mono', monospace", fontSize: '0.7rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', cursor: 'pointer', border: 'none' }}>
                    Send Message
                  </button>
                </div>
              </form>
            </div>

            {/* Follow */}
            <div>
              <h2 style={{ fontSize: '1.5rem', fontWeight: 700, color: '#fff', marginBottom: '2rem' }}>
                Follow Me
              </h2>
              <div style={{ display: 'flex', flexDirection: 'column', gap: '0', border: '1px solid rgba(255,255,255,0.10)' }}>
                {SOCIALS.map((social, i) => (
                  <a
                    key={i}
                    href={social.href}
                    target="_blank"
                    rel="noopener noreferrer"
                    style={{
                      display: 'flex', alignItems: 'center', gap: '1rem',
                      padding: '1rem 1.25rem',
                      borderBottom: i < SOCIALS.length - 1 ? '1px solid rgba(255,255,255,0.08)' : 'none',
                      textDecoration: 'none', color: 'rgba(255,255,255,0.60)',
                      transition: 'background 0.2s, color 0.2s',
                    }}
                    onMouseEnter={e => { (e.currentTarget as HTMLElement).style.background = 'rgba(127,255,212,0.05)'; (e.currentTarget as HTMLElement).style.color = '#7FFFD4'; }}
                    onMouseLeave={e => { (e.currentTarget as HTMLElement).style.background = 'transparent'; (e.currentTarget as HTMLElement).style.color = 'rgba(255,255,255,0.60)'; }}
                  >
                    <img src={social.icon} alt={social.label} style={{ width: '20px', height: '20px', objectFit: 'contain', opacity: 0.7, flexShrink: 0 }} />
                    <span className="mono-label" style={{ fontSize: '0.65rem' }}>{social.label}</span>
                    <svg style={{ marginLeft: 'auto' }} width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8M7 3l4 4-4 4" stroke="currentColor" strokeWidth="1.2" strokeLinecap="round" strokeLinejoin="round"/></svg>
                  </a>
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      <div className="section-divider" />

      {/* ═══ MAP ═════════════════════════════════════════ */}
      <section style={{ background: '#000', padding: '0' }}>
        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '3rem 1.5rem' }}>
          <div className="badge" style={{ marginBottom: '1.5rem' }}>
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
            Location
          </div>
          <div style={{ border: '1px solid rgba(255,255,255,0.10)', overflow: 'hidden' }}>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.9316634542224!2d115.17590517501598!3d-8.79249089125968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2449816b2b2a7%3A0xf47dc9bcc262b2ac!2sInformatika%20Universitas%20Udayana!5e0!3m2!1sid!2sid!4v1764742923425!5m2!1sid!2sid"
              width="100%"
              height="420"
              style={{ border: 0, display: 'block', filter: 'grayscale(80%) invert(90%) contrast(85%)' }}
              allowFullScreen
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
            />
          </div>
        </div>
      </section>

      <div className="section-divider" />
    </div>
  );
}
