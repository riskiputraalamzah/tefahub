<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Pusat Karier & Penyaluran Industri (BKK Tefa-Hub) — Akses lowongan terverifikasi dari mitra DUDI nasional, pantau proses seleksi kerja & PKL, serta bangun CV Digital dan portofolio kompetensi berstandar SKKNI.">
    <title>Pusat Karier &amp; Penyaluran Industri (BKK) — Tefa-Hub</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Caveat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ file_exists(public_path('assets/css/landing.css')) ? filemtime(public_path('assets/css/landing.css')) : '1.0' }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bkk.landing.css') }}?v={{ file_exists(public_path('assets/css/bkk.landing.css')) ? filemtime(public_path('assets/css/bkk.landing.css')) : '1.0' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Accessibility: Skip to Main Content --}}
    <a href="#mainContent" class="skip-to-content">Lewati ke Konten Utama</a>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'bkk'" />

    {{-- Accessible Breadcrumb Navigation --}}
    <x-breadcrumbs :items="[
        ['label' => 'Layanan', 'url' => url('/#layanan')],
        ['label' => 'Bursa Kerja Khusus (BKK)', 'url' => '']
    ]" />

    {{-- ═══════════════════════════════════════════
         BKK HERO SECTION WITH GRADIENT GLOWS & BACKGROUND IMAGE
         ═══════════════════════════════════════════ --}}
    <section class="bkk-hero-section" id="mainContent">
        {{-- Background image.png Artwork (Subtle & Elegant) --}}
        <div class="bkk-hero-bg-artwork" aria-hidden="true">
            <img src="{{ asset('assets/image.png') }}" alt="" class="bkk-hero-bg-img">
        </div>

        {{-- Background Eclipse Glow Accents --}}
        <div class="bkk-bg-eclipse bkk-eclipse-1" aria-hidden="true"></div>
        <div class="bkk-bg-eclipse bkk-eclipse-2" aria-hidden="true"></div>
        <div class="bkk-bg-eclipse bkk-eclipse-3" aria-hidden="true"></div>

        <div class="wrap">
            <div class="bkk-hero-grid">

                {{-- Left Content Column --}}
                <div class="bkk-hero-content">
                    
                    {{-- 1. Bubble Badge: Kolaborasi Sekolah - Industri --}}
                    <div class="bkk-bubble-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                        <span>Kolaborasi Sekolah – Industri</span>
                    </div>

                    {{-- 2. Hero Title --}}
                    <h1 class="bkk-hero-title">
                        Pusat Karier &amp; Penyaluran<br>
                        Industri <span class="bkk-title-blue">(BKK Tefa–Hub)</span>
                    </h1>

                    {{-- 3. Description --}}
                    <p class="bkk-hero-desc">
                        Jembatan terpercaya antara talenta vokasi kompeten dengan ekosistem industri nasional. Pantau tahapan lamaran secara transparan, ikuti jadwal seleksi mitra resmi, dan kelola CV Digital berbasis portofolio kompetensi terverifikasi.
                    </p>

                    {{-- 4. Two Buttons --}}
                    <div class="bkk-btn-group">
                        {{-- Button 1: Biru Penuh (Pantau Progres Lamaran) --}}
                        <a href="{{ route('siswa.bkk') }}" class="bkk-btn bkk-btn-pantau">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <span>Pantau Progres Lamaran</span>
                        </a>

                        {{-- Button 2: Biru Muda (Eksplorasi Lowongan Baru) --}}
                        <a href="#katalog-layanan" class="bkk-btn bkk-btn-lowongan">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                            </svg>
                            <span>Eksplorasi Lowongan Baru</span>
                        </a>
                    </div>

                </div>

                {{-- Right Column: Compact Hero Showcase Card using image copy 3.webp --}}
                <div class="bkk-hero-visual">
                    <div class="bkk-showcase-container">
                        <div class="bkk-showcase-card">
                            <div class="bkk-showcase-media">
                                {{-- Main Hero Card Image using image copy 3.webp --}}
                                <img src="{{ asset('assets/image copy 3.webp') }}" alt="Pusat Karier dan Layanan Vokasi Tefa-Hub" class="bkk-showcase-img" decoding="async" fetchpriority="high">
                                
                                {{-- Rating & Caption Top Left --}}
                                <div class="bkk-showcase-rating-wrap">
                                    <span class="bkk-showcase-rating-pill">
                                        <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        4.9
                                    </span>
                                    <span class="bkk-showcase-rating-caption">Motor Sehat<br>Perjalanan Lancar</span>
                                </div>

                                {{-- Price Badge Top Right --}}
                                <span class="bkk-showcase-price-badge">Mulai 50rb</span>

                                {{-- Floating White Card Inside Image --}}
                                <div class="bkk-showcase-float-card">
                                    <div class="bkk-showcase-float-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                        </svg>
                                    </div>
                                    <div class="bkk-showcase-float-body">
                                        <span class="bkk-showcase-float-tag">JASA LAYANAN</span>
                                        <h3 class="bkk-showcase-float-title">Servis Berkala &amp; Ganti Oli Mesin</h3>
                                    </div>
                                    <a href="#katalog-layanan" class="bkk-showcase-float-btn">
                                        <span>Lihat Selengkapnya</span>
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Script Font Accent: Karier Dimulai dari Sini! --}}
                        <div class="bkk-hero-quote-accent" aria-hidden="true">
                            <span class="bkk-hero-quote-text">Karier<br>Dimulai dari<br>Sini!</span>
                            <svg class="bkk-hero-quote-curve" viewBox="0 0 100 24" fill="none">
                                <path d="M 5,18 Q 50,4 95,14" stroke="#2563EB" stroke-width="3.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         KATALOG 16 CARD LAYANAN & PRODUK VOKASI
         (BACKGROUND PUTIH MURNI SESUAI PERMINTAAN USER)
         ═══════════════════════════════════════════ --}}
    @php
        $bkkServices = [
            [
                'rating' => '4.9',
                'price' => 'Mulai 50rb',
                'icon' => 'wrench',
                'title' => 'Servis Berkala & Ganti Oli Mesin',
                'desc' => 'Perawatan rutin untuk menjaga performa kendaraan Anda tetap optimal.',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 65rb',
                'icon' => 'disc',
                'title' => 'Ganti Ban Motor',
                'desc' => 'Tersedia berbagai merk ban berkualitas dengan pemasangan profesional.',
            ],
            [
                'rating' => '4.7',
                'price' => 'Mulai 45rb',
                'icon' => 'gear',
                'title' => 'Tune Up Mesin',
                'desc' => 'Menjaga performa mesin tetap stabil dan lebih bertenaga.',
            ],
            [
                'rating' => '4.6',
                'price' => 'Mulai 35rb',
                'icon' => 'calendar',
                'title' => 'Penggantian Aki',
                'desc' => 'Aki original dengan garansi dan pemasangan cepat.',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 70rb',
                'icon' => 'shield',
                'title' => 'Ganti Kampas Rem & Setel Rantai',
                'desc' => 'Pemeriksaan sistem pengereman menyeluruh untuk keselamatan berkendara.',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 55rb',
                'icon' => 'zap',
                'title' => 'Pembersihan Throttle Body & CVT',
                'desc' => 'Mengembalikan akselerasi motor matic agar tarikan lebih enteng dan responsif.',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 75rb',
                'icon' => 'cpu',
                'title' => 'Uji Emisi & Diagnosa Scanner Motor',
                'desc' => 'Deteksi kerusakan sensor injeksi motor dengan perangkat scanner modern.',
            ],
            [
                'rating' => '4.7',
                'price' => 'Mulai 40rb',
                'icon' => 'filter',
                'title' => 'Servis Karburator & Filter Udara',
                'desc' => 'Pembersihan jalur bahan bakar dan penggantian filter udara presisi.',
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 95rb',
                'icon' => 'tool',
                'title' => 'Overhaul Mesin & Penggantian Piston',
                'desc' => 'Perbaikan total mesin kendaraan oleh teknisi ahli berstandar industri.',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 30rb',
                'icon' => 'circle',
                'title' => 'Tambal Ban Tubeless & Cek Tekanan',
                'desc' => 'Penanganan ban bocor cepat dengan material penambal berkualitas tinggi.',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 60rb',
                'icon' => 'compass',
                'title' => 'Ganti Shockbreaker & Komstir Depan',
                'desc' => 'Setel stang kemudi dan peredam kejut agar berkendara lebih stabil dan nyaman.',
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 65rb',
                'icon' => 'sun',
                'title' => 'Restorasi Lampu LED & Wiring Motor',
                'desc' => 'Perapihan jalur kelistrikan body dan instalasi lampu motor lebih terang.',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 85rb',
                'icon' => 'rotate',
                'title' => 'Ganti Vanbelt & Roller Matic Presisi',
                'desc' => 'Penggantian komponen penggerak CVT original untuk mencegah putus di jalan.',
            ],
            [
                'rating' => '4.9',
                'price' => 'Mulai 55rb',
                'icon' => 'droplet',
                'title' => 'Kuras Radiator & Coolant Treatment',
                'desc' => 'Penggantian air radiator pendingin mesin untuk mencegah overheat saat macet.',
            ],
            [
                'rating' => '4.8',
                'price' => 'Mulai 45rb',
                'icon' => 'sliders',
                'title' => 'Penyetelan Klep & Karburasi Presisi',
                'desc' => 'Kalibrasi kerapatan celah klep mesin agar pembakaran optimal dan hemat bensin.',
            ],
            [
                'rating' => '5.0',
                'price' => 'Mulai 120rb',
                'icon' => 'star',
                'title' => 'Paket Komplit Servis Motor Vokasi',
                'desc' => 'Pemeriksaan total 24 titik kendaraan motor dengan garansi servis resmi bengkel.',
            ],
        ];
    @endphp

    <section class="bkk-catalog-section" id="katalog-layanan">
        <div class="wrap">
            
            {{-- Header Bar Layanan Kami --}}
            <div class="bkk-section-header">
                {{-- Left Title & Description --}}
                <div class="bkk-header-title-wrap">
                    <div class="bkk-header-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <div>
                        <h2 class="bkk-section-title">Layanan Kami</h2>
                        <p class="bkk-section-desc">Berbagai layanan unggulan untuk mendukung karier dan kompetensi Anda.</p>
                    </div>
                </div>

                {{-- Right 3 Benefits Strip --}}
                <div class="bkk-benefits-strip">
                    <div class="bkk-benefit-item">
                        <div class="bkk-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                        </div>
                        <div class="bkk-benefit-text">
                            <span class="bkk-benefit-title">Mudah Diakses</span>
                            <span class="bkk-benefit-sub">Proses cepat &amp; transparan</span>
                        </div>
                    </div>

                    <div class="bkk-benefit-item">
                        <div class="bkk-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <polyline points="9 12 11 14 15 10"></polyline>
                            </svg>
                        </div>
                        <div class="bkk-benefit-text">
                            <span class="bkk-benefit-title">Terpercaya</span>
                            <span class="bkk-benefit-sub">Bermitra dengan industri resmi</span>
                        </div>
                    </div>

                    <div class="bkk-benefit-item">
                        <div class="bkk-benefit-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div class="bkk-benefit-text">
                            <span class="bkk-benefit-title">Didukung Sekolah</span>
                            <span class="bkk-benefit-sub">Berbasis kompetensi vokasi</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 16 Cards Catalog Grid (4x4) --}}
            <div class="bkk-cards-catalog-grid" id="bkkCatalogGrid">
                @foreach ($bkkServices as $index => $item)
                    <div class="bkk-service-card bkk-card-reveal" data-delay="{{ ($index % 4) * 60 }}">
                        
                        {{-- Card Image Area (Enlarged and uses image copy 3.webp) --}}
                        <div class="bkk-card-img-wrap">
                            <img src="{{ asset('assets/image copy 3.webp') }}" alt="{{ $item['title'] }}" class="bkk-card-img" onerror="this.onerror=null; this.src='{{ asset('assets/Background (14).webp') }}';" loading="lazy">
                            
                            {{-- Rating Badge Top Left --}}
                            <span class="bkk-card-rating">
                                <svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                {{ $item['rating'] }}
                            </span>

                            {{-- Price Badge Top Right --}}
                            <span class="bkk-card-price">{{ $item['price'] }}</span>
                        </div>

                        {{-- Floating Circle Icon Overlapping Image & Body --}}
                        <div class="bkk-card-icon-badge">
                            <div class="bkk-card-icon-inner">
                                @if ($item['icon'] === 'wrench' || $item['icon'] === 'tool')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                    </svg>
                                @elseif ($item['icon'] === 'disc' || $item['icon'] === 'circle' || $item['icon'] === 'rotate')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                @elseif ($item['icon'] === 'gear' || $item['icon'] === 'sliders')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                                @elseif ($item['icon'] === 'calendar' || $item['icon'] === 'sun')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                @elseif ($item['icon'] === 'shield')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                @elseif ($item['icon'] === 'zap')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                    </svg>
                                @elseif ($item['icon'] === 'cpu')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
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
                                @elseif ($item['icon'] === 'droplet')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                                    </svg>
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                @endif
                            </div>
                        </div>

                        {{-- Card Body Text --}}
                        <div class="bkk-card-body">
                            <h3 class="bkk-card-title">{{ $item['title'] }}</h3>
                            <p class="bkk-card-desc">{{ $item['desc'] }}</p>
                        </div>

                        {{-- Card Footer Action --}}
                        <div class="bkk-card-footer">
                            <span class="bkk-card-link">Lihat Detail</span>
                            <span class="bkk-card-arrow">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Unified Reusable Landing Footer --}}
    <x-landing-footer />

    {{-- Unified Reusable Tanya Tefa AI Widget --}}
    <x-ai-widget 
        subtitle="Pusat Karir BKK"
        greetingKicker="Pusat Karir BKK"
        greetingTitle="Halo, ada yang bisa dibantu seputar Karir?"
        greetingSub="Tanyakan tips lolos seleksi, lowongan mitra industri, hingga pengurusan CV digital."
    />

    {{-- ═══════════════════════════════════════════
         SCRIPTS: SCROLL ANIMATIONS & ACCELERATION
         ═══════════════════════════════════════════ --}}
    <script>
    (function() {
        function initBkkCardReveal() {
            const cardEls = document.querySelectorAll('.bkk-card-reveal');
            if (!cardEls.length) return;

            if ('IntersectionObserver' in window) {
                const cardObserver = new IntersectionObserver(function(entries, obs) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const el = entry.target;
                            const delay = parseInt(el.dataset.delay || 0, 10);
                            setTimeout(function() {
                                el.classList.add('bkk-card-revealed');
                            }, delay);
                            obs.unobserve(el);
                        }
                    });
                }, { threshold: 0.05, rootMargin: '0px 0px -20px 0px' });

                cardEls.forEach(function(el) {
                    if (!el.classList.contains('bkk-card-revealed')) {
                        cardObserver.observe(el);
                    }
                });
            } else {
                cardEls.forEach(function(el) { el.classList.add('bkk-card-revealed'); });
            }
        }

        document.addEventListener('DOMContentLoaded', initBkkCardReveal);
        window.addEventListener('pageshow', function(e) {
            document.body.style.overflow = '';
            initBkkCardReveal();
        });

        // Fail-safe: ensure cards never stay hidden
        setTimeout(function() {
            document.querySelectorAll('.bkk-card-reveal:not(.bkk-card-revealed)').forEach(function(el) {
                el.classList.add('bkk-card-revealed');
            });
        }, 500);
    })();
    </script>
</body>
</html>
