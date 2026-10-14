{{-- ═══════════════════════════════════════════
     UNIFIED HIGH-PERFORMANCE TANYA TEFA AI WIDGET
     ═══════════════════════════════════════════ --}}
@props([
    'subtitle' => 'Pusat Bantuan 24/7',
    'greetingKicker' => 'Mulai Percakapan',
    'greetingTitle' => 'Halo, saya Tanya Tefa',
    'greetingSub' => 'Temukan informasi seputar SMK, PPDB, BLUD, hingga Karir BKK secara instan.',
    'topics' => null
])

{{-- Backdrop Overlay (Closes panel on tap outside) --}}
<div id="ai-navigator-backdrop" class="ai-backdrop" aria-hidden="true"></div>

{{-- Floating Trigger Button: Large Mascot Robot + Pill Sapaan (Matching Reference Image) --}}
<button id="ai-toggle-btn" class="ai-trigger" type="button" aria-label="Buka Tanya Tefa AI" aria-expanded="false" aria-controls="ai-navigator-panel" title="Tanya Tefa AI">
    {{-- Pill Sapaan Tepat di Atas / Samping Kepala Robot --}}
    <div class="ai-pill-badge" id="ai-pill-badge" aria-hidden="true">
        <span class="ai-pill-dot"></span>
        <span class="ai-pill-text">Hai, tanya aku Tefa AI</span>
    </div>

    {{-- Robot Mascot Container (Besar & Statis Sesuai Gambar) --}}
    <div class="ai-mascot-wrap">
        <img src="{{ asset('assets/image copy 5.png') }}" alt="Asisten Tanya Tefa AI" class="ai-mascot-img" width="130" height="140" loading="lazy">
    </div>

    <span class="ai-trigger-badge" id="ai-notif-badge" style="display:none;"></span>
</button>

{{-- Help Panel Modal --}}
<div id="ai-navigator-panel" class="ai-panel" role="dialog" aria-label="Pusat Bantuan Tefa-Hub" aria-hidden="true">

    {{-- Panel Header --}}
    <div class="ai-header">
        <div class="ai-header-brand">
            <div class="ai-header-avatar">
                <img src="{{ asset('assets/image copy 5.png') }}" alt="Tanya Tefa AI" class="ai-avatar-img" width="28" height="28">
                <span class="ai-status-pulse"></span>
            </div>
            <div class="ai-header-info">
                <h3 class="ai-header-title">Tanya Tefa AI</h3>
                <span class="ai-header-sub"><span class="ai-live-dot" aria-hidden="true"></span> Asisten Digital Vokasi • Real-Time</span>
            </div>
        </div>
        <div class="ai-header-actions">
            <button class="ai-icon-btn" id="ai-sound-btn" type="button" aria-label="Pengaturan Suara" title="Aktifkan / Matikan Suara Notifikasi">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                    <path d="M15.54 8.46a5 5 0 0 1 0 7.07"/>
                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14"/>
                </svg>
            </button>
            <button class="ai-icon-btn" id="ai-reset-btn" type="button" aria-label="Percakapan Baru" title="Mulai Percakapan Baru">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                    <path d="M3 3v5h5"/>
                </svg>
            </button>
            <button class="ai-close-btn" id="ai-close-btn" type="button" aria-label="Tutup Tanya Tefa">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Greeting Card --}}
    <div class="ai-greeting-card" id="ai-greeting-card">
        <p class="ai-greeting-kicker">{{ $greetingKicker }}</p>
        <p class="ai-greeting-label">{{ $greetingTitle }} <span aria-hidden="true">👋</span></p>
        <p class="ai-greeting-sub">{{ $greetingSub }}</p>
        <p class="ai-role-label">Pilih Peran Anda Untuk Navigasi Cepat:</p>
        <div class="ai-nav-categories">
            <button class="ai-nav-cat" type="button" onclick="window.sendNavChip && window.sendNavChip('Saya Mitra Industri / Perusahaan')">
                <span class="ai-nav-cat-icon">🏢</span>
                <div><strong>Mitra Industri</strong><span>Kerjasama TEFA & PKL</span></div>
            </button>
            <button class="ai-nav-cat" type="button" onclick="window.sendNavChip && window.sendNavChip('Saya Orang Tua / Calon Siswa (Info PPDB)')">
                <span class="ai-nav-cat-icon">👨‍👩‍👧</span>
                <div><strong>Orang Tua & Calon</strong><span>PPDB & Jurusan</span></div>
            </button>
            <button class="ai-nav-cat" type="button" onclick="window.sendNavChip && window.sendNavChip('Saya Guru Pembimbing / Pendidik')">
                <span class="ai-nav-cat-icon">👨‍🏫</span>
                <div><strong>Guru Pembimbing</strong><span>Monitoring PKL & Nilai</span></div>
            </button>
            <button class="ai-nav-cat" type="button" onclick="window.sendNavChip && window.sendNavChip('Saya Siswa Aktif SMK')">
                <span class="ai-nav-cat-icon">🎓</span>
                <div><strong>Siswa Aktif</strong><span>BLUD, Magang & Rapor</span></div>
            </button>
            <button class="ai-nav-cat ai-nav-cat-wide" type="button" onclick="window.sendNavChip && window.sendNavChip('Saya Admin / Pengelola Sistem')">
                <span class="ai-nav-cat-icon">🏛️</span>
                <div><strong>Admin & Tata Usaha (TU)</strong><span>Layanan surat, akun & operasional</span></div>
            </button>
        </div>
    </div>

    {{-- Conversation Area --}}
    <div class="ai-conversation" id="ai-messages" role="log" aria-live="polite">
        <div class="ai-loading-row" id="ai-initial-typing">
            <div class="ai-loading-dots"><span></span><span></span><span></span></div>
            <span class="ai-loading-text">Menghubungkan asisten...</span>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="ai-quick-actions" id="ai-suggestions"></div>

    {{-- Input Bar --}}
    <div class="ai-input-wrap">
        <form id="ai-chat-form" class="ai-form">
            @csrf
            <input
                type="text"
                id="ai-message-input"
                class="ai-field"
                placeholder="Tulis pertanyaan Anda..."
                autocomplete="off"
                maxlength="500"
                aria-label="Pertanyaan untuk tim Tefa-Hub"
            >
            <button type="button" class="ai-mic-btn" id="ai-mic-btn" aria-label="Input Suara (Bicara)" title="Bicara untuk mendikte pertanyaan otomatis">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/>
                    <path d="M19 10v2a7 7 0 0 1-14 0v-2"/>
                    <line x1="12" y1="19" x2="12" y2="23"/>
                    <line x1="8" y1="23" x2="16" y2="23"/>
                </svg>
            </button>
            <button type="submit" class="ai-submit" id="ai-send-btn" aria-label="Kirim pertanyaan">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"/>
                    <polygon points="22 2 15 22 11 13 2 9 22 2" fill="currentColor" opacity="0.9" stroke="none"/>
                </svg>
            </button>
        </form>
        <p class="ai-powered">Didukung teknologi AI · Vokasi Tefa-Hub Real-Time</p>
    </div>
</div>

{{-- Unified High-Performance Real-Time Chat Logic --}}
<script>
(function () {
    'use strict';
    if (window.__aiWidgetLoaded) return;
    window.__aiWidgetLoaded = true;

    const GREET_URL  = '{{ route("ai.greet") }}';
    const CHAT_URL   = '{{ route("ai.chat") }}';
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content || '';
    const AI_GREETING_KEY = 'tefa-hub-ai-greeting-played-v2';
    const AI_SOUND_KEY = 'tefa-hub-ai-sound-enabled';

    let panel, backdrop, toggleBtn, closeBtn, resetBtn, soundBtn, micBtn;
    let conversation, form, field, submitBtn, quickActions, badge, greetCard, initLoading;
    let isOpen = false, isBusy = false, greeted = false;
    let chatHistory = [];
    let hasPlayedAiGreeting = sessionStorage.getItem(AI_GREETING_KEY) === 'played';
    let isSoundEnabled = localStorage.getItem(AI_SOUND_KEY) !== 'false';
    let currentSpeakingUtterance = null;
    let speechRecognition = null;
    let isListening = false;

    // ── Synthetic Web Audio Chimes (0kb external asset) ──
    let audioCtx = null;
    function getAudioContext() {
        if (!audioCtx && (window.AudioContext || window.webkitAudioContext)) {
            audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        }
        if (audioCtx && audioCtx.state === 'suspended') {
            audioCtx.resume();
        }
        return audioCtx;
    }

    function playTone(freq, type, duration, delay = 0, gainVal = 0.08) {
        if (!isSoundEnabled) return;
        try {
            const ctx = getAudioContext();
            if (!ctx) return;
            const now = ctx.currentTime + delay;
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();

            osc.type = type;
            osc.frequency.setValueAtTime(freq, now);

            gain.gain.setValueAtTime(0.001, now);
            gain.gain.exponentialRampToValueAtTime(gainVal, now + 0.02);
            gain.gain.exponentialRampToValueAtTime(0.001, now + duration);

            osc.connect(gain);
            gain.connect(ctx.destination);

            osc.start(now);
            osc.stop(now + duration + 0.05);
        } catch (_) {}
    }

    function playSentChime() {
        playTone(520, 'sine', 0.09, 0, 0.07);
        playTone(680, 'sine', 0.12, 0.07, 0.06);
    }

    function playReplyChime() {
        playTone(440, 'triangle', 0.1, 0, 0.06);
        playTone(587.33, 'triangle', 0.1, 0.08, 0.06);
        playTone(880, 'sine', 0.18, 0.16, 0.05);
    }

    function speakAiGreeting() {
        if (hasPlayedAiGreeting || !('speechSynthesis' in window)) {
            return;
        }

        hasPlayedAiGreeting = true;
        sessionStorage.setItem(AI_GREETING_KEY, 'played');

        const voices = window.speechSynthesis.getVoices();
        const indonesianVoices = voices.filter((voice) => voice.lang.toLowerCase().startsWith('id'));
        const voice = indonesianVoices.find((availableVoice) => /female|woman|perempuan/i.test(availableVoice.name))
            ?? indonesianVoices.find((availableVoice) => /google|microsoft/i.test(availableVoice.name))
            ?? indonesianVoices[0]
            ?? voices.find((availableVoice) => availableVoice.lang.toLowerCase().startsWith('id'));
        const utterance = new SpeechSynthesisUtterance('Selamat datang di TefaHub. Saya Asisten TefaHub. Silakan sampaikan kebutuhan Anda. Dengan senang hati, saya siap membantu.');

        utterance.lang = 'id-ID';
        utterance.rate = 0.85;
        utterance.pitch = 0.98;
        utterance.volume = 0.9;

        if (voice) {
            utterance.voice = voice;
        }

        window.speechSynthesis.cancel();
        window.speechSynthesis.speak(utterance);
    }

    function speakText(text, btnEl) {
        if (!('speechSynthesis' in window)) return;

        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
            document.querySelectorAll('.ai-tts-btn').forEach(b => {
                b.classList.remove('is-playing');
                b.innerHTML = `<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg> Dengarkan`;
            });
            if (currentSpeakingUtterance && currentSpeakingUtterance._btn === btnEl) {
                currentSpeakingUtterance = null;
                return;
            }
        }

        // Strip HTML & markdown symbols for smooth natural reading
        const plain = text.replace(/<[^>]*>/g, '').replace(/[*_#`[\]()]/g, ' ').replace(/\s+/g, ' ').trim();
        if (!plain) return;

        const utterance = new SpeechSynthesisUtterance(plain);
        utterance.lang = 'id-ID';
        utterance.rate = 0.92;
        utterance.pitch = 1.0;
        utterance._btn = btnEl;

        const voices = window.speechSynthesis.getVoices();
        const indonesianVoices = voices.filter(v => v.lang.toLowerCase().startsWith('id'));
        const voice = indonesianVoices.find(v => /female|perempuan|google|microsoft/i.test(v.name)) || indonesianVoices[0];
        if (voice) utterance.voice = voice;

        utterance.onstart = () => {
            if (btnEl) {
                btnEl.classList.add('is-playing');
                btnEl.innerHTML = `<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg> Berhenti`;
            }
        };

        utterance.onend = utterance.onerror = () => {
            if (btnEl) {
                btnEl.classList.remove('is-playing');
                btnEl.innerHTML = `<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg> Dengarkan`;
            }
            currentSpeakingUtterance = null;
        };

        currentSpeakingUtterance = utterance;
        window.speechSynthesis.speak(utterance);
    }

    function initSpeechRecognition() {
        const SpeechRec = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRec || !micBtn) return;

        try {
            speechRecognition = new SpeechRec();
            speechRecognition.continuous = false;
            speechRecognition.interimResults = true;
            speechRecognition.lang = 'id-ID';

            speechRecognition.onstart = () => {
                isListening = true;
                micBtn.classList.add('is-listening');
                micBtn.title = 'Mendengarkan suara Anda... Klik lagi untuk berhenti.';
                if (field) field.placeholder = 'Mendengarkan... Silakan berbicara.';
                playTone(600, 'sine', 0.1, 0, 0.05);
            };

            speechRecognition.onresult = (event) => {
                let interim = '';
                let final = '';
                for (let i = event.resultIndex; i < event.results.length; ++i) {
                    if (event.results[i].isFinal) {
                        final += event.results[i][0].transcript;
                    } else {
                        interim += event.results[i][0].transcript;
                    }
                }
                if (field) {
                    field.value = final || interim;
                }
            };

            speechRecognition.onerror = (e) => {
                isListening = false;
                micBtn.classList.remove('is-listening');
                if (field) field.placeholder = 'Tulis pertanyaan Anda...';
            };

            speechRecognition.onend = () => {
                isListening = false;
                micBtn.classList.remove('is-listening');
                micBtn.title = 'Bicara untuk mendikte pertanyaan otomatis';
                if (field) {
                    field.placeholder = 'Tulis pertanyaan Anda...';
                    if (field.value.trim()) {
                        field.focus();
                    }
                }
            };

            micBtn.addEventListener('click', () => {
                if (!speechRecognition) return;
                if (isListening) {
                    speechRecognition.stop();
                } else {
                    try {
                        speechRecognition.start();
                    } catch (_) {}
                }
            });
        } catch (_) {
            if (micBtn) micBtn.style.display = 'none';
        }
    }

    function initAiWidget() {
        panel        = document.getElementById('ai-navigator-panel');
        backdrop     = document.getElementById('ai-navigator-backdrop');
        toggleBtn    = document.getElementById('ai-toggle-btn');
        closeBtn     = document.getElementById('ai-close-btn');
        resetBtn     = document.getElementById('ai-reset-btn');
        soundBtn     = document.getElementById('ai-sound-btn');
        micBtn       = document.getElementById('ai-mic-btn');
        conversation = document.getElementById('ai-messages');
        form         = document.getElementById('ai-chat-form');
        field        = document.getElementById('ai-message-input');
        submitBtn    = document.getElementById('ai-send-btn');
        quickActions = document.getElementById('ai-suggestions');
        badge        = document.getElementById('ai-notif-badge');
        greetCard    = document.getElementById('ai-greeting-card');
        initLoading  = document.getElementById('ai-initial-typing');

        if (!panel || !toggleBtn) return;

        // Initialize sound toggle state
        function updateSoundButton() {
            if (!soundBtn) return;
            soundBtn.title = isSoundEnabled ? 'Bunyi Aktif (Klik untuk Mematikan)' : 'Bunyi Senyap (Klik untuk Mengaktifkan)';
            soundBtn.style.color = isSoundEnabled ? '#2563eb' : '#94a3b8';
        }
        updateSoundButton();

        if (soundBtn) {
            soundBtn.addEventListener('click', () => {
                isSoundEnabled = !isSoundEnabled;
                localStorage.setItem(AI_SOUND_KEY, isSoundEnabled ? 'true' : 'false');
                updateSoundButton();
                if (isSoundEnabled) {
                    playTone(660, 'sine', 0.12, 0, 0.08);
                }
            });
        }

        // Initialize reset conversation button
        if (resetBtn) {
            resetBtn.addEventListener('click', () => {
                if (window.speechSynthesis) window.speechSynthesis.cancel();
                if (conversation) {
                    conversation.innerHTML = '';
                }
                if (greetCard) greetCard.style.display = '';
                chatHistory = [];
                greeted = false;
                loadGreeting();
                if (field) {
                    field.value = '';
                    field.focus();
                }
                playTone(400, 'sine', 0.1, 0, 0.05);
            });
        }

        initSpeechRecognition();

        function openPanel() {
            isOpen = true;
            panel.classList.add('is-open');
            panel.setAttribute('aria-hidden', 'false');
            if (backdrop) backdrop.classList.add('is-open');
            toggleBtn.setAttribute('aria-expanded', 'true');
            toggleBtn.classList.add('is-hidden');
            document.body.classList.add('ai-panel-open');
            if (badge) badge.style.display = 'none';
            speakAiGreeting();
            
            setTimeout(() => { if (field) field.focus(); }, 120);
            if (!greeted) { greeted = true; loadGreeting(); }
        }

        function closePanel() {
            isOpen = false;
            panel.classList.remove('is-open');
            panel.setAttribute('aria-hidden', 'true');
            if (backdrop) backdrop.classList.remove('is-open');
            toggleBtn.setAttribute('aria-expanded', 'false');
            toggleBtn.classList.remove('is-hidden');
            document.body.classList.remove('ai-panel-open');
            if (window.speechSynthesis) window.speechSynthesis.cancel();
            if (isListening && speechRecognition) speechRecognition.stop();
        }

        toggleBtn.addEventListener('click', () => isOpen ? closePanel() : openPanel());
        if (closeBtn) closeBtn.addEventListener('click', closePanel);
        if (backdrop) backdrop.addEventListener('click', closePanel);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isOpen) closePanel();
        });

        window.sendNavChip = function(text) {
            if (!text || isBusy) return;
            if (!isOpen) openPanel();
            if (greetCard) greetCard.style.display = 'none';
            if (quickActions) quickActions.innerHTML = '';
            if (field) field.value = text;
            if (form) form.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
        };

        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const text = field ? field.value.trim() : '';
                if (!text || isBusy) return;

                if (greetCard) greetCard.style.display = 'none';
                if (quickActions) quickActions.innerHTML = '';

                appendQuestion(text);
                playSentChime();
                chatHistory.push({ role: 'user', text: text });
                if (chatHistory.length > 8) chatHistory = chatHistory.slice(-8);

                if (field) field.value = '';
                setBusy(true);

                try {
                    const r = await fetch(CHAT_URL, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            message: text,
                            history: chatHistory.slice(0, -1)
                        }),
                    });
                    const data = await r.json();
                    setBusy(false);
                    const replyText = data.answer || data.reply || 'Jawaban Anda telah diterima.';
                    chatHistory.push({ role: 'model', text: replyText });
                    playReplyChime();
                    appendReply(data);
                } catch {
                    setBusy(false);
                    appendReply({ answer: 'Maaf, terjadi gangguan koneksi. Silakan coba kembali sesaat lagi.' });
                }
            });
        }
    }

    async function loadGreeting() {
        try {
            const r = await fetch(GREET_URL);
            const data = await r.json();
            if (initLoading) initLoading.remove();
            if (data.suggestions && data.suggestions.length) {
                buildQuickActions(data.suggestions);
            } else {
                buildQuickActions(['Saya Mitra Industri / Perusahaan', 'Info PPDB & Pendaftaran', 'Saya Guru Pembimbing', 'Katalog Produk BLUD', 'Peluang Karir BKK']);
            }
        } catch {
            if (initLoading) initLoading.remove();
            buildQuickActions(['Saya Mitra Industri / Perusahaan', 'Info PPDB & Pendaftaran', 'Saya Guru Pembimbing', 'Katalog Produk BLUD', 'Peluang Karir BKK']);
        }
    }

    function buildQuickActions(items) {
        if (!quickActions) return;
        quickActions.innerHTML = '';
        items.forEach(text => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'ai-action-chip';
            btn.textContent = text;
            btn.addEventListener('click', () => { window.sendNavChip(text); });
            quickActions.appendChild(btn);
        });
    }

    function appendQuestion(text) {
        if (!conversation) return;
        const row = document.createElement('div');
        row.className = 'ai-row ai-row--user';
        row.innerHTML = `<div class="ai-msg ai-msg--user">${esc(text)}</div>`;
        conversation.appendChild(row);
        scrollEnd();
    }

    // ── Live Streaming Simulation Typewriter for Replies ──
    function appendReply(data) {
        if (!conversation) return;
        const text  = (typeof data === 'string') ? data : (data.answer || data.reply || 'Pertanyaan Anda sudah diterima.');
        const route = (typeof data === 'object') ? data.route : null;
        const label = (typeof data === 'object') ? data.label : null;
        const cat   = ((typeof data === 'object') ? (data.category || '') : '').toUpperCase();
        const sugg  = (typeof data === 'object' && Array.isArray(data.suggestions)) ? data.suggestions : [];

        let badgeCls = 'ai-badge-umum', badgeTxt = 'Tanya Tefa AI';
        if (cat.includes('PPDB'))                              { badgeCls = 'ai-badge-ppdb';     badgeTxt = '👨‍👩‍👧 Info Calon / PPDB'; }
        else if (cat.includes('INDUSTRI'))                     { badgeCls = 'ai-badge-industri'; badgeTxt = '🏢 Mitra Industri / DUDI'; }
        else if (cat.includes('GURU'))                         { badgeCls = 'ai-badge-guru';     badgeTxt = '👨‍🏫 Guru Pembimbing'; }
        else if (cat.includes('SISWA'))                        { badgeCls = 'ai-badge-siswa';    badgeTxt = '🎓 Siswa Aktif SMK'; }
        else if (cat.includes('BLUD'))                         { badgeCls = 'ai-badge-blud';     badgeTxt = '🏭 Teaching Factory BLUD'; }
        else if (cat.includes('BKK') || cat.includes('KARIR')) { badgeCls = 'ai-badge-bkk';      badgeTxt = '💼 Karir & Lowongan BKK'; }
        else if (cat.includes('AKADEMIK'))                     { badgeCls = 'ai-badge-akademik'; badgeTxt = '🎓 Pembelajaran Akademik'; }
        else if (cat.includes('ADMIN') || cat.includes('FAQ')) { badgeCls = 'ai-badge-admin';    badgeTxt = '🏛️ Layanan Admin / TU'; }

        const ctaHtml = (route && label)
            ? `<a href="${route}" class="ai-cta-link">${esc(label)} <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>`
            : '';

        const row = document.createElement('div');
        row.className = 'ai-row ai-row--reply';

        // Target body container
        const fullHtml = mdFull(text);
        const replyId = 'reply-' + Date.now();

        row.innerHTML = `
            <div class="ai-msg ai-msg--reply">
                <span class="ai-cat-badge ${badgeCls}">${badgeTxt}</span>
                <div class="ai-reply-body" id="${replyId}"></div>
                <div class="ai-reply-footer" style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:6px;">
                    ${ctaHtml}
                    <button type="button" class="ai-tts-btn" data-tts-target="${replyId}" title="Dengarkan jawaban ini">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg> Dengarkan
                    </button>
                </div>
            </div>`;
        conversation.appendChild(row);

        const bodyEl = row.querySelector('.ai-reply-body');
        const ttsBtn = row.querySelector('.ai-tts-btn');

        if (ttsBtn) {
            ttsBtn.addEventListener('click', () => speakText(text, ttsBtn));
        }

        // Live stream typing simulation
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            bodyEl.innerHTML = fullHtml;
            scrollEnd();
            if (sugg.length) buildQuickActions(sugg);
            return;
        }

        // Chunk words for smooth live stream feel
        const words = fullHtml.split(/(\s+|<[^>]+>)/g).filter(Boolean);
        let currentIndex = 0;
        let buffer = '';

        function streamStep() {
            const batchSize = Math.min(3, words.length - currentIndex);
            for (let b = 0; b < batchSize; b++) {
                buffer += words[currentIndex++];
            }
            bodyEl.innerHTML = buffer + '<span class="ai-streaming-cursor" aria-hidden="true"></span>';
            scrollEnd();

            if (currentIndex < words.length) {
                setTimeout(streamStep, 16);
            } else {
                bodyEl.innerHTML = fullHtml;
                scrollEnd();
                if (sugg.length) buildQuickActions(sugg);
            }
        }
        streamStep();
    }

    function setBusy(state) {
        isBusy = state;
        if (submitBtn) submitBtn.disabled = state;
        if (field) field.disabled = state;

        if (state) {
            if (!conversation) return;
            const row = document.createElement('div');
            row.id = 'ai-busy-row';
            row.className = 'ai-row ai-row--reply';
            row.innerHTML = `<div class="ai-msg ai-msg--reply ai-msg--loading"><div class="ai-loading-dots"><span></span><span></span><span></span></div></div>`;
            conversation.appendChild(row);
            scrollEnd();
        } else {
            document.getElementById('ai-busy-row')?.remove();
        }
    }

    function scrollEnd() {
        requestAnimationFrame(() => {
            if (conversation) conversation.scrollTop = conversation.scrollHeight;
        });
    }

    function esc(s) {
        if (!s) return '';
        return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;');
    }

    function mdFull(text) {
        if (!text) return '';
        let raw = esc(text);
        raw = raw.replace(/\*\*(.*?)\*\*/g,'<strong>$1</strong>');
        const lines = raw.split('\n');
        let out = '', inList = false, listType = 'ul';
        lines.forEach(line => {
            const t = line.trim();
            if (!t) { if (inList) { out += `</${listType}>`; inList = false; } return; }
            const nm = t.match(/^(\d+)\.\s+(.+)$/);
            if (nm) {
                if (!inList || listType !== 'ol') { if (inList) out += `</${listType}>`; out += '<ol>'; inList = true; listType = 'ol'; }
                out += `<li>${nm[2]}</li>`; return;
            }
            const bm = t.match(/^[•\-\*]\s+(.+)$/);
            if (bm) {
                if (!inList || listType !== 'ul') { if (inList) out += `</${listType}>`; out += '<ul>'; inList = true; listType = 'ul'; }
                out += `<li>${bm[1]}</li>`; return;
            }
            if (inList) { out += `</${listType}>`; inList = false; }
            out += `<p>${t}</p>`;
        });
        if (inList) out += `</${listType}>`;
        return out;
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAiWidget);
    } else {
        initAiWidget();
    }
})();
</script>
