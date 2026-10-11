<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Add composite & single-column indexes for high-traffic query optimization.
 *
 * Covers the most-executed query patterns:
 *   - SiswaController::getDashboardData  (user_id + status)
 *   - SiswaController::getBludData       (user_id, status)
 *   - SiswaController::getBkkData        (is_active, user_id)
 *   - SiswaController::getAkademikData   (user_id)
 *   - AdminController::index             (role, is_active, status)
 *   - sessions last_activity (cleanup & auth lookups)
 */
return new class extends Migration
{
    public function up(): void
    {
        // ── users ──────────────────────────────────────────────────────────────
        // role+is_active used together in admin dashboard aggregation
        Schema::table('users', function (Blueprint $table) {
            if (! $this->indexExists('users', 'users_role_is_active_index')) {
                $table->index(['role', 'is_active'], 'users_role_is_active_index');
            }
        });

        // ── produk_bluds ───────────────────────────────────────────────────────
        // Queried by user_id alone AND by user_id+status together
        Schema::table('produk_bluds', function (Blueprint $table) {
            if (! $this->indexExists('produk_bluds', 'produk_bluds_user_id_status_index')) {
                $table->index(['user_id', 'status'], 'produk_bluds_user_id_status_index');
            }
            if (! $this->indexExists('produk_bluds', 'produk_bluds_status_created_at_index')) {
                $table->index(['status', 'created_at'], 'produk_bluds_status_created_at_index');
            }
        });

        // ── lowongan_bkks ──────────────────────────────────────────────────────
        // Hot query: WHERE is_active = true ORDER BY created_at DESC
        Schema::table('lowongan_bkks', function (Blueprint $table) {
            if (! $this->indexExists('lowongan_bkks', 'lowongan_bkks_is_active_created_at_index')) {
                $table->index(['is_active', 'created_at'], 'lowongan_bkks_is_active_created_at_index');
            }
        });

        // ── nilai_akademiks ────────────────────────────────────────────────────
        // Queried heavily per user for stats & listing
        Schema::table('nilai_akademiks', function (Blueprint $table) {
            if (! $this->indexExists('nilai_akademiks', 'nilai_akademiks_user_id_created_at_index')) {
                $table->index(['user_id', 'created_at'], 'nilai_akademiks_user_id_created_at_index');
            }
        });

        // ── aktivitas_siswas ───────────────────────────────────────────────────
        // Ordered by waktu_aktivitas DESC per user – critical for dashboard
        Schema::table('aktivitas_siswas', function (Blueprint $table) {
            if (! $this->indexExists('aktivitas_siswas', 'aktivitas_siswas_user_id_waktu_index')) {
                $table->index(['user_id', 'waktu_aktivitas'], 'aktivitas_siswas_user_id_waktu_index');
            }
        });

        // ── lamaran_kerjas ─────────────────────────────────────────────────────
        // Unique check: WHERE user_id=? AND lowongan_bkk_id=? → cover with composite
        Schema::table('lamaran_kerjas', function (Blueprint $table) {
            if (! $this->indexExists('lamaran_kerjas', 'lamaran_kerjas_user_lowongan_index')) {
                $table->index(['user_id', 'lowongan_bkk_id'], 'lamaran_kerjas_user_lowongan_index');
            }
        });

        // ── sessions ───────────────────────────────────────────────────────────
        // last_activity already has an index from the framework migration.
        // Add user_id index if missing (speeds up per-user session lookup).
        Schema::table('sessions', function (Blueprint $table) {
            if (! $this->indexExists('sessions', 'sessions_user_id_last_activity_index')) {
                $table->index(['user_id', 'last_activity'], 'sessions_user_id_last_activity_index');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndexIfExists('users_role_is_active_index');
        });
        Schema::table('produk_bluds', function (Blueprint $table) {
            $table->dropIndexIfExists('produk_bluds_user_id_status_index');
            $table->dropIndexIfExists('produk_bluds_status_created_at_index');
        });
        Schema::table('lowongan_bkks', function (Blueprint $table) {
            $table->dropIndexIfExists('lowongan_bkks_is_active_created_at_index');
        });
        Schema::table('nilai_akademiks', function (Blueprint $table) {
            $table->dropIndexIfExists('nilai_akademiks_user_id_created_at_index');
        });
        Schema::table('aktivitas_siswas', function (Blueprint $table) {
            $table->dropIndexIfExists('aktivitas_siswas_user_id_waktu_index');
        });
        Schema::table('lamaran_kerjas', function (Blueprint $table) {
            $table->dropIndexIfExists('lamaran_kerjas_user_lowongan_index');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropIndexIfExists('sessions_user_id_last_activity_index');
        });
    }

    /** Check whether an index already exists to keep migration idempotent. */
    private function indexExists(string $table, string $indexName): bool
    {
        $indexes = DB::select("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$indexName]);

        return count($indexes) > 0;
    }
};
