<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AiNavigatorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SystemMonitorController;
use Illuminate\Support\Facades\Route;

// ─── Landing Page & Multipage Routes ─────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/bkk', function () {
    return view('bkk');
})->name('bkk');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/profil-sekolah', function () {
    return redirect()->route('profil');
});

Route::get('/tentang', function () {
    return redirect()->route('profil');
});

Route::get('/pkl', function () {
    return view('pkl');
})->name('pkl');

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::get('/ppdb/daftar', function () {
    return view('ppdb-daftar');
})->name('ppdb.daftar');

Route::get('/pendaftaran', function () {
    return redirect()->route('ppdb.daftar');
});

Route::get('/ppdb/kuis', function () {
    return view('kuis-jurusan');
})->name('ppdb.kuis');

Route::get('/kuis-jurusan', function () {
    return redirect()->route('ppdb.kuis');
})->name('kuis-jurusan');

// ─── Auth Routes (hanya bisa diakses saat belum login) ─────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:login')
        ->name('login.post');

    if (config('security.allow_self_registration')) {
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])
            ->middleware('throttle:registration')
            ->name('register.post');
    }
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ─── Siswa Routes (hanya untuk role siswa) ─────────────────────────────────
Route::prefix('siswa')
    ->name('siswa.')
    ->middleware(['auth', 'role:siswa'])
    ->group(function () {
        Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
        Route::get('/akademik', [SiswaController::class, 'akademik'])->name('akademik');
        Route::get('/blud', [SiswaController::class, 'blud'])->name('blud');
        Route::get('/bkk', [SiswaController::class, 'bkk'])->name('bkk');
        Route::get('/riwayat', [SiswaController::class, 'riwayat'])->name('riwayat');
        Route::get('/tanya-tefa', [SiswaController::class, 'tanyaTefa'])->name('tanya-tefa');
        Route::post('/profile', [SiswaController::class, 'updateProfile'])->name('profile.update');
        Route::post('/blud/publikasi', [SiswaController::class, 'storeBludProduct'])->name('blud.publikasi');

        // ─── Realtime Data & Actions Endpoints ───
        Route::middleware('throttle:siswa-api')->group(function () {
            Route::get('/api/dashboard-data', [SiswaController::class, 'getDashboardData'])->name('api.dashboard');
            Route::get('/api/blud-data', [SiswaController::class, 'getBludData'])->name('api.blud');
            Route::post('/api/blud-produk', [SiswaController::class, 'storeBludProduct'])->name('api.blud.store');
            Route::get('/api/bkk-data', [SiswaController::class, 'getBkkData'])->name('api.bkk');
            Route::post('/api/bkk-lamar', [SiswaController::class, 'lamarPekerjaan'])->name('api.bkk.lamar');
            Route::get('/api/akademik-data', [SiswaController::class, 'getAkademikData'])->name('api.akademik');
        });
        Route::get('/uploads/{directory}/{filename}', [SiswaController::class, 'showUpload'])
            ->whereIn('directory', ['avatars', 'produk'])
            ->where('filename', '[A-Za-z0-9_-]+\\.(?:jpe?g|png|webp)')
            ->name('uploads.show');
    });

// ─── Guru Routes (hanya untuk role guru) ───────────────────────────────────
Route::prefix('guru')
    ->name('guru.')
    ->middleware(['auth', 'role:guru'])
    ->group(function () {
        Route::get('/dashboard', [GuruController::class, 'index'])->name('dashboard');
    });

// ─── Admin Routes (hanya untuk role admin) ─────────────────────────────────
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/pengguna', [AdminController::class, 'users'])->name('users');
        Route::post('/pengguna', [AdminController::class, 'storeUser'])->name('users.store');
        Route::put('/pengguna/{user}', [AdminController::class, 'updateUser'])->name('users.update');
        Route::patch('/pengguna/{user}/status', [AdminController::class, 'toggleUser'])->name('users.toggle');
        Route::get('/akademik', [AdminController::class, 'academic'])->name('academic');
        Route::post('/akademik/nilai', [AdminController::class, 'storeGrade'])->name('academic.grades.store');
        Route::post('/akademik/kehadiran', [AdminController::class, 'storeAttendance'])->name('academic.attendance.store');
        Route::post('/akademik/tugas', [AdminController::class, 'storeAssignment'])->name('academic.assignments.store');
        Route::get('/blud', [AdminController::class, 'blud'])->name('blud');
        Route::patch('/blud/{product}', [AdminController::class, 'updateProduct'])->name('blud.update');
        Route::get('/bkk', [AdminController::class, 'jobs'])->name('jobs');
        Route::post('/bkk', [AdminController::class, 'storeJob'])->name('jobs.store');
        Route::patch('/bkk/{job}/status', [AdminController::class, 'toggleJob'])->name('jobs.toggle');
        Route::patch('/lamaran/{application}', [AdminController::class, 'updateApplication'])->name('applications.update');
        Route::get('/ppdb', [AdminController::class, 'ppdb'])->name('ppdb');
        Route::post('/ppdb', [AdminController::class, 'storePpdb'])->name('ppdb.store');
        Route::patch('/ppdb/{application}', [AdminController::class, 'updatePpdb'])->name('ppdb.update');
        Route::get('/laporan', [AdminController::class, 'reports'])->name('reports');
        Route::get('/laporan/ekspor', [AdminController::class, 'export'])->name('reports.export');
        Route::get('/konten', [AdminController::class, 'content'])->name('content');
        Route::put('/konten', [AdminController::class, 'saveContent'])->name('content.save');
        Route::get('/pengaturan', [AdminController::class, 'settings'])->name('settings');
        Route::put('/pengaturan', [AdminController::class, 'saveSettings'])->name('settings.save');
        Route::get('/monitor', [SystemMonitorController::class, 'index'])->name('monitor');
        Route::get('/monitor/metrics', [SystemMonitorController::class, 'metrics'])->name('monitor.metrics');
    });

// ─── AI Navigator Endpoints (Bisa diakses publik & user login) ───────────────
Route::prefix('ai-navigator')
    ->name('ai.')
    ->group(function () {
        Route::get('/greet', [AiNavigatorController::class, 'greet'])->name('greet');
        Route::post('/chat', [AiNavigatorController::class, 'chat'])
            ->middleware('throttle:ai-chat')
            ->name('chat');
    });
