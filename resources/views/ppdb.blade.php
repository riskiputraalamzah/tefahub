@php
    \Carbon\Carbon::setLocale('id');
    $currentDateObj = \Carbon\Carbon::now();
    $currentDayName = $currentDateObj->isoFormat('dddd');
    $currentDayNum = $currentDateObj->isoFormat('D');
    $currentMonthName = $currentDateObj->isoFormat('MMMM');
    $currentYear = $currentDateObj->isoFormat('YYYY');
    $startOfMonthStr = $currentDateObj->copy()->startOfMonth()->isoFormat('D MMMM');
    $endOfMonthStr = $currentDateObj->copy()->endOfMonth()->isoFormat('D MMMM YYYY');
    $endMonthStr = $endOfMonthStr;
    $fullTodayStr = $currentDateObj->isoFormat('dddd, D MMMM YYYY');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Penerimaan Peserta Didik Baru (PPDB) SMK Antartika 1 Sidoarjo Tahun Ajaran {{ $currentYear }}/{{ (int)$currentYear + 1 }}. Wujudkan masa depanmu bersama ekosistem pendidikan vokasi unggul dan siap industri.">
    <title>PPDB SMK Antartika 1 Sidoarjo TA {{ $currentYear }}/{{ (int)$currentYear + 1 }} — TEFA-Hub</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ppdb.landing.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="ppdb-body">

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'ppdb'" />

    <main class="ppdb-main-wrap">

        <!-- ═══════════════════════════════════════════════════════════
             1. HERO BANNER SECTION (WITH IMAGE COPY 7.WEBP)
             ═══════════════════════════════════════════════════════════ -->
        <section class="ppdb-hero-section" aria-label="Hero PPDB SMK Antartika 1 Sidoarjo">
            <div class="ppdb-hero-card">
                <div class="ppdb-hero-glow-1" aria-hidden="true"></div>
                <div class="ppdb-hero-glow-2" aria-hidden="true"></div>

                <!-- Left Content Block -->
                <div class="ppdb-hero-content">
                    <div class="ppdb-badge-pill">
                        <svg class="ppdb-badge-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                        <span>Penerimaan Peserta Didik Baru (PPDB) Resmi</span>
                    </div>

                    <h1 class="ppdb-hero-title">
                        PPDB SMK Antartika 1 Sidoarjo
                        <span class="title-accent">Tahun Ajaran 2026/2027</span>
                    </h1>

                    <p class="ppdb-hero-desc">
                        Wujudkan masa depan karier gemilang bersama SMK Pusat Keunggulan Terakreditasi A. Kurikulum selaras industri (SKKNI), fasilitas workshop modern, dan jaminan sertifikasi kompetensi kejuruan.
                    </p>

                    <div class="ppdb-btn-group">
                        <a 
                            href="{{ route('ppdb.daftar') }}" 
                            class="btn-ppdb-primary"
                            aria-label="Pendaftaran Online PPDB SMK Antartika 1 Sidoarjo"
                        >
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <span>Daftar Sekarang</span>
                        </a>

                        <a href="#pilihan-jurusan" class="btn-ppdb-secondary" aria-label="Lihat Pilihan Jurusan">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Lihat Jurusan</span>
                        </a>
                    </div>
                </div>

                <!-- Right Illustration Media (image copy 8.webp) -->
                <div class="ppdb-hero-media">
                    <img 
                        src="{{ asset('assets/image copy 8.webp') }}"
                        alt="Siswa-Siswi SMK Antartika 1 Sidoarjo — Jadi Bagian dari Masa Depan Muda!" 
                        class="ppdb-hero-img"
                        width="720" 
                        height="380"
                    >
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════════════════════════
             2. FOUR VALUE HIGHLIGHTS STRIP
             ═══════════════════════════════════════════════════════════ -->
        <section class="ppdb-value-strip" aria-label="Keunggulan SMK Antartika 1 Sidoarjo">
            
            <!-- Item 1: Akreditasi A -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Sekolah Terakreditasi A BAN-SM</h4>
                    <p class="ppdb-value-sub">Standar mutu pendidikan vokasi terpercaya</p>
                </div>
            </div>

            <!-- Item 2: Fasilitas Lengkap -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Lab &amp; Workshop Standar Industri</h4>
                    <p class="ppdb-value-sub">Peralatan mutakhir Teaching Factory</p>
                </div>
            </div>

            <!-- Item 3: Guru Profesional -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Instruktur &amp; Asesor BNSP Ahli</h4>
                    <p class="ppdb-value-sub">Didampingi praktisi industri berkompeten</p>
                </div>
            </div>

            <!-- Item 4: Lulusan Siap Kerja -->
            <div class="ppdb-value-item">
                <div class="ppdb-value-icon-box">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                </div>
                <div class="ppdb-value-text-group">
                    <h4 class="ppdb-value-title">Penyaluran Kerja Mitra DUDI</h4>
                    <p class="ppdb-value-sub">Akses langsung bursa kerja &amp; perguruan tinggi</p>
                </div>
            </div>

        </section>

        <!-- ═══════════════════════════════════════════════════════════
             3. MAIN TWO-COLUMN CONTENT SECTION
             ═══════════════════════════════════════════════════════════ -->
        <div class="ppdb-columns-grid">
            
            <!-- ─── LEFT COLUMN (WIDER) ─── -->
            <div class="ppdb-col-left">

                <!-- CARD 1: INFORMASI PENDAFTARAN -->
                <div class="ppdb-card">
                    <div class="ppdb-card-header">
                        <svg class="ppdb-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <h3 class="ppdb-card-title">Informasi Pendaftaran</h3>
                    </div>

                    <div class="info-boxes-grid">
                        
                        <!-- Box 1: Periode Pendaftaran -->
                        <div class="info-box-item">
                            <div class="info-box-top">
                                <div class="info-box-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <span class="info-box-label">Periode Pendaftaran</span>
                            </div>
                            <div class="info-box-content">
                                1 {{ $currentMonthName }} – {{ $endMonthStr }}
                            </div>
                            <span class="info-box-badge-green">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span>Sudah Dibuka • {{ $fullTodayStr }}</span>
                            </span>
                        </div>

                        <!-- Box 2: Jalur Pendaftaran -->
                        <div class="info-box-item">
                            <div class="info-box-top">
                                <div class="info-box-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <span class="info-box-label">Jalur Pendaftaran</span>
                            </div>
                            <div class="info-box-content">
                                Online, Offline &amp; Beasiswa Prestasi
                            </div>
                            <a href="javascript:void(0)" onclick="openPpdbModal('jalur')" class="info-box-link">
                                <span>Lihat Detail</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>

                        <!-- Box 3: Program Keahlian -->
                        <div class="info-box-item">
                            <div class="info-box-top">
                                <div class="info-box-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                        <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                    </svg>
                                </div>
                                <span class="info-box-label">Program Keahlian</span>
                            </div>
                            <div class="info-box-content">
                                RPL, TKR, TPM, TITL, TEI
                            </div>
                            <a href="#pilihan-jurusan" class="info-box-link">
                                <span>Lihat Semua Jurusan</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- CARD 2: ALUR PENDAFTARAN -->
                <div class="ppdb-card">
                    <div class="ppdb-card-header">
                        <svg class="ppdb-card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            <path d="M9 14l2 2 4-4"></path>
                        </svg>
                        <h3 class="ppdb-card-title">Alur Pendaftaran (Sekolah Swasta)</h3>
                    </div>

                    <!-- 5 Steps Flow -->
                    <div class="alur-steps-flow">
                        
                        <!-- Step 1 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>1</span>
                            </div>
                            <h4 class="step-title-text">Isi Formulir</h4>
                            <p class="step-desc-text">Online / Ruang PPDB</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 2 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>2</span>
                            </div>
                            <h4 class="step-title-text">Kumpul Berkas</h4>
                            <p class="step-desc-text">Didampingi Orang Tua</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 3 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>3</span>
                            </div>
                            <h4 class="step-title-text">Verifikasi Berkas</h4>
                            <p class="step-desc-text">Cek kelengkapan dokumen</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 4 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>4</span>
                            </div>
                            <h4 class="step-title-text">Daftar Ulang</h4>
                            <p class="step-desc-text">Klaim diskon gelombang</p>
                        </div>

                        <div class="alur-step-arrow" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>

                        <!-- Step 5 -->
                        <div class="alur-step-item">
                            <div class="step-icon-badge">
                                <span>5</span>
                            </div>
                            <h4 class="step-title-text">Seragam</h4>
                            <p class="step-desc-text">Fitting &amp; siap MPLS</p>
                        </div>

                    </div>

                    <!-- Bottom Callout Strip -->
                    <div class="alur-bottom-capsule">
                        <a 
                            href="javascript:void(0)" 
                            onclick="openPpdbModal('panduan')"
                            class="btn-capsule-daftar"
                            aria-label="Lihat Panduan Lengkap Alur Pendaftaran"
                        >
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span>Panduan Lengkap</span>
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>
                        <span class="capsule-promo-text">One-Day Service: Verifikasi berkas, tes minat bakat &amp; kepastian kuota langsung di hari yang sama!</span>
                    </div>

                </div>

            </div>

            <!-- ─── RIGHT COLUMN (SIDEBAR) ─── -->
            <div class="ppdb-col-right">

                <!-- CARD 1: INFORMASI PENTING -->
                <div class="ppdb-card">
                    <div class="info-penting-header">
                        <div class="penting-icon-circle">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="penting-title">Informasi Penting</h3>
                            <p class="penting-subtitle">Pastikan kamu membaca seluruh informasi sebelum melakukan pendaftaran.</p>
                        </div>
                    </div>

                    <!-- 4 Action Items -->
                    <div class="penting-action-list">
                        
                        <!-- 1. Syarat Pendaftaran -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('syarat')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">Syarat Pendaftaran</h4>
                                    <p class="action-item-desc">Lihat persyaratan lengkap pendaftaran</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                        <!-- 2. Jadwal PPDB -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('jadwal')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">Jadwal PPDB</h4>
                                    <p class="action-item-desc">Cek timeline penting pendaftaran</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                        <!-- 3. Panduan Pendaftaran -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('panduan')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">Panduan Pendaftaran</h4>
                                    <p class="action-item-desc">Ikuti langkah demi langkah pendaftaran</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                        <!-- 4. FAQ -->
                        <a href="javascript:void(0)" onclick="openPpdbModal('faq')" class="penting-action-item">
                            <div class="action-left-group">
                                <svg class="action-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                <div>
                                    <h4 class="action-item-title">FAQ</h4>
                                    <p class="action-item-desc">Pertanyaan yang sering diajukan</p>
                                </div>
                            </div>
                            <svg class="action-chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                    </div>

                    <!-- Button Download Brosur -->
                    <button type="button" class="btn-download-brosur" onclick="downloadBrosurPpdb()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span>Download Brosur PPDB (PDF)</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </button>
                </div>

                <!-- CARD 2: QUOTE CARD -->
                <div class="ppdb-quote-card">
                    <p class="ppdb-quote-text">
                        “Masa depan yang baik dimulai dari langkah kecil hari ini!”
                    </p>
                </div>

            </div>

        </div>

        <!-- ═══════════════════════════════════════════════════════════
             3.5. KUIS JURUSAN PROMO BANNER SECTION
             ═══════════════════════════════════════════════════════════ -->
        <section class="ppdb-quiz-banner-section" aria-label="Kuis Minat Bakat Jurusan">
            <div class="ppdb-quiz-banner-card">
                <div class="quiz-banner-content">
                    <div class="quiz-banner-tag">
                        <span class="quiz-tag-icon-circle">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                            </svg>
                        </span>
                        <span>Kuis Minat &amp; Karir Vokasi</span>
                    </div>

                    <h2 class="quiz-banner-title">
                        Bingung Memilih Jurusan?<br>
                        Temukan Program Keahlian<br>
                        yang <span class="highlight-blue">Paling Cocok Untukmu!</span>
                    </h2>

                    <p class="quiz-banner-desc">
                        Ikuti kuis singkat 6 pertanyaan interaktif tanpa jawaban salah. Kenali potensimu dan dapatkan rekomendasi jurusan impian beserta prospek karir masa depan secara instan dalam 2 menit.
                    </p>

                    <div class="quiz-banner-actions">
                        <a href="{{ route('ppdb.kuis') }}" class="btn-quiz-cta">
                            <span class="btn-quiz-icon-circle">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                                </svg>
                            </span>
                            <span>Mulai Kuis Seru Sekarang (2 Menit)</span>
                            <svg class="btn-quiz-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="quiz-banner-visual">
                    <img 
                        src="{{ asset('assets/image copy 2.png') }}" 
                        alt="Temukan Program Keahlian 5 Jurusan Unggulan SMK Antartika 1 Sidoarjo" 
                        class="quiz-banner-right-img"
                        loading="eager"
                    >
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════════════════════════
             4. PILIHAN JURUSAN SECTION (5 MAJORS)
             ═══════════════════════════════════════════════════════════ -->
        <section class="ppdb-jurusan-section" id="pilihan-jurusan" aria-label="Pilihan Program Keahlian">
            <div class="jurusan-header-row">
                <div class="jurusan-title-group">
                    <h3 class="jurusan-main-title">Pilihan Jurusan</h3>
                    <p class="jurusan-main-sub">Temukan jurusan yang sesuai dengan minat dan bakatmu.</p>
                </div>
                <a href="javascript:void(0)" onclick="openPpdbModal('jurusan-all')" class="link-lihat-semua-jurusan">
                    <span>Lihat Semua Jurusan</span>
                    <span>+</span>
                </a>
            </div>

            <!-- 5 Majors Grid -->
            <div class="jurusan-cards-grid">
                
                <!-- 1. TKR -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('tkr')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <path d="M9 17h6"></path>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TKR</h4>
                        <p class="jurusan-full-name">Teknik Kendaraan Ringan</p>
                    </div>
                </div>

                <!-- 2. TEI -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('tei')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                            <rect x="9" y="9" width="6" height="6"></rect>
                            <line x1="9" y1="1" x2="9" y2="4"></line>
                            <line x1="15" y1="1" x2="15" y2="4"></line>
                            <line x1="9" y1="20" x2="9" y2="23"></line>
                            <line x1="15" y1="20" x2="15" y2="23"></line>
                            <line x1="20" y1="9" x2="23" y2="9"></line>
                            <line x1="20" y1="14" x2="23" y2="14"></line>
                            <line x1="1" y1="9" x2="4" y2="9"></line>
                            <line x1="1" y1="14" x2="4" y2="14"></line>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TEI</h4>
                        <p class="jurusan-full-name">Teknik Elektronika Industri</p>
                    </div>
                </div>

                <!-- 3. TITL -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('titl')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TITL</h4>
                        <p class="jurusan-full-name">Teknik Instalasi Tenaga Listrik</p>
                    </div>
                </div>

                <!-- 4. RPL -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('rpl')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">RPL</h4>
                        <p class="jurusan-full-name">Rekayasa Perangkat Lunak</p>
                    </div>
                </div>

                <!-- 5. TPM -->
                <div class="jurusan-card-item" onclick="openJurusanDetail('tpm')">
                    <div class="jurusan-icon-box">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                    </div>
                    <div class="jurusan-text-group">
                        <h4 class="jurusan-code-name">TPM</h4>
                        <p class="jurusan-full-name">Teknik Pemesinan</p>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- ═══════════════════════════════════════════════════════════
         PPDB POSTER WELCOME POPUP (CAROUSEL: P1.WEBP & P2.WEBP)
         ═══════════════════════════════════════════════════════════ -->
    <div id="ppdbPosterModalOverlay" class="ppdb-poster-modal-overlay" role="dialog" aria-modal="true" tabindex="-1" style="display: none;">
        <!-- Top Right Round Close Button -->
        <button type="button" class="btn-poster-modal-close" onclick="closePpdbPosterModal()" aria-label="Tutup Poster PPDB">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="ppdb-poster-container">
            <div class="ppdb-poster-carousel" id="ppdbPosterCarousel">
                <div class="ppdb-poster-slides" id="ppdbPosterSlides">
                    <!-- Slide 1: p2.webp (Muncul Pertama) -->
                    <div class="ppdb-poster-slide active">
                        <img src="{{ asset('assets/p2.webp') }}" alt="Poster PPDB SMK Antartika 1 Sidoarjo - Halaman 1" class="ppdb-poster-image">
                    </div>
                    <!-- Slide 2: p1.webp (Muncul Kedua) -->
                    <div class="ppdb-poster-slide">
                        <img src="{{ asset('assets/p1.webp') }}" alt="Poster PPDB SMK Antartika 1 Sidoarjo - Halaman 2" class="ppdb-poster-image">
                    </div>
                </div>

                <!-- Left Navigation Arrow -->
                <button type="button" class="btn-poster-nav btn-poster-prev" onclick="prevPpdbPosterSlide()" aria-label="Poster Sebelumnya">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <!-- Right Navigation Arrow -->
                <button type="button" class="btn-poster-nav btn-poster-next" onclick="nextPpdbPosterSlide()" aria-label="Poster Berikutnya">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>

                <!-- Indicator Dots -->
                <div class="ppdb-poster-dots" id="ppdbPosterDots">
                    <button type="button" class="poster-dot active" onclick="goPpdbPosterSlide(0)" aria-label="Slide 1"></button>
                    <button type="button" class="poster-dot" onclick="goPpdbPosterSlide(1)" aria-label="Slide 2"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════
         INTERACTIVE DETAIL MODAL POPUP
         ═══════════════════════════════════════════════════════════ -->
    <div id="ppdbModalOverlay" class="ppdb-modal-overlay" role="dialog" aria-modal="true" tabindex="-1" style="display: none;">
        <div class="ppdb-modal-card">
            <div class="ppdb-modal-header">
                <div>
                    <h3 class="ppdb-modal-title" id="ppdbModalTitle">Informasi PPDB</h3>
                    <p class="ppdb-modal-subtitle" id="ppdbModalSubtitle">Detail panduan dan informasi resmi SMK Antartika 1 Sidoarjo</p>
                </div>
                <button type="button" class="btn-ppdb-modal-close" onclick="closePpdbModal()" aria-label="Tutup Dialog">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="ppdb-modal-body" id="ppdbModalBody">
                <!-- Content inserted by JavaScript -->
            </div>

            <div class="ppdb-modal-footer">
                <button type="button" class="btn-ppdb-primary" onclick="closePpdbModal()" style="height: 38px; padding: 0 24px; font-size: 13px; font-weight:700;">
                    <span>Tutup Panduan</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="ppdbToast" class="ppdb-toast" role="status" aria-live="polite" style="display: none;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <span id="ppdbToastMsg">Aksi berhasil dilakukan</span>
    </div>

    {{-- Unified Landing Footer --}}
    <x-landing-footer />

    {{-- AI Navigator Widget --}}
    <x-ai-widget />

    <!-- ═══════════════════════════════════════════════════════════
         JAVASCRIPT LOGIC FOR PPDB MODALS & ACTIONS
         ═══════════════════════════════════════════════════════════ -->
    <script>
        const PPDB_DATA = {
            syarat: {
                title: 'Syarat Pendaftaran PPDB',
                subtitle: 'Kelengkapan berkas dan dokumen persyaratan calon siswa baru',
                content: `
                    <div style="display:flex; flex-direction:column; gap:16px;">
                        <!-- Top Highlights Banner -->
                        <div style="background:linear-gradient(135deg, #004AC6 0%, #002B7A 100%); color:#FFFFFF; border-radius:14px; padding:16px 18px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; box-shadow:0 8px 20px rgba(0, 74, 198, 0.2);">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:40px; height:40px; border-radius:12px; background:rgba(255,255,255,0.18); display:flex; align-items:center; justify-content:center; flex-shrink:0; border:1px solid rgba(255,255,255,0.25);">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                </div>
                                <div>
                                    <h4 style="margin:0; font-size:14.5px; font-weight:800; letter-spacing:-0.01em;">Berkas Pendaftaran Resmi</h4>
                                    <p style="margin:2px 0 0; font-size:11.5px; color:#E0E7FF; font-weight:500;">Penerimaan Peserta Didik Baru SMK Antartika 1 Sidoarjo</p>
                                </div>
                            </div>
                            <span style="background:rgba(255,255,255,0.2); border:1px solid rgba(255,255,255,0.3); color:#FFFFFF; padding:4px 10px; border-radius:20px; font-size:11px; font-weight:700;">
                                8 Poin Persyaratan
                            </span>
                        </div>

                        <!-- Section 1: Checklist Berkas Dokumen Fisik -->
                        <div>
                            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:10px;">
                                <span style="font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; color:#004AC6;">
                                    Daftar Dokumen &amp; Berkas Fisik
                                </span>
                                <span style="font-size:11px; color:#64748B; font-weight:600;">Diserahkan saat pendaftaran</span>
                            </div>

                            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:10px;">
                                <!-- 1. Formulir -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">1</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Mengisi Formulir Pendaftaran</div>
                                        <div style="font-size:11px; color:#64748B; margin-top:2px;">Secara online via web atau formulir cetak di Ruang PPDB</div>
                                    </div>
                                </div>

                                <!-- 2. Ijazah SD -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">2</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Ijazah SD Dilegalisir</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Legalisir Asli)</div>
                                    </div>
                                </div>

                                <!-- 3. SKL SMP -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">3</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy SKL SMP atau Sederajat</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Surat Keterangan Lulus)</div>
                                    </div>
                                </div>

                                <!-- 4. KK -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">4</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Kartu Keluarga (KK)</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Terbaru &amp; Jelas)</div>
                                    </div>
                                </div>

                                <!-- 5. Akta -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">5</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Akta Keluarga / Kelahiran</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar</div>
                                    </div>
                                </div>

                                <!-- 6. NISN -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">6</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">Fotocopy Kartu NISN</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">1 Lembar (Cetak NISN Resmi)</div>
                                    </div>
                                </div>

                                <!-- 7. SKL MTs -->
                                <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:12px 14px; display:flex; align-items:flex-start; gap:12px;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; flex-shrink:0;">7</div>
                                    <div style="flex:1;">
                                        <div style="font-weight:700; color:#0F172A; font-size:13px;">SKL Untuk Lulusan MTs</div>
                                        <div style="font-size:11px; color:#2563EB; font-weight:700; margin-top:2px;">Khusus pendaftar lulusan MTs (1 Lembar)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Ketentuan Wajib & Pendampingan -->
                        <div style="background:#FFFBEB; border:1px solid #FDE68A; border-radius:12px; padding:14px 16px; display:flex; align-items:flex-start; gap:12px;">
                            <div style="width:32px; height:32px; border-radius:10px; background:#F59E0B; color:#fff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <div>
                                <h5 style="margin:0; font-size:13px; font-weight:800; color:#92400E;">8. Calon Siswa Wajib Datang Didampingi Orang Tua / Wali Murid</h5>
                                <p style="margin:3px 0 0; font-size:12px; color:#B45309; line-height:1.5;">Kehadiran Orang Tua/Wali Murid diperlukan untuk proses wawancara penjurusan, penandatanganan komitmen tata tertib, dan klaim potongan biaya daftar ulang.</p>
                            </div>
                        </div>
                    </div>
                `
            },
            jadwal: {
                title: 'Timeline & Periode Potongan Biaya PPDB',
                subtitle: 'Daftar lebih awal untuk mendapatkan potongan biaya pendaftaran terbesar',
                content: `
                    <div style="display:flex; flex-direction:column; gap:14px;">
                        <!-- Live Active Status Banner -->
                        <div style="background:linear-gradient(135deg, #004AC6 0%, #1E40AF 100%); color:#FFFFFF; border-radius:14px; padding:14px 18px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px; box-shadow:0 6px 18px rgba(0, 74, 198, 0.22);">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div style="width:38px; height:38px; border-radius:10px; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                </div>
                                <div>
                                    <span style="font-size:10.5px; text-transform:uppercase; letter-spacing:0.06em; opacity:0.9; font-weight:700;">Status Hari Ini</span>
                                    <h4 style="margin:2px 0 0; font-size:14px; font-weight:800;">{{ $fullTodayStr }}</h4>
                                </div>
                            </div>
                            <span style="background:rgba(255,255,255,0.25); border:1px solid rgba(255,255,255,0.4); padding:5px 12px; border-radius:20px; font-size:12px; font-weight:800; display:inline-flex; align-items:center; gap:6px;">
                                <span style="width:8px; height:8px; border-radius:50%; background:#22C55E; display:inline-block; box-shadow:0 0 8px #22C55E;"></span>
                                Bulan Aktif: {{ $currentMonthName }} {{ $currentYear }}
                            </span>
                        </div>

                        <!-- Timeline Potongan Table -->
                        <div style="overflow-x:auto; border-radius:14px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(15,23,42,0.04); background:#FFFFFF;">
                            <table style="width:100%; border-collapse:collapse; text-align:left; font-size:13px;">
                                <thead>
                                    <tr style="background:#0F172A; color:#FFFFFF;">
                                        <th style="padding:13px 18px; font-weight:800; font-size:12px; text-transform:uppercase; letter-spacing:0.04em;">Periode Gelombang</th>
                                        <th style="padding:13px 18px; font-weight:800; font-size:12px; text-transform:uppercase; letter-spacing:0.04em; text-align:right;">Potongan Biaya</th>
                                        <th style="padding:13px 18px; font-weight:800; font-size:12px; text-transform:uppercase; letter-spacing:0.04em; text-align:center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px solid #F1F5F9; background:#FAFCFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#334155; font-size:13.5px;">1 – 31 Agustus {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#94A3B8; margin-top:2px;">Gelombang Early Bird</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#64748B; text-align:right; font-size:14px;">
                                            Rp2.500.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#F1F5F9; color:#64748B; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #E2E8F0;">Selesai</span>
                                        </td>
                                    </tr>

                                    <tr style="border-bottom:1px solid #F1F5F9; background:#FFFFFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#334155; font-size:13.5px;">1 – 30 September {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#94A3B8; margin-top:2px;">Gelombang 1</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#64748B; text-align:right; font-size:14px;">
                                            Rp2.000.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#F1F5F9; color:#64748B; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #E2E8F0;">Selesai</span>
                                        </td>
                                    </tr>

                                    <!-- October Active -->
                                    <tr style="border-bottom:1px solid #BFDBFE; background:#EFF6FF; border-left:5px solid #004AC6;">
                                        <td style="padding:14px 18px;">
                                            <strong style="color:#004AC6; font-size:14px; display:inline-flex; align-items:center; gap:6px;">
                                                1 – 31 Oktober {{ $currentYear }}
                                                <span style="background:#004AC6; color:#fff; font-size:10px; padding:2px 7px; border-radius:4px; font-weight:800;">BULAN INI</span>
                                            </strong>
                                            <div style="font-size:11.5px; font-weight:700; color:#2563EB; margin-top:3px;">★ Sedang Berlangsung Hari Ini ({{ $fullTodayStr }})</div>
                                        </td>
                                        <td style="padding:14px 18px; font-weight:900; color:#004AC6; text-align:right; font-size:16px;">
                                            Rp1.000.000
                                        </td>
                                        <td style="padding:14px 18px; text-align:center;">
                                            <span style="background:#16A34A; color:#FFFFFF; font-size:11.5px; padding:5px 12px; border-radius:999px; font-weight:800; box-shadow:0 2px 8px rgba(22,163,74,0.35); display:inline-flex; align-items:center; gap:4px;">
                                                <span style="width:6px; height:6px; border-radius:50%; background:#fff;"></span>
                                                Sedang Dibuka
                                            </span>
                                        </td>
                                    </tr>

                                    <tr style="border-bottom:1px solid #F1F5F9; background:#FFFFFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#1E293B; font-size:13.5px;">1 – 30 November {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#64748B; margin-top:2px;">Gelombang 2</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#0F172A; text-align:right; font-size:14px;">
                                            Rp750.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#FEF3C7; color:#B45309; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #FDE68A;">Akan Datang</span>
                                        </td>
                                    </tr>

                                    <tr style="background:#FAFCFF;">
                                        <td style="padding:13px 18px;">
                                            <strong style="color:#1E293B; font-size:13.5px;">1 – 31 Desember {{ $currentYear }}</strong>
                                            <div style="font-size:11px; color:#64748B; margin-top:2px;">Gelombang 3 / Penutupan</div>
                                        </td>
                                        <td style="padding:13px 18px; font-weight:800; color:#0F172A; text-align:right; font-size:14px;">
                                            Rp500.000
                                        </td>
                                        <td style="padding:13px 18px; text-align:center;">
                                            <span style="background:#FEF3C7; color:#B45309; font-size:11px; padding:4px 10px; border-radius:999px; font-weight:700; border:1px solid #FDE68A;">Akan Datang</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Explanatory Note -->
                        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:12px 16px; display:flex; align-items:center; gap:10px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <p style="margin:0; font-size:12px; color:#475569; line-height:1.5;">
                                <strong>Catatan:</strong> Potongan biaya langsung memotong <em>Dana Sumbangan Pendidikan (DSP/Uang Pangkal Gedung)</em> pada saat calon siswa melakukan pendaftaran ulang di bulan berjalan.
                            </p>
                        </div>
                    </div>
                `
            },
            panduan: {
                title: 'Alur Pendaftaran (Sekolah Swasta)',
                subtitle: 'Tahapan lengkap penerimaan peserta didik baru SMK Antartika 1 Sidoarjo',
                content: `
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <!-- Top private school intro -->
                        <div style="background:#EFF6FF; border:1px solid #BFDBFE; border-radius:12px; padding:12px 16px; display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; border-radius:10px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><path d="M9 14l2 2 4-4"></path></svg>
                            </div>
                            <div>
                                <h4 style="margin:0; font-size:13.5px; font-weight:800; color:#0F172A;">Alur PPDB SMK Antartika 1 Sidoarjo</h4>
                                <p style="margin:2px 0 0; font-size:11.5px; color:#475569;">Layanan pendaftaran sekolah swasta cepat &amp; transparan dengan sistem One-Day Service.</p>
                            </div>
                        </div>

                        <!-- Steps -->
                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <!-- Step 1 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">1</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Pengisian Formulir Pendaftaran (Online / Di Kampus Sekolah)</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Calon siswa melakukan registrasi formulir pendaftaran via website resmi atau mengambil langsung formulir di Ruang Sekretariat PPDB SMK Antartika 1 Sidoarjo dengan memilih 2 program keahlian prioritas.</p>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">2</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Penyerahan &amp; Verifikasi Berkas (Didampingi Orang Tua / Wali)</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Menyerahkan berkas fotocopy persyaratan (Ijazah SD, SKL SMP/MTs, KK, Akta, NISN) ke panitia PPDB untuk verifikasi berkas secara langsung di tempat.</p>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">3</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Verifikasi Kelengkapan Berkas &amp; Penjurusan</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Panitia PPDB melakukan pengecekan kelengkapan berkas fisik, penentuan kelas peminatan jurusan, serta penandatanganan komitmen tata tertib bersama Orang Tua/Wali Murid.</p>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">4</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Penerimaan &amp; Daftar Ulang (Klaim Potongan Gelombang)</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Mendapatkan Surat Keputusan (SK) Penerimaan dan menyelesaikan administrasi daftar ulang dengan klaim potongan biaya gelombang aktif bulan berjalan.</p>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:30px; height:30px; border-radius:8px; background:#10B981; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">5</span>
                                <div>
                                    <strong style="color:#0F172A; font-size:13.5px;">Pengukuran Seragam &amp; Persiapan MPLS</strong>
                                    <p style="margin:4px 0 0; font-size:12px; color:#475569; line-height:1.5;">Pengambilan paket seragam sekolah dan kejuruan, pembagian atribut, serta pembekalan Masa Pengenalan Lingkungan Sekolah (MPLS).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            },
            faq: {
                title: 'Frequently Asked Questions (FAQ)',
                subtitle: 'Jawaban atas pertanyaan umum seputar PPDB SMK Antartika 1 Sidoarjo',
                content: `
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        <details style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:10px; padding:10px 14px; cursor:pointer;" open>
                            <summary style="font-weight:700; color:#0F172A;">Berapa kuota penerimaan siswa baru tahun 2026?</summary>
                            <p style="margin:6px 0 0; font-size:12px; color:#475569; line-height:1.5;">Total kuota penerimaan adalah 18 rombel untuk 5 program keahlian unggulan (RPL, TKR, TPM, TITL, TEI).</p>
                        </details>
                        <details style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:10px; padding:10px 14px; cursor:pointer;">
                            <summary style="font-weight:700; color:#0F172A;">Apakah tersedia program beasiswa?</summary>
                            <p style="margin:6px 0 0; font-size:12px; color:#475569; line-height:1.5;">Ya, tersedia Beasiswa Prestasi Akademik/Olahraga/Seni, Beasiswa Tahfidz Quran, serta Beasiswa Afirmasi KIP/PKH.</p>
                        </details>
                        <details style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:10px; padding:10px 14px; cursor:pointer;">
                            <summary style="font-weight:700; color:#0F172A;">Apakah lulusan langsung disalurkan kerja?</summary>
                            <p style="margin:6px 0 0; font-size:12px; color:#475569; line-height:1.5;">SMK Antartika 1 Sidoarjo memiliki BKK resmi dan kemitraan dengan lebih dari 85+ perusahaan industri nasional & multinasional untuk program magang dan penyerapan lulusan.</p>
                        </details>
                    </div>
                `
            },
            jalur: {
                title: 'Jalur Pendaftaran PPDB',
                subtitle: 'Pilihan jalur pendaftaran resmi SMK Antartika 1 Sidoarjo',
                content: `
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="background:#EFF6FF; border:1px solid #BFDBFE; border-radius:12px; padding:14px 16px; border-left:5px solid #004AC6;">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                <span style="background:#004AC6; color:#fff; font-size:10.5px; font-weight:800; padding:2px 8px; border-radius:6px; text-transform:uppercase;">Jalur 1</span>
                                <strong style="color:#0F172A; font-size:14px;">Pendaftaran Online</strong>
                            </div>
                            <p style="margin:0; font-size:12.5px; color:#475569; line-height:1.5;">Pendaftaran praktis dari rumah melalui portal web resmi & media sosial sekolah. Calon siswa cukup mengisi data formulir digital dan mengunggah dokumen yang dipersyaratkan.</p>
                        </div>
                        <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; border-left:5px solid #10B981;">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                <span style="background:#10B981; color:#fff; font-size:10.5px; font-weight:800; padding:2px 8px; border-radius:6px; text-transform:uppercase;">Jalur 2</span>
                                <strong style="color:#0F172A; font-size:14px;">Pendaftaran Offline (Langsung di Sekolah)</strong>
                            </div>
                            <p style="margin:0; font-size:12.5px; color:#475569; line-height:1.5;">Calon peserta didik datang langsung ke Sekretariat PPDB SMK Antartika 1 Sidoarjo didampingi Orang Tua/Wali Murid dengan membawa berkas persyaratan fisik untuk dibantu verifikasi instan oleh panitia.</p>
                        </div>
                        <div style="background:#FFFBEB; border:1px solid #FDE68A; border-radius:12px; padding:14px 16px; border-left:5px solid #F59E0B;">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                <span style="background:#F59E0B; color:#fff; font-size:10.5px; font-weight:800; padding:2px 8px; border-radius:6px; text-transform:uppercase;">Jalur 3</span>
                                <strong style="color:#0F172A; font-size:14px;">Beasiswa Prestasi</strong>
                            </div>
                            <p style="margin:0; font-size:12.5px; color:#475569; line-height:1.5;">Jalur istimewa bagi siswa berprestasi di bidang Akademik (peringkat kelas/paralel), Kejuaraan Sains/Robotik, Olahraga, Seni, atau Tahfidz Qur'an minimal tingkat Kabupaten/Provinsi/Nasional dengan potongan biaya khusus & bebas SPP.</p>
                        </div>
                    </div>
                `
            },
            online: {
                title: 'Alur Lengkap Pendaftaran PPDB Online',
                subtitle: 'Tahapan pendaftaran calon peserta didik baru melalui sistem online TEFA-Hub',
                content: `
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="background:#EFF6FF; border:1px solid #BFDBFE; border-radius:12px; padding:12px 16px; display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; border-radius:10px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </div>
                            <div>
                                <h4 style="margin:0; font-size:13.5px; font-weight:800; color:#0F172A;">Alur Lengkap Pendaftaran PPDB Online</h4>
                                <p style="margin:2px 0 0; font-size:11.5px; color:#475569;">Ikuti tahapan registrasi online calon peserta didik baru di bawah ini:</p>
                            </div>
                        </div>

                        <div style="display:flex; flex-direction:column; gap:10px;">
                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">1</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Buka portal PPDB online melalui halaman Beranda TEFA-Hub.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">2</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Klik tombol <strong>"Daftar Akun Calon Siswa"</strong> dan isi NISN, Nama Lengkap, serta Nomor WhatsApp aktif.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">3</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Lengkapi formulir biodata diri dan data orang tua/wali.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">4</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Unggah berkas dokumen (KK, Akta Lahir, SKL/Nilai Rapor SMP, dan Pas Foto).
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">5</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Pilih 1 atau 2 Konsentrasi Keahlian (Jurusan) yang diminati.
                                </div>
                            </div>

                            <div style="background:#FAFCFF; border:1px solid #E2E8F0; border-radius:12px; padding:13px 16px; display:flex; gap:14px; align-items:flex-start;">
                                <span style="width:28px; height:28px; border-radius:8px; background:#004AC6; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:13px; flex-shrink:0;">6</span>
                                <div style="font-size:13px; color:#1E293B; line-height:1.5;">
                                    Unduh Bukti Pendaftaran dan tunggu jadwal verifikasi &amp; pengumuman hasil seleksi.
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:16px;">
                            <button type="button" onclick="closePpdbModal(); openPpdbRegisterModal();" class="btn-ppdb-primary" style="width:100%; height:44px; justify-content:center; font-size:13.5px; font-weight:700;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Buka Formulir Pendaftaran Sekarang</span>
                            </button>
                        </div>
                    </div>
                `
            },
            'jurusan-all': {
                title: 'Seluruh Program Keahlian (5 Jurusan Unggulan)',
                subtitle: 'Kurikulum berbasis industri dan sertifikasi kompetensi nasional LSP-P1',
                content: `
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>1. Rekayasa Perangkat Lunak (RPL)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Web & Mobile App Development, UI/UX Design, Cloud Services & AI Integration.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>2. Teknik Kendaraan Ringan (TKR)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Mekanik otomotif modern, electronic fuel injection (EFI), chassis & transmisi kendaraan roda 4.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>3. Teknik Pemesinan (TPM)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Bubut presisi, CNC Milling, CAD/CAM 3D modeling, dan manufaktur mesin industri.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>4. Teknik Instalasi Tenaga Listrik (TITL)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Instalasi penerangan & tenaga gedung, PLC automation, panel kelistrikan industri.</p>
                        </div>
                        <div style="border-left:4px solid #004AC6; background:#FAFCFF; padding:10px 14px; border-radius:0 8px 8px 0;">
                            <strong>5. Teknik Elektronika Industri (TEI)</strong>
                            <p style="margin:3px 0 0; font-size:12px; color:#475569;">Mikrokontroler IoT, mekatronika, sistem instrumentasi kontrol pabrik dan robotika.</p>
                        </div>
                    </div>
                `
            }
        };

        const JURUSAN_DETAIL_DATA = {
            tkr: {
                title: 'Teknik Kendaraan Ringan (TKR)',
                subtitle: 'Program Keahlian Otomotif Berbasis Kelas Binaan Industri',
                desc: 'Membekali siswa dengan keahlian pemeliharaan, servis, dan perbaikan mesin kendaraan roda 4 modern, sistem EFI, rem ABS, transmisi otomatis, dan electrical car technology.'
            },
            tei: {
                title: 'Teknik Elektronika Industri (TEI)',
                subtitle: 'Program Keahlian Instrumentasi & Kontrol Otomasi Pabrik',
                desc: 'Fokus pada pemrograman mikroprosesor, sistem kendali PLC, sensor telemetri industri, perakitan sirkuit PCB otomatis, dan perawatan mesin robotika industri modern.'
            },
            titl: {
                title: 'Teknik Instalasi Tenaga Listrik (TITL)',
                subtitle: 'Program Keahlian Kelistrikan Gedung & Tenaga Industri',
                desc: 'Mempelajari perancangan instalasi listrik rumah tinggal dan gedung bertingkat, panel distribusi 3 fasa, motor listrik industri, serta pembangkit listrik energi terbarukan (Solar Panel).'
            },
            rpl: {
                title: 'Rekayasa Perangkat Lunak (RPL)',
                subtitle: 'Program Keahlian Software Engineering & TEFA Software House',
                desc: 'Mendidik software engineer handal di bidang Full-Stack Web (Laravel, React, Node), Mobile App (Flutter), arsitektur REST API, UI/UX prototyping, dan integrasi Artificial Intelligence.'
            },
            tpm: {
                title: 'Teknik Pemesinan (TPM)',
                subtitle: 'Program Keahlian Manufaktur Presisi & Teknologi CNC',
                desc: 'Keahlian mengoperasikan mesin bubut konvensional, mesin frais, mesin gerinda datar/silinder, serta perancangan CAD/CAM dan pemrograman mesin CNC berstandar industri presisi.'
            }
        };

        /* ─── Poster Welcome Modal (Carousel) Logic ─── */
        let currentPosterIndex = 0;

        function openPpdbPosterModal() {
            const overlay = document.getElementById('ppdbPosterModalOverlay');
            if (!overlay) return;
            overlay.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => overlay.classList.add('active'), 20);
        }

        function closePpdbPosterModal() {
            const overlay = document.getElementById('ppdbPosterModalOverlay');
            if (!overlay) return;
            overlay.classList.remove('active');
            setTimeout(() => {
                overlay.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
        }

        function updatePosterSlide(idx) {
            const slides = document.querySelectorAll('.ppdb-poster-slide');
            const dots = document.querySelectorAll('.poster-dot');
            if (!slides.length) return;

            if (idx >= slides.length) {
                currentPosterIndex = 0;
            } else if (idx < 0) {
                currentPosterIndex = slides.length - 1;
            } else {
                currentPosterIndex = idx;
            }

            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === currentPosterIndex);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentPosterIndex);
            });
        }

        function nextPpdbPosterSlide() {
            updatePosterSlide(currentPosterIndex + 1);
        }

        function prevPpdbPosterSlide() {
            updatePosterSlide(currentPosterIndex - 1);
        }

        function goPpdbPosterSlide(idx) {
            updatePosterSlide(idx);
        }

        // Close Poster on backdrop click
        document.getElementById('ppdbPosterModalOverlay')?.addEventListener('click', function(e) {
            if (e.target === this) closePpdbPosterModal();
        });

        /* ─── Detail Modal Logic ─── */
        function openPpdbModal(key) {
            const data = PPDB_DATA[key];
            if (!data) return;

            document.getElementById('ppdbModalTitle').innerText = data.title;
            document.getElementById('ppdbModalSubtitle').innerText = data.subtitle;
            document.getElementById('ppdbModalBody').innerHTML = data.content;

            const modal = document.getElementById('ppdbModalOverlay');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => modal.classList.add('active'), 10);
        }

        /* ─── PPDB Interactive Registration Wizard Logic ─── */
        let currentRegStep = 1;
        const regFiles = {};

        function openPpdbRegisterModal() {
            window.location.href = "{{ route('ppdb.daftar') }}";
        }

        function closePpdbRegisterModal() {
            // No-op for backwards compatibility
        }

        function openJurusanDetail(code) {
            const item = JURUSAN_DETAIL_DATA[code];
            if (!item) return;

            document.getElementById('ppdbModalTitle').innerText = item.title;
            document.getElementById('ppdbModalSubtitle').innerText = item.subtitle;
            document.getElementById('ppdbModalBody').innerHTML = `
                <div style="font-size:13.5px; color:#334155; line-height:1.7;">
                    <p style="margin:0 0 12px 0;">${item.desc}</p>
                    <div style="background:#F0F6FF; border:1px solid #D5DCFF; border-radius:10px; padding:12px 14px;">
                        <strong style="color:#004AC6; font-size:13px;">Prospek Karir &amp; Lulusan:</strong>
                        <ul style="margin:6px 0 0; padding-left:18px; color:#475569; font-size:12.5px;">
                            <li>Teknisi Spesialis Industri Nasional & Multinasional</li>
                            <li>Wirausahawan Mandiri / Technopreneur TEFA</li>
                            <li>Melanjutkan Kuliah di Perguruan Tinggi Negeri / Vokasi</li>
                        </ul>
                    </div>
                </div>
            `;

            const modal = document.getElementById('ppdbModalOverlay');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => modal.classList.add('active'), 10);
        }

        function closePpdbModal() {
            const modal = document.getElementById('ppdbModalOverlay');
            if (!modal) return;

            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }, 250);
        }

        // Close Detail modal when clicking overlay backdrop
        document.getElementById('ppdbModalOverlay')?.addEventListener('click', function(e) {
            if (e.target === this) closePpdbModal();
        });

        // Global Keyboard Handler
        document.addEventListener('keydown', function(e) {
            const posterOverlay = document.getElementById('ppdbPosterModalOverlay');
            if (posterOverlay && posterOverlay.classList.contains('active')) {
                if (e.key === 'Escape') closePpdbPosterModal();
                if (e.key === 'ArrowRight') nextPpdbPosterSlide();
                if (e.key === 'ArrowLeft') prevPpdbPosterSlide();
                return;
            }

            if (e.key === 'Escape') {
                closePpdbModal();
                closePpdbRegisterModal();
            }
        });

        // Download Brosur PDF
        function downloadBrosurPpdb() {
            showPpdbToast('Mengunduh Brosur Resmi PPDB SMK Antartika 1 Sidoarjo (PDF)...');
        }

        function showPpdbToast(msg) {
            const toast = document.getElementById('ppdbToast');
            const msgElem = document.getElementById('ppdbToastMsg');
            if (!toast || !msgElem) return;

            msgElem.innerText = msg;
            toast.style.display = 'flex';
            setTimeout(() => toast.classList.add('show'), 10);

            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.style.display = 'none', 300);
            }, 3200);
        }

        // Auto-open poster popup when visiting the PPDB page
        window.addEventListener('DOMContentLoaded', function() {
            setTimeout(openPpdbPosterModal, 300);
        });

        // Reset scroll and state when navigating back (bfcache)
        window.addEventListener('pageshow', function() {
            document.body.style.overflow = '';
        });
    </script>

</body>
</html>
