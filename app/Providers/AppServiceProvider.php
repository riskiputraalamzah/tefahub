<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
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
        // ── Rate Limiters ──────────────────────────────────────────────────────
        // AI chat: 20 req/min per IP (already existed)
        RateLimiter::for('ai-chat', fn (Request $request) => Limit::perMinute(20)->by($request->ip()));

        // Registration: 5 per hour per IP (already existed)
        RateLimiter::for('registration', fn (Request $request) => Limit::perHour(5)->by($request->ip()));

        // General API calls per authenticated user (dashboard polling etc.)
        // 120 req/min = one request every 0.5s — more than enough for UI polling
        RateLimiter::for('siswa-api', function (Request $request) {
            return $request->user()
                ? Limit::perMinute(120)->by('user:'.$request->user()->id)
                : Limit::perMinute(30)->by($request->ip());
        });

        // Login attempts: 10 per minute per IP to prevent brute-force
        RateLimiter::for('login', fn (Request $request) => Limit::perMinute(10)->by($request->ip()));

        // ── Eloquent Strictness (dev only) ─────────────────────────────────────
        // Prevent lazy-loading N+1 in local/testing environments.
        // In production this is disabled to avoid throwing errors on unforeseen relationships.
        if ($this->app->environment('local', 'testing')) {
            Model::preventLazyLoading();
        }

        // ── DB Query Optimizations ─────────────────────────────────────────────
        // Set MySQL session-level optimizations for faster response under load
        if (config('database.default') === 'mysql') {
            DB::statement('SET SESSION wait_timeout=30');
            DB::statement('SET SESSION interactive_timeout=30');
            DB::statement('SET SESSION net_read_timeout=15');
            DB::statement('SET SESSION net_write_timeout=15');
            DB::statement("SET SESSION sql_mode='STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION'");
        }
    }
}
