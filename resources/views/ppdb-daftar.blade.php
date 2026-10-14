@php
    \Carbon\Carbon::setLocale('id');
    $currentDateObj = \Carbon\Carbon::now();
    $currentYear = $currentDateObj->isoFormat('YYYY');
    $nextYear = (int)$currentYear + 1;
    $selectedJurusanQuery = strtolower(request()->query('jurusan', ''));
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="Formulir Pendaftaran Online Calon Siswa Baru SMK Antartika 1 Sidoarjo Tahun Ajaran {{ $currentYear }}/{{ $nextYear }}.">
    <title>Pendaftaran Online PPDB TP {{ $currentYear }}/{{ $nextYear }} — SMK Antartika 1 Sidoarjo</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ppdb.daftar.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="ppdb-daftar-body">

    {{-- Unified Landing Header --}}
    <x-landing-header :active="'ppdb'" />

    <main class="ppdb-daftar-container">

        <!-- ─── Hero Banner with image copy 4.png ─── -->
        <div class="reg-hero-banner">
            <!-- Left Info Area -->
            <div class="reg-hero-content">
                <div class="reg-hero-pill-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="reg-badge-icon">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c0 2 3 3 6 3s6-1 6-3v-5"/>
                    </svg>
                    <span>PPDB SMK Antartika 1 Sidoarjo</span>
                </div>

                <h1 class="reg-hero-title">
                    <span class="title-line">Formulir Pendaftaran</span>
                    <span class="title-line">Calon Siswa Baru</span>
                </h1>

                <p class="reg-hero-desc">
                    Isi data diri dengan lengkap dan benar. Setelah proses pendaftaran selesai, Anda akan menerima <strong>Nomor Registrasi Resmi</strong> dan <strong>Kartu Bukti Pendaftaran</strong> yang dapat diunduh langsung.
                </p>
            </div>

            <!-- Middle Floating Guarantee Card -->
            <div class="reg-hero-feature-card">
                <div class="feature-card-top">
                    <div class="feature-card-icon-wrap">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="feature-clipboard-icon">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            <path d="M9 14l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="feature-card-metric">
                        <span class="feature-metric-num">100%</span>
                        <span class="feature-metric-text">Proses Pendaftaran Online</span>
                    </div>
                </div>

                <div class="feature-pills-row">
                    <span class="feature-pill">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Mudah
                    </span>
                    <span class="feature-pill">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        Aman
                    </span>
                    <span class="feature-pill">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        Terpercaya
                    </span>
                </div>
            </div>

            <!-- Right Background Image (image copy 4.png) with Gradient Fade & Botanical Leaves -->
            <div class="reg-hero-image-wrap">
                <img src="{{ asset('assets/image copy 4.png') }}" alt="Gedung SMK Antartika 1 Sidoarjo" class="reg-hero-school-img">
                <div class="reg-hero-img-gradient"></div>
                <!-- Decorative Botanical Leaf Accent -->
                <svg class="reg-botanical-leaf" viewBox="0 0 140 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M130 115 C110 90, 85 75, 55 80 C70 60, 95 45, 125 40" stroke="#38bdf8" stroke-width="2.2" stroke-linecap="round" opacity="0.65"/>
                    <path d="M125 105 C100 100, 85 88, 80 75" stroke="#0284c7" stroke-width="1.8" stroke-linecap="round" opacity="0.6"/>
                    <path d="M138 118 C120 105, 105 92, 100 75 C110 65, 128 70, 142 80" fill="#38bdf8" fill-opacity="0.25"/>
                    <path d="M105 70 C90 55, 70 50, 55 55 C65 42, 85 38, 110 42" fill="#0284c7" fill-opacity="0.2"/>
                    <circle cx="132" cy="45" r="3.5" fill="#38bdf8" opacity="0.7"/>
                    <circle cx="110" cy="30" r="2.5" fill="#60a5fa" opacity="0.5"/>
                </svg>
            </div>
        </div>

        <!-- ─── Stepper Progress Bar (6 Steps) ─── -->
        <div class="reg-stepper-card">
            <div class="reg-stepper" id="regStepper">
                <div class="reg-step-item active" id="stepPill1" onclick="jumpToStep(1)">
                    <div class="reg-step-num">1</div>
                    <span class="reg-step-label">Akun &amp; NISN</span>
                </div>
                <div class="reg-step-divider" id="stepLine1"></div>

                <div class="reg-step-item" id="stepPill2" onclick="jumpToStep(2)">
                    <div class="reg-step-num">2</div>
                    <span class="reg-step-label">Biodata Siswa</span>
                </div>
                <div class="reg-step-divider" id="stepLine2"></div>

                <div class="reg-step-item" id="stepPill3" onclick="jumpToStep(3)">
                    <div class="reg-step-num">3</div>
                    <span class="reg-step-label">Orang Tua &amp; Alamat</span>
                </div>
                <div class="reg-step-divider" id="stepLine3"></div>

                <div class="reg-step-item" id="stepPill4" onclick="jumpToStep(4)">
                    <div class="reg-step-num">4</div>
                    <span class="reg-step-label">Jurusan &amp; Jalur</span>
                </div>
                <div class="reg-step-divider" id="stepLine4"></div>

                <div class="reg-step-item" id="stepPill5" onclick="jumpToStep(5)">
                    <div class="reg-step-num">5</div>
                    <span class="reg-step-label">Upload Berkas</span>
                </div>
                <div class="reg-step-divider" id="stepLine5"></div>

                <div class="reg-step-item" id="stepPill6" onclick="jumpToStep(6)">
                    <div class="reg-step-num">6</div>
                    <span class="reg-step-label">Review Data</span>
                </div>
            </div>
        </div>

        <!-- ─── Main Form Container ─── -->
        <div class="reg-main-card">
            <form id="ppdbRegistrationForm" onsubmit="event.preventDefault();">

                <!-- ═════════════════════════════════════════════
                     STEP 1: AKUN & NISN
                     ═════════════════════════════════════════════ -->
                <div class="form-step-pane active" id="formStep1">
                    <div class="step-pane-header-modern">
                        <div class="step-header-left">
                            <div class="step-header-avatar">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                            <div class="step-header-text">
                                <h2 class="step-pane-title-modern">Langkah 1: Akun &amp; Kontak Calon Siswa</h2>
                                <p class="step-pane-desc-modern">Masukkan NISN, Nama Lengkap, dan kontak WhatsApp aktif untuk memulai pendaftaran.</p>
                            </div>
                        </div>

                        <div class="step-info-card">
                            <div class="step-info-icon">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                            </div>
                            <div class="step-info-content">
                                <div class="step-info-title">Informasi Penting</div>
                                <div class="step-info-desc">Pastikan data yang Anda masukkan sesuai dengan dokumen resmi (Ijazah/SKHU atau Kartu Keluarga).</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid-modern">
                        <!-- Column 1, Row 1: NISN -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="reg_nisn">
                                <span class="label-icon-badge">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                        <line x1="2" y1="10" x2="22" y2="10"></line>
                                    </svg>
                                </span>
                                <span>NISN (Nomor Induk Siswa Nasional)</span>
                                <span class="req">*</span>
                            </label>
                            <div class="input-with-icon-wrap">
                                <span class="input-icon-left">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </span>
                                <input type="text" id="reg_nisn" class="form-control-modern" placeholder="Masukkan 10 digit NISN Anda" maxlength="10" inputmode="numeric" oninput="validateFieldNisn()" required autofocus>
                            </div>
                            <div class="form-help-modern is-invalid" id="help_nisn">
                                <svg class="help-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                <span id="help_text_nisn">NISN dapat dilihat pada kartu pelajar, rapor SMP, atau ijazah SD.</span>
                            </div>
                        </div>

                        <!-- Column 2, Row 1: Nama Lengkap -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="reg_nama">
                                <span class="label-icon-badge">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </span>
                                <span>Nama Lengkap Calon Siswa</span>
                                <span class="req">*</span>
                            </label>
                            <div class="input-with-icon-wrap">
                                <span class="input-icon-left">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </span>
                                <input type="text" id="reg_nama" class="form-control-modern" placeholder="Tulis nama lengkap sesuai ijazah" oninput="validateFieldNama()" required>
                            </div>
                            <div class="form-help-modern is-invalid" id="help_nama">
                                <svg class="help-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                <span id="help_text_nama">Tulis nama lengkap sesuai dokumen resmi ijazah SMP/MTs.</span>
                            </div>
                        </div>

                        <!-- Column 1, Row 2: WhatsApp -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="reg_wa">
                                <span class="label-icon-badge">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                    </svg>
                                </span>
                                <span>Nomor WhatsApp Aktif Siswa / Wali</span>
                                <span class="req">*</span>
                            </label>
                            <div class="input-phone-wrap" id="wrap_wa">
                                <div class="phone-prefix-badge">
                                    <span>+62</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </div>
                                <input type="tel" id="reg_wa" class="phone-control-modern" placeholder="Masukkan nomor WhatsApp aktif" inputmode="numeric" maxlength="14" oninput="validateFieldWa()" required>
                            </div>
                            <div class="form-help-modern is-invalid" id="help_wa">
                                <svg class="help-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                <span id="help_text_wa">Pastikan nomor aktif untuk menerima notifikasi.</span>
                            </div>
                        </div>

                        <!-- Column 2, Row 2: Email -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="reg_email">
                                <span class="label-icon-badge">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </span>
                                <span>Email Aktif (Opsional)</span>
                            </label>
                            <div class="input-with-icon-wrap">
                                <span class="input-icon-left">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </span>
                                <input type="email" id="reg_email" class="form-control-modern" placeholder="contoh: calon.siswa@gmail.com" oninput="validateFieldEmail()">
                            </div>
                            <div class="form-help-modern is-invalid" id="help_email">
                                <svg class="help-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                <span id="help_text_email">Bukti pendaftaran akan dikirim ke email ini (jika diisi).</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ═════════════════════════════════════════════
                     STEP 2: BIODATA DIRI
                     ═════════════════════════════════════════════ -->
                <div class="form-step-pane" id="formStep2">
                    <div class="step-pane-header-modern">
                        <div class="step-header-left">
                            <div class="step-header-avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <div class="step-header-text">
                                <h2 class="step-pane-title-modern">Langkah 2: Biodata Diri Calon Siswa</h2>
                                <p class="step-pane-desc-modern">Lengkapi informasi kelahiran, jenis kelamin, dan asal sekolah asalmu.</p>
                            </div>
                        </div>

                        <div class="step-info-card">
                            <div class="step-info-icon">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                            </div>
                            <div class="step-info-content">
                                <div class="step-info-title">Informasi Penting</div>
                                <div class="step-info-desc">Pastikan tempat dan tanggal lahir sama persis dengan yang tertera di Akta Kelahiran.</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin <span class="req">*</span></label>
                            <div class="radio-cards-group">
                                <label class="radio-card active">
                                    <input type="radio" name="reg_jk" value="Laki-laki" checked>
                                    <span>Laki-laki</span>
                                </label>
                                <label class="radio-card">
                                    <input type="radio" name="reg_jk" value="Perempuan">
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="reg_asal_sekolah">Asal Sekolah (SMP / MTs) <span class="req">*</span></label>
                            <input type="text" id="reg_asal_sekolah" class="form-control" placeholder="Contoh: SMP Negeri 1 Sidoarjo" required>
                        </div>
                    </div>

                    <div class="form-grid-3">
                        <div class="form-group">
                            <label class="form-label" for="reg_tempat_lahir">Tempat Lahir <span class="req">*</span></label>
                            <input type="text" id="reg_tempat_lahir" class="form-control" placeholder="Contoh: Sidoarjo" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="reg_tanggal_lahir">Tanggal Lahir <span class="req">*</span></label>
                            <input type="date" id="reg_tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="reg_agama">Agama <span class="req">*</span></label>
                            <select id="reg_agama" class="form-control" required>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- ═════════════════════════════════════════════
                     STEP 3: ORANG TUA & ALAMAT
                     ═════════════════════════════════════════════ -->
                <div class="form-step-pane" id="formStep3">
                    <div class="step-pane-header-modern">
                        <div class="step-header-left">
                            <div class="step-header-avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </div>
                            <div class="step-header-text">
                                <h2 class="step-pane-title-modern">Langkah 3: Data Orang Tua / Wali &amp; Alamat</h2>
                                <p class="step-pane-desc-modern">Informasi orang tua atau wali serta alamat domisili calon siswa.</p>
                            </div>
                        </div>

                        <div class="step-info-card">
                            <div class="step-info-icon">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                            </div>
                            <div class="step-info-content">
                                <div class="step-info-title">Informasi Penting</div>
                                <div class="step-info-desc">Nomor kontak orang tua atau wali akan digunakan untuk konfirmasi darurat.</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="reg_nama_ortu">Nama Lengkap Orang Tua / Wali <span class="req">*</span></label>
                            <input type="text" id="reg_nama_ortu" class="form-control" placeholder="Nama Ayah / Ibu / Wali" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="reg_pekerjaan_ortu">Pekerjaan Orang Tua / Wali <span class="req">*</span></label>
                            <input type="text" id="reg_pekerjaan_ortu" class="form-control" placeholder="Contoh: Wiraswasta, Karyawan Swasta, ASN" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="reg_alamat">Alamat Lengkap Domisili <span class="req">*</span></label>
                        <textarea id="reg_alamat" class="form-control" placeholder="Jalan, RT/RW, Dusun, Kelurahan/Desa, Kecamatan, Kabupaten/Kota" required></textarea>
                    </div>
                </div>

                <!-- ═════════════════════════════════════════════
                     STEP 4: JURUSAN & JALUR
                     ═════════════════════════════════════════════ -->
                <div class="form-step-pane" id="formStep4">
                    <div class="step-pane-header-modern">
                        <div class="step-header-left">
                            <div class="step-header-avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                            </div>
                            <div class="step-header-text">
                                <h2 class="step-pane-title-modern">Langkah 4: Pilihan Program Keahlian &amp; Jalur</h2>
                                <p class="step-pane-desc-modern">Pilih program keahlian utama yang kamu minati serta jalur gelombang pendaftaran.</p>
                            </div>
                        </div>

                        <div class="step-info-card">
                            <div class="step-info-icon">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                            </div>
                            <div class="step-info-content">
                                <div class="step-info-title">Informasi Penting</div>
                                <div class="step-info-desc">Pilihan jurusan 1 merupakan prioritas utama. Jurusan alternatif untuk cadangan kuota.</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pilih Jurusan Utama (Pilihan 1) <span class="req">*</span></label>
                        <div class="jurusan-select-grid" id="jurusanChoiceGrid">
                            
                            <!-- RPL -->
                            <div class="jurusan-choice-card {{ in_array($selectedJurusanQuery, ['rpl', 'rekayasa perangkat lunak']) ? 'selected' : '' }}" onclick="selectJurusan('rpl', 'Rekayasa Perangkat Lunak (RPL)')">
                                @if(in_array($selectedJurusanQuery, ['rpl', 'rekayasa perangkat lunak']))
                                    <span class="quiz-matched-tag">⭐ Rekomendasi Kuis</span>
                                @endif
                                <div class="jurusan-card-top">
                                    <div class="jurusan-card-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="16 18 22 12 16 6"></polyline>
                                            <polyline points="8 6 2 12 8 18"></polyline>
                                        </svg>
                                    </div>
                                    <div class="jurusan-check-dot">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="jurusan-code-badge">RPL</div>
                                    <div class="jurusan-name-desc">Rekayasa Perangkat Lunak &bull; Coding, AI &amp; Web</div>
                                </div>
                            </div>

                            <!-- TKR -->
                            <div class="jurusan-choice-card {{ in_array($selectedJurusanQuery, ['tkr', 'teknik kendaraan ringan']) ? 'selected' : '' }}" onclick="selectJurusan('tkr', 'Teknik Kendaraan Ringan (TKR)')">
                                @if(in_array($selectedJurusanQuery, ['tkr', 'teknik kendaraan ringan']))
                                    <span class="quiz-matched-tag">⭐ Rekomendasi Kuis</span>
                                @endif
                                <div class="jurusan-card-top">
                                    <div class="jurusan-card-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                                            <circle cx="7" cy="17" r="2"></circle>
                                            <circle cx="17" cy="17" r="2"></circle>
                                        </svg>
                                    </div>
                                    <div class="jurusan-check-dot">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="jurusan-code-badge">TKR</div>
                                    <div class="jurusan-name-desc">Teknik Kendaraan Ringan &bull; Otomotif &amp; EV</div>
                                </div>
                            </div>

                            <!-- TEI -->
                            <div class="jurusan-choice-card {{ in_array($selectedJurusanQuery, ['tei', 'teknik elektronika industri']) ? 'selected' : '' }}" onclick="selectJurusan('tei', 'Teknik Elektronika Industri (TEI)')">
                                @if(in_array($selectedJurusanQuery, ['tei', 'teknik elektronika industri']))
                                    <span class="quiz-matched-tag">⭐ Rekomendasi Kuis</span>
                                @endif
                                <div class="jurusan-card-top">
                                    <div class="jurusan-card-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                            <rect x="9" y="9" width="6" height="6"></rect>
                                            <line x1="9" y1="1" x2="9" y2="4"></line>
                                            <line x1="15" y1="1" x2="15" y2="4"></line>
                                        </svg>
                                    </div>
                                    <div class="jurusan-check-dot">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="jurusan-code-badge">TEI</div>
                                    <div class="jurusan-name-desc">Teknik Elektronika Industri &bull; IoT &amp; Robotika</div>
                                </div>
                            </div>

                            <!-- TITL -->
                            <div class="jurusan-choice-card {{ in_array($selectedJurusanQuery, ['titl', 'teknik instalasi tenaga listrik']) ? 'selected' : '' }}" onclick="selectJurusan('titl', 'Teknik Instalasi Tenaga Listrik (TITL)')">
                                @if(in_array($selectedJurusanQuery, ['titl', 'teknik instalasi tenaga listrik']))
                                    <span class="quiz-matched-tag">⭐ Rekomendasi Kuis</span>
                                @endif
                                <div class="jurusan-card-top">
                                    <div class="jurusan-card-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                        </svg>
                                    </div>
                                    <div class="jurusan-check-dot">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="jurusan-code-badge">TITL</div>
                                    <div class="jurusan-name-desc">Instalasi Tenaga Listrik &bull; Smart Grid &amp; PLC</div>
                                </div>
                            </div>

                            <!-- TPM -->
                            <div class="jurusan-choice-card {{ in_array($selectedJurusanQuery, ['tpm', 'teknik pemesinan']) ? 'selected' : '' }}" onclick="selectJurusan('tpm', 'Teknik Pemesinan (TPM)')">
                                @if(in_array($selectedJurusanQuery, ['tpm', 'teknik pemesinan']))
                                    <span class="quiz-matched-tag">⭐ Rekomendasi Kuis</span>
                                @endif
                                <div class="jurusan-card-top">
                                    <div class="jurusan-card-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                        </svg>
                                    </div>
                                    <div class="jurusan-check-dot">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="jurusan-code-badge">TPM</div>
                                    <div class="jurusan-name-desc">Teknik Pemesinan &bull; CNC &amp; CAD/CAM Presisi</div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" id="reg_jurusan_1" value="{{ $selectedJurusanQuery ?: 'Rekayasa Perangkat Lunak (RPL)' }}">
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label" for="reg_jurusan_2">Jurusan Alternatif (Pilihan 2) <span class="req">*</span></label>
                            <select id="reg_jurusan_2" class="form-control" required>
                                <option value="Teknik Kendaraan Ringan (TKR)">Teknik Kendaraan Ringan (TKR)</option>
                                <option value="Rekayasa Perangkat Lunak (RPL)">Rekayasa Perangkat Lunak (RPL)</option>
                                <option value="Teknik Pemesinan (TPM)">Teknik Pemesinan (TPM)</option>
                                <option value="Teknik Instalasi Tenaga Listrik (TITL)">Teknik Instalasi Tenaga Listrik (TITL)</option>
                                <option value="Teknik Elektronika Industri (TEI)">Teknik Elektronika Industri (TEI)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jalur Pendaftaran <span class="req">*</span></label>
                            <div class="gelombang-cards-grid">
                                <label class="gelombang-card active">
                                    <div class="gelombang-header">
                                        <span class="gelombang-title">Gelombang 1 (Reguler)</span>
                                        <span class="gelombang-badge-promo">Diskon SPP</span>
                                    </div>
                                    <input type="radio" name="reg_gelombang" value="Gelombang 1" checked style="display:none;">
                                    <p class="gelombang-desc">Potongan biaya daftar ulang &amp; bebas tes akademik.</p>
                                </label>
                                <label class="gelombang-card">
                                    <div class="gelombang-header">
                                        <span class="gelombang-title">Jalur Prestasi</span>
                                        <span class="gelombang-badge-promo">Beasiswa</span>
                                    </div>
                                    <input type="radio" name="reg_gelombang" value="Jalur Prestasi" style="display:none;">
                                    <p class="gelombang-desc">Sertifikat Akademik / Olahraga / Seni tingkat Kota/Provinsi.</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ═════════════════════════════════════════════
                     STEP 5: UPLOAD BERKAS
                     ═════════════════════════════════════════════ -->
                <div class="form-step-pane" id="formStep5">
                    <div class="step-pane-header-modern">
                        <div class="step-header-left">
                            <div class="step-header-avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                            </div>
                            <div class="step-header-text">
                                <h2 class="step-pane-title-modern">Langkah 5: Upload Kelengkapan Berkas</h2>
                                <p class="step-pane-desc-modern">Unggah foto atau scan dokumen persyaratan. Format: JPG, PNG, atau PDF (Maks. 5MB).</p>
                            </div>
                        </div>

                        <div class="step-info-card">
                            <div class="step-info-icon">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                            </div>
                            <div class="step-info-content">
                                <div class="step-info-title">Informasi Penting</div>
                                <div class="step-info-desc">Pastikan foto atau scan tidak buram dan tulisan terbaca dengan jelas.</div>
                            </div>
                        </div>
                    </div>

                    <div class="dropzones-grid">
                        <!-- Dropzone 1: Kartu Keluarga -->
                        <div class="dropzone-item" id="dropzone_kk" onclick="document.getElementById('file_kk').click()">
                            <div class="dropzone-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <div class="dropzone-title">Scan / Foto Kartu Keluarga (KK)</div>
                            <div class="dropzone-sub">Wajib untuk verifikasi NIK</div>
                            <span class="dropzone-file-name" id="label_kk">Pilih Berkas KK</span>
                            <input type="file" id="file_kk" style="display:none;" accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileSelected(this, 'label_kk', 'dropzone_kk')">
                        </div>

                        <!-- Dropzone 2: Rapor / Ijazah -->
                        <div class="dropzone-item" id="dropzone_rapor" onclick="document.getElementById('file_rapor').click()">
                            <div class="dropzone-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                            </div>
                            <div class="dropzone-title">Scan Rapor SMP / SKL</div>
                            <div class="dropzone-sub">Halaman nilai semester terakhir</div>
                            <span class="dropzone-file-name" id="label_rapor">Pilih Berkas Rapor</span>
                            <input type="file" id="file_rapor" style="display:none;" accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileSelected(this, 'label_rapor', 'dropzone_rapor')">
                        </div>

                        <!-- Dropzone 3: Pas Foto Siswa -->
                        <div class="dropzone-item" id="dropzone_foto" onclick="document.getElementById('file_foto').click()">
                            <div class="dropzone-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </div>
                            <div class="dropzone-title">Pas Foto Berwarna 3x4</div>
                            <div class="dropzone-sub">Background merah/biru, rapi</div>
                            <span class="dropzone-file-name" id="label_foto">Pilih Pas Foto</span>
                            <input type="file" id="file_foto" style="display:none;" accept=".jpg,.jpeg,.png" onchange="handleFileSelected(this, 'label_foto', 'dropzone_foto')">
                        </div>
                    </div>
                </div>

                <!-- ═════════════════════════════════════════════
                     STEP 6: REVIEW & KONFIRMASI
                     ═════════════════════════════════════════════ -->
                <div class="form-step-pane" id="formStep6">
                    <div class="step-pane-header-modern">
                        <div class="step-header-left">
                            <div class="step-header-avatar">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                            </div>
                            <div class="step-header-text">
                                <h2 class="step-pane-title-modern">Langkah 6: Review &amp; Konfirmasi Pendaftaran</h2>
                                <p class="step-pane-desc-modern">Pastikan seluruh data yang diisi telah sesuai sebelum melakukan kirim pendaftaran.</p>
                            </div>
                        </div>

                        <div class="step-info-card">
                            <div class="step-info-icon">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                                </svg>
                            </div>
                            <div class="step-info-content">
                                <div class="step-info-title">Informasi Penting</div>
                                <div class="step-info-desc">Setelah dikirim, data akan masuk antrean verifikasi panitia PPDB resmi.</div>
                            </div>
                        </div>
                    </div>

                    <div class="review-box" id="reviewSummaryContent">
                        <!-- Filled dynamically by JavaScript -->
                    </div>

                    <div class="agreement-box">
                        <input type="checkbox" id="reg_agreement" required>
                        <label for="reg_agreement" class="agreement-text">
                            Saya menyatakan bahwa data yang diisikan di atas adalah benar dan dapat dipertanggungjawabkan. Saya siap mengikuti seluruh tahapan seleksi dan ketentuan PPDB SMK Antartika 1 Sidoarjo.
                        </label>
                    </div>
                </div>

                <!-- ═════════════════════════════════════════════
                     STEP 7: BUKTI PENDAFTARAN RESMI
                     ═════════════════════════════════════════════ -->
                <div class="form-step-pane" id="formStep7">
                    <div class="receipt-wrapper">
                        <div class="receipt-card">
                            <div class="receipt-watermark">TERDAFTAR</div>
                            
                            <!-- Header -->
                            <div class="receipt-header">
                                <div class="receipt-school-info">
                                    <img src="{{ asset('assets/logo.webp') }}" alt="Logo SMK Antartika 1 Sidoarjo" class="receipt-logo">
                                    <div>
                                        <h3 class="receipt-school-name">SMK ANTARTIKA 1 SIDOARJO</h3>
                                        <p class="receipt-school-sub">SMK Pusat Keunggulan &bull; Terakreditasi A BAN-SM</p>
                                    </div>
                                </div>
                                <div class="receipt-status-badge">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span>BERHASIL TERDAFTAR</span>
                                </div>
                            </div>

                            <!-- Code Box -->
                            <div class="receipt-code-hero">
                                <div class="receipt-code-label">Nomor Registrasi PPDB Online</div>
                                <div class="receipt-code-val" id="receipt_reg_num">PPDB-2026-88241</div>
                            </div>

                            <!-- Table Details -->
                            <div class="receipt-details-table">
                                <div class="receipt-tr">
                                    <span class="receipt-td-key">Waktu Pendaftaran</span>
                                    <span class="receipt-td-val" id="receipt_tgl">-</span>
                                </div>
                                <div class="receipt-tr">
                                    <span class="receipt-td-key">NISN</span>
                                    <span class="receipt-td-val" id="receipt_nisn">-</span>
                                </div>
                                <div class="receipt-tr">
                                    <span class="receipt-td-key">Nama Lengkap Siswa</span>
                                    <span class="receipt-td-val" id="receipt_nama">-</span>
                                </div>
                                <div class="receipt-tr">
                                    <span class="receipt-td-key">Asal Sekolah SMP/MTs</span>
                                    <span class="receipt-td-val" id="receipt_sekolah">-</span>
                                </div>
                                <div class="receipt-tr">
                                    <span class="receipt-td-key">Jurusan Pilihan 1</span>
                                    <span class="receipt-td-val" id="receipt_jurusan" style="color: #004AC6;">-</span>
                                </div>
                                <div class="receipt-tr">
                                    <span class="receipt-td-key">Nomor WhatsApp</span>
                                    <span class="receipt-td-val" id="receipt_wa">-</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="receipt-actions">
                                <button type="button" class="btn-reg-next" onclick="window.print()" style="background:#0F172A;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                    <span>Cetak Kartu Registrasi</span>
                                </button>

                                <a id="receipt_btn_wa" href="#" target="_blank" class="btn-reg-next" style="background:#25D366; text-decoration:none;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                    </svg>
                                    <span>Konfirmasi Panitia via WA</span>
                                </a>

                                <a href="{{ route('ppdb') }}" class="btn-reg-prev" style="text-decoration:none;">
                                    <span>Selesai &amp; Kembali</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ─── Bottom Navigation Buttons ─── -->
                <div class="step-actions-bar-modern" id="stepActionsBar">
                    <button type="button" class="btn-reg-prev-modern" id="btnPrev" onclick="handlePrevClick()">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        <span id="btnPrevLabel">Kembali ke Beranda</span>
                    </button>

                    <div class="step-actions-right">
                        <button type="button" class="btn-reg-next-modern" id="btnNext" onclick="navigateStep(1)">
                            <span id="btnNextLabel">Selanjutnya</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>

                        <button type="button" class="btn-reg-submit-modern" id="btnSubmit" onclick="submitFinalRegistration()" style="display:none;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Kirim Pendaftaran Resmi</span>
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </main>

    <!-- Unified Landing Footer Component -->
    <x-landing-footer />

    <!-- JavaScript Controller for Multi-Step Form -->
    <script>
        let currentStep = 1;
        const totalSteps = 7;
        const uploadedFiles = {};

        function handlePrevClick() {
            if (currentStep === 1) {
                window.location.href = "{{ route('home') }}";
            } else {
                navigateStep(-1);
            }
        }

        function updateStepperUI() {
            for (let i = 1; i <= 6; i++) {
                const pill = document.getElementById('stepPill' + i);
                const line = document.getElementById('stepLine' + i);
                
                if (pill) {
                    pill.classList.remove('active', 'completed');
                    if (i === currentStep) pill.classList.add('active');
                    else if (i < currentStep) pill.classList.add('completed');
                }

                if (line) {
                    if (i < currentStep) line.classList.add('filled');
                    else line.classList.remove('filled');
                }
            }

            // Smooth auto-scroll active stepper chip into center view on mobile
            const activePill = document.getElementById('stepPill' + currentStep);
            if (activePill) {
                activePill.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }

            // Show/Hide Panes
            for (let i = 1; i <= totalSteps; i++) {
                const pane = document.getElementById('formStep' + i);
                if (pane) {
                    pane.classList.toggle('active', i === currentStep);
                }
            }

            // Buttons visibility & labels
            const btnPrev = document.getElementById('btnPrev');
            const btnPrevLabel = document.getElementById('btnPrevLabel');
            const btnNext = document.getElementById('btnNext');
            const btnNextLabel = document.getElementById('btnNextLabel');
            const btnSubmit = document.getElementById('btnSubmit');
            const actionsBar = document.getElementById('stepActionsBar');

            if (currentStep === 7) {
                if (actionsBar) actionsBar.style.display = 'none';
                return;
            }

            if (actionsBar) actionsBar.style.display = 'flex';
            if (btnPrev) {
                btnPrev.style.display = 'inline-flex';
                if (btnPrevLabel) {
                    btnPrevLabel.textContent = (currentStep === 1) ? 'Kembali ke Beranda' : 'Sebelumnya';
                }
            }
            if (btnNext) {
                btnNext.style.display = (currentStep < 6) ? 'inline-flex' : 'none';
            }
            if (btnSubmit) {
                btnSubmit.style.display = (currentStep === 6) ? 'inline-flex' : 'none';
            }

            window.scrollTo({ top: 120, behavior: 'smooth' });
        }

        function validateStep(step) {
            if (step === 1) {
                const nisn = document.getElementById('reg_nisn');
                const nama = document.getElementById('reg_nama');
                const wa = document.getElementById('reg_wa');

                if (!nisn.value.trim() || nisn.value.length < 8) {
                    alert('Silakan masukkan NISN yang valid (minimal 8-10 digit angka).');
                    nisn.focus();
                    return false;
                }
                if (!nama.value.trim()) {
                    alert('Silakan masukkan nama lengkap calon siswa.');
                    nama.focus();
                    return false;
                }
                if (!wa.value.trim() || wa.value.length < 8) {
                    alert('Silakan masukkan nomor WhatsApp aktif yang valid.');
                    wa.focus();
                    return false;
                }
            } else if (step === 2) {
                const sekolah = document.getElementById('reg_asal_sekolah');
                const tgl = document.getElementById('reg_tanggal_lahir');
                const tmp = document.getElementById('reg_tempat_lahir');

                if (!sekolah.value.trim()) {
                    alert('Silakan isi asal sekolah SMP/MTs.');
                    sekolah.focus();
                    return false;
                }
                if (!tmp.value.trim() || !tgl.value) {
                    alert('Silakan lengkapi tempat dan tanggal lahir.');
                    return false;
                }
            } else if (step === 3) {
                const ortu = document.getElementById('reg_nama_ortu');
                const alamat = document.getElementById('reg_alamat');
                if (!ortu.value.trim()) {
                    alert('Silakan isi nama orang tua / wali.');
                    ortu.focus();
                    return false;
                }
                if (!alamat.value.trim()) {
                    alert('Silakan isi alamat lengkap domisili.');
                    alamat.focus();
                    return false;
                }
            } else if (step === 6) {
                const agree = document.getElementById('reg_agreement');
                if (!agree.checked) {
                    alert('Harap centang persetujuan kebenaran data untuk mengirim pendaftaran.');
                    agree.focus();
                    return false;
                }
            }
            return true;
        }

        function navigateStep(delta) {
            if (delta > 0 && !validateStep(currentStep)) return;

            const next = currentStep + delta;
            if (next >= 1 && next <= 6) {
                currentStep = next;
                if (currentStep === 6) renderReviewSummary();
                updateStepperUI();
            }
        }

        function jumpToStep(step) {
            if (step < currentStep) {
                currentStep = step;
                updateStepperUI();
            } else if (step > currentStep) {
                if (validateStep(currentStep)) {
                    currentStep = step;
                    if (currentStep === 6) renderReviewSummary();
                    updateStepperUI();
                }
            }
        }

        function selectJurusan(code, fullName) {
            document.querySelectorAll('.jurusan-choice-card').forEach(card => card.classList.remove('selected'));
            event.currentTarget.classList.add('selected');
            document.getElementById('reg_jurusan_1').value = fullName;
        }

        function handleFileSelected(input, labelId, dropzoneId) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                document.getElementById(labelId).innerText = '✓ ' + file.name;
                document.getElementById(dropzoneId).classList.add('has-file');
                uploadedFiles[labelId] = file.name;
            }
        }

        function renderReviewSummary() {
            const nisn = document.getElementById('reg_nisn')?.value || '-';
            const nama = document.getElementById('reg_nama')?.value || '-';
            const wa = '+62 ' + (document.getElementById('reg_wa')?.value || '-');
            const jk = document.querySelector('input[name="reg_jk"]:checked')?.value || 'Laki-laki';
            const asalSekolah = document.getElementById('reg_asal_sekolah')?.value || '-';
            const ttl = (document.getElementById('reg_tempat_lahir')?.value || '-') + ', ' + (document.getElementById('reg_tanggal_lahir')?.value || '-');
            const alamat = document.getElementById('reg_alamat')?.value || '-';
            const namaOrtu = document.getElementById('reg_nama_ortu')?.value || '-';
            const jurusan1 = document.getElementById('reg_jurusan_1')?.value || 'Rekayasa Perangkat Lunak';
            const jurusan2 = document.getElementById('reg_jurusan_2')?.value || '-';
            const gelombang = document.querySelector('input[name="reg_gelombang"]:checked')?.value || 'Gelombang 1';

            const container = document.getElementById('reviewSummaryContent');
            if (!container) return;

            container.innerHTML = `
                <div class="review-section">
                    <div class="review-sec-title">1. Identitas Calon Siswa</div>
                    <div class="review-grid">
                        <div class="review-row"><span class="review-key">NISN</span><span class="review-val">${nisn}</span></div>
                        <div class="review-row"><span class="review-key">Nama Lengkap</span><span class="review-val">${nama}</span></div>
                        <div class="review-row"><span class="review-key">Jenis Kelamin</span><span class="review-val">${jk}</span></div>
                        <div class="review-row"><span class="review-key">Tempat, Tanggal Lahir</span><span class="review-val">${ttl}</span></div>
                        <div class="review-row"><span class="review-key">Nomor WhatsApp</span><span class="review-val">${wa}</span></div>
                        <div class="review-row"><span class="review-key">Asal Sekolah</span><span class="review-val">${asalSekolah}</span></div>
                    </div>
                </div>

                <div class="review-section">
                    <div class="review-sec-title">2. Orang Tua &amp; Domisili</div>
                    <div class="review-grid">
                        <div class="review-row"><span class="review-key">Nama Orang Tua / Wali</span><span class="review-val">${namaOrtu}</span></div>
                        <div class="review-row"><span class="review-key">Alamat Lengkap</span><span class="review-val">${alamat}</span></div>
                    </div>
                </div>

                <div class="review-section">
                    <div class="review-sec-title">3. Pilihan Program Keahlian</div>
                    <div class="review-grid">
                        <div class="review-row"><span class="review-key">Jurusan Pilihan 1</span><span class="review-val" style="color:#004AC6;">${jurusan1}</span></div>
                        <div class="review-row"><span class="review-key">Jurusan Alternatif</span><span class="review-val">${jurusan2}</span></div>
                        <div class="review-row"><span class="review-key">Jalur Pendaftaran</span><span class="review-val">${gelombang}</span></div>
                    </div>
                </div>
            `;
        }

        function submitFinalRegistration() {
            if (!validateStep(6)) return;

            const randomCode = Math.floor(10000 + Math.random() * 90000);
            const regNumber = `PPDB-2026-${randomCode}`;
            const now = new Date();
            const dateStr = now.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' }) + ' WIB';

            const nama = document.getElementById('reg_nama')?.value || 'Calon Siswa';
            const nisn = document.getElementById('reg_nisn')?.value || '-';
            const sekolah = document.getElementById('reg_asal_sekolah')?.value || '-';
            const wa = '+62 ' + (document.getElementById('reg_wa')?.value || '-');
            const jurusan = document.getElementById('reg_jurusan_1')?.value || 'Rekayasa Perangkat Lunak';

            document.getElementById('receipt_reg_num').innerText = regNumber;
            document.getElementById('receipt_tgl').innerText = dateStr;
            document.getElementById('receipt_nisn').innerText = nisn;
            document.getElementById('receipt_nama').innerText = nama;
            document.getElementById('receipt_sekolah').innerText = sekolah;
            document.getElementById('receipt_wa').innerText = wa;
            document.getElementById('receipt_jurusan').innerText = jurusan;

            // Update WhatsApp link
            const waMessage = encodeURIComponent(`Halo Panitia PPDB SMK Antartika 1 Sidoarjo, saya telah mengisi formulir pendaftaran online:\n\n*No. Registrasi:* ${regNumber}\n*Nama:* ${nama}\n*NISN:* ${nisn}\n*Jurusan Pilihan:* ${jurusan}\n\nMohon konfirmasi langkah verifikasi berkas selanjutnya. Terima kasih.`);
            document.getElementById('receipt_btn_wa').href = `https://wa.me/6281234567890?text=${waMessage}`;

            currentStep = 7;
            updateStepperUI();
        }

        // Auto select first major card if none selected
        window.addEventListener('DOMContentLoaded', () => {
            const hasSelected = document.querySelector('.jurusan-choice-card.selected');
            if (!hasSelected) {
                const first = document.querySelector('.jurusan-choice-card');
                if (first) first.classList.add('selected');
            }
        });

        /* ─── Live Validation Helpers ─── */
        const SVG_CHECK = `<svg class="help-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>`;
        const SVG_X     = `<svg class="help-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>`;

        function _setFieldState(inputEl, helpEl, isValid, validMsg, invalidMsg) {
            const helpSpan = helpEl.querySelector('span');

            // Update input border color
            inputEl.classList.toggle('is-valid',   isValid);
            inputEl.classList.toggle('is-invalid', !isValid);

            // Update help row state
            helpEl.classList.toggle('is-valid',   isValid);
            helpEl.classList.toggle('is-invalid', !isValid);

            // Swap icon
            const existingIcon = helpEl.querySelector('.help-icon-svg');
            if (existingIcon) existingIcon.remove();
            helpEl.insertAdjacentHTML('afterbegin', isValid ? SVG_CHECK : SVG_X);

            // Swap message
            if (helpSpan) helpSpan.textContent = isValid ? validMsg : invalidMsg;
        }

        function validateFieldNisn() {
            const input = document.getElementById('reg_nisn');
            const help  = document.getElementById('help_nisn');
            if (!input || !help) return;

            // Strip non-digits
            input.value = input.value.replace(/\D/g, '');
            const val = input.value.trim();
            const isValid = val.length >= 10;

            _setFieldState(
                input, help, isValid,
                'NISN valid — 10 digit terdeteksi.',
                val.length === 0
                    ? 'NISN wajib diisi. Lihat di kartu pelajar, rapor, atau ijazah.'
                    : `NISN harus 10 digit angka (saat ini ${val.length} digit).`
            );
        }

        function validateFieldNama() {
            const input = document.getElementById('reg_nama');
            const help  = document.getElementById('help_nama');
            if (!input || !help) return;

            const val = input.value.trim();
            const isValid = val.length >= 3;

            _setFieldState(
                input, help, isValid,
                'Nama lengkap terisi dengan benar.',
                val.length === 0
                    ? 'Nama lengkap wajib diisi sesuai dokumen resmi.'
                    : 'Nama terlalu pendek. Masukkan nama lengkap minimal 3 karakter.'
            );
        }

        function validateFieldWa() {
            const input = document.getElementById('reg_wa');
            const help  = document.getElementById('help_wa');
            const wrap  = document.getElementById('wrap_wa');
            if (!input || !help) return;

            // Strip non-digits
            input.value = input.value.replace(/\D/g, '');
            const val = input.value.trim();
            const isValid = val.length >= 8 && val.length <= 14;

            // Also apply to wrap element for border color
            if (wrap) {
                wrap.classList.toggle('is-valid',   isValid);
                wrap.classList.toggle('is-invalid', !isValid);
            }

            _setFieldState(
                input, help, isValid,
                'Nomor WhatsApp valid dan aktif.',
                val.length === 0
                    ? 'Nomor WhatsApp wajib diisi untuk notifikasi pendaftaran.'
                    : 'Masukkan nomor WA yang valid (8–14 digit, tanpa awalan 0 atau +62).'
            );
        }

        function validateFieldEmail() {
            const input = document.getElementById('reg_email');
            const help  = document.getElementById('help_email');
            if (!input || !help) return;

            const val = input.value.trim();

            // Email is optional — if empty, show neutral (valid state, no error)
            if (val.length === 0) {
                input.classList.remove('is-valid', 'is-invalid');
                help.classList.remove('is-valid', 'is-invalid');
                const existingIcon = help.querySelector('.help-icon-svg');
                if (existingIcon) existingIcon.remove();
                help.insertAdjacentHTML('afterbegin', SVG_CHECK);
                const helpSpan = help.querySelector('span');
                if (helpSpan) helpSpan.textContent = 'Bukti pendaftaran akan dikirim ke email ini (jika diisi).';
                help.classList.add('is-valid');
                input.classList.add('is-valid');
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const isValid = emailRegex.test(val);

            _setFieldState(
                input, help, isValid,
                'Alamat email terlihat valid.',
                'Format email tidak valid. Contoh: nama@domain.com'
            );
        }
    </script>
</body>
</html>
