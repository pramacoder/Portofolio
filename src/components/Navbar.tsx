"use client";

import { useState } from 'react';
import Link from 'next/link';
import { usePathname } from 'next/navigation';

const navLinks = [
  { href: '/projects', label: 'Portfolio' },
  { href: '/#services', label: 'Work' },
  { href: '/about', label: 'About' },
];

export default function Navbar() {
  const [open, setOpen] = useState(false);
  const [openMore, setOpenMore] = useState(false);
  const pathname = usePathname();

  const isActive = (href: string) =>
    href.startsWith('/#') ? false : pathname === href;

  return (
    <header className="sticky top-0 z-50" style={{ background: 'rgba(0,0,0,0.95)', backdropFilter: 'blur(12px)', borderBottom: '1px solid rgba(255,255,255,0.08)' }}>
      <nav style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 2rem', display: 'flex', justifyContent: 'space-between', alignItems: 'center', height: '56px' }}>

        {/* Logo */}
        <Link href="/" style={{ textDecoration: 'none' }}>
          <span style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.8rem', fontWeight: 700, letterSpacing: '0.2em', textTransform: 'uppercase', color: '#fff' }}>
            PRAMAJAYA
          </span>
        </Link>

        {/* Desktop Nav */}
        <div style={{ display: 'flex', alignItems: 'center', gap: '2rem' }} className="hidden md:flex">
          {navLinks.map(({ href, label }) => (
            <Link
              key={href}
              href={href}
              style={{
                fontFamily: "'Chivo Mono', ui-monospace, monospace",
                fontSize: '0.7rem',
                fontWeight: 700,
                letterSpacing: '0.12em',
                textTransform: 'uppercase',
                textDecoration: 'none',
                color: isActive(href) ? '#7FFFD4' : 'rgba(255,255,255,0.6)',
                transition: 'color 0.2s',
              }}
              onMouseEnter={e => { if (!isActive(href)) (e.currentTarget as HTMLElement).style.color = '#fff'; }}
              onMouseLeave={e => { if (!isActive(href)) (e.currentTarget as HTMLElement).style.color = 'rgba(255,255,255,0.6)'; }}
            >
              {label}
            </Link>
          ))}

          {/* More dropdown */}
          <div style={{ position: 'relative' }}>
            <button
              onClick={() => setOpenMore(!openMore)}
              style={{
                display: 'inline-flex', alignItems: 'center', gap: '4px',
                fontFamily: "'Chivo Mono', ui-monospace, monospace",
                fontSize: '0.7rem', fontWeight: 700, letterSpacing: '0.12em',
                textTransform: 'uppercase', color: 'rgba(255,255,255,0.6)',
                background: 'none', border: 'none', cursor: 'pointer',
                transition: 'color 0.2s',
              }}
              onMouseEnter={e => (e.currentTarget.style.color = '#fff')}
              onMouseLeave={e => (e.currentTarget.style.color = 'rgba(255,255,255,0.6)')}
            >
              More
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                <path d="M3 4.5L6 7.5L9 4.5" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
              </svg>
            </button>

            {openMore && (
              <>
                <div style={{ position: 'fixed', inset: 0, zIndex: 10 }} onClick={() => setOpenMore(false)} />
                <div style={{
                  position: 'absolute', top: 'calc(100% + 12px)', right: 0,
                  background: '#111', border: '1px solid rgba(255,255,255,0.10)',
                  padding: '0.5rem 0', minWidth: '160px', zIndex: 20,
                }}>
                  {[
                    { href: '/contact', label: 'Contact' },
                    { href: '/contact#message', label: 'Send Message' },
                  ].map(({ href, label }) => (
                    <Link
                      key={href}
                      href={href}
                      onClick={() => setOpenMore(false)}
                      style={{
                        display: 'block', padding: '0.5rem 1rem',
                        fontFamily: "'Chivo Mono', ui-monospace, monospace",
                        fontSize: '0.65rem', fontWeight: 700, letterSpacing: '0.12em',
                        textTransform: 'uppercase', textDecoration: 'none',
                        color: 'rgba(255,255,255,0.6)', transition: 'color 0.15s, background 0.15s',
                      }}
                      onMouseEnter={e => { (e.currentTarget as HTMLElement).style.color = '#7FFFD4'; (e.currentTarget as HTMLElement).style.background = 'rgba(255,255,255,0.04)'; }}
                      onMouseLeave={e => { (e.currentTarget as HTMLElement).style.color = 'rgba(255,255,255,0.6)'; (e.currentTarget as HTMLElement).style.background = 'transparent'; }}
                    >
                      {label}
                    </Link>
                  ))}
                </div>
              </>
            )}
          </div>

          {/* CTA */}
          <Link
            href="/contact"
            className="btn-chamfer btn-primary"
            style={{ fontSize: '0.7rem', letterSpacing: '0.1em', textTransform: 'uppercase', fontFamily: "'Chivo Mono', ui-monospace, monospace", textDecoration: 'none', padding: '0.5rem 1.25rem' }}
          >
            Hire me!
          </Link>
        </div>

        {/* Mobile hamburger */}
        <button
          onClick={() => setOpen(!open)}
          className="md:hidden"
          style={{ background: 'none', border: 'none', cursor: 'pointer', padding: '0.5rem', color: '#fff' }}
          aria-label="Toggle navigation"
        >
          {!open ? (
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          ) : (
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          )}
        </button>
      </nav>

      {/* Mobile Menu */}
      {open && (
        <div style={{ background: 'rgba(0,0,0,0.98)', borderTop: '1px solid rgba(255,255,255,0.08)', padding: '1.5rem 2rem 2rem' }} className="md:hidden">
          <div style={{ display: 'flex', flexDirection: 'column', gap: '0' }}>
            {navLinks.map(({ href, label }) => (
              <Link
                key={href}
                href={href}
                onClick={() => setOpen(false)}
                style={{
                  display: 'block', padding: '0.75rem 0',
                  borderBottom: '1px solid rgba(255,255,255,0.06)',
                  fontFamily: "'Chivo Mono', ui-monospace, monospace",
                  fontSize: '0.75rem', fontWeight: 700, letterSpacing: '0.15em',
                  textTransform: 'uppercase', textDecoration: 'none',
                  color: isActive(href) ? '#7FFFD4' : 'rgba(255,255,255,0.7)',
                }}
              >
                {label}
              </Link>
            ))}
            <Link href="/contact" onClick={() => setOpen(false)} style={{ display: 'block', padding: '0.75rem 0', borderBottom: '1px solid rgba(255,255,255,0.06)', fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.75rem', fontWeight: 700, letterSpacing: '0.15em', textTransform: 'uppercase', textDecoration: 'none', color: 'rgba(255,255,255,0.7)' }}>Contact</Link>
            <div style={{ marginTop: '1.5rem' }}>
              <Link
                href="/contact"
                onClick={() => setOpen(false)}
                className="btn-chamfer btn-primary"
                style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.7rem', letterSpacing: '0.12em', textTransform: 'uppercase', textDecoration: 'none', width: '100%', justifyContent: 'center' }}
              >
                Hire me!
              </Link>
            </div>
          </div>
        </div>
      )}
    </header>
  );
}
