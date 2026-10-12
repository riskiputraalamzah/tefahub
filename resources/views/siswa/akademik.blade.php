<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <title>Akademik Siswa — TEFA-Hub</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Siswa Dashboard & Shared CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/siswa.dashboard.css') }}?v={{ config('app.asset_version', '1.0') }}">
</head>
<body>

    <div class="app-layout">
        
        <!-- ═══════════════════════════════════════════
             SIDEBAR NAVIGASI SISWA
             ═══════════════════════════════════════════ -->
        <x-sidebar-siswa :active="'akademik'" :user="$user ?? []" />

        <!-- ═══════════════════════════════════════════
             MAIN CONTENT AREA
             ═══════════════════════════════════════════ -->
        <main class="main-content">
            
            <!-- ═══════════════════════════════════════════
                 HEADER UTAMA ROLE SISWA (FULL TOP NO GAP)
                 ═══════════════════════════════════════════ -->
            <x-header-siswa :user="$user ?? []" />

            <!-- Page Body Area -->
            <div class="content-body">
                
                <!-- ═══════════════════════════════════════════
                     HERO PROFILE BANNER SISWA (928x256)
                     ═══════════════════════════════════════════ -->
                <x-profile-banner-siswa :user="$user ?? []" />

                <!-- ═══════════════════════════════════════════
                     4 CARDS GRID AKADEMIK
                     ═══════════════════════════════════════════ -->
                <div class="akademik-cards-grid">

                    <!-- ── CARD 1: AKADEMIK KEJURUAN (KIRI ATAS) ── -->
                    <div class="akademik-card">
                        <!-- Top Header -->
                        <div>
                            <div class="akademik-card-top">
                                <div class="akademik-icon-box bg-dbe1ff">
                                    <img src="{{ asset('assets/Container (9).webp') }}" alt="Akademik Icon" class="akademik-icon-img" onerror="this.onerror=null; this.src='{{ asset('assets/Container.webp') }}';">
                                </div>
                                <span class="akademik-badge badge-blue-pill">AKADEMIK</span>
                            </div>

                            <div class="akademik-title-group">
                                <h2 class="akademik-card-title">Akademik Kejuruan</h2>
                                <p class="akademik-card-subtitle">Kurikulum Berbasis Proyek<br>Industri</p>
                            </div>
                        </div>

                        <!-- Card Body Elements -->
                        <div class="akademik-card-body">
                            <!-- Stats Box (Nilai & Kehadiran) -->
                            <div class="akademik-stats-box">
                                <div class="akademik-stat-col">
                                    <span class="stat-big-number" id="akademikRataNilai">0.0</span>
                                    <span class="stat-label-text">Rata-rata<br>Nilai</span>
                                </div>
                                <div class="akademik-stat-col">
                                    <span class="stat-big-number color-green" id="akademikKehadiran">0%</span>
                                    <span class="stat-label-text">Kehadiran<br>(Presensi)</span>
                                </div>
                            </div>

                            <!-- Row 1: Tugas -->
                            <div class="akademik-item-pill">
                                <span class="akademik-item-text">2 Tugas Menu</span>
                                <span class="text-danger-time">Besok 23:59</span>
                            </div>

                            <!-- Row 2: Modul Prakerin -->
                            <div class="akademik-item-pill">
                                <div class="akademik-item-left">
                                    <img src="{{ asset('assets/Container (11).webp') }}" alt="Modul" class="akademik-item-icon" onerror="this.onerror=null; this.src='{{ asset('assets/Container copy.webp') }}';">
                                    <span class="akademik-item-text">3 Modul Prakerin Baru</span>
                                </div>
                                <span class="text-muted-status">Siap Unduh</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <a href="#" class="akademik-action-btn btn-blue-academic">
                            <span>Buka Ruang Belajar</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                    <!-- ── CARD 2: TEACHING FACTORY (KANAN ATAS) ── -->
                    <div class="akademik-card">
                        <!-- Top Header -->
                        <div>
                            <div class="akademik-card-top">
                                <div class="akademik-icon-box bg-eaddff">
                                    <img src="{{ asset('assets/mar.webp') }}" alt="TEFA Icon" class="akademik-icon-img" onerror="this.onerror=null; this.src='{{ asset('assets/Container (9).webp') }}';">
                                </div>
                                <span class="akademik-badge badge-purple-pill">BLUD TEFA</span>
                            </div>

                            <div class="akademik-title-group">
                                <h2 class="akademik-card-title">Teaching Factory</h2>
                                <p class="akademik-card-subtitle">Katalog Produk & Jasa Siswa</p>
                            </div>
                        </div>

                        <!-- Card Body Elements -->
                        <div class="akademik-card-body">
                            <!-- Product 1: POS Kasir BLUD -->
                            <div class="akademik-product-card product-card-pos">
                                <div class="product-info-left">
                                    <h3 class="product-title">Aplikasi POS Kasir BLUD</h3>
                                    <p class="product-sub">Software</p>
                                    <p class="product-sub product-price">• Rp1.500.000</p>
                                </div>
                                <span class="badge-validasi">Tervalidasi</span>
                            </div>

                            <!-- Product 2: IoT Sensor Suhu Greenhouse -->
                            <div class="akademik-product-card product-card-iot">
                                <div class="product-info-left">
                                    <h3 class="product-title">IoT Sensor Suhu Greenhouse</h3>
                                    <p class="product-sub">Hardware Mekatronika</p>
                                </div>
                                <span class="badge-review">Review Guru</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <button type="button" class="akademik-action-btn btn-purple-academic">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            <span>+ Ajukan Produk Baru</span>
                        </button>
                    </div>

                    <!-- ── CARD 3: PROFIL & PORTOFOLIO (KIRI BAWAH) ── -->
                    <div class="akademik-card">
                        <!-- Top Header -->
                        <div>
                            <div class="akademik-card-top">
                                <div class="akademik-icon-box bg-ffedd5">
                                    <img src="{{ asset('assets/Container.webp') }}" alt="Portofolio Icon" class="akademik-icon-img">
                                </div>
                                <span class="akademik-badge badge-orange-pill">0% LENGKAP</span>
                            </div>

                            <div class="akademik-title-group">
                                <h2 class="akademik-card-title">Profil & Portofolio</h2>
                                <p class="akademik-card-subtitle">Sertifikasi BNSP & Identitas<br>Digital</p>
                            </div>
                        </div>

                        <!-- Card Body Elements -->
                        <div class="akademik-card-body">
                            <!-- Dapodik Card -->
                            <div class="akademik-dapodik-card">
                                <div class="dapodik-top-row">
                                    <div class="dapodik-left-title">
                                        <svg class="check-green-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <span>Dapodik & NISN Valid</span>
                                    </div>
                                    <span class="dapodik-sync-text">Sinkron</span>
                                </div>
                                <p class="dapodik-desc">
                                    Tersambung langsung ke pangkalan data BKK mitra industri otomotif dan software house.
                                </p>
                            </div>

                            <!-- 2 Karya & Sertifikasi Boxes -->
                            <div class="akademik-karya-row">
                                <div class="akademik-karya-box">
                                    <span class="karya-big-num">0 Karya</span>
                                    <span class="karya-label">Proyek TEFA</span>
                                </div>
                                <div class="akademik-karya-box">
                                    <span class="karya-big-num">0 Sertif.</span>
                                    <span class="karya-label">Kompetensi</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <a href="#" class="akademik-action-btn btn-light-blue-academic">
                            <img src="{{ asset('assets/Container copy.webp') }}" alt="Kelola" class="akademik-btn-icon" onerror="this.onerror=null; this.src='{{ asset('assets/Container.webp') }}';">
                            <span>Kelola Data & Portofolio</span>
                        </a>
                    </div>

                    <!-- ── CARD 4: BKK CAREER HUB (KANAN BAWAH) ── -->
                    <div class="akademik-card">
                        <!-- Top Header -->
                        <div>
                            <div class="akademik-card-top">
                                <div class="akademik-icon-box bg-85f8c4">
                                    <img src="{{ asset('assets/Container (12).webp') }}" alt="BKK Career Icon" class="akademik-icon-img" onerror="this.onerror=null; this.src='{{ asset('assets/Container (9).webp') }}';">
                                </div>
                                <span class="akademik-badge badge-teal-pill">BKK KARIR</span>
                            </div>

                            <div class="akademik-title-group">
                                <h2 class="akademik-card-title">BKK Career Hub</h2>
                                <p class="akademik-card-subtitle">Penyaluran Kerja & Magang Industri</p>
                            </div>
                        </div>

                        <!-- Card Body Elements -->
                        <div class="akademik-card-body">
                            <!-- Lowongan Mitra Card -->
                            <div class="akademik-lowongan-card">
                                <div class="lowongan-top-row">
                                    <span class="lowongan-dot"></span>
                                    <span class="lowongan-title">0 Lowongan Mitra Aktif</span>
                                </div>
                                <p class="lowongan-desc">
                                    Mitra industri membuka jalur khusus lulusan SMK Tefa.
                                </p>
                            </div>

                            <!-- Interview Schedule Card -->
                            <div class="akademik-interview-card">
                                <img src="{{ asset('assets/Container (13).webp') }}" alt="Kalender Interview" class="interview-icon" onerror="this.onerror=null; this.src='{{ asset('assets/calen.webp') }}';">
                                <div class="interview-info">
                                    <h3 class="interview-title">Belum Ada Jadwal</h3>
                                    <p class="interview-sub">Menunggu Undangan DUDI</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <a href="{{ route('siswa.bkk') }}" class="akademik-action-btn btn-green-academic">
                            <span>Eksplorasi Lowongan</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                </div>

                <!-- ═══════════════════════════════════════════
                     TUGAS & CAPAIAN STANDAR INDUSTRI (3 CARDS)
                     ═══════════════════════════════════════════ -->
                <section class="tugas-section-wrapper">
                    <!-- Header Row (Title & Filter Buttons) -->
                    <div class="tugas-header-row">
                        <div class="tugas-header-left">
                            <h2 class="tugas-section-title">Tugas</h2>
                            <p class="tugas-section-subtitle">Pantau capaian standar industri per modul kompetensi</p>
                        </div>
                        <div class="tugas-filter-buttons">
                            <button type="button" class="btn-tugas-filter btn-minggu-ini active" id="btnMingguIni">
                                Minggu Ini
                            </button>
                            <button type="button" class="btn-tugas-filter btn-semua-modul" id="btnSemuaModul">
                                Semua Modul
                            </button>
                        </div>
                    </div>

                    <!-- 3 Cards Container (250x221 each) -->
                    <div class="tugas-cards-grid">
                        
                        <!-- ── CARD 1: UI/UX KASIR DIGITAL BLUD (BLUE GRADIENT) ── -->
                        <div class="tugas-card card-blue-gradient">
                            <div class="tugas-card-top">
                                <img src="{{ asset('assets/comp.webp') }}" alt="UI/UX Icon" class="tugas-icon-img" onerror="this.onerror=null; this.src='{{ asset('assets/Container (9).webp') }}';">
                                <span class="tugas-badge badge-blue-white">Modul 4</span>
                            </div>
                            
                            <div class="tugas-card-content">
                                <h3 class="tugas-card-title text-white">UI/UX Kasir<br>Digital BLUD</h3>
                                <p class="tugas-card-subtitle text-white-muted">Belum ada tugas dimulai</p>
                            </div>

                            <div class="tugas-progress-block">
                                <div class="tugas-progress-track track-blue">
                                    <div class="tugas-progress-fill fill-white" style="width: 0%;"></div>
                                </div>
                                <div class="tugas-progress-footer">
                                    <span class="tugas-progress-label text-white">Kelayakan UI</span>
                                    <div class="tugas-percentage-wrapper">
                                        <span class="tugas-eclipse-glow glow-white"></span>
                                        <span class="tugas-percentage-text text-white">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ── CARD 2: MESIN CNC OTOMATISASI (AMBER GRADIENT) ── -->
                        <div class="tugas-card card-amber-gradient">
                            <div class="tugas-card-top">
                                <img src="{{ asset('assets/Overlay copy.webp') }}" alt="CNC Icon" class="tugas-icon-img" onerror="this.onerror=null; this.src='{{ asset('assets/Overlay.webp') }}';">
                                <span class="tugas-badge badge-amber-chip">Praktik TEFA</span>
                            </div>
                            
                            <div class="tugas-card-content">
                                <h3 class="tugas-card-title text-amber-dark">Mesin CNC<br>Otomatisasi</h3>
                                <p class="tugas-card-subtitle text-amber-muted">Belum ada tugas dimulai</p>
                            </div>

                            <div class="tugas-progress-block">
                                <div class="tugas-progress-track track-amber">
                                    <div class="tugas-progress-fill fill-amber" style="width: 0%;"></div>
                                </div>
                                <div class="tugas-progress-footer">
                                    <span class="tugas-progress-label text-amber-dark">Fabrikasi Part</span>
                                    <div class="tugas-percentage-wrapper">
                                        <span class="tugas-eclipse-glow glow-amber"></span>
                                        <span class="tugas-percentage-text text-amber-dark">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ── CARD 3: SMART IRIGASI SAWAH SMK (PURPLE GRADIENT) ── -->
                        <div class="tugas-card card-purple-gradient">
                            <div class="tugas-card-top">
                                <img src="{{ asset('assets/Overlay copy 2.webp') }}" alt="IoT Icon" class="tugas-icon-img" onerror="this.onerror=null; this.src='{{ asset('assets/Overlay (1).webp') }}';">
                                <span class="tugas-badge badge-purple-chip">IoT Lab</span>
                            </div>
                            
                            <div class="tugas-card-content">
                                <h3 class="tugas-card-title text-purple-dark">Smart Irigasi<br>Sawah SMK</h3>
                                <p class="tugas-card-subtitle text-purple-muted">Belum ada tugas dimulai</p>
                            </div>

                            <div class="tugas-progress-block">
                                <div class="tugas-progress-track track-purple">
                                    <div class="tugas-progress-fill fill-purple" style="width: 0%;"></div>
                                </div>
                                <div class="tugas-progress-footer">
                                    <span class="tugas-progress-label text-purple-sub">Riset Selesai</span>
                                    <div class="tugas-percentage-wrapper">
                                        <span class="tugas-eclipse-glow glow-purple"></span>
                                        <span class="tugas-percentage-text text-purple-accent">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- ═══════════════════════════════════════════
                     GRAFIK AKTIVITAS JAM PRAKTIK (928x315)
                     ═══════════════════════════════════════════ -->
                <div class="akademik-chart-bottom-wrapper" id="akademikChartAktivitas">
                    <!-- Header -->
                    <div class="akademik-chart-header">
                        <div class="chart-header-text">
                            <h3 class="akademik-chart-title">Aktivitas Jam Praktik</h3>
                            <p class="akademik-chart-subtitle">Rasio Jam Lab vs Teori (Jan - Jun)</p>
                        </div>
                        <span class="chart-badge-filter">Bulanan</span>
                    </div>

                    <!-- Bar Chart Viewport (0 Jam) -->
                    <div class="akademik-bar-viewport">
                        <div class="akademik-bar-container" id="akademikBarContainer">
                            <!-- Jan -->
                            <div class="akademik-bar-item" data-month="Jan" data-hours="0 Jam" tabindex="0" role="button" aria-label="Januari 0 Jam">
                                <div class="akademik-bar-tooltip">0 Jam</div>
                                <div class="akademik-bar-pillar" style="height: 6px;"></div>
                                <span class="akademik-bar-month-label">Jan</span>
                            </div>

                            <!-- Feb -->
                            <div class="akademik-bar-item" data-month="Feb" data-hours="0 Jam" tabindex="0" role="button" aria-label="Februari 0 Jam">
                                <div class="akademik-bar-tooltip">0 Jam</div>
                                <div class="akademik-bar-pillar" style="height: 6px;"></div>
                                <span class="akademik-bar-month-label">Feb</span>
                            </div>

                            <!-- Mar -->
                            <div class="akademik-bar-item" data-month="Mar" data-hours="0 Jam" tabindex="0" role="button" aria-label="Maret 0 Jam">
                                <div class="akademik-bar-tooltip">0 Jam</div>
                                <div class="akademik-bar-pillar" style="height: 6px;"></div>
                                <span class="akademik-bar-month-label">Mar</span>
                            </div>

                            <!-- Apr -->
                            <div class="akademik-bar-item active" data-month="Apr" data-hours="0 Jam" tabindex="0" role="button" aria-label="April 0 Jam">
                                <div class="akademik-bar-tooltip">0 Jam</div>
                                <div class="akademik-bar-pillar" style="height: 6px;"></div>
                                <span class="akademik-bar-month-label">Apr</span>
                            </div>

                            <!-- Mei -->
                            <div class="akademik-bar-item" data-month="Mei" data-hours="0 Jam" tabindex="0" role="button" aria-label="Mei 0 Jam">
                                <div class="akademik-bar-tooltip">0 Jam</div>
                                <div class="akademik-bar-pillar" style="height: 6px;"></div>
                                <span class="akademik-bar-month-label">Mei</span>
                            </div>

                            <!-- Jun -->
                            <div class="akademik-bar-item" data-month="Jun" data-hours="0 Jam" tabindex="0" role="button" aria-label="Juni 0 Jam">
                                <div class="akademik-bar-tooltip">0 Jam</div>
                                <div class="akademik-bar-pillar" style="height: 6px;"></div>
                                <span class="akademik-bar-month-label">Jun</span>
                            </div>
                        </div>
                    </div>

                    <!-- Legend Footer -->
                    <div class="akademik-chart-legend">
                        <div class="akademik-legend-item">
                            <span class="akademik-legend-dot dot-tefa-blue"></span>
                            <span class="akademik-legend-text">Praktik Lab TEFA (0 Jam)</span>
                        </div>
                        <div class="akademik-legend-item">
                            <span class="akademik-legend-dot dot-teori-light"></span>
                            <span class="akademik-legend-text muted">Teori Kejuruan (0 Jam)</span>
                        </div>
                    </div>
                </div>

            </div>

        </main>

        <!-- Sidebar Overlay Backdrop for Responsive Mobile/Tablet -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    </div>

    <!-- Page-Specific Interactive Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Tugas filter buttons toggle
            const btnMingguIni = document.getElementById('btnMingguIni');
            const btnSemuaModul = document.getElementById('btnSemuaModul');

            if (btnMingguIni && btnSemuaModul) {
                btnMingguIni.addEventListener('click', function() {
                    btnMingguIni.classList.add('active');
                    btnSemuaModul.classList.remove('active');
                });

                btnSemuaModul.addEventListener('click', function() {
                    btnSemuaModul.classList.add('active');
                    btnMingguIni.classList.remove('active');
                });
            }

            // Akademik bar chart interactive toggle
            const barItems = document.querySelectorAll('.akademik-bar-item');
            barItems.forEach(item => {
                item.addEventListener('click', function() {
                    barItems.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Fetch Realtime Akademik Data
            function loadAkademikData() {
                fetch('{{ route("siswa.api.akademik") }}')
                    .then(res => res.json())
                    .then(data => {
                        if (data.success && data.stats) {
                            const rataEl = document.getElementById('akademikRataNilai');
                            const hadirEl = document.getElementById('akademikKehadiran');
                            if (rataEl) rataEl.textContent = data.stats.rata_rata_nilai || '0.0';
                            if (hadirEl) hadirEl.textContent = data.stats.kehadiran_persen || '0%';
                        }
                    })
                    .catch(err => console.error('Error fetching akademik data:', err));
            }

            loadAkademikData();
            setInterval(loadAkademikData, 10000);
        });
    </script>

</body>
</html>
