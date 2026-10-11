<?php

namespace App\Http\Controllers;

use App\Models\AcademicAssignment;
use App\Models\AcademicAttendance;
use App\Models\AdminAuditLog;
use App\Models\AppSetting;
use App\Models\LamaranKerja;
use App\Models\LowonganBkk;
use App\Models\NilaiAkademik;
use App\Models\PpdbApplication;
use App\Models\ProdukBlud;
use App\Models\PublicContent;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    private function audit(string $action, ?object $target = null, ?string $description = null): void
    {
        AdminAuditLog::create([
            'user_id' => auth()->id(),
            'aksi' => $action,
            'target_type' => $target ? $target::class : null,
            'target_id' => $target?->id,
            'deskripsi' => $description,
        ]);
    }

    /**
     * Show the administration workspace and its operational queues.
     */
    public function index(): View
    {
        $stats = Cache::remember('admin_dashboard_stats', 120, function () {
            $userCounts = User::query()
                ->selectRaw('COUNT(*) as total')
                ->selectRaw("SUM(CASE WHEN role = 'siswa' THEN 1 ELSE 0 END) as siswa")
                ->selectRaw("SUM(CASE WHEN role = 'guru' THEN 1 ELSE 0 END) as guru")
                ->selectRaw("SUM(CASE WHEN role = 'admin' THEN 1 ELSE 0 END) as admin")
                ->selectRaw('SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) as active')
                ->first();

            return [
                'total' => (int) $userCounts->total,
                'siswa' => (int) $userCounts->siswa,
                'guru' => (int) $userCounts->guru,
                'admin' => (int) $userCounts->admin,
                'active' => (int) $userCounts->active,
                'pendingProducts' => ProdukBlud::query()->whereIn('status', ['diajukan', 'dikurasi'])->count(),
                'activeVacancies' => LowonganBkk::query()->where('is_active', true)->count(),
                'applications' => LamaranKerja::query()->count(),
                'grades' => NilaiAkademik::query()->count(),
            ];
        });

        $pendingProducts = ProdukBlud::query()
            ->with('user:id,name,nis')
            ->whereIn('status', ['diajukan', 'dikurasi'])
            ->latest()
            ->take(4)
            ->get();

        $recentUsers = User::query()
            ->latest()
            ->take(5)
            ->get(['id', 'name', 'email', 'role', 'is_active', 'created_at']);

        return view('admin.dashboard', compact('pendingProducts', 'recentUsers', 'stats'));
    }

    public function users(): View
    {
        return view('admin.users', ['users' => User::query()->latest()->paginate(15)]);
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'email', 'unique:users,email'], 'password' => ['required', 'string', 'min:8'], 'role' => ['required', 'in:siswa,guru,admin'], 'nis' => ['nullable', 'string', 'max:30', 'unique:users,nis'], 'kelas' => ['nullable', 'string', 'max:100'], 'jurusan' => ['nullable', 'string', 'max:100']]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $this->audit('Membuat pengguna', $user, $user->name);
        Cache::forget('admin_dashboard_stats');

        return back()->with('success', 'Akun berhasil ditambahkan.');
    }

    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'email', 'unique:users,email,'.$user->id], 'role' => ['required', 'in:siswa,guru,admin'], 'nis' => ['nullable', 'string', 'max:30', 'unique:users,nis,'.$user->id], 'kelas' => ['nullable', 'string', 'max:100'], 'jurusan' => ['nullable', 'string', 'max:100'], 'password' => ['nullable', 'string', 'min:8']]);
        if ($data['password'] === null) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);
        $this->audit('Memperbarui pengguna', $user, $user->name);

        return back()->with('success', 'Data akun berhasil diperbarui.');
    }

    public function toggleUser(User $user): RedirectResponse
    {
        abort_if($user->is(auth()->user()), 422, 'Akun sendiri tidak dapat dinonaktifkan.');
        $user->update(['is_active' => ! $user->is_active]);
        $this->audit('Mengubah status pengguna', $user, $user->name);
        Cache::forget('admin_dashboard_stats');

        return back()->with('success', 'Status akun berhasil diperbarui.');
    }

    public function academic(): View
    {
        return view('admin.academic', ['students' => User::query()->where('role', 'siswa')->orderBy('name')->get(), 'grades' => NilaiAkademik::query()->with('user')->latest()->paginate(10), 'attendances' => AcademicAttendance::query()->with('user')->latest('tanggal')->take(8)->get(), 'assignments' => AcademicAssignment::query()->with('user')->latest()->take(8)->get()]);
    }

    public function storeGrade(Request $request): RedirectResponse
    {
        $data = $request->validate(['user_id' => ['required', 'exists:users,id'], 'mata_pelajaran' => ['required', 'string', 'max:255'], 'semester' => ['required', 'string', 'max:20'], 'tahun_ajaran' => ['required', 'string', 'max:20'], 'nilai_akhir' => ['required', 'numeric', 'min:0', 'max:100']]);
        $data['predikat'] = $data['nilai_akhir'] >= 90 ? 'A' : ($data['nilai_akhir'] >= 80 ? 'B' : ($data['nilai_akhir'] >= 70 ? 'C' : 'D'));
        $grade = NilaiAkademik::create($data);
        $this->audit('Menginput nilai', $grade, $data['mata_pelajaran']);
        // Bust student akademik cache
        Cache::forget("siswa_akademik_{$data['user_id']}");
        Cache::forget("siswa_dashboard_{$data['user_id']}");
        Cache::forget('admin_dashboard_stats');

        return back()->with('success', 'Nilai berhasil disimpan.');
    }

    public function storeAttendance(Request $request): RedirectResponse
    {
        $data = $request->validate(['user_id' => ['required', 'exists:users,id'], 'tanggal' => ['required', 'date'], 'status' => ['required', 'in:hadir,izin,sakit,alpa'], 'keterangan' => ['nullable', 'string', 'max:255']]);
        $attendance = AcademicAttendance::create($data);
        $this->audit('Mencatat kehadiran', $attendance);

        return back()->with('success', 'Kehadiran berhasil dicatat.');
    }

    public function storeAssignment(Request $request): RedirectResponse
    {
        $data = $request->validate(['user_id' => ['required', 'exists:users,id'], 'judul' => ['required', 'string', 'max:255'], 'mata_pelajaran' => ['required', 'string', 'max:255'], 'batas_kumpul' => ['nullable', 'date'], 'status' => ['required', 'in:ditugaskan,dikumpulkan,dinilai'], 'nilai' => ['nullable', 'numeric', 'min:0', 'max:100'], 'catatan' => ['nullable', 'string']]);
        $assignment = AcademicAssignment::create($data);
        $this->audit('Mencatat tugas', $assignment, $data['judul']);

        return back()->with('success', 'Tugas berhasil disimpan.');
    }

    public function blud(): View
    {
        return view('admin.blud', ['products' => ProdukBlud::query()->with('user')->latest()->paginate(15)]);
    }

    public function updateProduct(Request $request, ProdukBlud $product): RedirectResponse
    {
        $data = $request->validate(['status' => ['required', 'in:draft,diajukan,dikurasi,disetujui,ditolak'], 'catatan_kurator' => ['nullable', 'string', 'max:1000']]);
        $product->update($data);
        $this->audit('Memperbarui kurasi produk', $product, $product->nama_produk);
        // Bust BLUD caches
        Cache::forget("siswa_blud_{$product->user_id}");
        Cache::forget("siswa_dashboard_{$product->user_id}");
        Cache::forget('blud_katalog_publik');
        Cache::forget('admin_dashboard_stats');

        return back()->with('success', 'Status produk berhasil diperbarui.');
    }

    public function jobs(): View
    {
        return view('admin.jobs', ['jobs' => LowonganBkk::query()->latest()->paginate(10), 'applications' => LamaranKerja::query()->with(['user', 'lowongan'])->latest()->take(15)->get()]);
    }

    public function storeJob(Request $request): RedirectResponse
    {
        $data = $request->validate(['nama_perusahaan' => ['required', 'string', 'max:255'], 'posisi' => ['required', 'string', 'max:255'], 'lokasi' => ['required', 'string', 'max:255'], 'tipe_kerja' => ['required', 'in:full-time,part-time,magang,kontrak'], 'batas_daftar' => ['nullable', 'date'], 'kuota' => ['required', 'integer', 'min:1'], 'deskripsi' => ['nullable', 'string'], 'persyaratan' => ['nullable', 'string']]);
        $job = LowonganBkk::create($data);
        $this->audit('Membuat lowongan', $job, $job->posisi);
        Cache::forget('bkk_active_lowongans');
        Cache::forget('admin_dashboard_stats');

        return back()->with('success', 'Lowongan berhasil dipublikasikan.');
    }

    public function toggleJob(LowonganBkk $job): RedirectResponse
    {
        $job->update(['is_active' => ! $job->is_active]);
        $this->audit('Mengubah status lowongan', $job, $job->posisi);
        Cache::forget('bkk_active_lowongans');
        Cache::forget('admin_dashboard_stats');

        return back()->with('success', 'Status lowongan berhasil diperbarui.');
    }

    public function updateApplication(Request $request, LamaranKerja $application): RedirectResponse
    {
        $data = $request->validate(['status' => ['required', 'in:diajukan,seleksi_berkas,wawancara,diterima,ditolak'], 'catatan_perusahaan' => ['nullable', 'string']]);
        $application->update($data);
        $this->audit('Memperbarui status lamaran', $application);

        return back()->with('success', 'Status lamaran berhasil diperbarui.');
    }

    public function ppdb(): View
    {
        return view('admin.ppdb', ['applications' => PpdbApplication::query()->latest()->paginate(15)]);
    }

    public function storePpdb(Request $request): RedirectResponse
    {
        $data = $request->validate(['nama_lengkap' => ['required', 'string', 'max:255'], 'nisn' => ['nullable', 'string', 'max:30', 'unique:ppdb_applications,nisn'], 'email' => ['nullable', 'email'], 'nomor_telepon' => ['nullable', 'string', 'max:30'], 'jurusan_pilihan' => ['required', 'string', 'max:100'], 'jalur_pendaftaran' => ['required', 'string', 'max:100']]);
        $application = PpdbApplication::create($data);
        $this->audit('Menambah pendaftar PPDB', $application, $application->nama_lengkap);

        return back()->with('success', 'Pendaftar PPDB berhasil ditambahkan.');
    }

    public function updatePpdb(Request $request, PpdbApplication $application): RedirectResponse
    {
        $data = $request->validate(['status' => ['required', 'in:menunggu_verifikasi,berkas_lengkap,seleksi,diterima,ditolak'], 'catatan_verifikasi' => ['nullable', 'string']]);
        if ($data['status'] !== 'menunggu_verifikasi') {
            $data['verified_at'] = now();
        }
        $application->update($data);
        $this->audit('Memperbarui PPDB', $application, $application->nama_lengkap);

        return back()->with('success', 'Status PPDB berhasil diperbarui.');
    }

    public function content(): View
    {
        return view('admin.content', ['contents' => PublicContent::query()->orderBy('area')->get()]);
    }

    public function saveContent(Request $request): RedirectResponse
    {
        $data = $request->validate(['area' => ['required', 'string', 'max:100'], 'judul' => ['required', 'string', 'max:255'], 'isi' => ['nullable', 'string'], 'is_published' => ['nullable', 'boolean']]);
        $content = PublicContent::updateOrCreate(['area' => $data['area']], ['judul' => $data['judul'], 'isi' => $data['isi'] ?? null, 'is_published' => $request->boolean('is_published')]);
        $this->audit('Menyimpan konten publik', $content, $content->area);

        return back()->with('success', 'Konten publik berhasil disimpan.');
    }

    public function settings(): View
    {
        return view('admin.settings', ['settings' => AppSetting::query()->pluck('value', 'key'), 'logs' => AdminAuditLog::query()->with('user')->latest()->take(20)->get()]);
    }

    public function saveSettings(Request $request): RedirectResponse
    {
        $data = $request->validate(['school_name' => ['required', 'string', 'max:255'], 'school_email' => ['nullable', 'email'], 'maintenance_notice' => ['nullable', 'string', 'max:1000']]);
        foreach ($data as $key => $value) {
            AppSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        $this->audit('Memperbarui pengaturan aplikasi');

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    public function reports(): View
    {
        return view('admin.reports', ['totals' => ['users' => User::count(), 'grades' => NilaiAkademik::count(), 'products' => ProdukBlud::count(), 'jobs' => LowonganBkk::count(), 'applications' => LamaranKerja::count(), 'ppdb' => PpdbApplication::count()]]);
    }

    public function export(Request $request): StreamedResponse
    {
        $type = $request->validate(['type' => ['required', 'in:users,grades,products,jobs,applications,ppdb']])['type'];
        $rows = match ($type) {
            'users' => User::query()->get(['name', 'email', 'role', 'nis', 'kelas', 'jurusan', 'is_active']), 'grades' => NilaiAkademik::query()->with('user:id,name')->get()->map(fn ($row) => ['siswa' => $row->user?->name, 'mapel' => $row->mata_pelajaran, 'nilai' => $row->nilai_akhir, 'semester' => $row->semester]), 'products' => ProdukBlud::query()->with('user:id,name')->get()->map(fn ($row) => ['produk' => $row->nama_produk, 'siswa' => $row->user?->name, 'status' => $row->status, 'harga' => $row->harga]), 'jobs' => LowonganBkk::query()->get(['nama_perusahaan', 'posisi', 'lokasi', 'is_active', 'pelamar_count']), 'applications' => LamaranKerja::query()->with(['user:id,name', 'lowongan:id,posisi'])->get()->map(fn ($row) => ['siswa' => $row->user?->name, 'lowongan' => $row->lowongan?->posisi, 'status' => $row->status, 'tanggal' => $row->tanggal_lamar]), 'ppdb' => PpdbApplication::query()->get(['nama_lengkap', 'nisn', 'jurusan_pilihan', 'jalur_pendaftaran', 'status'])
        };
        $this->audit('Mengekspor laporan', null, $type);

        return response()->streamDownload(function () use ($rows): void {
            $output = fopen('php://output', 'w');
            fputcsv($output, array_keys((array) $rows->first() ?: ['data' => '']));
            foreach ($rows as $row) {
                fputcsv($output, (array) $row);
            } fclose($output);
        }, "laporan-{$type}.csv");
    }
}
