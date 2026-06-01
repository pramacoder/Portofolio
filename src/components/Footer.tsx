"use client";

import Link from 'next/link';

export default function Footer() {
  const year = new Date().getFullYear();

  return (
    <footer style={{ background: '#0a0a0a', borderTop: '1px solid rgba(255,255,255,0.08)', position: 'relative', zIndex: 10, overflow: 'hidden' }}>
      <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '4rem 2rem 3rem' }}>

        {/* Main footer grid */}
        <div style={{ display: 'grid', gridTemplateColumns: '2fr 1fr 1fr', gap: '2rem' }} className="footer-grid-desktop">
          {/* Brand */}
          <div>
            <Link href="/" style={{ textDecoration: 'none', display: 'inline-block', marginBottom: '1rem' }}>
              <span style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.8rem', fontWeight: 700, letterSpacing: '0.2em', textTransform: 'uppercase', color: '#fff' }}>
                PRAMAJAYA
              </span>
            </Link>
            <p style={{ color: 'rgba(255,255,255,0.40)', fontSize: '0.85rem', lineHeight: 1.7, maxWidth: '280px', marginTop: '0.75rem' }}>
              Website developer crafting clean, purposeful digital experiences. Based in Bali, working worldwide.
            </p>
          </div>

          {/* Explore */}
          <div>
            <h3 style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.65rem', fontWeight: 700, letterSpacing: '0.15em', textTransform: 'uppercase', color: 'rgba(255,255,255,0.35)', marginBottom: '1.25rem' }}>
              Explore
            </h3>
            <ul style={{ listStyle: 'none', padding: 0, margin: 0 }}>
              {[
                { href: '/projects', label: 'Portfolio' },
                { href: '/#services', label: 'Services' },
                { href: '/about', label: 'About' },
                { href: '/contact', label: 'Contact' },
              ].map(({ href, label }) => (
                <li key={href} style={{ marginBottom: '0.5rem' }}>
                  <Link
                    href={href}
                    style={{ color: 'rgba(255,255,255,0.50)', fontSize: '0.85rem', textDecoration: 'none', transition: 'color 0.2s' }}
                    onMouseEnter={e => (e.currentTarget.style.color = '#7FFFD4')}
                    onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,255,255,0.50)')}
                  >
                    {label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Follow */}
          <div>
            <h3 style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.65rem', fontWeight: 700, letterSpacing: '0.15em', textTransform: 'uppercase', color: 'rgba(255,255,255,0.35)', marginBottom: '1.25rem' }}>
              Follow
            </h3>
            <ul style={{ listStyle: 'none', padding: 0, margin: 0 }}>
              {[
                { href: 'https://instagram.com/pramajaya__', label: 'Instagram' },
                { href: 'https://www.linkedin.com/in/i-gusti-nyoman-pramajaya-3560b9285/', label: 'LinkedIn' },
                { href: 'https://github.com/pramacoder', label: 'GitHub' },
                { href: 'https://facebook.com/Pramajaya', label: 'Facebook' },
              ].map(({ href, label }) => (
                <li key={href} style={{ marginBottom: '0.5rem' }}>
                  <a
                    href={href}
                    target="_blank"
                    rel="noopener noreferrer"
                    style={{ color: 'rgba(255,255,255,0.50)', fontSize: '0.85rem', textDecoration: 'none', transition: 'color 0.2s' }}
                    onMouseEnter={e => (e.currentTarget.style.color = '#7FFFD4')}
                    onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,255,255,0.50)')}
                  >
                    {label}
                  </a>
                </li>
              ))}
            </ul>
          </div>
        </div>

        {/* Footer bottom */}
        <div style={{ marginTop: '3.5rem', paddingTop: '2rem', borderTop: '1px solid rgba(255,255,255,0.08)', display: 'flex', justifyContent: 'space-between', alignItems: 'center', flexWrap: 'wrap', gap: '1rem' }}>
          <span style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.65rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'rgba(255,255,255,0.25)' }}>
            © {year} Pramajaya
          </span>

          {/* Status dot */}
          <div style={{ display: 'inline-flex', alignItems: 'center', gap: '0.5rem' }}>
            <span className="status-dot" />
            <span style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'rgba(255,255,255,0.35)' }}>
              Open for work
            </span>
          </div>
        </div>
      </div>

      {/* Watermark */}
      <div className="watermark" style={{ right: '-40px', bottom: '-30px', fontSize: '8rem' }} aria-hidden="true">
        PJ
      </div>

      {/* Mobile grid overrides */}
      <style>{`
        @media (max-width: 768px) {
          .footer-grid-desktop {
            grid-template-columns: 1fr !important;
          }
        }
        @media (min-width: 769px) and (max-width: 1023px) {
          .footer-grid-desktop {
            grid-template-columns: 1fr 1fr !important;
          }
        }
      `}</style>
    </footer>
  );
}
