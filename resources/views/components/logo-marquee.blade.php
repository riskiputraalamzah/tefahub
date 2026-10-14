@props([
    'title' => 'Didukung & Bekerja Sama dengan Mitra Industri Terkemuka',
    'subtitle' => 'Sinergi strategis Teaching Factory, penyelarasan kurikulum vokasi, dan program magang kerja bersama DUDI nasional.',
    'badge' => 'Kemitraan Industri & DUDI'
])

@php
    $rows = [
        [
            'id' => 'row-1',
            'direction' => 'marquee-track-ltr',
            'interval' => 2600,
            'delay' => 200,
            'logos' => [
                ['name' => 'Mitra Industri 1', 'src' => asset('assets/log1.webp')],
                ['name' => 'Mitra Industri 2', 'src' => asset('assets/log2.webp')],
                ['name' => 'Mitra Industri 3', 'src' => asset('assets/log3.webp')],
                ['name' => 'Mitra Industri 4', 'src' => asset('assets/log4.webp')],
                ['name' => 'Mitra Industri 5', 'src' => asset('assets/log5.webp')],
            ],
        ],
        [
            'id' => 'row-2',
            'direction' => 'marquee-track-rtl',
            'interval' => 3100,
            'delay' => 1200,
            'logos' => [
                ['name' => 'Mitra Industri 6', 'src' => asset('assets/log6.webp')],
                ['name' => 'Mitra Industri 7', 'src' => asset('assets/log7.webp')],
                ['name' => 'Mitra Industri 8', 'src' => asset('assets/log8.webp')],
                ['name' => 'Mitra Industri 10', 'src' => asset('assets/log10.webp')],
                ['name' => 'Mitra Industri 11', 'src' => asset('assets/log11.webp')],
            ],
        ],
        [
            'id' => 'row-3',
            'direction' => 'marquee-track-ltr-fast',
            'interval' => 2800,
            'delay' => 2200,
            'logos' => [
                ['name' => 'Mitra Industri 12', 'src' => asset('assets/log12.webp')],
                ['name' => 'Mitra Industri 13', 'src' => asset('assets/log13.webp')],
                ['name' => 'Mitra Industri 14', 'src' => asset('assets/log14.webp')],
                ['name' => 'Mitra Industri 15', 'src' => asset('assets/log15.webp')],
                ['name' => 'Mitra Industri 16', 'src' => asset('assets/log16.webp')],
            ],
        ],
    ];
@endphp

<section class="logo-marquee-section" aria-label="Mitra Industri dan Kerjasama Sekolah">
    <div class="logo-marquee-container">
        <header class="logo-marquee-header" data-reveal>
            <div class="logo-marquee-pill">
                <span class="logo-marquee-pill-dot" aria-hidden="true"></span>
                <span>{{ $badge }}</span>
            </div>
            <h2 class="logo-marquee-title">{{ $title }}</h2>
            <p class="logo-marquee-subtitle">{{ $subtitle }}</p>
        </header>

        <div class="logo-marquee-stage" id="logoMarqueeStage" data-reveal>
            @foreach ($rows as $rowIndex => $rowData)
                <div class="marquee-row-wrapper" 
                     data-marquee-row="{{ $rowData['id'] }}"
                     data-marquee-interval="{{ $rowData['interval'] }}"
                     data-marquee-delay="{{ $rowData['delay'] }}"
                     data-marquee-total="{{ count($rowData['logos']) }}"
                     aria-label="Baris mitra {{ $rowIndex + 1 }}">
                    <div class="marquee-track {{ $rowData['direction'] }}">
                        {{-- Repeat 4 sets for infinite, seamless scrolling without gap across any screen width --}}
                        @for ($set = 0; $set < 4; $set++)
                            <div class="marquee-group" @if($set > 0) aria-hidden="true" @endif>
                                @foreach ($rowData['logos'] as $logoIndex => $logo)
                                    <div class="marquee-logo-card" 
                                         data-logo-index="{{ $logoIndex }}"
                                         role="img"
                                         aria-label="{{ $logo['name'] }}"
                                         title="{{ $logo['name'] }}">
                                        <img src="{{ $logo['src'] }}" 
                                             alt="{{ $logo['name'] }}" 
                                             loading="lazy"
                                             decoding="async">
                                    </div>
                                @endforeach
                            </div>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
(function() {
    /**
     * Sequential Auto Spotlight Controller (Viewport-Aware & Highly Optimized)
     * Automatically pauses timers when off-screen to preserve 100% CPU/GPU for scrolling.
     */
    function initLogoMarqueeSpotlight() {
        const stage = document.getElementById('logoMarqueeStage');
        const rows = document.querySelectorAll('[data-marquee-row]');
        if (!rows.length || !stage) return;

        let activeTimers = [];
        let isRunning = false;

        function startSpotlights() {
            if (isRunning) return;
            isRunning = true;

            rows.forEach(function(row) {
                const total = parseInt(row.getAttribute('data-marquee-total'), 10) || 5;
                const intervalTime = parseInt(row.getAttribute('data-marquee-interval'), 10) || 2800;
                const delayTime = parseInt(row.getAttribute('data-marquee-delay'), 10) || 0;

                let currentIndex = 0;

                function highlightIndex(index) {
                    const currentActive = row.querySelectorAll('.marquee-logo-card.is-spotlight');
                    currentActive.forEach(function(card) {
                        card.classList.remove('is-spotlight');
                    });

                    const targetCards = row.querySelectorAll('.marquee-logo-card[data-logo-index="' + index + '"]');
                    targetCards.forEach(function(card) {
                        card.classList.add('is-spotlight');
                    });
                }

                const initialTimer = setTimeout(function() {
                    highlightIndex(currentIndex);
                    const cycleInterval = setInterval(function() {
                        currentIndex = (currentIndex + 1) % total;
                        highlightIndex(currentIndex);
                    }, intervalTime);

                    activeTimers.push(cycleInterval);
                }, delayTime);

                activeTimers.push(initialTimer);
            });
        }

        function stopSpotlights() {
            isRunning = false;
            activeTimers.forEach(function(t) {
                clearTimeout(t);
                clearInterval(t);
            });
            activeTimers = [];

            document.querySelectorAll('.marquee-logo-card.is-spotlight').forEach(function(card) {
                card.classList.remove('is-spotlight');
            });
        }

        // Viewport Observer: ONLY tick when visible
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        startSpotlights();
                    } else {
                        stopSpotlights();
                    }
                });
            }, { threshold: 0.1 });
            observer.observe(stage);
        } else {
            startSpotlights();
        }

        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                stopSpotlights();
            } else if (!document.hidden && stage.getBoundingClientRect().top < window.innerHeight && stage.getBoundingClientRect().bottom > 0) {
                startSpotlights();
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLogoMarqueeSpotlight);
    } else {
        initLogoMarqueeSpotlight();
    }
})();
</script>
