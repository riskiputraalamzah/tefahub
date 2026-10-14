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
    ];

    const targets = document.querySelectorAll(targetSelectors.join(", "));
    if (!targets.length) return;

    const vh = window.innerHeight || document.documentElement.clientHeight;

    // Reveal elements immediately only if they are in the initial above-the-fold screen
    targets.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.top < vh * 0.7) {
            el.classList.add("is-revealed");
        }
    });

    if (!("IntersectionObserver" in window)) {
        targets.forEach((el) => el.classList.add("is-revealed"));
        return;
    }

    // High performance observer: Triggers satisfying cascading entrances as user scrolls
    _revealObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-revealed");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.08, rootMargin: "0px 0px -30px 0px" }
    );

    targets.forEach((el) => {
        if (!el.classList.contains("is-revealed")) {
            _revealObserver.observe(el);
        }
    });
}

// ── Lightweight GPU Scroll Progress Bar ─────────────────────────────────────
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
    initSmoothScroll();
    initLayeredScrollEffects(false);
    initScrollProgress();
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
