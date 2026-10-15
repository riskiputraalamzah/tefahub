@props(['active' => ''])

{{-- ═══════════════════════════════════════════
     UNIFIED LANDING / PUBLIC HEADER & NAVBAR
     ═══════════════════════════════════════════ --}}
{{-- Immediate Theme Script: Prevent FOUC across all pages --}}
<script>
(function() {
    try {
        var savedTheme = localStorage.getItem('tefa_theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        if (savedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        } else {
            document.documentElement.removeAttribute('data-theme');
        }
    } catch (e) {}
})();
</script>

<header class="site-header" id="siteHeader">
    <div class="wrap">
        <a href="{{ url('/') }}" class="brand" aria-label="Tefa-Hub Beranda">
            <img src="{{ asset('assets/logo.webp') }}" alt="Logo Tefa-Hub" width="36" height="36">
            <span class="brand-name">Tefa<span>-Hub</span></span>
        </a>

        <nav aria-label="Navigasi Utama">
            <ul class="nav-links">
                {{-- Beranda --}}
                <li>
                    <a href="{{ url('/') }}" class="{{ (in_array($active, ['home', 'beranda', '']) && request()->is('/')) ? 'active-nav-link' : '' }}">Beranda</a>
                </li>

                {{-- Layanan Dropdown (PPDB, BLUD, BKK, PKL) --}}
                <li class="nav-dropdown {{ in_array($active, ['ppdb', 'blud', 'bkk', 'pkl']) ? 'has-active' : '' }}">
                    <button type="button" class="nav-dropdown-toggle {{ in_array($active, ['ppdb', 'blud', 'bkk', 'pkl']) ? 'active-nav-link' : '' }}" aria-expanded="false" aria-haspopup="true">
                        <span>Layanan</span>
                        <svg class="dropdown-chevron" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('ppdb') }}" class="dropdown-item {{ $active === 'ppdb' ? 'active-item' : '' }}">PPDB</a>
                        <a href="{{ route('kuis-jurusan') }}" class="dropdown-item {{ $active === 'kuis' ? 'active-item' : '' }}">Kuis Jurusan ⚡</a>
                        <a href="{{ route('ppdb.daftar') }}" class="dropdown-item {{ $active === 'ppdb-daftar' ? 'active-item' : '' }}">Pendaftaran Online</a>
                        <a href="{{ route('bkk') }}" class="dropdown-item {{ $active === 'bkk' ? 'active-item' : '' }}">BKK (Bursa Kerja)</a>
                        <a href="{{ route('pkl') }}" class="dropdown-item {{ $active === 'pkl' ? 'active-item' : '' }}">PKL &amp; Magang Industri</a>
                    </div>
                </li>

                {{-- Tentang Dropdown (Profil Sekolah) --}}
                <li class="nav-dropdown {{ in_array($active, ['tentang', 'profil']) ? 'has-active' : '' }}">
                    <button type="button" class="nav-dropdown-toggle {{ in_array($active, ['tentang', 'profil']) ? 'active-nav-link' : '' }}" aria-expanded="false" aria-haspopup="true">
                        <span>Tentang</span>
                        <svg class="dropdown-chevron" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('profil') }}" class="dropdown-item {{ in_array($active, ['tentang', 'profil']) ? 'active-item' : '' }}">Profil Sekolah</a>
                    </div>
                </li>

                {{-- Kontak --}}
                <li>
                    <a href="{{ url('/#kontak') }}" class="{{ $active === 'kontak' ? 'active-nav-link' : '' }}">Kontak</a>
                </li>
            </ul>
        </nav>

        <div class="header-actions">
            <button type="button" class="theme-toggle-btn" id="themeToggleBtn" aria-label="Ganti Tema Tampilan" title="Ganti Mode Gelap/Terang">
                <svg class="theme-icon-sun" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
            </button>
            <a href="{{ route('login') }}" class="btn-masuk">
                Masuk
            </a>
            <button type="button" class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Buka Menu Navigasi" aria-expanded="false">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </div>
</header>
<div class="site-header-spacer" aria-hidden="true"></div>

{{-- Mobile Navigation Drawer & Backdrop --}}
<div class="mobile-nav-backdrop" id="mobileNavBackdrop" aria-hidden="true"></div>
<div class="mobile-nav-drawer" id="mobileNavDrawer" role="dialog" aria-modal="true" aria-label="Menu Navigasi Mobile">
    <div class="mobile-nav-header">
        <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('assets/logo.webp') }}" alt="Logo Tefa-Hub" width="32" height="32">
            <span class="brand-name">Tefa<span>-Hub</span></span>
        </a>
        <div style="display: flex; align-items: center; gap: 8px;">
            <button type="button" class="theme-toggle-btn" id="mobileThemeToggleBtn" aria-label="Ganti Tema Tampilan" title="Ganti Mode Gelap/Terang">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
            </button>
            <button type="button" class="mobile-nav-close" id="mobileNavClose" aria-label="Tutup Menu Navigasi">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    <ul class="mobile-nav-links">
        <li>
            <a href="{{ url('/') }}" class="mobile-nav-link {{ (in_array($active, ['home', 'beranda', '']) && request()->is('/')) ? 'active' : '' }}">Beranda</a>
        </li>

        {{-- Mobile Group: Layanan --}}
        <li class="mobile-nav-group group-open">
            <button type="button" class="mobile-group-header">
                <span>Layanan</span>
                <svg class="mobile-group-chevron" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <ul class="mobile-sublinks">
                <li><a href="{{ route('ppdb') }}" class="mobile-sublink {{ $active === 'ppdb' ? 'active' : '' }}">PPDB</a></li>
                <li><a href="{{ route('kuis-jurusan') }}" class="mobile-sublink {{ $active === 'kuis' ? 'active' : '' }}">Kuis Jurusan ⚡</a></li>
                <li><a href="{{ route('ppdb.daftar') }}" class="mobile-sublink {{ $active === 'ppdb-daftar' ? 'active' : '' }}">Pendaftaran Online</a></li>
                <li><a href="{{ route('bkk') }}" class="mobile-sublink {{ $active === 'bkk' ? 'active' : '' }}">BKK (Bursa Kerja)</a></li>
                <li><a href="{{ route('pkl') }}" class="mobile-sublink {{ $active === 'pkl' ? 'active' : '' }}">PKL &amp; Magang Industri</a></li>
            </ul>
        </li>

        {{-- Mobile Group: Tentang --}}
        <li class="mobile-nav-group group-open">
            <button type="button" class="mobile-group-header">
                <span>Tentang</span>
                <svg class="mobile-group-chevron" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <ul class="mobile-sublinks">
                <li><a href="{{ route('profil') }}" class="mobile-sublink {{ in_array($active, ['tentang', 'profil']) ? 'active' : '' }}">Profil Sekolah</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ url('/#kontak') }}" class="mobile-nav-link {{ $active === 'kontak' ? 'active' : '' }}">Kontak</a>
        </li>
    </ul>

    <div class="mobile-nav-footer">
        <a href="{{ route('login') }}" class="btn-masuk-mobile">
            Masuk
        </a>
    </div>
</div>

<script>
(function() {
    function initHeader() {
        const header = document.getElementById('siteHeader');
        const toggleBtn = document.getElementById('mobileMenuToggle');
        const closeBtn  = document.getElementById('mobileNavClose');
        const drawer    = document.getElementById('mobileNavDrawer');
        const backdrop  = document.getElementById('mobileNavBackdrop');

        // Scroll behaviour: Scrolled background shadow + hide on scroll down (Jitter-free 120Hz optimized)
        if (header) {
            let lastScrollY = window.pageYOffset || document.documentElement.scrollTop;
            let ticking = false;

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(function() {
                        const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;
                        const delta = currentScrollY - lastScrollY;

                        if (currentScrollY <= 40) {
                            header.classList.remove('nav-hidden');
                        } else if (delta > 8 && currentScrollY > 120) {
                            header.classList.add('nav-hidden');
                        } else if (delta < -8) {
                            header.classList.remove('nav-hidden');
                        }

                        const shouldBeScrolled = currentScrollY > 20;
                        if (header.classList.contains('nav-scrolled') !== shouldBeScrolled) {
                            header.classList.toggle('nav-scrolled', shouldBeScrolled);
                        }

                        lastScrollY = currentScrollY;
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }

        // ── Smart Scroll-to-Top via Navbar (Modern Web Best Practice) ──
        function scrollToPageTop() {
            if (window.__lenis) {
                window.__lenis.scrollTo(0, { duration: 0.65 });
            } else if (window.lenis) {
                window.lenis.scrollTo(0, { duration: 0.65 });
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }
        window.tefaScrollToTop = scrollToPageTop;

        // 1. Click on Brand Logo: If on current page or root and scrolled down, smoothly scroll to top
        const brandLink = header ? header.querySelector('.brand') : null;
        if (brandLink) {
            brandLink.addEventListener('click', function(e) {
                const currentPath = window.location.pathname.replace(/\/+$/, '') || '/';
                const targetPath = new URL(brandLink.href, window.location.origin).pathname.replace(/\/+$/, '') || '/';
                const isScrolled = (window.pageYOffset || document.documentElement.scrollTop) > 20;

                if (currentPath === targetPath && isScrolled) {
                    e.preventDefault();
                    scrollToPageTop();
                }
            });
        }

        // 2. Click on "Beranda" or current active link in navbar: smooth scroll to top instead of page reload
        const headerNavLinks = header ? header.querySelectorAll('.nav-links a, .nav-dropdown-menu a') : [];
        headerNavLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = link.getAttribute('href') || '';
                if (!href || href.startsWith('#')) return;

                const currentUrl = window.location.href.split('#')[0].replace(/\/+$/, '');
                const targetUrl  = new URL(href, window.location.origin).href.split('#')[0].replace(/\/+$/, '');
                const isScrolled = (window.pageYOffset || document.documentElement.scrollTop) > 20;

                if (currentUrl === targetUrl && isScrolled) {
                    e.preventDefault();
                    scrollToPageTop();
                }
            });
        });

        // 3. Double-click or tap on empty area of Navbar: smooth scroll to top (like iOS/macOS top bar)
        if (header) {
            header.addEventListener('dblclick', function(e) {
                if (!e.target.closest('a, button, input, select, textarea, .nav-dropdown-menu')) {
                    scrollToPageTop();
                }
            });
        }

        // Mobile drawer handlers
        function openDrawer() {
            if (drawer && backdrop) {
                drawer.classList.add('is-open');
                backdrop.classList.add('is-open');
                if (toggleBtn) {
                    toggleBtn.classList.add('is-active');
                    toggleBtn.setAttribute('aria-expanded', 'true');
                }
                document.body.classList.add('drawer-open');
            }
        }

        function closeDrawer() {
            if (drawer && backdrop) {
                drawer.classList.remove('is-open');
                backdrop.classList.remove('is-open');
                if (toggleBtn) {
                    toggleBtn.classList.remove('is-active');
                    toggleBtn.setAttribute('aria-expanded', 'false');
                }
                document.body.classList.remove('drawer-open');
            }
        }

        if (toggleBtn) toggleBtn.onclick = function() {
            if (drawer && drawer.classList.contains('is-open')) {
                closeDrawer();
            } else {
                openDrawer();
            }
        };
        if (closeBtn) closeBtn.onclick = closeDrawer;
        if (backdrop) backdrop.onclick = closeDrawer;

        // Close drawer on sublink / link click
        if (drawer) {
            const links = drawer.querySelectorAll('a');
            links.forEach(function(link) {
                link.addEventListener('click', closeDrawer);
            });

            // Mobile group accordion toggles
            const groupHeaders = drawer.querySelectorAll('.mobile-group-header');
            groupHeaders.forEach(function(gh) {
                gh.addEventListener('click', function(e) {
                    e.preventDefault();
                    const parent = gh.closest('.mobile-nav-group');
                    if (parent) {
                        parent.classList.toggle('group-open');
                    }
                });
            });
        }
    }

    function initThemeToggle() {
        const desktopBtn = document.getElementById('themeToggleBtn');
        const mobileBtn  = document.getElementById('mobileThemeToggleBtn');

        function getStoredTheme() {
            try {
                return localStorage.getItem('tefa_theme') ||
                       (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            } catch (e) {
                return 'light';
            }
        }

        function applyTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.documentElement.removeAttribute('data-theme');
            }
            try {
                localStorage.setItem('tefa_theme', theme);
            } catch (e) {}
            updateButtons(theme);
            window.dispatchEvent(new CustomEvent('tefa-theme-change', { detail: { theme: theme } }));
        }

        function updateButtons(theme) {
            const isDark = theme === 'dark';
            const iconSvg = isDark
                ? '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>'
                : '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>';

            [desktopBtn, mobileBtn].forEach(btn => {
                if (btn) {
                    btn.innerHTML = iconSvg;
                    btn.setAttribute('title', isDark ? 'Beralih ke Mode Terang' : 'Beralih ke Mode Gelap');
                    btn.setAttribute('aria-label', isDark ? 'Beralih ke Mode Terang' : 'Beralih ke Mode Gelap');
                }
            });
        }

        // Apply initially
        const currentTheme = getStoredTheme();
        applyTheme(currentTheme);

        function toggle() {
            const current = document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
            const next = current === 'dark' ? 'light' : 'dark';
            applyTheme(next);
        }

        if (desktopBtn && !desktopBtn._tefaThemeBound) {
            desktopBtn.addEventListener('click', toggle);
            desktopBtn._tefaThemeBound = true;
        }
        if (mobileBtn && !mobileBtn._tefaThemeBound) {
            mobileBtn.addEventListener('click', toggle);
            mobileBtn._tefaThemeBound = true;
        }

        window.tefaToggleTheme = toggle;
        window.tefaApplyTheme = applyTheme;
    }

    function initAll() {
        initHeader();
        initThemeToggle();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAll);
    } else {
        initAll();
    }
})();
</script>
