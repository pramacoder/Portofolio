"use client";

import React, { useState } from 'react';
import Link from 'next/link';

const FILTERS = ['All', 'Web', 'Mobile', 'Design'];

const PROJECTS = [
  { id: 1, title: 'Viera Resort & Cafe', desc: 'Simple landing page for a resort in Nguarbloat, Kei Kecil.', category: 'web', year: '2024', image: '/images/portfolio/projects/Viera.png', gallery: [], tags: ['Resort', 'Web design', 'Laravel'], live_url: '#', github_url: '#', featured: false },
  { id: 2, title: 'Redesain UI M-Paspor', desc: 'Redesigned M-Passport UI based on a user-centred approach.', category: 'design', year: '2024', image: '/images/portfolio/projects/Pasporid.png', gallery: [], tags: ['Coursework', 'Figma', 'UI/UX', 'Mobile'], live_url: '#', github_url: '#', featured: false },
  { id: 3, title: 'DwipaFresh E-Commerce', desc: 'Implementing grocery store sales system online through e-commerce.', category: 'web', year: '2024', image: '/images/portfolio/projects/logodwipafresh.jpeg', gallery: [], tags: ['Technology', 'Figma', 'Next.js'], live_url: '#', github_url: '#', featured: true },
  { id: 4, title: 'Mental Health Predict', desc: 'ML project memprediksi happiness index menggunakan data penggunaan layar smartphone. kNN Regressor terbaik dengan R² 0.6417 dan MAPE 9.32%.', category: 'web', year: '2024', image: '/images/portfolio/projects/mentalhealtpredict/LandingPage.png', gallery: ['/images/portfolio/projects/mentalhealtpredict/LandingPage.png','/images/portfolio/projects/mentalhealtpredict/kNN.png','/images/portfolio/projects/mentalhealtpredict/Linear.png','/images/portfolio/projects/mentalhealtpredict/RandomForest.png'], tags: ['Python', 'Machine Learning', 'kNN', 'Linear Regression', 'Random Forest'], live_url: '#', github_url: '#', featured: false },
  { id: 5, title: 'Pengajuan Proposal PKM Unud', desc: 'Sistem pengajuan proposal PKM terintegrasi untuk Biro Kemahasiswaan Universitas Udayana.', category: 'web', year: '2024', image: '/images/portfolio/projects/PengajuanProposalPKMUnud/LoginPage.png', gallery: ['/images/portfolio/projects/PengajuanProposalPKMUnud/LoginPage.png','/images/portfolio/projects/PengajuanProposalPKMUnud/Dosen.png','/images/portfolio/projects/PengajuanProposalPKMUnud/Mahasiswa.png','/images/portfolio/projects/PengajuanProposalPKMUnud/Operator.png','/images/portfolio/projects/PengajuanProposalPKMUnud/Reviewer.png'], tags: ['Laravel', 'Tailwind CSS', 'Alpine.js', 'PDF.js'], live_url: '#', github_url: '#', featured: false },
];

type Project = typeof PROJECTS[0];

export default function Projects() {
  const [selectedProject, setSelectedProject] = useState<Project | null>(null);
  const [activeFilter, setActiveFilter] = useState('All');
  const [currentImageIndex, setCurrentImageIndex] = useState(0);

  const featuredProject = PROJECTS.find(p => p.featured);
  const regularProjects = PROJECTS.filter(p => !p.featured);
  const filtered = regularProjects.filter(p => activeFilter === 'All' || p.category === activeFilter.toLowerCase());

  const selectProject = (project: Project) => {
    setSelectedProject(project);
    setCurrentImageIndex(0);
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const clearSelection = () => { setSelectedProject(null); setCurrentImageIndex(0); };
  const nextImage = () => selectedProject?.gallery.length && setCurrentImageIndex(i => (i + 1) % selectedProject.gallery.length);
  const prevImage = () => selectedProject?.gallery.length && setCurrentImageIndex(i => (i - 1 + selectedProject.gallery.length) % selectedProject.gallery.length);

  return (
    <div className="w-full">

      {/* ═══ HERO ════════════════════════════════════════ */}
      <section style={{ background: '#000', padding: '5rem 0 4rem', position: 'relative', overflow: 'hidden' }}>
        {/* Blueprint bg */}
        <svg viewBox="0 0 480 480" style={{ position: 'absolute', right: '-60px', top: '-60px', width: '480px', opacity: 0.05, pointerEvents: 'none' }} aria-hidden="true">
          <circle cx="240" cy="240" r="220" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="240" cy="240" r="160" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <circle cx="240" cy="240" r="100" stroke="#7FFFD4" strokeWidth="0.5" fill="none"/>
          <line x1="240" y1="0" x2="240" y2="480" stroke="#7FFFD4" strokeWidth="0.3"/>
          <line x1="0" y1="240" x2="480" y2="240" stroke="#7FFFD4" strokeWidth="0.3"/>
          <polyline points="40,70 40,40 70,40" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
          <polyline points="410,40 440,40 440,70" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
          <polyline points="440,410 440,440 410,440" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
          <polyline points="70,440 40,440 40,410" fill="none" stroke="#7FFFD4" strokeWidth="0.8"/>
        </svg>

        <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem', position: 'relative', zIndex: 1 }}>
          {selectedProject ? (
            /* ─── DETAIL VIEW ─── */
            <div style={{ display: 'flex', flexDirection: 'column', gap: '2rem' }}>
              <button
                onClick={clearSelection}
                style={{ display: 'inline-flex', alignItems: 'center', gap: '0.5rem', background: 'none', border: 'none', cursor: 'pointer', color: '#7FFFD4', fontFamily: "'Chivo Mono', monospace", fontSize: '0.7rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', padding: 0 }}
              >
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M13 8H3M7 12L3 8l4-4" stroke="#7FFFD4" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
                Back to Projects
              </button>

              <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {/* Gallery */}
                <div>
                  {selectedProject.gallery.length > 0 ? (
                    <div>
                      <div style={{ border: '1px solid rgba(255,255,255,0.12)', background: '#111', position: 'relative', overflow: 'hidden', aspectRatio: '16/9' }} className="group">
                        <img src={selectedProject.gallery[currentImageIndex]} alt={selectedProject.title} style={{ width: '100%', height: '100%', objectFit: 'contain' }} />
                        {selectedProject.gallery.length > 1 && (
                          <>
                            <button onClick={prevImage} style={{ position: 'absolute', left: '1rem', top: '50%', transform: 'translateY(-50%)', background: 'rgba(0,0,0,0.6)', border: '1px solid rgba(255,255,255,0.15)', color: '#fff', width: '2.5rem', height: '2.5rem', cursor: 'pointer', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                              <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button onClick={nextImage} style={{ position: 'absolute', right: '1rem', top: '50%', transform: 'translateY(-50%)', background: 'rgba(0,0,0,0.6)', border: '1px solid rgba(255,255,255,0.15)', color: '#fff', width: '2.5rem', height: '2.5rem', cursor: 'pointer', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                              <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                            <span style={{ position: 'absolute', bottom: '1rem', right: '1rem', background: 'rgba(0,0,0,0.6)', padding: '0.25rem 0.75rem', fontFamily: "'Chivo Mono', monospace", fontSize: '0.65rem', color: 'rgba(255,255,255,0.6)', letterSpacing: '0.1em' }}>
                              {currentImageIndex + 1}/{selectedProject.gallery.length}
                            </span>
                          </>
                        )}
                      </div>
                      {selectedProject.gallery.length > 1 && (
                        <div style={{ display: 'flex', gap: '0.5rem', marginTop: '0.75rem', overflowX: 'auto' }}>
                          {selectedProject.gallery.map((img, idx) => (
                            <button key={idx} onClick={() => setCurrentImageIndex(idx)} style={{ flexShrink: 0, width: '72px', height: '48px', border: `1px solid ${currentImageIndex === idx ? '#7FFFD4' : 'rgba(255,255,255,0.12)'}`, overflow: 'hidden', cursor: 'pointer', padding: 0, background: '#111' }}>
                              <img src={img} alt="" style={{ width: '100%', height: '100%', objectFit: 'cover' }}/>
                            </button>
                          ))}
                        </div>
                      )}
                    </div>
                  ) : (
                    <div style={{ border: '1px solid rgba(255,255,255,0.12)', background: '#111', aspectRatio: '16/9', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                      {selectedProject.image && <img src={selectedProject.image} alt={selectedProject.title} style={{ width: '100%', height: '100%', objectFit: 'contain' }}/>}
                    </div>
                  )}
                </div>

                {/* Info */}
                <div style={{ display: 'flex', flexDirection: 'column', gap: '1.25rem' }}>
                  <div style={{ display: 'flex', gap: '0.75rem', alignItems: 'center' }}>
                    <span className="badge" style={{ fontSize: '0.6rem', padding: '0.2rem 0.6rem' }}>{selectedProject.category}</span>
                    <span className="mono-label" style={{ color: 'rgba(255,255,255,0.35)' }}>{selectedProject.year}</span>
                  </div>
                  <h1 style={{ fontSize: 'clamp(1.5rem, 4vw, 2.5rem)', fontWeight: 800, color: '#7FFFD4', lineHeight: 1.2, margin: 0 }}>
                    {selectedProject.title}
                  </h1>
                  <p style={{ color: 'rgba(255,255,255,0.60)', fontSize: '1rem', lineHeight: 1.75 }}>
                    {selectedProject.desc}
                  </p>
                  <div style={{ display: 'flex', flexWrap: 'wrap', gap: '0.5rem' }}>
                    {selectedProject.tags.map(tag => (
                      <span key={tag} style={{ padding: '0.3rem 0.8rem', border: '1px solid rgba(255,255,255,0.15)', fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.1em', textTransform: 'uppercase', color: 'rgba(255,255,255,0.50)' }}>
                        {tag}
                      </span>
                    ))}
                  </div>
                  <div style={{ display: 'flex', gap: '1rem', flexWrap: 'wrap', marginTop: '0.5rem' }}>
                    {selectedProject.live_url !== '#' && (
                      <a href={selectedProject.live_url} className="btn-chamfer btn-primary" style={{ textDecoration: 'none', fontFamily: "'Chivo Mono', monospace", fontSize: '0.7rem', letterSpacing: '0.1em', textTransform: 'uppercase' }}>View Live</a>
                    )}
                    {selectedProject.github_url !== '#' && (
                      <a href={selectedProject.github_url} className="btn-chamfer btn-ghost" style={{ textDecoration: 'none', fontFamily: "'Chivo Mono', monospace", fontSize: '0.7rem', letterSpacing: '0.1em', textTransform: 'uppercase' }}>GitHub</a>
                    )}
                  </div>
                </div>
              </div>
            </div>
          ) : (
            /* ─── DEFAULT HERO ─── */
            <div style={{ textAlign: 'center', maxWidth: '640px', margin: '0 auto' }}>
              <div className="badge" style={{ marginBottom: '1.5rem', display: 'inline-flex' }}>
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
                Portfolio
              </div>
              <h1 style={{ fontSize: 'clamp(2.5rem, 6vw, 4.5rem)', fontWeight: 900, color: '#7FFFD4', lineHeight: 1.1, marginBottom: '1rem' }}>
                My Projects
              </h1>
              <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '1.05rem', lineHeight: 1.7 }}>
                A collection of projects I've worked on, showcasing my skills and experience in web development and design.
              </p>
            </div>
          )}
        </div>
      </section>

      {!selectedProject && (
        <>
          <div className="section-divider" />

          {/* ═══ PROJECTS GRID ═══════════════════════════ */}
          <section style={{ background: '#0a0a0a', padding: '5rem 0' }}>
            <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem' }}>
              {/* Filter buttons */}
              <div style={{ display: 'flex', gap: '0', marginBottom: '3rem', flexWrap: 'wrap', border: '1px solid rgba(255,255,255,0.10)' }}>
                {FILTERS.map((f, i) => (
                  <button
                    key={f}
                    onClick={() => setActiveFilter(f)}
                    style={{
                      padding: '0.6rem 1.5rem',
                      fontFamily: "'Chivo Mono', monospace",
                      fontSize: '0.7rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase',
                      border: 'none',
                      borderRight: i < FILTERS.length - 1 ? '1px solid rgba(255,255,255,0.10)' : 'none',
                      background: activeFilter === f ? '#7FFFD4' : 'transparent',
                      color: activeFilter === f ? '#000' : 'rgba(255,255,255,0.50)',
                      cursor: 'pointer',
                      clipPath: activeFilter === f ? 'polygon(0 0, 100% 0, 100% calc(100% - 8px), calc(100% - 8px) 100%, 0 100%)' : 'none',
                      transition: 'all 0.2s ease',
                    }}
                  >
                    {f}
                  </button>
                ))}
              </div>

              {/* Grid */}
              <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0" style={{ border: '1px solid rgba(255,255,255,0.08)' }}>
                {filtered.map((project, i) => (
                  <div
                    key={project.id}
                    onClick={() => selectProject(project)}
                    style={{
                      background: '#0a0a0a',
                      border: 'none',
                      borderRight: '1px solid rgba(255,255,255,0.08)',
                      borderBottom: '1px solid rgba(255,255,255,0.08)',
                      cursor: 'pointer',
                      overflow: 'hidden',
                      transition: 'border-color 0.2s',
                    }}
                    className="project-card"
                  >
                    {/* Image */}
                    <div style={{ aspectRatio: '16/9', background: '#111', overflow: 'hidden', position: 'relative' }}>
                      {project.gallery[0] || project.image ? (
                        <img
                          src={project.gallery[0] || project.image}
                          alt={project.title}
                          style={{ width: '100%', height: '100%', objectFit: 'cover', transition: 'transform 0.4s ease' }}
                          onMouseEnter={e => (e.currentTarget.style.transform = 'scale(1.06)')}
                          onMouseLeave={e => (e.currentTarget.style.transform = 'scale(1)')}
                        />
                      ) : (
                        <div style={{ width: '100%', height: '100%', display: 'flex', alignItems: 'center', justifyContent: 'center', color: 'rgba(255,255,255,0.2)', fontFamily: "'Chivo Mono', monospace", fontSize: '0.65rem', letterSpacing: '0.1em' }}>NO IMAGE</div>
                      )}
                      {/* Hover overlay */}
                      <div style={{ position: 'absolute', inset: 0, background: 'rgba(0,0,0,0)', display: 'flex', alignItems: 'center', justifyContent: 'center', transition: 'background 0.3s' }}
                        onMouseEnter={e => { (e.currentTarget as HTMLElement).style.background = 'rgba(0,0,0,0.5)'; (e.currentTarget.querySelector('.view-label') as HTMLElement)!.style.opacity = '1'; }}
                        onMouseLeave={e => { (e.currentTarget as HTMLElement).style.background = 'rgba(0,0,0,0)'; (e.currentTarget.querySelector('.view-label') as HTMLElement)!.style.opacity = '0'; }}
                      >
                        <span className="view-label" style={{ opacity: 0, background: '#7FFFD4', color: '#000', padding: '0.5rem 1.25rem', fontFamily: "'Chivo Mono', monospace", fontSize: '0.65rem', fontWeight: 700, letterSpacing: '0.12em', textTransform: 'uppercase', clipPath: 'polygon(0 0, 100% 0, 100% calc(100% - 8px), calc(100% - 8px) 100%, 0 100%)', transition: 'opacity 0.3s' }}>
                          View Project
                        </span>
                      </div>
                    </div>
                    {/* Info */}
                    <div style={{ padding: '1.25rem 1.5rem' }}>
                      <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '0.5rem' }}>
                        <span className="mono-label" style={{ color: '#7FFFD4', fontSize: '0.6rem' }}>{project.category}</span>
                        <span className="mono-label" style={{ color: 'rgba(255,255,255,0.25)', fontSize: '0.6rem' }}>{project.year}</span>
                      </div>
                      <h3 style={{ color: '#fff', fontWeight: 700, fontSize: '1.05rem', marginBottom: '0.5rem', lineHeight: 1.3 }}>{project.title}</h3>
                      <p style={{ color: 'rgba(255,255,255,0.40)', fontSize: '0.85rem', lineHeight: 1.6, marginBottom: '1rem', display: '-webkit-box', WebkitLineClamp: 2, WebkitBoxOrient: 'vertical', overflow: 'hidden' }}>
                        {project.desc}
                      </p>
                      <div style={{ display: 'flex', flexWrap: 'wrap', gap: '0.4rem' }}>
                        {project.tags.slice(0, 3).map(tag => (
                          <span key={tag} style={{ padding: '2px 8px', border: '1px solid rgba(255,255,255,0.10)', fontFamily: "'Chivo Mono', monospace", fontSize: '0.58rem', fontWeight: 700, letterSpacing: '0.08em', textTransform: 'uppercase', color: 'rgba(255,255,255,0.35)' }}>
                            {tag}
                          </span>
                        ))}
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </section>

          <div className="section-divider" />

          {/* ═══ FEATURED ════════════════════════════════ */}
          {featuredProject && (
            <section style={{ background: '#000', padding: '5rem 0' }}>
              <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem' }}>
                <div className="badge" style={{ marginBottom: '2rem' }}>
                  <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><rect x="3" y="3" width="4" height="4" fill="#7FFFD4"/></svg>
                  Featured Project
                </div>
                <div
                  className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center"
                  style={{ cursor: 'pointer' }}
                  onClick={() => selectProject(featuredProject)}
                >
                  <div style={{ border: '1px solid rgba(255,255,255,0.10)', overflow: 'hidden', aspectRatio: '16/9', background: '#111' }}>
                    <img src={featuredProject.image} alt={featuredProject.title} style={{ width: '100%', height: '100%', objectFit: 'cover', transition: 'transform 0.5s' }}
                      onMouseEnter={e => (e.currentTarget.style.transform = 'scale(1.04)')}
                      onMouseLeave={e => (e.currentTarget.style.transform = 'scale(1)')}
                    />
                  </div>
                  <div style={{ display: 'flex', flexDirection: 'column', gap: '1.25rem' }}>
                    <span className="badge" style={{ alignSelf: 'flex-start', background: 'rgba(127,255,212,0.10)' }}>★ Featured</span>
                    <h2 style={{ color: '#fff', fontSize: 'clamp(1.5rem, 3.5vw, 2.5rem)', fontWeight: 800, lineHeight: 1.2, margin: 0 }}>{featuredProject.title}</h2>
                    <p style={{ color: 'rgba(255,255,255,0.55)', fontSize: '1rem', lineHeight: 1.75 }}>{featuredProject.desc}</p>
                    <div style={{ display: 'flex', flexWrap: 'wrap', gap: '0.5rem' }}>
                      {featuredProject.tags.map(tag => (
                        <span key={tag} style={{ padding: '0.3rem 0.8rem', border: '1px solid rgba(255,255,255,0.15)', fontFamily: "'Chivo Mono', monospace", fontSize: '0.62rem', fontWeight: 700, letterSpacing: '0.08em', textTransform: 'uppercase', color: 'rgba(255,255,255,0.45)' }}>
                          {tag}
                        </span>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            </section>
          )}

          <div className="section-divider" />

          {/* CTA */}
          <section style={{ background: '#0a0a0a', padding: '5rem 0' }}>
            <div style={{ maxWidth: '1280px', margin: '0 auto', padding: '0 1.5rem', textAlign: 'center' }}>
              <h2 style={{ fontSize: 'clamp(1.75rem, 4vw, 3rem)', fontWeight: 800, color: '#7FFFD4', marginBottom: '1rem' }}>Have a Project in Mind?</h2>
              <p style={{ color: 'rgba(255,255,255,0.50)', fontSize: '1rem', lineHeight: 1.7, maxWidth: '480px', margin: '0 auto 2rem' }}>
                I'm always interested in hearing about new projects and opportunities.
              </p>
              <Link href="/contact" className="btn-chamfer btn-primary" style={{ textDecoration: 'none', fontFamily: "'Chivo Mono', monospace", fontSize: '0.7rem', letterSpacing: '0.1em', textTransform: 'uppercase' }}>
                Let's Talk
              </Link>
            </div>
          </section>

          <div className="section-divider" />
        </>
      )}
    </div>
  );
}
