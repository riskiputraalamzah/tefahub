<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Profil Resmi SMK Antartika 1 Sidoarjo di TefaHub — Sekolah vokasi teknik unggulan terakreditasi A (Unggul) sejak 1974. Visi, 5 program keahlian (TPM, TKR, RPL, TITL, TEI), kemitraan 100+ industri DUDI, serta fasilitas workshop industri modern.">
    <title>Profil Sekolah — SMK Antartika 1 Sidoarjo | Tefa-Hub</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Caveat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profil.landing.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'profil'" />

    <!-- Ambient background glows -->
    <div class="profil-ambient-glow profil-glow-top-right" aria-hidden="true"></div>
    <div class="profil-ambient-glow profil-glow-mid-left" aria-hidden="true"></div>
    <div class="profil-ambient-glow profil-glow-bottom-right" aria-hidden="true"></div>

    {{-- ═══════════════════════════════════════════
         1. HERO SECTION & IDENTITAS SEKOLAH
         ═══════════════════════════════════════════ --}}
    <section class="profil-hero-section">
        <!-- Ambient decorative wave shapes matching reference design -->
        <div class="profil-hero-bg-waves" aria-hidden="true">
            <svg class="profil-wave-shape profil-wave-left" viewBox="0 0 600 600" fill="none">
                <path d="M-80,80 C120,-10 260,180 160,420 C90,560 -80,520 -80,520 Z" fill="url(#waveGradLeft)" opacity="0.45"/>
                <defs>
                    <linearGradient id="waveGradLeft" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#bfdbfe" stop-opacity="0.6"/>
                        <stop offset="100%" stop-color="#dbeafe" stop-opacity="0"/>
                    </linearGradient>
                </defs>
            </svg>
            <svg class="profil-wave-shape profil-wave-right" viewBox="0 0 700 700" fill="none">
                <path d="M700,40 C560,110 420,260 520,500 C590,660 700,620 700,620 Z" fill="url(#waveGradRight)" opacity="0.4"/>
                <defs>
                    <linearGradient id="waveGradRight" x1="1" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#bfdbfe" stop-opacity="0.55"/>
                        <stop offset="100%" stop-color="#e0e7ff" stop-opacity="0"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>

        <div class="profil-wrap">
            <div class="profil-hero-container">
                
                {{-- Decorative Dot Pattern Center (3 cols x 6 rows) --}}
                <div class="profil-deco-dots-center" aria-hidden="true">
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                </div>

                <div class="profil-hero-grid">
                    
                    {{-- Left Content Column --}}
                    <div class="profil-hero-content">
                        {{-- Badge Pill --}}
                        <div class="profil-badge-pill">
                            <svg class="profil-badge-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            </svg>
                            <span>Profil Resmi Sekolah</span>
                        </div>

                        {{-- Hero Title --}}
                        <h1 class="profil-hero-title">
                            <span class="profil-title-dark">SMK Antartika 1</span>
                            <span class="profil-title-blue">Sidoarjo</span>
                        </h1>

                        {{-- Hero Description / Lead --}}
                        <p class="profil-hero-lead">
                            SMK Antartika 1 Sidoarjo merupakan sekolah vokasi teknik di bawah naungan <strong>Yayasan Pendidikan Wahyuhana Surabaya</strong>. Berdiri sejak <strong>1974</strong>, sekolah ini berfokus membentuk lulusan yang kompeten, berkarakter, siap bekerja, melanjutkan pendidikan, maupun berwirausaha.
                        </p>

                        {{-- 3 Quick Meta Stats Row --}}
                        <div class="profil-stats-row">
                            <div class="profil-stat-box">
                                <div class="profil-stat-icon">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                </div>
                                <div class="profil-stat-text">
                                    <span class="profil-stat-label">Tahun Berdiri</span>
                                    <strong class="profil-stat-value">Sejak 1974</strong>
                                </div>
                            </div>

                            <div class="profil-stat-box">
                                <div class="profil-stat-icon">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="8" r="7"/>
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                                    </svg>
                                </div>
                                <div class="profil-stat-text">
                                    <span class="profil-stat-label">Status Akreditasi</span>
                                    <strong class="profil-stat-value">A (Unggul)</strong>
                                </div>
                            </div>

                            <div class="profil-stat-box">
                                <div class="profil-stat-icon">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 21h18"/>
                                        <path d="M19 21v-8a2 2 0 0 0-2-2h-3v10"/>
                                        <path d="M5 21V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v16"/>
                                        <line x1="8" y1="7" x2="10" y2="7"/>
                                        <line x1="8" y1="11" x2="10" y2="11"/>
                                        <line x1="8" y1="15" x2="10" y2="15"/>
                                    </svg>
                                </div>
                                <div class="profil-stat-text">
                                    <span class="profil-stat-label">Mitra Industri</span>
                                    <strong class="profil-stat-value">100+ DUDI</strong>
                                </div>
                            </div>
                        </div>

                        {{-- CTA Button --}}
                        <div class="profil-hero-cta-wrap">
                            <a href="#informasi-lengkap" class="profil-hero-btn-primary">
                                <span>Jelajahi Profil Lengkap</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <polyline points="19 12 12 19 5 12"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Right Visual Showcase Box --}}
                    <div class="profil-hero-visual">
                        {{-- Decorative Yellow Rays Top-Right --}}
                        <div class="profil-deco-rays" aria-hidden="true">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 36C10 28 20 22 36 18" stroke="#F59E0B" stroke-width="4.5" stroke-linecap="round"/>
                                <path d="M12 40C18 34 28 30 40 28" stroke="#FBBF24" stroke-width="4" stroke-linecap="round"/>
                                <path d="M2 28C8 18 18 10 32 6" stroke="#FBBF24" stroke-width="4" stroke-linecap="round"/>
                                <path d="M22 4C20 14 16 26 8 38" stroke="#F59E0B" stroke-width="3.5" stroke-linecap="round"/>
                            </svg>
                        </div>

                        {{-- School Gate Photo Card (Thick White Frame & Elevation) --}}
                        <div class="profil-hero-img-card">
                            <img src="{{ asset('assets/image copy 3.png') }}" srcset="{{ asset('assets/image copy 3.png') }} 1x, {{ asset('assets/image copy 3.png') }} 2x" alt="Gerbang dan Gedung SMK Antartika 1 Sidoarjo" class="profil-hero-img" width="620" height="390" onerror="this.onerror=null; this.src='{{ asset('assets/image copy 3.png') }}';" loading="eager" fetchpriority="high">
                        </div>

                        {{-- Floating Location Card at Bottom-Right --}}
                        <a href="#kontak-resmi" class="profil-floating-location-card">
                            <div class="profil-floating-loc-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <div class="profil-floating-loc-info">
                                <h4 class="profil-floating-loc-title">Lokasi Sekolah</h4>
                                <p class="profil-floating-loc-sub">Jl. Raya Sidoarjo No. 1, Sidoarjo</p>
                            </div>
                            <div class="profil-floating-loc-arrow">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </div>
                        </a>

                        {{-- Decorative Dot Pattern Bottom-Right --}}
                        <div class="profil-deco-dots-bottom" aria-hidden="true">
                            <span></span><span></span><span></span>
                            <span></span><span></span><span></span>
                            <span></span><span></span><span></span>
                            <span></span><span></span><span></span>
                            <span></span><span></span><span></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         2. HORIZONTAL PILL TABS NAVIGATION (REFERENCE DESIGN)
         ═══════════════════════════════════════════ --}}
    <section class="profil-nav-tabs-section" id="informasi-lengkap">
        <div class="profil-wrap">
            <div class="profil-nav-tabs-bar" role="tablist" aria-label="Navigasi Profil Sekolah">
                
                {{-- 1. Tentang Sekolah (Active by default) --}}
                <button type="button" class="profil-nav-tab-btn is-active" data-target="tab-tentang" role="tab" aria-selected="true" aria-controls="tab-tentang">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                    <span>Tentang Sekolah</span>
                </button>

                {{-- 2. Visi & Misi --}}
                <button type="button" class="profil-nav-tab-btn" data-target="tab-visi-misi" role="tab" aria-selected="false" aria-controls="tab-visi-misi">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <circle cx="12" cy="12" r="6"/>
                        <circle cx="12" cy="12" r="2"/>
                    </svg>
                    <span>Visi &amp; Misi</span>
                </button>

                {{-- 3. Jurusan --}}
                <button type="button" class="profil-nav-tab-btn" data-target="tab-jurusan" role="tab" aria-selected="false" aria-controls="tab-jurusan">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                    <span>Jurusan</span>
                </button>

                {{-- 4. Fasilitas --}}
                <button type="button" class="profil-nav-tab-btn" data-target="tab-fasilitas" role="tab" aria-selected="false" aria-controls="tab-fasilitas">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2"/>
                        <line x1="9" y1="22" x2="9" y2="22.01"/>
                        <line x1="15" y1="22" x2="15" y2="22.01"/>
                        <line x1="8" y1="6" x2="16" y2="6"/>
                        <line x1="8" y1="10" x2="16" y2="10"/>
                        <line x1="8" y1="14" x2="16" y2="14"/>
                        <line x1="8" y1="18" x2="16" y2="18"/>
                    </svg>
                    <span>Fasilitas</span>
                </button>

                {{-- 5. Prestasi --}}
                <button type="button" class="profil-nav-tab-btn" data-target="tab-prestasi" role="tab" aria-selected="false" aria-controls="tab-prestasi">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/>
                        <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/>
                        <path d="M4 22h16"/>
                        <path d="M10 14.66V17c0 .55-.45 1-1 1H8c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1h8c.55 0 1-.45 1-1v-1c0-.55-.45-1-1-1h-1c-.55 0-1-.45-1-1v-2.34"/>
                        <path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/>
                    </svg>
                    <span>Prestasi</span>
                </button>

                {{-- 6. Galeri --}}
                <button type="button" class="profil-nav-tab-btn" data-target="tab-galeri" role="tab" aria-selected="false" aria-controls="tab-galeri">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                    <span>Galeri</span>
                </button>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         2. MAIN DASHBOARD CONTENT (TAB PANELS)
         ═══════════════════════════════════════════ --}}
    <section class="profil-main-dashboard-section">
        <div class="profil-wrap">
            
            {{-- ───────────────────────────────────────────
                 PANEL 1: TENTANG SEKOLAH (PERSIS REFERENSI USER)
                 ─────────────────────────────────────────── --}}
            <div class="profil-tab-pane is-active" id="tab-tentang" role="tabpanel" aria-labelledby="tab-btn-tentang">
                <div class="profil-dash-grid">
                    
                    {{-- ── Left Main Column ── --}}
                    <div class="profil-dash-main-col">
                        
                        {{-- Card 1: Tentang Sekolah --}}
                        <div class="profil-dash-card">
                            <div class="profil-dash-head">
                                <div class="profil-dash-icon-blue">
                                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                        <polyline points="9 22 9 12 15 12 15 22"/>
                                    </svg>
                                </div>
                                <h2 class="profil-dash-title">Tentang Sekolah</h2>
                            </div>

                            <p class="profil-dash-desc">
                                SMK Antartika 1 Sidoarjo adalah sekolah menengah kejuruan yang berkomitmen untuk menghasilkan lulusan yang unggul di bidang teknologi, berdaya saing tinggi, dan berkarakter. Dengan dukungan tenaga pendidik profesional, fasilitas yang memadai, serta kerja sama dengan berbagai industri, kami terus berupaya mencetak generasi siap kerja dan siap menghadapi tantangan masa depan.
                            </p>

                            {{-- 4 Feature Items Grid --}}
                            <div class="profil-feature-grid">
                                
                                {{-- 1. Pendidikan Berkualitas --}}
                                <div class="profil-feature-card">
                                    <div class="profil-feature-icon">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                        </svg>
                                    </div>
                                    <h3 class="profil-feature-heading">Pendidikan Berkualitas</h3>
                                    <p class="profil-feature-sub">Dengan kurikulum yang relevan dengan industri.</p>
                                </div>

                                {{-- 2. Tenaga Pendidik Profesional --}}
                                <div class="profil-feature-card">
                                    <div class="profil-feature-icon">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                            <circle cx="9" cy="7" r="4"/>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                        </svg>
                                    </div>
                                    <h3 class="profil-feature-heading">Tenaga Pendidik Profesional</h3>
                                    <p class="profil-feature-sub">Berpengalaman dan berkompeten di bidangnya.</p>
                                </div>

                                {{-- 3. Fasilitas Lengkap --}}
                                <div class="profil-feature-card">
                                    <div class="profil-feature-icon">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="3"/>
                                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                        </svg>
                                    </div>
                                    <h3 class="profil-feature-heading">Fasilitas Lengkap</h3>
                                    <p class="profil-feature-sub">Mendukung proses belajar mengajar yang optimal.</p>
                                </div>

                                {{-- 4. Kerja Sama Industri --}}
                                <div class="profil-feature-card">
                                    <div class="profil-feature-icon">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"/>
                                            <path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.7-2.9l-3.2 2.5"/>
                                            <path d="m2 13 6 6"/>
                                        </svg>
                                    </div>
                                    <h3 class="profil-feature-heading">Kerja Sama Industri</h3>
                                    <p class="profil-feature-sub">Untuk membuka peluang karier yang lebih luas.</p>
                                </div>

                            </div>
                        </div>

                        {{-- Card 2: Program Keahlian --}}
                        <div class="profil-keahlian-card">
                            <div class="profil-keahlian-head">
                                <div class="profil-dash-icon-blue">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                    </svg>
                                </div>
                                <h3 class="profil-dash-title" style="font-size: 1.2rem;">Program Keahlian</h3>
                            </div>
                            <p class="profil-keahlian-sub">
                                Kami menyediakan 5 jurusan unggulan yang siap membekali siswa dengan keterampilan sesuai kebutuhan industri.
                            </p>

                            {{-- 5 Jurusan Row Cards --}}
                            <div class="profil-jurusan-row-grid">
                                
                                {{-- 1. RPL --}}
                                <div class="profil-jurusan-mini-card">
                                    <div class="profil-jurusan-mini-badge badge-rpl">
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="16 18 22 12 16 6"/>
                                            <polyline points="8 6 2 12 8 18"/>
                                        </svg>
                                    </div>
                                    <div class="profil-jurusan-mini-info">
                                        <span class="profil-jurusan-mini-code">RPL</span>
                                        <span class="profil-jurusan-mini-name">Rekayasa Perangkat Lunak</span>
                                    </div>
                                </div>

                                {{-- 2. TKR --}}
                                <div class="profil-jurusan-mini-card">
                                    <div class="profil-jurusan-mini-badge badge-tkr">
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="1" y="3" width="15" height="13"/>
                                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                                            <circle cx="5.5" cy="18.5" r="2.5"/>
                                            <circle cx="18.5" cy="18.5" r="2.5"/>
                                        </svg>
                                    </div>
                                    <div class="profil-jurusan-mini-info">
                                        <span class="profil-jurusan-mini-code">TKR</span>
                                        <span class="profil-jurusan-mini-name">Teknik Kendaraan Ringan</span>
                                    </div>
                                </div>

                                {{-- 3. TEI --}}
                                <div class="profil-jurusan-mini-card">
                                    <div class="profil-jurusan-mini-badge badge-tei">
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"/>
                                            <rect x="9" y="9" width="6" height="6"/>
                                            <line x1="9" y1="1" x2="9" y2="4"/>
                                            <line x1="15" y1="1" x2="15" y2="4"/>
                                        </svg>
                                    </div>
                                    <div class="profil-jurusan-mini-info">
                                        <span class="profil-jurusan-mini-code">TEI</span>
                                        <span class="profil-jurusan-mini-name">Teknik Elektronika Industri</span>
                                    </div>
                                </div>

                                {{-- 4. TITL --}}
                                <div class="profil-jurusan-mini-card">
                                    <div class="profil-jurusan-mini-badge badge-titl">
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                                        </svg>
                                    </div>
                                    <div class="profil-jurusan-mini-info">
                                        <span class="profil-jurusan-mini-code">TITL</span>
                                        <span class="profil-jurusan-mini-name">Teknik Instalasi Tenaga Listrik</span>
                                    </div>
                                </div>

                                {{-- 5. TPM --}}
                                <div class="profil-jurusan-mini-card">
                                    <div class="profil-jurusan-mini-badge badge-tpm">
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="3"/>
                                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                        </svg>
                                    </div>
                                    <div class="profil-jurusan-mini-info">
                                        <span class="profil-jurusan-mini-code">TPM</span>
                                        <span class="profil-jurusan-mini-name">Teknik Pemesinan</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    {{-- ── Right Sidebar Column ── --}}
                    <div class="profil-dash-side-col">
                        
                        {{-- Card 1: Informasi Singkat --}}
                        <div class="profil-info-card">
                            <div class="profil-dash-head" style="margin-bottom: 6px;">
                                <div class="profil-dash-icon-blue">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"/>
                                        <line x1="12" y1="16" x2="12" y2="12"/>
                                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                                    </svg>
                                </div>
                                <h3 class="profil-dash-title" style="font-size: 1.15rem;">Informasi Singkat</h3>
                            </div>

                            <div class="profil-info-list">
                                {{-- Nama Sekolah --}}
                                <div class="profil-info-item">
                                    <div class="profil-info-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                        </svg>
                                    </div>
                                    <span class="profil-info-label">Nama Sekolah</span>
                                    <span class="profil-info-val">: SMK Antartika 1 Sidoarjo</span>
                                </div>

                                {{-- NPSN --}}
                                <div class="profil-info-item">
                                    <div class="profil-info-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                        </svg>
                                    </div>
                                    <span class="profil-info-label">NPSN</span>
                                    <span class="profil-info-val">: 20501717</span>
                                </div>

                                {{-- Alamat --}}
                                <div class="profil-info-item">
                                    <div class="profil-info-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                    </div>
                                    <span class="profil-info-label">Alamat</span>
                                    <span class="profil-info-val">: Jl. Raya Sidoarjo No. 1, Sidoarjo, Jawa Timur</span>
                                </div>

                                {{-- Telepon --}}
                                <div class="profil-info-item">
                                    <div class="profil-info-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                        </svg>
                                    </div>
                                    <span class="profil-info-label">Telepon</span>
                                    <span class="profil-info-val">: (031) 895XXXX</span>
                                </div>

                                {{-- Email --}}
                                <div class="profil-info-item">
                                    <div class="profil-info-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                            <polyline points="22,6 12,13 2,6"/>
                                        </svg>
                                    </div>
                                    <span class="profil-info-label">Email</span>
                                    <span class="profil-info-val">: smkantartika1.sda@gmail.com</span>
                                </div>
                            </div>

                            {{-- Google Maps Action Button --}}
                            <a href="https://maps.google.com/?q=SMK+Antartika+1+Sidoarjo" target="_blank" rel="noopener noreferrer" class="profil-maps-link-btn">
                                <div class="profil-maps-link-left">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    <span>Lihat Lokasi di Google Maps</span>
                                </div>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="9 18 15 12 9 6"/>
                                </svg>
                            </a>
                        </div>

                        {{-- Card 2: Bergabung Bersama Kami --}}
                        <div class="profil-join-card">
                            <div class="profil-join-head-row">
                                <div class="profil-join-head-left">
                                    <div class="profil-join-icon-box">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                        </svg>
                                    </div>
                                    <h4 class="profil-join-title">Bergabung Bersama Kami</h4>
                                </div>
                                {{-- 3 Yellow Rays Icon in Top-Right --}}
                                <div class="profil-join-rays">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.8" stroke-linecap="round">
                                        <line x1="12" y1="3" x2="12" y2="7"/>
                                        <line x1="18.36" y1="5.64" x2="15.53" y2="8.46"/>
                                        <line x1="21" y1="12" x2="17" y2="12"/>
                                    </svg>
                                </div>
                            </div>

                            <p class="profil-join-desc">
                                Wujudkan masa depan cerah dengan pendidikan vokasi terbaik di SMK Antartika 1 Sidoarjo
                            </p>

                            <a href="{{ route('ppdb') }}" class="profil-join-btn">
                                <span>Daftar Sekarang</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </a>
                        </div>

                    </div>

                </div>
            </div>

            {{-- ───────────────────────────────────────────
                 PANEL 2: VISI & MISI
                 ─────────────────────────────────────────── --}}
            <div class="profil-tab-pane" id="tab-visi-misi" role="tabpanel" aria-labelledby="tab-btn-visi-misi">
                <div class="profil-visi-grid">
                    
                    {{-- Visi Sekolah Card --}}
                    <div class="profil-visi-card">
                        <div>
                            <svg class="profil-visi-quote-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                            <div class="profil-visi-heading">Visi Sekolah</div>
                            <p class="profil-visi-text">
                                “Menjadi sekolah vokasi unggulan yang menghasilkan lulusan kompeten, berkarakter, berdaya saing global, dan berkontribusi bagi kemajuan bangsa.”
                            </p>
                        </div>

                        <a href="https://www.smkantartika1sda.sch.id/about/" target="_blank" rel="noopener noreferrer" class="profil-link-official">
                            <span>Lihat Profil Resmi Visi &amp; Misi</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                    {{-- Karakter Pendidikan Card --}}
                    <div class="profil-karakter-card">
                        <div class="profil-karakter-header">
                            <span class="profil-section-tag">Kurikulum &amp; Ekosistem</span>
                            <h2 class="profil-karakter-title">Karakter Pendidikan</h2>
                            <p class="profil-karakter-desc">
                                Pendidikan di SMK Antartika 1 Sidoarjo memadukan kompetensi kejuruan, pembelajaran berbasis proyek (PjBL), Teaching Factory (TEFA), sertifikasi profesi (LSP/BNSP), budaya kerja industri 5R, penguatan karakter, dan kesiapan karier BMW.
                            </p>
                        </div>

                        {{-- BMW Readiness Pills --}}
                        <div>
                            <div class="profil-meta-label" style="margin-bottom: 8px;">Kesiapan Karier BMW:</div>
                            <div class="profil-bmw-pills">
                                <div class="profil-bmw-pill">
                                    <span class="profil-bmw-letter">B</span>
                                    <span class="profil-bmw-label">Bekerja di Industri</span>
                                </div>
                                <div class="profil-bmw-pill">
                                    <span class="profil-bmw-letter">M</span>
                                    <span class="profil-bmw-label">Melanjutkan Kuliah</span>
                                </div>
                                <div class="profil-bmw-pill">
                                    <span class="profil-bmw-letter">W</span>
                                    <span class="profil-bmw-label">Wirausaha Mandiri</span>
                                </div>
                            </div>

                            {{-- 5R Industrial Culture --}}
                            <div class="profil-meta-label" style="margin-bottom: 8px; margin-top: 14px;">Budaya Kerja Industri 5R:</div>
                            <div class="profil-5r-row">
                                <span class="profil-5r-tag">1. Ringkas</span>
                                <span class="profil-5r-tag">2. Rapi</span>
                                <span class="profil-5r-tag">3. Resik</span>
                                <span class="profil-5r-tag">4. Rawat</span>
                                <span class="profil-5r-tag">5. Rajin</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ───────────────────────────────────────────
                 PANEL 3: JURUSAN (5 PROGRAM KEAHLIAN)
                 ─────────────────────────────────────────── --}}
            <div class="profil-tab-pane" id="tab-jurusan" role="tabpanel" aria-labelledby="tab-btn-jurusan">
                <div class="profil-jurusan-grid">
                    
                    {{-- 1. Teknik Pemesinan (TPM) --}}
                    <div class="profil-jurusan-card">
                        <div>
                            <div class="profil-jurusan-icon-box icon-box-tp">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                            </div>
                            <div class="profil-jurusan-code">TPM — Teknik Pemesinan</div>
                            <h3 class="profil-jurusan-name">Teknik Pemesinan</h3>
                        </div>
                        <div class="profil-jurusan-fokus-box">
                            <div class="profil-jurusan-fokus-label">Fokus Kompetensi</div>
                            <div class="profil-jurusan-fokus-text">CNC, bubut, frais, manufaktur presisi, CAD/CAM</div>
                        </div>
                    </div>

                    {{-- 2. Teknik Kendaraan Ringan (TKR) --}}
                    <div class="profil-jurusan-card">
                        <div>
                            <div class="profil-jurusan-icon-box icon-box-tkr">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="3" width="15" height="13"></rect>
                                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                </svg>
                            </div>
                            <div class="profil-jurusan-code">TKR — Otomotif</div>
                            <h3 class="profil-jurusan-name">Teknik Kendaraan Ringan</h3>
                        </div>
                        <div class="profil-jurusan-fokus-box">
                            <div class="profil-jurusan-fokus-label">Fokus Kompetensi</div>
                            <div class="profil-jurusan-fokus-text">Diagnostik otomotif, EFI, perawatan kendaraan, tune up</div>
                        </div>
                    </div>

                    {{-- 3. Rekayasa Perangkat Lunak (RPL) --}}
                    <div class="profil-jurusan-card">
                        <div>
                            <div class="profil-jurusan-icon-box icon-box-rpl">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="16 18 22 12 16 6"></polyline>
                                    <polyline points="8 6 2 12 8 18"></polyline>
                                </svg>
                            </div>
                            <div class="profil-jurusan-code">RPL — Software Engineering</div>
                            <h3 class="profil-jurusan-name">Rekayasa Perangkat Lunak</h3>
                        </div>
                        <div class="profil-jurusan-fokus-box">
                            <div class="profil-jurusan-fokus-label">Fokus Kompetensi</div>
                            <div class="profil-jurusan-fokus-text">Web, aplikasi mobile, basis data, cloud, UI/UX, AI</div>
                        </div>
                    </div>

                    {{-- 4. Teknik Instalasi Tenaga Listrik (TITL) --}}
                    <div class="profil-jurusan-card">
                        <div>
                            <div class="profil-jurusan-icon-box icon-box-titl">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                </svg>
                            </div>
                            <div class="profil-jurusan-code">TITL — Ketenagalistrikan</div>
                            <h3 class="profil-jurusan-name">Teknik Instalasi Tenaga Listrik</h3>
                        </div>
                        <div class="profil-jurusan-fokus-box">
                            <div class="profil-jurusan-fokus-label">Fokus Kompetensi</div>
                            <div class="profil-jurusan-fokus-text">Instalasi industri, panel, motor listrik, PLC, energi</div>
                        </div>
                    </div>

                    {{-- 5. Teknik Elektronika Industri (TEI) --}}
                    <div class="profil-jurusan-card">
                        <div>
                            <div class="profil-jurusan-icon-box icon-box-tei">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                </svg>
                            </div>
                            <div class="profil-jurusan-code">TEI — Otomasi &amp; Robotika</div>
                            <h3 class="profil-jurusan-name">Teknik Elektronika Industri</h3>
                        </div>
                        <div class="profil-jurusan-fokus-box">
                            <div class="profil-jurusan-fokus-label">Fokus Kompetensi</div>
                            <div class="profil-jurusan-fokus-text">Otomasi industri, robotika, IoT, instrumentasi, mikrokontroler</div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ───────────────────────────────────────────
                 PANEL 4: FASILITAS SEKOLAH
                 ─────────────────────────────────────────── --}}
            <div class="profil-tab-pane" id="tab-fasilitas" role="tabpanel" aria-labelledby="tab-btn-fasilitas">
                <div class="profil-fasilitas-grid">
                    
                    {{-- Kolom 1: Bengkel & Laboratorium Vokasi --}}
                    <div class="profil-fasilitas-col">
                        <h3 class="profil-fasilitas-col-title">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                            </svg>
                            Bengkel &amp; Laboratorium Kejuruan
                        </h3>
                        <p class="profil-fasilitas-col-desc">
                            Dirancang sesuai tata ruang bengkel industri nyata dengan penerapan standar K3 dan 5R:
                        </p>

                        <ul class="profil-fasilitas-list">
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Workshop Pemesinan CNC &amp; Konvensional</strong>
                                    <span>Mesin CNC bubut, frais presisi, gerinda datar, dan peralatan manufaktur modern.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Bengkel Otomotif EFI &amp; Scanner Diagnostik</strong>
                                    <span>Engine stand EFI terkini, car lift, balancing, scanner komputer diagnostik multi-brand.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Laboratorium Komputer RPL &amp; Software Studio</strong>
                                    <span>PC berspesifikasi tinggi untuk web development, mobile app, cloud, dan UI/UX design.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Lab Instalasi Tenaga Listrik &amp; PLC</strong>
                                    <span>Panel kontrol industri, trainer instalasi motor listrik 3-fasa, trainer PLC Omron &amp; Schneider.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Lab Elektronika, IoT &amp; Robotika</strong>
                                    <span>Trainer mikrokontroler, instrumentasi osiloskop digital, modul IoT, dan platform robotik otomatisasi.</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Kolom 2: Fasilitas Penunjang Sekolah --}}
                    <div class="profil-fasilitas-col">
                        <h3 class="profil-fasilitas-col-title">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Fasilitas Pendukung Terpadu
                        </h3>
                        <p class="profil-fasilitas-col-desc">
                            Mendukung kenyamanan, literasi, bimbingan karier, dan kebugaran seluruh warga sekolah:
                        </p>

                        <ul class="profil-fasilitas-list">
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Perpustakaan &amp; E-Library</strong>
                                    <span>Koleksi buku teks kejuruan, literatur teknik, dan akses repositori digital terintegrasi.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Ruang Kelas Multimedia &amp; Smart Class</strong>
                                    <span>Dilengkapi proyektor interaktif, audio visual jernih, dan tata ruang ergonomis.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Bursa Kerja Khusus (BKK) &amp; Ruang Konseling BK</strong>
                                    <span>Layanan asesmen karier, konseling psikologis, wawancara kerja, dan rekrutmen alumni.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Musala, Lapangan Olahraga, Kantin &amp; Parkir Luas</strong>
                                    <span>Sarana ibadah representatif, lapangan futsal/basket, kantin higienis, dan area parkir tertata aman.</span>
                                </div>
                            </li>
                            <li class="profil-fasilitas-item">
                                <span class="profil-fasilitas-check">✓</span>
                                <div class="profil-fasilitas-item-text">
                                    <strong>Jaringan Internet Fiber Optik Berkecepatan Tinggi</strong>
                                    <span>Wi-Fi terdistribusi di seluruh area sekolah untuk menunjang kegiatan pembelajaran daring &amp; riset.</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            {{-- ───────────────────────────────────────────
                 PANEL 5: PRESTASI SEKOLAH & SISWA
                 ─────────────────────────────────────────── --}}
            <div class="profil-tab-pane" id="tab-prestasi" role="tabpanel" aria-labelledby="tab-btn-prestasi">
                <div class="profil-prestasi-grid">
                    
                    <div class="profil-dash-card">
                        <div class="profil-dash-head">
                            <div class="profil-dash-icon-blue">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M18 4H6v7a6 6 0 0 0 12 0V4z"/></svg>
                            </div>
                            <h3 class="profil-dash-title" style="font-size: 1.15rem;">Juara LKS Vokasi</h3>
                        </div>
                        <p class="profil-dash-desc" style="margin-bottom: 0;">
                            Meraih medali dan penghargaan pada Lomba Kompetensi Siswa (LKS) SMK tingkat Kabupaten Sidoarjo dan Provinsi Jawa Timur pada bidang CNC Turning, Auto Mobile Technology, Web Technology, dan Industrial Control.
                        </p>
                    </div>

                    <div class="profil-dash-card">
                        <div class="profil-dash-head">
                            <div class="profil-dash-icon-blue">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            </div>
                            <h3 class="profil-dash-title" style="font-size: 1.15rem;">Inovasi TEFA &amp; Robotik</h3>
                        </div>
                        <p class="profil-dash-desc" style="margin-bottom: 0;">
                            Penghargaan produk inovasi Teaching Factory terbaik berupa smart monitoring IoT, mesin perkakas pesanan industri, dan aplikasi enterprise siap pakai karya talenta siswa.
                        </p>
                    </div>

                    <div class="profil-dash-card">
                        <div class="profil-dash-head">
                            <div class="profil-dash-icon-blue">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                            </div>
                            <h3 class="profil-dash-title" style="font-size: 1.15rem;">Sertifikasi LSP-P1 BNSP</h3>
                        </div>
                        <p class="profil-dash-desc" style="margin-bottom: 0;">
                            Tingkat kelulusan uji kompetensi kejuruan berlisensi Badan Nasional Sertifikasi Profesi (BNSP) mencapai lebih dari 98% setiap tahunnya di semua 5 jurusan keahlian.
                        </p>
                    </div>

                </div>
            </div>

            <div class="profil-tab-pane" id="tab-galeri" role="tabpanel" aria-labelledby="tab-btn-galeri">
                <div class="profil-galeri-grid">
                    
                    <div class="profil-galeri-card">
                        <img src="{{ asset('assets/image copy 3.png') }}" alt="Gedung SMK Antartika 1 Sidoarjo" class="profil-galeri-img">
                        <div class="profil-galeri-info">
                            <strong class="profil-galeri-title">Gerbang Utama &amp; Gedung Pembelajaran</strong>
                            <span class="profil-galeri-sub">Kampus SMK Antartika 1 Sidoarjo</span>
                        </div>
                    </div>

                    <div class="profil-galeri-card">
                        <img src="{{ asset('assets/image copy.png') }}" alt="Kepala Sekolah &amp; Manajemen" class="profil-galeri-img">
                        <div class="profil-galeri-info">
                            <strong class="profil-galeri-title">Kepemimpinan &amp; Manajemen Vokasi</strong>
                            <span class="profil-galeri-sub">Pimpinan dan Tenaga Pendidik Profesional</span>
                        </div>
                    </div>

                    <div class="profil-galeri-card">
                        <img src="{{ asset('assets/logo.png') }}" alt="Teaching Factory TefaHub" class="profil-galeri-img" style="object-fit: contain; padding: 24px; background: #f8fafc;">
                        <div class="profil-galeri-info">
                            <strong class="profil-galeri-title">Ekosistem Teaching Factory</strong>
                            <span class="profil-galeri-sub">Kemitraan Industri &amp; Unit Produksi Nyata</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         3. KEMITRAAN INDUSTRI & BKK (> 100 MITRA DUDI)
         ═══════════════════════════════════════════ --}}
    <section class="profil-mitra-section" id="mitra-industri">
        <div class="profil-wrap">
            
            <div class="profil-section-header">
                <span class="profil-section-tag">LINK &amp; MATCH DUDI</span>
                <h2 class="profil-section-title">Kemitraan Industri dan BKK</h2>
                <p class="profil-section-desc">
                    Sekolah membangun jejaring dengan lebih dari <strong>100 mitra dunia usaha dan dunia industri</strong> untuk PKL, kelas industri, sinkronisasi kurikulum, sertifikasi, guru tamu, campus hiring, dan penyaluran kerja alumni.
                </p>
            </div>

            {{-- Sector Filter Tab Buttons --}}
            <div class="profil-mitra-filter-bar">
                <button type="button" class="profil-mitra-tab-btn is-active" data-sector="all">Semua Sektor (100+ Mitra)</button>
                <button type="button" class="profil-mitra-tab-btn" data-sector="teknologi">Teknologi</button>
                <button type="button" class="profil-mitra-tab-btn" data-sector="manufaktur">Manufaktur</button>
                <button type="button" class="profil-mitra-tab-btn" data-sector="otomotif">Otomotif</button>
                <button type="button" class="profil-mitra-tab-btn" data-sector="energi">Energi &amp; Kelistrikan</button>
                <button type="button" class="profil-mitra-tab-btn" data-sector="elektronika">Elektronika &amp; Otomasi</button>
            </div>

            {{-- Mitra Cards Grid --}}
            <div class="profil-mitra-grid" id="mitraGrid">
                
                {{-- Sektor Teknologi --}}
                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">PT Hummatech Digital Indonesia</div>
                        <div class="profil-mitra-sector">Sektor: Teknologi</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Maspion IT</div>
                        <div class="profil-mitra-sector">Sektor: Teknologi</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M2 12h20"></path></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Jagoan Hosting</div>
                        <div class="profil-mitra-sector">Sektor: Cloud &amp; Web Hosting</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">AMIGROUP</div>
                        <div class="profil-mitra-sector">Sektor: Teknologi</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2a10 10 0 0 1 10 10c0 5.523-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2z"></path></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">BISA AI</div>
                        <div class="profil-mitra-sector">Sektor: Artificial Intelligence</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Oracle Academy</div>
                        <div class="profil-mitra-sector">Sektor: Global Tech Certification</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">IT Brain Indonesia</div>
                        <div class="profil-mitra-sector">Sektor: Software House</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="teknologi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">UBIG</div>
                        <div class="profil-mitra-sector">Sektor: IT Solutions</div>
                    </div>
                </div>

                {{-- Sektor Manufaktur --}}
                <div class="profil-mitra-card" data-sector="manufaktur">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 20h20"></path><path d="M5 20V8l5 3V8l5 3V4l5 4v12"></path></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Maspion Group</div>
                        <div class="profil-mitra-sector">Sektor: Manufaktur</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="manufaktur">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">PT Astra Komponen Indonesia</div>
                        <div class="profil-mitra-sector">Sektor: Manufaktur Otomotif</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="manufaktur">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 20h20"></path><path d="M12 2l8 8H4l8-8z"></path></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">PT PAL Indonesia</div>
                        <div class="profil-mitra-sector">Sektor: Industri Maritim &amp; Manufaktur</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="manufaktur">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">PT Barata Indonesia</div>
                        <div class="profil-mitra-sector">Sektor: Rekayasa Industri &amp; Manufaktur</div>
                    </div>
                </div>

                {{-- Sektor Otomotif --}}
                <div class="profil-mitra-card" data-sector="otomotif">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Auto2000</div>
                        <div class="profil-mitra-sector">Sektor: Otomotif (Toyota)</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="otomotif">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Astra Daihatsu</div>
                        <div class="profil-mitra-sector">Sektor: Otomotif</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="otomotif">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">United Tractors</div>
                        <div class="profil-mitra-sector">Sektor: Alat Berat &amp; Otomotif</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="otomotif">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">United Motors Centre Suzuki</div>
                        <div class="profil-mitra-sector">Sektor: Otomotif</div>
                    </div>
                </div>

                {{-- Sektor Energi dan Kelistrikan --}}
                <div class="profil-mitra-card" data-sector="energi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">PLN (Persero)</div>
                        <div class="profil-mitra-sector">Sektor: Energi &amp; Kelistrikan</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="energi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Schneider Electric Indonesia</div>
                        <div class="profil-mitra-sector">Sektor: Otomasi Energi &amp; Panel Industri</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="energi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">PLN Nusantara Power</div>
                        <div class="profil-mitra-sector">Sektor: Pembangkit Listrik</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="energi">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Bambang Djaja Transformer</div>
                        <div class="profil-mitra-sector">Sektor: Manufaktur Transformator</div>
                    </div>
                </div>

                {{-- Sektor Elektronika dan Otomasi --}}
                <div class="profil-mitra-card" data-sector="elektronika">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Panasonic Manufacturing Indonesia</div>
                        <div class="profil-mitra-sector">Sektor: Elektronika &amp; Manufaktur</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="elektronika">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Omron Automation</div>
                        <div class="profil-mitra-sector">Sektor: Otomasi Industri &amp; Robotika</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="elektronika">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Petrokimia Gresik</div>
                        <div class="profil-mitra-sector">Sektor: Industri Kimia &amp; Instrumentasi</div>
                    </div>
                </div>

                <div class="profil-mitra-card" data-sector="elektronika">
                    <div class="profil-mitra-icon-circle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline></svg>
                    </div>
                    <div class="profil-mitra-info">
                        <div class="profil-mitra-name">Polytron</div>
                        <div class="profil-mitra-sector">Sektor: Elektronika Konsumen &amp; Otomasi</div>
                    </div>
                </div>

            </div>

            {{-- Official Mitra CTA Box --}}
            <div class="profil-mitra-cta-box">
                <p class="profil-mitra-cta-text">
                    Tertarik bermitra industri, menyelenggarakan campus hiring, atau sinkronisasi kurikulum dengan SMK Antartika 1 Sidoarjo?
                </p>
                <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
                    <a href="https://www.smkantartika1sda.sch.id/mitra-industri/" target="_blank" rel="noopener noreferrer" class="profil-btn-primary">
                        <span>Lihat Direktori Kemitraan Industri Resmi</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="7" y1="17" x2="17" y2="7"></line>
                            <polyline points="7 7 17 7 17 17"></polyline>
                        </svg>
                    </a>
                    <a href="{{ route('bkk') }}" class="profil-btn-secondary">
                        <span>Bursa Kerja Khusus (BKK) Tefa-Hub</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         6. FASILITAS UNGGULAN
         ═══════════════════════════════════════════ --}}
    <section class="profil-fasilitas-section" id="fasilitas">
        <div class="profil-wrap">
            
            <div class="profil-section-header">
                <span class="profil-section-tag">SARANA &amp; PRASARANA STANDAR INDUSTRI</span>
                <h2 class="profil-section-title">Fasilitas Unggulan</h2>
                <p class="profil-section-desc">
                    Mendukung terciptanya iklim belajar berbasis industri melalui bengkel manufaktur mutakhir, laboratorium komputasi terkini, dan infrastruktur penunjang terpadu.
                </p>
            </div>

            <div class="profil-fasilitas-grid">
                
                {{-- Kolom 1: Bengkel & Laboratorium Vokasi --}}
                <div class="profil-fasilitas-col">
                    <h3 class="profil-fasilitas-col-title">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                        </svg>
                        Bengkel &amp; Laboratorium Kejuruan
                    </h3>
                    <p class="profil-fasilitas-col-desc">
                        Dirancang sesuai tata ruang bengkel industri nyata dengan penerapan standar K3 dan 5R:
                    </p>

                    <ul class="profil-fasilitas-list">
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Workshop Pemesinan CNC &amp; Konvensional</strong>
                                <span>Mesin CNC bubut, frais presisi, gerinda datar, dan peralatan manufaktur modern.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Bengkel Otomotif EFI &amp; Scanner Diagnostik</strong>
                                <span>Engine stand EFI terkini, car lift, balancing, scanner komputer diagnostik multi-brand.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Laboratorium Komputer RPL &amp; Software Studio</strong>
                                <span>PC berspesifikasi tinggi untuk web development, mobile app, cloud, dan UI/UX design.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Lab Instalasi Tenaga Listrik &amp; PLC</strong>
                                <span>Panel kontrol industri, trainer instalasi motor listrik 3-fasa, trainer PLC Omron &amp; Schneider.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Lab Elektronika, IoT &amp; Robotika</strong>
                                <span>Trainer mikrokontroler, instrumentasi osiloskop digital, modul IoT, dan platform robotik otomatisasi.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- Kolom 2: Fasilitas Penunjang Sekolah --}}
                <div class="profil-fasilitas-col">
                    <h3 class="profil-fasilitas-col-title">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Fasilitas Pendukung Terpadu
                    </h3>
                    <p class="profil-fasilitas-col-desc">
                        Mendukung kenyamanan, literasi, bimbingan karier, dan kebugaran seluruh warga sekolah:
                    </p>

                    <ul class="profil-fasilitas-list">
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Perpustakaan &amp; E-Library</strong>
                                <span>Koleksi buku teks kejuruan, literatur teknik, dan akses repositori digital terintegrasi.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Ruang Kelas Multimedia &amp; Smart Class</strong>
                                <span>Dilengkapi proyektor interaktif, audio visual jernih, dan tata ruang ergonomis.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Bursa Kerja Khusus (BKK) &amp; Ruang Konseling BK</strong>
                                <span>Layanan asesmen karier, konseling psikologis, wawancara kerja, dan rekrutmen alumni.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Musala, Lapangan Olahraga, Kantin &amp; Parkir Luas</strong>
                                <span>Sarana ibadah representatif, lapangan futsal/basket, kantin higienis, dan area parkir tertata aman.</span>
                            </div>
                        </li>
                        <li class="profil-fasilitas-item">
                            <span class="profil-fasilitas-check">✓</span>
                            <div class="profil-fasilitas-item-text">
                                <strong>Jaringan Internet Fiber Optik Berkecepatan Tinggi</strong>
                                <span>Wi-Fi terdistribusi di seluruh area sekolah untuk menunjang kegiatan pembelajaran daring &amp; riset.</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div style="text-align: center; margin-top: 32px;">
                <a href="https://www.smkantartika1sda.sch.id/fasilitas/" target="_blank" rel="noopener noreferrer" style="color: var(--profil-primary); font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                    <span>Lihat Dokumentasi Lengkap Fasilitas Sekolah Resmi</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="7" y1="17" x2="17" y2="7"></line>
                        <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </a>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         7. KEHIDUPAN & PENGEMBANGAN SISWA
         ═══════════════════════════════════════════ --}}
    <section class="profil-ekskul-section" id="kegiatan-siswa">
        <div class="profil-wrap">
            
            <div class="profil-ekskul-banner">
                <div class="profil-ekskul-banner-grid">
                    <div>
                        <span class="profil-pill-badge" style="background: rgba(255,255,255,0.15); color: #ffffff; margin-bottom: 14px;">
                            EKSTRAKURIKULER &amp; KARAKTER
                        </span>
                        <h2 class="profil-ekskul-banner-title">Kehidupan dan Pengembangan Siswa</h2>
                        <p class="profil-ekskul-banner-desc">
                            Siswa tidak hanya dibekali keterampilan teknis, tetapi juga ruang berkembang melalui organisasi kesiswaan, kepramukaan, minat-bakat olahraga, seni, kegiatan keagamaan, kompetisi, gelar karya, dan program kewirausahaan. Pembinaan ini diarahkan untuk membangun kepemimpinan, disiplin, kreativitas, sportivitas, dan mentalitas profesional.
                        </p>
                    </div>

                    <div>
                        <div class="profil-ekskul-tag-cloud">
                            <span class="profil-ekskul-pill">★ OSIS &amp; MPK</span>
                            <span class="profil-ekskul-pill">★ Pramuka Penegak</span>
                            <span class="profil-ekskul-pill">★ Paskibraka</span>
                            <span class="profil-ekskul-pill">★ PMR (Palang Merah Remaja)</span>
                            <span class="profil-ekskul-pill">★ Olahraga (Futsal, Basket, Voli)</span>
                            <span class="profil-ekskul-pill">★ Seni &amp; Musik</span>
                            <span class="profil-ekskul-pill">★ Rohis &amp; Bina Mental Agama</span>
                            <span class="profil-ekskul-pill">★ LKS (Lomba Kompetensi Siswa)</span>
                            <span class="profil-ekskul-pill">★ Gelar Karya Vokasi &amp; TEFA</span>
                            <span class="profil-ekskul-pill">★ Program Kewirausahaan (SPW)</span>
                        </div>

                        <div style="margin-top: 24px;">
                            <a href="https://www.smkantartika1sda.sch.id/kegiatan-siswa/" target="_blank" rel="noopener noreferrer" style="color: #93c5fd; font-weight: 700; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                                <span>Galeri &amp; Kegiatan Siswa Resmi</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         8. KEPEMIMPINAN SEKOLAH & STRUKTUR
         ═══════════════════════════════════════════ --}}
    <section class="profil-lead-section" id="kepemimpinan">
        <div class="profil-wrap">
            
            <div class="profil-section-header">
                <span class="profil-section-tag">STRUKTUR ORGANISASI SEKOLAH</span>
                <h2 class="profil-section-title">Kepemimpinan Sekolah</h2>
                <p class="profil-section-desc">
                    Komitmen kepemimpinan transformatif dan tata kelola profesional untuk mengantarkan mutu vokasi terbaik.
                </p>
            </div>

            <div class="profil-lead-grid">
                
                {{-- Principal Showcase Card --}}
                <div class="profil-principal-card">
                    <div class="profil-principal-avatar">
                        <img src="{{ asset('assets/image copy.png') }}" alt="Akhmad Nasirudin, S.T. - Kepala SMK Antartika 1 Sidoarjo" class="profil-principal-img" onerror="this.onerror=null; this.src='{{ asset('assets/image copy.webp') }}';">
                    </div>
                    <h3 class="profil-principal-name">Akhmad Nasirudin, S.T.</h3>
                    <div class="profil-principal-role">Kepala SMK Antartika 1 Sidoarjo</div>
                    <span class="profil-principal-tenure">Periode 2025–2027</span>

                    <p class="profil-principal-quote">
                        “Pendidikan vokasi yang unggul berakar dari perpaduan karakter berbudi luhur, penguasaan teknologi industri terdepan, serta jejaring kemitraan yang kuat.”
                    </p>

                    <div style="margin-top: 18px;">
                        <a href="https://www.smkantartika1sda.sch.id/struktur-organisasi/" target="_blank" rel="noopener noreferrer" style="color: var(--profil-primary); font-weight: 700; font-size: 0.84rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                            <span>Lihat Struktur Organisasi Resmi</span>
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Management Structure Grid --}}
                <div class="profil-management-boxes">
                    
                    <div class="profil-mgmt-box">
                        <div class="profil-mgmt-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        </div>
                        <h4 class="profil-mgmt-title">Bidang Kurikulum</h4>
                        <p class="profil-mgmt-desc">Pengembangan kurikulum industri, Teaching Factory, modul ajar SKKNI, dan evaluasi akademik.</p>
                    </div>

                    <div class="profil-mgmt-box">
                        <div class="profil-mgmt-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <h4 class="profil-mgmt-title">Bidang Kesiswaan</h4>
                        <p class="profil-mgmt-desc">Pembinaan karakter, kedisiplinan, organisasi siswa, dan prestasi perlombaan (LKS/O2SN).</p>
                    </div>

                    <div class="profil-mgmt-box">
                        <div class="profil-mgmt-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <h4 class="profil-mgmt-title">Bidang Sarana-Prasarana</h4>
                        <p class="profil-mgmt-desc">Pemeliharaan workshop CNC, lab komputer, infrastruktur internet, dan fasilitas sekolah.</p>
                    </div>

                    <div class="profil-mgmt-box">
                        <div class="profil-mgmt-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        </div>
                        <h4 class="profil-mgmt-title">Humas &amp; Hubungan Industri (BKK)</h4>
                        <p class="profil-mgmt-desc">Jejaring 100+ mitra DUDI, program PKL, guru tamu, campus hiring, dan bimbingan karier.</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         9. ALAMAT, LAYANAN & KONTAK RESMI
         ═══════════════════════════════════════════ --}}
    <section class="profil-contact-section" id="kontak-resmi">
        <div class="profil-wrap">
            
            <div class="profil-section-header">
                <span class="profil-section-tag">INFORMASI &amp; LAYANAN</span>
                <h2 class="profil-section-title">Alamat dan Layanan Sekolah</h2>
                <p class="profil-section-desc">
                    Hubungi kami untuk informasi pendaftaran, kemitraan industri, maupun administrasi sekolah.
                </p>
            </div>

            <div class="profil-contact-grid">
                
                {{-- Alamat & Layanan Info --}}
                <div class="profil-contact-info-card">
                    <div>
                        <h3 class="profil-contact-info-title">SMK Antartika 1 Sidoarjo</h3>
                        <p class="profil-contact-info-desc">
                            Sekolah vokasi teknik di bawah naungan Yayasan Pendidikan Wahyuhana Surabaya.
                        </p>

                        <div class="profil-contact-detail-list">
                            <div class="profil-contact-detail-item">
                                <div class="profil-contact-detail-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="profil-contact-detail-text">
                                    <h5>Alamat Kampus</h5>
                                    <p>Jl. Raya Siwalanpanji No. 1, Bedrek, Siwalanpanji, Kecamatan Buduran, Kabupaten Sidoarjo, Jawa Timur 61252</p>
                                </div>
                            </div>

                            <div class="profil-contact-detail-item">
                                <div class="profil-contact-detail-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                </div>
                                <div class="profil-contact-detail-text">
                                    <h5>Layanan Sekolah</h5>
                                    <p>PPDB Online &amp; Offline, Tata Usaha, Bursa Kerja Khusus (BKK) &amp; Hubungan Industri, serta Bimbingan Konseling (BK).</p>
                                </div>
                            </div>

                            <div class="profil-contact-detail-item">
                                <div class="profil-contact-detail-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                                <div class="profil-contact-detail-text">
                                    <h5>Situs Web Resmi</h5>
                                    <p><a href="https://www.smkantartika1sda.sch.id/kontak/" target="_blank" rel="noopener noreferrer">www.smkantartika1sda.sch.id/kontak</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <a href="{{ route('ppdb') }}" class="profil-btn-primary">
                            <span>Informasi PPDB Online</span>
                        </a>
                        <a href="https://www.smkantartika1sda.sch.id/kontak/" target="_blank" rel="noopener noreferrer" class="profil-btn-secondary" style="background: rgba(255,255,255,0.1); color: #ffffff !important; border-color: rgba(255,255,255,0.2);">
                            <span>Kontak Resmi Sekolah</span>
                        </a>
                    </div>
                </div>

                {{-- Interactive Map Card --}}
                <div class="profil-map-card">
                    <iframe
                        class="profil-map-iframe"
                        src="https://maps.google.com/maps?q=SMK%20Antartika%201%20Sidoarjo&t=&z=16&ie=UTF8&iwloc=&output=embed"
                        title="Lokasi SMK Antartika 1 Sidoarjo"
                        loading="lazy"
                        allowfullscreen
                    ></iframe>

                    <div class="profil-map-footer">
                        <div>
                            <strong style="display: block; font-size: 0.95rem; color: var(--profil-dark);">SMK Antartika 1 Sidoarjo</strong>
                            <span style="font-size: 0.8rem; color: var(--profil-muted);">Kecamatan Buduran, Kabupaten Sidoarjo</span>
                        </div>
                        <a href="https://maps.google.com/?q=SMK+Antartika+1+Sidoarjo" target="_blank" rel="noopener noreferrer" class="profil-btn-secondary" style="padding: 8px 16px; font-size: 0.82rem;">
                            <span>Buka di Google Maps</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- Unified Landing Footer --}}
    <x-landing-footer />

    {{-- Tanya Tefa AI Float Widget --}}
    <x-ai-widget />

    {{-- ═══════════════════════════════════════════
         INTERACTIVE SCRIPTS (Pill Tabs & Mitra Filter)
         ═══════════════════════════════════════════ --}}
    <script>
    (function() {
        function scrollTabIntoView(container, btn) {
            if (!container || !btn) return;
            const cRect = container.getBoundingClientRect();
            const bRect = btn.getBoundingClientRect();
            const offset = (bRect.left - cRect.left) - (container.clientWidth / 2) + (btn.clientWidth / 2);
            container.scrollBy({ left: offset, behavior: 'smooth' });
        }

        // 1. Top Pill Navigation Tabs Switcher
        function initNavPillTabs() {
            const tabsBar = document.querySelector('.profil-nav-tabs-bar');
            if (!tabsBar) return;

            const tabButtons = tabsBar.querySelectorAll('.profil-nav-tab-btn');
            const tabPanes = document.querySelectorAll('.profil-tab-pane');

            tabsBar.addEventListener('click', function(e) {
                const btn = e.target.closest('.profil-nav-tab-btn');
                if (!btn || btn.classList.contains('is-active')) return;

                const targetId = btn.getAttribute('data-target');
                if (!targetId) return;

                const targetPane = document.getElementById(targetId);
                if (!targetPane) return;

                // Update tab buttons
                tabButtons.forEach(function(b) {
                    b.classList.remove('is-active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('is-active');
                btn.setAttribute('aria-selected', 'true');
                scrollTabIntoView(tabsBar, btn);

                // Update tab panes
                requestAnimationFrame(function() {
                    tabPanes.forEach(function(pane) {
                        pane.classList.remove('is-active');
                    });
                    targetPane.classList.add('is-active');
                });
            });

            // Check URL Hash on Load
            if (window.location.hash) {
                const hash = window.location.hash.replace('#', '');
                const matchingBtn = tabsBar.querySelector(`[data-target="tab-${hash}"]`);
                if (matchingBtn) {
                    matchingBtn.click();
                }
            }
        }

        // 2. Mitra Industri Sector Filter Tabs
        function initMitraFilter() {
            const filterBar = document.querySelector('.profil-mitra-filter-bar');
            const mitraCards = document.querySelectorAll('.profil-mitra-card');
            if (!filterBar || !mitraCards.length) return;

            filterBar.addEventListener('click', function(e) {
                const btn = e.target.closest('.profil-mitra-tab-btn');
                if (!btn || btn.classList.contains('is-active')) return;

                const activeBtn = filterBar.querySelector('.profil-mitra-tab-btn.is-active');
                if (activeBtn) activeBtn.classList.remove('is-active');
                btn.classList.add('is-active');
                scrollTabIntoView(filterBar, btn);

                const selectedSector = btn.getAttribute('data-sector');
                requestAnimationFrame(function() {
                    mitraCards.forEach(function(card) {
                        const cardSector = card.getAttribute('data-sector');
                        card.style.display = (selectedSector === 'all' || cardSector === selectedSector) ? 'flex' : 'none';
                    });
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                initNavPillTabs();
                initMitraFilter();
            });
        } else {
            initNavPillTabs();
            initMitraFilter();
        }
    })();
    </script>
</body>
</html>
