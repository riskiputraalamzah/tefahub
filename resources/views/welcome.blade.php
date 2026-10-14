<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Tefa-Hub — Satu ekosistem digital terpadu untuk akademik, BLUD teaching factory, dan career center siswa SMK.">
    <title>Tefa-Hub | Satu Ekosistem Digital untuk Seluruh Perjalanan Siswa</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ file_exists(public_path('assets/css/landing.css')) ? filemtime(public_path('assets/css/landing.css')) : '1.0' }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sambutan.css') }}?v={{ file_exists(public_path('assets/css/sambutan.css')) ? filemtime(public_path('assets/css/sambutan.css')) : '1.0' }}">
    <link rel="stylesheet" href="{{ asset('assets/css/logo-marquee.css') }}?v={{ file_exists(public_path('assets/css/logo-marquee.css')) ? filemtime(public_path('assets/css/logo-marquee.css')) : '1.0' }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Accessibility: Skip to Main Content --}}
    <a href="#mainContent" class="skip-to-content">Lewati ke Konten Utama</a>

    {{-- Cinematic GSAP Scroll Progress Indicator --}}
    <div data-scroll-progress aria-hidden="true"></div>

    {{-- Premium Modern Onboarding Splash Preloader Animation --}}
    <x-onboarding />

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header />

    {{-- ═══════════════════════════════════════════
         HERO SECTION
         ═══════════════════════════════════════════ --}}
    <main class="hero" id="mainContent">
        <div class="wrap">

            {{-- Left: copy & search --}}
            <section class="hero-content">
                <div class="pill-badge" data-anim="eyebrow">
                    <span class="pill-dot" aria-hidden="true"></span>
                    <span class="pill-text">Platform Resmi SMK Pusat Keunggulan &amp; BLUD</span>
                </div>

                <h1 class="hero-title" data-anim="hero-title">
                    <span class="l1"><span class="hi">Satu</span> Ekosistem Digital</span>
                    <span class="l2">untuk Seluruh</span>
                    <span class="l3">Perjalanan Siswa</span>
                </h1>

                <p class="hero-desc" data-anim="hero-copy">
                    Akselerasikan potensi dan karier kejuruanmu dalam satu ekosistem terpercaya —
                    dari pembelajaran kurikulum industri berbasis SKKNI, unit produksi BLUD Teaching Factory, hingga rekrutmen kerja terverifikasi ke mitra DUDI nasional.
                </p>

                <div class="search-wrap" data-anim="hero-actions">
                    <form id="heroSearchForm" class="search-box" role="search">
                        <span class="s-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="11" cy="11" r="7"/>
                                <line x1="16.5" y1="16.5" x2="22" y2="22" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <input
                            type="text" name="q" id="heroSearchInput"
                            class="s-input"
                            placeholder="Cari info jurusan, PKL, fasilitas, atau beasiswa..."
                            aria-label="Cari informasi sekolah"
                            autocomplete="off"
                        >
                        <button type="submit" class="s-btn" id="heroSearchBtn" aria-label="Cari">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <line x1="5" y1="12" x2="19" y2="12" stroke-linecap="round"/>
                                <polyline points="12 5 19 12 12 19" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <a href="{{ route('ppdb.kuis') }}" class="hero-ai-discovery-link" data-anim="hero-actions">
                    <span aria-hidden="true">✨</span>
                    Coba AI Temukan Jurusanmu — hasil instan
                    <span aria-hidden="true">→</span>
                </a>
            </section>

            {{-- Right: visual composition --}}
            <section class="hero-visual" data-anim="hero-visual" aria-label="Visualisasi Siswa Tefa-Hub">

                {{-- Modern Organic Vector Wavy Background (Unique Fluid Wave Shapes & Ambient Glow) --}}
                <div class="hero-bubble-art" aria-hidden="true">
                    <svg class="hero-wave-svg" viewBox="0 0 580 520" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="waveGradPrimary" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#1d4ed8"/>
                                <stop offset="30%" stop-color="#2563eb"/>
                                <stop offset="65%" stop-color="#6366f1"/>
                                <stop offset="100%" stop-color="#8b5cf6"/>
                            </linearGradient>
                            <linearGradient id="waveGradCyan" x1="0%" y1="100%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#0284c7" stop-opacity="0.7"/>
                                <stop offset="50%" stop-color="#38bdf8" stop-opacity="0.85"/>
                                <stop offset="100%" stop-color="#818cf8" stop-opacity="0.7"/>
                            </linearGradient>
                            <linearGradient id="waveStrokeGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#60a5fa" stop-opacity="0.9"/>
                                <stop offset="100%" stop-color="#c084fc" stop-opacity="0.3"/>
                            </linearGradient>
                            <linearGradient id="waveStrokeGrad2" x1="100%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#38bdf8" stop-opacity="0.8"/>
                                <stop offset="100%" stop-color="#818cf8" stop-opacity="0.2"/>
                            </linearGradient>
                            <filter id="softWaveGlow" x="-20%" y="-20%" width="140%" height="140%">
                                <feGaussianBlur stdDeviation="20" result="blur"/>
                                <feComposite in="SourceGraphic" in2="blur" operator="over"/>
                            </filter>
                        </defs>

                        {{-- Ambient Glow Layer --}}
                        <path d="M 120,180 C 80,80 260,30 400,60 C 520,90 560,260 480,390 C 400,500 210,480 130,410 C 60,340 140,260 120,180 Z" 
                              fill="url(#waveGradCyan)" opacity="0.35" filter="url(#softWaveGlow)"/>

                        {{-- Main Organic Wavy Fluid Body --}}
                        <path class="wave-shape-fluid" d="M 140,150 C 120,60 280,40 420,70 C 520,100 555,230 500,350 C 450,460 300,470 190,420 C 100,380 90,260 130,180 C 135,170 138,160 140,150 Z" 
                              fill="url(#waveGradPrimary)"/>

                        {{-- Secondary Overlay Wave Crescent --}}
                        <path d="M 160,80 C 270,45 420,75 490,140 C 420,170 290,160 200,230 C 170,180 155,120 160,80 Z" 
                              fill="url(#waveGradCyan)" opacity="0.45"/>

                        {{-- Decorative Flowing Wave Lines --}}
                        <path d="M 60,190 Q 210,120 370,220 T 560,180" 
                              stroke="url(#waveStrokeGrad1)" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.8" stroke-dasharray="6 8"/>

                        <path d="M 90,400 Q 250,460 420,370 T 550,410" 
                              stroke="url(#waveStrokeGrad2)" stroke-width="2.5" stroke-linecap="round" fill="none" opacity="0.65"/>

                        {{-- Floating Geometric & Wave Accents --}}
                        <circle cx="95" cy="130" r="14" stroke="#60a5fa" stroke-width="2.5" fill="none" opacity="0.75"/>
                        <circle cx="490" cy="95" r="7" fill="#38bdf8" opacity="0.85"/>
                        <circle cx="525" cy="405" r="10" stroke="#a855f7" stroke-width="2" fill="none" opacity="0.7"/>
                    </svg>

                    {{-- Tilted Accent Gradient Pills --}}
                    <div class="bubble-pill-1"></div>
                    <div class="bubble-pill-2"></div>
                    
                    {{-- Left dot matrix --}}
                    <div class="bubble-dots-left">
                        @for ($i = 0; $i < 12; $i++)
                            <span class="b-dot"></span>
                        @endfor
                    </div>

                    {{-- Right dot matrix --}}
                    <div class="bubble-dots-right">
                        @for ($i = 0; $i < 12; $i++)
                            <span class="b-dot"></span>
                        @endfor
                    </div>
                </div>

                {{-- Tagline "Siap Berkarya untuk Negeri" --}}
                <div class="hero-tagline-quote" aria-hidden="true">
                    <span>Kompeten<br>Kreatif &amp;<br>Siap Kerja</span>
                </div>

                {{-- Students 3D character photo --}}
                <div class="students-wrap">
                    {{-- Floating Official Verification Badges (Desktop floating, Mobile clean above photo) --}}
                    <div class="hero-badges-wrapper">
                        <div class="hero-verified-badge hero-badge-akreditasi" data-hover-card>
                            <div class="verified-icon-circle">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                            </div>
                            <div class="verified-badge-text">
                                <span class="verified-title">TERAKREDITASI "A"</span>
                                <span class="verified-sub">BAN-S/M Kemendikbudristek</span>
                            </div>
                        </div>

                        <div class="hero-verified-badge hero-badge-smkpk" data-hover-card>
                            <div class="verified-icon-circle icon-pk">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="verified-badge-text">
                                <span class="verified-title">SMK PUSAT KEUNGGULAN</span>
                                <span class="verified-sub">Kurikulum Selaras Industri</span>
                            </div>
                        </div>
                    </div>

                    <img
                        src="{{ asset('assets/image.webp') }}"
                        alt="Siswa dan Siswi SMK Tefa-Hub"
                        class="students-img"
                    >
                </div>

                {{-- Floating 2 feature cards (Centered, Equal Size, Original Style) --}}
                @php
                    $heroCards = [
                        ['icon' => 'card.webp', 'title' => 'BKK & Mitra Industri',  'desc' => 'Akses lowongan kerja & magang mitra industri resmi.',      'href' => route('bkk')],
                        ['icon' => 'book.webp', 'title' => 'PPDB Vokasi Digital',  'desc' => 'Daftar calon peserta didik baru terakreditasi A secara instan.',       'href' => route('ppdb')],
                    ];
                @endphp

                <div class="cards-row" data-stagger>
                    @foreach ($heroCards as $card)
                        <div class="card" role="button" tabindex="0" data-stagger-item data-hover-card
                             onclick="window.location.href='{{ $card['href'] }}'">
                            {{-- Icon kiri --}}
                            <div class="card-icon">
                                <img src="{{ asset('assets/' . $card['icon']) }}" alt="Icon {{ $card['title'] }}">
                            </div>
                            {{-- Title + desc tengah --}}
                            <div class="card-head">
                                <h2 class="card-title">{{ $card['title'] }}</h2>
                                <p class="card-desc">{{ $card['desc'] }}</p>
                            </div>
                            {{-- Arrow button biru bulat kanan --}}
                            <div class="card-foot">
                                <button class="btn-arrow" title="Buka {{ $card['title'] }}">
                                    <img src="{{ asset('assets/back.webp') }}" alt="Lanjut">
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>
        </div>
    </main>

    {{-- ═══════════════════════════════════════════
         SAMBUTAN KEPALA SEKOLAH
         ═══════════════════════════════════════════ --}}
    <x-sambutan-kepsek />

    {{-- ═══════════════════════════════════════════
         INFINITE LOGO MARQUEE WITH SEQUENTIAL AUTO SPOTLIGHT
         ═══════════════════════════════════════════ --}}
    <x-logo-marquee />

    {{-- ═══════════════════════════════════════════
         ABOUT SECTION
         ═══════════════════════════════════════════ --}}
    <section class="about-section" id="tentang">
        <div class="wrap">

            {{-- Left: Logo Image --}}
            <div class="about-visual" data-reveal="left">
                <img src="{{ asset('assets/logo2.webp') }}" alt="Logo Tefa-Hub" class="about-logo-img">
            </div>

            {{-- Right: Content --}}
            <div class="about-content" data-reveal="right">
                <span class="about-category">TENTANG KAMI</span>

                <h2 class="about-title">
                    Apa itu <span class="gradient-text">Tefa–Hub</span> ?
                </h2>

                <p class="about-desc">
                    Tefa-Hub adalah aplikasi resmi sekolah yang menyatukan semua layanan siswa di satu tempat. Mulai dari pendaftaran siswa baru, kegiatan belajar harian, penjualan karya dan jasa siswa, hingga penyaluran magang dan kerja ke perusahaan mitra.
                </p>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SCHOOL VALUE PROPOSITION (KENAPA PILIH KAMI)
         ═══════════════════════════════════════════ --}}
    <x-school-value-proposition />

    {{-- ═══════════════════════════════════════════
         SERVICES / 4 CARDS SECTION
         ═══════════════════════════════════════════ --}}
    <section class="services-section" id="layanan">
        <div class="wrap">

            <div class="services-header" data-reveal="scale">
                <h2 class="services-title">Layanan Unggulan Sekolah</h2>
                <p class="services-desc">
                    Semua informasi dan kebutuhan sekolah dapat diakses dengan mudah dan praktis di satu tempat.
                </p>
            </div>

            @php
                $services = [
                    [
                        'icon' => '1.webp',
                        'title' => 'Pendaftaran Siswa Baru (PPDB)',
                        'desc' => 'Informasi dan pendaftaran online calon siswa baru secara mudah, cepat, dan transparan.',
                        'link' => route('ppdb'),
                    ],
                    [
                        'icon' => '2.webp',
                        'title' => 'Belajar & Nilai Digital',
                        'desc' => 'Akses materi pelajaran, kumpulkan tugas, dan lihat nilai rapor langsung dari hp.',
                        'link' => route('siswa.akademik'),
                    ],
                    [
                        'icon' => '3.webp',
                        'title' => 'Praktik Kerja Lapangan (PKL)',
                        'desc' => 'Program magang industri terstruktur bersama 50+ mitra industri resmi bersertifikasi kompetensi.',
                        'link' => route('pkl'),
                    ],
                    [
                        'icon' => '4.webp',
                        'title' => 'Penyaluran Kerja & Karir (BKK)',
                        'desc' => 'Informasi lowongan kerja resmi, rekrutmen kampus, dan penyaluran lulusan ke dunia kerja.',
                        'link' => route('bkk'),
                    ],
                ];
            @endphp

            <div class="services-grid" data-stagger>
                @foreach ($services as $index => $service)
                    <div class="service-card" data-stagger-item data-hover-card>
                        <div class="service-card-body">
                            <div class="service-icon">
                                <img src="{{ asset('assets/' . $service['icon']) }}" alt="{{ $service['title'] }}">
                            </div>
                            <h3 class="service-card-title">{{ $service['title'] }}</h3>
                            <p class="service-card-desc">{{ $service['desc'] }}</p>
                        </div>
                        <a href="{{ $service['link'] }}" class="service-btn">
                            Lihat Selengkapnya
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         SHOWCASE / PKL & MITRA INDUSTRI SECTION
         ═══════════════════════════════════════════ --}}
    <section class="showcase-section" id="pkl">
        <div class="wrap">

            {{-- Left: Text & CTA --}}
            <div class="showcase-content" data-reveal="left">
                <span class="showcase-category">PROGRAM MAGANG &amp; KEMITRAAN DUDI</span>

                <h2 class="showcase-title">Praktik Kerja Lapangan &amp; Pengalaman Industri Nyata</h2>

                <p class="showcase-desc">
                    Siswa SMK Antartika 1 Sidoarjo diterjunkan langsung ke dunia usaha dan dunia industri (DUDI). Dibekali keahlian teknis terkini, standar K3, etos kerja profesional, dan sertifikasi BNSP berstandar nasional.
                </p>

                <a href="{{ route('pkl') }}" class="showcase-btn">
                    Eksplorasi Program PKL
                </a>
            </div>

            {{-- Right: Visual Mockup matching Vocational PKL Cards --}}
            <div class="showcase-visual" data-reveal="right">
                <div class="showcase-cards">
                    <div class="blud-card-frame showcase-card-layer showcase-card-1" data-hover-card>
                        <div class="blud-card-image-wrap">
                            <img src="{{ asset('assets/image copy 3.webp') }}" alt="Praktik Industri Otomotif & Manufaktur" class="blud-bg-img" loading="lazy" decoding="async">
                            <span class="blud-rating-badge">
                                <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                4.9
                            </span>
                            <span class="blud-price-badge">Bengkel APM</span>
                            <div class="blud-inner-card">
                                <div class="blud-inner-content">
                                    <span class="blud-tag">TEKNIK OTOMOTIF &amp; MESIN</span>
                                    <h3 class="blud-title">Praktik Industri &amp; Servis Presisi</h3>
                                </div>
                                <a href="{{ route('pkl') }}" class="blud-btn">Lihat Panduan PKL</a>
                            </div>
                        </div>
                    </div>
                    <div class="blud-card-frame showcase-card-layer showcase-card-2" data-hover-card>
                        <div class="blud-card-image-wrap">
                            <img src="{{ asset('assets/image copy 3.webp') }}" alt="Magang Industri Software & Jaringan" class="blud-bg-img" loading="lazy" decoding="async">
                            <span class="blud-rating-badge">
                                <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                5.0
                            </span>
                            <span class="blud-price-badge">Tech Partner</span>
                            <div class="blud-inner-card">
                                <div class="blud-inner-content">
                                    <span class="blud-tag">RPL &amp; TEKNIK JARINGAN</span>
                                    <h3 class="blud-title">Magang Software &amp; Cloud Infra</h3>
                                </div>
                                <a href="{{ route('pkl') }}" class="blud-btn">Lihat Panduan PKL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         FACILITIES & WORKSHOPS SHOWCASE
         ═══════════════════════════════════════════ --}}
    <x-facilities-showcase />

    {{-- ═══════════════════════════════════════════
         AI HELPER / TANYA TEFA SECTION
         ═══════════════════════════════════════════ --}}
    <section class="ai-section" id="tanya-tefa">
        <div class="wrap">

            {{-- Left: ai.webp Image --}}
            <div class="ai-visual" data-reveal="left">
                <img src="{{ asset('assets/ai.webp') }}" alt="Tefa AI Assistant" class="ai-img">
            </div>

            {{-- Right: Content & 3 Cards --}}
            <div class="ai-content" data-reveal="right">
                <span class="ai-category">BANTUAN CEPAT</span>

                <h2 class="ai-title">Pusat Informasi &amp; Bantuan 24 Jam</h2>

                <p class="ai-desc">
                    Punya pertanyaan seputar sekolah, jadwal magang, atau pendaftaran siswa? Asisten pintar Tanya Tefa siap membantumu kapan saja.
                </p>

                @php
                    $aiFeatures = [
                        [
                            'icon' => '11.webp',
                            'title' => 'Siap Membantu 24/7',
                            'desc' => 'Tanya info sekolah kapan saja tanpa harus menunggu jam buka kantor.',
                        ],
                        [
                            'icon' => '12.webp',
                            'title' => 'Jawaban Cepat & Tepat',
                            'desc' => 'Dapatkan penjelasan resmi dan panduan langsung yang mudah dimengerti.',
                        ],
                        [
                            'icon' => '13.webp',
                            'title' => 'Mudah Digunakan',
                            'desc' => 'Cukup ketik pertanyaanmu dan asisten kami akan langsung menjawab.',
                        ],
                    ];
                @endphp

                <div class="ai-cards" data-stagger>
                    @foreach ($aiFeatures as $index => $feat)
                        <div class="ai-card" data-stagger-item data-hover-card>
                            <div class="ai-card-icon">
                                <img src="{{ asset('assets/' . $feat['icon']) }}" alt="{{ $feat['title'] }}">
                            </div>
                            <h3 class="ai-card-title">{{ $feat['title'] }}</h3>
                            <p class="ai-card-desc">{{ $feat['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         ALUMNI TESTIMONIALS & INDUSTRY TRUST
         ═══════════════════════════════════════════ --}}
    <x-alumni-testimonials />

    {{-- ═══════════════════════════════════════════
         CTA BANNER SECTION
         ═══════════════════════════════════════════ --}}
    <section class="cta-banner-section">
        <div class="wrap">
            <div class="cta-banner-card" data-reveal="scale">
                <h2 class="cta-banner-title">
                    Siapkan Masa Depanmu<br>
                    Bersama Tefa–Hub
                </h2>

                <p class="cta-banner-desc">
                    Mulai langkah pertamamu hari ini. Belajar dengan praktik nyata dan raih peluang kerja impianmu.
                </p>

                <a href="{{ Route::has('login') ? route('login') : '#login' }}" class="cta-banner-btn">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         ECOSYSTEM SUPPORTERS & INITIATIVE PARTNERS
         ═══════════════════════════════════════════ --}}
    <section class="supporters-section" aria-label="Ekosistem Pendukung dan Inisiatif Kolaborasi">
        <div class="supporters-header" data-reveal>
            <p class="supporters-label">Inisiatif Kolaboratif &amp; Ekosistem Pendukung</p>
        </div>
        <div class="supporters-marquee-stage" data-reveal>
            <div class="supporters-track">
                @for ($set = 0; $set < 4; $set++)
                    <div class="supporters-group" @if($set > 0) aria-hidden="true" @endif>
                        <div class="supporter-logo-item" title="Jagoan Hosting Innovation Competition">
                            <img src="{{ asset('assets/L1.webp') }}" alt="Jagoan Hosting Innovation Competition" loading="lazy">
                        </div>
                        <div class="supporter-logo-item" title="Jagoan Hosting">
                            <img src="{{ asset('assets/L2.webp') }}" alt="Jagoan Hosting" loading="lazy">
                        </div>
                        <div class="supporter-logo-item" title="Kementerian Komunikasi dan Digital">
                            <img src="{{ asset('assets/L3.webp') }}" alt="Kementerian Komunikasi dan Digital" loading="lazy">
                        </div>
                        <div class="supporter-logo-item" title="Garuda Spark Innovation Hub">
                            <img src="{{ asset('assets/L4.webp') }}" alt="Garuda Spark Innovation Hub" loading="lazy">
                        </div>
                        <div class="supporter-logo-item" title="Ngalup.co">
                            <img src="{{ asset('assets/L5.webp') }}" alt="Ngalup.co" loading="lazy">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Unified Reusable Landing Footer --}}
    <x-landing-footer />

    {{-- Unified Reusable Tanya Tefa AI Widget --}}
    <x-ai-widget subtitle="Pusat Bantuan 24/7" />

    {{-- ═══════════════════════════════════════════
         SCRIPTS: SEARCH & DISCOVERY
         ═══════════════════════════════════════════ --}}
    <script>
    (function() {
        function initWelcomePage() {
            const heroSearchForm = document.getElementById('heroSearchForm');
            const heroSearchInput = document.getElementById('heroSearchInput');
            
            if (heroSearchForm && heroSearchInput) {
                heroSearchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const query = heroSearchInput.value.trim();
                    if (!query) {
                        heroSearchInput.focus();
                        return;
                    }
                    
                    const qLower = query.toLowerCase();
                    let targetId = null;
                    
                    if (qLower.includes('fasilitas') || qLower.includes('bengkel') || qLower.includes('lab') || qLower.includes('laboratorium') || qLower.includes('workshop')) {
                        targetId = 'fasilitas';
                    } else if (qLower.includes('keunggulan') || qLower.includes('alasan') || qLower.includes('kenapa') || qLower.includes('akreditasi') || qLower.includes('bnsp')) {
                        targetId = 'keunggulan';
                    } else if (qLower.includes('karir') || qLower.includes('bkk') || qLower.includes('kerja') || qLower.includes('loker') || qLower.includes('lowongan')) {
                        targetId = 'layanan';
                    } else if (qLower.includes('pkl') || qLower.includes('magang') || qLower.includes('industri') || qLower.includes('prakerin') || qLower.includes('praktik')) {
                        targetId = 'pkl';
                    } else if (qLower.includes('akademik') || qLower.includes('nilai') || qLower.includes('jadwal') || qLower.includes('guru') || qLower.includes('siswa') || qLower.includes('kurikulum') || qLower.includes('pelajaran')) {
                        targetId = 'layanan';
                    } else if (qLower.includes('layanan') || qLower.includes('fitur') || qLower.includes('ppdb') || qLower.includes('daftar')) {
                        targetId = 'layanan';
                    } else if (qLower.includes('tentang') || qLower.includes('profil') || qLower.includes('sekolah') || qLower.includes('smk') || qLower.includes('apa itu') || qLower.includes('sambutan')) {
                        targetId = 'sambutan';
                    }
                    
                    if (targetId) {
                        const targetEl = document.getElementById(targetId);
                        if (targetEl) {
                            targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    }
                    
                    // Trigger Tanya Tefa AI assistant for comprehensive guidance
                    if (window.sendNavChip) {
                        window.sendNavChip(query);
                    }
                });
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initWelcomePage);
        } else {
            initWelcomePage();
        }

        window.addEventListener('pageshow', function() {
            document.body.style.overflow = '';
        });
    })();
    </script>
</body>
</html>
