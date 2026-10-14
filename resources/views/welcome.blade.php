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
    <style>
        /* Failsafe Guaranteed Visibility: All landing page sections always visible under all network/cache states */
        .hero, .principal-section, .logo-marquee-section, .about-section,
        .value-prop-section, .services-section, .showcase-section,
        .facilities-section, .ai-section, .alumni-section, .cta-banner-section,
        .supporters-section, .main-footer, .scroll-layer-section,
        [data-reveal], [data-stagger-item], .reveal, .reveal-left, .reveal-right, .reveal-scale,
        .cards-row, .card, .service-card, .ai-card, .facility-card, .alumni-card {
            opacity: 1 !important;
            visibility: visible !important;
            transform: none !important;
        }
    </style>
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
        {{-- Interactive Particle Canvas (Item 3) --}}
        <canvas id="heroParticleCanvas" class="hero-particle-canvas" aria-hidden="true"></canvas>

        <div class="wrap">

            {{-- Left: copy & search --}}
            <section class="hero-content">
                <div class="pill-badge" data-anim="eyebrow" id="heroPillBadge" style="cursor: pointer;" title="Klik untuk tips & info berikutnya">
                    <span class="pill-dot" aria-hidden="true"></span>
                    <span class="pill-text pill-text-rotating" id="heroPillText">Platform Resmi SMK Pusat Keunggulan &amp; BLUD</span>
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
                    {{-- Trigger box (readonly, opens modal on click) --}}
                    <button type="button" id="heroSearchTrigger" class="search-box search-box-trigger" aria-label="Buka pencarian" aria-haspopup="dialog">
                        <span class="s-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="11" cy="11" r="7"/>
                                <line x1="16.5" y1="16.5" x2="22" y2="22" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <span class="s-input s-placeholder-text">Cari info jurusan, PKL, fasilitas, atau beasiswa...</span>
                        <span class="s-btn" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <line x1="5" y1="12" x2="19" y2="12" stroke-linecap="round"/>
                                <polyline points="12 5 19 12 12 19" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </button>
                </div>

                <a href="{{ route('ppdb.kuis') }}" class="hero-ai-discovery-link" data-anim="hero-actions">
                    <span aria-hidden="true">✨</span>
                    Coba AI Temukan Jurusanmu — hasil instan
                    <span aria-hidden="true">→</span>
                </a>
            </section>

            {{-- Right: visual composition --}}
            <section class="hero-visual" data-anim="hero-visual" aria-label="Visualisasi Siswa Tefa-Hub">

                {{-- Hero Background: Refined Aesthetic Cyber-Vokasi Blob behind student image --}}
                <div class="hero-bubble-art" aria-hidden="true">
                    <svg class="hero-wave-svg" viewBox="0 0 680 580" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                        <defs>
                            {{-- Vibrant Multi-Stop Radial Mesh Gradient --}}
                            <radialGradient id="blobGradMain" cx="50%" cy="46%" r="54%">
                                <stop offset="0%" stop-color="#38bdf8"/>
                                <stop offset="25%" stop-color="#2563eb"/>
                                <stop offset="60%" stop-color="#4f46e5"/>
                                <stop offset="85%" stop-color="#7c3aed"/>
                                <stop offset="100%" stop-color="#9333ea"/>
                            </radialGradient>

                            {{-- Soft Ambient Glow Halo --}}
                            <radialGradient id="blobGlowOuter" cx="50%" cy="50%" r="50%">
                                <stop offset="0%" stop-color="#60a5fa" stop-opacity="0.6"/>
                                <stop offset="45%" stop-color="#818cf8" stop-opacity="0.3"/>
                                <stop offset="75%" stop-color="#c084fc" stop-opacity="0.15"/>
                                <stop offset="100%" stop-color="#a855f7" stop-opacity="0"/>
                            </radialGradient>

                            {{-- Translucent Glass Shimmer Highlight --}}
                            <linearGradient id="blobShimmer" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#ffffff" stop-opacity="0.28"/>
                                <stop offset="50%" stop-color="#ffffff" stop-opacity="0.08"/>
                                <stop offset="100%" stop-color="#ffffff" stop-opacity="0"/>
                            </linearGradient>

                            {{-- Secondary Cyan Accent Flow --}}
                            <linearGradient id="cyanAccentFlow" x1="0%" y1="0%" x2="100%" y2="80%">
                                <stop offset="0%" stop-color="#38bdf8" stop-opacity="0.5"/>
                                <stop offset="100%" stop-color="#818cf8" stop-opacity="0.15"/>
                            </linearGradient>

                            <filter id="blobBlurDeep" x="-20%" y="-20%" width="140%" height="140%">
                                <feGaussianBlur stdDeviation="32" result="blur"/>
                                <feComposite in="SourceGraphic" in2="blur" operator="over"/>
                            </filter>
                        </defs>

                        {{-- Outer Ambient Aurora Halo (Wide & Centered Behind All 3 Characters) --}}
                        <ellipse cx="340" cy="285" rx="290" ry="250"
                            fill="url(#blobGlowOuter)" filter="url(#blobBlurDeep)"/>

                        {{-- Subtle Orbit Ring Behind Characters --}}
                        <ellipse cx="340" cy="280" rx="305" ry="248"
                            stroke="rgba(147, 197, 253, 0.45)" stroke-width="1.8" stroke-dasharray="7 11" fill="none"/>

                        {{-- Main Aesthetic Organic Cyber-Vokasi Silhouette (Balanced Left & Right) --}}
                        <path class="wave-shape-fluid"
                            d="M 340,42
                               C 440,38 535,76 585,145
                               C 635,215 645,308 604,388
                               C 564,460 482,514 394,528
                               C 360,534 320,534 286,528
                               C 198,514 116,460 76,388
                               C 35,308 45,215 95,145
                               C 145,76 240,38 340,42 Z"
                            fill="url(#blobGradMain)"/>

                        {{-- Secondary Translucent Crest Wave (Gives Glass Depth & Luster) --}}
                        <path
                            d="M 120,165
                               C 190,95 330,75 450,105
                               C 550,130 605,205 575,295
                               C 515,235 410,215 280,245
                               C 190,265 140,225 120,165 Z"
                            fill="url(#cyanAccentFlow)"/>

                        {{-- Specular Highlight Ribbon at Top-Left Curve --}}
                        <path
                            d="M 230,62
                               C 285,48 375,54 440,88
                               C 390,118 310,115 250,140
                               C 230,110 220,82 230,62 Z"
                            fill="url(#blobShimmer)"/>

                        {{-- Upper-Left Tech Satellite Node & Spark --}}
                        <circle cx="85" cy="115" r="22" stroke="rgba(96, 165, 250, 0.65)" stroke-width="2" fill="rgba(59, 130, 246, 0.12)"/>
                        <circle cx="85" cy="115" r="6" fill="#38bdf8"/>
                        {{-- 4-Point Spark Star at Left (60, 205) --}}
                        <path d="M 60,195 Q 60,205 50,205 Q 60,205 60,215 Q 60,205 70,205 Q 60,205 60,195 Z" fill="#67e8f9" opacity="0.9"/>

                        {{-- Upper-Right Vocational Engineering Radar Node & Spark --}}
                        <circle cx="595" cy="110" r="26" stroke="rgba(196, 181, 253, 0.55)" stroke-width="2" fill="rgba(124, 58, 237, 0.1)" stroke-dasharray="4 6"/>
                        <circle cx="595" cy="110" r="11" stroke="#a78bfa" stroke-width="1.5" fill="none"/>
                        <circle cx="595" cy="110" r="4.5" fill="#c084fc"/>
                        {{-- 4-Point Spark Star at Right (625, 195) --}}
                        <path d="M 625,185 Q 625,195 615,195 Q 625,195 625,205 Q 625,195 635,195 Q 625,195 625,185 Z" fill="#c084fc" opacity="0.95"/>

                        {{-- Precision Vocational Alignment Marks (SMK PK Motif) --}}
                        <path d="M 68,340 L 88,340 M 78,330 L 78,350" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
                        <circle cx="78" cy="340" r="14" stroke="#60a5fa" stroke-width="1.2" stroke-dasharray="3 3" fill="none" opacity="0.5"/>

                        <path d="M 592,365 L 612,365 M 602,355 L 602,375" stroke="#c084fc" stroke-width="2" stroke-linecap="round" opacity="0.7"/>
                        <circle cx="602" cy="365" r="14" stroke="#c084fc" stroke-width="1.2" stroke-dasharray="3 3" fill="none" opacity="0.5"/>

                        {{-- Decorative Flowing Energy Arcs --}}
                        <path d="M 120,135 Q 220,80 340,75" stroke="#93c5fd" stroke-width="2" stroke-linecap="round" fill="none" stroke-dasharray="5 8" opacity="0.8"/>
                        <path d="M 440,505 Q 520,470 575,410" stroke="#c4b5fd" stroke-width="2" stroke-linecap="round" fill="none" stroke-dasharray="5 8" opacity="0.75"/>
                    </svg>

                    {{-- Floating Glass Accent Pills (Left and Right Balanced) --}}
                    <div class="bubble-pill-1" title="Digital Ecosystem"></div>
                    <div class="bubble-pill-2" title="Vocational Excellence"></div>

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

    {{-- ═══════════════════════════════════════════
         SEARCH MODAL POPUP
         ═══════════════════════════════════════════ --}}
    <div id="heroSearchModal" class="search-modal-overlay" role="dialog" aria-modal="true" aria-label="Pencarian Tefa-Hub" hidden>
        <div class="search-modal-backdrop" id="searchModalBackdrop"></div>
        <div class="search-modal-panel">
            {{-- Modal Header / Search Input --}}
            <div class="search-modal-header">
                <div class="search-modal-input-wrap">
                    <span class="search-modal-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round">
                            <circle cx="11" cy="11" r="7"/>
                            <line x1="16.5" y1="16.5" x2="22" y2="22"/>
                        </svg>
                    </span>
                    <input
                        type="text"
                        id="searchModalInput"
                        class="search-modal-input"
                        placeholder="Cari info jurusan, PKL, fasilitas, beasiswa..."
                        autocomplete="off"
                        spellcheck="false"
                    >
                    <button type="button" class="search-modal-clear" id="searchModalClear" aria-label="Hapus pencarian" hidden>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </button>
                    <button type="button" class="search-modal-close-btn" id="searchModalClose" aria-label="Tutup pencarian">
                        Tutup
                    </button>
                </div>
            </div>

            {{-- Modal Body --}}
            <div class="search-modal-body">

                {{-- Quick Navigation --}}
                <div class="search-modal-section" id="searchQuickNav">
                    <p class="search-modal-section-title">Navigasi Cepat</p>
                    <div class="search-quick-grid">
                        <a href="{{ route('ppdb') }}" class="search-quick-item">
                            <span class="search-quick-icon" style="background: #eff6ff; color: #2563eb;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </span>
                            <div>
                                <span class="search-quick-label">PPDB Online</span>
                                <span class="search-quick-sub">Pendaftaran Siswa Baru</span>
                            </div>
                        </a>
                        <a href="{{ route('pkl') }}" class="search-quick-item">
                            <span class="search-quick-icon" style="background: #f0fdf4; color: #16a34a;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                            </span>
                            <div>
                                <span class="search-quick-label">PKL & Magang</span>
                                <span class="search-quick-sub">Praktik Kerja Lapangan</span>
                            </div>
                        </a>
                        <a href="{{ route('bkk') }}" class="search-quick-item">
                            <span class="search-quick-icon" style="background: #fdf4ff; color: #9333ea;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M20 7H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                            </span>
                            <div>
                                <span class="search-quick-label">BKK Karir</span>
                                <span class="search-quick-sub">Lowongan & Rekrutmen</span>
                            </div>
                        </a>
                        <a href="{{ route('profil') }}" class="search-quick-item">
                            <span class="search-quick-icon" style="background: #fff7ed; color: #ea580c;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                            </span>
                            <div>
                                <span class="search-quick-label">Profil Sekolah</span>
                                <span class="search-quick-sub">SMK Antartika 1 Sidoarjo</span>
                            </div>
                        </a>
                        <a href="{{ route('ppdb.kuis') }}" class="search-quick-item search-quick-item-wide">
                            <span class="search-quick-icon" style="background: #fef9c3; color: #ca8a04;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            </span>
                            <div>
                                <span class="search-quick-label">✨ AI Temukan Jurusanmu</span>
                                <span class="search-quick-sub">Coba kuis pintar & dapatkan rekomendasi jurusan terbaik</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Search Results (hidden by default) --}}
                <div class="search-modal-results" id="searchModalResults" hidden></div>

                {{-- Popular Keywords --}}
                <div class="search-modal-section" id="searchPopularSection">
                    <p class="search-modal-section-title">Kata Kunci Populer</p>
                    <div class="search-tags-wrap">
                        <button class="search-tag-chip" data-query="RPL Rekayasa Perangkat Lunak">RPL</button>
                        <button class="search-tag-chip" data-query="TKR Teknik Kendaraan Ringan">TKR</button>
                        <button class="search-tag-chip" data-query="TEI Teknik Elektronika">TEI</button>
                        <button class="search-tag-chip" data-query="TITL Instalasi Listrik">TITL</button>
                        <button class="search-tag-chip" data-query="TPM Teknik Pemesinan">TPM</button>
                        <button class="search-tag-chip" data-query="fasilitas bengkel workshop">Fasilitas</button>
                        <button class="search-tag-chip" data-query="beasiswa prestasi">Beasiswa</button>
                        <button class="search-tag-chip" data-query="akreditasi A unggul">Akreditasi</button>
                        <button class="search-tag-chip" data-query="biaya SPP sekolah">Biaya SPP</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Unified Reusable Landing Footer --}}
    <x-landing-footer />

    {{-- Floating Back-to-Top Navigation Button --}}
    <button type="button" class="back-to-top-btn" id="backToTopBtn" aria-label="Kembali ke atas" title="Kembali ke atas">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>

    {{-- Unified Reusable Tanya Tefa AI Widget --}}
    <x-ai-widget subtitle="Pusat Bantuan 24/7" />

    {{-- ═══════════════════════════════════════════
         SCRIPTS: SEARCH & DISCOVERY
         ═══════════════════════════════════════════ --}}
    <script>
    (function() {
        /* ── Search Modal Logic ── */
        function initSearchModal() {
            const trigger      = document.getElementById('heroSearchTrigger');
            const modal        = document.getElementById('heroSearchModal');
            const backdrop     = document.getElementById('searchModalBackdrop');
            const closeBtn     = document.getElementById('searchModalClose');
            const input        = document.getElementById('searchModalInput');
            const clearBtn     = document.getElementById('searchModalClear');
            const quickNav     = document.getElementById('searchQuickNav');
            const popularSec   = document.getElementById('searchPopularSection');
            const resultsBox   = document.getElementById('searchModalResults');
            const tagChips     = document.querySelectorAll('.search-tag-chip');

            if (!trigger || !modal) return;

            /* Quick-link keyword map → scroll target */
            const keywordMap = [
                { keys: ['fasilitas','bengkel','lab','laboratorium','workshop'],      id: 'fasilitas' },
                { keys: ['keunggulan','alasan','akreditasi','bnsp','kenapa'],          id: 'keunggulan' },
                { keys: ['karir','bkk','kerja','loker','lowongan'],                    id: 'layanan' },
                { keys: ['pkl','magang','industri','prakerin','praktik'],               id: 'pkl' },
                { keys: ['akademik','nilai','jadwal','guru','kurikulum','pelajaran'],   id: 'layanan' },
                { keys: ['ppdb','daftar','pendaftaran'],                                id: 'layanan' },
                { keys: ['tentang','profil','sekolah','smk','apa itu','sambutan'],      id: 'sambutan' },
            ];

            function openModal() {
                modal.hidden = false;
                document.body.classList.add('search-modal-open');
                requestAnimationFrame(() => {
                    modal.classList.add('is-open');
                    if (input) setTimeout(() => input.focus(), 80);
                });
            }

            function closeModal() {
                modal.classList.remove('is-open');
                document.body.classList.remove('search-modal-open');
                setTimeout(() => { modal.hidden = true; }, 280);
                if (input) { input.value = ''; onInputChange(); }
            }

            function onInputChange() {
                const q = input ? input.value.trim() : '';
                if (clearBtn) clearBtn.hidden = q.length === 0;

                if (q.length < 2) {
                    if (quickNav)   quickNav.hidden   = false;
                    if (popularSec) popularSec.hidden = false;
                    if (resultsBox) resultsBox.hidden = true;
                    return;
                }
                if (quickNav)   quickNav.hidden   = true;
                if (popularSec) popularSec.hidden = true;

                /* Simple local search results */
                const pages = [
                    { label: 'PPDB — Pendaftaran Siswa Baru', url: '{{ route("ppdb") }}',          desc: 'Daftar online calon peserta didik baru', icon: '👤' },
                    { label: 'PKL — Praktik Kerja Lapangan',  url: '{{ route("pkl") }}',           desc: 'Program magang industri terstruktur',    icon: '🏭' },
                    { label: 'BKK — Bursa Kerja Khusus',      url: '{{ route("bkk") }}',           desc: 'Lowongan kerja & rekrutmen industri',    icon: '💼' },
                    { label: 'Profil Sekolah',                  url: '{{ route("profil") }}',        desc: 'SMK Antartika 1 Sidoarjo — Akreditasi A', icon: '🏫' },
                    { label: 'AI Temukan Jurusan',              url: '{{ route("ppdb.kuis") }}',     desc: 'Kuis pintar rekomendasi jurusan',         icon: '✨' },
                    { label: 'Fasilitas & Workshop',            url: '#fasilitas',                   desc: 'Bengkel & laboratorium industri modern',  icon: '🔧' },
                    { label: 'RPL — Rekayasa Perangkat Lunak',  url: '{{ route("ppdb") }}#rpl',     desc: 'Software Engineering & TEFA',             icon: '💻' },
                    { label: 'TKR — Teknik Kendaraan Ringan',   url: '{{ route("ppdb") }}#tkr',     desc: 'Otomotif & bengkel kelas industri',       icon: '🚗' },
                    { label: 'TEI — Teknik Elektronika Industri',url: '{{ route("ppdb") }}#tei',    desc: 'Instrumentasi & kontrol pabrik',          icon: '⚡' },
                    { label: 'TITL — Teknik Instalasi Listrik',  url: '{{ route("ppdb") }}#titl',   desc: 'Instalasi tenaga listrik gedung',         icon: '🔌' },
                    { label: 'TPM — Teknik Pemesinan',          url: '{{ route("ppdb") }}#tpm',     desc: 'Manufaktur presisi & CNC',                icon: '⚙️' },
                ];

                const qLow = q.toLowerCase();
                const hits = pages.filter(p =>
                    p.label.toLowerCase().includes(qLow) ||
                    p.desc.toLowerCase().includes(qLow)
                );

                if (resultsBox) {
                    if (hits.length === 0) {
                        resultsBox.innerHTML = `<div class="search-no-results"><span>🔍</span><p>Tidak ada hasil untuk <strong>"${q}"</strong></p><small>Coba kata kunci lain atau gunakan AI Tanya Tefa</small></div>`;
                    } else {
                        resultsBox.innerHTML = `<p class="search-modal-section-title">Hasil Pencarian</p>` +
                            hits.map(h => `<a href="${h.url}" class="search-result-item"><span class="search-result-icon">${h.icon}</span><div><span class="search-result-label">${h.label}</span><span class="search-result-sub">${h.desc}</span></div><svg class="search-result-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg></a>`).join('');
                    }
                    resultsBox.hidden = false;
                }
            }

            function handleSubmit() {
                const q = input ? input.value.trim() : '';
                if (!q) return;
                const qLow = q.toLowerCase();
                for (const entry of keywordMap) {
                    if (entry.keys.some(k => qLow.includes(k))) {
                        closeModal();
                        const el = document.getElementById(entry.id);
                        if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        return;
                    }
                }
                if (window.sendNavChip) window.sendNavChip(q);
                closeModal();
            }

            trigger.addEventListener('click', openModal);
            if (backdrop) backdrop.addEventListener('click', closeModal);
            if (closeBtn) closeBtn.addEventListener('click', closeModal);
            if (clearBtn) clearBtn.addEventListener('click', () => { if (input) { input.value = ''; input.focus(); onInputChange(); } });

            if (input) {
                input.addEventListener('input', onInputChange);
                input.addEventListener('keydown', e => {
                    if (e.key === 'Enter') { e.preventDefault(); handleSubmit(); }
                    if (e.key === 'Escape') closeModal();
                });
            }

            tagChips.forEach(chip => {
                chip.addEventListener('click', () => {
                    if (input) {
                        input.value = chip.dataset.query || chip.textContent;
                        onInputChange();
                        input.focus();
                    }
                });
            });

            document.addEventListener('keydown', e => {
                if ((e.metaKey || e.ctrlKey) && e.key === 'k') { e.preventDefault(); modal.hidden ? openModal() : closeModal(); }
                if (e.key === 'Escape' && !modal.hidden) closeModal();
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initSearchModal);
        } else {
            initSearchModal();
        }

        window.addEventListener('pageshow', function() {
            document.body.style.overflow = '';
            document.body.classList.remove('search-modal-open');
        });
    })();
    </script>
</body>
</html>
