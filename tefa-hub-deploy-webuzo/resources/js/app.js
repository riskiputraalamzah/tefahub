import gsap from "gsap";

// ── Ultra-Smooth 120Hz Fade-In Intersection Observer ────────────────────────
function initFadeReveal() {
    const selectors = ".reveal, .reveal-left, .reveal-right, .reveal-scale, .stagger-group";
    const elements = document.querySelectorAll(selectors);
    if (!elements.length) return;

    // Elemen yang sudah ada di viewport saat load langsung dibuat visible tanpa flicker
    const vh = window.innerHeight;
    elements.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.top < vh * 0.95 && rect.bottom > 0) {
            el.classList.add("is-revealed");
        }
    });

    if (!("IntersectionObserver" in window)) {
        elements.forEach((el) => el.classList.add("is-revealed"));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-revealed");
                    obs.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.08, rootMargin: "0px 0px -40px 0px" }
    );

    elements.forEach((el) => {
        if (!el.classList.contains("is-revealed")) {
            observer.observe(el);
        }
    });
}

// ── Lightweight GPU Scroll Progress (No Scrub Overhead, No Lag) ───────────
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

// ── Statistic Counters Animation via IntersectionObserver ──────────────────
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
                    duration: 1.6,
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

// ── Lightweight Desktop Pointer Hover Lift ──────────────────────────────────
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

function boot() {
    initFadeReveal();
    initScrollProgress();
    initCounters();
    initHoverCards();

    window.addEventListener("tefa-onboarding-done", () => {
        initFadeReveal();
    }, { once: true });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot, { once: true });
} else {
    boot();
}
