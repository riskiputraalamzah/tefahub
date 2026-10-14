import Lenis from "lenis";

// ── Ultra-Smooth, Responsive Inertia Scrolling (Lenis) ───────────────────────
function initSmoothScroll() {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return null;

    // Mobile & touch devices use native iOS/Android momentum scroll
    const isCoarseTouch = window.matchMedia("(hover: none) and (pointer: coarse)").matches;
    if (isCoarseTouch) return null;

    const lenis = new Lenis({
        // 0.65s duration: snappy, responsive, natural without dragging lag
        duration: 0.65,
        // Fluid exponential out deceleration: starts instantly, settles gracefully
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        orientation: "vertical",
        gestureOrientation: "vertical",
        smoothWheel: true,
        wheelMultiplier: 1.05,
        touchMultiplier: 0,
        infinite: false,
        autoRaf: true,
    });

    // Anchor smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");
            if (targetId && targetId !== "#") {
                const targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    lenis.scrollTo(targetEl, { offset: -68, duration: 0.6 });
                }
            }
        });
    });

    return lenis;
}

// ── High-Performance Single-Pass Reveal & Fade In System ────────────────────
let _revealObserver = null;
let _revealReady = false;

function initLayeredScrollEffects(force) {
    if (_revealReady && !force) return;
    _revealReady = true;

    if (_revealObserver) {
        _revealObserver.disconnect();
        _revealObserver = null;
    }

    // Attach scroll-layer-section to all primary landing page sections
    const sectionSelectors = [
        ".hero",
        ".principal-section",
        ".logo-marquee-section",
        ".about-section",
        ".value-prop-section",
        ".services-section",
        ".showcase-section",
        ".facilities-section",
        ".ai-section",
        ".alumni-section",
        ".cta-banner-section",
        ".supporters-section",
        ".main-footer",
        "[data-scroll-layer]"
    ];

    document.querySelectorAll(sectionSelectors.join(", ")).forEach((sec) => {
        if (!sec.classList.contains("scroll-layer-section")) {
            sec.classList.add("scroll-layer-section");
        }
    });

    const targetSelectors = [
        ".scroll-layer-section",
        "[data-reveal]",
        "[data-stagger]",
        ".reveal",
        ".reveal-left",
        ".reveal-right",
        ".reveal-scale",
    ];

    const targets = document.querySelectorAll(targetSelectors.join(", "));
    if (!targets.length) return;

    const vh = window.innerHeight || document.documentElement.clientHeight;

    // The hero / topmost section is revealed immediately without waiting for scroll
    const hero = document.querySelector(".hero");
    if (hero) hero.classList.add("is-revealed");

    // Reveal elements currently visible on the initial screen
    targets.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.top < vh * 0.65) {
            el.classList.add("is-revealed");
        }
    });

    if (!("IntersectionObserver" in window)) {
        targets.forEach((el) => el.classList.add("is-revealed"));
        return;
    }

    // High performance observer: Triggers each section to rise one-by-one as user scrolls
    _revealObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-revealed");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1, rootMargin: "0px 0px -40px 0px" }
    );

    targets.forEach((el) => {
        if (!el.classList.contains("is-revealed")) {
            _revealObserver.observe(el);
        }
    });
}

// ── Dynamic Multi-Color Scroll Progress Bar with Hue Shift ───────────────────
function initScrollProgress() {
    const progress = document.querySelector("[data-scroll-progress]");
    if (!progress) return;

    let ticking = false;
    const updateProgress = () => {
        const total = document.documentElement.scrollHeight - window.innerHeight;
        const ratio = total > 0 ? window.pageYOffset / total : 0;
        const clamped = Math.min(1, Math.max(0, ratio));
        progress.style.transform = `scaleX(${clamped})`;
        progress.style.backgroundPosition = `${clamped * 100}% 0`;
        ticking = false;
    };

    window.addEventListener(
        "scroll",
        () => {
            if (!ticking) {
                window.requestAnimationFrame(updateProgress);
                ticking = true;
            }
        },
        { passive: true }
    );
}

// ── Floating Back-to-Top Navigation Button ──────────────────────────────────
function initBackToTop(lenis) {
    const btn = document.getElementById("backToTopBtn");
    if (!btn) return;

    let ticking = false;
    const checkScroll = () => {
        const scrolled = window.pageYOffset || document.documentElement.scrollTop;
        if (scrolled > 360) {
            btn.classList.add("is-visible");
        } else {
            btn.classList.remove("is-visible");
        }
        ticking = false;
    };

    window.addEventListener(
        "scroll",
        () => {
            if (!ticking) {
                window.requestAnimationFrame(checkScroll);
                ticking = true;
            }
        },
        { passive: true }
    );

    btn.addEventListener("click", () => {
        if (lenis) {
            lenis.scrollTo(0, { duration: 0.7 });
        } else {
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    });
}

// ── Fast Autocomplete & Quick Destination Suggestions ────────────────────────
function initSearchAutocomplete(lenis) {
    const input = document.getElementById("heroSearchInput");
    const dropdown = document.getElementById("searchSuggestionsDropdown");
    if (!input || !dropdown) return;

    const quickLinks = [
        { title: "PPDB & Pendaftaran Online", cat: "Pendaftaran", icon: "📝", target: "/ppdb", isRoute: true },
        { title: "Kuis Minat Jurusan AI", cat: "Eksplorasi", icon: "⚡", target: "/kuis-jurusan", isRoute: true },
        { title: "BKK Lowongan Kerja Mitra", cat: "Karier", icon: "💼", target: "/bkk", isRoute: true },
        { title: "PKL & Magang Industri", cat: "Praktik", icon: "🏭", target: "/pkl", isRoute: true },
        { title: "Fasilitas Lab & Bengkel Standar Industri", cat: "Sarana", icon: "🔬", target: "#fasilitas", isRoute: false },
        { title: "Teaching Factory & Unit Produksi BLUD", cat: "Produk", icon: "🛍️", target: "#produk", isRoute: false },
        { title: "Keunggulan SMK Akreditasi A & Fasilitas", cat: "Mutu", icon: "⭐", target: "#keunggulan", isRoute: false },
        { title: "Sambutan & Profil Kepala Sekolah", cat: "Profil", icon: "🎓", target: "#sambutan", isRoute: false }
    ];

    function renderSuggestions(query = "") {
        const q = query.trim().toLowerCase();
        const matches = quickLinks.filter((item) => {
            if (!q) return true;
            return item.title.toLowerCase().includes(q) || item.cat.toLowerCase().includes(q);
        });

        if (!matches.length) {
            dropdown.innerHTML = `<div style="padding: 12px; font-size: 13px; color: #64748b; text-align: center;">Tidak ada hasil langsung. Tekan enter untuk mencari dengan Tanya Tefa AI.</div>`;
            dropdown.classList.add("is-open");
            dropdown.setAttribute("aria-hidden", "false");
            return;
        }

        let html = `<div class="suggestion-header">Navigasi Cepat &amp; Layanan</div>`;
        matches.slice(0, 5).forEach((item) => {
            html += `
                <div class="suggestion-item" data-target="${item.target}" data-is-route="${item.isRoute}">
                    <span class="suggestion-item-icon">${item.icon}</span>
                    <span class="suggestion-item-text">${item.title}</span>
                    <span class="suggestion-item-badge">${item.cat}</span>
                </div>
            `;
        });

        dropdown.innerHTML = html;
        dropdown.classList.add("is-open");
        dropdown.setAttribute("aria-hidden", "false");

        dropdown.querySelectorAll(".suggestion-item").forEach((el) => {
            el.addEventListener("mousedown", (e) => {
                e.preventDefault();
                const target = el.getAttribute("data-target");
                const isRoute = el.getAttribute("data-is-route") === "true";
                dropdown.classList.remove("is-open");
                dropdown.setAttribute("aria-hidden", "true");

                if (isRoute) {
                    window.location.href = target;
                } else {
                    const elTarget = document.querySelector(target);
                    if (elTarget) {
                        if (lenis) {
                            lenis.scrollTo(elTarget, { offset: -68, duration: 0.6 });
                        } else {
                            elTarget.scrollIntoView({ behavior: "smooth" });
                        }
                    }
                }
            });
        });
    }

    input.addEventListener("focus", () => {
        renderSuggestions(input.value);
    });

    input.addEventListener("input", () => {
        renderSuggestions(input.value);
    });

    document.addEventListener("click", (e) => {
        if (!e.target.closest(".search-wrap")) {
            dropdown.classList.remove("is-open");
            dropdown.setAttribute("aria-hidden", "true");
        }
    });

    // Keyboard shortcut: Pressing '/' or 'Ctrl+K' focuses the search input
    document.addEventListener("keydown", (e) => {
        if ((e.key === "/" || (e.ctrlKey && e.key.toLowerCase() === "k")) && document.activeElement !== input) {
            if (!["INPUT", "TEXTAREA"].includes(document.activeElement.tagName)) {
                e.preventDefault();
                input.focus();
                input.select();
            }
        } else if (e.key === "Escape" && dropdown.classList.contains("is-open")) {
            dropdown.classList.remove("is-open");
            dropdown.setAttribute("aria-hidden", "true");
        }
    });
}

// ── Rotating Inspiring Tips & Insights in Hero Badge ────────────────────────
function initRotatingTips() {
    const badge = document.getElementById("heroPillBadge");
    const textEl = document.getElementById("heroPillText");
    if (!badge || !textEl) return;

    const tips = [
        "Platform Resmi SMK Pusat Keunggulan & BLUD",
        "💡 98% Lulusan Terserap di Industri Mitra & BKK",
        "🚀 Unit Teaching Factory Bersertifikasi Standar Industri",
        "✨ Coba Kuis Minat Jurusan AI untuk Rekomendasi Instan",
        "🏆 Akreditasi A & Sertifikasi LSP-P1 Nasional"
    ];

    let currentIndex = 0;

    function nextTip() {
        textEl.classList.add("fade-out");
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % tips.length;
            textEl.textContent = tips[currentIndex];
            textEl.classList.remove("fade-out");
            textEl.classList.add("fade-in");
            setTimeout(() => {
                textEl.classList.remove("fade-in");
            }, 350);
        }, 300);
    }

    let interval = setInterval(nextTip, 6500);

    badge.addEventListener("click", () => {
        clearInterval(interval);
        nextTip();
        interval = setInterval(nextTip, 6500);
    });
}

// ── Dark/Light Mode Theme Toggle ────────────────────────────────────────────
function initThemeToggle() {
    const desktopBtn = document.getElementById("themeToggleBtn");
    const mobileBtn = document.getElementById("mobileThemeToggleBtn");

    const getPreferredTheme = () => {
        const stored = localStorage.getItem("tefa_theme");
        if (stored) return stored;
        return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
    };

    const setTheme = (theme) => {
        if (theme === "dark") {
            document.documentElement.setAttribute("data-theme", "dark");
        } else {
            document.documentElement.removeAttribute("data-theme");
        }
        localStorage.setItem("tefa_theme", theme);
        updateButtons(theme);
    };

    const updateButtons = (theme) => {
        const iconSvg = theme === "dark"
            ? `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>`
            : `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>`;

        [desktopBtn, mobileBtn].forEach((btn) => {
            if (btn) {
                btn.innerHTML = iconSvg;
                btn.title = theme === "dark" ? "Beralih ke Mode Terang" : "Beralih ke Mode Gelap";
            }
        });
    };

    const initialTheme = getPreferredTheme();
    setTheme(initialTheme);

    const toggle = () => {
        const current = document.documentElement.getAttribute("data-theme") === "dark" ? "dark" : "light";
        setTheme(current === "dark" ? "light" : "dark");
    };

    if (desktopBtn) desktopBtn.addEventListener("click", toggle);
    if (mobileBtn) mobileBtn.addEventListener("click", toggle);
}

// ── Image Lazy Loading & Async Decoding Acceleration ─────────────────────────
function initLazyImages() {
    const images = document.querySelectorAll("img:not([loading])");
    images.forEach((img) => {
        // Do not lazy load the main hero student image for optimal LCP score
        if (!img.classList.contains("students-img") && !img.closest(".hero-content")) {
            img.setAttribute("loading", "lazy");
            img.setAttribute("decoding", "async");
        }
    });
}

// ── Statistic Counters Animation (Single-pass RAF) ──────────────────────────
function initCounters() {
    const counters = document.querySelectorAll("[data-counter]");
    if (!counters.length) return;

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const counter = entry.target;
                obs.unobserve(counter);

                const raw = counter.getAttribute("data-counter") || counter.textContent;
                const targetVal = parseFloat(raw.replace(/[^0-9.]/g, ""));
                if (isNaN(targetVal)) return;

                const decimals = targetVal % 1 !== 0 ? 1 : 0;
                const prefix = counter.getAttribute("data-prefix") || "";
                const suffix = counter.getAttribute("data-suffix") || "";

                const startTime = performance.now();
                const duration = 1200; // 1.2s smooth animation

                function step(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    // Smooth easeOutCubic
                    const easeVal = 1 - Math.pow(1 - progress, 3);
                    const currentNum = easeVal * targetVal;

                    counter.textContent = prefix + currentNum.toFixed(decimals) + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(step);
                    } else {
                        counter.textContent = prefix + targetVal.toFixed(decimals) + suffix;
                    }
                }

                requestAnimationFrame(step);
            });
        },
        { threshold: 0.15 }
    );

    counters.forEach((el) => observer.observe(el));
}

// ── Bootstrapping ────────────────────────────────────────────────────────────
function boot() {
    const lenis = initSmoothScroll();
    initLayeredScrollEffects(false);
    initScrollProgress();
    initBackToTop(lenis);
    initSearchAutocomplete(lenis);
    initRotatingTips();
    initThemeToggle();
    initLazyImages();
    initCounters();

    // After onboarding splash exits, trigger a single scan for viewport elements
    window.addEventListener(
        "tefa-onboarding-done",
        () => {
            initLayeredScrollEffects(true);
        },
        { once: true }
    );
}

// ── Shared Global Helper ────────────────────────────────────────────────────
window.escapeHtml = function (str) {
    if (!str) return "";
    return String(str)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
};

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot, { once: true });
} else {
    boot();
}

