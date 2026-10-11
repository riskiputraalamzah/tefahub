<?php

namespace App\Http\Controllers;

use App\Models\AktivitasSiswa;
use App\Models\LamaranKerja;
use App\Models\LowonganBkk;
use App\Models\NilaiAkademik;
use App\Models\ProdukBlud;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SiswaController extends Controller
{
    /**
     * Helper to get student user metadata.
     *
     * @return array<string, mixed>
     */
    private function getUserData(): array
    {
        /** @var User|null $user */
        $user = auth()->user();
        $profile = session('siswa_profile', []);

        return [
            'id' => $user?->id,
            'name' => $profile['nama_lengkap'] ?? ($user?->name ?? 'Siswa'),
            'email' => $user?->email ?? 'siswa@smktefa.sch.id',
            'nis' => $profile['nis'] ?? ($user?->nis ?? '-'),
            'nisn' => $profile['nisn'] ?? '0064829104',
            'class' => $profile['class'] ?? 'XII RPL 1',
            'status' => 'SISWA AKTIF',
            'tempat_lahir' => $profile['tempat_lahir'] ?? 'Bandung',
            'tanggal_lahir' => $profile['tanggal_lahir'] ?? '2007-05-14',
            'jenis_kelamin' => $profile['jenis_kelamin'] ?? 'Perempuan',
            'avatar' => $profile['avatar'] ?? asset('assets/orng.webp'),
        ];
    }

    /**
     * Log a student activity automatically.
     */
    private function logActivity(string $judul, string $kategori = 'sistem', ?string $deskripsi = null, string $tipeIkon = 'activity', string $badgeWarna = 'blue'): void
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return;
        }

        AktivitasSiswa::create([
            'user_id' => $user->id,
            'judul' => $judul,
            'kategori' => $kategori,
            'deskripsi' => $deskripsi,
            'tipe_ikon' => $tipeIkon,
            'badge_warna' => $badgeWarna,
            'waktu_aktivitas' => now(),
        ]);

        // Bust dashboard cache so next poll gets fresh activity list
        Cache::forget("siswa_dashboard_{$user->id}");
    }

    /**
     * Update student profile via AJAX.
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nis' => ['required', 'string', 'max:30'],
            'nisn' => ['required', 'string', 'max:30'],
            'tempat_lahir' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        $avatarUrl = session('siswa_profile.avatar', asset('assets/orng.webp'));

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'avatar_'.str()->uuid().'.'.$file->extension();
            $file->storeAs('uploads/avatars', $filename, 'local');
            $avatarUrl = $this->uploadUrl('avatars', $filename);
        }

        $profileData = [
            'nama_lengkap' => $validated['nama_lengkap'],
            'nis' => $validated['nis'],
            'nisn' => $validated['nisn'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'class' => session('siswa_profile.class', 'XII RPL 1'),
            'avatar' => $avatarUrl,
        ];

        session(['siswa_profile' => $profileData]);

        /** @var User|null $user */
        $user = auth()->user();
        if ($user) {
            $user->name = $validated['nama_lengkap'];
            $user->nis = $validated['nis'];
            $user->save();

            // Bust all per-user caches when profile is updated
            Cache::forget("siswa_dashboard_{$user->id}");
            Cache::forget("siswa_blud_{$user->id}");
            Cache::forget("siswa_bkk_{$user->id}");
            Cache::forget("siswa_akademik_{$user->id}");
        }

        $this->logActivity('Memperbarui Profil Siswa', 'sistem', 'Data identitas dan NIS/NISN berhasil disinkronkan', 'user', 'green');

        return response()->json([
            'success' => true,
            'message' => 'Profil siswa berhasil diperbarui dan disinkronkan!',
            'data' => $profileData,
        ]);
    }

    /**
     * Store BLUD product with database insertion.
     */
    public function storeBludProduct(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'kategori_produk' => ['required', 'string', 'max:255'],
            'deskripsi_produk' => ['required', 'string'],
            'harga' => ['nullable', 'numeric', 'min:0'],
            'visual_produk' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,webp', 'max:15360'],
        ]);

        $visualPath = null;
        if ($request->hasFile('visual_produk')) {
            $file = $request->file('visual_produk');
            $filename = 'produk_'.str()->uuid().'.'.$file->extension();
            $file->storeAs('uploads/produk', $filename, 'local');
            $visualPath = 'uploads/produk/'.$filename;
        }

        $produk = ProdukBlud::create([
            'user_id' => $user->id,
            'nama_produk' => $validated['nama_produk'],
            'kategori' => $validated['kategori_produk'],
            'deskripsi' => $validated['deskripsi_produk'],
            'visual_path' => $visualPath,
            'status' => 'diajukan',
            'harga' => $validated['harga'] ?? 0,
            'jumlah_terjual' => 0,
        ]);

        // Bust BLUD cache for this user
        Cache::forget("siswa_blud_{$user->id}");
        Cache::forget("siswa_dashboard_{$user->id}");

        $this->logActivity(
            'Mengajukan Produk BLUD: '.$validated['nama_produk'],
            'blud',
            'Kategori '.$validated['kategori_produk'].' masuk antrean kurasi guru',
            'box',
            'purple'
        );

        return response()->json([
            'success' => true,
            'message' => 'Produk "'.$produk->nama_produk.'" berhasil diajukan untuk kurasi BLUD!',
            'data' => $produk,
        ]);
    }

    /**
     * Apply for a BKK Job Vacancy.
     */
    public function lamarPekerjaan(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'lowongan_id' => ['required', 'exists:lowongan_bkks,id'],
            'surat_lamaran' => ['nullable', 'string'],
        ]);

        // Check if already applied — use cache to avoid DB hit on repeated calls
        $cacheKey = "applied_{$user->id}_{$validated['lowongan_id']}";
        $alreadyApplied = Cache::remember($cacheKey, 300, fn () => LamaranKerja::where('user_id', $user->id)
            ->where('lowongan_bkk_id', $validated['lowongan_id'])
            ->exists());

        if ($alreadyApplied) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah mengajukan lamaran untuk lowongan ini!',
            ], 422);
        }

        $lowongan = LowonganBkk::findOrFail($validated['lowongan_id']);

        $lamaran = LamaranKerja::create([
            'user_id' => $user->id,
            'lowongan_bkk_id' => $lowongan->id,
            'status' => 'diajukan',
            'surat_lamaran' => $validated['surat_lamaran'] ?? null,
            'tanggal_lamar' => now(),
        ]);

        $lowongan->increment('pelamar_count');

        // Mark as applied in cache + bust BKK & dashboard caches
        Cache::put($cacheKey, true, 3600);
        Cache::forget("siswa_bkk_{$user->id}");
        Cache::forget("siswa_dashboard_{$user->id}");

        $this->logActivity(
            'Melamar Lowongan: '.$lowongan->posisi,
            'bkk',
            'Perusahaan: '.$lowongan->nama_perusahaan.' • Lokasi: '.$lowongan->lokasi,
            'briefcase',
            'blue'
        );

        return response()->json([
            'success' => true,
            'message' => 'Lamaran untuk posisi "'.$lowongan->posisi.'" di '.$lowongan->nama_perusahaan.' berhasil dikirimkan!',
            'data' => $lamaran,
        ]);
    }

    /**
     * Realtime API: Dashboard Data Summary
     *
     * Cached per-user for 60 seconds to absorb polling bursts.
     */
    public function getDashboardData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = Cache::remember("siswa_dashboard_{$user->id}", 60, function () use ($user) {
            // Single aggregate query for product stats
            $productStats = ProdukBlud::query()
                ->where('user_id', $user->id)
                ->selectRaw('COUNT(*) as total_produk')
                ->selectRaw("SUM(CASE WHEN status = 'disetujui' THEN 1 ELSE 0 END) as produk_tayang")
                ->first();

            // Single aggregate query for academic stats
            $nilaiStats = NilaiAkademik::query()
                ->where('user_id', $user->id)
                ->selectRaw('COUNT(*) as total_nilai_terdata, AVG(nilai_akhir) as rata_rata_nilai')
                ->first();

            // Combine remaining counts in one query via subqueries
            $totalLowongan = LowonganBkk::where('is_active', true)->count();
            $totalLamaran = LamaranKerja::where('user_id', $user->id)->count();

            $aktivitas = AktivitasSiswa::where('user_id', $user->id)
                ->latest('waktu_aktivitas')
                ->take(10)
                ->get()
                ->map(fn ($act) => [
                    'id' => $act->id,
                    'judul' => $act->judul,
                    'kategori' => $act->kategori,
                    'deskripsi' => $act->deskripsi,
                    'badge_warna' => $act->badge_warna,
                    'tipe_ikon' => $act->tipe_ikon,
                    'waktu' => $act->waktu_aktivitas ? $act->waktu_aktivitas->diffForHumans() : 'Baru saja',
                ]);

            return [
                'stats' => [
                    'total_produk' => (int) $productStats->total_produk,
                    'produk_tayang' => (int) $productStats->produk_tayang,
                    'total_lowongan' => $totalLowongan,
                    'total_lamaran' => $totalLamaran,
                    'rata_rata_nilai' => $nilaiStats->rata_rata_nilai === null ? 0 : round((float) $nilaiStats->rata_rata_nilai, 1),
                    'total_nilai_terdata' => (int) $nilaiStats->total_nilai_terdata,
                ],
                'aktivitas' => $aktivitas,
            ];
        });

        return response()->json(['success' => true, ...$data]);
    }

    /**
     * Realtime API: BLUD Products & Stats
     *
     * Cached per-user for 120 seconds; bust on write.
     */
    public function getBludData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = Cache::remember("siswa_blud_{$user->id}", 120, function () use ($user) {
            $produks = ProdukBlud::where('user_id', $user->id)->latest()->get();

            $stats = [
                'total_diajukan' => $produks->count(),
                'tervalidasi_tayang' => $produks->where('status', 'disetujui')->count(),
                'menunggu_validasi' => $produks->whereIn('status', ['draft', 'diajukan', 'dikurasi'])->count(),
                'perlu_revisi' => $produks->where('status', 'ditolak')->count(),
            ];

            // Public catalogue — shared across all users, cached separately
            $katalogPublik = Cache::remember('blud_katalog_publik', 180, fn () => ProdukBlud::where('status', 'disetujui')
                ->with('user:id,name,nis')
                ->latest()
                ->take(6)
                ->get());

            return [
                'stats' => $stats,
                'user_produks' => $produks->map(fn (ProdukBlud $produk) => $this->productPayload($produk)),
                'katalog_publik' => $katalogPublik->map(fn (ProdukBlud $produk) => $this->productPayload($produk)),
            ];
        });

        return response()->json(['success' => true, ...$data]);
    }

    /**
     * Realtime API: BKK Vacancies & Student Applications
     *
     * Vacancy list cached globally for 120s; per-user data cached for 60s.
     */
    public function getBkkData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = Cache::remember("siswa_bkk_{$user->id}", 60, function () use ($user) {
            // Global active vacancies — can be shared across users
            $lowongans = Cache::remember('bkk_active_lowongans', 120, fn () => LowonganBkk::where('is_active', true)->latest()->get());

            $userLamaran = LamaranKerja::where('user_id', $user->id)->with('lowongan:id,posisi,nama_perusahaan')->latest()->get();
            $appliedIds = $userLamaran->pluck('lowongan_bkk_id')->flip();

            // Calculate readiness score from cached per-user stats
            $nilaiCount = NilaiAkademik::where('user_id', $user->id)->count();
            $produkCount = ProdukBlud::where('user_id', $user->id)->count();

            $matchScore = 0;
            if ($nilaiCount > 0 || $produkCount > 0) {
                $matchScore = min(100, 70 + ($produkCount * 8) + ($nilaiCount * 2));
            }

            return [
                'match_score' => $matchScore,
                'lowongans' => $lowongans->map(fn ($job) => [
                    'id' => $job->id,
                    'nama_perusahaan' => $job->nama_perusahaan,
                    'posisi' => $job->posisi,
                    'lokasi' => $job->lokasi,
                    'tipe_kerja' => $job->tipe_kerja,
                    'gaji_min' => $job->gaji_min ? 'Rp '.number_format($job->gaji_min, 0, ',', '.') : null,
                    'gaji_max' => $job->gaji_max ? 'Rp '.number_format($job->gaji_max, 0, ',', '.') : null,
                    'persyaratan' => $job->persyaratan,
                    'deskripsi' => $job->deskripsi,
                    'pelamar_count' => $job->pelamar_count,
                    'batas_daftar' => $job->batas_daftar ? $job->batas_daftar->format('d M Y') : 'Segera',
                    'is_applied' => $appliedIds->has($job->id),
                ]),
                'lamaran_saya' => $userLamaran,
            ];
        });

        return response()->json(['success' => true, ...$data]);
    }

    /**
     * Realtime API: Akademik Data
     *
     * Cached per-user for 300 seconds (nilai jarang berubah).
     */
    public function getAkademikData(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = Cache::remember("siswa_akademik_{$user->id}", 300, function () use ($user) {
            $nilais = NilaiAkademik::where('user_id', $user->id)->get();
            $totalNilais = $nilais->count();
            $avgNilai = $totalNilais > 0 ? round($nilais->avg('nilai_akhir'), 1) : 0;

            return [
                'stats' => [
                    'rata_rata_nilai' => $avgNilai,
                    'total_mapel' => $totalNilais,
                    'kehadiran_persen' => $totalNilais > 0 ? '98.5%' : '0%',
                ],
                'nilai_list' => $nilais,
            ];
        });

        return response()->json(['success' => true, ...$data]);
    }

    /**
     * Display student dashboard.
     */
    public function index(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'dashboard',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display akademik page.
     */
    public function akademik(): View
    {
        return view('siswa.akademik', [
            'activeMenu' => 'akademik',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display BLUD page.
     */
    public function blud(): View
    {
        return view('siswa.blud', [
            'activeMenu' => 'blud',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display BKK Career Center page.
     */
    public function bkk(): View
    {
        return view('siswa.bkk', [
            'activeMenu' => 'bkk',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display Riwayat Aktivitas page.
     */
    public function riwayat(): View
    {
        return view('siswa.dashboard', [
            'activeMenu' => 'riwayat',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Display Tanya Tefa page.
     */
    public function tanyaTefa(): View
    {
        return view('siswa.tanya-tefa', [
            'activeMenu' => 'tanya-tefa',
            'user' => $this->getUserData(),
        ]);
    }

    /**
     * Serve an authenticated student's uploaded image from private storage.
     */
    public function showUpload(string $directory, string $filename): StreamedResponse
    {
        if ($directory === 'avatars') {
            $avatarUrl = (string) session('siswa_profile.avatar', '');
            $avatarFilename = basename((string) parse_url($avatarUrl, PHP_URL_PATH));

            abort_unless(hash_equals($avatarFilename, $filename), 403);
        }

        if ($directory === 'produk') {
            /** @var User $user */
            $user = auth()->user();
            $product = ProdukBlud::where('visual_path', "uploads/produk/{$filename}")->firstOrFail();

            abort_unless($product->user_id === $user->id || $product->status === 'disetujui', 403);
        }

        return Storage::disk('local')->response("uploads/{$directory}/{$filename}");
    }

    /**
     * Build the application URL for a private uploaded image.
     */
    private function uploadUrl(string $directory, string $filename): string
    {
        return route('siswa.uploads.show', compact('directory', 'filename'));
    }

    /**
     * @return array{id: int, nama_produk: string, kategori: string, deskripsi: string, status: string, harga: mixed, jumlah_terjual: int, visual_url: string|null}
     */
    private function productPayload(ProdukBlud $produk): array
    {
        $filename = $produk->visual_path === null ? null : basename($produk->visual_path);

        return [
            'id' => $produk->id,
            'nama_produk' => $produk->nama_produk,
            'kategori' => $produk->kategori,
            'deskripsi' => $produk->deskripsi,
            'status' => $produk->status,
            'harga' => $produk->harga,
            'jumlah_terjual' => $produk->jumlah_terjual,
            'visual_url' => $filename === null ? null : $this->uploadUrl('produk', $filename),
        ];
    }
}
