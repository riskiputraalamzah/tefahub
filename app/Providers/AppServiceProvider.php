<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Automatically force HTTPS URLs for assets/routes when accessed via ngrok or HTTPS proxy
        if (! $this->app->runningInConsole()) {
            if (
                request()->header('x-forwarded-proto') === 'https' ||
                str_contains(request()->header('host', '') ?? '', 'ngrok') ||
                str_contains(request()->header('x-forwarded-host', '') ?? '', 'ngrok') ||
                $this->app->environment('production')
            ) {
                URL::forceScheme('https');
            }
        }

        // AI chat: 20 req/min per IP (configurable via AI_CHAT_RATE_LIMIT)
        RateLimiter::for('ai-chat', fn (Request $request) => Limit::perMinute((int) env('AI_CHAT_RATE_LIMIT', 20))->by($request->ip()));

        // Registration: 10 per hour per IP
        RateLimiter::for('registration', fn (Request $request) => Limit::perHour(10)->by($request->ip()));

        // General API calls per authenticated user (dashboard polling etc.)
        // 300 req/min = supports concurrent user load testing
        RateLimiter::for('siswa-api', function (Request $request) {
            return $request->user()
                ? Limit::perMinute(300)->by('user:'.$request->user()->id)
                : Limit::perMinute(60)->by($request->ip());
        });

        // Login attempts: 20 per minute per IP to prevent brute-force
        RateLimiter::for('login', fn (Request $request) => Limit::perMinute(20)->by($request->ip()));

        // ── Eloquent Strictness (dev only) ─────────────────────────────────────
        // Prevent lazy-loading N+1 in local/testing environments only.
        if ($this->app->environment('local', 'testing')) {
            Model::preventLazyLoading();
        }
    }
}
