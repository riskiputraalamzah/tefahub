<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <meta name="description" content="TEFA AI Career Discovery SMK Antartika 1 Sidoarjo — Temukan jurusan vokasi yang paling sesuai dengan minat, potensi, dan impian kariermu dalam 60 detik.">
    <title>TEFA AI Career Discovery — SMK Antartika 1 Sidoarjo</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/logo.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kuis.jurusan.css') }}?v={{ config('app.asset_version', '1.0') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="quiz-body">

    {{-- Canvas for Confetti particle explosion --}}
    <canvas id="quizConfettiCanvas"></canvas>

    {{-- Unified Landing Header --}}
    <x-landing-header :active="'ppdb'" />

    <main class="quiz-wrapper">

        <!-- Top Navigation -->
        <div class="quiz-top-nav">
            <a href="{{ route('ppdb') }}" class="quiz-back-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span>Kembali ke Informasi PPDB</span>
            </a>

            <button type="button" class="quiz-sound-toggle" id="quizSoundBtn" onclick="toggleQuizSound()" aria-label="Toggle Efek Suara">
                <span id="soundIcon">🔊</span>
                <span id="soundText">Suara: Aktif</span>
            </button>
        </div>

        <!-- Main Quiz Card -->
        <div class="quiz-main-card">

            <!-- ═════════════════════════════════════════════
                 1. INTRO SCREEN
                 ═════════════════════════════════════════════ -->
            <div class="quiz-intro-box" id="quizIntroScreen">
                <div class="quiz-intro-badge">
                    <span>✨ TEFA AI CAREER DISCOVERY</span>
                </div>

                <h1 class="quiz-intro-title">
                    Temukan Jurusan yang <span>Paling Cocok</span> Untukmu
                </h1>

                <p class="quiz-intro-desc">
                    Jawab 6 pertanyaan singkat. TEFA AI akan memetakan minatmu ke 5 jurusan unggulan, menjelaskan alasannya, lalu menunjukkan langkah pertamamu menuju masa depan.
                </p>

                <div class="quiz-features-pills">
                    <span class="quiz-feature-pill">⚡ Hasil Instan</span>
                    <span class="quiz-feature-pill">🎯 Rekomendasi Personal</span>
                    <span class="quiz-feature-pill">💡 Alasan Transparan</span>
                    <span class="quiz-feature-pill">🚀 5 Jurusan Unggulan</span>
                </div>

                <button type="button" class="btn-start-quiz" onclick="startQuiz()">
                    <span>Mulai Analisis AI</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>
            </div>

            <!-- ═════════════════════════════════════════════
                 2. ACTIVE QUESTION SCREEN
                 ═════════════════════════════════════════════ -->
            <div class="quiz-game-box" id="quizGameScreen">
                
                <!-- Progress Header -->
                <div class="quiz-progress-wrap">
                    <div class="quiz-progress-info">
                        <span id="quizQuestionCountText">Pertanyaan 1 dari 6</span>
                        <span id="quizProgressPercentText">16% Selesai</span>
                    </div>
                    <div class="quiz-progress-bar">
                        <div class="quiz-progress-fill" id="quizProgressFill"></div>
                    </div>
                </div>

                <!-- Question Header -->
                <div class="quiz-question-num" id="quizQuestionCategory">Kategori: Minat &amp; Passion</div>
                <h2 class="quiz-question-text" id="quizQuestionTitle">Judul Pertanyaan</h2>

                <!-- Options List -->
                <div class="quiz-options-list" id="quizOptionsList">
                    <!-- Injected by JavaScript -->
                </div>

            </div>

            <!-- ═════════════════════════════════════════════
                 3. RESULT SCREEN
                 ═════════════════════════════════════════════ -->
            <div class="quiz-result-box" id="quizResultScreen">
                
                <div class="result-celebration-badge">
                    <span>✨ Analisis AI Selesai dalam Sekejap</span>
                </div>

                <h2 class="result-headline">
                    Ini Jalur Vokasi yang Direkomendasikan untukmu
                </h2>

                <!-- Top Match Hero Card -->
                <div class="result-hero-card" id="resultHeroCard">
                    <div class="result-top-match-row">
                        <span class="result-persona-tag" id="resultPersonaTag">SANG ARSITEK DIGITAL</span>
                        <span class="result-match-percentage" id="resultMatchPercent">96% Sangat Cocok</span>
                    </div>

                    <h3 class="result-major-title" id="resultMajorTitle">Rekayasa Perangkat Lunak (RPL)</h3>
                    <p class="result-major-desc" id="resultMajorDesc">
                        Kamu memiliki pola pikir logis, kreatif, dan suka membangun solusi digital. Jurusan ini akan membekalimu skill Software Engineering, AI prompt engineering, dan aplikasi modern yang sangat diburu industri global.
                    </p>

                    <div class="result-skills-pills" id="resultSkillsList">
                        <span class="result-skill-pill">💻 Web &amp; Mobile App</span>
                        <span class="result-skill-pill">🤖 AI &amp; Logic Coding</span>
                        <span class="result-skill-pill">🎮 Game Dev &amp; UI/UX</span>
                    </div>

                    <div class="result-ai-insight" aria-live="polite">
                        <span class="result-ai-insight-label">AI MENEMUKAN POLA INI DARI PILIHANMU</span>
                        <div class="result-ai-signals" id="resultAiSignals"></div>
                    </div>
                </div>

                <!-- Comparison Breakdown -->
                <div class="result-breakdown-card">
                    <div class="breakdown-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                        <span>Kecocokanmu di Semua Jurusan SMK Antartika 1 Sidoarjo:</span>
                    </div>

                    <div id="breakdownRowsContainer">
                        <!-- Filled by JavaScript -->
                    </div>
                </div>

                <!-- Actions -->
                <div class="result-actions-row">
                    <a href="{{ route('ppdb.daftar') }}" class="btn-result-daftar" id="btnResultDaftar">
                        <span>Daftar Jurusan Ini Sekarang</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>

                    <a href="#" target="_blank" class="btn-result-share" id="btnResultShare">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                        </svg>
                        <span>Bagikan ke WhatsApp</span>
                    </a>

                    <button type="button" class="btn-result-ask-ai" onclick="askTefaAboutResult()">
                        <span>✨</span>
                        <span>Tanya AI tentang Jurusan Ini</span>
                    </button>

                    <button type="button" class="btn-result-restart" onclick="restartQuiz()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="1 4 1 10 7 10"></polyline>
                            <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                        </svg>
                        <span>Ulangi Kuis</span>
                    </button>
                </div>

            </div>

        </div>

    </main>

    <!-- Unified Landing Footer Component -->
    <x-landing-footer />

    {{-- Pengunjung dapat melanjutkan rekomendasi ke percakapan publik tanpa login. --}}
    <x-ai-widget subtitle="Tanya lanjut tentang jurusanmu" />

    <!-- Quiz Engine & Interactive Sound/Confetti Scripts -->
    <script>
        // ─── 1. AUDIO SYNTHESIZER (WEB AUDIO API) ───
        let soundEnabled = true;
        let audioCtx = null;

        function getAudioContext() {
            if (!audioCtx) {
                const AudioContextClass = window.AudioContext || window.webkitAudioContext;
                if (AudioContextClass) audioCtx = new AudioContextClass();
            }
            if (audioCtx && audioCtx.state === 'suspended') {
                audioCtx.resume();
            }
            return audioCtx;
        }

        function playSound(type) {
            if (!soundEnabled) return;
            try {
                const ctx = getAudioContext();
                if (!ctx) return;

                if (type === 'select') {
                    const osc = ctx.createOscillator();
                    const gain = ctx.createGain();
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(480, ctx.currentTime);
                    osc.frequency.exponentialRampToValueAtTime(720, ctx.currentTime + 0.08);
                    gain.gain.setValueAtTime(0.12, ctx.currentTime);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.08);
                    osc.connect(gain);
                    gain.connect(ctx.destination);
                    osc.start();
                    osc.stop(ctx.currentTime + 0.08);
                } else if (type === 'next') {
                    const osc = ctx.createOscillator();
                    const gain = ctx.createGain();
                    osc.type = 'triangle';
                    osc.frequency.setValueAtTime(320, ctx.currentTime);
                    osc.frequency.exponentialRampToValueAtTime(540, ctx.currentTime + 0.12);
                    gain.gain.setValueAtTime(0.15, ctx.currentTime);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);
                    osc.connect(gain);
                    gain.connect(ctx.destination);
                    osc.start();
                    osc.stop(ctx.currentTime + 0.12);
                } else if (type === 'fanfare') {
                    const notes = [440, 554.37, 659.25, 880];
                    notes.forEach((freq, idx) => {
                        setTimeout(() => {
                            if (!soundEnabled) return;
                            const osc = ctx.createOscillator();
                            const gain = ctx.createGain();
                            osc.type = 'sine';
                            osc.frequency.setValueAtTime(freq, ctx.currentTime);
                            gain.gain.setValueAtTime(0.18, ctx.currentTime);
                            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.28);
                            osc.connect(gain);
                            gain.connect(ctx.destination);
                            osc.start();
                            osc.stop(ctx.currentTime + 0.28);
                        }, idx * 110);
                    });
                }
            } catch (err) {
                // Audio context blocked
            }
        }

        function toggleQuizSound() {
            soundEnabled = !soundEnabled;
            const icon = document.getElementById('soundIcon');
            const text = document.getElementById('soundText');
            const btn = document.getElementById('quizSoundBtn');

            if (soundEnabled) {
                icon.innerText = '🔊';
                text.innerText = 'Suara: Aktif';
                btn.classList.remove('muted');
                playSound('select');
            } else {
                icon.innerText = '🔇';
                text.innerText = 'Suara: Mute';
                btn.classList.add('muted');
            }
        }

        // ─── 2. QUIZ QUESTIONS DATA ───
        const QUIZ_QUESTIONS = [
            {
                category: "Waktu Luang & Minat Dasar",
                question: "Saat ada waktu luang atau akhir pekan, kegiatan apa yang paling bikin kamu betah berjam-jam?",
                options: [
                    { letter: "A", emoji: "💻", title: "Ngulik coding, main game & penasaran cara bikin aplikasinya", desc: "Suka berjam-jam di depan komputer/laptop memecahkan hal digital.", major: "rpl" },
                    { letter: "B", emoji: "🏎️", title: "Modifikasi motor/mobil, servis oli, dan dengar deru mesin", desc: "Tertarik dengan teknologi mesin otomotif dan kendaraan bertenaga.", major: "tkr" },
                    { letter: "C", emoji: "🤖", title: "Bikin robot mini, solder komponen, penasaran sensor & IoT", desc: "Menyukai sirkuit elektronik kecil yang bisa bergerak secara pintar.", major: "tei" },
                    { letter: "D", emoji: "⚡", title: "Rakit instalasi kabel listrik, panel lampu & smart home", desc: "Tertantang menata sistem tenaga listrik yang aman dan bertenaga besar.", major: "titl" },
                    { letter: "E", emoji: "⚙️", title: "Desain 3D perkakas logam lalu mencetak atau membubutnya", desc: "Menikmati proses pembentukan besi/baja menjadi sparepart presisi.", major: "tpm" }
                ]
            },
            {
                category: "Gadget & Peralatan Impian",
                question: "Jika kamu diberi kebebasan memilih set alat kerja impian, kamu paling ingin memiliki apa?",
                options: [
                    { letter: "A", emoji: "🖥️", title: "Laptop High-End, Dual Monitor & Software Pemrograman Canggih", desc: "Senjata utama untuk membangun aplikasi, AI, dan game masa depan.", major: "rpl" },
                    { letter: "B", emoji: "🔧", title: "Toolbox Bengkel Lengkap, Engine Diagnostic Scanner & Dyno Test", desc: "Perangkat canggih untuk menganalisis performa mesin mobil/motor modern.", major: "tkr" },
                    { letter: "C", emoji: "🔬", title: "Lab Mikrokontroler Arduino/ESP32, Solder Station & Robotic Arm", desc: "Perangkat untuk menciptakan teknologi otomatisasi dan kecerdasan alat.", major: "tei" },
                    { letter: "D", emoji: "⚡", title: "Panel Distribusi Industri, Smart Meter & Solar Panel Converter", desc: "Sistem pengontrol daya listrik dan energi terbarukan ramah lingkungan.", major: "titl" },
                    { letter: "E", emoji: "📐", title: "Mesin CNC 5-Axis Canggih, Digital Caliper & Software CAD 3D", desc: "Mesin berakurasi mikron untuk mencetak part otomotif & industri berat.", major: "tpm" }
                ]
            },
            {
                category: "Tantangan & Pemecahan Masalah",
                question: "Tantangan mana yang menurutmu paling memuaskan saat berhasil kamu selesaikan?",
                options: [
                    { letter: "A", emoji: "🧩", title: "Menemukan bug yang bikin error lalu membuat sistem berjalan ngebut", desc: "Kepuasan logika saat baris-baris kode bekerja sempurna tanpa cacat.", major: "rpl" },
                    { letter: "B", emoji: "🚗", title: "Mendiagnosa suara aneh di mesin dan membuatnya kembali halus", desc: "Kepuasan mekanikal saat kendaraan kembali bertenaga maksimal di jalan.", major: "tkr" },
                    { letter: "C", emoji: "💡", title: "Membuat lampu atau alat di rumah menyala otomatis lewat HP", desc: "Kepuasan teknologi saat integrasi sensor dan mikrokontroler berhasil.", major: "tei" },
                    { letter: "D", emoji: "🔌", title: "Menata sistem kelistrikan gedung besar agar aman dari korsleting", desc: "Kepuasan instalasi kelistrikan yang stabil, rapi, dan berdaya tinggi.", major: "titl" },
                    { letter: "E", emoji: "🛠️", title: "Membubut balok baja menjadi sparepart dengan ukuran 100% pas", desc: "Kepuasan presisi tingkat tinggi tanpa ada kesalahan milimeter pun.", major: "tpm" }
                ]
            },
            {
                category: "Proyek Tim Impian",
                question: "Jika kamu memimpin proyek inovasi sekolah, proyek mana yang paling ingin kamu ciptakan?",
                options: [
                    { letter: "A", emoji: "🚀", title: "Aplikasi Super App / Game Edukasi yang viral di Play Store", desc: "Menciptakan karya digital yang dipakai oleh ribuan hingga jutaan pengguna.", major: "rpl" },
                    { letter: "B", emoji: "🔋", title: "Motor Listrik (EV Conversion) karya siswa dengan akselerasi kencang", desc: "Inovasi kendaraan masa depan yang ramah lingkungan dan bertenaga.", major: "tkr" },
                    { letter: "C", emoji: "🦾", title: "Robot Pengantar Barang Otomatis berbasis Sensor & AI Vision", desc: "Mewujudkan automasi pabrik pintar masa depan (Industry 4.0).", major: "tei" },
                    { letter: "D", emoji: "☀️", title: "Pembangkit Listrik Tenaga Surya (PLTS) mandiri untuk sekolah", desc: "Solusi energi bersih berkelanjutan dengan manajemen daya cerdas.", major: "titl" },
                    { letter: "E", emoji: "🚁", title: "Rangka Drone Balap & Komponen Mesin Presisi dari Aluminium", desc: "Manufaktur produk berstandar penerbangan dan industri presisi tinggi.", major: "tpm" }
                ]
            },
            {
                category: "Lingkungan Kerja Impian",
                question: "Suasana tempat kerja masa depan yang paling menggambarkan gaya dan kenyamananmu:",
                options: [
                    { letter: "A", emoji: "🏢", title: "Tech Hub modern ber-AC dengan vibe startup digital yang dinamis", desc: "Kombinasi fleksibilitas, kreativitas, dan kolaborasi online global.", major: "rpl" },
                    { letter: "B", emoji: "🏁", title: "Workshop Otomotif Resmi / Pit Stop Balap yang bersih & profesional", desc: "Lingkungan aktif, berenergi tinggi, dan penuh aksi praktis langsung.", major: "tkr" },
                    { letter: "C", emoji: "🧪", title: "Lab Inovasi IoT & Robotika dengan mikroskop serta alat uji canggih", desc: "Tempat bereksperimen menciptakan alat-alat pintar generasi berikutnya.", major: "tei" },
                    { letter: "D", emoji: "⚡", title: "Control Room Pembangkit Energi & Proyek Kelistrikan Gedung Megah", desc: "Posisi krusial menjaga suplai listrik dan otomatisasi industri berjalan.", major: "titl" },
                    { letter: "E", emoji: "🏭", title: "Pabrik Manufaktur Berteknologi Tinggi dengan barisan mesin CNC modern", desc: "Kawasan industri kelas dunia penghasil komponen mesin presisi.", major: "tpm" }
                ]
            },
            {
                category: "Karakter & Potensi Diri",
                question: "Apa kelebihan terbesarmu yang sering diakui oleh teman atau gurumu?",
                options: [
                    { letter: "A", emoji: "🧠", title: "Cepat paham logika, suka teknologi baru & berpikir analitis", desc: "Kemampuan memproses masalah abstrak menjadi alur sistem yang jelas.", major: "rpl" },
                    { letter: "B", emoji: "💪", title: "Cekatan, suka praktek nyata & paham cara kerja benda bergerak", desc: "Kecerdasan kinestetik-mekanik yang tanggap dalam solusi fisik.", major: "tkr" },
                    { letter: "C", emoji: "🔍", title: "Teliti, sabar merangkai hal mikro & penasaran dengan chip cerdas", desc: "Fokus tinggi pada integrasi komponen elektronik dan sinyal mikro.", major: "tei" },
                    { letter: "D", emoji: "🛡️", title: "Tanggung jawab tinggi, paham standar keselamatan & disiplin sistem", desc: "Kemampuan menjaga keandalan dan keamanan sistem energi bertenaga.", major: "titl" },
                    { letter: "E", emoji: "🎯", title: "Perfeksionis pada detail, teliti mengukur & tekun membuat karya nyata", desc: "Komitmen pada standar kualitas dan kesempurnaan bentuk fisik.", major: "tpm" }
                ]
            }
        ];

        // ─── 3. MAJOR PROFILES DATA ───
        const MAJOR_PROFILES = {
            rpl: {
                code: "rpl",
                title: "Rekayasa Perangkat Lunak (RPL)",
                persona: "💻 SANG ARSITEK DIGITAL & AI CREATOR",
                desc: "Kamu memiliki logika tajam, rasa ingin tahu tinggi terhadap teknologi, dan daya kreasi digital yang luar biasa. Di jurusan RPL SMK Antartika 1 Sidoarjo, kamu akan belajar Coding Web, Mobile Apps, Game Development, AI Prompt Engineering, dan UI/UX Design yang menjadi profesi paling dicari industri saat ini.",
                skills: ["💻 Fullstack Web & App", "🤖 Artificial Intelligence & Logic", "🎮 Game Development & UI/UX", "☁️ Cloud Computing & Database"],
                color: "#2563EB",
                bgGradient: "linear-gradient(135deg, #1E40AF 0%, #3B82F6 100%)"
            },
            tkr: {
                code: "tkr",
                title: "Teknik Kendaraan Ringan (TKR)",
                persona: "🏎️ SANG MAESTRO OTOMOTIF & MOBIL LISTRIK",
                desc: "Kamu memiliki insting mekanik yang kuat, suka aksi langsung, dan tanggap terhadap kinerja mesin. Di jurusan TKR SMK Antartika 1 Sidoarjo, kamu akan menguasai Tune-Up EFI, Engine Overhaul, Diagnostic Scanner modern, AC & Kelistrikan Mobil, hingga Konversi Kendaraan Listrik (EV).",
                skills: ["🚗 Engine Scanner & EFI Diagnostic", "🔋 Electric Vehicle (EV) Tech", "❄️ AC & Chassis Maintenance", "🏁 Pitstop & Bengkel Resmi Standard"],
                color: "#DC2626",
                bgGradient: "linear-gradient(135deg, #B91C1C 0%, #EF4444 100%)"
            },
            tei: {
                code: "tei",
                title: "Teknik Elektronika Industri (TEI)",
                persona: "🤖 SANG INOVATOR ROBOTIKA & SMART IOT",
                desc: "Kamu berjiwa penemu, teliti terhadap komponen mikro, dan antusias pada otomatisasi pintar. Di jurusan TEI, kamu akan belajar Pemrograman Mikrokontroler (Arduino/ESP32), Robotika Industri, Sensor Cerdas, Desain PCB, dan Internet of Things (IoT) untuk revolusi Industri 4.0.",
                skills: ["🤖 Robot Arm & Automatic Vision", "📡 IoT & Smart Sensor Network", "🔌 Microcontroller & PCB Design", "🏭 Smart Factory Integration"],
                color: "#7C3AED",
                bgGradient: "linear-gradient(135deg, #6D28D9 0%, #8B5CF6 100%)"
            },
            titl: {
                code: "titl",
                title: "Teknik Instalasi Tenaga Listrik (TITL)",
                persona: "⚡ SANG PENGENDALI ENERGI & SMART AUTOMATION",
                desc: "Kamu sosok yang disiplin, teliti, dan mengutamakan keselamatan sistem berdaya tinggi. Di jurusan TITL, kamu akan mendalami Instalasi Penerangan & Tenaga Gedung, Panel Distribusi 3 Fasa, PLC Automation, Smart Home Lighting, dan Energi Terbarukan Solar Panel (PLTS).",
                skills: ["⚡ Panel Daya & Distribusi 3 Fasa", "🏠 Smart Home Automation & PLC", "☀️ Solar Cell & Renewable Energy", "🛡️ K3 Listrik & Standard SNI/SPLN"],
                color: "#D97706",
                bgGradient: "linear-gradient(135deg, #B45309 0%, #F59E0B 100%)"
            },
            tpm: {
                code: "tpm",
                title: "Teknik Pemesinan (TPM)",
                persona: "⚙️ SANG MASTER MANUFAKTUR & CNC PRESISI",
                desc: "Kamu memiliki keuletan tinggi, pandangan spasial 3D yang akurat, dan cinta pada karya fisik bernilai tinggi. Di jurusan TPM, kamu akan menguasai Mesin Bubut & Milling Konvensional, Pemrograman Mesin Bubut/Fraiss CNC Berbasis Komputer, CAD/CAM 3D, dan Pengukuran Presisi Mikro.",
                skills: ["⚙️ Mesin Bubut & Milling Modern", "💻 CNC Programming 3-Axis / 5-Axis", "📐 3D CAD/CAM Modeling", "🎯 Pengukuran Presisi Akurasi Mikron"],
                color: "#059669",
                bgGradient: "linear-gradient(135deg, #047857 0%, #10B981 100%)"
            }
        };

        // ─── 4. QUIZ STATE & CONTROLLER ───
        let currentQuestionIndex = 0;
        let scores = { rpl: 0, tkr: 0, tei: 0, titl: 0, tpm: 0 };
        let selectedAnswers = [];

        function startQuiz() {
            playSound('select');
            currentQuestionIndex = 0;
            scores = { rpl: 0, tkr: 0, tei: 0, titl: 0, tpm: 0 };
            selectedAnswers = [];

            document.getElementById('quizIntroScreen').style.display = 'none';
            document.getElementById('quizResultScreen').classList.remove('active');
            document.getElementById('quizGameScreen').classList.add('active');

            renderQuestion();
        }

        function renderQuestion() {
            const q = QUIZ_QUESTIONS[currentQuestionIndex];
            const total = QUIZ_QUESTIONS.length;
            const percent = Math.round(((currentQuestionIndex + 1) / total) * 100);

            // Update Progress UI
            document.getElementById('quizQuestionCountText').innerText = `Pertanyaan ${currentQuestionIndex + 1} dari ${total}`;
            document.getElementById('quizProgressPercentText').innerText = `${percent}% Selesai`;
            document.getElementById('quizProgressFill').style.width = `${percent}%`;

            document.getElementById('quizQuestionCategory').innerText = `Kategori: ${q.category}`;
            document.getElementById('quizQuestionTitle').innerText = q.question;

            // Render Options
            const list = document.getElementById('quizOptionsList');
            list.innerHTML = '';

            q.options.forEach((opt, idx) => {
                const optEl = document.createElement('div');
                optEl.className = 'quiz-option-card';
                optEl.setAttribute('role', 'button');
                optEl.setAttribute('tabindex', '0');
                optEl.innerHTML = `
                    <div class="quiz-option-letter">${opt.letter}</div>
                    <div class="quiz-option-body">
                        <div class="quiz-option-title">${opt.title}</div>
                        <div class="quiz-option-desc">${opt.desc}</div>
                    </div>
                    <div class="quiz-option-emoji">${opt.emoji}</div>
                `;

                optEl.addEventListener('click', () => handleOptionChosen(opt, optEl));
                list.appendChild(optEl);
            });

            window.scrollTo({ top: 120, behavior: 'smooth' });
        }

        function handleOptionChosen(option, cardElement) {
            playSound('select');
            cardElement.classList.add('selected');

            // Add score
            scores[option.major] += 1;
            selectedAnswers.push(option);

            setTimeout(() => {
                if (currentQuestionIndex < QUIZ_QUESTIONS.length - 1) {
                    playSound('next');
                    currentQuestionIndex++;
                    renderQuestion();
                } else {
                    finishQuiz();
                }
            }, 320);
        }

        function finishQuiz() {
            playSound('fanfare');
            triggerConfetti();

            document.getElementById('quizGameScreen').classList.remove('active');
            const resultBox = document.getElementById('quizResultScreen');
            resultBox.classList.add('active');

            // Find top major
            let highestMajor = 'rpl';
            let maxScore = -1;

            const totalQ = QUIZ_QUESTIONS.length;
            const entries = Object.entries(scores);

            entries.forEach(([major, score]) => {
                if (score > maxScore) {
                    maxScore = score;
                    highestMajor = major;
                }
            });

            const topProfile = MAJOR_PROFILES[highestMajor];
            const topMatchPercent = Math.min(98, Math.max(82, Math.round((maxScore / totalQ) * 50 + 48)));

            // Fill Top Card
            const heroCard = document.getElementById('resultHeroCard');
            heroCard.style.background = topProfile.bgGradient;
            document.getElementById('resultPersonaTag').innerText = topProfile.persona;
            document.getElementById('resultMatchPercent').innerText = `${topMatchPercent}% Sangat Cocok`;
            document.getElementById('resultMajorTitle').innerText = topProfile.title;
            document.getElementById('resultMajorDesc').innerText = topProfile.desc;

            // Fill Skills
            const skillsContainer = document.getElementById('resultSkillsList');
            skillsContainer.innerHTML = topProfile.skills.map(s => `<span class="result-skill-pill">${s}</span>`).join('');

            const relevantSignals = selectedAnswers
                .filter(answer => answer.major === highestMajor)
                .slice(0, 3)
                .map(answer => answer.title);
            const signals = relevantSignals.length ? relevantSignals : topProfile.skills;
            document.getElementById('resultAiSignals').innerHTML = signals
                .map(signal => `<span class="result-ai-signal">✓ ${signal}</span>`)
                .join('');

            // Link CTA
            const daftarBtn = document.getElementById('btnResultDaftar');
            daftarBtn.href = `{{ route('ppdb.daftar') }}?jurusan=${topProfile.code}`;

            // Link WhatsApp
            const shareText = encodeURIComponent(`🎉 Saya baru saja mencoba Kuis Jurusan SMK Antartika 1 Sidoarjo! Hasil kecocokan saya adalah *${topMatchPercent}% Cocok di Jurusan ${topProfile.title}* (${topProfile.persona}). Yuk cari tahu jurusan impianmu juga di: ${window.location.href}`);
            document.getElementById('btnResultShare').href = `https://wa.me/?text=${shareText}`;

            // Breakdown Comparison
            const breakdownContainer = document.getElementById('breakdownRowsContainer');
            breakdownContainer.innerHTML = '';

            // Calculate percentage for each
            const sorted = Object.keys(MAJOR_PROFILES).sort((a, b) => scores[b] - scores[a]);

            sorted.forEach(code => {
                const item = MAJOR_PROFILES[code];
                const score = scores[code];
                let itemPercent = Math.round((score / totalQ) * 60 + (code === highestMajor ? 36 : 25));
                if (code === highestMajor) itemPercent = topMatchPercent;

                const row = document.createElement('div');
                row.className = 'breakdown-row';
                row.innerHTML = `
                    <div class="breakdown-row-header">
                        <span style="color:${item.color}; font-weight:800;">${item.title}</span>
                        <span style="font-weight:800; color:#1E293B;">${itemPercent}%</span>
                    </div>
                    <div class="breakdown-bar-track">
                        <div class="breakdown-bar-fill" style="width: ${itemPercent}%; background: ${item.color};"></div>
                    </div>
                `;
                breakdownContainer.appendChild(row);
            });

            window.scrollTo({ top: 120, behavior: 'smooth' });
        }

        function restartQuiz() {
            playSound('select');
            startQuiz();
        }

        function askTefaAboutResult() {
            const topMajor = Object.keys(scores).reduce((best, major) => scores[major] > scores[best] ? major : best, 'rpl');
            const profile = MAJOR_PROFILES[topMajor];

            if (window.sendNavChip) {
                window.sendNavChip(`Saya mendapat rekomendasi ${profile.title}. Prospek karier dan langkah daftar PPDB-nya bagaimana?`);
            }
        }

        // ─── 5. CONFETTI ANIMATION (CANVAS) ───
        function triggerConfetti() {
            const canvas = document.getElementById('quizConfettiCanvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            const particles = [];
            const colors = ['#004AC6', '#2563EB', '#F59E0B', '#10B981', '#EC4899', '#8B5CF6'];

            for (let i = 0; i < 110; i++) {
                particles.push({
                    x: canvas.width / 2,
                    y: canvas.height / 2,
                    vx: (Math.random() - 0.5) * 18,
                    vy: (Math.random() - 0.7) * 18,
                    size: Math.random() * 8 + 4,
                    color: colors[Math.floor(Math.random() * colors.length)],
                    rot: Math.random() * 360,
                    vRot: (Math.random() - 0.5) * 10,
                    opacity: 1
                });
            }

            let animationFrameId;
            const startTime = Date.now();

            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                const elapsed = Date.now() - startTime;

                particles.forEach(p => {
                    p.x += p.vx;
                    p.y += p.vy;
                    p.vy += 0.35; // Gravity
                    p.rot += p.vRot;
                    p.opacity = Math.max(0, 1 - (elapsed / 3000));

                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate((p.rot * Math.PI) / 180);
                    ctx.fillStyle = p.color;
                    ctx.globalAlpha = p.opacity;
                    ctx.fillRect(-p.size / 2, -p.size / 2, p.size, p.size);
                    ctx.restore();
                });

                if (elapsed < 3000) {
                    animationFrameId = requestAnimationFrame(animate);
                } else {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                }
            }

            animate();
        }
    </script>
</body>
</html>
