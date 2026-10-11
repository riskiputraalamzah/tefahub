<script>
(function() {
    try {
        if (sessionStorage.getItem('tefa_hub_onboarding_seen')) {
            document.documentElement.classList.add('tefa-skip-onboarding');
        }
    } catch(e) {}
})();
</script>
<style>
    html.tefa-skip-onboarding #tefaOnboarding {
        display: none !important;
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
    }
</style>
<div id="tefaOnboarding" class="onboarding-overlay" role="presentation" aria-hidden="false">
    <div class="onboarding-container">
        {{-- Pure White Circular Logo Wrapper with Soft Light Shadow (No dark overlay) --}}
        <div class="onboarding-logo-circle" id="onboardingLogoCircle">
            <img src="{{ asset('assets/logo.webp') }}" alt="Logo Tefa-Hub" class="onboarding-logo-img" id="onboardingLogoImg">
        </div>

        {{-- Expanding Brand Text ("Tefa-Hub") Emerging gradually & gracefully from the Logo --}}
        <div class="onboarding-brand-reveal" id="onboardingBrandReveal">
            <div class="onboarding-brand-inner">
                <span class="onboarding-brand-text">Tefa<span>-Hub</span></span>
                <span class="onboarding-brand-tagline">Digital Vocational Ecosystem</span>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    'use strict';
    const ONBOARDING_KEY = 'tefa_hub_onboarding_seen';
    const onboardingEl   = document.getElementById('tefaOnboarding');
    const logoCircle     = document.getElementById('onboardingLogoCircle');
    const logoImg        = document.getElementById('onboardingLogoImg');
    const brandReveal    = document.getElementById('onboardingBrandReveal');

    if (!onboardingEl) return;

    // Check if user has already seen onboarding in this session
    try {
        if (sessionStorage.getItem(ONBOARDING_KEY)) {
            onboardingEl.classList.add('is-done');
            onboardingEl.style.display = 'none';
            onboardingEl.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('onboarding-active');
            return;
        }
    } catch (e) {
        // Fallback if sessionStorage is disabled
    }

    // Mark as seen immediately so subsequent navigations don't show it again
    try {
        sessionStorage.setItem(ONBOARDING_KEY, '1');
    } catch (e) {}

    // Lock body scroll during onboarding sequence
    document.body.classList.add('onboarding-active');

    function runOnboardingSequence() {
        // Step 1: Gentle fade-in emergence of Logo and Brand
        setTimeout(function() {
            if (logoCircle) logoCircle.classList.add('is-popped', 'is-settled');
            if (brandReveal) brandReveal.classList.add('is-revealed');
        }, 120);

        // Step 2: Luxurious hold, then elegant fade-out transition to page
        setTimeout(function() {
            onboardingEl.classList.add('is-exiting');
            document.body.classList.remove('onboarding-active');

            if (window.dispatchEvent) {
                window.dispatchEvent(new CustomEvent('tefa-onboarding-done'));
            }

            // Remove from DOM after smooth fade-out
            setTimeout(function() {
                onboardingEl.classList.add('is-done');
                onboardingEl.style.display = 'none';
                onboardingEl.setAttribute('aria-hidden', 'true');
            }, 650);
        }, 1350);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', runOnboardingSequence);
    } else {
        runOnboardingSequence();
    }
})();
</script>
