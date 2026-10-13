import gsap from "gsap";
import Lenis from "lenis";

// ── Ultra-Smooth Momentum Inertia Scrolling (Lenis) ─────────────────────────
// Uses Lenis built-in autoRaf (v1.3+) — eliminates the manual RAF loop that
// ran every single frame unconditionally even when nothing was scrolling.
// autoRaf lets Lenis self-schedule ticks only when scroll is in progress,
// freeing the main thread during idle time and reducing janky frame budgets.
function initSmoothScroll() {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return null;

    // Touch-primary devices (phones/tablets) already have excellent native
    // momentum scroll. Enabling Lenis wheel smoothing there causes double-
    // smoothing lag. We detect and skip wheel smoothing for these devices.
    const isCoarseTouch = window.matchMedia("(hover: none) and (pointer: coarse)").matches;

    const lenis = new Lenis({
        // Shorter duration = crisper response without losing elegance.
        // 0.95 hits a sweet spot: just enough inertia tail, not too floaty.
        duration: isCoarseTouch ? 0 : 0.95,
        // Cubic deceleration: fast start, smooth tail-off — natural feel.
        easing: (t) => 1 - Math.pow(1 - t, 3.6),
        orientation: "vertical",
        gestureOrientation: "vertical",
        // Disable wheel smoothing on touch-only devices — native is better.
        smoothWheel: !isCoarseTouch,
        // 1.0 = natural 1:1 mapping of wheel delta to scroll distance.
        wheelMultiplier: 1.0,
        // Disable Lenis touch on coarse devices to keep native momentum.
        touchMultiplier: isCoarseTouch ? 0 : 1.3,
        infinite: false,
        // autoRaf: true — Lenis manages its own RAF scheduling efficiently.
        // No manual requestAnimationFrame loop needed.
        autoRaf: true,
    });

    // Anchor smooth scrolling — offset matches fixed header height (68px).
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");
            if (targetId && targetId !== "#") {
                const targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    lenis.scrollTo(targetEl, { offset: -68, duration: 0.9 });
                }
            }
        });
    });

    return lenis;
}

// ── Layer-by-Layer Section Elevation & Staggered Reveal ──────────────────────
// Guard prevents double-initialization; observer is disconnected on refresh
// so elements are never observed twice (fixes potential dual-fire on re-init).
let _revealObserver = null;
let _revealReady = false;

function initLayeredScrollEffects(force) {
    if (_revealReady && !force) return;
    _revealReady = true;

    // Tear down the previous observer before re-scanning to prevent duplicate
    // observation of the same elements across multiple call sites.
    if (_revealObserver) {
        _revealObserver.disconnect();
        _revealObserver = null;
    }

    const sectionSelectors = [
        ".principal-section",
        ".logo-marquee-section",
        ".about-section",
        ".services-section",
        ".showcase-section",
        ".ai-section",
        ".cta-banner-section",
        ".supporters-section",
        ".main-footer",
        "[data-scroll-layer]",
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

    const vh = window.innerHeight;

    if (!("IntersectionObserver" in window)) {
        targets.forEach((el) => el.classList.add("is-revealed"));
        return;
    }

    _revealObserver = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-revealed");
                    obs.unobserve(entry.target);
                }
            });
        },
        // Refined threshold & margin: launches upward lift with generous lead time
        { threshold: 0.05, rootMargin: "0px 0px -25px 0px" }
    );

    targets.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.top < vh * 0.85 && rect.bottom > 0) {
            // Already well inside initial viewport — reveal immediately.
            el.classList.add("is-revealed");
        } else if (!el.classList.contains("is-revealed")) {
            _revealObserver.observe(el);
        }
    });
}

// ── Lightweight GPU Scroll Progress ──────────────────────────────────────────
// Passive listener + RAF ticking guard — reads scroll position once per frame.
function initScrollProgress() {
    const progress = document.querySelector("[data-scroll-progress]");
    if (!progress) return;

    let ticking = false;
    const updateProgress = () => {
        const total = document.documentElement.scrollHeight - window.innerHeight;
        const ratio = total > 0 ? window.pageYOffset / total : 0;
        const clamped = Math.min(1, Math.max(0, ratio));
        progress.style.transform = `scaleX(${clamped})`;
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

// ── Statistic Counters Animation ────────────────────────────────────────────
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

                const obj = { val: 0 };
                gsap.to(obj, {
                    val: targetVal,
                    duration: 1.5,
                    ease: "power2.out",
                    onUpdate: () => {
                        counter.textContent = prefix + obj.val.toFixed(decimals) + suffix;
                    },
                });
            });
        },
        { threshold: 0.15 }
    );

    counters.forEach((el) => observer.observe(el));
}

// ── Desktop Pointer Hover Lift ──────────────────────────────────────────────
function initHoverCards() {
    if (!window.matchMedia("(hover: hover) and (pointer: fine)").matches) return;

    document.querySelectorAll("[data-hover-card]").forEach((card) => {
        card.addEventListener(
            "mouseenter",
            () => gsap.to(card, { y: -5, duration: 0.22, ease: "power2.out", overwrite: "auto" }),
            { passive: true }
        );
        card.addEventListener(
            "mouseleave",
            () => gsap.to(card, { y: 0, duration: 0.28, ease: "power2.out", overwrite: "auto" }),
            { passive: true }
        );
    });
}

// ── Bootstrapping ────────────────────────────────────────────────────────────
function boot() {
    initSmoothScroll();
    initLayeredScrollEffects(false);
    initScrollProgress();
    initCounters();
    initHoverCards();

    // After onboarding exits, force a fresh reveal pass — elements that were
    // hidden behind the splash may now be in the viewport and need revealing.
    window.addEventListener(
        "tefa-onboarding-done",
        () => {
            initLayeredScrollEffects(true);
        },
        { once: true }
    );
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot, { once: true });
} else {
    boot();
}
