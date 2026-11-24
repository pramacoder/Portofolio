<?php

namespace App\Data;

class PortfolioData
{
    public static function profile(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            'name' => 'Pramajaya',
            'initials' => 'PJ',
            'handle' => '@pramacoder',
            'role_short' => $isId ? 'Mahasiswa Informatika · Web & AI/ML' : 'Informatics Student · Web & AI/ML',
            'role_secondary' => $isId ? 'Universitas Udayana • Data Science Enthusiast' : 'Universitas Udayana • Data Science Enthusiast',
            'headline_role' => $isId
                ? 'Mahasiswa Informatika · Web Developer & AI/ML Enthusiast'
                : 'Informatics Student · Web Developer & AI/ML Enthusiast',
            'intro' => $isId
                ? 'Saya membangun produk digital dan aplikasi web modern menggunakan Laravel, Next.js, dan TypeScript, sekaligus mendalami Artificial Intelligence, Natural Language Processing (NLP), Information Retrieval, serta Data Science di Program Studi Informatika Universitas Udayana.'
                : 'I build modern web applications and digital products with Laravel, Next.js, and TypeScript while exploring Artificial Intelligence, Natural Language Processing (NLP), Information Retrieval, and Data Science as an Informatics undergraduate at Universitas Udayana.',
            'location' => 'Bali, Indonesia',
            'university' => 'Universitas Udayana',
            'email' => 'hello@pramajaya.dev',
            'github' => 'https://github.com/pramacoder',
            'avatar' => 'images/portfolio/hero/Homepage.jpeg',
            'logo' => 'images/brand/logo-pramajaya.png',
            'cv_url' => 'documents/cv-pramajaya.pdf',
            'stats' => [
                [
                    'value' => '38',
                    'label' => $isId ? 'Repositori Publik GitHub' : 'Public GitHub Repos',
                    'icon' => 'code',
                    'href' => 'https://github.com/pramacoder?tab=repositories',
                    'external' => true,
                ],
                [
                    'value' => '5+',
                    'label' => $isId ? 'Website Live & Hosted' : 'Live Hosted Websites',
                    'icon' => 'external-link',
                    'href' => route('links'),
                    'external' => false,
                ],
                [
                    'value' => '10+',
                    'label' => $isId ? 'Eksperimen AI, NLP & ML' : 'AI, NLP & ML Studies',
                    'icon' => 'cpu',
                    'href' => route('projects', ['tag' => 'AI / ML']),
                    'external' => false,
                ],
                [
                    'value' => '2024–',
                    'label' => $isId ? 'Aktif Berkarya di GitHub' : 'Active Building on GitHub',
                    'icon' => 'sparkles',
                    'href' => route('about'),
                    'external' => false,
                ],
            ],
        ];
    }

    public static function ui(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            'nav_groups' => [
                'main' => $isId ? 'Utama' : 'Main',
                'portfolio' => $isId ? 'Portofolio' : 'Portfolio',
                'professional' => $isId ? 'Profesional' : 'Professional',
            ],
            'nav' => [
                'home' => $isId ? 'Beranda' : 'Home',
                'about' => $isId ? 'Tentang' : 'About',
                'contact' => $isId ? 'Kontak' : 'Contact',
                'projects' => $isId ? 'Proyek & Portofolio' : 'Projects & Portfolio',
                'blog' => 'Blog',
                'experience' => $isId ? 'Pengalaman' : 'Experience',
                'education' => $isId ? 'Pendidikan' : 'Education',
                'skills' => $isId ? 'Keahlian' : 'Skills',
                'links' => $isId ? 'Tautan' : 'Links',
            ],
            'actions' => [
                'download_cv' => $isId ? 'Unduh CV' : 'Download CV',
                'dark_mode' => $isId ? 'Mode Gelap' : 'Dark Mode',
                'light_mode' => $isId ? 'Mode Terang' : 'Light Mode',
                'contact_me' => $isId ? 'Hubungi Saya' : 'Contact Me',
                'view_portfolio' => $isId ? 'Lihat Portofolio' : 'View Portfolio',
                'view_skills' => $isId ? 'Lihat Keahlian' : 'View Skills',
                'view_all_projects' => $isId ? 'Lihat Semua Proyek' : 'View All Projects',
                'view_all_articles' => $isId ? 'Lihat Semua Artikel' : 'View All Articles',
                'read_more' => $isId ? 'Baca Selengkapnya' : 'Read More',
                'back_to_projects' => $isId ? 'Kembali ke Proyek' : 'Back to Projects',
                'back_to_blog' => $isId ? 'Kembali ke Blog' : 'Back to Blog',
                'view_github' => $isId ? 'Lihat di GitHub' : 'View on GitHub',
                'live_demo' => $isId ? 'Demo Langsung' : 'Live Demo',
                'show_more' => $isId ? 'Lihat Semua Teknologi' : 'Show All Technologies',
                'show_less' => $isId ? 'Tampilkan Lebih Sedikit' : 'Show Less',
                'collapse_sidebar' => $isId ? 'Ciutkan Sidebar' : 'Collapse Sidebar',
                'expand_sidebar' => $isId ? 'Perluas Sidebar' : 'Expand Sidebar',
                'send_message' => $isId ? 'Kirim Pesan' : 'Send Message',
                'all' => $isId ? 'Semua' : 'All',
            ],
            'sections' => [
                'tech_stack' => $isId ? 'Teknologi yang Saya Gunakan' : 'Technologies I Work With',
                'highlights' => $isId ? 'Eksplorasi Akademik & Teknis' : 'Academic & Technical Exploration',
                'core_skills' => $isId ? 'Keahlian Utama' : 'Core Skills',
                'featured_projects' => $isId ? 'Proyek Unggulan' : 'Featured Projects',
                'latest_blog' => $isId ? 'Blog Terbaru' : 'Latest Articles',
                'contact_cta_title' => $isId ? 'Hubungi Saya' : 'Get in Touch',
                'contact_cta_desc' => $isId
                    ? 'Tertarik berkolaborasi dalam proyek web, riset AI/NLP, atau peluang magang? Jangan ragu untuk menghubungi saya.'
                    : 'Interested in collaborating on a web project, AI/NLP research, or internship opportunity? Feel free to reach out.',
            ],
        ];
    }

    public static function technologies(): array
    {
        return [
            ['name' => 'Laravel', 'category' => 'Backend', 'short' => 'LV'],
            ['name' => 'PHP 8', 'category' => 'Backend', 'short' => 'PHP'],
            ['name' => 'Next.js', 'category' => 'Frontend', 'short' => 'NX'],
            ['name' => 'React', 'category' => 'Frontend', 'short' => 'RE'],
            ['name' => 'TypeScript', 'category' => 'Language', 'short' => 'TS'],
            ['name' => 'Tailwind CSS', 'category' => 'Styling', 'short' => 'TW'],
            ['name' => 'Python', 'category' => 'AI / Data', 'short' => 'PY'],
            ['name' => 'FastAPI', 'category' => 'API', 'short' => 'FA'],
            ['name' => 'Scikit-Learn', 'category' => 'ML', 'short' => 'SK'],
            ['name' => 'IndoBERT / NLP', 'category' => 'NLP', 'short' => 'NL'],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'short' => 'PG'],
            ['name' => 'Supabase', 'category' => 'BaaS', 'short' => 'SB'],
            ['name' => 'MySQL', 'category' => 'Database', 'short' => 'MY'],
            ['name' => 'Neo4j', 'category' => 'Graph DB', 'short' => 'N4'],
            ['name' => 'Streamlit', 'category' => 'BI / Data', 'short' => 'ST'],
            ['name' => 'Docker & Git', 'category' => 'DevOps', 'short' => 'DK'],
        ];
    }

    public static function highlights(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            [
                'badge_primary' => 'Universitas Udayana',
                'badge_secondary' => $isId ? 'Sistem Kampus' : 'Campus System',
                'title' => $isId
                    ? 'Pengembangan Sistem Pengajuan Proposal PKM'
                    : 'PKM Proposal Management Information System',
                'description' => $isId
                    ? 'Membangun alur kerja terintegrasi bagi Mahasiswa, Dosen, Reviewer, dan Operator untuk 10 skema PKM menggunakan Laravel & PHP 8.3.'
                    : 'Built an integrated multi-role workflow for Students, Lecturers, Reviewers, and Operators supporting 10 PKM schemes using Laravel & PHP 8.3.',
                'image' => 'images/projects/pkm-proposal-submission.svg',
                'href' => route('projects.show', 'pkm-proposal-submission'),
            ],
            [
                'badge_primary' => 'NLP & IR Research',
                'badge_secondary' => 'Python · FastAPI',
                'title' => $isId
                    ? 'Mesin Pencari Akademik & Klasifikasi Berita Indonesia'
                    : 'Academic Search Engine & Indonesian News NLP',
                'description' => $isId
                    ? 'Eksperimen dual-baseline TF-IDF VSM dan Okapi BM25 untuk dokumen akademik serta perbandingan SVM, CNN-BiLSTM, dan IndoBERT.'
                    : 'Dual-baseline TF-IDF VSM and Okapi BM25 retrieval for academic corpora alongside SVM, CNN-BiLSTM, and IndoBERT news classification.',
                'image' => 'images/projects/academic-ir.svg',
                'href' => route('projects.show', 'academic-ir'),
            ],
            [
                'badge_primary' => 'AI & IoT Lab',
                'badge_secondary' => 'Gemini · CNN · ESP32',
                'title' => $isId
                    ? 'Eksperimen Applied AI, Computer Vision & IoT'
                    : 'Applied AI, Computer Vision & IoT Prototypes',
                'description' => $isId
                    ? 'Mengembangkan deteksi Tuberkulosis CNN, chatbot bengkel Gemini 2.5 Flash dengan function calling, dan monitoring udara IoT ThingSpeak.'
                    : 'Built CNN Tuberculosis screening, a Gemini 2.5 Flash function-calling workshop chatbot, and Wokwi/ThingSpeak IoT air monitoring.',
                'image' => 'images/projects/deteksi-tuberkulosis-cnn.svg',
                'href' => route('projects.show', 'deteksi-tuberkulosis-cnn'),
            ],
        ];
    }

    public static function coreSkills(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            [
                'icon' => 'code',
                'title' => $isId ? 'Full-Stack Web Development' : 'Full-Stack Web Development',
                'description' => 'Laravel, PHP 8, Next.js, React, TypeScript, JavaScript, Tailwind CSS, Alpine.js, REST API',
            ],
            [
                'icon' => 'cpu',
                'title' => $isId ? 'AI, Machine Learning & NLP' : 'AI, Machine Learning & NLP',
                'description' => 'Python, Scikit-Learn, CNN, BiLSTM, IndoBERT, AutoEncoder, TF-IDF VSM, Okapi BM25, Gemini API',
            ],
            [
                'icon' => 'database',
                'title' => $isId ? 'Data Analytics & Databases' : 'Data Analytics & Databases',
                'description' => 'PostgreSQL, Supabase, MySQL, Neo4j Graph DB, SQLite, Pandas, Jupyter Notebook, Streamlit BI',
            ],
            [
                'icon' => 'wrench',
                'title' => $isId ? 'Engineering Tools & Cloud' : 'Engineering Tools & Cloud',
                'description' => 'Git, GitHub, Docker, FastAPI, Midtrans Payment Gateway, Vercel, Vite, Wokwi IoT & ThingSpeak',
            ],
        ];
    }

    public static function projects(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            [
                'slug' => 'dwipa-store',
                'repo' => 'dwipafresh',
                'featured' => true,
                'title' => 'Dwipa Store — B2B Food Supply Bali',
                'subtitle' => $isId ? 'Platform B2B Grosir Sembako & Distribusi Restoran Bali' : 'B2B Wholesale Grocery & Restaurant Distribution Platform in Bali',
                'category' => 'Full-Stack',
                'status' => $isId ? 'Live Production' : 'Live Production',
                'year' => '2026',
                'role' => 'Web Developer & UI Engineer',
                'image' => 'images/projects/dwipa-store.png',
                'github' => 'https://github.com/pramacoder/dwipafresh',
                'demo' => 'https://dwipa.store/',
                'tags' => ['TypeScript', 'React', 'Tailwind CSS', 'Full-Stack'],
                'summary' => $isId
                    ? 'Platform B2B digital pemesanan grosir sembako, bahan pokok dapur, dan distribusi terjadwal 4 sesi harian WITA untuk restoran, hotel, dan katering di Bali.'
                    : 'Digital B2B wholesale grocery and scheduled 4-session daily WITA kitchen supply platform serving restaurants, hotels, and catering businesses across Bali.',
                'problem' => $isId
                    ? 'Restoran, hotel, dan katering di Bali membutuhkan pasokan bahan baku dapur grosir yang transparan katalognya, terjamin jadwal pengantaran hariannya, dan mudah dipesan melalui portal mitra.'
                    : 'Restaurants, hotels, and caterers in Bali need transparent wholesale ingredient catalogs, predictable daily delivery slots, and an approachable partner ordering flow.',
                'solution' => $isId
                    ? 'Membangun platform web Dwipa Store yang menampilkan katalog produk grosir, jadwal antar 4 sesi WITA, alur pemesanan jelas, serta akses portal mitra dengan desain sistem terstruktur dan responsif.'
                    : 'Built Dwipa Store with a clean wholesale catalog, 4-session WITA delivery schedule showcase, guided ordering flow, and partner portal access backed by a structured design system.',
                'results' => $isId
                    ? [
                        'Aktif dan dapat diakses publik di domain produksi dwipa.store.',
                        'Menyajikan informasi katalog sembako, 4 sesi jadwal antar WITA, dan alur portal mitra secara jelas.',
                        'Desain responsif yang nyaman diakses pemilik restoran dari desktop maupun perangkat mobile.',
                    ]
                    : [
                        'Live in production at dwipa.store.',
                        'Clearly presents wholesale catalog, 4 daily WITA delivery sessions, and partner portal onboarding.',
                        'Responsive interface tailored for busy restaurant buyers across mobile and desktop.',
                    ],
                'features' => $isId
                    ? ['Katalog grosir sembako & bahan dapur', 'Jadwal distribusi terjadwal 4 sesi WITA', 'Portal Mitra & panduan cara pesan', 'Live production di dwipa.store']
                    : ['Wholesale grocery & kitchen supply catalog', 'Scheduled 4-session daily WITA delivery windows', 'Partner portal & guided ordering workflow', 'Live production deployment at dwipa.store'],
            ],
            [
                'slug' => 'sagara-villas',
                'repo' => 'VillaBookingSystem',
                'featured' => true,
                'title' => 'Sagara Villas — Villa Booking System',
                'subtitle' => $isId ? 'Sistem Manajemen Reservasi Villa Full-Stack' : 'Full-Stack Multi-Unit Villa Reservation Platform',
                'category' => 'Full-Stack',
                'status' => $isId ? 'Terverifikasi (108 Tes)' : 'Verified (108 Tests)',
                'year' => '2026',
                'role' => 'Full-Stack Developer',
                'image' => 'images/projects/sagara-villas.svg',
                'github' => 'https://github.com/pramacoder/VillaBookingSystem',
                'demo' => null,
                'tags' => ['Next.js', 'TypeScript', 'Tailwind CSS', 'Full-Stack'],
                'summary' => $isId
                    ? 'Sistem manajemen reservasi villa multi-unit dengan katalog publik, kalender ketersediaan, dasbor admin, kalender timeline, audit trail mutasi, dan ekspor CSV aman.'
                    : 'Multi-unit villa reservation platform featuring a public catalog, availability calendar, admin timeline dashboard, guest management, mutation audit trail, and safe CSV export.',
                'problem' => $isId
                    ? 'Operator beberapa unit villa sering kesulitan mengelola jadwal bentrok, status pembayaran manual, dan riwayat perubahan reservasi secara transparan dalam satu sistem terpadu.'
                    : 'Multi-unit villa operators often struggle to prevent double bookings, track manual payments, and maintain a transparent audit log of reservation mutations in one unified system.',
                'solution' => $isId
                    ? 'Membangun aplikasi full-stack Next.js & TypeScript lengkap dari sisi tamu hingga admin: kalender timeline interaktif, pencatatan pembayaran, ekspor laporan CSV tahan formula-injection, dan 108 automated tests di 17 berkas uji.'
                    : 'Engineered an end-to-end Next.js and TypeScript platform with an interactive admin timeline calendar, guest & payment ledger, formula-injection-safe CSV export, and 108 automated tests across 17 test suites.',
                'results' => $isId
                    ? [
                        '108 dari 108 automated tests lulus di 17 berkas uji.',
                        '0 error TypeScript dan 0 error linter pada produksi build Next.js.',
                        'Audit trail lengkap mencatat setiap mutasi reservasi & pembayaran.',
                    ]
                    : [
                        '108/108 automated tests passing across 17 test suites.',
                        'Zero TypeScript errors and zero linter errors on production build.',
                        'Complete mutation audit trail tracking every booking and payment update.',
                    ],
                'features' => $isId
                    ? ['Katalog unit villa & cek ketersediaan', 'Dasbor admin & kalender timeline', 'Manajemen tamu & pencatatan pembayaran', 'Ekspor CSV aman dari formula injection', 'Audit trail mutasi data']
                    : ['Public unit catalog & availability calendar', 'Admin dashboard & visual timeline', 'Guest ledger & manual payment tracking', 'Formula-injection-safe CSV export', 'Per-mutation audit trail'],
            ],
            [
                'slug' => 'academic-ir',
                'repo' => 'TemuKembaliInformasi',
                'featured' => true,
                'title' => 'Academic IR — Academic Search Engine',
                'subtitle' => $isId ? 'Mesin Pencari Dokumen Akademik Multi-Korpus' : 'Unified Multi-Corpus Academic Search Engine',
                'category' => 'AI / ML',
                'status' => $isId ? 'Riset & Aplikasi Web' : 'Research & Web App',
                'year' => '2026',
                'role' => 'AI / IR & Full-Stack Developer',
                'image' => 'images/projects/academic-ir.svg',
                'github' => 'https://github.com/pramacoder/TemuKembaliInformasi',
                'demo' => null,
                'tags' => ['Python', 'FastAPI', 'Next.js', 'AI / ML', 'NLP'],
                'summary' => $isId
                    ? 'Sistem temu kembali informasi dokumen akademik lintas disiplin dengan Dual-Baseline TF-IDF VSM & Okapi BM25, agregasi level dokumen, backend FastAPI, dan antarmuka Next.js 15.'
                    : 'Cross-disciplinary academic information retrieval engine combining TF-IDF Vector Space Model and Okapi BM25 with document-level aggregation, FastAPI backend, and Next.js 15 editorial UI.',
                'problem' => $isId
                    ? 'Pencarian dokumen akademik lintas korpus sering menghasilkan relevansi yang tidak konsisten ketika hanya mengandalkan pencocokan kata kunci sederhana tanpa pembobotan term dan panjang dokumen.'
                    : 'Searching academic documents across heterogeneous corpora produces noisy results when relying on plain keyword matching without term weighting and document length normalization.',
                'solution' => $isId
                    ? 'Mengimplementasikan arsitektur Dual-Baseline (TF-IDF Vector Space Model dan Okapi BM25) dengan strategi Document-Level Aggregation (max, max+2nd, topN_avg) yang disajikan melalui API FastAPI dan UI editorial Next.js 15.'
                    : 'Implemented a Dual-Baseline ranking pipeline (TF-IDF VSM and Okapi BM25) with Document-Level Aggregation strategies (max, max+2nd, topN_avg) served over FastAPI and a Next.js 15 editorial web interface.',
                'results' => $isId
                    ? [
                        'Mendukung pencarian multi-korpus dengan perbandingan langsung TF-IDF vs Okapi BM25.',
                        'Pemisahan bersih antara engine indexing Python/FastAPI dan frontend Next.js 15 (React 19).',
                        'Menampilkan skor relevansi, tag kueri populer, dan pratinjau dokumen prosedural.',
                    ]
                    : [
                        'Unified multi-corpus search supporting direct TF-IDF vs Okapi BM25 comparison.',
                        'Clean separation between Python/FastAPI retrieval engine and Next.js 15 (React 19) frontend.',
                        'Transparent relevance scoring, popular query tags, and clean document previews.',
                    ],
                'features' => $isId
                    ? ['Dual-baseline TF-IDF VSM & Okapi BM25', 'Document-level aggregation (max, max+2nd, topN_avg)', 'Pemilih korpus & pencarian cepat', 'REST API berkecepatan tinggi dengan FastAPI', 'Antarmuka editorial modern Next.js 15']
                    : ['Dual-baseline TF-IDF VSM & Okapi BM25', 'Document-level aggregation (max, max+2nd, topN_avg)', 'Multi-corpus selector & query tags', 'High-speed FastAPI retrieval backend', 'Modern Next.js 15 editorial frontend'],
            ],
            [
                'slug' => 'pkm-proposal-submission',
                'repo' => 'PKMProposalSubmision',
                'featured' => true,
                'title' => 'PKM Proposal Submission — Unud',
                'subtitle' => $isId ? 'Sistem Informasi Manajemen Proposal PKM Universitas Udayana' : 'Universitas Udayana PKM Proposal Management System',
                'category' => 'Full-Stack',
                'status' => $isId ? 'Aplikasi Kampus' : 'Campus Application',
                'year' => '2026',
                'role' => 'Laravel Full-Stack Developer',
                'image' => 'images/projects/pkm-proposal-submission.svg',
                'github' => 'https://github.com/pramacoder/PKMProposalSubmision',
                'demo' => null,
                'tags' => ['Laravel', 'PHP', 'Blade', 'Tailwind CSS', 'Full-Stack'],
                'summary' => $isId
                    ? 'Sistem informasi terintegrasi untuk pengajuan, validasi, dan penilaian proposal Program Kreativitas Mahasiswa (PKM) Universitas Udayana yang mendukung 10 skema PKM dan 4 peran pengguna.'
                    : 'Integrated information system for submitting, validating, and reviewing Student Creativity Program (PKM) proposals at Universitas Udayana supporting 10 PKM schemes across 4 user roles.',
                'problem' => $isId
                    ? 'Pengelolaan proposal PKM lintas 10 skema melibatkan mahasiswa, dosen pembimbing, reviewer, dan operator kampus sehingga proses validasi manual rentan tercecer dan lambat.'
                    : 'Managing PKM proposals across 10 funding schemes involves students, supervisors, reviewers, and university operators, making manual spreadsheets slow and error-prone.',
                'solution' => $isId
                    ? 'Merancang aplikasi web Laravel & PHP 8.3 dengan hak akses berbasis peran (Mahasiswa, Dosen, Reviewer, Operator), manajemen dokumen proposal, serta alur validasi dan penilaian terstruktur.'
                    : 'Architected a Laravel & PHP 8.3 web platform with strict role-based workflows for Students, Lecturers, Reviewers, and Operators, covering proposal upload, validation, and scoring.',
                'results' => $isId
                    ? [
                        'Mendukung seluruh 10 skema PKM dalam satu sistem terpusat.',
                        'Memisahkan dashboard dan izin akses secara jelas untuk 4 peran pengguna.',
                        'Mempercepat pelacakan status revisi, validasi dosen, dan penilaian reviewer.',
                    ]
                    : [
                        'Supports all 10 official PKM schemes in one centralized platform.',
                        'Dedicated dashboards and role-based access control for 4 distinct user roles.',
                        'Streamlined status tracking across submission, lecturer validation, and review.',
                    ],
                'features' => $isId
                    ? ['Dukungan 10 skema PKM resmi', 'Alur kerja 4 peran: Mahasiswa, Dosen, Reviewer, Operator', 'Validasi & penilaian proposal terstruktur', 'Dibangun dengan Laravel & PHP 8.3']
                    : ['Support for 10 official PKM schemes', '4-role workflow: Student, Lecturer, Reviewer, Operator', 'Structured validation & reviewer scoring', 'Built with Laravel & PHP 8.3'],
            ],
            [
                'slug' => 'greenview-apartment',
                'repo' => 'BookingApartSystem',
                'featured' => false,
                'title' => 'GreenView Apartment System',
                'subtitle' => $isId ? 'Manajemen Apartemen & Integrasi Pembayaran Midtrans' : 'Apartment Management & Midtrans Snap Integration',
                'category' => 'Full-Stack',
                'status' => $isId ? 'Full-Stack Web' : 'Full-Stack Web',
                'year' => '2026',
                'role' => 'Full-Stack Developer',
                'image' => 'images/projects/greenview-apartment.svg',
                'github' => 'https://github.com/pramacoder/BookingApartSystem',
                'demo' => null,
                'tags' => ['React', 'TypeScript', 'PostgreSQL', 'Tailwind CSS', 'Full-Stack'],
                'summary' => $isId
                    ? 'Sistem manajemen apartemen modern dengan React (Vite), TypeScript, PostgreSQL (Supabase), filter katalog unit publik, dan transaksi digital Midtrans Payment Gateway (Snap).'
                    : 'Modern apartment management system built with React (Vite), TypeScript, Supabase PostgreSQL, unit catalog filtering, and Midtrans Snap digital payment integration.',
                'problem' => $isId
                    ? 'Calon penghuni membutuhkan cara cepat untuk menyaring unit berdasarkan tipe, lantai, dan tarif sewa sekaligus menyelesaikan pembayaran secara digital dengan pencatatan otomatis.'
                    : 'Prospective tenants need a clear way to filter apartments by unit type, floor, and rental pricing while completing digital payments with automated status updates.',
                'solution' => $isId
                    ? 'Mengembangkan frontend React + TypeScript yang terhubung ke PostgreSQL (Supabase) sebagai basis data utama, dilengkapi integrasi Midtrans Snap untuk checkout dan pembaruan status sewa.'
                    : 'Built a React + TypeScript application backed by Supabase PostgreSQL and integrated Midtrans Snap for seamless online rental transactions and real-time booking management.',
                'results' => $isId
                    ? [
                        'Katalog publik responsif dengan filter tipe unit, lantai, dan rentang harga.',
                        'Skema database relasional PostgreSQL/Supabase dengan PL/pgSQL terstruktur.',
                        'Integrasi pembayaran digital end-to-end menggunakan Midtrans Snap.',
                    ]
                    : [
                        'Responsive public catalog with unit type, floor, and price filtering.',
                        'Structured Supabase PostgreSQL schema with PL/pgSQL logic.',
                        'End-to-end digital payment checkout via Midtrans Snap.',
                    ],
                'features' => $isId
                    ? ['Katalog apartemen & filter multi-kriteria', 'Basis data PostgreSQL via Supabase', 'Integrasi pembayaran digital Midtrans Snap', 'Antarmuka modern React + Vite + TypeScript']
                    : ['Multi-criteria apartment unit catalog & filters', 'Supabase PostgreSQL backend database', 'Midtrans Snap digital payment gateway', 'Modern React + Vite + TypeScript frontend'],
            ],
            [
                'slug' => 'bisniscom-news-classification',
                'repo' => 'BisnisComNewsClassification',
                'featured' => true,
                'title' => 'Bisnis.com News Classification',
                'subtitle' => $isId ? 'Klasifikasi 11 Kategori Berita Bisnis Indonesia (NLP)' : '11-Class Indonesian Business News NLP Benchmark',
                'category' => 'AI / ML',
                'status' => $isId ? 'Riset NLP' : 'NLP Research',
                'year' => '2026',
                'role' => 'ML / NLP Researcher',
                'image' => 'images/projects/bisniscom-news-classification.svg',
                'github' => 'https://github.com/pramacoder/BisnisComNewsClassification',
                'demo' => null,
                'tags' => ['Python', 'NLP', 'AI / ML', 'Deep Learning'],
                'summary' => $isId
                    ? 'Studi komparatif klasifikasi teks berita Bisnis.com (2020–2022) ke dalam 11 kategori ekonomi/bisnis menggunakan TF-IDF, SVM, CNN, BiLSTM, CNN-BiLSTM, dan IndoBERT.'
                    : 'Comparative NLP study classifying Bisnis.com Indonesian business articles (2020–2022) across 11 categories using TF-IDF, SVM, CNN, BiLSTM, CNN-BiLSTM, and IndoBERT.',
                'problem' => $isId
                    ? 'Artikel berita ekonomi berbahasa Indonesia memiliki istilah domain yang tumpang tindih antar kategori seperti APBN, Pajak, Ekonomi, dan Infrastruktur sehingga memerlukan pembandingan representasi fitur tradisional vs transformer.'
                    : 'Indonesian business journalism contains heavy domain overlap across categories like Fiscal Policy, Tax, Economy, and Infrastructure, requiring systematic comparison between classical ML and transformer models.',
                'solution' => $isId
                    ? 'Menyusun pipeline preprocessing teks bahasa Indonesia dan mengevaluasi 6 arsitektur model (TF-IDF + SVM, CNN, BiLSTM, hybrid CNN-BiLSTM, hingga fine-tuned IndoBERT) pada pembagian train/val/test yang konsisten.'
                    : 'Built a reproducible Indonesian text preprocessing pipeline and benchmarked 6 model families (TF-IDF + SVM, CNN, BiLSTM, hybrid CNN-BiLSTM, and fine-tuned IndoBERT) on standardized train/val/test splits.',
                'results' => $isId
                    ? [
                        'Mencakup 11 kelas berita bisnis Indonesia (APBN, Agribisnis, Ekonomi, Energi, Infrastruktur, dll.).',
                        'Perbandingan adil antara baseline linear (TF-IDF/SVM), neural sequence (CNN-BiLSTM), dan transformer (IndoBERT).',
                        'Eksperimen terdokumentasi rapi di Jupyter Notebook untuk reproduksibilitas penuh.',
                    ]
                    : [
                        'Covers 11 Indonesian business news classes (APBN, Agribusiness, Economy, Energy, Infrastructure, etc.).',
                        'Fair benchmark spanning classical linear baselines (TF-IDF/SVM), CNN-BiLSTM, and pretrained IndoBERT.',
                        'Fully reproducible experimental pipeline in structured Jupyter Notebooks.',
                    ],
                'features' => $isId
                    ? ['Dataset berita Bisnis.com 11 kategori', 'Preprocessing teks Bahasa Indonesia', 'Benchmark TF-IDF + SVM, CNN, BiLSTM, CNN-BiLSTM', 'Fine-tuning pretrained transformer IndoBERT']
                    : ['11-class Bisnis.com Indonesian news corpus', 'Indonesian text cleaning & tokenization pipeline', 'TF-IDF + SVM, CNN, BiLSTM, CNN-BiLSTM benchmark', 'IndoBERT transformer fine-tuning'],
            ],
            [
                'slug' => 'nayana-villa',
                'repo' => 'NayanaVilla1',
                'featured' => true,
                'title' => 'Nayana Villa — Luxury Tropical Villa',
                'subtitle' => $isId ? 'Website Vila Mewah Tropis Dwibahasa (Live Demo)' : 'Bilingual Tropical Boutique Villa Showcase (Live)',
                'category' => 'Web Design',
                'status' => $isId ? 'Live Hosted' : 'Live Hosted',
                'year' => '2026',
                'role' => 'Frontend & UI Developer',
                'image' => 'images/projects/demo-villa.png',
                'github' => 'https://github.com/pramacoder/NayanaVilla1',
                'demo' => 'https://demo-villa.pramajaya.com/',
                'tags' => ['Next.js', 'TypeScript', 'Tailwind CSS', 'Web Design'],
                'summary' => $isId
                    ? 'Situs web portofolio vila mewah tropis dwibahasa (Indonesia & Inggris) dengan Next.js 14, TypeScript, Tailwind CSS, next-intl, dan 11 tes lulus penuh.'
                    : 'Bilingual (English & Indonesian) luxury tropical boutique villa website engineered with Next.js 14, TypeScript, Tailwind CSS, next-intl, and 11 passing verification tests.',
                'problem' => $isId
                    ? 'Properti hospitality butik di Bali memerlukan situs presentasi yang cepat, responsif, dan mendukung tamu internasional maupun domestik secara mulus.'
                    : 'Boutique tropical villas need fast, atmospheric web experiences that seamlessly serve both international and Indonesian guests without sacrificing performance.',
                'solution' => $isId
                    ? 'Membangun situs statis/hybrid dengan Next.js 14 App Router, lokalisasi next-intl (ID/EN), tata letak editorial responsif, serta validasi otomatis (11/11 tests passed).'
                    : 'Crafted a Next.js 14 App Router showcase with next-intl bilingual localization (EN/ID), responsive hospitality layouts, and automated test coverage (11/11 tests passed).',
                'results' => $isId
                    ? [
                        'Terpublikasi live di domain kustom demo-villa.pramajaya.com.',
                        '11 dari 11 tes verifikasi lulus.',
                        'Mendukung perpindahan Bahasa Indonesia & Inggris secara penuh.',
                    ]
                    : [
                        'Deployed live on custom domain demo-villa.pramajaya.com.',
                        '11/11 automated verification checks passing.',
                        'Complete English and Indonesian localization via next-intl.',
                    ],
                'features' => $isId
                    ? ['Dwibahasa Indonesia & Inggris (next-intl)', 'Desain editorial hospitality tropis', 'Next.js 14 + TypeScript + Tailwind CSS', 'Live deployment di demo-villa.pramajaya.com']
                    : ['Bilingual English & Indonesian (next-intl)', 'Editorial tropical hospitality design', 'Next.js 14 + TypeScript + Tailwind CSS', 'Live deployment at demo-villa.pramajaya.com'],
            ],
            [
                'slug' => 'guswik-fitri-wedding',
                'repo' => 'MyBrotherWedding',
                'featured' => false,
                'title' => 'Undangan Pernikahan Guswik & Fitri',
                'subtitle' => $isId ? 'Undangan Digital Pawiwahan & Resepsi Bali (Live)' : 'Balinese Digital Wedding Invitation — Pawiwahan & Reception (Live)',
                'category' => 'Web Design',
                'status' => $isId ? 'Live Hosted' : 'Live Hosted',
                'year' => '2026',
                'role' => 'Web Designer & Frontend Developer',
                'image' => 'images/projects/guswik-fitri-wedding.svg',
                'github' => 'https://github.com/pramacoder/MyBrotherWedding',
                'demo' => 'https://guswik-fitri-weddinginvitation.pramajaya.com/',
                'tags' => ['HTML', 'CSS', 'JavaScript', 'Web Design'],
                'summary' => $isId
                    ? 'Undangan pernikahan digital resmi (Pawiwahan & Resepsi) bernuansa elegan Bali dengan cover interaktif, personalisasi nama tamu via URL, hitung mundur acara, dan tombol simpan tanggal.'
                    : 'Interactive Balinese digital wedding invitation (Pawiwahan & Reception) featuring an animated welcome cover, URL guest personalization, live countdown timer, and save-the-date calendar action.',
                'problem' => $isId
                    ? 'Distribusi undangan pernikahan adat Bali kepada kerabat lintas kota membutuhkan format digital yang tetap menghormati estetika tradisi Pawiwahan, ringan dibuka di ponsel, dan mudah dibagikan.'
                    : 'Sharing traditional Balinese wedding invitations with distant guests requires a mobile-friendly digital experience that honors Pawiwahan elegance while remaining instant to open.',
                'solution' => $isId
                    ? 'Merancang undangan web interaktif dengan layar pembuka personalisasi tamu, countdown menuju hari acara, informasi lokasi Desa Sembung Gede Tabanan, dan performa ringan lintas browser mobile.'
                    : 'Designed an interactive web invitation with personalized guest cover screens, live event countdown, venue details in Tabanan Bali, and fast mobile loading.',
                'results' => $isId
                    ? [
                        'Aktif di-hosting di guswik-fitri-weddinginvitation.pramajaya.com.',
                        'Pengalaman buka undangan mulus dan responsif pada perangkat seluler maupun desktop.',
                    ]
                    : [
                        'Live hosted at guswik-fitri-weddinginvitation.pramajaya.com.',
                        'Smooth interactive opening flow across both mobile and desktop browsers.',
                    ],
                'features' => $isId
                    ? ['Cover undangan interaktif & nama tamu personal', 'Hitung mundur waktu acara real-time', 'Integrasi simpan tanggal & detail lokasi', 'Live hosting di domain pramajaya.com']
                    : ['Interactive cover & personalized guest greeting', 'Real-time event countdown timer', 'Save-the-date & venue navigation details', 'Live hosted on pramajaya.com'],
            ],
            [
                'slug' => 'mepandes-invitation',
                'repo' => 'MepandesInvitation',
                'featured' => false,
                'title' => 'Undangan Digital Upacara Mepandes',
                'subtitle' => $isId ? 'Undangan Web Manusa Yadnya Mepandes Bali (Live)' : 'Balinese Manusa Yadnya Mepandes Digital Invitation (Live)',
                'category' => 'Web Design',
                'status' => $isId ? 'Live Hosted' : 'Live Hosted',
                'year' => '2026',
                'role' => 'Web Designer & Frontend Developer',
                'image' => 'images/projects/mepandes-invitation.svg',
                'github' => 'https://github.com/pramacoder/MepandesInvitation',
                'demo' => 'https://mepandes-agungfernando.pramajaya.com/',
                'tags' => ['HTML', 'CSS', 'JavaScript', 'Web Design'],
                'summary' => $isId
                    ? 'Undangan digital resmi Upacara Manusa Yadnya Mepandes (Potong Gigi) di Tabanan, Bali — menghadirkan tipografi sakral modern, personalisasi tamu undangan, countdown, dan simpan tanggal acara.'
                    : 'Official digital invitation for a Balinese Manusa Yadnya Mepandes ceremony in Tabanan, Bali, combining refined ceremonial typography, guest personalization, countdown timer, and save-the-date integration.',
                'problem' => $isId
                    ? 'Upacara adat Manusa Yadnya Mepandes memerlukan undangan digital khusus yang selaras dengan nuansa budaya Bali sekaligus praktis diakses oleh tamu melalui tautan WhatsApp.'
                    : 'Ceremonial Balinese Mepandes invitations need culturally resonant visual presentation paired with effortless WhatsApp sharing and mobile readability.',
                'solution' => $isId
                    ? 'Membangun situs undangan digital ringan berbasis HTML, CSS, dan JavaScript dengan pembuka interaktif, salam Om Swastiastu, penghitung mundur real-time, serta navigasi informasi acara yang jelas.'
                    : 'Built a lightweight HTML, CSS, and JavaScript digital invitation with an interactive welcome cover, ceremonial greeting, live countdown, and clear event schedule details.',
                'results' => $isId
                    ? [
                        'Aktif di-hosting di mepandes-agungfernando.pramajaya.com.',
                        'Tampilan tipografi dan tata letak tetap tajam di layar smartphone maupun desktop.',
                    ]
                    : [
                        'Live hosted at mepandes-agungfernando.pramajaya.com.',
                        'Crisp ceremonial layout and typography across smartphones and desktops.',
                    ],
                'features' => $isId
                    ? ['Personalisasi nama tamu undangan', 'Hitung mundur upacara & simpan tanggal', 'Nuansa visual khas Manusa Yadnya Bali', 'Live hosting di domain pramajaya.com']
                    : ['Personalized guest invitation display', 'Ceremony countdown & save-the-date button', 'Balinese Manusa Yadnya visual aesthetic', 'Live hosted on pramajaya.com'],
            ],
            [
                'slug' => 'deteksi-tuberkulosis-cnn',
                'repo' => 'Deteksi-Tuberkulosis-CNN',
                'featured' => false,
                'title' => 'Deteksi Tuberkulosis Berbasis CNN',
                'subtitle' => $isId ? 'Klasifikasi Citra X-Ray Paru dengan Deep Learning (Live)' : 'Chest X-Ray Tuberculosis Screening with CNN (Live)',
                'category' => 'AI / ML',
                'status' => $isId ? 'Live di Vercel' : 'Live on Vercel',
                'year' => '2026',
                'role' => 'Deep Learning & Web Developer',
                'image' => 'images/projects/deteksi-tuberkulosis-cnn.svg',
                'github' => 'https://github.com/pramacoder/Deteksi-Tuberkulosis-CNN',
                'demo' => 'https://deteksi-tuberkulosis-cnn.vercel.app',
                'tags' => ['Python', 'Deep Learning', 'TypeScript', 'Docker', 'AI / ML'],
                'summary' => $isId
                    ? 'Model Convolutional Neural Network (CNN) untuk klasifikasi citra X-ray paru terkait Tuberkulosis, dikemas dengan container Docker dan antarmuka web TypeScript di Vercel.'
                    : 'Convolutional Neural Network (CNN) model for chest X-ray Tuberculosis screening packaged with Docker and a TypeScript web frontend live on Vercel.',
                'problem' => $isId
                    ? 'Skrining awal citra radiografi paru membutuhkan alat bantu otomatis yang dapat diakses mudah lewat peramban sebagai demonstrasi penerapan computer vision medis.'
                    : 'Early chest X-ray screening workflows benefit from accessible browser-based computer vision demonstrations that bridge trained deep learning models with end users.',
                'solution' => $isId
                    ? 'Melatih model CNN di Python/Jupyter Notebook, menyusun container deployment dengan Dockerfile, dan menghubungkannya ke antarmuka web TypeScript modern.'
                    : 'Trained a CNN classifier in Python/Jupyter, containerized inference via Docker, and connected it to a responsive TypeScript web interface deployed on Vercel.',
                'results' => $isId
                    ? ['Demo antarmuka aktif di deteksi-tuberkulosis-cnn.vercel.app.', 'Menggabungkan pipeline training Jupyter Notebook dengan deployment Docker + TypeScript.']
                    : ['Live interactive web deployment at deteksi-tuberkulosis-cnn.vercel.app.', 'Bridges Jupyter model experimentation with Dockerized serving and TypeScript UI.'],
                'features' => $isId
                    ? ['Klasifikasi citra medis berbasis CNN', 'Notebook eksperimen & evaluasi model', 'Konfigurasi Docker & frontend TypeScript']
                    : ['CNN-based chest X-ray classification', 'End-to-end Jupyter training notebook', 'Dockerized packaging & TypeScript web app'],
            ],
            [
                'slug' => 'viera-resort-laravel',
                'repo' => 'VieraResortLaravel',
                'featured' => false,
                'title' => 'Viera Resort Ngurbloat',
                'subtitle' => $isId ? 'Website Resmi Resort & Kafe di Kei Kecil, Maluku' : 'Hospitality & Dining Website for Ngurbloat, Maluku',
                'category' => 'Full-Stack',
                'status' => $isId ? 'Laravel 11' : 'Laravel 11',
                'year' => '2025',
                'role' => 'Laravel Developer',
                'image' => 'images/projects/viera-resort-laravel.svg',
                'github' => 'https://github.com/pramacoder/VieraResortLaravel',
                'demo' => null,
                'tags' => ['Laravel', 'PHP', 'Tailwind CSS', 'Blade', 'Full-Stack'],
                'summary' => $isId
                    ? 'Website hospitality untuk Viera Resort Ngurbloat (Kei Kecil, Maluku) dilengkapi hero video player, informasi fasilitas resort, menu restoran, galeri carousel, dan booking WhatsApp.'
                    : 'Hospitality website for Viera Resort Ngurbloat (Kei Kecil, Maluku) featuring a hero video showcase, resort & restaurant pages, draggable gallery carousel, and WhatsApp booking.',
                'problem' => $isId
                    ? 'Destinasi wisata pantai memerlukan situs web responsif yang menampilkan visual fasilitas, menu kafe, ulasan tamu, serta jalur reservasi langsung via WhatsApp.'
                    : 'Coastal resorts need a fast, visually inviting site uniting accommodation info, restaurant menus, guest reviews, and direct WhatsApp reservation handoff.',
                'solution' => $isId
                    ? 'Membangun situs multi-halaman menggunakan Laravel 11, Tailwind CSS, Vite, dan Vanilla JS dengan galeri interaktif serta CTA booking terintegrasi.'
                    : 'Built a multi-page Laravel 11 + Tailwind CSS + Vite website with interactive galleries, smooth transitions, and direct WhatsApp booking links.',
                'results' => $isId
                    ? ['Halaman terstruktur untuk Resort, Cafe & Restaurant, Booking, dan Gallery.', 'Desain responsif lintas perangkat desktop dan mobile.']
                    : ['Dedicated views for Resort, Cafe & Restaurant, Booking, and Gallery.', 'Fully responsive layout across mobile and desktop viewports.'],
                'features' => $isId
                    ? ['Hero section & video player', 'Halaman fasilitas resort & menu cafe', 'Booking terintegrasi WhatsApp', 'Galeri carousel interaktif']
                    : ['Hero showcase with video player', 'Resort facilities & cafe menu pages', 'WhatsApp booking integration', 'Interactive draggable gallery carousel'],
            ],
            [
                'slug' => 'chatbot-gemini-bengkel',
                'repo' => 'Chatbot-Workshop-Gemini-2.5-Flash',
                'featured' => false,
                'title' => 'AI Workshop Chatbot (Gemini 2.5 Flash)',
                'subtitle' => $isId ? 'Chatbot Customer Service Bengkel dengan Function Calling' : 'Auto-Workshop AI Assistant with Function Calling',
                'category' => 'AI / ML',
                'status' => $isId ? 'Applied AI' : 'Applied AI',
                'year' => '2025',
                'role' => 'AI Engineer',
                'image' => 'images/projects/chatbot-gemini-bengkel.svg',
                'github' => 'https://github.com/pramacoder/Chatbot-Workshop-Gemini-2.5-Flash',
                'demo' => null,
                'tags' => ['Python', 'AI / ML', 'NLP', 'SQLite'],
                'summary' => $isId
                    ? 'Asisten customer service bengkel berbasis Python & Gemini 2.5 Flash dengan function calling real-time ke SQLite untuk cek stok/harga sparepart, rekomendasi alternatif, dan booking servis.'
                    : 'Python + Gemini 2.5 Flash customer service assistant using tool/function calling against SQLite to query live spare-part stock & pricing, recommend alternatives, and book service appointments.',
                'problem' => $isId
                    ? 'Chatbot LLM standar mudah berhalusinasi saat ditanya harga dan ketersediaan stok sparepart bengkel secara real-time.'
                    : 'Vanilla LLM chatbots hallucinate prices and inventory unless grounded in deterministic database queries.',
                'solution' => $isId
                    ? 'Menghubungkan Gemini 2.5 Flash dengan function calling deterministik ke database SQLite, validasi tanggal booking, dan memori sesi percakapan.'
                    : 'Connected Gemini 2.5 Flash to deterministic SQLite function-calling tools for live inventory lookups, SKU search, date-validated service booking, and session memory.',
                'results' => $isId
                    ? ['Query stok & harga akurat langsung dari SQLite tanpa halusinasi.', 'Mendukung alur percakapan multi-turn dengan session memory.']
                    : ['Accurate real-time stock and pricing responses grounded in SQLite.', 'Multi-turn conversational context with validated appointment booking.'],
                'features' => $isId
                    ? ['Function calling Gemini 2.5 Flash', 'Query stok & harga SQLite real-time', 'Rekomendasi sparepart alternatif', 'Booking servis dengan validasi tanggal']
                    : ['Gemini 2.5 Flash function calling', 'Real-time SQLite stock & price lookup', 'Alternative part recommendations', 'Date-validated service booking'],
            ],
            [
                'slug' => 'network-anomaly-autoencoder',
                'repo' => 'Deteksi-anomaly-pada-data-jaringan-menggunakan-metode-AutoEncoder',
                'featured' => false,
                'title' => 'Network Anomaly Detection (AutoEncoder)',
                'subtitle' => $isId ? 'Pipeline Unsupervised Deep Learning pada Dataset UNSW-NB15' : 'Unsupervised Deep Learning Pipeline on UNSW-NB15',
                'category' => 'AI / ML',
                'status' => $isId ? 'Data Science' : 'Data Science',
                'year' => '2026',
                'role' => 'Data Science & ML Developer',
                'image' => 'images/projects/network-anomaly-autoencoder.svg',
                'github' => 'https://github.com/pramacoder/Deteksi-anomaly-pada-data-jaringan-menggunakan-metode-AutoEncoder',
                'demo' => null,
                'tags' => ['Python', 'Deep Learning', 'AI / ML', 'Data Science'],
                'summary' => $isId
                    ? 'Pipeline deteksi anomali lalu lintas jaringan berbasis Unsupervised AutoEncoder pada dataset keamanan siber UNSW-NB15, mulai dari cleaning, encoding, seleksi fitur, hingga evaluasi threshold.'
                    : 'Unsupervised AutoEncoder pipeline for network intrusion anomaly detection on the UNSW-NB15 dataset covering data cleaning, categorical encoding, feature selection, training, and threshold tuning.',
                'problem' => $isId
                    ? 'Pola serangan jaringan baru sering kali tidak memiliki label eksplisit sehingga dibutuhkan pendekatan deteksi berbasis reconstruction error dari data trafik normal.'
                    : 'Novel network attack signatures often lack labeled examples, requiring unsupervised anomaly detection via reconstruction error on normal traffic.',
                'solution' => $isId
                    ? 'Merancang pipeline preprocessing lengkap pada UNSW-NB15 dan melatih model AutoEncoder untuk mengidentifikasi trafik abnormal melalui ambang batas galat rekonstruksi.'
                    : 'Engineered a full preprocessing, feature selection, and AutoEncoder training workflow on UNSW-NB15 to flag anomalous flows via tuned reconstruction error thresholds.',
                'results' => $isId
                    ? ['Pipeline terstruktur dari pembersihan missing values & duplikasi hingga evaluasi anomali.', 'Dokumentasi tahapan eksperimen yang sistematis di repositori GitHub.']
                    : ['End-to-end pipeline from cleaning and encoding to hyperparameter & threshold evaluation.', 'Clean, reproducible codebase documented in GitHub.'],
                'features' => $isId
                    ? ['Dataset keamanan jaringan UNSW-NB15', 'Data cleaning, imputasi & categorical encoding', 'Model Unsupervised AutoEncoder', 'Evaluasi & hyperparameter tuning']
                    : ['UNSW-NB15 network traffic benchmark', 'Cleaning, imputation & categorical encoding', 'Unsupervised AutoEncoder architecture', 'Evaluation & threshold hyperparameter tuning'],
            ],
            [
                'slug' => 'hotel-booking-bi',
                'repo' => 'BI_Practice_HotelBookDashboard',
                'featured' => false,
                'title' => 'Hotel Booking Cancellation BI',
                'subtitle' => $isId ? 'Prediksi Pembatalan Reservasi & Dashboard Streamlit' : 'Cancellation Prediction Model & Streamlit BI Dashboard',
                'category' => 'Data & IoT',
                'status' => $isId ? 'BI & ML' : 'BI & ML',
                'year' => '2026',
                'role' => 'Data Scientist',
                'image' => 'images/projects/hotel-booking-bi.svg',
                'github' => 'https://github.com/pramacoder/BI_Practice_HotelBookDashboard',
                'demo' => null,
                'tags' => ['Python', 'Data Science', 'Streamlit', 'AI / ML'],
                'summary' => $isId
                    ? 'Proyek Business Intelligence & Machine Learning untuk memprediksi pembatalan reservasi hotel (is_canceled) yang dilengkapi struktur modular data/notebooks/src dan dashboard interaktif Streamlit.'
                    : 'Business Intelligence and binary classification project predicting hotel booking cancellations (is_canceled) with modular EDA/preprocessing/modeling stages and an interactive Streamlit dashboard.',
                'problem' => $isId
                    ? 'Tingkat pembatalan reservasi hotel yang tinggi berdampak langsung pada okupansi kamar dan estimasi pendapatan operasional.'
                    : 'High reservation cancellation rates directly disrupt room occupancy planning and revenue forecasting.',
                'solution' => $isId
                    ? 'Membangun struktur proyek data science modular (EDA, cleaning, training) dan menyajikan wawasan serta prediksi risiko pembatalan dalam dashboard BI interaktif Streamlit.'
                    : 'Organized a modular data pipeline (raw → interim → processed) paired with classification modeling and an interactive Streamlit BI dashboard for monitoring cancellation drivers.',
                'results' => $isId
                    ? ['Arsitektur folder standar industri (data/, notebooks/, src/).', 'Visualisasi KPI dan prediksi pembatalan secara interaktif.']
                    : ['Clean modular data science repository architecture (data/, notebooks/, src/).', 'Interactive KPI analytics and predictive cancellation monitoring.'],
                'features' => $isId
                    ? ['EDA & preprocessing modular', 'Binary classification risiko pembatalan', 'Dashboard Business Intelligence Streamlit']
                    : ['Modular EDA & cleaning notebooks', 'Binary cancellation risk modeling', 'Interactive Streamlit BI dashboard'],
            ],
            [
                'slug' => 'air-monitoring-iot',
                'repo' => 'Air-Monitoring-Sistem',
                'featured' => false,
                'title' => 'Air Monitoring IoT System',
                'subtitle' => $isId ? 'Pemantauan CO2, PM & Suhu via Wokwi dan ThingSpeak' : 'CO2, Particulate & Climate Telemetry via Wokwi & ThingSpeak',
                'category' => 'Data & IoT',
                'status' => $isId ? 'IoT Telemetry' : 'IoT Telemetry',
                'year' => '2026',
                'role' => 'IoT & Embedded Developer',
                'image' => 'images/projects/air-monitoring-iot.svg',
                'github' => 'https://github.com/pramacoder/Air-Monitoring-Sistem',
                'demo' => null,
                'tags' => ['C++', 'IoT', 'Data & IoT'],
                'summary' => $isId
                    ? 'Sistem monitoring kualitas udara berbasis perangkat IoT (C/C++) di platform simulasi Wokwi untuk mengukur polutan CO2, partikulat (PM), suhu, dan kelembaban terintegrasi cloud ThingSpeak.'
                    : 'IoT air quality monitoring prototype written in C/C++ on Wokwi measuring CO2, particulate matter (PM), temperature, and humidity with real-time ThingSpeak cloud telemetry.',
                'problem' => $isId
                    ? 'Pengukuran parameter polusi udara secara berkala membutuhkan integrasi sensor mikrokontroler dan pencatatan telemetri cloud yang stabil.'
                    : 'Continuous environmental monitoring requires reliable microcontroller sensor reading paired with automated cloud telemetry logging.',
                'solution' => $isId
                    ? 'Merancang rangkaian sensor simulasi Wokwi dalam C/C++ yang mengirimkan pembacaan CO2, PM, temperatur, dan kelembaban secara berkala ke kanal analitik ThingSpeak.'
                    : 'Developed a C/C++ Wokwi embedded prototype streaming CO2, PM, temperature, and humidity readings directly to ThingSpeak cloud dashboards.',
                'results' => $isId
                    ? ['Integrasi telemetri real-time 4 parameter lingkungan ke ThingSpeak.', 'Simulasi perangkat keras yang dapat direproduksi tanpa biaya komponen fisik.']
                    : ['Real-time cloud streaming of 4 environmental air-quality parameters to ThingSpeak.', 'Reproducible hardware simulation via Wokwi.'],
                'features' => $isId
                    ? ['Sensor polutan CO2 & partikulat (PM)', 'Pemantauan suhu & kelembaban', 'Firmware C/C++ di platform Wokwi', 'Integrasi cloud ThingSpeak']
                    : ['CO2 & particulate matter (PM) monitoring', 'Temperature & humidity telemetry', 'C/C++ microcontroller firmware on Wokwi', 'ThingSpeak cloud dashboard integration'],
            ],
        ];
    }

    public static function skills(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            'hard' => [
                [
                    'title' => $isId ? 'Front-End Development' : 'Front-End Development',
                    'items' => ['Next.js', 'React', 'TypeScript', 'JavaScript', 'Tailwind CSS', 'Alpine.js', 'HTML & CSS', 'Vite'],
                ],
                [
                    'title' => $isId ? 'Back-End Development' : 'Back-End Development',
                    'items' => ['Laravel', 'PHP 8', 'FastAPI', 'Python', 'RESTful APIs', 'Blade Templates'],
                ],
                [
                    'title' => $isId ? 'AI, Machine Learning & NLP' : 'AI, Machine Learning & NLP',
                    'items' => ['Scikit-Learn', 'CNN / Deep Learning', 'BiLSTM & IndoBERT', 'TF-IDF & Okapi BM25', 'AutoEncoder', 'Gemini API'],
                ],
                [
                    'title' => $isId ? 'Database, BI & Graph' : 'Database, BI & Graph',
                    'items' => ['PostgreSQL', 'Supabase', 'MySQL', 'Neo4j', 'SQLite', 'Streamlit BI'],
                ],
                [
                    'title' => $isId ? 'Tools, DevOps & IoT' : 'Tools, DevOps & IoT',
                    'items' => ['Git & GitHub', 'Docker', 'Vercel', 'Midtrans Snap', 'Jupyter Notebook', 'Wokwi & ThingSpeak'],
                ],
            ],
            'soft' => $isId
                ? [
                    ['title' => 'Pemecahan Masalah Analitis', 'desc' => 'Memecah kebutuhan produk dan eksperimen data menjadi arsitektur yang terukur dan mudah diuji.'],
                    ['title' => 'Kolaborasi Tim Akademik & Proyek', 'desc' => 'Terbiasa berkolaborasi dalam proyek kelompok mata kuliah MLFT, NLP, dan pengembangan sistem kampus.'],
                    ['title' => 'Belajar Cepat & Adaptif', 'desc' => 'Aktif mengeksplorasi ekosistem modern mulai dari Laravel 11/12, Next.js 15, hingga model NLP & LLM.'],
                    ['title' => 'Dokumentasi & Standar Uji', 'desc' => 'Menulis README terstruktur, automated test suite, serta notebook eksperimen yang dapat direproduksi.'],
                ]
                : [
                    ['title' => 'Analytical Problem Solving', 'desc' => 'Breaking down product requirements and ML experiments into clean, verifiable architectures.'],
                    ['title' => 'Academic & Engineering Collaboration', 'desc' => 'Experienced working in university project teams across MLFT, NLP, and campus software systems.'],
                    ['title' => 'Fast & Self-Directed Learning', 'desc' => 'Continuously building across Laravel, Next.js, FastAPI, NLP transformers, and IoT telemetry.'],
                    ['title' => 'Documentation & Testing Discipline', 'desc' => 'Writing structured READMEs, automated test suites, and reproducible Jupyter research notebooks.'],
                ],
            'languages' => [
                ['name' => $isId ? 'Bahasa Indonesia' : 'Indonesian', 'level' => $isId ? 'Penutur Asli (Native)' : 'Native'],
                ['name' => $isId ? 'Bahasa Inggris' : 'English', 'level' => $isId ? 'Teknis & Profesional (Membaca/Menulis Dokumentasi)' : 'Technical & Working Proficiency'],
            ],
        ];
    }

    public static function experience(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            [
                'role' => $isId ? 'Pengembang Web Full-Stack (Proyek Independen & Portofolio)' : 'Full-Stack Web Developer (Independent & Portfolio Projects)',
                'org' => 'GitHub · pramacoder',
                'period' => $isId ? '2025 – Sekarang' : '2025 – Present',
                'location' => 'Bali, Indonesia',
                'bullets' => $isId
                    ? [
                        'Membangun Sagara Villas (Next.js + TypeScript) dengan kalender timeline reservasi, audit trail mutasi, ekspor CSV aman, dan 108 automated tests lulus.',
                        'Merancang GreenView Apartment Management System menggunakan React (Vite), Supabase PostgreSQL, dan Midtrans Payment Gateway (Snap).',
                        'Mengembangkan website hospitality dwibahasa Nayana Villa (live di Vercel) serta Viera Resort Ngurbloat berbasis Laravel 11 & Tailwind CSS.',
                    ]
                    : [
                        'Engineered Sagara Villas (Next.js + TypeScript) featuring an admin reservation timeline, mutation audit trail, safe CSV export, and 108 passing automated tests.',
                        'Built GreenView Apartment Management System using React (Vite), Supabase PostgreSQL, and Midtrans Snap payment integration.',
                        'Delivered bilingual hospitality websites including Nayana Villa (live on Vercel) and Viera Resort Ngurbloat with Laravel 11 & Tailwind CSS.',
                    ],
                'tags' => ['Laravel', 'Next.js', 'React', 'TypeScript', 'Supabase', 'Midtrans'],
            ],
            [
                'role' => $isId ? 'Pengembang Sistem Informasi Kampus (Proyek PKM)' : 'Campus Information System Developer (PKM Project)',
                'org' => 'Universitas Udayana',
                'period' => '2026',
                'location' => 'Jimbaran, Bali',
                'bullets' => $isId
                    ? [
                        'Mengembangkan Sistem Informasi Pengajuan, Validasi, dan Penilaian Proposal PKM Universitas Udayana menggunakan Laravel & PHP 8.3.',
                        'Merancang alur kerja multi-peran untuk Mahasiswa, Dosen Pembimbing, Reviewer, dan Operator yang mendukung 10 skema PKM.',
                    ]
                    : [
                        'Built an integrated PKM proposal submission, validation, and review platform for Universitas Udayana using Laravel & PHP 8.3.',
                        'Designed multi-role workflows for Students, Supervisors, Reviewers, and Operators across 10 official PKM funding schemes.',
                    ],
                'tags' => ['Laravel', 'PHP 8.3', 'Blade', 'Role-Based Access', 'Tailwind CSS'],
            ],
            [
                'role' => $isId ? 'Peneliti & Pengembang Proyek Akademik AI, NLP & Data Science' : 'Academic AI, NLP & Data Science Project Builder',
                'org' => 'Informatika · Universitas Udayana',
                'period' => '2025 – 2026',
                'location' => 'Bali, Indonesia',
                'bullets' => $isId
                    ? [
                        'Membangun Academic IR: mesin pencari dokumen akademik lintas disiplin menggunakan TF-IDF VSM, Okapi BM25, FastAPI, dan Next.js 15.',
                        'Melakukan eksperimen klasifikasi 11 kategori berita Bisnis.com dengan SVM, CNN, BiLSTM, CNN-BiLSTM, dan IndoBERT.',
                        'Mengembangkan deteksi Tuberkulosis CNN (live di Vercel), deteksi anomali jaringan AutoEncoder (UNSW-NB15), dashboard BI Streamlit, serta chatbot Gemini 2.5 Flash.',
                    ]
                    : [
                        'Developed Academic IR, a multi-corpus search engine implementing TF-IDF VSM and Okapi BM25 served via FastAPI and Next.js 15.',
                        'Benchmarked 11-class Indonesian business news classification across SVM, CNN, BiLSTM, CNN-BiLSTM, and IndoBERT.',
                        'Built CNN Tuberculosis screening (live on Vercel), UNSW-NB15 AutoEncoder anomaly detection, a Streamlit hotel BI dashboard, and a Gemini 2.5 Flash chatbot.',
                    ],
                'tags' => ['Python', 'FastAPI', 'IndoBERT', 'CNN', 'AutoEncoder', 'Streamlit'],
            ],
        ];
    }

    public static function education(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            'formal' => [
                [
                    'degree' => $isId ? 'S1 Informatika' : 'Bachelor of Informatics (S1 Informatika)',
                    'institution' => 'Universitas Udayana',
                    'period' => $isId ? 'Aktif — Bali, Indonesia' : 'Active Undergraduate — Bali, Indonesia',
                    'highlights' => $isId
                        ? [
                            'Berfokus pada Rekayasa Perangkat Lunak Web, Temu Kembali Informasi (Information Retrieval), Natural Language Processing (NLP), Machine Learning, dan Sains Data.',
                            'Aktif mengimplementasikan teori perkuliahan menjadi proyek open-source terverifikasi di GitHub (38 repositori publik).',
                            'Mengerjakan proyek lintas mata kuliah meliputi MLFT & NLP, Pengolahan Data Digital, Business Intelligence, Graph Database (Neo4j), serta IoT.',
                        ]
                        : [
                            'Focusing on Web Software Engineering, Information Retrieval, Natural Language Processing (NLP), Machine Learning, and Data Science.',
                            'Consistently translating coursework into verifiable open-source engineering projects on GitHub (38 public repositories).',
                            'Completed cross-course projects in MLFT & NLP, Digital Data Processing, Business Intelligence, Graph Databases (Neo4j), and IoT.',
                        ],
                ],
            ],
            'continuous' => [
                [
                    'title' => $isId ? 'Eksplorasi Praktis Open-Source di GitHub' : 'Hands-On Open-Source Engineering on GitHub',
                    'description' => $isId
                        ? 'Membangun aplikasi web end-to-end dengan standar pengujian otomatis, arsitektur modular, dan deployment cloud modern.'
                        : 'Building end-to-end web applications with automated testing, clean modular architecture, and modern cloud deployment.',
                ],
                [
                    'title' => $isId ? 'Workshop & Prototyping Generative AI' : 'Generative AI Prototyping & Tool Calling',
                    'description' => $isId
                        ? 'Eksperimen Gemini 2.5 Flash function calling dengan SQLite untuk membangun asisten layanan pelanggan yang terhubung ke data riil.'
                        : 'Hands-on Gemini 2.5 Flash function-calling experiments connecting conversational AI to real SQLite business data.',
                ],
                [
                    'title' => $isId ? 'Riset & Reproduksibilitas Data Science' : 'Reproducible Data Science & NLP Pipelines',
                    'description' => $isId
                        ? 'Mengembangkan pipeline EDA, preprocessing, pemodelan klasifikasi/clustering, dan visualisasi BI menggunakan Python, Scikit-Learn, dan Streamlit.'
                        : 'Authoring modular EDA, preprocessing, classification/clustering models, and BI visualizations with Python, Scikit-Learn, and Streamlit.',
                ],
            ],
        ];
    }

    public static function blogPosts(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            [
                'slug' => 'dual-baseline-academic-ir-tfidf-bm25',
                'title' => $isId
                    ? 'Merancang Mesin Pencari Akademik Multi-Korpus dengan TF-IDF VSM, Okapi BM25, dan FastAPI'
                    : 'Designing a Multi-Corpus Academic Search Engine with TF-IDF VSM, Okapi BM25, and FastAPI',
                'category' => 'AI & IR',
                'date' => '2026-11-01',
                'read_time' => $isId ? '6 menit baca' : '6 min read',
                'image' => 'images/blog/dual-baseline-academic-ir-tfidf-bm25.svg',
                'related_project' => 'academic-ir',
                'excerpt' => $isId
                    ? 'Catatan arsitektur dari proyek Academic IR: membandingkan TF-IDF Vector Space Model dan Okapi BM25 dengan agregasi dokumen serta menyajikannya ke antarmuka Next.js 15.'
                    : 'Architecture notes from building Academic IR: comparing TF-IDF Vector Space Model and Okapi BM25 with document-level aggregation behind a FastAPI + Next.js 15 stack.',
                'sections' => $isId
                    ? [
                        ['heading' => 'Mengapa Dual-Baseline Penting dalam Information Retrieval?', 'body' => 'Ketika membangun sistem temu kembali informasi dokumen akademik lintas disiplin, satu skema pembobotan jarang optimal untuk seluruh panjang dokumen. TF-IDF Vector Space Model (VSM) memberikan baseline intuitif berbasis cosine similarity, sedangkan Okapi BM25 menambahkan saturasi frekuensi term (k1) dan normalisasi panjang dokumen (b) agar dokumen panjang tidak mendominasi hasil pencarian secara tidak adil.'],
                        ['heading' => 'Strategi Document-Level Aggregation', 'body' => 'Pada dokumen akademik yang dipecah menjadi beberapa segmen atau abstrak/isi, skor potongan perlu digabungkan kembali ke tingkat dokumen. Di proyek TemuKembaliInformasi, kami mengevaluasi tiga strategi agregasi: max (mengambil segmen paling relevan), max+2nd (menggabungkan dua sinyal terkuat), dan topN_avg untuk menjaga stabilitas ranking.'],
                        ['heading' => 'Integrasi FastAPI dan Next.js 15', 'body' => 'Memisahkan mesin retrieval Python di FastAPI dari antarmuka editorial di Next.js 15 memungkinkan iterasi model IR berlangsung cepat tanpa mengganggu pengalaman pencarian pengguna, lengkap dengan filter korpus dan tampilan skor relevansi yang transparan.'],
                    ]
                    : [
                        ['heading' => 'Why a Dual-Baseline Matters in Information Retrieval', 'body' => 'When building a cross-disciplinary academic search engine, a single weighting scheme rarely excels across varying document lengths. TF-IDF Vector Space Model (VSM) offers a clean cosine-similarity baseline, while Okapi BM25 introduces term-frequency saturation and document length normalization to prevent long papers from unfairly dominating top results.'],
                        ['heading' => 'Document-Level Aggregation Strategies', 'body' => 'When academic papers are indexed in chunks, chunk-level scores must be aggregated back into document rankings. In TemuKembaliInformasi, we implemented and compared max, max+2nd, and topN_avg aggregation modes to balance precision and consistency.'],
                        ['heading' => 'Serving Python IR Through FastAPI & Next.js 15', 'body' => 'Decoupling the Python indexing/ranking engine in FastAPI from the Next.js 15 editorial frontend kept retrieval latency low while making corpus filtering and relevance inspection effortless.'],
                    ],
            ],
            [
                'slug' => 'indonesian-news-classification-indobert-bilstm',
                'title' => $isId
                    ? 'Membandingkan SVM, CNN-BiLSTM, dan IndoBERT untuk Klasifikasi 11 Kategori Berita Indonesia'
                    : 'Comparing SVM, CNN-BiLSTM, and IndoBERT on 11-Class Indonesian Business News',
                'category' => 'NLP & ML',
                'date' => '2026-08-28',
                'read_time' => $isId ? '5 menit baca' : '5 min read',
                'image' => 'images/blog/indonesian-news-classification-indobert-bilstm.svg',
                'related_project' => 'bisniscom-news-classification',
                'excerpt' => $isId
                    ? 'Pembelajaran praktis dari eksperimen NLP pada korpus Bisnis.com 2020–2022: kapan baseline TF-IDF + SVM sudah cukup dan kapan fine-tuning IndoBERT memberi keunggulan.'
                    : 'Practical lessons from benchmarking 11-class Bisnis.com news classification: when TF-IDF + SVM is surprisingly competitive and where IndoBERT shines.',
                'sections' => $isId
                    ? [
                        ['heading' => 'Tantangan Teks Berita Bisnis Bahasa Indonesia', 'body' => 'Dataset Bisnis.com terdiri dari 11 kategori yang saling berdekatan secara semantik—mulai dari APBN, Pajak, Ekonomi, Ekonomi Global, hingga Infrastruktur dan Properti. Pembersihan teks yang konsisten (case folding, penghapusan tanda baca, normalisasi angka) menjadi fondasi wajib sebelum eksperimen model.'],
                        ['heading' => 'Baseline Tradisional vs Neural Sequence vs Transformer', 'body' => 'TF-IDF + SVM tetap menjadi baseline yang sangat cepat dan kuat untuk kata kunci khas tiap kanal berita. Sementara itu, CNN dan BiLSTM (serta gabungan CNN-BiLSTM) mampu menangkap pola frasa lokal dan urutan konteks, dan IndoBERT unggul dalam memahami nuansa semantik kalimat panjang Bahasa Indonesia.'],
                        ['heading' => 'Pelajaran Praktis untuk Proyek NLP', 'body' => 'Selalu mulai dari split train/val/test yang terkunci dan baseline TF-IDF sebelum melompat ke transformer. Pengukuran metrik per kelas (precision, recall, F1) jauh lebih informatif dibanding akurasi mentah saat menghadapi ketidakseimbangan kelas.'],
                    ]
                    : [
                        ['heading' => 'Why Indonesian Business News Is Semantically Tricky', 'body' => 'Across 11 categories—including APBN, Tax, Economy, Global Economy, Infrastructure, and Property—articles frequently share overlapping economic vocabulary. Clean, reproducible preprocessing is essential before comparing architectures.'],
                        ['heading' => 'Classical Baselines vs Sequence Models vs IndoBERT', 'body' => 'TF-IDF + SVM provides a remarkably fast, competitive baseline whenever lexical cues are strong. CNN-BiLSTM improves sequential phrase capture, while fine-tuning IndoBERT excels on nuanced context where two categories share similar terms.'],
                        ['heading' => 'Practical Takeaway', 'body' => 'Always lock train/val/test splits early and evaluate macro-F1 alongside per-class confusion matrices rather than relying on accuracy alone.'],
                    ],
            ],
            [
                'slug' => 'multi-role-pkm-system-laravel',
                'title' => $isId
                    ? 'Merancang Alur Kerja Multi-Peran pada Sistem Pengajuan Proposal PKM dengan Laravel'
                    : 'Designing Multi-Role Proposal Workflows in Laravel for University PKM Management',
                'category' => 'Web Dev',
                'date' => '2026-10-29',
                'read_time' => $isId ? '5 menit baca' : '5 min read',
                'image' => 'images/blog/multi-role-pkm-system-laravel.svg',
                'related_project' => 'pkm-proposal-submission',
                'excerpt' => $isId
                    ? 'Bagaimana menyusun hak akses bersih untuk Mahasiswa, Dosen, Reviewer, dan Operator dalam sistem informasi 10 skema PKM menggunakan Laravel & PHP 8.3.'
                    : 'Structuring clean authorization and review states for Students, Lecturers, Reviewers, and Operators across 10 PKM funding schemes in Laravel & PHP 8.3.',
                'sections' => $isId
                    ? [
                        ['heading' => 'Memetakan 4 Aktor dan 10 Skema PKM', 'body' => 'Sistem informasi kampus jarang sesederhana CRUD biasa. Pada proyek PKMProposalSubmision untuk Universitas Udayana, setiap proposal melewati siklus hidup mulai dari pengajuan tim mahasiswa, validasi dosen pembimbing, penugasan reviewer oleh operator, hingga penilaian akhir sesuai 10 skema PKM.'],
                        ['heading' => 'Menjaga Batas Hak Akses Tetap Rapi', 'body' => 'Memanfaatkan middleware peran, policy Laravel, dan transisi status yang eksplisit mencegah perubahan data di luar tahap yang diizinkan serta membuat tampilan dashboard setiap peran tetap fokus pada tugas utamanya.'],
                    ]
                    : [
                        ['heading' => 'Mapping 4 User Roles Across 10 PKM Schemes', 'body' => 'University workflow apps go well beyond simple CRUD. In PKMProposalSubmision, every proposal moves from student drafting to lecturer validation, operator assignment, and reviewer scoring across 10 official schemes.'],
                        ['heading' => 'Keeping Authorization & State Transitions Clean', 'body' => 'Using Laravel role middleware, explicit state transitions, and focused per-role dashboards ensures each actor only sees actionable items while protecting data integrity.'],
                    ],
            ],
            [
                'slug' => 'production-booking-architecture-typescript',
                'title' => $isId
                    ? 'Membangun Sistem Reservasi Standar Produksi: Automated Testing, Audit Trail & Midtrans'
                    : 'Engineering Production-Grade Booking Systems: Testing, Audit Trails & Midtrans',
                'category' => 'Web Dev',
                'date' => '2026-11-04',
                'read_time' => $isId ? '6 menit baca' : '6 min read',
                'image' => 'images/blog/production-booking-architecture-typescript.svg',
                'related_project' => 'sagara-villas',
                'excerpt' => $isId
                    ? 'Pelajaran teknis dari membangun Sagara Villas dan GreenView Apartment: mencegah konflik jadwal, mengamankan ekspor CSV, dan menjaga 108 tes tetap hijau.'
                    : 'Engineering lessons from Sagara Villas and GreenView Apartment: conflict-free scheduling, audit logging, safe CSV export, and maintaining 108 passing tests.',
                'sections' => $isId
                    ? [
                        ['heading' => 'Mengapa Aplikasi Reservasi Butuh Disiplin Pengujian', 'body' => 'Kesalahan kecil pada logika rentang tanggal atau status pembayaran di sistem booking langsung berdampak pada operasional nyata. Di Sagara Villas, kami menulis 108 automated tests di 17 berkas uji untuk mengunci aturan ketersediaan, mutasi status, dan keamanan ekspor laporan.'],
                        ['heading' => 'Audit Trail & Keamanan Ekspor CSV', 'body' => 'Setiap perubahan data reservasi dan pembayaran dicatat dalam audit trail agar operator selalu mengetahui siapa mengubah apa. Selain itu, seluruh kolom teks pada ekspor CSV disanitasi terhadap CSV formula injection sebelum diunduh.'],
                    ]
                    : [
                        ['heading' => 'Why Booking Logic Demands Automated Testing', 'body' => 'Small off-by-one bugs in date overlap checks or payment status transitions quickly break hospitality operations. In Sagara Villas, 108 automated tests across 17 test files guard availability rules, mutations, and exports.'],
                        ['heading' => 'Audit Trails & Safe Reporting', 'body' => 'Recording an immutable audit trail per booking mutation gives operators full accountability, while escaping leading formula characters protects exported CSV reports in spreadsheet tools.'],
                    ],
            ],
        ];
    }

    public static function links(string $locale = 'id'): array
    {
        $isId = $locale === 'id';

        return [
            [
                'title' => 'GitHub — @pramacoder',
                'category' => 'Profile',
                'description' => $isId ? '38 repositori publik mencakup proyek Laravel, Next.js, TypeScript, AI/ML, NLP, dan IoT.' : '38 public repositories spanning Laravel, Next.js, TypeScript, AI/ML, NLP, and IoT.',
                'url' => 'https://github.com/pramacoder',
                'tag' => 'github.com/pramacoder',
            ],
            [
                'title' => 'Dwipa Store — B2B Food Supply Bali',
                'category' => 'Live App',
                'description' => $isId ? 'Platform B2B grosir sembako & distribusi 4 sesi harian untuk restoran dan hotel di Bali.' : 'B2B wholesale grocery & 4-session daily restaurant supply platform in Bali.',
                'url' => 'https://dwipa.store/',
                'tag' => 'dwipa.store',
            ],
            [
                'title' => 'Nayana Villa — Live Demo',
                'category' => 'Live App',
                'description' => $isId ? 'Demo langsung situs vila mewah tropis dwibahasa (Next.js 14 + next-intl).' : 'Live bilingual luxury tropical villa web application (Next.js 14 + next-intl).',
                'url' => 'https://demo-villa.pramajaya.com/',
                'tag' => 'demo-villa.pramajaya.com',
            ],
            [
                'title' => 'Undangan Pernikahan Guswik & Fitri',
                'category' => 'Live App',
                'description' => $isId ? 'Undangan digital pernikahan adat Bali (Pawiwahan & Resepsi) dengan cover interaktif.' : 'Interactive Balinese digital wedding invitation (Pawiwahan & Reception).',
                'url' => 'https://guswik-fitri-weddinginvitation.pramajaya.com/',
                'tag' => 'guswik-fitri-weddinginvitation.pramajaya.com',
            ],
            [
                'title' => 'Undangan Digital Mepandes (Manusa Yadnya)',
                'category' => 'Live App',
                'description' => $isId ? 'Undangan digital resmi Upacara Manusa Yadnya Mepandes di Tabanan, Bali.' : 'Official Balinese Manusa Yadnya Mepandes ceremony digital invitation.',
                'url' => 'https://mepandes-agungfernando.pramajaya.com/',
                'tag' => 'mepandes-agungfernando.pramajaya.com',
            ],
            [
                'title' => 'Deteksi Tuberkulosis CNN — Live Demo',
                'category' => 'Live App',
                'description' => $isId ? 'Aplikasi web demonstrasi skrining Tuberkulosis berbasis Convolutional Neural Network.' : 'Live web demo for CNN-based chest X-ray Tuberculosis screening.',
                'url' => 'https://deteksi-tuberkulosis-cnn.vercel.app',
                'tag' => 'deteksi-tuberkulosis-cnn.vercel.app',
            ],
            [
                'title' => 'Sagara Villas Repository',
                'category' => 'Repository',
                'description' => $isId ? 'Sistem reservasi villa full-stack Next.js & TypeScript dengan 108 automated tests.' : 'Full-stack Next.js & TypeScript villa booking platform with 108 automated tests.',
                'url' => 'https://github.com/pramacoder/VillaBookingSystem',
                'tag' => 'VillaBookingSystem',
            ],
            [
                'title' => 'Academic IR Repository',
                'category' => 'Repository',
                'description' => $isId ? 'Mesin pencari dokumen akademik TF-IDF VSM & Okapi BM25 dengan FastAPI + Next.js 15.' : 'TF-IDF VSM & Okapi BM25 academic search engine with FastAPI + Next.js 15.',
                'url' => 'https://github.com/pramacoder/TemuKembaliInformasi',
                'tag' => 'TemuKembaliInformasi',
            ],
            [
                'title' => 'PKM Proposal Submission Repository',
                'category' => 'Repository',
                'description' => $isId ? 'Sistem informasi pengajuan & penilaian 10 skema PKM Universitas Udayana (Laravel).' : 'Universitas Udayana 10-scheme PKM proposal workflow built with Laravel.',
                'url' => 'https://github.com/pramacoder/PKMProposalSubmision',
                'tag' => 'PKMProposalSubmision',
            ],
            [
                'title' => 'Bisnis.com News NLP Repository',
                'category' => 'Repository',
                'description' => $isId ? 'Benchmark klasifikasi 11 kategori berita bisnis Indonesia (SVM, CNN-BiLSTM, IndoBERT).' : '11-class Indonesian business news classification benchmark (SVM, CNN-BiLSTM, IndoBERT).',
                'url' => 'https://github.com/pramacoder/BisnisComNewsClassification',
                'tag' => 'BisnisComNewsClassification',
            ],
            [
                'title' => $isId ? 'Unduh CV Pramajaya (PDF)' : 'Download Pramajaya CV (PDF)',
                'category' => 'Document',
                'description' => $isId ? 'Ringkasan profil, pendidikan Informatika Universitas Udayana, proyek GitHub, dan keahlian.' : 'Concise PDF resume summarizing education, verified GitHub projects, and technical stack.',
                'url' => asset('documents/cv-pramajaya.pdf'),
                'tag' => 'cv-pramajaya.pdf',
            ],
        ];
    }
}
