<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <title>BLUD Teaching Factory — TEFA-Hub</title>

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
        <x-sidebar-siswa :active="'blud'" :user="$user ?? []" />

        <!-- ═══════════════════════════════════════════
             MAIN CONTENT AREA
             ═══════════════════════════════════════════ -->
        <main class="main-content">
            
            <!-- ═══════════════════════════════════════════
                 HEADER UTAMA ROLE SISWA
                 ═══════════════════════════════════════════ -->
            <x-header-siswa :user="$user ?? []" />

            <!-- Page Body Area -->
            <div class="content-body">
                
                <!-- ═══════════════════════════════════════════
                     HERO CARD HEADER BLUD
                     ═══════════════════════════════════════════ -->
                <div class="blud-hero-banner" style="background-image: url('{{ asset('assets/Container (16).webp') }}');" role="region" aria-label="Header Teaching Factory & Unit Produksi BLUD">
                    <div class="blud-hero-content">
                        <div class="blud-hero-badge">
                            <svg class="blud-badge-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                                <path d="M5 3v4"/>
                                <path d="M19 17v4"/>
                                <path d="M3 5h4"/>
                                <path d="M17 19h4"/>
                            </svg>
                            <span>UNIT PRODUKSI &amp; VALIDASI BLUD</span>
                        </div>
                        <h1 class="blud-hero-title">Teaching Factory &amp; Unit Produksi BLUD</h1>
                        <p class="blud-hero-desc">Kelola etalase karya kejuruan siswa, ajukan produk inovatif baru untuk kurasi resmi sekolah, dan pantau status sertifikasi DUDI secara terpadu.</p>
                    </div>
                    <div class="blud-hero-actions">
                        <a href="javascript:void(0)" class="btn-blud-publish" aria-label="Publikasi Produk" onclick="openModalPublikasi(event)">
                            <svg class="btn-blud-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span>Publikasi Produk</span>
                        </a>
                    </div>
                </div>

                <!-- ═══════════════════════════════════════════
                     BLUD STATS SUMMARY CARDS (4 CARDS: 212x182)
                     ═══════════════════════════════════════════ -->
                <div class="blud-stats-grid" role="region" aria-label="Ringkasan Status Produk BLUD">
                    
                    <!-- CARD 1: Total Produk Diajukan -->
                    <div class="blud-stat-card card-stat-blue">
                        <div class="blud-stat-top">
                            <span class="blud-stat-label">TOTAL PRODUK<br>DIAJUKAN</span>
                            <div class="blud-stat-icon-wrap bg-icon-blue">
                                <img src="{{ asset('assets/Container (17).webp') }}" alt="Total Produk Diajukan" class="blud-stat-icon-img">
                            </div>
                        </div>
                        <div class="blud-stat-bottom">
                            <div class="blud-stat-number-row">
                                <span class="blud-stat-number text-dark" id="statTotalDiajukan">0</span>
                                <span class="blud-stat-unit">Karya / Unit</span>
                            </div>
                            <div class="blud-stat-sub-row text-blue">
                                <img src="{{ asset('assets/Container (21).webp') }}" alt="Icon" class="blud-sub-icon-img">
                                <span class="blud-sub-text">Tahun Ajaran 2026/2027</span>
                            </div>
                        </div>
                        <div class="blud-stat-eclipse eclipse-blue" aria-hidden="true"></div>
                    </div>

                    <!-- CARD 2: Tervalidasi & Tayang -->
                    <div class="blud-stat-card card-stat-green">
                        <div class="blud-stat-top">
                            <span class="blud-stat-label text-green">TERVALIDASI &amp;<br>TAYANG</span>
                            <div class="blud-stat-icon-wrap bg-icon-green">
                                <img src="{{ asset('assets/Container (18).webp') }}" alt="Tervalidasi & Tayang" class="blud-stat-icon-img">
                            </div>
                        </div>
                        <div class="blud-stat-bottom">
                            <div class="blud-stat-number-row">
                                <span class="blud-stat-number text-green" id="statTervalidasi">0</span>
                                <span class="blud-stat-unit">Telah Kurasi</span>
                            </div>
                            <div class="blud-stat-sub-row text-green">
                                <img src="{{ asset('assets/Container (22).webp') }}" alt="Icon" class="blud-sub-icon-img">
                                <span class="blud-sub-text">Aktif di Katalog Publik</span>
                            </div>
                        </div>
                        <div class="blud-stat-eclipse eclipse-blue" aria-hidden="true"></div>
                    </div>

                    <!-- CARD 3: Menunggu Validasi -->
                    <div class="blud-stat-card card-stat-purple">
                        <div class="blud-stat-top">
                            <span class="blud-stat-label">MENUNGGU<br>VALIDASI</span>
                            <div class="blud-stat-icon-wrap bg-icon-purple">
                                <img src="{{ asset('assets/Container (19).webp') }}" alt="Menunggu Validasi" class="blud-stat-icon-img">
                            </div>
                        </div>
                        <div class="blud-stat-bottom">
                            <div class="blud-stat-number-row">
                                <span class="blud-stat-number text-dark" id="statMenunggu">0</span>
                                <span class="blud-stat-unit">Antrean Uji</span>
                            </div>
                            <div class="blud-stat-sub-row text-purple">
                                <img src="{{ asset('assets/Container (23).webp') }}" alt="Icon" class="blud-sub-icon-img">
                                <span class="blud-sub-text">Estimasi 1x24 jam kurasi</span>
                            </div>
                        </div>
                        <div class="blud-stat-eclipse eclipse-purple" aria-hidden="true"></div>
                    </div>

                    <!-- CARD 4: Perlu Revisi -->
                    <div class="blud-stat-card card-stat-red">
                        <div class="blud-stat-top">
                            <span class="blud-stat-label text-red">PERLU REVISI</span>
                            <div class="blud-stat-icon-wrap bg-icon-red">
                                <img src="{{ asset('assets/Container (20).webp') }}" alt="Perlu Revisi" class="blud-stat-icon-img">
                            </div>
                        </div>
                        <div class="blud-stat-bottom">
                            <div class="blud-stat-number-row">
                                <span class="blud-stat-number text-red" id="statPerluRevisi">0</span>
                                <span class="blud-stat-unit">Catatan Teknis</span>
                            </div>
                            <div class="blud-stat-sub-row text-red">
                                <img src="{{ asset('assets/Container (24).webp') }}" alt="Icon" class="blud-sub-icon-img">
                                <span class="blud-sub-text">Dari Guru Pembimbing</span>
                            </div>
                        </div>
                        <div class="blud-stat-eclipse eclipse-red" aria-hidden="true"></div>
                    </div>

                </div>

                <!-- ═══════════════════════════════════════════
                     BLUD SERVICES / PRODUCTS SECTION
                     ═══════════════════════════════════════════ -->
                <section class="blud-section-wrapper">
                    
                    <!-- Section Header -->
                    <div class="blud-section-header">
                        <div class="blud-header-text">
                            <h2 class="blud-section-title">Layanan & Produk BLUD</h2>
                            <p class="blud-section-subtitle">Katalog produk dan jasa karya siswa Teaching Factory terintegrasi industri</p>
                        </div>
                    </div>

                    <!-- Products Grid Container -->
                    <div class="blud-cards-container" id="bludCardsContainer">
                        <!-- Populated dynamically via JS -->
                    </div>

                    <!-- Clean Empty State if no products exist -->
                    <div id="bludEmptyState" style="display: none; padding: 3rem 1.5rem; text-align: center; background: #FFFFFF; border-radius: 16px; border: 1.5px dashed #CBD5E1; margin: 1rem 0;">
                        <div style="width: 56px; height: 56px; margin: 0 auto 1rem; background: #EEF2FF; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m7.5 4.27 9 5.15"/>
                                <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                                <path d="m3.3 7 8.7 5 8.7-5"/>
                                <path d="M12 22V12"/>
                            </svg>
                        </div>
                        <h3 style="font-size: 1.15rem; font-weight: 700; color: #1E293B; margin-bottom: 0.5rem;">Belum Ada Produk BLUD Diajukan</h3>
                        <p style="font-size: 0.9rem; color: #64748B; max-width: 480px; margin: 0 auto 1.5rem;">Unit Teaching Factory siap menampung karya, proyek, atau jasa inovasi Anda untuk dikurasi dan dipasarkan secara resmi.</p>
                        <button type="button" class="btn-blud-publish" onclick="openModalPublikasi(event)" style="display: inline-flex; margin: 0 auto;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span>Ajukan Produk Pertama</span>
                        </button>
                    </div>

                </section>

            </div>

        </main>

        <!-- Sidebar Overlay Backdrop for Responsive Mobile/Tablet -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    </div>

    <!-- ═══════════════════════════════════════════
         MODAL POP-UP PUBLIKASI PRODUK BLUD
         ═══════════════════════════════════════════ -->
    <x-modal-publikasi-produk />

    <!-- Page-Specific Interactive Script & Realtime Fetcher -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Fetch Realtime BLUD Data
            function loadBludData() {
                fetch('{{ route("siswa.api.blud") }}')
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            updateBludStats(data.stats);
                            renderBludProducts(data.user_produks, data.katalog_publik);
                        }
                    })
                    .catch(err => console.error('Error fetching BLUD data:', err));
            }

            function updateBludStats(stats) {
                if (!stats) return;
                document.getElementById('statTotalDiajukan').textContent = stats.total_diajukan || 0;
                document.getElementById('statTervalidasi').textContent = stats.tervalidasi_tayang || 0;
                document.getElementById('statMenunggu').textContent = stats.menunggu_validasi || 0;
                document.getElementById('statPerluRevisi').textContent = stats.perlu_revisi || 0;
            }

            function renderBludProducts(userProduks, katalogPublik) {
                const container = document.getElementById('bludCardsContainer');
                const emptyState = document.getElementById('bludEmptyState');
                if (!container || !emptyState) return;

                const allItems = (userProduks && userProduks.length > 0) 
                    ? userProduks 
                    : ((katalogPublik && katalogPublik.length > 0) ? katalogPublik : []);

                if (allItems.length === 0) {
                    container.innerHTML = '';
                    emptyState.style.display = 'block';
                    return;
                }

                emptyState.style.display = 'none';

                container.innerHTML = allItems.map(item => {
                    const priceFormatted = item.harga ? ('Rp ' + Number(item.harga).toLocaleString('id-ID')) : 'Mulai 50rb';
                    const imgUrl = item.visual_url || '{{ asset("assets/Background (14).webp") }}';
                    const category = item.kategori || 'JASA LAYANAN';
                    const title = item.nama_produk || 'Produk Inovasi Siswa';

                    return `
                        <div class="blud-card-frame">
                            <div class="blud-card-image-wrap">
                                <img src="${imgUrl}" alt="${escapeHtml(title)}" class="blud-bg-img" onerror="this.onerror=null; this.src='{{ asset('assets/Background (14).webp') }}';">
                                <span class="blud-price-badge">${escapeHtml(priceFormatted)}</span>
                                
                                <div class="blud-inner-card">
                                    <div class="blud-inner-content">
                                        <span class="blud-tag">${escapeHtml(category.toUpperCase())}</span>
                                        <h3 class="blud-title">${escapeHtml(title)}</h3>
                                    </div>
                                    <a href="javascript:void(0)" class="blud-btn">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    `;
                }).join('');
            }

            function escapeHtml(str) {
                if (!str) return '';
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            // Listen for product added event
            window.addEventListener('bludProductAdded', function() {
                loadBludData();
            });

            // Initial load & 10-sec Polling
            loadBludData();
            setInterval(loadBludData, 10000);
        });
    </script>

</body>
</html>
