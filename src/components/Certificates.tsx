"use client";

import React, { useState, useEffect } from "react";

interface Certificate {
  id: string;
  title: string;
  issuer: string;
  date: string;
  imagePath: string;
  description: string;
  tags: string[];
}

const CERTIFICATES: Certificate[] = [
  {
    id: "01",
    title: "1st Place in Web Programming Competition",
    issuer: "Himpunan Mahasiswa Informatika, Universitas Udayana",
    date: "March 29, 2026",
    imagePath: "/Sertificat/Juara1WebPemrogrammanUlangTahunProdi.webp",
    description: "Awarded 1st Place in the Web Programming Competition at the Suara Apresiasi Mahasiswa Informatika (SUPREMASI) XIX event. The competition was held with the theme 'SAMRTA: Synchronized Actions, Moving Resiliently Toward Advancement' to encourage innovative web development. Organized by the Informatics Student Association (Himatif), FMIPA, Udayana University.",
    tags: ["Web Programming", "Competition", "First Place", "Himatif UNUD"],
  },
  {
    id: "02",
    title: "Maju Bareng AI: LLM-Based Tools & Gemini API",
    issuer: "Hacktiv8 Indonesia",
    date: "October 30, 2025",
    imagePath: "/Sertificat/sertif hacktiv8.webp",
    description: "Successfully completed the 'Maju Bareng AI' program focusing on 'LLM-Based Tools and Gemini API Integration for Data Scientists' with a total of 15 learning hours. The curriculum covered integrating advanced large language models and leveraging Google's Gemini API for intelligent data applications. Hosted by Hacktiv8 Indonesia, in collaboration with AVPN, and supported by Google.org and the Asian Development Bank.",
    tags: ["Generative AI", "Gemini API", "LLMs", "Hacktiv8"],
  },
  {
    id: "03",
    title: "Intro to Data Analytics Course",
    issuer: "RevoU",
    date: "March 13, 2026",
    imagePath: "/Sertificat/MiniCourseByRevoU.webp",
    description: "Successfully completed a 1-week certified online mini-course 'Intro to Data Analytics' offered by RevoU (PT Revolusi Cita Edukasi). Gained core knowledge of data processing workflows, analytical logic, visualization techniques, and extracting business insights from raw datasets.",
    tags: ["Data Analytics", "Mini Course", "RevoU", "Data Visualization"],
  },
  {
    id: "04",
    title: "AMD Classroom Talkshow Participant",
    issuer: "AMD Indonesia & Universitas Udayana",
    date: "June 5, 2024",
    imagePath: "/Sertificat/AmdSertif.webp",
    description: "Participated as a talkshow attendee in the educational 'AMD Classroom' event held at Udayana University. The session covered advanced computing hardware technologies, industry insights, and career growth. Collaborative event hosted by AMD Ryzen, the Ministry of Education and Culture, FMIPA Udayana, and the Kampus Merdeka initiative.",
    tags: ["Talkshow", "AMD Ryzen", "Tech Talk", "Campus Event"],
  },
  {
    id: "05",
    title: "National Informatics Webinar Participant",
    issuer: "Himpunan Mahasiswa Informatika, Universitas Udayana",
    date: "September 24, 2023",
    imagePath: "/Sertificat/Webnas.webp",
    description: "Participated in the National Informatics Webinar 2023 themed 'Developing Career Skills And Qualifications With The Use Of Technology And Digital Strategy'. The webinar discussed the integration of modern tools and digital strategy to build strong IT qualifications. Organized online via Zoom Meeting by the Informatics Student Association (Himatif), FMIPA, Udayana University.",
    tags: ["Webinar", "Career Skills", "Digital Strategy", "Informatics"],
  },
];

export default function Certificates() {
  const [selectedCert, setSelectedCert] = useState<Certificate | null>(null);

  // Prevent scroll when modal is open
  useEffect(() => {
    if (selectedCert) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "";
    }
    return () => {
      document.body.style.overflow = "";
    };
  }, [selectedCert]);

  return (
    <section style={{ background: "#0a0a0a", padding: "6rem 0", position: "relative", overflow: "hidden" }}>
      {/* Blueprint decoration — background geometry */}
      <svg
        viewBox="0 0 400 400"
        style={{ position: "absolute", bottom: "-100px", left: "-100px", width: "400px", opacity: 0.03, pointerEvents: "none", zIndex: 0 }}
        aria-hidden="true"
      >
        <circle cx="200" cy="200" r="190" stroke="#7FFFD4" strokeWidth="0.5" fill="none" />
        <circle cx="200" cy="200" r="120" stroke="#7FFFD4" strokeWidth="0.5" fill="none" />
        <line x1="200" y1="10" x2="200" y2="390" stroke="#7FFFD4" strokeWidth="0.3" />
        <line x1="10" y1="200" x2="390" y2="200" stroke="#7FFFD4" strokeWidth="0.3" />
      </svg>

      <div style={{ maxWidth: "1280px", margin: "0 auto", padding: "0 1.5rem", position: "relative", zIndex: 1 }}>
        {/* Header */}
        <div style={{ maxWidth: "640px", marginBottom: "4rem" }}>
          <div className="badge" style={{ marginBottom: "1.5rem" }}>
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none">
              <rect x="2" y="2" width="6" height="6" stroke="#7FFFD4" strokeWidth="1" />
              <rect x="4" y="4" width="2" height="2" fill="#7FFFD4" />
            </svg>
            Credentials
          </div>
          <h2 style={{ fontSize: "clamp(2rem, 5vw, 3.5rem)", fontWeight: 800, color: "#7FFFD4", lineHeight: 1.1, margin: 0 }}>
            Certificates & Achievements
          </h2>
          <p style={{ color: "rgba(255,255,255,0.45)", fontSize: "1rem", lineHeight: 1.75, marginTop: "1rem" }}>
            Verified milestones, courses, and honors demonstrating my ongoing growth in software development and professional leadership.
          </p>
        </div>

        {/* Certificates Grid */}
        <div 
          style={{ 
            display: "grid", 
            gridTemplateColumns: "repeat(auto-fill, minmax(320px, 1fr))", 
            gap: "0px",
            borderTop: "1px solid rgba(255,255,255,0.10)", 
            borderLeft: "1px solid rgba(255,255,255,0.10)" 
          }}
        >
          {CERTIFICATES.map((cert) => (
            <div
              key={cert.id}
              style={{
                padding: "2rem",
                background: "transparent",
                borderRight: "1px solid rgba(255,255,255,0.10)",
                borderBottom: "1px solid rgba(255,255,255,0.10)",
                display: "flex",
                flexDirection: "column",
                justifyContent: "space-between",
                minHeight: "340px",
                position: "relative",
                transition: "background 0.25s ease",
              }}
              className="numbered-card group"
              onMouseEnter={(e) => {
                e.currentTarget.style.background = "rgba(127,255,212,0.02)";
              }}
              onMouseLeave={(e) => {
                e.currentTarget.style.background = "transparent";
              }}
            >
              {/* Card Header (Mono Label / Number) */}
              <div>
                <div style={{ display: "flex", justifyContent: "space-between", alignItems: "flex-start", marginBottom: "1.5rem" }}>
                  <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: "0.62rem", fontWeight: 700, letterSpacing: "0.15em", textTransform: "uppercase", color: "#7FFFD4" }}>
                    CERTIFICATE // {cert.id}
                  </span>
                  <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: "0.62rem", fontWeight: 700, letterSpacing: "0.1em", color: "rgba(255,255,255,0.20)" }}>
                    {cert.id}
                  </span>
                </div>

                {/* Certificate Image Thumbnail */}
                <div 
                  style={{ 
                    width: "100%", 
                    height: "170px", 
                    background: "#000", 
                    border: "1px solid rgba(255,255,255,0.08)", 
                    overflow: "hidden", 
                    display: "flex", 
                    alignItems: "center", 
                    justifyContent: "center",
                    marginBottom: "1.25rem",
                    position: "relative",
                  }}
                >
                  <img
                    src={cert.imagePath}
                    alt={cert.title}
                    style={{
                      width: "100%",
                      height: "100%",
                      objectFit: "cover",
                      opacity: 0.65,
                      filter: "grayscale(70%)",
                    }}
                    className="cert-card-img"
                  />
                  {/* Subtle technical corner marks on the image */}
                  <div style={{ position: "absolute", top: "5px", left: "5px", width: "6px", height: "6px", borderLeft: "1px solid #7FFFD4", borderTop: "1px solid #7FFFD4" }} />
                  <div style={{ position: "absolute", top: "5px", right: "5px", width: "6px", height: "6px", borderRight: "1px solid #7FFFD4", borderTop: "1px solid #7FFFD4" }} />
                  <div style={{ position: "absolute", bottom: "5px", left: "5px", width: "6px", height: "6px", borderLeft: "1px solid #7FFFD4", borderBottom: "1px solid #7FFFD4" }} />
                  <div style={{ position: "absolute", bottom: "5px", right: "5px", width: "6px", height: "6px", borderRight: "1px solid #7FFFD4", borderBottom: "1px solid #7FFFD4" }} />
                </div>

                {/* Title & Issuer */}
                <h3 style={{ color: "#fff", fontSize: "1.2rem", fontWeight: 700, marginBottom: "0.5rem", lineHeight: 1.3 }}>
                  {cert.title}
                </h3>
                <p style={{ color: "rgba(255,255,255,0.50)", fontSize: "0.88rem", lineHeight: 1.5, margin: "0 0 1.25rem 0" }}>
                  {cert.issuer}
                </p>
              </div>

              {/* Tags & Action Buttons */}
              <div>
                {/* Tags */}
                <div style={{ display: "flex", flexWrap: "wrap", gap: "0.4rem", marginBottom: "1.5rem" }}>
                  {cert.tags.map((tag) => (
                    <span
                      key={tag}
                      style={{
                        padding: "2px 8px",
                        border: "1px solid rgba(255,255,255,0.08)",
                        fontFamily: "'Chivo Mono', monospace",
                        fontSize: "0.58rem",
                        fontWeight: 700,
                        letterSpacing: "0.05em",
                        textTransform: "uppercase",
                        color: "rgba(255,255,255,0.35)",
                      }}
                    >
                      {tag}
                    </span>
                  ))}
                </div>

                {/* Actions */}
                <div style={{ display: "flex", gap: "0.75rem" }}>
                  <button
                    onClick={() => setSelectedCert(cert)}
                    className="btn-chamfer btn-outline"
                    style={{
                      flex: 1,
                      fontSize: "0.65rem",
                      letterSpacing: "0.08em",
                      fontFamily: "'Chivo Mono', monospace",
                      textTransform: "uppercase",
                      padding: "0.4rem 0.75rem",
                      cursor: "pointer",
                    }}
                  >
                    Quick View
                  </button>
                  <a
                    href={cert.imagePath}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="btn-chamfer btn-ghost"
                    style={{
                      display: "inline-flex",
                      alignItems: "center",
                      justifyContent: "center",
                      fontSize: "0.65rem",
                      letterSpacing: "0.08em",
                      fontFamily: "'Chivo Mono', monospace",
                      textTransform: "uppercase",
                      padding: "0.4rem 0.75rem",
                      textDecoration: "none",
                    }}
                  >
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" style={{ marginRight: "4px" }}>
                      <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                      <polyline points="15 3 21 3 21 9" />
                      <line x1="10" y1="14" x2="21" y2="3" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* Premium Interactive Image Modal */}
      {selectedCert && (
        <div
          style={{
            position: "fixed",
            inset: 0,
            zIndex: 9999,
            display: "flex",
            alignItems: "center",
            justifyContent: "center",
            background: "rgba(0, 0, 0, 0.90)",
            backdropFilter: "blur(10px)",
            padding: "1.5rem",
          }}
          onClick={() => setSelectedCert(null)}
        >
          {/* Modal Container */}
          <div
            style={{
              position: "relative",
              width: "100%",
              maxWidth: "1080px",
              background: "#0a0a0a",
              border: "1px solid rgba(127,255,212,0.3)",
              clipPath: "polygon(0 0, 100% 0, 100% calc(100% - 24px), calc(100% - 24px) 100%, 0 100%)",
              display: "flex",
              flexDirection: "column",
              maxHeight: "90vh",
              boxShadow: "0 25px 50px -12px rgba(0, 0, 0, 0.7)",
            }}
            onClick={(e) => e.stopPropagation()} // Stop closing when clicking inside
          >
            {/* Blueprint Grid Watermark in Modal */}
            <div
              style={{
                position: "absolute",
                inset: 0,
                backgroundImage: "linear-gradient(to right, rgba(127, 255, 212, 0.015) 1px, transparent 1px), linear-gradient(to bottom, rgba(127, 255, 212, 0.015) 1px, transparent 1px)",
                backgroundSize: "24px 24px",
                pointerEvents: "none",
                zIndex: 0,
              }}
            />

            {/* Modal Header */}
            <div
              style={{
                padding: "1.25rem 2rem",
                borderBottom: "1px solid rgba(255,255,255,0.08)",
                display: "flex",
                justifyContent: "space-between",
                alignItems: "center",
                position: "relative",
                zIndex: 2,
              }}
            >
              <div>
                <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: "0.6rem", fontWeight: 700, letterSpacing: "0.15em", textTransform: "uppercase", color: "#7FFFD4" }}>
                  CREDENTIAL PREVIEW // {selectedCert.id}
                </span>
                <h4 style={{ color: "#fff", fontSize: "1.1rem", fontWeight: 700, margin: "4px 0 0 0" }}>
                  {selectedCert.title}
                </h4>
              </div>

              <div style={{ display: "flex", alignItems: "center", gap: "1rem" }}>
                {/* External link inside header */}
                <a
                  href={selectedCert.imagePath}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="btn-chamfer btn-primary"
                  style={{
                    display: "inline-flex",
                    alignItems: "center",
                    gap: "0.4rem",
                    fontSize: "0.65rem",
                    letterSpacing: "0.08em",
                    fontFamily: "'Chivo Mono', monospace",
                    textTransform: "uppercase",
                    padding: "0.35rem 0.85rem",
                    textDecoration: "none",
                  }}
                >
                  Full Image
                  <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                    <polyline points="15 3 21 3 21 9" />
                    <line x1="10" y1="14" x2="21" y2="3" />
                  </svg>
                </a>

                {/* Close Button */}
                <button
                  onClick={() => setSelectedCert(null)}
                  style={{
                    background: "none",
                    border: "1px solid rgba(255,255,255,0.15)",
                    color: "rgba(255,255,255,0.6)",
                    cursor: "pointer",
                    width: "2rem",
                    height: "2rem",
                    display: "flex",
                    alignItems: "center",
                    justifyContent: "center",
                    transition: "color 0.2s, border-color 0.2s",
                  }}
                  onMouseEnter={(e) => {
                    e.currentTarget.style.color = "#7FFFD4";
                    e.currentTarget.style.borderColor = "#7FFFD4";
                  }}
                  onMouseLeave={(e) => {
                    e.currentTarget.style.color = "rgba(255,255,255,0.6)";
                    e.currentTarget.style.borderColor = "rgba(255,255,255,0.15)";
                  }}
                >
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                  </svg>
                </button>
              </div>
            </div>

            {/* Modal Body - Two Column Layout */}
            <div
              className="modal-body-layout"
              style={{
                display: "flex",
                flex: 1,
                overflow: "hidden",
                position: "relative",
                zIndex: 1,
              }}
            >
              {/* Left Column: Image Viewer */}
              <div
                style={{
                  width: "60%",
                  background: "#000",
                  display: "flex",
                  alignItems: "center",
                  justifyContent: "center",
                  padding: "1.5rem",
                  borderRight: "1px solid rgba(255,255,255,0.08)",
                  position: "relative",
                }}
                className="modal-left-col"
              >
                <img
                  src={selectedCert.imagePath}
                  alt={selectedCert.title}
                  style={{
                    maxWidth: "100%",
                    maxHeight: "60vh",
                    objectFit: "contain",
                    boxShadow: "0 10px 30px rgba(0,0,0,0.8)",
                    border: "1px solid rgba(255,255,255,0.1)"
                  }}
                />
              </div>

              {/* Right Column: Detailed Info */}
              <div
                style={{
                  width: "40%",
                  padding: "2.5rem 2rem",
                  overflowY: "auto",
                  display: "flex",
                  flexDirection: "column",
                  justifyContent: "space-between",
                }}
                className="modal-right-col"
              >
                <div>
                  <div style={{ display: "flex", alignItems: "center", gap: "0.5rem", marginBottom: "0.5rem" }}>
                    <span className="mono-label" style={{ color: "#7FFFD4" }}>ISSUER</span>
                    <span style={{ color: "rgba(255,255,255,0.25)" }}>//</span>
                    <span className="mono-label" style={{ color: "rgba(255,255,255,0.4)" }}>{selectedCert.date}</span>
                  </div>
                  <h3 style={{ color: "#fff", fontSize: "1.4rem", fontWeight: 700, marginBottom: "1rem", lineHeight: 1.3 }}>
                    {selectedCert.title}
                  </h3>
                  <p style={{ color: "#7FFFD4", fontSize: "0.85rem", fontWeight: 600, margin: "0 0 1.5rem 0", fontFamily: "'Chivo Mono', monospace" }}>
                    {selectedCert.issuer}
                  </p>
                  
                  <div style={{ borderTop: "1px solid rgba(255,255,255,0.08)", paddingTop: "1.5rem", marginBottom: "1.5rem" }}>
                    <h5 className="mono-label" style={{ color: "rgba(255,255,255,0.3)", marginBottom: "0.5rem" }}>DESCRIPTION & ANALYSIS</h5>
                    <p style={{ color: "rgba(255,255,255,0.65)", fontSize: "0.9rem", lineHeight: 1.7, margin: 0 }}>
                      {selectedCert.description}
                    </p>
                  </div>
                </div>

                <div>
                  {/* Tags */}
                  <h5 className="mono-label" style={{ color: "rgba(255,255,255,0.3)", marginBottom: "0.5rem" }}>CREDENTIAL SKILLS</h5>
                  <div style={{ display: "flex", flexWrap: "wrap", gap: "0.4rem", marginBottom: "2rem" }}>
                    {selectedCert.tags.map((tag) => (
                      <span
                        key={tag}
                        style={{
                          padding: "3px 10px",
                          border: "1px solid rgba(127,255,212,0.15)",
                          background: "rgba(127,255,212,0.02)",
                          fontFamily: "'Chivo Mono', monospace",
                          fontSize: "0.6rem",
                          fontWeight: 700,
                          letterSpacing: "0.05em",
                          textTransform: "uppercase",
                          color: "#7FFFD4",
                        }}
                      >
                        {tag}
                      </span>
                    ))}
                  </div>

                  <button
                    onClick={() => setSelectedCert(null)}
                    className="btn-chamfer btn-ghost"
                    style={{
                      width: "100%",
                      fontSize: "0.7rem",
                      letterSpacing: "0.1em",
                      fontFamily: "'Chivo Mono', monospace",
                      textTransform: "uppercase",
                      padding: "0.6rem 0",
                    }}
                  >
                    Close Preview
                  </button>
                </div>
              </div>
            </div>
            
            {/* Modal Footer Decor */}
            <div
              style={{
                padding: "0.75rem 2rem",
                background: "#0a0a0a",
                borderTop: "1px solid rgba(255,255,255,0.06)",
                display: "flex",
                justifyContent: "space-between",
                alignItems: "center",
                position: "relative",
                zIndex: 2,
              }}
            >
              <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: "0.58rem", color: "rgba(255,255,255,0.3)" }}>
                PRAMAJAYA PORTFOLIO SYSTEM v1.1 // CERTIFICATE_MODULE
              </span>
              <span style={{ fontFamily: "'Chivo Mono', monospace", fontSize: "0.58rem", color: "#7FFFD4" }}>
                STATUS: READY_STATE_LOADED
              </span>
            </div>
          </div>
        </div>
      )}

      {/* Responsive adjustments & micro-interactions */}
      <style>{`
        .cert-card-img {
          transition: opacity 0.3s ease, filter 0.3s ease, transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .numbered-card:hover .cert-card-img {
          opacity: 1 !important;
          filter: grayscale(0%) !important;
          transform: scale(1.05);
        }
        @media (max-width: 991px) {
          .modal-body-layout {
            flex-direction: column !important;
            overflow-y: auto !important;
          }
          .modal-left-col {
            width: 100% !important;
            border-right: none !important;
            border-bottom: 1px solid rgba(255,255,255,0.08) !important;
            padding: 1rem !important;
          }
          .modal-left-col img {
            max-height: 40vh !important;
          }
          .modal-right-col {
            width: 100% !important;
            padding: 1.5rem !important;
            overflow-y: visible !important;
          }
        }
      `}</style>
    </section>
  );
}

