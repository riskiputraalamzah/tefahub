<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Eksplorasi Peluang PKL & Karier Industri Mitra — Jembatan resmi talenta vokasi Tefa-Hub menuju DUDI melalui program Praktik Kerja Lapangan bersertifikasi, magang industri, dan rekrutmen kerja terpercaya.">
    <title>Eksplorasi Peluang PKL & Karier Industri Mitra — Tefa-Hub</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ file_exists(public_path('assets/css/landing.css')) ? filemtime(public_path('assets/css/landing.css')) : '1.0' }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pkl.landing.css') }}?v={{ file_exists(public_path('assets/css/pkl.landing.css')) ? filemtime(public_path('assets/css/pkl.landing.css')) : '1.0' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Accessibility: Skip to Main Content --}}
    <a href="#mainContent" class="skip-to-content">Lewati ke Konten Utama</a>

    {{-- Unified Landing Header & Navbar --}}
    <x-landing-header :active="'pkl'" />

    {{-- Accessible Breadcrumb Navigation --}}
    <x-breadcrumbs :items="[
        ['label' => 'Layanan', 'url' => url('/#layanan')],
        ['label' => 'Praktik Kerja Lapangan (PKL)', 'url' => '']
    ]" />

    {{-- ═══════════════════════════════════════════
         PKL HERO SECTION WITH 1216x444 BANNER CARD
         ═══════════════════════════════════════════ --}}
    <section class="pkl-hero-section" id="mainContent">
        {{-- Ambient background glows --}}
        <div class="pkl-bg-glow pkl-glow-1" aria-hidden="true"></div>
        <div class="pkl-bg-glow pkl-glow-2" aria-hidden="true"></div>

        <div class="wrap">
            {{-- 1216x444 Main Card --}}
            <div class="pkl-banner-card reveal">

                {{-- Left Content Column --}}
                <div class="pkl-card-content">

                    {{-- 1. Badge Pill --}}
                    <div class="pkl-bubble-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>KEMITRAAN INDUSTRI &amp; MAGANG BERSERTIFIKAT RESMI</span>
                    </div>

                    {{-- 2. Title --}}
                    <h1 class="pkl-card-title">
                        Eksplorasi Peluang PKL &amp;<br>
                        Karier Industri Mitra
                    </h1>

                    {{-- 3. Description --}}
                    <p class="pkl-card-desc">
                        Jembatan resmi talenta vokasi Tefa-Hub menuju Dunia Usaha &amp; Dunia Industri (DUDI). Dapatkan pengalaman kerja nyata melalui program Praktik Kerja Lapangan (PKL) bersertifikasi industri, magang terstandar, dan seleksi kerja terintegrasi bersama mentor profesional.
                    </p>

                    {{-- 4. Two Buttons --}}
                    <div class="pkl-card-actions">
                        {{-- Primary Button (Blue) --}}
                        <a href="#lowongan" class="pkl-btn pkl-btn-primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="9 12 12 15 16 10"></polyline>
                            </svg>
                            <span>Jelajahi Lowongan Tersedia</span>
                        </a>

                        {{-- Secondary Button (Light Blue Tint) --}}
                        <a href="{{ route('siswa.bkk') }}" class="pkl-btn pkl-btn-secondary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                <polyline points="9 16 11 18 15 14"></polyline>
                            </svg>
                            <span>Lihat Jadwal Interview</span>
                        </a>
                    </div>

                </div>

                {{-- Right Visual Column --}}
                <div class="pkl-card-visual">
                    {{-- Layer 1: Vector & Building Scenery Artwork --}}
                    <img src="{{ asset('assets/image copy.webp') }}" alt="" class="pkl-bg-artwork" aria-hidden="true">

                    {{-- Layer 2: Main Student & Floating Cards Illustration --}}
                    <div class="pkl-illustration-wrap">
                        <img
                            src="{{ asset('assets/image copy 4.webp') }}"
                            alt="Siswa Vokasi dan Peluang PKL Industri Mitra Tefa-Hub"
                            class="pkl-hero-img"
                        >
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         FILTER & SEARCH SECTION
         ═══════════════════════════════════════════ --}}
    <section class="pkl-search-section" id="lowongan">
        <div class="wrap">
            <div class="pkl-search-bar reveal">
                <div class="pkl-input-group">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" id="pklSearchInput" class="pkl-search-input" placeholder="Cari posisi PKL, keahlian, atau nama perusahaan...">
                </div>
                <div class="pkl-input-group">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <select id="pklSelectLokasi" class="pkl-select-input">
                        <option value="">Semua Lokasi / Kota</option>
                        <option value="surabaya">Surabaya &amp; Sekitarnya</option>
                        <option value="malang">Malang Raya</option>
                        <option value="jakarta">DKI Jakarta</option>
                        <option value="remote">Online / Remote</option>
                    </select>
                </div>
                <div class="pkl-input-group">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <select id="pklSelectProgram" class="pkl-select-input">
                        <option value="">Semua Program</option>
                        <option value="pkl">Praktik Kerja Lapangan (PKL)</option>
                        <option value="magang">Magang Bersertifikat</option>
                        <option value="rekrutmen">Rekrutmen Lulusan</option>
                    </select>
                </div>
                <button type="button" id="pklBtnCari" class="pkl-btn-cari">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <span>Cari Program</span>
                </button>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         OPPORTUNITY LISTINGS (PKL, MAGANG & REKRUTMEN)
         ═══════════════════════════════════════════ --}}
    <section class="pkl-listings-section">
        <div class="wrap">
            <div class="pkl-section-header reveal">
                <div>
                    <h2 class="pkl-section-title">Peluang Penempatan Industri Terbuka</h2>
                    <p class="pkl-section-sub">Daftarkan dirimu dan pantau jadwal seleksi secara langsung melalui platform terintegrasi.</p>
                </div>
            </div>

            @php
                $opportunities = [
                    [
                        'id' => 1,
                        'logo' => 'L2.webp',
                        'company' => 'PT Jagoan Hosting Indonesia',
                        'company_category' => 'Cloud Computing & Web Hosting Provider',
                        'title' => 'Cloud & DevOps Junior Apprentice',
                        'type' => 'pkl',
                        'type_label' => 'Lowongan PKL',
                        'location' => 'Malang / Hybrid',
                        'work_mode' => 'Hybrid (3 Hari Onsite, 2 Hari Remote)',
                        'duration' => '6 Bulan (Semester Gasal)',
                        'quota' => 'Sisa 4 Kuota',
                        'allowance' => 'Uang Saku Rp 1.500.000 / bln + Fasilitas Server',
                        'desc' => 'Program penempatan Praktik Kerja Lapangan (PKL) bersertifikasi industri yang dirancang khusus untuk siswa vokasi bidang Rekayasa Perangkat Lunak (RPL) dan Teknik Komputer & Jaringan (TKJ). Peserta akan mempelajari langsung tata kelola arsitektur cloud server modern, containerization, dan otomasi deployment.',
                        'jobdesk' => [
                            'Melakukan monitoring kesehatan sistem server dan jaringan cloud 24/7.',
                            'Membantu konfigurasi web server berbasis Linux (Nginx, Apache, LiteSpeed).',
                            'Mempelajari dan menerapkan otomasi pipeline CI/CD dengan Git & Docker.',
                            'Menyusun dokumentasi teknis prosedur pemeliharaan dan troubleshooting server.'
                        ],
                        'requirements' => [
                            'Siswa aktif SMK jurusan RPL / TKJ / SIJA kelas XI atau XII.',
                            'Memahami konsep dasar sistem operasi Linux dan protokol jaringan TCP/IP.',
                            'Familiar dengan command line terminal dan konsep web hosting / domain.',
                            'Memiliki kedisiplinan, kemauan belajar mandiri, dan komunikasi tim yang baik.',
                            'Mendapatkan surat rekomendasi resmi dari sekolah / guru pembimbing.'
                        ],
                        'benefits' => [
                            'Sertifikat Resmi Kelulusan PKL dari PT Jagoan Hosting Indonesia.',
                            'Akses gratis akun cloud VPS & domain development selama masa PKL.',
                            'Mentoring teknis intensif 1-on-1 dari Senior Infrastructure Engineer.',
                            'Peluang fast-track rekrutmen kerja setelah kelulusan sekolah.'
                        ],
                        'timeline' => [
                            ['num' => '01', 'title' => 'Pendaftaran', 'desc' => 'Kirim formulir & portofolio melalui portal BKK'],
                            ['num' => '02', 'title' => 'Tes & Interview', 'desc' => 'Asesmen teknis dasar & wawancara online'],
                            ['num' => '03', 'title' => 'Pengumuman', 'desc' => 'Notifikasi penerimaan di akun siswa'],
                            ['num' => '04', 'title' => 'Onboarding', 'desc' => 'Pembekalan intensif & penugasan mentor']
                        ]
                    ],
                    [
                        'id' => 2,
                        'logo' => 'L4.webp',
                        'company' => 'Garuda Spark Innovation Hub',
                        'company_category' => 'Digital Product Agency & Software Studio',
                        'title' => 'Frontend UI/UX Implementation Intern',
                        'type' => 'magang',
                        'type_label' => 'Program Magang',
                        'location' => 'Surabaya',
                        'work_mode' => 'Onsite Studio (Senin - Jumat)',
                        'duration' => '3 - 6 Bulan',
                        'quota' => 'Sisa 6 Kuota',
                        'allowance' => 'Uang Saku Rp 1.200.000 / bln + Uang Makan Siang',
                        'desc' => 'Program magang terarah untuk siswa berfokus pada slicing desain antarmuka Figma menjadi kode HTML/CSS/JS dan komponen web modern yang responsif, interaktif, dan sesuai standar industri desain UI/UX terkini.',
                        'jobdesk' => [
                            'Mengonversi rancangan UI/UX Figma menjadi kode HTML, CSS modern, dan JavaScript.',
                            'Memastikan kompatibilitas tampilan lintas peramban (cross-browser) dan responsivitas mobile.',
                            'Berkolaborasi dengan tim backend engineer untuk pengikatan data API.',
                            'Melakukan pengujian usability testing dan optimasi performa loading aset antarmuka.'
                        ],
                        'requirements' => [
                            'Siswa SMK jurusan Rekayasa Perangkat Lunak (RPL) atau DKV Multimedia.',
                            'Menguasai HTML5, CSS3, JavaScript ES6, dan familiar dengan Figma.',
                            'Memiliki portofolio mini project web slicing atau aplikasi buatan sendiri.',
                            'Mata yang teliti terhadap detail jarak (spacing), tipografi, dan warna.',
                            'Siap magang secara onsite di Surabaya sesuai jadwal kerja industri.'
                        ],
                        'benefits' => [
                            'Sertifikat Magang Industri Portofolio Nasional.',
                            'Studi kasus nyata pada project aplikasi enterprise klien internasional.',
                            'Review portofolio langsung dari Lead Product Designer.',
                            'Lingkungan kerja kolaboratif bergaya startup teknologi modern.'
                        ],
                        'timeline' => [
                            ['num' => '01', 'title' => 'Submit Berkas', 'desc' => 'Lengkapi CV & tautan link portofolio Figma/GitHub'],
                            ['num' => '02', 'title' => 'Design Challenge', 'desc' => 'Live slicing 1 halaman web statis sederhana'],
                            ['num' => '03', 'title' => 'Wawancara', 'desc' => 'Sesi diskusi minat & komitmen magang'],
                            ['num' => '04', 'title' => 'Mulai Magang', 'desc' => 'Bergabung di squad pengembangan produk']
                        ]
                    ],
                    [
                        'id' => 3,
                        'logo' => 'L5.webp',
                        'company' => 'Ngalup Collaborative Network',
                        'company_category' => 'Creative Hub, Coworking & Startup Ecosystem',
                        'title' => 'Digital Marketing & Content Strategy',
                        'type' => 'pkl',
                        'type_label' => 'Lowongan PKL',
                        'location' => 'Malang',
                        'work_mode' => 'Hybrid Coworking Space (Malang)',
                        'duration' => '6 Bulan',
                        'quota' => 'Sisa 3 Kuota',
                        'allowance' => 'Uang Saku Rp 1.000.000 / bln + Akses Coworking Space',
                        'desc' => 'Peluang praktik kerja lapangan dalam ekosistem startup terbesar di Jawa Timur. Anda akan terjun langsung mengelola strategi konten digital, copy writing, social media campaign, dan liputan workshop kemitraan industri vokasi.',
                        'jobdesk' => [
                            'Merancang editorial plan konten media sosial harian (Instagram, TikTok, LinkedIn).',
                            'Memproduksi materi visual & video pendek liputan event dan program inkubasi startup.',
                            'Melakukan riset tren keyword, copywriting promosi, dan optimasi engagement audiens.',
                            'Membantu dokumentasi live streaming dan technical support seminar / workshop.'
                        ],
                        'requirements' => [
                            'Siswa SMK jurusan DKV, Bisnis Daring & Pemasaran (BDP), atau RPL.',
                            'Kreatif, update terhadap tren media sosial terkini, dan pandai merangkai kata.',
                            'Mampu mengoperasikan tools desain grafis (Canva / Adobe Illustrator / CapCut).',
                            'Percaya diri, komunikatif, dan mampu berinteraksi dengan komunitas startup.',
                            'Memiliki smartphone berkamera baik untuk kebutuhan produksi konten.'
                        ],
                        'benefits' => [
                            'Akses gratis tanpa batas fasilitas Coworking Space Ngalup Malang.',
                            'Networking luas dengan puluhan CEO startup & praktisi industri kreatif.',
                            'Sertifikat resmi kemitraan industri & surat rekomendasi kerja.',
                            'Tiket gratis mengikuti seluruh workshop dan conference yang diadakan.'
                        ],
                        'timeline' => [
                            ['num' => '01', 'title' => 'Pendaftaran', 'desc' => 'Unggah CV & contoh konten kreasi terbaikmu'],
                            ['num' => '02', 'title' => 'Kuis Kreatif', 'desc' => 'Studi kasus mini ide kampanye digital'],
                            ['num' => '03', 'title' => 'Wawancara Santai', 'desc' => 'Diskusi online bersama tim Marketing Lead'],
                            ['num' => '04', 'title' => 'First Day Onsite', 'desc' => 'Pengenalan ekosistem & co-working culture']
                        ]
                    ],
                    [
                        'id' => 4,
                        'logo' => 'L3.webp',
                        'company' => 'Mitra BPSDMP Komdigi RI',
                        'company_category' => 'Balai Pengembangan SDM Digital Kementerian Komdigi',
                        'title' => 'Junior Cyber Security Support',
                        'type' => 'magang',
                        'type_label' => 'Program Magang',
                        'location' => 'Surabaya / Onsite',
                        'work_mode' => 'Onsite Balai Pelatihan (Senin - Jumat)',
                        'duration' => '6 Bulan',
                        'quota' => 'Sisa 5 Kuota',
                        'allowance' => 'Uang Saku Rp 1.750.000 / bln + Sertifikasi Nasional SKKNI',
                        'desc' => 'Program magang prestisius dalam lingkup pengamanan data dan infrastruktur digital pemerintah. Siswa akan dibekali wawasan cyber hygiene, network vulnerability assessment dasar, dan audit kepatuhan keamanan sistem.',
                        'jobdesk' => [
                            'Membantu monitoring traffic jaringan dan anomali log keamanan firewall.',
                            'Menjalankan scanning celah keamanan dasar menggunakan automated security tools.',
                            'Membantu pelaksanaan simulasi audit cyber hygiene dan backup rutin data.',
                            'Menyusun laporan rekapitulasi temuan keamanan sistem informasi secara terstruktur.'
                        ],
                        'requirements' => [
                            'Siswa SMK jurusan TKJ / SIJA / RPL dengan rekam jejak akademik baik.',
                            'Memahami dasar topologi jaringan LAN/WAN, routing, dan firewall.',
                            'Memiliki integritas tinggi, etika profesional, dan menjaga kerahasiaan data negara.',
                            'Tidak pernah terlibat aktivitas peretasan ilegal (black hat activities).',
                            'Lolos verifikasi berkas administrasi dan surat izin kepala sekolah.'
                        ],
                        'benefits' => [
                            'Peluang mengikuti Uji Kompetensi Keamanan Jaringan berlisensi BNSP / SKKNI gratis.',
                            'Sertifikat Magang Resmi Lembaga Pemerintahan Pusat.',
                            'Bimbingan langsung dari Auditor Keamanan Informasi tersertifikasi.',
                            'Pengalaman riil mengawal infrastruktur sistem publik berstandar nasional.'
                        ],
                        'timeline' => [
                            ['num' => '01', 'title' => 'Seleksi Berkas', 'desc' => 'Verifikasi rapor, surat rekomendasi, dan SKCK sekolah'],
                            ['num' => '02', 'title' => 'Uji Teori', 'desc' => 'Ujian daring pengetahuan dasar jaringan & cyber'],
                            ['num' => '03', 'title' => 'Wawancara Panel', 'desc' => 'Wawancara integritas dan wawasan kebangsaan'],
                            ['num' => '04', 'title' => 'Penempatan Lab', 'desc' => 'Penugasan pada unit operasional monitoring lab']
                        ]
                    ],
                    [
                        'id' => 5,
                        'logo' => 'L1.webp',
                        'company' => 'Innovation Tech Partners Lab',
                        'company_category' => 'Enterprise Software Development & AI Solutions',
                        'title' => 'Junior Fullstack Web Developer',
                        'type' => 'rekrutmen',
                        'type_label' => 'Rekrutmen Kerja',
                        'location' => 'Remote / Malang',
                        'work_mode' => 'Work From Anywhere (WFA) / Remote',
                        'duration' => 'Full-time Kontrak 1 Tahun',
                        'quota' => 'Sisa 2 Kuota',
                        'allowance' => 'Gaji Rp 3.800.000 - Rp 4.500.000 / bln + BPJS',
                        'desc' => 'Rekrutmen jalur khusus alumni dan siswa tingkat akhir SMK berprestasi untuk bergabung sebagai Fullstack Web Developer junior. Bekerja secara remote dalam pengembangan aplikasi berbasis Laravel, PostgreSQL, dan Vue/React.',
                        'jobdesk' => [
                            'Mengembangkan modul fitur backend API menggunakan framework Laravel / PHP 8.',
                            'Membangun antarmuka web interaktif yang terhubung dengan REST API / GraphQL.',
                            'Melakukan penulisan automated unit test dan integrasi database migration.',
                            'Berpartisipasi aktif dalam sprint planning dan daily stand-up scrum secara remote.'
                        ],
                        'requirements' => [
                            'Siswa SMK tingkat akhir (kelas XII) yang siap kerja atau lulusan baru jurusan RPL.',
                            'Menguasai bahasa pemrograman PHP (Laravel) dan JavaScript dasar.',
                            'Memahami query database relational SQL (MySQL / PostgreSQL) dan Git version control.',
                            'Mampu bekerja mandiri dengan target waktu dan disiplin komunikasi kerja jarak jauh.',
                            'Memiliki perangkat laptop kerja dengan spesifikasi memadai dan koneksi internet stabil.'
                        ],
                        'benefits' => [
                            'Status Karyawan Kontrak Resmi dengan Gaji Kompetitif di atas UMK.',
                            'Tunjangan BPJS Ketenagakerjaan & Kesehatan lengkap.',
                            'Fleksibilitas kerja remote 100% dengan jam kerja terarah.',
                            'Jenjang karier cepat menuju posisi Middle Fullstack Engineer.'
                        ],
                        'timeline' => [
                            ['num' => '01', 'title' => 'Kirim Lamaran', 'desc' => 'Kirim CV lengkap, portofolio GitHub / live URL aplikasi'],
                            ['num' => '02', 'title' => 'Live Coding Test', 'desc' => 'Pengerjaan studi kasus backend API sederhana (24 jam)'],
                            ['num' => '03', 'title' => 'Tech Interview', 'desc' => 'Diskusi arsitektur kode dengan Tech Lead'],
                            ['num' => '04', 'title' => 'Offering & Kontrak', 'desc' => 'Penandatanganan kontrak kerja & onboarding remote']
                        ]
                    ],
                    [
                        'id' => 6,
                        'logo' => 'logo.webp',
                        'company' => 'BLUD & Teaching Factory Tefa-Hub',
                        'company_category' => 'Badan Layanan Usaha Daerah & Tefa SMK Kampus',
                        'title' => 'Teknisi Sistem Jaringan & Perangkat',
                        'type' => 'pkl',
                        'type_label' => 'Lowongan PKL',
                        'location' => 'SMK Kampus',
                        'work_mode' => 'Onsite Laboratorium & Bengkel Tefa SMK',
                        'duration' => '6 Bulan',
                        'quota' => 'Sisa 8 Kuota',
                        'allowance' => 'Uang Transport & Konsumsi Harian + Insentif BLUD',
                        'desc' => 'Program praktik kerja internal unit usaha Teaching Factory sekolah yang melayani perakitan PC, instalasi lab komputer sekolah mitra, instalasi CCTV fiber optic, dan perbaikan perangkat keras hardware komersial.',
                        'jobdesk' => [
                            'Melakukan perakitan, instalasi OS, dan maintenance PC lab multimedia sekolah.',
                            'Membantu instalasi perkabelan jaringan LAN Cat6 dan crimping konektor rj45.',
                            'Melakukan diagnosa hardware rusak, servis power supply, dan instalasi driver peripheral.',
                            'Membantu pelayanan pelanggan komersial pada loket service center BLUD Tefa.'
                        ],
                        'requirements' => [
                            'Siswa SMK aktif jurusan Teknik Komputer & Jaringan (TKJ) atau SIJA.',
                            'Mampu merakit komputer PC desktop dan instalasi software utilitas.',
                            'Memahami dasar pengujian kabel LAN dan setting access point WiFi.',
                            'Jujur, teliti, rapi dalam penataan alat kerja, dan melayani pelanggan dengan ramah.',
                            'Disiplin mematuhi SOP keselamatan dan kesehatan kerja (K3LH).'
                        ],
                        'benefits' => [
                            'Sertifikat PKL Unit Bisnis BLUD Resmi terakreditasi sekolah.',
                            'Insentif tambahan dari setiap unit servis perangkat pelanggan komersial.',
                            'Pengalaman praktik langsung menangani ratusan perangkat riil pelanggan.',
                            'Poin portofolio kejuruan yang meningkatkan nilai uji kompetensi kejuruan (UKK).'
                        ],
                        'timeline' => [
                            ['num' => '01', 'title' => 'Pendaftaran Internal', 'desc' => 'Daftar melalui koordinator kejuruan TKJ sekolah'],
                            ['num' => '02', 'title' => 'Pra-Uji Praktik', 'desc' => 'Tes merakit PC & setting jaringan sederhana'],
                            ['num' => '03', 'title' => 'Penetapan Shift', 'desc' => 'Pembagian jadwal shift pagi & siang bengkel'],
                            ['num' => '04', 'title' => 'Mulai Tugas', 'desc' => 'Penugasan aktif di unit kerja BLUD Tefa']
                        ]
                    ],
                ];
            @endphp

            <div class="pkl-grid" id="pklGrid">
                @foreach ($opportunities as $index => $item)
                    <div class="pkl-item-card reveal delay-{{ ($index % 3) + 1 }}" data-type="{{ $item['type'] }}" data-location="{{ Str::lower($item['location']) }}" data-title="{{ Str::lower($item['title']) }}" data-company="{{ Str::lower($item['company']) }}">
                        <div>
                            <div class="pkl-item-top">
                                <div class="pkl-company-logo">
                                    <img src="{{ asset('assets/' . $item['logo']) }}" alt="{{ $item['company'] }}">
                                </div>
                                <span class="pkl-badge-type {{ $item['type'] }}">
                                    {{ $item['type_label'] }}
                                </span>
                            </div>
                            <h3 class="pkl-item-title">{{ $item['title'] }}</h3>
                            <p class="pkl-item-company">{{ $item['company'] }}</p>
                            <div class="pkl-item-meta">
                                <span class="pkl-meta-tag">
                                    <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    {{ $item['location'] }}
                                </span>
                                <span class="pkl-meta-tag">
                                    <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    {{ $item['duration'] }}
                                </span>
                            </div>
                        </div>
                        <div class="pkl-item-footer">
                            <span class="pkl-item-quota">{{ $item['quota'] }}</span>
                            <div class="pkl-item-actions">
                                <button type="button" class="pkl-item-detail-btn" onclick="openPklDetailModal({{ $index }})" aria-label="Lihat detail lamaran {{ $item['title'] }}">
                                    <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <span>Lihat Detail</span>
                                </button>
                                <a href="{{ route('siswa.bkk') }}" class="pkl-item-btn" title="Ajukan Lamaran">
                                    <span>Ajukan Lamaran</span>
                                    <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- No results message --}}
            <div id="pklNoResults" class="pkl-no-results" style="display: none;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    <line x1="8" y1="8" x2="14" y2="14"></line>
                    <line x1="14" y1="8" x2="8" y2="14"></line>
                </svg>
                <h4>Tidak Ditemukan</h4>
                <p>Tidak ada lowongan yang cocok dengan kata kunci atau filter yang dipilih. Coba ubah pencarian Anda.</p>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════
         INTERACTIVE DETAIL MODAL POPUP
         ═══════════════════════════════════════════ --}}
    <div id="pklDetailModalOverlay" class="pkl-modal-overlay" role="dialog" aria-modal="true" tabindex="-1">
        <div class="pkl-modal-card">
            {{-- Modal Header --}}
            <div class="pkl-modal-header">
                <div class="pkl-modal-header-left">
                    <div class="pkl-modal-company-logo">
                        <img id="modalCompanyLogo" src="{{ asset('assets/logo.webp') }}" alt="Company Logo">
                    </div>
                    <div class="pkl-modal-title-area">
                        <div class="pkl-modal-badge-row">
                            <span id="modalTypeBadge" class="pkl-badge-type pkl">Lowongan PKL</span>
                            <span id="modalCompanyCategory" style="font-size: 11px; color: #64748B; font-weight: 500;">Mitra DUDI</span>
                        </div>
                        <h3 id="modalJobTitle" class="pkl-modal-title">Posisi Lowongan</h3>
                        <p id="modalCompanyName" class="pkl-modal-company-name">Nama Perusahaan Mitra</p>
                    </div>
                </div>
                <button type="button" class="pkl-modal-close-btn" onclick="closePklDetailModal()" aria-label="Tutup Dialog">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="pkl-modal-body">
                {{-- Quick Stats Badges Grid --}}
                <div class="pkl-modal-badges-grid">
                    <div class="pkl-modal-badge-item">
                        <span class="pkl-modal-badge-label">Lokasi / Kota</span>
                        <span class="pkl-modal-badge-value" id="modalLocation">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <span>Surabaya</span>
                        </span>
                    </div>
                    <div class="pkl-modal-badge-item">
                        <span class="pkl-modal-badge-label">Mode Kerja</span>
                        <span class="pkl-modal-badge-value" id="modalWorkMode">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                            <span>Hybrid</span>
                        </span>
                    </div>
                    <div class="pkl-modal-badge-item">
                        <span class="pkl-modal-badge-label">Durasi Program</span>
                        <span class="pkl-modal-badge-value" id="modalDuration">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <span>6 Bulan</span>
                        </span>
                    </div>
                    <div class="pkl-modal-badge-item">
                        <span class="pkl-modal-badge-label">Uang Saku / Gaji</span>
                        <span class="pkl-modal-badge-value" id="modalAllowance" style="color: #059669;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path><line x1="12" y1="6" x2="12" y2="8"></line><line x1="12" y1="16" x2="12" y2="18"></line></svg>
                            <span>Tersedia</span>
                        </span>
                    </div>
                </div>

                {{-- Deskripsi Ringkas --}}
                <div class="pkl-modal-section">
                    <h4 class="pkl-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        <span>Deskripsi &amp; Profil Program</span>
                    </h4>
                    <p class="pkl-modal-desc" id="modalDescription">Deskripsi lengkap lowongan...</p>
                </div>

                {{-- Tanggung Jawab / Jobdesk --}}
                <div class="pkl-modal-section">
                    <h4 class="pkl-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <span>Tugas &amp; Tanggung Jawab Kerja (Jobdesk)</span>
                    </h4>
                    <ul class="pkl-modal-list" id="modalJobdeskList">
                        <!-- Populated by JS -->
                    </ul>
                </div>

                {{-- Kualifikasi & Syarat --}}
                <div class="pkl-modal-section">
                    <h4 class="pkl-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><polyline points="16 11 18 13 22 9"></polyline></svg>
                        <span>Kualifikasi &amp; Persyaratan Siswa</span>
                    </h4>
                    <ul class="pkl-modal-list" id="modalRequirementsList">
                        <!-- Populated by JS -->
                    </ul>
                </div>

                {{-- Benefit & Fasilitas --}}
                <div class="pkl-modal-section">
                    <h4 class="pkl-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                        <span>Benefit &amp; Fasilitas yang Didapatkan</span>
                    </h4>
                    <ul class="pkl-modal-list" id="modalBenefitsList">
                        <!-- Populated by JS -->
                    </ul>
                </div>

                {{-- Alur Seleksi --}}
                <div class="pkl-modal-section">
                    <h4 class="pkl-modal-section-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                        <span>Alur &amp; Tahapan Seleksi</span>
                    </h4>
                    <div class="pkl-timeline-grid" id="modalTimelineGrid">
                        <!-- Populated by JS -->
                    </div>
                </div>
            </div>

            {{-- Modal Footer --}}
            <div class="pkl-modal-footer">
                <button type="button" class="pkl-modal-btn-close" onclick="closePklDetailModal()">Tutup</button>
                <a href="{{ route('siswa.bkk') }}" class="pkl-modal-btn-apply" id="modalApplyBtn">
                    <span>Ajukan Lamaran Sekarang</span>
                    <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    {{-- JSON Dataset for Opportunities --}}
    <script id="pklOpportunitiesJson" type="application/json">
        {!! json_encode($opportunities) !!}
    </script>

    {{-- Unified Landing Footer --}}
    <x-landing-footer />

    {{-- Unified Reusable Tanya Tefa AI Widget --}}
    <x-ai-widget subtitle="Pusat Bantuan PKL & BKK 24/7" />

    {{-- Scroll Reveal JS & Interactive Logic --}}
    <script>
    (function() {
        /* ─── Scroll Reveal ─── */
        function initPklReveal() {
            const revealElements = document.querySelectorAll('.reveal');
            if ('IntersectionObserver' in window && revealElements.length) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-revealed');
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.05, rootMargin: '0px 0px -20px 0px' });
                revealElements.forEach(el => {
                    if (!el.classList.contains('is-revealed')) {
                        observer.observe(el);
                    }
                });
            } else {
                revealElements.forEach(el => el.classList.add('is-revealed'));
            }
        }

        document.addEventListener('DOMContentLoaded', initPklReveal);
        window.addEventListener('pageshow', function() {
            document.body.style.overflow = '';
            initPklReveal();
        });

        setTimeout(function() {
            document.querySelectorAll('.reveal:not(.is-revealed)').forEach(el => el.classList.add('is-revealed'));
        }, 500);

        document.addEventListener('DOMContentLoaded', function() {

        /* ─── PKL Search & Filter Logic ─── */
        const searchInput   = document.getElementById('pklSearchInput');
        const selectLokasi  = document.getElementById('pklSelectLokasi');
        const selectProgram = document.getElementById('pklSelectProgram');
        const btnCari       = document.getElementById('pklBtnCari');
        const grid          = document.getElementById('pklGrid');
        const noResults     = document.getElementById('pklNoResults');

        function filterCards() {
            const query   = (searchInput?.value || '').toLowerCase().trim();
            const lokasi  = (selectLokasi?.value || '').toLowerCase();
            const program = (selectProgram?.value || '').toLowerCase();
            const cards   = grid?.querySelectorAll('.pkl-item-card') || [];
            let visibleCount = 0;

            cards.forEach(card => {
                const cardType     = card.dataset.type || '';
                const cardLocation = card.dataset.location || '';
                const cardTitle    = card.dataset.title || '';
                const cardCompany  = card.dataset.company || '';

                // Text search: match against title and company name
                const matchesQuery = !query || cardTitle.includes(query) || cardCompany.includes(query);

                // Location filter: match if cardLocation contains the selected value
                const matchesLokasi = !lokasi || cardLocation.includes(lokasi);

                // Program/type filter: exact match
                const matchesProgram = !program || cardType === program;

                const isVisible = matchesQuery && matchesLokasi && matchesProgram;
                card.style.display = isVisible ? '' : 'none';
                if (isVisible) visibleCount++;
            });

            // Show/hide no-results message
            if (noResults) {
                noResults.style.display = visibleCount === 0 ? 'flex' : 'none';
            }
        }

        // Trigger filter on button click
        btnCari?.addEventListener('click', filterCards);

        // Also filter on Enter key in search input
        searchInput?.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                filterCards();
            }
        });

        // Live-filter as user types (debounced 300ms)
        let debounceTimer;
        searchInput?.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(filterCards, 300);
        });

        // Filter immediately on dropdown change
        selectLokasi?.addEventListener('change', filterCards);
        selectProgram?.addEventListener('change', filterCards);

        /* ─── Opportunity Detail Modal Logic ─── */
        let opportunitiesData = [];
        try {
            const rawJson = document.getElementById('pklOpportunitiesJson')?.textContent;
            if (rawJson) {
                opportunitiesData = JSON.parse(rawJson);
            }
        } catch (e) {
            console.error('Failed to parse opportunities JSON:', e);
        }

        const modalOverlay = document.getElementById('pklDetailModalOverlay');

        window.openPklDetailModal = function(index) {
            const data = opportunitiesData[index];
            if (!data || !modalOverlay) return;

            // Header elements
            const logoImg = document.getElementById('modalCompanyLogo');
            if (logoImg) {
                logoImg.src = '{{ asset("assets") }}/' + data.logo;
                logoImg.alt = data.company;
            }

            const badgeType = document.getElementById('modalTypeBadge');
            if (badgeType) {
                badgeType.className = 'pkl-badge-type ' + data.type;
                badgeType.textContent = data.type_label;
            }

            const companyCat = document.getElementById('modalCompanyCategory');
            if (companyCat) companyCat.textContent = data.company_category || 'Mitra Industri';

            const jobTitle = document.getElementById('modalJobTitle');
            if (jobTitle) jobTitle.textContent = data.title;

            const compName = document.getElementById('modalCompanyName');
            if (compName) compName.textContent = data.company;

            // Badges
            const locEl = document.getElementById('modalLocation');
            if (locEl) locEl.querySelector('span').textContent = data.location;

            const modeEl = document.getElementById('modalWorkMode');
            if (modeEl) modeEl.querySelector('span').textContent = data.work_mode || 'Onsite';

            const durEl = document.getElementById('modalDuration');
            if (durEl) durEl.querySelector('span').textContent = data.duration;

            const allowEl = document.getElementById('modalAllowance');
            if (allowEl) allowEl.querySelector('span').textContent = data.allowance || 'Tersedia';

            // Description
            const descEl = document.getElementById('modalDescription');
            if (descEl) descEl.textContent = data.desc;

            // Jobdesk
            const jobdeskUl = document.getElementById('modalJobdeskList');
            if (jobdeskUl) {
                jobdeskUl.innerHTML = (data.jobdesk || []).map(item => `
                    <li class="pkl-modal-list-item">
                        <span class="pkl-modal-list-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </span>
                        <span>${item}</span>
                    </li>
                `).join('');
            }

            // Requirements
            const reqUl = document.getElementById('modalRequirementsList');
            if (reqUl) {
                reqUl.innerHTML = (data.requirements || []).map(item => `
                    <li class="pkl-modal-list-item">
                        <span class="pkl-modal-list-icon purple">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </span>
                        <span>${item}</span>
                    </li>
                `).join('');
            }

            // Benefits
            const benUl = document.getElementById('modalBenefitsList');
            if (benUl) {
                benUl.innerHTML = (data.benefits || []).map(item => `
                    <li class="pkl-modal-list-item">
                        <span class="pkl-modal-list-icon green">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </span>
                        <span>${item}</span>
                    </li>
                `).join('');
            }

            // Timeline
            const timeGrid = document.getElementById('modalTimelineGrid');
            if (timeGrid) {
                timeGrid.innerHTML = (data.timeline || []).map(t => `
                    <div class="pkl-timeline-item">
                        <span class="pkl-timeline-num">${t.num}</span>
                        <h5 class="pkl-timeline-title">${t.title}</h5>
                        <p class="pkl-timeline-desc">${t.desc}</p>
                    </div>
                `).join('');
            }

            modalOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        window.closePklDetailModal = function() {
            if (!modalOverlay) return;
            modalOverlay.classList.remove('active');
            document.body.style.overflow = '';
        };

        // Close on clicking backdrop
        modalOverlay?.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                closePklDetailModal();
            }
        });

        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modalOverlay?.classList.contains('active')) {
                closePklDetailModal();
            }
        });
    });
    })();
    </script>
</body>
</html>
