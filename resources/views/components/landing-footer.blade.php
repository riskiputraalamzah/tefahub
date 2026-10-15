{{-- ═══════════════════════════════════════════
     UNIFIED HIGH-PERFORMANCE LANDING FOOTER
     ═══════════════════════════════════════════ --}}
<footer class="site-footer" id="kontak" role="contentinfo">
    <div class="wrap">

        {{-- Main Footer Columns --}}
        <div class="footer-grid">

            {{-- Column 1: Brand & Socials --}}
            <div class="footer-col footer-col-brand">
                <a href="{{ url('/') }}" class="brand" aria-label="Tefa-Hub Beranda">
                    <img src="{{ asset('assets/logo.webp') }}" alt="Logo Tefa-Hub" width="34" height="34">
                    <span class="brand-name">Tefa<span>-Hub</span></span>
                </a>

                <p class="footer-bio">
                    Platform ekosistem digital terpadu untuk pendidikan vokasi SMK: Akademik, Teaching Factory, Praktik Kerja Lapangan (PKL), dan Bursa Kerja Khusus (BKK).
                </p>

                <div class="footer-socials">
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn Tefa-Hub" title="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20" aria-hidden="true">
                            <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.25V10.9H6.46M7.86 6.78a1.62 1.62 0 1 0 0 3.24 1.62 1.62 0 0 0 0-3.24z"/>
                        </svg>
                    </a>
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram Tefa-Hub" title="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="20" height="20" aria-hidden="true">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Column 2: Navigasi --}}
            <div class="footer-col footer-col-nav">
                <h3 class="footer-col-title">NAVIGASI</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('profil') }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('ppdb') }}">PPDB Online</a></li>
                    <li><a href="{{ route('pkl') }}">PKL &amp; Kemitraan Industri</a></li>
                    <li><a href="{{ route('bkk') }}">Career Center (BKK)</a></li>
                </ul>
            </div>

            {{-- Column 3: Layanan TEFA --}}
            <div class="footer-col footer-col-services">
                <h3 class="footer-col-title">LAYANAN TEFA</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('siswa.akademik') }}">E-Rapor Vokasi</a></li>
                    <li><a href="{{ route('siswa.blud') }}">Katalog BLUD</a></li>
                    <li><a href="{{ route('siswa.bkk') }}">Portal Karir BKK</a></li>
                    <li><a href="{{ route('siswa.riwayat') }}">Riwayat Aktivitas</a></li>
                    <li><a href="{{ route('siswa.tanya-tefa') }}">Tanya Tefa AI</a></li>
                </ul>
            </div>

            {{-- Column 4: Informasi & Kontak --}}
            <div class="footer-col footer-col-newsletter">
                <h3 class="footer-col-title">INFORMASI &amp; KONTAK</h3>
                <p class="newsletter-desc">
                    Dapatkan kabar kegiatan sekolah, agenda PKL, sertifikasi industri, dan bursa lowongan kerja terbaru.
                </p>
                <div class="footer-contact-mini">
                    <span class="contact-pill">Email: info@tefahub.sch.id</span>
                    <span class="contact-pill">WA: +62 812-3456-7890</span>
                </div>
                <form id="footerNewsletterForm" class="newsletter-box" onsubmit="handleFooterNewsletter(event, this)">
                    @csrf
                    <input
                        type="email"
                        id="newsletterEmail"
                        placeholder="Alamat email Anda..."
                        class="newsletter-input"
                        required
                        aria-label="Alamat email newsletter"
                    >
                    <button type="submit" class="newsletter-btn" id="newsletterBtn" aria-label="Kirim langganan">
                        <span id="newsletterBtnText">Kirim</span>
                        <svg id="newsletterBtnIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:14px; height:14px;" aria-hidden="true">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </button>
                </form>
            </div>

        </div>

        {{-- Bottom Bar: Copyright & Legal Links --}}
        <div class="footer-bottom">
            <p class="copyright">
                &copy; {{ date('Y') }} TEFA-HUB. Seluruh Hak Cipta Dilindungi.
            </p>
            <div class="legal-links">
                <a href="{{ url('/') }}">Kebijakan Privasi</a>
                <span class="legal-divider">•</span>
                <a href="{{ url('/') }}">Syarat &amp; Ketentuan</a>
            </div>
        </div>

    </div>

    {{-- Interactive Floating Feedback Toast --}}
    <div id="footerNewsletterToast" class="footer-toast" role="status" aria-live="polite" aria-atomic="true">
        <div class="footer-toast-content">
            <svg class="footer-toast-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <div class="footer-toast-body">
                <strong class="footer-toast-title">Pendaftaran Buletin Berhasil!</strong>
                <p class="footer-toast-text">Terima kasih, email Anda telah terdaftar untuk menerima informasi resmi sekolah.</p>
            </div>
        </div>
    </div>
</footer>

{{-- Floating Back-to-Top Navigation Button (Consistent Bottom-Left Pill with Pulse Indicator) --}}
<button type="button" style="padding: 0;width:42px;" class="back-to-top-btn" id="backToTopBtn" aria-label="Kembali ke atas" title="Kembali ke atas">
    <span class="back-to-top-pulse-ring" aria-hidden="true"></span>
    <span class="back-to-top-icon-wrap" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </span>

</button>

<style>
.footer-toast {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 999999;
    max-width: 380px;
    background: #0f172a;
    border: 1px solid rgba(16, 185, 129, 0.4);
    box-shadow: 0 12px 36px -4px rgba(0, 0, 0, 0.45);
    border-radius: 14px;
    padding: 14px 18px;
    opacity: 0;
    transform: translateY(20px) scale(0.96);
    pointer-events: none;
    transition: opacity 0.35s cubic-bezier(0.16, 1, 0.3, 1), transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}
.footer-toast.is-visible {
    opacity: 1;
    transform: translateY(0) scale(1);
    pointer-events: auto;
}
.footer-toast-content {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}
.footer-toast-icon {
    flex-shrink: 0;
    margin-top: 2px;
}
.footer-toast-title {
    display: block;
    font-size: 13.5px;
    font-weight: 700;
    color: #f8fafc;
    margin-bottom: 2px;
}
.footer-toast-text {
    font-size: 12px;
    color: #94a3b8;
    line-height: 1.45;
    margin: 0;
}
</style>

<script>
function handleFooterNewsletter(event, form) {
    event.preventDefault();
    const emailInput = document.getElementById('newsletterEmail');
    const btn = document.getElementById('newsletterBtn');
    const btnText = document.getElementById('newsletterBtnText');
    const toast = document.getElementById('footerNewsletterToast');

    if (!emailInput || !emailInput.value.trim()) return;

    if (btn) btn.disabled = true;
    if (btnText) btnText.textContent = '...';

    setTimeout(function() {
        if (btn) btn.disabled = false;
        if (btnText) btnText.textContent = 'Kirim';
        emailInput.value = '';

        if (toast) {
            toast.classList.add('is-visible');
            setTimeout(function() {
                toast.classList.remove('is-visible');
            }, 4500);
        }
    }, 450);
}

// ── Floating Back-to-Top Button Handler ──
(function() {
    function initFooterBackToTop() {
        const btn = document.getElementById('backToTopBtn');
        if (!btn || btn._bound) return;
        btn._bound = true;

        let ticking = false;
        function checkScroll() {
            const scrolled = window.pageYOffset || document.documentElement.scrollTop;
            if (scrolled > 300) {
                btn.classList.add('is-visible');
            } else {
                btn.classList.remove('is-visible');
            }
            ticking = false;
        }

        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(checkScroll);
                ticking = true;
            }
        }, { passive: true });
        checkScroll();

        btn.addEventListener('click', function() {
            if (typeof window.tefaScrollToTop === 'function') {
                window.tefaScrollToTop();
            } else if (window.__lenis) {
                window.__lenis.scrollTo(0, { duration: 0.65 });
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFooterBackToTop);
    } else {
        initFooterBackToTop();
    }
})();
</script>
