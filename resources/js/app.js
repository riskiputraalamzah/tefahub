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

    const targetSelectors = [
        "[data-reveal]",
        "[data-stagger]",
        ".reveal",
        ".reveal-left",
        ".reveal-right",
        ".reveal-scale",
        ".scroll-layer-section",
    ];

    const targets = document.querySelectorAll(targetSelectors.join(", "));
    if (!targets.length) return;

    const vh = window.innerHeight || document.documentElement.clientHeight;

    // The hero / topmost section and all its contents are revealed immediately
    const hero = document.querySelector(".hero");
    if (hero) {
        hero.classList.add("is-revealed");
        hero.querySelectorAll("[data-reveal], [data-stagger], [data-stagger-item], .reveal, .cards-row, .card").forEach((c) => {
            c.classList.add("is-revealed");
        });
    }

    // Immediately reveal all elements currently on or near the initial screen
    targets.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.top < vh * 1.15) {
            el.classList.add("is-revealed");
            el.querySelectorAll && el.querySelectorAll("[data-stagger-item]").forEach((item) => {
                item.classList.add("is-revealed");
            });
        }
    });

    if (!("IntersectionObserver" in window)) {
        targets.forEach((el) => el.classList.add("is-revealed"));
        return;
    }

    // High performance observer with generous anticipation margin
    _revealObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-revealed");
                    entry.target.querySelectorAll && entry.target.querySelectorAll("[data-stagger-item]").forEach((item) => {
                        item.classList.add("is-revealed");
                    });
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.05, rootMargin: "0px 0px 100px 0px" }
    );

    targets.forEach((el) => {
        if (!el.classList.contains("is-revealed")) {
            _revealObserver.observe(el);
        }
    });

    // Failsafe: Guarantee all sections and items are visible after 1.2s
    setTimeout(() => {
        targets.forEach((el) => {
            el.classList.add("is-revealed");
            el.querySelectorAll && el.querySelectorAll("[data-stagger-item]").forEach((item) => {
                item.classList.add("is-revealed");
            });
        });
    }, 1200);
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

    if (desktopBtn && !desktopBtn._tefaThemeBound) {
        desktopBtn.addEventListener("click", toggle);
        desktopBtn._tefaThemeBound = true;
    }
    if (mobileBtn && !mobileBtn._tefaThemeBound) {
        mobileBtn.addEventListener("click", toggle);
        mobileBtn._tefaThemeBound = true;
    }
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

// ── 3D Card Perspective Tilt & Specular Glare (Innovation #2) ─────────────────
function init3DTilt() {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
    const isFinePointer = window.matchMedia("(hover: hover) and (pointer: fine)").matches;
    if (!isFinePointer) return;

    const cards = document.querySelectorAll("[data-hover-card], .card, .service-card, .ai-card, .blud-card-frame");
    cards.forEach((card) => {
        let frameId = null;
        let rect = null;

        const onPointerEnter = () => {
            rect = card.getBoundingClientRect();
            card.classList.add("is-3d-tilted");
        };

        const onPointerMove = (e) => {
            if (!rect) rect = card.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const mouseY = e.clientY - rect.top;

            const normX = (mouseX / rect.width) - 0.5;
            const normY = (mouseY / rect.height) - 0.5;

            if (frameId) cancelAnimationFrame(frameId);
            frameId = requestAnimationFrame(() => {
                const tiltX = (-normY * 9).toFixed(2);
                const tiltY = (normX * 9).toFixed(2);

                card.style.setProperty("--glare-x", `${((normX + 0.5) * 100).toFixed(1)}%`);
                card.style.setProperty("--glare-y", `${((normY + 0.5) * 100).toFixed(1)}%`);
                card.style.transform = `perspective(850px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) translateZ(6px) scale3d(1.018, 1.018, 1.018)`;
            });
        };

        const onPointerLeave = () => {
            if (frameId) cancelAnimationFrame(frameId);
            card.classList.remove("is-3d-tilted");
            card.style.transform = "";
            card.style.removeProperty("--glare-x");
            card.style.removeProperty("--glare-y");
            rect = null;
        };

        card.addEventListener("pointerenter", onPointerEnter, { passive: true });
        card.addEventListener("pointermove", onPointerMove, { passive: true });
        card.addEventListener("pointerleave", onPointerLeave, { passive: true });
    });
}

// ── Hero Subtle Depth Parallax (Innovation #2) ────────────────────────────────
function initHero3DParallax() {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
    const isFinePointer = window.matchMedia("(hover: hover) and (pointer: fine)").matches;
    if (!isFinePointer) return;

    const hero = document.querySelector(".hero");
    if (!hero) return;

    const bubbleArt = hero.querySelector(".hero-bubble-art");
    const quote = hero.querySelector(".hero-tagline-quote");
    const students = hero.querySelector(".students-img");

    if (!bubbleArt && !quote && !students) return;

    let targetX = 0, targetY = 0;
    let currX = 0, currY = 0;
    let isTracking = false;

    const onMouseMove = (e) => {
        const rect = hero.getBoundingClientRect();
        const normX = ((e.clientX - rect.left) / rect.width) - 0.5;
        const normY = ((e.clientY - rect.top) / rect.height) - 0.5;
        targetX = normX * 16;
        targetY = normY * 16;

        if (!isTracking) {
            isTracking = true;
            updateParallax();
        }
    };

    const updateParallax = () => {
        currX += (targetX - currX) * 0.08;
        currY += (targetY - currY) * 0.08;

        if (bubbleArt) {
            const bx = (currX * 0.4).toFixed(2);
            const by = (currY * 0.4).toFixed(2);
            bubbleArt.style.setProperty("--hero-bubble-x", `${bx}px`);
            bubbleArt.style.setProperty("--hero-bubble-y", `${by}px`);
            bubbleArt.style.transform = `translate(-50%, -50%) translate3d(${bx}px, ${by}px, 0)`;
        }
        if (quote) {
            quote.style.transform = `rotate(5deg) translate3d(${(currX * -0.4).toFixed(2)}px, ${(currY * -0.4).toFixed(2)}px, 0)`;
        }
        if (students) {
            students.style.transform = `translate3d(${(currX * -0.2).toFixed(2)}px, ${(currY * -0.2).toFixed(2)}px, 0)`;
        }

        const delta = Math.abs(targetX - currX) + Math.abs(targetY - currY);
        if (delta > 0.05 || targetX !== 0 || targetY !== 0) {
            requestAnimationFrame(updateParallax);
        } else {
            isTracking = false;
            if (bubbleArt) {
                bubbleArt.style.removeProperty("--hero-bubble-x");
                bubbleArt.style.removeProperty("--hero-bubble-y");
                bubbleArt.style.transform = "";
            }
            if (quote) {
                quote.style.transform = "";
            }
            if (students) {
                students.style.transform = "";
            }
        }
    };

    hero.addEventListener("mousemove", onMouseMove, { passive: true });
    hero.addEventListener("mouseleave", () => {
        targetX = 0;
        targetY = 0;
    }, { passive: true });
}

// ── Interactive Ambient Constellation Particle Canvas (Innovation #3) ─────────
function initInteractiveParticles() {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

    const canvas = document.getElementById("heroParticleCanvas");
    const hero = document.querySelector(".hero");
    if (!canvas || !hero) return;

    const ctx = canvas.getContext("2d");
    if (!ctx) return;

    let width = 0, height = 0;
    let dpr = Math.min(window.devicePixelRatio || 1, 2);
    let animationId = null;
    let isVisible = true;
    const mouse = { x: -9999, y: -9999, radius: 130 };
    const ripples = [];

    // Responsive particle count
    const count = window.innerWidth > 768 ? 48 : 22;
    const particles = [];

    const colors = [
        "rgba(37, 99, 235, ",   // Blue
        "rgba(56, 189, 248, ",  // Cyan
        "rgba(99, 102, 241, ",  // Indigo
        "rgba(139, 92, 246, "   // Violet
    ];

    function resize() {
        const rect = hero.getBoundingClientRect();
        width = rect.width;
        height = rect.height;
        dpr = Math.min(window.devicePixelRatio || 1, 2);

        canvas.width = Math.floor(width * dpr);
        canvas.height = Math.floor(height * dpr);
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;
        ctx.scale(dpr, dpr);
    }

    class Particle {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.vx = (Math.random() - 0.5) * 0.45;
            this.vy = (Math.random() - 0.5) * 0.45;
            this.radius = Math.random() * 1.8 + 1.2;
            this.baseAlpha = Math.random() * 0.35 + 0.25;
            this.colorPrefix = colors[Math.floor(Math.random() * colors.length)];
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            if (this.x < 0) this.x = width;
            else if (this.x > width) this.x = 0;
            if (this.y < 0) this.y = height;
            else if (this.y > height) this.y = 0;

            // Mouse proximity interaction (soft repulsion)
            const dx = mouse.x - this.x;
            const dy = mouse.y - this.y;
            const dist = Math.hypot(dx, dy);

            if (dist < mouse.radius) {
                const force = (mouse.radius - dist) / mouse.radius;
                const angle = Math.atan2(dy, dx);
                this.x -= Math.cos(angle) * force * 1.8;
                this.y -= Math.sin(angle) * force * 1.8;
            }

            // Ripples shockwave
            for (let r = 0; r < ripples.length; r++) {
                const rip = ripples[r];
                const rdx = this.x - rip.x;
                const rdy = this.y - rip.y;
                const rdist = Math.hypot(rdx, rdy);
                if (Math.abs(rdist - rip.currentRadius) < 25) {
                    const waveForce = (1 - (rip.currentRadius / rip.maxRadius)) * 2;
                    this.x += (rdx / rdist) * waveForce;
                    this.y += (rdy / rdist) * waveForce;
                }
            }
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fillStyle = this.colorPrefix + this.baseAlpha + ")";
            ctx.fill();
        }
    }

    function init() {
        resize();
        particles.length = 0;
        for (let i = 0; i < count; i++) {
            particles.push(new Particle());
        }
    }

    function render() {
        if (!isVisible) return;

        ctx.clearRect(0, 0, width, height);

        const isDark = document.documentElement.getAttribute("data-theme") === "dark";
        const maxDist = 95;

        // Draw constellation web lines
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const dist = Math.hypot(dx, dy);

                if (dist < maxDist) {
                    const alpha = (1 - dist / maxDist) * (isDark ? 0.35 : 0.22);
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.strokeStyle = isDark
                        ? `rgba(56, 189, 248, ${alpha})`
                        : `rgba(37, 99, 235, ${alpha})`;
                    ctx.lineWidth = 0.85;
                    ctx.stroke();
                }
            }
        }

        // Draw mouse connecting threads
        if (mouse.x > 0 && mouse.y > 0) {
            for (let i = 0; i < particles.length; i++) {
                const dx = mouse.x - particles[i].x;
                const dy = mouse.y - particles[i].y;
                const dist = Math.hypot(dx, dy);

                if (dist < mouse.radius) {
                    const alpha = (1 - dist / mouse.radius) * (isDark ? 0.45 : 0.32);
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(mouse.x, mouse.y);
                    ctx.strokeStyle = `rgba(56, 189, 248, ${alpha})`;
                    ctx.lineWidth = 1.1;
                    ctx.stroke();
                }
            }
        }

        // Update and draw ripple pulses
        for (let r = ripples.length - 1; r >= 0; r--) {
            const rip = ripples[r];
            rip.currentRadius += 3.5;
            const ripAlpha = (1 - rip.currentRadius / rip.maxRadius) * 0.3;

            ctx.beginPath();
            ctx.arc(rip.x, rip.y, rip.currentRadius, 0, Math.PI * 2);
            ctx.strokeStyle = `rgba(56, 189, 248, ${Math.max(0, ripAlpha)})`;
            ctx.lineWidth = 1.5;
            ctx.stroke();

            if (rip.currentRadius >= rip.maxRadius) {
                ripples.splice(r, 1);
            }
        }

        // Update and draw particles
        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();
        }

        animationId = requestAnimationFrame(render);
    }

    init();
    animationId = requestAnimationFrame(render);

    // Event listeners
    let resizeTimer = null;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            resize();
            for (let i = 0; i < particles.length; i++) {
                particles[i].x = Math.min(particles[i].x, width);
                particles[i].y = Math.min(particles[i].y, height);
            }
        }, 120);
    }, { passive: true });

    hero.addEventListener("mousemove", (e) => {
        const rect = hero.getBoundingClientRect();
        mouse.x = e.clientX - rect.left;
        mouse.y = e.clientY - rect.top;
    }, { passive: true });

    hero.addEventListener("mouseleave", () => {
        mouse.x = -9999;
        mouse.y = -9999;
    }, { passive: true });

    hero.addEventListener("pointerdown", (e) => {
        const rect = hero.getBoundingClientRect();
        ripples.push({
            x: e.clientX - rect.left,
            y: e.clientY - rect.top,
            currentRadius: 5,
            maxRadius: 110
        });
        if (ripples.length > 3) ripples.shift();
    }, { passive: true });

    // IntersectionObserver safeguard: pause when hero is off-screen
    if ("IntersectionObserver" in window) {
        const obs = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                isVisible = entry.isIntersecting;
                if (isVisible && !animationId) {
                    animationId = requestAnimationFrame(render);
                } else if (!isVisible && animationId) {
                    cancelAnimationFrame(animationId);
                    animationId = null;
                }
            });
        }, { threshold: 0.05 });
        obs.observe(hero);
    }

    // Tab visibility change safeguard
    document.addEventListener("visibilitychange", () => {
        if (document.hidden) {
            isVisible = false;
            if (animationId) {
                cancelAnimationFrame(animationId);
                animationId = null;
            }
        } else {
            isVisible = true;
            if (!animationId) {
                animationId = requestAnimationFrame(render);
            }
        }
    });
}

// ── Bootstrapping ────────────────────────────────────────────────────────────
function boot() {
    let lenis = null;
    try { lenis = initSmoothScroll(); } catch (e) { console.warn("SmoothScroll error:", e); }
    try { initLayeredScrollEffects(false); } catch (e) { console.warn("ScrollEffects error:", e); }
    try { initScrollProgress(); } catch (e) { console.warn("ScrollProgress error:", e); }
    try { initBackToTop(lenis); } catch (e) { console.warn("BackToTop error:", e); }
    try { initSearchAutocomplete(lenis); } catch (e) { console.warn("SearchAutocomplete error:", e); }
    try { initRotatingTips(); } catch (e) { console.warn("RotatingTips error:", e); }
    try { initThemeToggle(); } catch (e) { console.warn("ThemeToggle error:", e); }
    try { initLazyImages(); } catch (e) { console.warn("LazyImages error:", e); }
    try { initCounters(); } catch (e) { console.warn("Counters error:", e); }
    try { init3DTilt(); } catch (e) { console.warn("3DTilt error:", e); }
    try { initHero3DParallax(); } catch (e) { console.warn("Hero3DParallax error:", e); }
    try { initInteractiveParticles(); } catch (e) { console.warn("Particles error:", e); }

    // After onboarding splash exits, trigger a single scan for viewport elements
    window.addEventListener(
        "tefa-onboarding-done",
        () => {
            try { initLayeredScrollEffects(true); } catch (_) {}
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

