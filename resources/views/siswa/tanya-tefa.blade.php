<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <title>Tanya Tefa AI — TEFA-Hub</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Siswa Dashboard & Shared CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/siswa.dashboard.css') }}?v={{ config('app.asset_version', '1.0') }}">

    <style>
        /* ─── AI Navigator & Needs Analysis Styling ─── */
        .ai-needs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 12px;
            margin-top: 14px;
            margin-bottom: 8px;
        }

        .ai-need-card {
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 14px;
            padding: 14px 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            transition: all 0.2s ease;
            text-align: left;
        }

        .ai-need-card:hover {
            background: #FFFFFF;
            border-color: #004AC6;
            box-shadow: 0 4px 16px rgba(0, 74, 198, 0.08);
            transform: translateY(-2px);
        }

        .ai-need-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ai-need-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #EEF4FF;
            color: #004AC6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .ai-need-title {
            font-family: var(--font-main, 'Plus Jakarta Sans', sans-serif);
            font-size: 13px;
            font-weight: 700;
            color: #0F172A;
            margin: 0;
            line-height: 1.2;
        }

        .ai-need-desc {
            font-family: var(--font-main, 'Plus Jakarta Sans', sans-serif);
            font-size: 11px;
            color: #64748B;
            margin: 0;
            line-height: 1.4;
        }

        .ai-need-chips {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin-top: 4px;
        }

        .ai-need-chip-btn {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 6px;
            padding: 5px 10px;
            font-family: var(--font-main, 'Plus Jakarta Sans', sans-serif);
            font-size: 11px;
            font-weight: 600;
            color: #334155;
            text-align: left;
            cursor: pointer;
            transition: all 0.15s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .ai-need-chip-btn:hover {
            background: #004AC6;
            border-color: #004AC6;
            color: #FFFFFF;
        }

        .ai-need-chip-btn:hover .chip-arrow-sm {
            color: #FFFFFF;
            transform: translateX(2px);
        }

        .chip-arrow-sm {
            color: #94A3B8;
            font-size: 11px;
            transition: transform 0.15s ease;
        }

        /* Category Badge inside AI response */
        .ai-category-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-family: var(--font-main, 'Plus Jakarta Sans', sans-serif);
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 3px 8px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .badge-ppdb { background: #FFF7ED; color: #C2410C; border: 1px solid #FFEDD5; }
        .badge-industri { background: #F0F9FF; color: #0369A1; border: 1px solid #BAE6FD; }
        .badge-blud { background: #EEF2FF; color: #4338CA; border: 1px solid #C7D2FE; }
        .badge-bkk { background: #ECFDF5; color: #047857; border: 1px solid #A7F3D0; }
        .badge-akademik { background: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE; }
        .badge-admin { background: #FEF3C7; color: #B45309; border: 1px solid #FDE68A; }
        .badge-umum { background: #F1F5F9; color: #475569; border: 1px solid #CBD5E1; }

        .ai-formatted-content {
            font-family: var(--font-main, 'Plus Jakarta Sans', sans-serif);
            font-size: 13.5px;
            line-height: 1.6;
            color: #334155;
        }

        .ai-formatted-content p {
            margin: 0 0 8px 0;
        }

        .ai-formatted-content p:last-child {
            margin-bottom: 0;
        }

        .ai-formatted-content ul, .ai-formatted-content ol {
            margin: 6px 0 10px 0;
            padding-left: 20px;
        }

        .ai-formatted-content li {
            margin-bottom: 4px;
        }

        .ai-formatted-content strong {
            color: #0F172A;
            font-weight: 700;
        }

        /* Direct Action Route Button */
        .btn-direct-route {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #004AC6 0%, #003896 100%);
            color: #FFFFFF !important;
            padding: 9px 18px;
            border-radius: 999px;
            font-family: var(--font-main, 'Plus Jakarta Sans', sans-serif);
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(0, 74, 198, 0.25);
            transition: all 0.2s ease;
            margin-top: 12px;
        }

        .btn-direct-route:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 74, 198, 0.35);
            background: linear-gradient(135deg, #0056e0 0%, #004AC6 100%);
        }

        .btn-direct-route svg {
            transition: transform 0.2s ease;
        }

        .btn-direct-route:hover svg {
            transform: translateX(3px);
        }

        /* Followup chips below AI bubble */
        .ai-followup-container {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px dashed #E2E8F0;
        }

        .ai-followup-label {
            width: 100%;
            font-size: 10.5px;
            font-weight: 700;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .ai-followup-chip {
            background: #F1F5F9;
            border: 1px solid #E2E8F0;
            border-radius: 999px;
            padding: 5px 12px;
            font-family: var(--font-main, 'Plus Jakarta Sans', sans-serif);
            font-size: 11.5px;
            font-weight: 600;
            color: #334155;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .ai-followup-chip:hover {
            background: #EEF2FF;
            border-color: #004AC6;
            color: #004AC6;
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="body-chat-full">

    <div class="app-layout app-layout-chat">
        
        <!-- ═══════════════════════════════════════════
             SIDEBAR NAVIGASI SISWA
             ═══════════════════════════════════════════ -->
        <x-sidebar-siswa :active="'tanya-tefa'" :user="$user ?? []" />

        <!-- ═══════════════════════════════════════════
             MAIN CONTENT AREA (FULL SCREEN NO OUTER CARD)
             ═══════════════════════════════════════════ -->
        <main class="main-content main-content-chat">
            
            <!-- ═══════════════════════════════════════════
                 HEADER UTAMA ROLE SISWA
                 ═══════════════════════════════════════════ -->
            <x-header-siswa :user="$user ?? []" />

            <!-- Page Body Area: FULL WIDTH & HEIGHT TANPA PEMBUNGKUS CARD & TANPA PROFIL BANNER -->
            <div class="content-body-chat-full">
                
                <!-- Chat History Area (Starts with Automated Needs Navigator) -->
                <div class="tefa-chat-history-full" id="chatHistory">
                    
                    <!-- Date Pill Divider -->
                    <div class="chat-date-divider" id="chatDateDivider">
                        <div class="chat-date-pill">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>Hari ini, {{ date('d F Y') }}</span>
                        </div>
                    </div>

                    <!-- Tempat Pesan Chat Dinamis -->
                    <div id="messagesContainer" class="messages-stream-container"></div>

                </div>

                <!-- ═══════════════════════════════════════════
                     BOTTOM DOCK: FULL WIDTH FLUSH TANPA RONGGA
                     ═══════════════════════════════════════════ -->
                <div class="chat-bottom-dock-full">
                    
                    <!-- Suggestions Bar (Ide Pertanyaan Dinamis) -->
                    <div class="chat-suggestions-bar-full">
                        <span class="suggestions-label">
                            <span class="icon-bulb">💡</span> IDE PERTANYAAN:
                        </span>
                        <div class="chips-scroll-container" id="bottomSuggestionsContainer">
                            <button type="button" class="chip-suggestion" onclick="sendCustomMessage('Cara Publikasi Produk BLUD')">
                                Cara Publikasi Produk BLUD
                            </button>
                            <button type="button" class="chip-suggestion" onclick="sendCustomMessage('Tips Lolos Seleksi BKK')">
                                Tips Lolos Seleksi BKK
                            </button>
                            <button type="button" class="chip-suggestion" onclick="sendCustomMessage('Lupa Password Akun')">
                                Lupa Password Akun
                            </button>
                            <button type="button" class="chip-suggestion" onclick="sendCustomMessage('Cek Nilai E-Rapor Vokasi')">
                                Cek Nilai E-Rapor Vokasi
                            </button>
                        </div>
                    </div>

                    <!-- Input Form Full Width -->
                    <form id="chatForm" class="tefa-input-form-full" onsubmit="handleChatSubmit(event)">
                        @csrf
                        <div class="input-pill-wrapper-full">
                            <input 
                                type="text" 
                                id="chatInput" 
                                class="chat-text-input-full" 
                                placeholder="Tanyakan seputar BLUD, BKK, Akademik, atau Bantuan Akun Admin..." 
                                autocomplete="off"
                                required
                            >
                            <button type="submit" id="btnSendChat" class="btn-send-pill-full">
                                <span>Kirim</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>

            </div>

        </main>

        <!-- Sidebar Overlay Backdrop for Responsive Mobile/Tablet -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    </div>

    <!-- Interactive Chat Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Initialize Automated Needs Analysis Greeting
            loadAutomatedGreeting();
        });

        const userName = "{{ $user['name'] ?? 'Siswa' }}";

        function getCurrentTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            return `${hours}:${minutes} WIB`;
        }

        // Automated Needs Analysis & Greeting
        function loadAutomatedGreeting() {
            const container = document.getElementById('messagesContainer');
            const timeStr = getCurrentTime();

            const greetingHtml = `
                <div class="chat-msg-row ai-msg-row animate-fade-in">
                    <div class="ai-avatar-box">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L1 7l11 5 9-4.09V17h2V7L12 2zM4.5 10.5v4.29l7.5 3.41 7.5-3.41V10.5L12 13.91l-7.5-3.41z"/>
                        </svg>
                    </div>
                    <div class="msg-bubble-wrap" style="max-width: 88%;">
                        <div class="msg-header-meta">
                            <span class="sender-name">Tanya Tefa AI Navigator</span>
                            <span class="msg-time">${timeStr}</span>
                        </div>
                        <div class="ai-bubble-card">
                            <div class="ai-category-badge badge-umum">
                                <span>🤖 Navigator Peran & Pusat Bantuan Mandiri</span>
                            </div>
                            <div class="ai-formatted-content">
                                <p>Halo <strong>${escapeHtml(userName)}</strong>! Saya adalah <strong>Tanya Tefa AI</strong>, asisten navigator resmi platform TEFA-Hub.</p>
                                <p>Saya siap memandu kebutuhan Anda berdasarkan peran hari ini, tanpa perlu antre ke ruang Tata Usaha:</p>
                            </div>

                            <!-- Needs Analysis Navigator Grid -->
                            <div class="ai-needs-grid">
                                
                                <!-- Card 1: Orang Tua & Calon Siswa (PPDB) -->
                                <div class="ai-need-card" style="border-top: 3px solid #E07B00;">
                                    <div class="ai-need-header">
                                        <div class="ai-need-icon">👨‍👩‍👧</div>
                                        <div>
                                            <h4 class="ai-need-title">Orang Tua & Calon Siswa</h4>
                                            <p class="ai-need-desc">PPDB online, syarat berkas, jurusan & biaya</p>
                                        </div>
                                    </div>
                                    <div class="ai-need-chips">
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Cara Daftar PPDB Online')">
                                            <span>Alur Daftar PPDB</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Syarat Berkas PPDB')">
                                            <span>Syarat Berkas Masuk</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Pilihan Jurusan & Keahlian')">
                                            <span>Jurusan & Fasilitas</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Card 2: Siswa Aktif SMK -->
                                <div class="ai-need-card" style="border-top: 3px solid #004AC6;">
                                    <div class="ai-need-header">
                                        <div class="ai-need-icon">🎓</div>
                                        <div>
                                            <h4 class="ai-need-title">Siswa Aktif SMK</h4>
                                            <p class="ai-need-desc">Magang PKL, produk BLUD, komisi & rapor</p>
                                        </div>
                                    </div>
                                    <div class="ai-need-chips">
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Cara Publikasi Produk BLUD')">
                                            <span>Publikasi Karya BLUD</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Cara Daftar Magang PKL')">
                                            <span>Pengajuan Magang / PKL</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Mekanisme Komisi Siswa BLUD')">
                                            <span>Mekanisme Komisi Proyek</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Card 3: Alumni & Pencari Kerja -->
                                <div class="ai-need-card" style="border-top: 3px solid #712AE2;">
                                    <div class="ai-need-header">
                                        <div class="ai-need-icon">💼</div>
                                        <div>
                                            <h4 class="ai-need-title">Alumni & Pencari Kerja</h4>
                                            <p class="ai-need-desc">Loker BKK, legalisir ijazah & sertifikasi</p>
                                        </div>
                                    </div>
                                    <div class="ai-need-chips">
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Cara Melamar Lowongan BKK')">
                                            <span>Lamar Lowongan BKK</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Legalisir Ijazah Online')">
                                            <span>Legalisir Ijazah & Nilai</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Kesiapan Kerja BKK')">
                                            <span>Cek Kesiapan Kerja</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Card 4: Mitra Industri / DUDI -->
                                <div class="ai-need-card" style="border-top: 3px solid #0284C7;">
                                    <div class="ai-need-header">
                                        <div class="ai-need-icon">🏢</div>
                                        <div>
                                            <h4 class="ai-need-title">Mitra Industri (DUDI)</h4>
                                            <p class="ai-need-desc">Kerjasama TEFA & rekrutmen alumni</p>
                                        </div>
                                    </div>
                                    <div class="ai-need-chips">
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Kerjasama Teaching Factory')">
                                            <span>Kerjasama TEFA</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Rekrutmen Tenaga Kerja BKK')">
                                            <span>Rekrutmen Lulusan</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Cara Pesan Produk BLUD')">
                                            <span>Order Produk / Jasa</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Card 5: Layanan Tata Usaha & Akun -->
                                <div class="ai-need-card" style="border-top: 3px solid #16A34A;">
                                    <div class="ai-need-header">
                                        <div class="ai-need-icon">🏛️</div>
                                        <div>
                                            <h4 class="ai-need-title">Layanan TU & Akun</h4>
                                            <p class="ai-need-desc">Surat aktif, reset sandi & jam kerja TU</p>
                                        </div>
                                    </div>
                                    <div class="ai-need-chips">
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Lupa Password Akun')">
                                            <span>Reset Sandi Akun</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Surat Keterangan Siswa Aktif')">
                                            <span>Surat Keterangan Aktif</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                        <button type="button" class="ai-need-chip-btn" onclick="sendCustomMessage('Hubungi Admin Sekolah')">
                                            <span>Jam Layanan TU</span>
                                            <span class="chip-arrow-sm">→</span>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <p style="font-size:12px; color:#64748B; margin-top:8px;">💡 <em>Silakan klik opsi di atas atau ketik langsung pertanyaan Anda di kolom chat.</em></p>
                        </div>
                    </div>
                </div>
            `;

            container.innerHTML = greetingHtml;
        }

        function sendCustomMessage(text) {
            const input = document.getElementById('chatInput');
            if (input) {
                input.value = text;
                submitMessage(text);
            }
        }

        function handleChatSubmit(e) {
            e.preventDefault();
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            if (!message) return;
            submitMessage(message);
        }

        function submitMessage(message) {
            const container = document.getElementById('messagesContainer');
            const history = document.getElementById('chatHistory');
            const input = document.getElementById('chatInput');
            const btnSend = document.getElementById('btnSendChat');

            const timeStr = getCurrentTime();

            // 1. Append User Message
            const userMsgHtml = `
                <div class="chat-msg-row user-msg-row animate-fade-in">
                    <div class="msg-bubble-wrap user-bubble-wrap">
                        <div class="msg-header-meta user-meta">
                            <span class="msg-time">${timeStr}</span>
                            <span class="sender-name">${escapeHtml(userName)}</span>
                        </div>
                        <div class="user-bubble-card">
                            <p class="bubble-text">${escapeHtml(message)}</p>
                        </div>
                        <div class="delivery-status">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left: -9px;">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Terkirim</span>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', userMsgHtml);
            input.value = '';
            input.disabled = true;
            btnSend.disabled = true;
            history.scrollTop = history.scrollHeight;

            // 2. Typing Indicator
            const typingHtml = `
                <div class="chat-msg-row ai-msg-row" id="typingIndicator">
                    <div class="ai-avatar-box">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L1 7l11 5 9-4.09V17h2V7L12 2zM4.5 10.5v4.29l7.5 3.41 7.5-3.41V10.5L12 13.91l-7.5-3.41z"/>
                        </svg>
                    </div>
                    <div class="msg-bubble-wrap">
                        <div class="msg-header-meta">
                            <span class="sender-name">Tanya Tefa AI Navigator</span>
                            <span class="msg-time">${timeStr}</span>
                        </div>
                        <div class="ai-bubble-card typing-bubble">
                            <span class="dot-typing"></span>
                            <span class="dot-typing"></span>
                            <span class="dot-typing"></span>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', typingHtml);
            history.scrollTop = history.scrollHeight;

            // 3. Request AI Response
            fetch("{{ route('ai.chat') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ message: message })
            })
            .then(res => res.json())
            .then(data => {
                removeTyping();
                renderAiReply(data);
            })
            .catch(err => {
                removeTyping();
                renderAiReply({
                    answer: "Informasi terkait pertanyaanmu sudah dicatat. Kamu bisa menjelajahi modul PPDB, BLUD, lowongan BKK, dan administrasi melalui menu navigasi.",
                    route: "/siswa/dashboard",
                    label: "Buka Menu Dashboard",
                    category: "UMUM",
                    suggestions: ["Cara Daftar PPDB Online", "Cara Publikasi Produk BLUD", "Cara Melamar Lowongan BKK"]
                });
            })
            .finally(() => {
                input.disabled = false;
                btnSend.disabled = false;
                input.focus();
            });
        }

        function renderAiReply(data) {
            const container = document.getElementById('messagesContainer');
            const history = document.getElementById('chatHistory');
            const aiTimeStr = getCurrentTime();
            const answerText = data.answer || "Terima kasih. Permintaan Anda sedang kami proses.";
            
            // Category & Role Badge
            let badgeClass = 'badge-umum';
            let badgeText = '🤖 Tanya Tefa AI Navigator';
            const cat = (data.category || '').toUpperCase();
            if (cat.includes('PPDB')) { badgeClass = 'badge-ppdb'; badgeText = '👨‍👩‍👧 Info PPDB & Calon Siswa'; }
            else if (cat.includes('INDUSTRI')) { badgeClass = 'badge-industri'; badgeText = '🏢 Kemitraan Industri (DUDI)'; }
            else if (cat.includes('BLUD')) { badgeClass = 'badge-blud'; badgeText = '🏭 Unit Produksi BLUD'; }
            else if (cat.includes('BKK')) { badgeClass = 'badge-bkk'; badgeText = '💼 Bursa Kerja Khusus (BKK)'; }
            else if (cat.includes('AKADEMIK')) { badgeClass = 'badge-akademik'; badgeText = '🎓 Portal Akademik'; }
            else if (cat.includes('ADMIN') || cat.includes('FAQ')) { badgeClass = 'badge-admin'; badgeText = '🏛️ Layanan Tata Usaha & Akun'; }

            // Action button
            let actionBtnHtml = '';
            if (data.route && data.label) {
                actionBtnHtml = `
                    <div style="margin-top: 14px;">
                        <a href="${data.route}" class="btn-direct-route">
                            <span>${escapeHtml(data.label)}</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                `;
            }

            // Followup Suggestions
            let followupHtml = '';
            if (data.suggestions && data.suggestions.length > 0) {
                const chips = data.suggestions.map(s => `
                    <button type="button" class="ai-followup-chip" onclick="sendCustomMessage('${escapeHtml(s)}')">
                        ${escapeHtml(s)}
                    </button>
                `).join('');

                followupHtml = `
                    <div class="ai-followup-container">
                        <span class="ai-followup-label">💡 Rekomendasi Langkah Selanjutnya:</span>
                        ${chips}
                    </div>
                `;

                // Update bottom suggestions dock too
                updateBottomSuggestions(data.suggestions);
            }

            const aiMsgHtml = `
                <div class="chat-msg-row ai-msg-row animate-fade-in">
                    <div class="ai-avatar-box">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L1 7l11 5 9-4.09V17h2V7L12 2zM4.5 10.5v4.29l7.5 3.41 7.5-3.41V10.5L12 13.91l-7.5-3.41z"/>
                        </svg>
                    </div>
                    <div class="msg-bubble-wrap">
                        <div class="msg-header-meta">
                            <span class="sender-name">Tanya Tefa AI Navigator</span>
                            <span class="msg-time">${aiTimeStr}</span>
                        </div>
                        <div class="ai-bubble-card">
                            <div class="ai-category-badge ${badgeClass}">
                                <span>${badgeText}</span>
                            </div>
                            <div class="ai-formatted-content">
                                ${formatAiTextToHtml(answerText)}
                            </div>
                            ${actionBtnHtml}
                            ${followupHtml}
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', aiMsgHtml);
            history.scrollTop = history.scrollHeight;
        }

        function updateBottomSuggestions(suggestions) {
            const bottomBox = document.getElementById('bottomSuggestionsContainer');
            if (bottomBox && suggestions && suggestions.length) {
                bottomBox.innerHTML = suggestions.map(s => `
                    <button type="button" class="chip-suggestion" onclick="sendCustomMessage('${escapeHtml(s)}')">
                        ${escapeHtml(s)}
                    </button>
                `).join('');
            }
        }

        function removeTyping() {
            const typing = document.getElementById('typingIndicator');
            if (typing) typing.remove();
        }

        function escapeHtml(text) {
            if (!text) return '';
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
        }

        function formatAiTextToHtml(text) {
            if (!text) return '';
            let raw = escapeHtml(text);
            
            // Format bold **text**
            raw = raw.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

            // Format lines with bullet or numbered steps
            const lines = raw.split('\n');
            let formatted = '';
            let inList = false;
            let listType = 'ul';

            lines.forEach(line => {
                const trimmed = line.trim();
                if (!trimmed) {
                    if (inList) { formatted += `</${listType}>`; inList = false; }
                    return;
                }

                // Check for numbered list (e.g. "1. Langkah")
                const numMatch = trimmed.match(/^(\d+)\.\s+(.*)$/);
                if (numMatch) {
                    if (!inList || listType !== 'ol') {
                        if (inList) formatted += `</${listType}>`;
                        formatted += '<ol>';
                        inList = true;
                        listType = 'ol';
                    }
                    formatted += `<li>${numMatch[2]}</li>`;
                    return;
                }

                // Check for bullet list (e.g. "• item" or "- item")
                const bulletMatch = trimmed.match(/^([•\-\*])\s+(.*)$/);
                if (bulletMatch) {
                    if (!inList || listType !== 'ul') {
                        if (inList) formatted += `</${listType}>`;
                        formatted += '<ul>';
                        inList = true;
                        listType = 'ul';
                    }
                    formatted += `<li>${bulletMatch[2]}</li>`;
                    return;
                }

                // Regular paragraph
                if (inList) { formatted += `</${listType}>`; inList = false; }
                formatted += `<p>${trimmed}</p>`;
            });

            if (inList) formatted += `</${listType}>`;
            return formatted;
        }
    </script>

</body>
</html>
