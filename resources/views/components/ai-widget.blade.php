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
        <img src="{{ asset('assets/image copy 5.webp') }}" alt="Asisten Tanya Tefa AI" class="ai-mascot-img" width="130" height="140" loading="lazy">
    </div>

    <span class="ai-trigger-badge" id="ai-notif-badge" style="display:none;"></span>
</button>

{{-- Help Panel Modal --}}
<div id="ai-navigator-panel" class="ai-panel" role="dialog" aria-label="Pusat Bantuan Tefa-Hub" aria-hidden="true">

    {{-- Panel Header --}}
    <div class="ai-header">
        <div class="ai-header-brand">
            <div class="ai-header-avatar">
                <img src="{{ asset('assets/image copy 5.webp') }}" alt="Tanya Tefa AI" class="ai-avatar-img" width="28" height="28">
                <span class="ai-status-pulse"></span>
            </div>
            <div class="ai-header-info">
                <h3 class="ai-header-title">Tanya Tefa AI</h3>
                <span class="ai-header-sub">Asisten Digital Vokasi • Online</span>
            </div>
        </div>
        <div class="ai-header-actions">
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
            <button type="submit" class="ai-submit" id="ai-send-btn" aria-label="Kirim pertanyaan">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"/>
                    <polygon points="22 2 15 22 11 13 2 9 22 2" fill="currentColor" opacity="0.9" stroke="none"/>
                </svg>
            </button>
        </form>
        <p class="ai-powered">Didukung teknologi AI · Tefa-Hub</p>
    </div>
</div>

{{-- Unified High-Performance Chat Logic --}}
<script>
(function () {
    'use strict';
    if (window.__aiWidgetLoaded) return;
    window.__aiWidgetLoaded = true;

    const GREET_URL  = '{{ route("ai.greet") }}';
    const CHAT_URL   = '{{ route("ai.chat") }}';
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content || '';
    const AI_GREETING_KEY = 'tefa-hub-ai-greeting-played-v2';

    let panel, backdrop, toggleBtn, closeBtn, conversation, form, field, submitBtn, quickActions, badge, greetCard, initLoading;
    let isOpen = false, isBusy = false, greeted = false;
    let chatHistory = [];
    let hasPlayedAiGreeting = sessionStorage.getItem(AI_GREETING_KEY) === 'played';

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
        utterance.rate = 0.82;
        utterance.pitch = 0.98;
        utterance.volume = 0.9;

        if (voice) {
            utterance.voice = voice;
        }

        window.speechSynthesis.cancel();
        window.speechSynthesis.speak(utterance);
    }

    function initAiWidget() {
        panel        = document.getElementById('ai-navigator-panel');
        backdrop     = document.getElementById('ai-navigator-backdrop');
        toggleBtn    = document.getElementById('ai-toggle-btn');
        closeBtn     = document.getElementById('ai-close-btn');
        conversation = document.getElementById('ai-messages');
        form         = document.getElementById('ai-chat-form');
        field        = document.getElementById('ai-message-input');
        submitBtn    = document.getElementById('ai-send-btn');
        quickActions = document.getElementById('ai-suggestions');
        badge        = document.getElementById('ai-notif-badge');
        greetCard    = document.getElementById('ai-greeting-card');
        initLoading  = document.getElementById('ai-initial-typing');

        if (!panel || !toggleBtn) return;

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
        row.innerHTML = `
            <div class="ai-msg ai-msg--reply">
                <span class="ai-cat-badge ${badgeCls}">${badgeTxt}</span>
                <div class="ai-reply-body">${mdFull(text)}</div>
                ${ctaHtml}
            </div>`;
        conversation.appendChild(row);
        scrollEnd();

        if (sugg.length) buildQuickActions(sugg);
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
