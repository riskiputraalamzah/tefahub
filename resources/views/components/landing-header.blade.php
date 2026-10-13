@props(['active' => ''])

{{-- ═══════════════════════════════════════════
     UNIFIED LANDING / PUBLIC HEADER & NAVBAR
     ═══════════════════════════════════════════ --}}
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
        <button type="button" class="mobile-nav-close" id="mobileNavClose" aria-label="Tutup Menu Navigasi">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
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

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeader);
    } else {
        initHeader();
    }
})();
</script>
