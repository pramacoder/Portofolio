"use client";

import { useState, useEffect } from 'react';
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

  // Prevent scroll when mobile menu is open
  useEffect(() => {
    if (open) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = 'unset';
    }
    return () => {
      document.body.style.overflow = 'unset';
    };
  }, [open]);

  const isActive = (href: string) =>
    href.startsWith('/#') ? false : pathname === href;

  return (
    <>
      <header className="fixed top-0 w-full z-[60]" style={{ background: open ? 'transparent' : 'rgba(0,0,0,0.85)', backdropFilter: open ? 'none' : 'blur(12px)', borderBottom: open ? 'none' : '1px solid rgba(255,255,255,0.08)', transition: 'all 0.3s ease' }}>
        <nav style={{ width: '100%', maxWidth: '1280px', margin: '0 auto', padding: '0 2rem', height: '80px' }} className="flex justify-between items-center">
          
          {/* Logo */}
          <Link href="/" style={{ textDecoration: 'none', position: 'relative', zIndex: 70 }} onClick={() => setOpen(false)}>
            <span style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.8rem', fontWeight: 800, letterSpacing: '0.2em', textTransform: 'uppercase', color: '#fff' }}>
              PRAMAJAYA
            </span>
          </Link>

          {/* Desktop Nav (Hidden on Mobile) */}
          <div style={{ gap: '2rem' }} className="hidden md:flex items-center">
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
                  gap: '4px',
                  fontFamily: "'Chivo Mono', ui-monospace, monospace",
                  fontSize: '0.7rem', fontWeight: 700, letterSpacing: '0.12em',
                  textTransform: 'uppercase', color: 'rgba(255,255,255,0.6)',
                  background: 'none', border: 'none', cursor: 'pointer',
                  transition: 'color 0.2s',
                  outline: 'none'
                }}
                className="inline-flex items-center"
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

          {/* Hamburger Menu Button (Mobile Only) */}
          <button
            onClick={() => setOpen(!open)}
            className="md:hidden flex justify-center items-center"
            style={{ 
              background: 'transparent', border: 'none', cursor: 'pointer', padding: '10px', 
              color: '#fff', position: 'relative', zIndex: 70, outline: 'none',
              width: '50px', height: '50px'
            }}
            aria-label="Toggle navigation"
          >
            <div style={{ position: 'relative', width: '30px', height: '20px' }}>
              {/* Top line */}
              <span style={{ 
                position: 'absolute', right: 0, width: '30px', height: '2px', background: '#7FFFD4', 
                transition: 'all 0.3s ease-in-out',
                top: open ? '9px' : '0',
                transform: open ? 'rotate(45deg)' : 'rotate(0)'
              }} />
              {/* Middle line */}
              <span style={{ 
                position: 'absolute', right: 0, top: '9px', width: open ? '0' : '20px', height: '2px', background: '#7FFFD4', 
                transition: 'all 0.2s ease-in-out',
                opacity: open ? 0 : 1
              }} />
              {/* Bottom line */}
              <span style={{ 
                position: 'absolute', right: 0, width: '30px', height: '2px', background: '#7FFFD4', 
                transition: 'all 0.3s ease-in-out',
                top: open ? '9px' : '18px',
                transform: open ? 'rotate(-45deg)' : 'rotate(0)'
              }} />
            </div>
          </button>
        </nav>
      </header>

      {/* Full-screen Overlay Menu (Mobile Only) */}
      <div 
        className="md:hidden"
        style={{ 
          position: 'fixed', top: 0, left: 0, width: '100%', height: '100vh', 
          background: 'rgba(5, 5, 5, 0.98)', zIndex: 55,
          display: 'flex', flexDirection: 'column', justifyContent: 'center', alignItems: 'center',
          opacity: open ? 1 : 0, 
          visibility: open ? 'visible' : 'hidden',
          pointerEvents: open ? 'auto' : 'none',
          transition: 'opacity 0.4s ease, visibility 0.4s ease',
          backdropFilter: 'blur(15px)',
          WebkitBackdropFilter: 'blur(15px)',
        }}
      >
        <div style={{ display: 'flex', flexDirection: 'column', gap: '1.5rem', textAlign: 'center', width: '100%', maxWidth: '600px', padding: '0 2rem' }}>
          {[
            { href: '/', label: 'Home' },
            ...navLinks,
            { href: '/contact', label: 'Contact' }
          ].map(({ href, label }, i) => (
            <div key={href} style={{ overflow: 'hidden' }}>
              <div style={{
                transform: open ? 'translateY(0)' : 'translateY(100%)',
                transition: `transform 0.6s cubic-bezier(0.22, 1, 0.36, 1) ${0.1 + i * 0.05}s`,
              }}>
                <Link
                  href={href}
                  onClick={() => setOpen(false)}
                  style={{
                    display: 'inline-block',
                    fontFamily: 'var(--font-instrument-sans), sans-serif',
                    fontSize: 'clamp(1.5rem, 6vh, 3rem)', 
                    fontWeight: 800, 
                    letterSpacing: '-0.02em',
                    textDecoration: 'none',
                    color: isActive(href) ? '#7FFFD4' : '#fff',
                    transition: 'color 0.3s ease, transform 0.3s ease',
                  }}
                  onMouseEnter={e => {
                    (e.currentTarget as HTMLElement).style.color = '#7FFFD4';
                    (e.currentTarget as HTMLElement).style.transform = 'scale(1.05)';
                  }}
                  onMouseLeave={e => {
                    (e.currentTarget as HTMLElement).style.color = isActive(href) ? '#7FFFD4' : '#fff';
                    (e.currentTarget as HTMLElement).style.transform = 'scale(1)';
                  }}
                >
                  {label}
                </Link>
              </div>
            </div>
          ))}

          {/* Contact / Hire Me Button inside Menu */}
          <div style={{ 
            marginTop: '1.5rem', overflow: 'hidden',
            transform: open ? 'translateY(0)' : 'translateY(20px)',
            opacity: open ? 1 : 0,
            transition: `transform 0.6s cubic-bezier(0.22, 1, 0.36, 1) 0.4s, opacity 0.6s ease 0.4s`,
          }}>
            <Link
              href="/contact"
              onClick={() => setOpen(false)}
              className="btn-chamfer btn-primary"
              style={{ 
                display: 'inline-flex',
                fontFamily: "'Chivo Mono', ui-monospace, monospace", 
                fontSize: '0.8rem', letterSpacing: '0.15em', 
                textTransform: 'uppercase', textDecoration: 'none', 
                padding: '0.8rem 2rem',
              }}
            >
              Start a Project
            </Link>
          </div>
        </div>
        
        {/* Social Links or Extra Info at the bottom */}
        <div style={{
          position: 'absolute', bottom: '2.5rem', width: '100%', textAlign: 'center',
          opacity: open ? 1 : 0, transition: 'opacity 0.8s ease 0.5s'
        }}>
          <p style={{ fontFamily: "'Chivo Mono', ui-monospace, monospace", fontSize: '0.7rem', color: 'rgba(255,255,255,0.4)', letterSpacing: '0.1em' }}>
            © {new Date().getFullYear()} PRAMAJAYA
          </p>
        </div>
      </div>
    </>
  );
}
