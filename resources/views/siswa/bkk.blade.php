<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <title>BKK Career Center — TEFA-Hub</title>

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
        <x-sidebar-siswa :active="'bkk'" :user="$user ?? []" />

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
                     HERO CARD HEADER BKK (BURSA KERJA KHUSUS)
                     ═══════════════════════════════════════════ -->
                <div class="bkk-hero-banner" style="background-image: url('{{ asset('assets/Container (16).webp') }}');" role="region" aria-label="Header Bursa Kerja Khusus BKK">
                    <div class="bkk-hero-content">
                        <div class="bkk-hero-badge">
                            <svg class="bkk-badge-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                            </svg>
                            <span>BURSA KERJA KHUSUS &amp; KARIR ALUMNI</span>
                        </div>
                        <h1 class="bkk-hero-title">Bursa Kerja Khusus &amp; Penyaluran Karir</h1>
                        <p class="bkk-hero-desc">Eksplorasi lowongan kerja &amp; magang industri terverifikasi, pantau kesiapan kompetensi vokasi, dan hubungkan portofolio siswa langsung ke mitra DUDI.</p>
                    </div>
                    <div class="bkk-hero-actions">
                        <a href="#rekomendasiLowongan" class="btn-bkk-explore" aria-label="Jelajahi Lowongan">
                            <svg class="btn-bkk-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <span>Jelajahi Lowongan</span>
                        </a>
                    </div>
                </div>

                <!-- ═══════════════════════════════════════════
                     CARD KESIAPAN KERJA BKK (928px CARD)
                     ═══════════════════════════════════════════ -->
                <section class="bkk-card-wrapper">
                    
                    <!-- Header Baris Atas -->
                    <div class="bkk-card-header">
                        <div class="bkk-header-text">
                            <h2 class="bkk-title">Kesiapan Kerja BKK</h2>
                            <p class="bkk-subtitle">Evaluasi Skema Standar Industri</p>
                        </div>
                        <span class="bkk-badge-status" id="bkkStatusBadge">Menunggu Evaluasi</span>
                    </div>

                    <!-- Grid / Content Body -->
                    <div class="bkk-card-body">
                        
                        <!-- Side Kiri: Circle Progress Chart (Match Score 0%) -->
                        <div class="bkk-chart-circle-wrap">
                            <svg class="bkk-circle-svg" viewBox="0 0 120 120">
                                <circle class="circle-bg" cx="60" cy="60" r="50" stroke="#EEF2FF" stroke-width="10" fill="none" />
                                <circle class="circle-fill" id="bkkCircleFill" cx="60" cy="60" r="50" stroke="#004AC6" stroke-width="10" stroke-linecap="round" fill="none" 
                                        stroke-dasharray="314.16" stroke-dashoffset="314.16" transform="rotate(-90 60 60)" />
                            </svg>
                            <div class="bkk-circle-text">
                                <span class="circle-score" id="bkkScoreText">0%</span>
                                <span class="circle-label">Match Score</span>
                            </div>
                        </div>

                        <!-- Side Kanan: 3 Baris Progress Skills (0%) -->
                        <div class="bkk-skills-list">

                            <!-- Skill 1: Hard Skills (Coding & UI) -->
                            <div class="bkk-skill-item">
                                <div class="skill-info-row">
                                    <span class="skill-name">Hard Skills (Coding & UI)</span>
                                    <span class="skill-val val-blue" id="valHardSkill">0%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill fill-blue" id="barHardSkill" style="width: 0%;"></div>
                                </div>
                            </div>

                            <!-- Skill 2: Soft Skills (Kerja Tim) -->
                            <div class="bkk-skill-item">
                                <div class="skill-info-row">
                                    <span class="skill-name">Soft Skills (Kerja Tim)</span>
                                    <span class="skill-val val-purple" id="valSoftSkill">0%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill fill-purple" id="barSoftSkill" style="width: 0%;"></div>
                                </div>
                            </div>

                            <!-- Skill 3: Disiplin & K3 Industri -->
                            <div class="bkk-skill-item">
                                <div class="skill-info-row">
                                    <span class="skill-name">Disiplin & K3 Industri</span>
                                    <span class="skill-val val-green" id="valK3Skill">0%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill fill-green" id="barK3Skill" style="width: 0%;"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Footer Note -->
                    <footer class="bkk-card-footer">
                        <span>Data tervalidasi oleh Guru Pembimbing & Mentor DUDI</span>
                    </footer>

                </section>

                <!-- ═══════════════════════════════════════════
                     SECTION REKOMENDASI LOWONGAN KERJA BKK
                     ═══════════════════════════════════════════ -->
                <section class="bkk-jobs-section" id="rekomendasiLowongan" role="region" aria-label="Rekomendasi Lowongan Kerja">
                    
                    <!-- Section Header -->
                    <div class="bkk-jobs-header">
                        <div class="bkk-jobs-badge-plain">
                            <img src="{{ asset('assets/Container (26).webp') }}" alt="Peluang Baru" class="bkk-badge-plain-img">
                            <span class="bkk-badge-plain-text">PELUANG BARU MINGGU INI</span>
                        </div>
                        <h2 class="bkk-jobs-title">Rekomendasi Lowongan Sesuai Keahlian</h2>
                        <p class="bkk-jobs-subtitle">Kecocokan dihitung otomatis dari nilai TEFA RPL dan catatan portofolio Anda</p>
                    </div>

                    <!-- Job Cards Grid Container -->
                    <div class="bkk-jobs-grid" id="bkkJobsContainer">
                        <!-- Populated dynamically via JS -->
                    </div>

                    <!-- Clean Empty State if no jobs exist -->
                    <div id="bkkEmptyState" style="display: none; padding: 3rem 1.5rem; text-align: center; background: #FFFFFF; border-radius: 16px; border: 1.5px dashed #CBD5E1; margin: 1rem 0;">
                        <div style="width: 56px; height: 56px; margin: 0 auto 1rem; background: #EEF2FF; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                            </svg>
                        </div>
                        <h3 style="font-size: 1.15rem; font-weight: 700; color: #1E293B; margin-bottom: 0.5rem;">Belum Ada Lowongan Aktif Minggu Ini</h3>
                        <p style="font-size: 0.9rem; color: #64748B; max-width: 480px; margin: 0 auto 1.5rem;">Mitra industri DUDI BKK sedang menyusun kuota penerimaan magang &amp; kerja. Silakan pantau secara berkala.</p>
                    </div>

                </section>

                <!-- ═══════════════════════════════════════════
                     SECTION RIWAYAT LAMARAN SAYA
                     ═══════════════════════════════════════════ -->
                <section class="bkk-riwayat-section" id="riwayatLamaranSection" style="display: none;">
                    <div class="bkk-jobs-header" style="margin-bottom: 16px;">
                        <div class="bkk-jobs-badge-plain">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#004AC6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span class="bkk-badge-plain-text">PROGRES SELEKSI SISWA</span>
                        </div>
                        <h2 class="bkk-jobs-title" style="font-size: 20px;">Riwayat Lamaran &amp; Seleksi Saya</h2>
                        <p class="bkk-jobs-subtitle">Pantau status seleksi berkas, jadwal wawancara, dan verifikasi mitra industri</p>
                    </div>

                    <div id="bkkLamaranListContainer">
                        <!-- Populated dynamically via JS -->
                    </div>
                </section>

            </div>

        </main>

        <!-- Sidebar Overlay Backdrop for Responsive Mobile/Tablet -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    </div>

    <!-- ═══════════════════════════════════════════
         MODAL DETAIL LOWONGAN KERJA / PKL (SISWA)
         ═══════════════════════════════════════════ -->
    <div id="modalBkkJobDetailOverlay" class="bkk-modal-overlay" role="dialog" aria-modal="true" tabindex="-1">
        <div class="bkk-modal-card">
            <div class="bkk-modal-header">
                <div>
                    <h3 id="bkkModalJobTitle" class="bkk-modal-title">Posisi Lowongan</h3>
                    <p id="bkkModalJobCompany" class="bkk-modal-company">Nama Perusahaan Mitra</p>
                </div>
                <button type="button" class="bkk-modal-close-btn" onclick="closeBkkJobDetail()" aria-label="Tutup Dialog">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="bkk-modal-body">
                <div class="bkk-modal-grid-stats">
                    <div class="bkk-modal-stat-box">
                        <span class="bkk-modal-stat-label">Lokasi</span>
                        <span class="bkk-modal-stat-val" id="bkkModalJobLocation">-</span>
                    </div>
                    <div class="bkk-modal-stat-box">
                        <span class="bkk-modal-stat-label">Tipe Kerja</span>
                        <span class="bkk-modal-stat-val" id="bkkModalJobType">-</span>
                    </div>
                    <div class="bkk-modal-stat-box">
                        <span class="bkk-modal-stat-label">Gaji / Saku</span>
                        <span class="bkk-modal-stat-val" id="bkkModalJobSalary" style="color:#004AC6;">-</span>
                    </div>
                    <div class="bkk-modal-stat-box">
                        <span class="bkk-modal-stat-label">Batas Lamar</span>
                        <span class="bkk-modal-stat-val" id="bkkModalJobDeadline">-</span>
                    </div>
                    <div class="bkk-modal-stat-box">
                        <span class="bkk-modal-stat-label">Total Pelamar</span>
                        <span class="bkk-modal-stat-val" id="bkkModalJobApplicants">0 Siswa</span>
                    </div>
                </div>

                <div>
                    <h4 class="bkk-modal-sec-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        <span>Deskripsi Pekerjaan</span>
                    </h4>
                    <p class="bkk-modal-sec-text" id="bkkModalJobDesc">Deskripsi belum dicantumkan.</p>
                </div>

                <div>
                    <h4 class="bkk-modal-sec-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><polyline points="16 11 18 13 22 9"></polyline></svg>
                        <span>Persyaratan &amp; Kualifikasi</span>
                    </h4>
                    <p class="bkk-modal-sec-text" id="bkkModalJobReq">Persyaratan kejuruan standar.</p>
                </div>
            </div>
            <div class="bkk-modal-footer">
                <button type="button" class="btn-job-detail" onclick="closeBkkJobDetail()" style="flex:initial; padding:0 18px;">Tutup</button>
                <div id="bkkModalActionContainer">
                    <!-- Dynamic button inserted by JS -->
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════
         MODAL DETAIL STATUS LAMARAN SAYA
         ═══════════════════════════════════════════ -->
    <div id="modalBkkLamaranDetailOverlay" class="bkk-modal-overlay" role="dialog" aria-modal="true" tabindex="-1">
        <div class="bkk-modal-card">
            <div class="bkk-modal-header">
                <div>
                    <h3 id="lamaranModalTitle" class="bkk-modal-title">Detail Lamaran Siswa</h3>
                    <p id="lamaranModalSubtitle" class="bkk-modal-company">Status &amp; Verifikasi Industri</p>
                </div>
                <button type="button" class="bkk-modal-close-btn" onclick="closeBkkLamaranDetail()" aria-label="Tutup Dialog">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="bkk-modal-body">
                <div class="bkk-modal-grid-stats" style="grid-template-columns: repeat(2, 1fr);">
                    <div class="bkk-modal-stat-box">
                        <span class="bkk-modal-stat-label">Status Lamaran</span>
                        <span class="bkk-modal-stat-val" id="lamaranModalStatus">-</span>
                    </div>
                    <div class="bkk-modal-stat-box">
                        <span class="bkk-modal-stat-label">Tanggal Dikirim</span>
                        <span class="bkk-modal-stat-val" id="lamaranModalDate">-</span>
                    </div>
                </div>

                <div>
                    <h4 class="bkk-modal-sec-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        <span>Perusahaan &amp; Posisi Terkait</span>
                    </h4>
                    <p class="bkk-modal-sec-text" id="lamaranModalJobInfo">-</p>
                </div>

                <div>
                    <h4 class="bkk-modal-sec-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        <span>Catatan / Surat Pengantar Lamaran</span>
                    </h4>
                    <p class="bkk-modal-sec-text" id="lamaranModalCoverLetter">Tidak ada catatan pengantar.</p>
                </div>
            </div>
            <div class="bkk-modal-footer">
                <button type="button" class="btn-job-apply" onclick="closeBkkLamaranDetail()" style="flex:initial; padding:0 24px;">Selesai</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification Lamar Sukses -->
    <div id="toastLamarSukses" class="toast-publikasi-sukses" role="alert" aria-live="polite">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <span id="toastLamarMessage">Lamaran berhasil dikirim ke mitra industri!</span>
    </div>

    <!-- Page-Specific Interactive Script & BKK Realtime Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentJobs = [];
            let currentLamaran = [];

            // Fetch Realtime BKK Data
            function loadBkkData() {
                fetch('{{ route("siswa.api.bkk") }}')
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            currentJobs = data.lowongans || [];
                            currentLamaran = data.lamaran_saya || [];
                            renderBkkScore(data.match_score);
                            renderBkkJobs(currentJobs);
                            renderBkkLamaran(currentLamaran);
                        }
                    })
                    .catch(err => console.error('Error fetching BKK data:', err));
            }

            function renderBkkScore(score) {
                const s = Number(score) || 0;
                const scoreText = document.getElementById('bkkScoreText');
                const circleFill = document.getElementById('bkkCircleFill');
                const badge = document.getElementById('bkkStatusBadge');

                if (scoreText) scoreText.textContent = s + '%';
                if (circleFill) {
                    const circumference = 314.16;
                    const offset = circumference - (s / 100 * circumference);
                    circleFill.style.strokeDashoffset = offset;
                }
                if (badge) {
                    badge.textContent = s > 0 ? (s >= 75 ? 'Siap Kerja' : 'Perlu Pendalaman') : 'Menunggu Evaluasi';
                }
            }

            function renderBkkJobs(jobs) {
                const container = document.getElementById('bkkJobsContainer');
                const emptyState = document.getElementById('bkkEmptyState');
                if (!container || !emptyState) return;

                if (!jobs || jobs.length === 0) {
                    container.innerHTML = '';
                    emptyState.style.display = 'block';
                    return;
                }

                emptyState.style.display = 'none';

                container.innerHTML = jobs.map((job, idx) => {
                    const matchBadges = ['match-green', 'match-blue', 'match-purple'];
                    const badgeClass = matchBadges[idx % 3];
                    const salary = job.gaji_max ? (job.gaji_max + ' / bln') : (job.gaji_min ? job.gaji_min : 'Sesuai UMK');
                    const applied = job.is_applied;
                    const matchLabel = job.match_score ? (job.match_score + '% Kecocokan') : 'Peluang Baru';

                    return `
                        <div class="bkk-job-card" id="jobCard-${job.id}">
                            <div class="job-card-top">
                                <span class="job-match-badge ${badgeClass}">${escapeHtml(matchLabel)}</span>
                                <span class="job-deadline-text">${escapeHtml(job.batas_daftar || 'Aktif')}</span>
                            </div>

                            <div class="job-card-info">
                                <h3 class="job-company-name">${escapeHtml(job.nama_perusahaan)}</h3>
                                <span class="job-role-name">${escapeHtml(job.posisi)}</span>
                                <div class="job-location-row">
                                    <svg class="job-location-icon" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    <span>${escapeHtml(job.lokasi)}</span>
                                </div>
                            </div>

                            <div class="job-details-box">
                                <div class="job-detail-row">
                                    <span class="detail-label">Uang Saku/Gaji:</span>
                                    <span class="detail-value">${escapeHtml(salary)}</span>
                                </div>
                                <div class="job-detail-row">
                                    <span class="detail-label">Tipe Kerja:</span>
                                    <span class="detail-value">${escapeHtml(job.tipe_kerja || 'Full-time')}</span>
                                </div>
                            </div>

                            <div class="job-card-action">
                                <button type="button" class="btn-job-detail" onclick="openBkkJobDetail(${job.id})" aria-label="Lihat Detail ${escapeHtml(job.posisi)}">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    <span>Detail</span>
                                </button>
                                ${applied ? `
                                    <button type="button" class="btn-job-apply" style="background:#00BA34; cursor:default;" disabled>
                                        <span style="display:inline-flex; align-items:center; gap:5px;">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            Dilamar
                                        </span>
                                    </button>
                                ` : `
                                    <button type="button" class="btn-job-apply" onclick="handleLamarJob(${job.id}, this)">
                                        <span>Lamar</span>
                                    </button>
                                `}
                            </div>
                        </div>
                    `;
                }).join('');
            }

            function renderBkkLamaran(lamarans) {
                const section = document.getElementById('riwayatLamaranSection');
                const container = document.getElementById('bkkLamaranListContainer');
                if (!section || !container) return;

                if (!lamarans || lamarans.length === 0) {
                    section.style.display = 'none';
                    container.innerHTML = '';
                    return;
                }

                section.style.display = 'block';

                container.innerHTML = lamarans.map((item, idx) => {
                    const job = item.lowongan || {};
                    const status = item.status || 'diajukan';
                    let statusClass = 'diajukan';
                    let statusText = 'Diajukan / Menunggu Review';

                    if (status === 'diproses' || status === 'review') {
                        statusClass = 'diproses';
                        statusText = 'Sedang Ditinjau Perusahaan';
                    } else if (status === 'diterima' || status === 'lolos') {
                        statusClass = 'diterima';
                        statusText = 'Lolos / Diterima';
                    } else if (status === 'ditolak') {
                        statusClass = 'ditolak';
                        statusText = 'Belum Lolos';
                    }

                    const dateStr = item.tanggal_lamar ? new Date(item.tanggal_lamar).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }) : 'Hari ini';

                    return `
                        <div class="bkk-riwayat-card">
                            <div>
                                <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                    <span class="bkk-status-pill ${statusClass}">
                                        <span style="width:6px; height:6px; border-radius:50%; background:currentColor; display:inline-block;"></span>
                                        ${statusText}
                                    </span>
                                    <span style="font-size:12px; color:#94A3B8;">• Diajukan pada ${dateStr}</span>
                                </div>
                                <h4 style="font-size:15px; font-weight:800; color:#0F172A; margin:0 0 2px;">${escapeHtml(job.posisi || 'Posisi Industri')}</h4>
                                <p style="font-size:13px; color:#004AC6; font-weight:600; margin:0;">${escapeHtml(job.nama_perusahaan || 'Mitra Industri')}</p>
                            </div>
                            <div>
                                <button type="button" class="btn-job-detail" onclick="openBkkLamaranDetail(${idx})" style="padding:0 16px; height:34px;">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    <span>Lihat Detail</span>
                                </button>
                            </div>
                        </div>
                    `;
                }).join('');
            }

            /* ─── Modal Detail Job Handlers ─── */
            const jobModalOverlay = document.getElementById('modalBkkJobDetailOverlay');

            window.openBkkJobDetail = function(jobId) {
                const job = currentJobs.find(j => j.id == jobId);
                if (!job || !jobModalOverlay) return;

                document.getElementById('bkkModalJobTitle').textContent = job.posisi;
                document.getElementById('bkkModalJobCompany').textContent = job.nama_perusahaan;
                document.getElementById('bkkModalJobLocation').textContent = job.lokasi || 'Jawa Timur';
                document.getElementById('bkkModalJobType').textContent = job.tipe_kerja || 'Full-time';
                
                const salary = job.gaji_max ? (job.gaji_max + ' / bln') : (job.gaji_min ? job.gaji_min : 'Sesuai UMK');
                document.getElementById('bkkModalJobSalary').textContent = salary;
                document.getElementById('bkkModalJobDeadline').textContent = job.batas_daftar || 'Aktif';
                document.getElementById('bkkModalJobApplicants').textContent = (job.pelamar_count || 0) + ' Siswa';

                document.getElementById('bkkModalJobDesc').textContent = job.deskripsi || 'Program kerja industri bagi siswa bertalenta.';
                document.getElementById('bkkModalJobReq').textContent = job.persyaratan || 'Memahami kompetensi kejuruan dan memiliki komitmen kerja tinggi.';

                const actionContainer = document.getElementById('bkkModalActionContainer');
                if (actionContainer) {
                    if (job.is_applied) {
                        actionContainer.innerHTML = `
                            <button type="button" class="btn-job-apply" style="background:#00BA34; cursor:default;" disabled>
                                <span>Sudah Dilamar</span>
                            </button>
                        `;
                    } else {
                        actionContainer.innerHTML = `
                            <button type="button" class="btn-job-apply" onclick="handleLamarJob(${job.id}, this); closeBkkJobDetail();">
                                <span>Lamar Posisi Ini</span>
                            </button>
                        `;
                    }
                }

                jobModalOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            };

            window.closeBkkJobDetail = function() {
                if (jobModalOverlay) {
                    jobModalOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            };

            /* ─── Modal Detail Lamaran Handlers ─── */
            const lamaranModalOverlay = document.getElementById('modalBkkLamaranDetailOverlay');

            window.openBkkLamaranDetail = function(idx) {
                const item = currentLamaran[idx];
                if (!item || !lamaranModalOverlay) return;

                const job = item.lowongan || {};
                const status = item.status || 'diajukan';
                const dateStr = item.tanggal_lamar ? new Date(item.tanggal_lamar).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' }) : '-';

                document.getElementById('lamaranModalTitle').textContent = 'Lamaran: ' + (job.posisi || 'Lowongan Industri');
                document.getElementById('lamaranModalSubtitle').textContent = job.nama_perusahaan || 'Mitra DUDI';
                document.getElementById('lamaranModalStatus').textContent = status.toUpperCase();
                document.getElementById('lamaranModalDate').textContent = dateStr;
                document.getElementById('lamaranModalJobInfo').textContent = `${job.posisi || '-'} di ${job.nama_perusahaan || '-'} (${job.lokasi || '-'}) • ${job.tipe_kerja || 'PKL/Magang'}`;
                document.getElementById('lamaranModalCoverLetter').textContent = item.surat_lamaran || 'Lamaran resmi diajukan secara langsung melalui sistem terintegrasi TEFA-Hub.';

                lamaranModalOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            };

            window.closeBkkLamaranDetail = function() {
                if (lamaranModalOverlay) {
                    lamaranModalOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            };

            // Overlay click dismissals
            jobModalOverlay?.addEventListener('click', function(e) {
                if (e.target === jobModalOverlay) closeBkkJobDetail();
            });
            lamaranModalOverlay?.addEventListener('click', function(e) {
                if (e.target === lamaranModalOverlay) closeBkkLamaranDetail();
            });

            // ESC key dismissal
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (jobModalOverlay?.classList.contains('active')) closeBkkJobDetail();
                    if (lamaranModalOverlay?.classList.contains('active')) closeBkkLamaranDetail();
                }
            });

            window.handleLamarJob = function(jobId, btnElement) {
                if (!confirm('Apakah Anda yakin ingin mengajukan lamaran untuk lowongan ini?')) return;

                if (btnElement) {
                    btnElement.disabled = true;
                    btnElement.innerHTML = '<span>Mengirim...</span>';
                }

                fetch('{{ route("siswa.api.bkk.lamar") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ lowongan_id: jobId })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        showLamarToast(data.message);
                        loadBkkData();
                    } else {
                        alert(data.message || 'Gagal mengirim lamaran');
                        if (btnElement) {
                            btnElement.disabled = false;
                            btnElement.innerHTML = '<span>Lamar</span>';
                        }
                    }
                })
                .catch(err => {
                    console.error(err);
                    showLamarToast('Lamaran berhasil dikirimkan!');
                    loadBkkData();
                });
            };

            function showLamarToast(msg) {
                const toast = document.getElementById('toastLamarSukses');
                const toastMsg = document.getElementById('toastLamarMessage');
                if (toast && toastMsg) {
                    toastMsg.textContent = msg;
                    toast.classList.add('show');
                    setTimeout(() => {
                        toast.classList.remove('show');
                    }, 4000);
                }
            }

            const escapeHtml = window.escapeHtml || function(str) {
                return str ? String(str).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m])) : '';
            };

            // Initial load & Polling
            loadBkkData();
            setInterval(loadBkkData, 10000);
        });
    </script>

</body>
</html>
