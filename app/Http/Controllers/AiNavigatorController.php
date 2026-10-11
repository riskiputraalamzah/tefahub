<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AiNavigatorController extends Controller
{
    /**
     * Comprehensive intent-based knowledge base for instant offline responses.
     *
     * @var array<int, array{intents: string[], keywords: string[], category: string, answer: string, route: string|null, label: string|null, suggestions?: string[]}>
     */
    private array $intents = [];

    public function __construct()
    {
        $this->intents = $this->buildIntents();
    }

    /**
     * Helper to determine base prefix route based on user auth status.
     */
    private function resolveRoute(string $target): string
    {
        $role = auth()->check() ? (auth()->user()->role ?? '') : '';

        return match ($target) {
            'blud' => $role === 'siswa' ? '/siswa/blud' : '/#blud',
            'bkk' => $role === 'siswa' ? '/siswa/bkk' : '/bkk',
            'pkl' => '/pkl',
            'akademik' => $role === 'siswa' ? '/siswa/akademik' : '/login',
            'dashboard' => $role === 'admin' ? '/admin/dashboard' : ($role === 'guru' ? '/guru/dashboard' : ($role === 'siswa' ? '/siswa/dashboard' : '/')),
            'guru_dashboard' => $role === 'guru' ? '/guru/dashboard' : '/login',
            'admin_dashboard' => $role === 'admin' ? '/admin/dashboard' : '/login',
            'profile' => $role ? "/{$role}/dashboard" : '/login',
            'login' => '/login',
            'register' => '/register',
            'ppdb' => '/ppdb',
            'tanya_tefa' => $role === 'siswa' ? '/siswa/tanya-tefa' : '/#tanya-tefa',
            default => '/',
        };
    }

    /**
     * Build the full intent knowledge base with structured role & Q&A pairs.
     *
     * @return array<int, array{intents: string[], keywords: string[], category: string, answer: string, route: string|null, label: string|null, suggestions?: string[]}>
     */
    private function buildIntents(): array
    {
        return [
            // ─── SAPAAN & PERKENALAN UMUM ────────────────────────────────────
            [
                'intents' => ['hai', 'halo', 'hello', 'selamat pagi', 'selamat siang', 'selamat sore', 'selamat malam', 'hei', 'assalamualaikum', 'permisi', 'halo tefa', 'hai tefa'],
                'keywords' => ['hai saya', 'halo saya', 'salam kenal', 'perkenalkan', 'saya ingin', 'saya mau', 'saya hendak'],
                'category' => 'PPDB',
                'answer' => "Halo! 👋 Selamat datang di TEFA-Hub SMK Antartika 1 Sidoarjo!\n\nSaya Tanya Tefa AI, asisten virtual yang siap membantu Anda. 😊\nSaya bisa membantu Anda dengan:\n\n1. 📝 **Pendaftaran PPDB** — Info alur, syarat, jadwal, dan biaya\n2. 🎯 **Pilihan Jurusan** — TPM, TKR, RPL, TITL, dan TEI\n3. 💼 **Karir & Magang** — Info BKK, PKL, dan lowongan kerja\n4. 🏭 **BLUD** — Unit produksi dan publikasi karya siswa\n5. 🎓 **Akademik** — Nilai rapor, absensi, dan jadwal\n\nSilakan ceritakan kebutuhan Anda, atau klik salah satu topik di bawah!",
                'route' => 'ppdb',
                'label' => 'Buka Halaman PPDB Online',
                'suggestions' => ['Cara Daftar PPDB Online', 'Pilihan Jurusan & Keahlian', 'Syarat Berkas PPDB', 'Info Biaya Sekolah'],
            ],

            // ─── PUSAT PPDB & PENDAFTARAN SISWA BARU ──────────────────────
            [
                'intents' => ['ppdb', 'daftar ppdb', 'pendaftaran ppdb', 'info ppdb', 'halaman ppdb', 'buka ppdb', 'link ppdb', 'ppdb smk', 'mau daftar', 'daftar sekolah', 'penerimaan siswa baru', 'ppdb online', 'mau mendaftar', 'ingin mendaftar', 'mendaftarkan diri', 'cara mendaftar', 'mendaftar sekolah', 'pendaftaran siswa'],
                'keywords' => ['ppdb', 'pendaftaran', 'calon siswa', 'murid baru', 'registrasi siswa', 'formulir', 'mendaftarkan', 'mendaftar'],
                'category' => 'PPDB',
                'answer' => "Pusat Pendaftaran Peserta Didik Baru (PPDB Online) TEFA-Hub telah dibuka!\n\nLayanan PPDB menyediakan:\n1. 📝 Pendaftaran Online & Pengisian Formulir Biodata\n2. 📄 Unggah & Verifikasi Berkas (KK, Akta, SKL/Rapor SMP, NISN)\n3. 🎯 Pilihan 5 Konsentrasi Keahlian / Jurusan Unggulan\n4. 💰 Program Potongan Biaya & Beasiswa Prestasi\n5. 📅 Jadwal & Alur Seleksi Transparan\n\nKlik tombol navigasi di bawah untuk langsung menuju ke halaman PPDB:",
                'route' => 'ppdb',
                'label' => 'Buka Halaman PPDB Online',
                'suggestions' => ['Cara Daftar PPDB Online', 'Syarat Berkas PPDB', 'Jadwal PPDB', 'Pilihan Jurusan & Keahlian'],
            ],

            // ─── DETAIL JURUSAN RPL ──────────────────────────────────────────
            [
                'intents' => ['jurusan rpl', 'rpl itu apa', 'tentang rpl', 'rekayasa perangkat lunak', 'info rpl', 'rpl smk', 'belajar apa di rpl', 'pelajaran rpl', 'prospek rpl', 'karir rpl', 'kerja di rpl', 'gaji rpl', 'cocok rpl', 'masuk rpl', 'pilih rpl'],
                'keywords' => ['jurusan rpl', 'tentang rpl', 'perangkat lunak', 'rekayasa perangkat', 'karir rpl', 'prospek rpl'],
                'category' => 'PPDB',
                'answer' => "Jurusan RPL - Rekayasa Perangkat Lunak\n\nRPL berfokus pada dunia pengembangan software dan teknologi digital.\n\nYang dipelajari:\n- Pemrograman web (HTML, CSS, JS, PHP, Laravel)\n- Mobile app development (Android/Flutter)\n- Database & cloud computing\n- UI/UX design & AI dasar\n- Cybersecurity dasar\n\nProspek karir:\nWeb Developer, Mobile Developer, Data Analyst, UI/UX Designer, Software Engineer\n\nCocok untuk kamu yang suka coding, logika, dan membuat aplikasi!",
                'route' => 'ppdb',
                'label' => 'Daftar Jurusan RPL',
                'suggestions' => ['Cara Daftar PPDB Online', 'Jurusan TEI (Elektronika)', 'Jurusan TITL (Listrik)', 'Kuis Temukan Jurusanmu'],
            ],

            // ─── DETAIL JURUSAN TEI ──────────────────────────────────────────
            [
                'intents' => ['jurusan tei', 'tei itu apa', 'tentang tei', 'teknik elektronika industri', 'info tei', 'tei smk', 'belajar apa di tei', 'pelajaran tei', 'prospek tei', 'karir tei', 'kerja di tei', 'gaji tei', 'cocok tei', 'masuk tei', 'pilih tei', 'jurusan elektronika'],
                'keywords' => ['jurusan tei', 'tentang tei', 'elektronika industri', 'teknik elektronika', 'karir tei', 'prospek tei'],
                'category' => 'PPDB',
                'answer' => "Jurusan TEI - Teknik Elektronika Industri\n\nTEI berfokus pada otomasi industri, robotika, IoT, dan sistem elektronika berstandar industri.\n\nYang dipelajari:\n- Pemrograman mikrokontroler (Arduino, ESP32)\n- IoT (Internet of Things) & sensor\n- Robotika & otomasi industri\n- PLC (Programmable Logic Controller)\n- Sistem elektronika analog & digital\n\nProspek karir:\nTeknisi Otomasi, IoT Engineer, Robotics Technician, Electrical Technician, Maintenance Engineer\n\nCocok untuk kamu yang suka elektronika, robot, dan teknologi cerdas!",
                'route' => 'ppdb',
                'label' => 'Daftar Jurusan TEI',
                'suggestions' => ['Jurusan RPL (Software)', 'Jurusan TITL (Listrik)', 'Cara Daftar PPDB Online', 'Kuis Temukan Jurusanmu'],
            ],

            // ─── DETAIL JURUSAN TITL ──────────────────────────────────────────
            [
                'intents' => ['jurusan titl', 'titl itu apa', 'tentang titl', 'teknik instalasi tenaga listrik', 'info titl', 'titl smk', 'belajar apa di titl', 'pelajaran titl', 'prospek titl', 'karir titl', 'kerja di titl', 'gaji titl', 'cocok titl', 'masuk titl', 'pilih titl', 'jurusan listrik'],
                'keywords' => ['jurusan titl', 'tentang titl', 'instalasi tenaga listrik', 'teknik instalasi', 'karir titl', 'prospek titl'],
                'category' => 'PPDB',
                'answer' => "Jurusan TITL - Teknik Instalasi Tenaga Listrik\n\nTITL berfokus pada instalasi sistem kelistrikan industri, panel kontrol, dan energi terbarukan.\n\nYang dipelajari:\n- Instalasi listrik rumah, gedung & industri\n- Panel kontrol & sistem pengaman listrik\n- PLC (Programmable Logic Controller)\n- Motor listrik & sistem distribusi\n- Energi surya (solar panel) & terbarukan\n\nProspek karir:\nTeknisi Listrik, Electrical Engineer, PLC Programmer, Teknisi Solar Panel, Kontraktor Listrik\n\nCocok untuk kamu yang suka kelistrikan, panel, dan energi!",
                'route' => 'ppdb',
                'label' => 'Daftar Jurusan TITL',
                'suggestions' => ['Jurusan TEI (Elektronika)', 'Jurusan TPM (Pemesinan)', 'Cara Daftar PPDB Online', 'Kuis Temukan Jurusanmu'],
            ],

            // ─── DETAIL JURUSAN TKR ──────────────────────────────────────────
            [
                'intents' => ['jurusan tkr', 'tkr itu apa', 'tentang tkr', 'teknik kendaraan ringan', 'info tkr', 'tkr smk', 'belajar apa di tkr', 'pelajaran tkr', 'prospek tkr', 'karir tkr', 'kerja di tkr', 'gaji tkr', 'cocok tkr', 'masuk tkr', 'pilih tkr', 'jurusan otomotif', 'jurusan mobil'],
                'keywords' => ['jurusan tkr', 'tentang tkr', 'kendaraan ringan', 'teknik kendaraan', 'karir tkr', 'prospek tkr'],
                'category' => 'PPDB',
                'answer' => "Jurusan TKR - Teknik Kendaraan Ringan\n\nTKR berfokus pada perawatan, perbaikan, dan diagnosa kendaraan otomotif berteknologi modern.\n\nYang dipelajari:\n- Mesin otomotif & sistem EFI (Electronic Fuel Injection)\n- Diagnosa kerusakan dengan scanner digital\n- Sistem rem, suspensi & kemudi\n- Transmisi manual & otomatis\n- AC kendaraan & sistem kelistrikan mobil\n\nProspek karir:\nTeknisi Otomotif, Service Advisor, Mekanik Profesional, Quality Control Otomotif\n\nCocok untuk kamu yang suka kendaraan, mesin, dan dunia otomotif!",
                'route' => 'ppdb',
                'label' => 'Daftar Jurusan TKR',
                'suggestions' => ['Jurusan TPM (Pemesinan)', 'Jurusan TEI (Elektronika)', 'Cara Daftar PPDB Online', 'Kuis Temukan Jurusanmu'],
            ],

            // ─── DETAIL JURUSAN TPM ──────────────────────────────────────────
            [
                'intents' => ['jurusan tpm', 'tpm itu apa', 'tentang tpm', 'teknik pemesinan', 'info tpm', 'tpm smk', 'belajar apa di tpm', 'pelajaran tpm', 'prospek tpm', 'karir tpm', 'kerja di tpm', 'gaji tpm', 'cocok tpm', 'masuk tpm', 'pilih tpm', 'jurusan mesin', 'jurusan cnc', 'jurusan manufaktur'],
                'keywords' => ['jurusan tpm', 'tentang tpm', 'teknik pemesinan', 'pemesinan cnc', 'karir tpm', 'prospek tpm'],
                'category' => 'PPDB',
                'answer' => "Jurusan TPM - Teknik Pemesinan\n\nTPM berfokus pada manufaktur presisi, mesin CNC, dan fabrikasi komponen industri berstandar internasional.\n\nYang dipelajari:\n- Mesin bubut & frais konvensional\n- CNC (Computer Numerical Control) bubut & milling\n- CAD/CAM (desain & pemrograman mesin CNC)\n- Fabrikasi logam & welding\n- Metrologi & kontrol kualitas produk\n\nProspek karir:\nOperator CNC, Drafter CAD/CAM, Teknisi Manufaktur, Quality Control, Supervisor Produksi\n\nCocok untuk kamu yang suka presisi, mesin, dan dunia manufaktur!",
                'route' => 'ppdb',
                'label' => 'Daftar Jurusan TPM',
                'suggestions' => ['Jurusan TKR (Otomotif)', 'Jurusan TITL (Listrik)', 'Cara Daftar PPDB Online', 'Kuis Temukan Jurusanmu'],
            ],

            // ─── NAVIGASI PERAN UTAMA (ROLE ORIENTATION) ──────────────────── (ROLE ORIENTATION) ────────────────────
            [
                'intents' => ['saya orang tua', 'saya wali murid', 'role orang tua', 'info orang tua', 'saya calon siswa', 'calon murid baru', 'wali calon siswa'],
                'keywords' => ['orang tua', 'wali murid', 'calon siswa', 'wali calon', 'ortu', 'daftar anak'],
                'category' => 'PPDB',
                'answer' => "Selamat datang Bapak/Ibu Orang Tua & Calon Siswa! 👋\nSaya siap memandu Anda mengenai pendaftaran dan informasi sekolah:\n1. 📝 Pendaftaran PPDB Online & Alur Seleksi\n2. 📋 Persyaratan Berkas Dokumen Masuk\n3. 🎯 Pilihan Konsentrasi Keahlian / Jurusan SMK\n4. 💰 Informasi Bebas Biaya & Fasilitas Sekolah\n\nSilakan pilih topik panduan di bawah ini untuk melihat rincian lengkapnya:",
                'route' => 'ppdb',
                'label' => 'Buka Informasi PPDB Online',
                'suggestions' => ['Cara Daftar PPDB Online', 'Syarat Berkas PPDB', 'Pilihan Jurusan & Keahlian', 'Biaya Sekolah & SPP'],
            ],
            [
                'intents' => ['saya guru', 'saya guru pembimbing', 'role guru', 'pendidik', 'tenaga pendidik', 'guru kejuruan', 'pembimbing pkl'],
                'keywords' => ['guru', 'guru pembimbing', 'pembimbing pkl', 'wali kelas', 'tenaga pendidik', 'portal guru'],
                'category' => 'GURU',
                'answer' => "Selamat datang Bapak/Ibu Guru Pembimbing & Tenaga Pendidik! 👨‍🏫\nPlatform TEFA-Hub siap mendukung efisiensi pengajaran & pembimbingan vokasi Anda:\n1. 📋 Monitoring & Penilaian Logbook Harian Siswa Magang/PKL.\n2. 🏭 Validasi & Kurasi Produk Siswa yang diajukan ke Unit BLUD.\n3. 🎓 Input & Sinkronisasi Nilai Rapor Vokasi dan Rekap Absensi.\n4. 📊 Pemantauan Kesiapan Kerja & Sertifikasi Siswa Bimbingan.",
                'route' => 'guru_dashboard',
                'label' => 'Masuk ke Portal Guru Pembimbing',
                'suggestions' => ['Cara Validasi Produk BLUD', 'Monitoring Siswa PKL', 'Input Nilai Akademik', 'Bantuan Akun Guru'],
            ],
            [
                'intents' => ['saya siswa aktif', 'role siswa', 'saya siswa smk', 'info siswa', 'murid aktif'],
                'keywords' => ['siswa aktif', 'murid aktif', 'saya siswa', 'kelas 10', 'kelas 11', 'kelas 12'],
                'category' => 'SISWA',
                'answer' => "Halo Siswa Hebat TEFA-Hub! 🎓\nSebagai siswa aktif, Anda memiliki akses penuh ke fitur vokasi terpadu:\n1. 🏭 BLUD: Publikasikan karya/proyek kejuruan & raih komisi hasil kerja.\n2. 💼 BKK & PKL: Cek rekomendasi magang/PKL & lamar lowongan kerja mitra.\n3. 🎓 Akademik: Pantau nilai rapor semester & rekap absensi harian.\n4. 🛡️ Akun: Edit profil biodata & kelola portofolio digital mandiri.",
                'route' => 'dashboard',
                'label' => 'Buka Dashboard Siswa',
                'suggestions' => ['Cara Publikasi Produk BLUD', 'Cara Daftar Magang PKL', 'Cara Cek Nilai Rapor', 'Cara Edit Profil Siswa'],
            ],
            [
                'intents' => ['saya alumni', 'role alumni', 'lulusan smk', 'pencari kerja', 'alumni smk', 'info alumni'],
                'keywords' => ['saya alumni', 'lulusan', 'pencari kerja', 'job seeker', 'sudah lulus'],
                'category' => 'BKK',
                'answer' => "Halo Rekan Alumni SMK! 💼\nLayanan BKK Career Center siap mendampingi karir profesional Anda:\n1. 💼 Lamar Lowongan Kerja Mitra Industri terverifikasi resmi.\n2. 📜 Layanan Legalisir Ijazah & Transkrip Nilai secara terpadu.\n3. 🏆 Sertifikasi Profesi LSP/BNSP untuk meningkatkan daya saing.\n4. 📊 Pengisian Tracer Study untuk rekam jejak keterserapan alumni.",
                'route' => 'bkk',
                'label' => 'Buka Bursa Kerja BKK',
                'suggestions' => ['Cara Melamar Lowongan BKK', 'Legalisir Ijazah Online', 'Kesiapan Kerja BKK', 'Sertifikasi BNSP LSP'],
            ],
            [
                'intents' => ['saya mitra industri', 'saya perusahaan', 'role industri', 'mitra dudi', 'kerjasama sekolah', 'order jasa industri', 'rekrut alumni', 'dudi'],
                'keywords' => ['mitra industri', 'perusahaan', 'dudi', 'kerjasama tefa', 'rekrut lulusan', 'pesan jasa industri', 'mou sekolah', 'order jasa'],
                'category' => 'INDUSTRI',
                'answer' => "Selamat datang Bapak/Ibu Pimpinan Mitra Dunia Usaha & Industri (DUDI)! 🏢\nTEFA-Hub membuka kemitraan strategis dengan fasilitas unggulan:\n1. 🤝 Kerjasama Teaching Factory (TEFA): Pengerjaan pesanan manufaktur, software & multimedia berstandar industri.\n2. 👥 Rekrutmen Eksklusif: Rekrut lulusan kompeten bersertifikat BNSP melalui BKK.\n3. 🛠️ Program Prakerin / Magang Industri: Penempatan talenta vokasi terbaik.\n4. 📦 Pemesanan Produk/Jasa BLUD berbadan hukum resmi.",
                'route' => 'pkl',
                'label' => 'Eksplorasi Mitra & Lowongan PKL',
                'suggestions' => ['Kerjasama Teaching Factory', 'Rekrutmen Tenaga Kerja BKK', 'Cara Pemesanan Produk BLUD', 'Hubungi Hubungan Industri'],
            ],
            [
                'intents' => ['saya admin', 'role admin', 'pengelola sistem', 'administrator', 'operator sekolah', 'petugas tu'],
                'keywords' => ['admin', 'administrator', 'operator', 'petugas tu', 'kelola sistem', 'monitoring server'],
                'category' => 'ADMIN',
                'answer' => "Selamat bertugas Administrator & Pengelola Sistem! 🏛️\nModul pengelolaan operasional TEFA-Hub tersedia terpadu:\n1. 👥 Manajemen Pengguna: Verifikasi akun siswa, guru, dan mitra industri.\n2. 📈 Monitoring Sistem: Pantau metrik server, beban CPU/RAM, dan log keamanan real-time.\n3. 📄 Layanan TU: Pengelolaan surat keterangan, dispensasi magang, dan reset password mandiri.\n4. 🗂️ Sinkronisasi Data PPDB & E-Rapor Vokasi.",
                'route' => 'admin_dashboard',
                'label' => 'Buka Dashboard Admin',
                'suggestions' => ['Monitoring Sistem & Metrik', 'Reset Password Akun', 'Manajemen Pengguna', 'Jam Layanan TU'],
            ],
            [
                'intents' => ['saya tamu', 'layanan umum', 'tata usaha sekolah', 'keperluan tu', 'urus administrasi'],
                'keywords' => ['tamu', 'layanan tu', 'tata usaha', 'administrasi sekolah', 'surat menyurat'],
                'category' => 'ADMIN_FAQ',
                'answer' => "Selamat datang di Layanan Administrasi & Tata Usaha TEFA-Hub! 🏛️\n• Lokasi: Ruang Tata Usaha (Gedung Utama Lt. 1)\n• Jam Kerja: Senin – Jumat, pukul 07.30 – 15.30 WIB\n• Layanan: Surat keterangan siswa aktif, legalisir dokumen, pengurusan berkas pindah, dan konsultasi akun sistem.",
                'route' => 'dashboard',
                'label' => 'Info Bantuan & Administrasi',
                'suggestions' => ['Kontak Admin Sekolah', 'Surat Keterangan Siswa Aktif', 'Lupa Password Akun', 'Jam Layanan TU'],
            ],

            // ─── PANDUAN PPDB LENGKAP (ORANG TUA & CALON SISWA) ─────────────
            [
                'intents' => ['cara daftar ppdb', 'alur pendaftaran siswa baru', 'tata cara ppdb', 'bagaimana cara daftar ppdb', 'pendaftaran ppdb online', 'langkah ppdb'],
                'keywords' => ['cara daftar ppdb', 'alur ppdb', 'daftar siswa baru', 'tata cara ppdb', 'langkah daftar'],
                'category' => 'PPDB',
                'answer' => "Alur Lengkap Pendaftaran PPDB Online:\n1. Buka portal PPDB online melalui halaman Beranda TEFA-Hub.\n2. Klik tombol \"Daftar Akun Calon Siswa\" dan isi NISN, Nama Lengkap, serta Nomor WhatsApp aktif.\n3. Lengkapi formulir biodata diri dan data orang tua/wali.\n4. Unggah berkas dokumen (KK, Akta Lahir, SKL/Nilai Rapor SMP, dan Pas Foto).\n5. Pilih 1 atau 2 Konsentrasi Keahlian (Jurusan) yang diminati.\n6. Unduh Bukti Pendaftaran dan tunggu jadwal verifikasi & pengumuman hasil seleksi.",
                'route' => 'ppdb',
                'label' => 'Buka Pendaftaran PPDB',
                'suggestions' => ['Syarat Berkas PPDB', 'Jalur Masuk PPDB', 'Pilihan Jurusan & Keahlian', 'Biaya Sekolah & SPP'],
            ],
            [
                'intents' => ['syarat berkas ppdb', 'dokumen ppdb', 'berkas pendaftaran siswa baru', 'apa saja syarat ppdb', 'dokumen yang harus diupload ppdb'],
                'keywords' => ['syarat berkas', 'dokumen ppdb', 'berkas ppdb', 'upload ppdb', 'persyaratan ppdb', 'surat keterangan lulus'],
                'category' => 'PPDB',
                'answer' => "Persyaratan Berkas Dokumen PPDB:\n1. 📄 Scan/Foto Kartu Keluarga (KK) asli (minimal berdomisili 1 tahun).\n2. 📄 Scan/Foto Akta Kelahiran asli calon siswa.\n3. 📄 Scan/Foto Surat Keterangan Lulus (SKL) / Ijazah SMP/MTs sederajat.\n4. 📄 Scan Nilai Rapor SMP semester 1 sampai 5.\n5. 📄 Pas Foto terbaru berseragam SMP (latar merah/biru, format JPG/PNG maks. 2MB).\n6. 📄 Piagam Penghargaan / Sertifikat Prestasi (khusus Jalur Prestasi).",
                'route' => 'ppdb',
                'label' => 'Lihat Ketentuan Berkas',
                'suggestions' => ['Cara Daftar PPDB Online', 'Jalur Masuk PPDB', 'Pilihan Jurusan & Keahlian'],
            ],
            [
                'intents' => ['jalur masuk ppdb', 'jalur pendaftaran', 'kuota ppdb', 'jalur zonasi', 'jalur prestasi', 'jalur afirmasi', 'jalur tes minat'],
                'keywords' => ['jalur ppdb', 'jalur zonasi', 'jalur prestasi', 'jalur afirmasi', 'jalur tes', 'kuota penerimaan'],
                'category' => 'PPDB',
                'answer' => "Pilihan Jalur Masuk PPDB:\n1. 📍 Jalur Zonasi / Domisili: Berdasarkan jarak tempat tinggal ke sekolah sesuai KK.\n2. 🏆 Jalur Prestasi: Menggunakan nilai rapor SMP atau piagam kejuaraan akademik/non-akademik.\n3. 🤝 Jalur Afirmasi: Bagi keluarga pemegang kartu bantuan pemerintah (KIP, PKH, KKS).\n4. 🎯 Jalur Tes Minat & Bakat Kejuruan: Penilaian kompetensi dasar kejuruan dan wawancara minat siswa.",
                'route' => 'ppdb',
                'label' => 'Pilih Jalur Pendaftaran',
                'suggestions' => ['Syarat Berkas PPDB', 'Pilihan Jurusan & Keahlian', 'Jadwal PPDB'],
            ],
            [
                'intents' => ['pilihan jurusan', 'jurusan apa saja', 'konsentrasi keahlian', 'program keahlian', 'jurusan smk', 'kejuruan', 'jurusan favorit', 'tpm', 'rpl', 'tei', 'tkr', 'titl', 'pemesinan', 'otomotif', 'listrik', 'elektronika', 'perangkat lunak'],
                'keywords' => ['jurusan', 'konsentrasi keahlian', 'program keahlian', 'tpm', 'rpl', 'tei', 'tkr', 'titl', 'mesin', 'otomotif', 'listrik', 'elektronika', 'software'],
                'category' => 'PPDB',
                'answer' => "SMK Antartika 1 Sidoarjo memiliki 5 Program Keahlian Unggulan berstandar industri:\n1. ⚙️ TPM — Teknik Pemesinan: CNC bubut & frais presisi, manufaktur, fabrikasi, CAD/CAM.\n2. 🚗 TKR — Teknik Kendaraan Ringan: Diagnostik otomotif, EFI, engine stand, tune-up.\n3. 💻 RPL — Rekayasa Perangkat Lunak: Web & mobile app, database, cloud, UI/UX, AI.\n4. ⚡ TITL — Teknik Instalasi Tenaga Listrik: Instalasi industri, panel, motor listrik, PLC.\n5. 🤖 TEI — Teknik Elektronika Industri: Otomasi industri, robotika, IoT, mikrokontroler.\nSeluruh jurusan memiliki Teaching Factory (TEFA) & sertifikasi LSP/BNSP!",
                'route' => 'ppdb',
                'label' => 'Eksplorasi 5 Jurusan Sekolah',
                'suggestions' => ['Fasilitas Lab & Bengkel', 'Cara Daftar PPDB Online', 'Prospek Kerja Lulusan'],
            ],
            [
                'intents' => ['biaya sekolah', 'biaya pendaftaran', 'uang gedung', 'spp bulanan', 'berapa biaya ppdb', 'apakah gratis', 'biaya masuk smk'],
                'keywords' => ['biaya', 'spp', 'uang gedung', 'biaya masuk', 'biaya daftar', 'gratis', 'pungutan'],
                'category' => 'PPDB',
                'answer' => "Informasi Biaya Pendidikan & PPDB:\n1. 🆓 Biaya Pendaftaran PPDB Online: GRATIS (tidak dipungut biaya apapun).\n2. 🆓 Uang Gedung / DSP: Sesuai regulasi pemerintah, tidak ada pungutan uang gedung liar.\n3. 👕 Biaya Seragam & Praktik: Rincian kebutuhan atribut seragam kejuruan dan perlengkapan K3 bengkel/lab diberikan secara transparan setelah calon siswa resmi diterima.\n4. 🎓 Beasiswa & Afirmasi: Tersedia beasiswa PIP, KIP, dan beasiswa prestasi industri.",
                'route' => 'ppdb',
                'label' => 'Rincian Biaya & Beasiswa',
                'suggestions' => ['Syarat Berkas PPDB', 'Jalur Masuk PPDB', 'Cara Daftar PPDB Online'],
            ],
            [
                'intents' => ['jadwal ppdb', 'kapan ppdb dibuka', 'gelombang ppdb', 'batas akhir ppdb', 'pengumuman ppdb', 'tanggal pendaftaran'],
                'keywords' => ['jadwal ppdb', 'kapan buka', 'gelombang', 'batas waktu', 'pengumuman ppdb', 'tanggal seleksi'],
                'category' => 'PPDB',
                'answer' => "Jadwal & Gelombang PPDB:\n• Gelombang 1 (Jalur Prestasi & Minat Bakat): Dibuka tanggal 1 Mei – 31 Mei.\n• Gelombang 2 (Jalur Reguler & Zonasi): Dibuka tanggal 1 Juni – 30 Juni.\n• Tes Minat Bakat & Wawancara: Diumumkan berkala melalui dashboard pendaftar.\n• Pengumuman Hasil Akhir & Daftar Ulang: Awal Juli.\nPastikan mendaftar lebih awal sebelum kuota tiap jurusan terpenuhi!",
                'route' => 'ppdb',
                'label' => 'Cek Jadwal PPDB',
                'suggestions' => ['Cara Daftar PPDB Online', 'Syarat Berkas PPDB', 'Kontak Panitia PPDB'],
            ],
            [
                'intents' => ['fasilitas sekolah', 'sarana prasarana', 'bengkel smk', 'lab komputer', 'asrama', 'sarana tefa'],
                'keywords' => ['fasilitas', 'sarana', 'lab komputer', 'bengkel', 'peralatan industri', 'gedung sekolah'],
                'category' => 'PPDB',
                'answer' => "Fasilitas & Sarana Unggulan Sekolah:\n• 🏭 Workshop Pemesinan CNC & Bubut Berstandar Industri Presisi (TPM).\n• 🚗 Bengkel Otomotif EFI dengan Diagnostic Scanner & Car Lift (TKR).\n• 💻 Lab Komputer RPL & Software Studio Berkecepatan Tinggi (RPL).\n• ⚡ Lab Instalasi Listrik Industri & Trainer PLC (TITL).\n• 🤖 Lab Elektronika, IoT & Platform Robotika Otomasi (TEI).\n• 🌐 Jaringan Internet Fiber Optik Terintegrasi di seluruh area kampus.",
                'route' => 'ppdb',
                'label' => 'Lihat Galeri Fasilitas',
                'suggestions' => ['Pilihan Jurusan & Keahlian', 'Cara Daftar PPDB Online', 'Prospek Kerja Lulusan'],
            ],
            [
                'intents' => ['prospek kerja lulusan', 'apakah lulus langsung kerja', 'kemana lulusan smk', 'peluang kerja rpl dkv'],
                'keywords' => ['prospek kerja', 'peluang kerja', 'langsung kerja', 'gaji lulusan', 'tersalurkan kerja'],
                'category' => 'PPDB',
                'answer' => "Prospek Karir & Keterserapan Lulusan:\n• 92%+ Lulusan langsung terserap bekerja di industri mitra DUDI atau berwirausaha mandiri (BMW: Bekerja, Melanjutkan, Wirausaha).\n• Setiap siswa dibekali Sertifikat Kompetensi BNSP/LSP yang diakui secara nasional & ASEAN.\n• Unit BKK sekolah aktif menyalurkan alumni ke 50+ perusahaan multinasional rekanan resmi.",
                'route' => 'bkk',
                'label' => 'Lihat Profil Kemitraan DUDI',
                'suggestions' => ['Mitra Industri BKK', 'Pilihan Jurusan & Keahlian', 'Cara Daftar PPDB Online'],
            ],
            [
                'intents' => ['kontak panitia ppdb', 'helpdesk ppdb', 'call center ppdb', 'tanya panitia', 'nomor wa ppdb'],
                'keywords' => ['kontak ppdb', 'panitia ppdb', 'helpdesk ppdb', 'wa panitia', 'call center ppdb'],
                'category' => 'PPDB',
                'answer' => "Helpdesk & Panitia PPDB Resmi:\n• WhatsApp Hotline: 0812-3456-7890 (Layanan Chat Cepat)\n• Telepon Sekolah: (021) 789-0123\n• Email Informasi: ppdb@sekolah.sch.id\n• Layanan Langsung: Ruang Panitia PPDB (Gedung A Lt. 1) setiap hari kerja pukul 08.00 - 15.00 WIB.",
                'route' => 'ppdb',
                'label' => 'Hubungi Panitia PPDB',
                'suggestions' => ['Cara Daftar PPDB Online', 'Syarat Berkas PPDB', 'Jadwal PPDB'],
            ],

            // ─── BANTUAN ADMIN & AKUN (MENGURANGI TIKET KE ADMIN) ───────────
            [
                'intents' => ['lupa password', 'reset password', 'lupa kata sandi', 'ganti password', 'tidak bisa login', 'akun terkunci', 'reset sandi', 'cara ganti password'],
                'keywords' => ['lupa password', 'reset password', 'lupa sandi', 'ganti sandi', 'tidak bisa login', 'akun terkunci', 'password salah', 'sandi salah'],
                'category' => 'ADMIN_FAQ',
                'answer' => "Panduan Reset Password Akun:\n1. Buka halaman Login di pojok kanan atas.\n2. Klik tautan \"Lupa Password?\".\n3. Masukkan NIS terdaftar (untuk siswa) atau Email resmi (untuk guru/staff).\n4. Sistem akan mengirimkan tautan pemulihan kata sandi.\n5. Jika NIS/Email tidak terdeteksi, hubungi Admin IT di ruang TU sekolah.",
                'route' => 'login',
                'label' => 'Buka Halaman Login',
                'suggestions' => ['Cara Login Akun Siswa', 'Kontak Admin Sekolah', 'Cara Edit Profil Siswa'],
            ],
            [
                'intents' => ['cara login', 'bagaimana masuk akun', 'cara masuk tefa hub', 'login siswa', 'masuk portal'],
                'keywords' => ['cara login', 'masuk akun', 'login akun', 'login portal', 'masuk siswa'],
                'category' => 'ADMIN_FAQ',
                'answer' => "Cara Login ke TEFA-Hub:\n1. Klik tombol \"Masuk\" pada pojok kanan atas.\n2. Masukkan NIS (Nomor Induk Siswa) Anda sebagai identitas.\n3. Masukkan password akun Anda.\n4. Klik \"Login\" untuk masuk ke dashboard siswa terpadu.",
                'route' => 'login',
                'label' => 'Halaman Login',
                'suggestions' => ['Lupa Password Akun', 'Cara Edit Profil Siswa', 'Panduan Menu Dashboard'],
            ],
            [
                'intents' => ['cara edit profil', 'ubah profil', 'ganti foto profil', 'update data diri', 'edit biodata', 'ubah nisn', 'update foto siswa'],
                'keywords' => ['edit profil', 'ubah profil', 'foto profil', 'ganti foto', 'update data', 'biodata siswa', 'ubah nisn'],
                'category' => 'ADMIN_FAQ',
                'answer' => "Cara Edit Profil & Biodata Siswa:\n1. Masuk ke Dashboard Siswa.\n2. Pada banner profil di bagian atas, klik tombol biru \"Edit Profil\".\n3. Di pop-up yang muncul, Anda dapat mengganti Foto Profil (JPG/PNG), memperbarui nama lengkap, NIS, NISN, tempat tanggal lahir, dan jenis kelamin.\n4. Klik \"Simpan & Sinkronkan\" untuk memperbarui data rapor & BKK secara otomatis.",
                'route' => 'dashboard',
                'label' => 'Buka Dashboard Profil',
                'suggestions' => ['Sinkronisasi Data Rapor', 'Cara Cek Nilai Siswa', 'Cek Status Keaktifan'],
            ],
            [
                'intents' => ['hubungi admin', 'kontak admin', 'telepon sekolah', 'bantuan admin', 'ruang tu', 'jam buka tu', 'wa admin', 'helpdesk'],
                'keywords' => ['hubungi admin', 'kontak admin', 'ruang tu', 'tata usaha', 'jam buka tu', 'helpdesk', 'nomor admin', 'wa admin'],
                'category' => 'ADMIN_FAQ',
                'answer' => "Layanan Bantuan & Tata Usaha Sekolah:\n• Lokasi: Ruang Tata Usaha (Gedung Utama Lt. 1)\n• Jam Operasional: Senin – Jumat, pukul 07.30 – 15.30 WIB\n• Layanan: Pengurusan akun terkunci, legalisir dokumen, surat keterangan siswa aktif, dan dispensasi magang.\n• Anda juga dapat memanfaatkan Tanya Tefa AI ini untuk menyelesaikan sebagian besar kebutuhan tanpa antre.",
                'route' => 'dashboard',
                'label' => 'Buka Dashboard',
                'suggestions' => ['Reset Password Akun', 'Surat Keterangan Magang', 'Nilai Rapor Belum Muncul'],
            ],
            [
                'intents' => ['surat keterangan siswa aktif', 'minta surat aktif', 'surat izin sekolah', 'surat dispensasi'],
                'keywords' => ['surat aktif', 'keterangan siswa aktif', 'surat dispensasi', 'surat izin'],
                'category' => 'ADMIN_FAQ',
                'answer' => "Pengurusan Surat Keterangan Siswa Aktif:\n1. Ajukan permohonan ke petugas Tata Usaha di Gedung Utama Lt. 1 atau kirim permohonan dengan mencantumkan NIS dan keperluan surat.\n2. Proses penerbitan surat berstempel resmi memakan waktu 1x24 jam kerja.\n3. Surat dapat diambil langsung atau diunduh versi PDF ber-barcode resmi jika layanan e-letter aktif.",
                'route' => 'dashboard',
                'label' => 'Info Layanan Tata Usaha',
                'suggestions' => ['Jam Buka TU', 'Kontak Admin Sekolah', 'Cara Edit Profil Siswa'],
            ],
            [
                'intents' => ['sinkronisasi data', 'data tidak sinkron', 'nisn tidak sesuai', 'profil belum update', 'sync bkk'],
                'keywords' => ['sinkronisasi', 'data tidak sinkron', 'sync bkk', 'nisn salah', 'rapor belum sinkron'],
                'category' => 'ADMIN_FAQ',
                'answer' => 'Sinkronisasi data siswa di TEFA-Hub berjalan otomatis secara terpadu. Saat Anda memperbarui biodata melalui pop-up Edit Profil, data akan langsung disinkronkan ke Portal Akademik, modul BLUD, dan sistem rekrutmen BKK Career Center.',
                'route' => 'dashboard',
                'label' => 'Periksa Data Profil',
                'suggestions' => ['Cara Edit Profil Siswa', 'Kesiapan Kerja BKK', 'Cek Nilai Rapor'],
            ],

            // ─── BLUD & TEACHING FACTORY ────────────────────────────────────
            [
                'intents' => ['cara publikasi produk', 'cara publish produk', 'cara mempublikasikan project', 'cara mempublikasikan proyek', 'publikasikan project', 'publikasikan proyek', 'publikasi project', 'publikasi proyek', 'upload produk blud', 'ajukan produk blud', 'tombol publikasi produk', 'unggah karya blud'],
                'keywords' => ['publikasi produk', 'publish produk', 'mempublikasikan', 'publikasikan project', 'publikasikan proyek', 'publikasi project', 'publikasi proyek', 'upload produk', 'ajukan produk', 'tambah karya blud', 'publikasi karya'],
                'category' => 'BLUD',
                'answer' => "Cara Publikasi Karya/Produk Siswa di BLUD:\n1. Buka halaman BLUD Teaching Factory.\n2. Klik tombol \"+ Publikasi Produk\" pada card header atas.\n3. Di pop-up yang muncul: unggah foto/video visual produk (maks. 15MB), isi Nama Produk, pilih Kategori Kejuruan, dan jelaskan Deskripsi spesifikasi produk.\n4. Klik tombol \"Ajukan Publikasi\" untuk mengirimkan karya ke tahap kurasi resmi sekolah.",
                'route' => 'blud',
                'label' => 'Buka Halaman BLUD',
                'suggestions' => ['Alur Kurasi Produk BLUD', 'Mekanisme Komisi Siswa', 'Katalog Produk BLUD'],
            ],
            [
                'intents' => ['alur kurasi produk', 'proses validasi blud', 'status verifikasi produk', 'siapa kurasi produk', 'kapan produk tayang'],
                'keywords' => ['kurasi produk', 'validasi blud', 'verifikasi produk', 'status produk', 'menunggu validasi', 'perlu revisi'],
                'category' => 'BLUD',
                'answer' => "Alur Validasi & Kurasi Produk BLUD:\n1. Produk diajukan siswa melalui pop-up publikasi.\n2. Status masuk ke 'Menunggu Validasi' (estimasi 1x24 jam oleh Guru Pembimbing / Kurator DUDI).\n3. Jika ada perbaikan, status menjadi 'Perlu Revisi' disertai catatan teknis.\n4. Setelah disetujui, status menjadi 'Tervalidasi & Tayang' dan otomatis masuk ke Katalog Publik BLUD.",
                'route' => 'blud',
                'label' => 'Cek Status Produk BLUD',
                'suggestions' => ['Cara Publikasi Produk', 'Mekanisme Komisi Siswa', 'Lihat Katalog Publik'],
            ],
            [
                'intents' => ['mekanisme komisi', 'cara hitung komisi', 'komisi siswa blud', 'kapan komisi cair', 'pembagian komisi', 'honor siswa blud', 'bagi hasil proyek'],
                'keywords' => ['komisi', 'honor', 'gaji siswa', 'insentif', 'bagi hasil', 'pembagian komisi', 'komisi cair'],
                'category' => 'BLUD',
                'answer' => "Mekanisme Komisi Siswa BLUD Teaching Factory:\n1. Setiap pesanan/proyek riil yang dikerjakan siswa memiliki alokasi bagi hasil jasa produksi.\n2. Besaran komisi dihitung dari kontribusi jam kerja, kompleksitas tugas (coding, desain, manufaktur, QC), dan peran tim.\n3. Transparansi saldo komisi tercatat langsung di sistem dan dicairkan berkala melalui rekening siswa atau kasir sekolah.",
                'route' => 'blud',
                'label' => 'Pelajari Modul BLUD',
                'suggestions' => ['Cara Ikut Proyek BLUD', 'Cara Publikasi Produk', 'Katalog Jasa BLUD'],
            ],
            [
                'intents' => ['apa itu blud', 'apa itu teaching factory', 'pengertian blud', 'maksud blud'],
                'keywords' => ['apa itu blud', 'pengertian blud', 'teaching factory', 'fungsi blud', 'tujuan blud'],
                'category' => 'BLUD',
                'answer' => 'BLUD Teaching Factory adalah unit usaha produksi resmi sekolah yang mengintegrasikan pembelajaran kejuruan dengan standar industri nyata. Siswa mengerjakan pesanan produk software, desain, manufaktur, dan servis riil sambil memperoleh sertifikasi kompetensi dan komisi kerja.',
                'route' => 'blud',
                'label' => 'Jelajahi BLUD',
                'suggestions' => ['Cara Pesan Produk BLUD', 'Publikasi Karya Siswa', 'Mekanisme Komisi'],
            ],
            [
                'intents' => ['cara pesan produk', 'cara order blud', 'cara beli produk', 'bagaimana memesan jasa', 'alur pemesanan blud'],
                'keywords' => ['cara pesan', 'cara order', 'cara beli', 'pesan jasa', 'order produk blud'],
                'category' => 'BLUD',
                'answer' => "Alur Pemesanan Produk/Jasa BLUD:\n1. Buka halaman BLUD dan pilih kategori produk atau jasa kejuruan.\n2. Klik produk yang diminati untuk melihat rincian spesifikasi & harga.\n3. Klik \"Lihat Selengkapnya\" / \"Pesan Sekarang\" dan lengkapi form kebutuhan.\n4. Koordinator Teaching Factory akan mengonfirmasi jadwal pengerjaan dan mengirimkan invoice resmi.",
                'route' => 'blud',
                'label' => 'Katalog Produk BLUD',
                'suggestions' => ['Siapa Boleh Pesan BLUD', 'Kategori Layanan BLUD', 'Cara Publikasi Produk'],
            ],
            [
                'intents' => ['siapa yang boleh pesan blud', 'siapa bisa order', 'pelanggan blud', 'bisa beli produk', 'siapa pelanggan'],
                'keywords' => ['siapa boleh pesan', 'pelanggan blud', 'siapa bisa order', 'masyarakat umum beli'],
                'category' => 'BLUD',
                'answer' => 'Layanan dan produk BLUD Teaching Factory terbuka untuk umum — mencakup masyarakat perorangan, instansi pemerintah, UMKM, hingga korporasi mitra industri yang membutuhkan jasa perangkat lunak, permesinan, multimedia, atau servis kejuruan.',
                'route' => 'blud',
                'label' => 'Buka Katalog BLUD',
                'suggestions' => ['Cara Pesan Produk BLUD', 'Mekanisme Komisi Siswa', 'Katalog Jasa BLUD'],
            ],

            // ─── BKK & KARIR ALUMNI ─────────────────────────────────────────
            [
                'intents' => ['apa itu bkk', 'pengertian bkk', 'bkk itu apa', 'fungsi bkk'],
                'keywords' => ['apa itu bkk', 'pengertian bkk', 'fungsi bkk', 'bursa kerja khusus'],
                'category' => 'BKK',
                'answer' => 'BKK (Bursa Kerja Khusus) adalah unit penempatan kerja resmi SMK yang menjembatani siswa tingkat akhir dan alumni dengan lowongan pekerjaan terverifikasi dari mitra DUDI (Dunia Usaha & Dunia Industri).',
                'route' => 'bkk',
                'label' => 'Buka BKK Career Center',
                'suggestions' => ['Cara Melamar Lowongan BKK', 'Rekomendasi Lowongan Sesuai Keahlian', 'Kesiapan Kerja BKK'],
            ],
            [
                'intents' => ['cara melamar kerja bkk', 'cara lamar lowongan', 'alur melamar kerja', 'cara daftar lowongan'],
                'keywords' => ['cara melamar', 'cara lamar', 'alur lamar kerja', 'daftar lowongan bkk'],
                'category' => 'BKK',
                'answer' => "Cara Melamar Lowongan di BKK:\n1. Buka menu BKK Career Center.\n2. Periksa section \"Rekomendasi Lowongan Sesuai Keahlian\" yang telah disesuaikan dengan nilai TEFA & portofolio Anda.\n3. Pilih posisi yang sesuai (misal: PT Denso, PT United Tractors, Studio Infinite).\n4. Klik tombol \"Lamar Sekarang\" pada card lowongan untuk mengirimkan berkas profil secara instan.",
                'route' => 'bkk',
                'label' => 'Lihat Lowongan BKK',
                'suggestions' => ['Tips Lolos Seleksi BKK', 'Format Portofolio Kejuruan', 'Kesiapan Kerja BKK'],
            ],
            [
                'intents' => ['kesiapan kerja bkk', 'match score bkk', 'evaluasi kesiapan kerja', 'nilai kesiapan kerja'],
                'keywords' => ['kesiapan kerja', 'match score', 'evaluasi standar industri', 'hard skill bkk', 'soft skill bkk'],
                'category' => 'BKK',
                'answer' => "Fitur Kesiapan Kerja BKK menghitung Match Score otomatis berdasarkan:\n• Hard Skills (Coding, Desain, Manufaktur)\n• Soft Skills & Kerja Tim\n• Disiplin & K3 Industri\nData ini divalidasi langsung oleh Guru Pembimbing & Mentor DUDI untuk memastikan Anda siap bersaing di dunia kerja.",
                'route' => 'bkk',
                'label' => 'Cek Kesiapan Kerja',
                'suggestions' => ['Cara Melamar Lowongan BKK', 'Tips Lolos Seleksi BKK', 'Portofolio Kejuruan'],
            ],
            [
                'intents' => ['cara daftar magang', 'alur pkl', 'cara pkl', 'bagaimana mengajukan magang', 'cara prakerin', 'surat pengantar magang'],
                'keywords' => ['daftar magang', 'alur pkl', 'prakerin', 'surat pengantar magang', 'surat pkl', 'tempat magang'],
                'category' => 'BKK',
                'answer' => "Alur Pengajuan Magang/PKL:\n1. Buka BKK Career Center > Program Magang.\n2. Pilih industri mitra yang membuka kuota PKL sesuai jurusan.\n3. Klik \"Ajukan Magang\" dengan melampirkan portofolio kejuruan.\n4. Setelah disetujui guru pembimbing, Surat Pengantar Resmi diterbitkan otomatis oleh sistem untuk diserahkan ke pihak perusahaan.",
                'route' => 'bkk',
                'label' => 'Program Magang & PKL',
                'suggestions' => ['Format Portofolio Kejuruan', 'Sertifikasi LSP-P1', 'Kesiapan Kerja BKK'],
            ],
            [
                'intents' => ['legalisir ijazah online', 'legalisir ijazah', 'legalisir transkrip', 'cara legalisir', 'syarat legalisir'],
                'keywords' => ['legalisir', 'legalisir ijazah', 'legalisir transkrip', 'stempel legalisir'],
                'category' => 'BKK',
                'answer' => "Layanan Legalisir Ijazah & Transkrip Nilai:\n1. Bawa dokumen asli Ijazah/Transkrip beserta fotokopi ke ruang Tata Usaha, atau ajukan permohonan legalisir cap basah.\n2. Estimasi proses legalisir: 1-2 hari kerja (Maksimal 10 lembar per pengajuan).\n3. Layanan tidak dipungut biaya retribusi.",
                'route' => 'dashboard',
                'label' => 'Info Layanan Tata Usaha',
                'suggestions' => ['Jam Operasional TU', 'Lamar Lowongan BKK', 'Kontak Admin Sekolah'],
            ],
            [
                'intents' => ['format portofolio', 'portofolio rpl', 'portofolio dkv', 'portofolio tkj', 'cara upload portofolio'],
                'keywords' => ['portofolio', 'portfolio', 'format portofolio', 'karya siswa', 'unggah portofolio'],
                'category' => 'BKK',
                'answer' => "Format Portofolio Kejuruan yang Efektif:\n• RPL: Repositori GitHub, tautan live demo aplikasi, screenshot fitur utama, dan tech stack yang dikuasai.\n• DKV: Showcase karya branding, desain UI/UX di Figma/Behance, dan motion video.\n• TKJ: Topologi jaringan, konfigurasi server/MikroTik, dan dokumentasi troubleshoot.\nUnggah portofolio melalui profil Anda untuk meningkatkan kecocokan lowongan BKK.",
                'route' => 'bkk',
                'label' => 'Kelola Portofolio',
                'suggestions' => ['Sertifikasi LSP-P1', 'Cara Melamar Lowongan BKK', 'Kesiapan Kerja BKK'],
            ],
            [
                'intents' => ['sertifikasi lsp', 'sertifikat bnsp', 'uji kompetensi', 'manfaat sertifikasi', 'ukom kejuruan'],
                'keywords' => ['sertifikasi', 'lsp', 'bnsp', 'uji kompetensi', 'ukom', 'sertifikat kompetensi'],
                'category' => 'BKK',
                'answer' => 'Sertifikasi LSP-P1 / BNSP adalah bukti kompetensi standar nasional yang diakui dunia industri. Sertifikat yang terverifikasi akan langsung tertera pada profil siswa TEFA-Hub dan memberi bobot prioritas tinggi saat melamar ke mitra BKK.',
                'route' => 'bkk',
                'label' => 'Info Sertifikasi Karir',
                'suggestions' => ['Tips Lolos Seleksi BKK', 'Rekomendasi Lowongan', 'Format Portofolio'],
            ],

            // ─── PORTAL AKADEMIK & SISWA ────────────────────────────────────
            [
                'intents' => ['cara cek nilai', 'lihat nilai rapor', 'cek rapor', 'transkrip nilai', 'nilai kejuruan'],
                'keywords' => ['cek nilai', 'lihat nilai', 'rapor', 'raport', 'transkrip', 'nilai semester'],
                'category' => 'AKADEMIK',
                'answer' => "Cara Memeriksa Nilai & Rapor:\n1. Masuk ke akun siswa > buka menu \"Akademik\".\n2. Anda dapat melihat ringkasan capaian kompetensi teori, nilai praktik Teaching Factory, dan rapor semester secara transparan.\n3. Nilai diperbarui langsung oleh guru pengampu mata pelajaran.",
                'route' => 'akademik',
                'label' => 'Buka Portal Akademik',
                'suggestions' => ['Nilai Belum Muncul', 'Cek Rekap Absensi', 'Lihat Jadwal Pelajaran'],
            ],
            [
                'intents' => ['nilai belum muncul', 'nilai kosong', 'kenapa nilai belum keluar', 'nilai belum diinput', 'komplain nilai'],
                'keywords' => ['nilai belum muncul', 'nilai kosong', 'belum keluar', 'belum diinput', 'komplain nilai'],
                'category' => 'AKADEMIK',
                'answer' => "Jika nilai mata pelajaran tertentu belum tampil di portal:\n1. Guru pengampu mata pelajaran kemungkinan masih dalam proses penginputan/penilaian akhir.\n2. Anda dapat mengonfirmasi status penilaian ke guru mata pelajaran atau wali kelas.\n3. Jika ada kendala teknis sistem, silakan konfirmasi ke Admin Kurikulum di ruang TU.",
                'route' => 'akademik',
                'label' => 'Portal Akademik',
                'suggestions' => ['Cek Rekap Absensi', 'Lihat Jadwal Pelajaran', 'Kontak Admin Sekolah'],
            ],
            [
                'intents' => ['cek absensi', 'rekap absen', 'lihat kehadiran', 'persentase hadir', 'jumlah alfa', 'izin sakit'],
                'keywords' => ['absen', 'absensi', 'kehadiran', 'persentase hadir', 'rekap absen', 'alfa', 'izin'],
                'category' => 'AKADEMIK',
                'answer' => "Rekapitulasi Kehadiran & Absensi:\n• Rekapitulasi absensi harian dan persentase kehadiran semester ditampilkan pada Portal Akademik.\n• Jika Anda tidak dapat hadir karena sakit atau ada tugas dinas/lomba TEFA, pastikan wali kelas telah memvalidasi surat izin agar tidak terhitung alfa.",
                'route' => 'akademik',
                'label' => 'Lihat Absensi',
                'suggestions' => ['Cara Cek Nilai Siswa', 'Lihat Jadwal Pelajaran', 'Edit Profil Siswa'],
            ],
            [
                'intents' => ['lihat jadwal', 'jadwal pelajaran', 'jadwal mapel', 'jadwal praktik', 'jadwal lab', 'jadwal hari ini'],
                'keywords' => ['jadwal', 'pelajaran', 'mapel', 'jadwal praktik', 'jadwal bengkel', 'jam pelajaran'],
                'category' => 'AKADEMIK',
                'answer' => "Jadwal Pelajaran & Praktik Lab:\nJadwal teori dan jadwal praktik Teaching Factory disusun per rombel kelas. Anda dapat mengakses kalender jadwal harian lengkap dengan nama guru pengampu dan ruangan lab/bengkel di Portal Akademik.",
                'route' => 'akademik',
                'label' => 'Cek Jadwal Pelajaran',
                'suggestions' => ['Cek Rekap Absensi', 'Cek Nilai Rapor', 'Buka Dashboard'],
            ],

            // ─── TENTANG TEFA-HUB & NAVIGASI UMUM ───────────────────────────
            [
                'intents' => ['apa itu tefa hub', 'tentang tefa hub', 'fitur tefa hub', 'panduan website', 'menu tefa hub'],
                'keywords' => ['apa itu tefa', 'tentang tefa hub', 'fitur platform', 'panduan sistem', 'menu sistem'],
                'category' => 'NAVIGASI',
                'answer' => "TEFA-Hub adalah ekosistem digital terpadu pendidikan vokasi SMK yang mengintegrasikan 4 pilar utama:\n1. 🏭 BLUD Teaching Factory: Unit produksi & karya inovasi siswa berstandar industri.\n2. 💼 BKK Career Center: Rekomendasi lowongan kerja, magang/PKL, dan kesiapan karir.\n3. 🎓 Portal Akademik: Nilai rapor, rekap kehadiran, dan jadwal pembelajaran.\n4. 🚀 PPDB Online: Penerimaan peserta didik baru terintegrasi.",
                'route' => 'dashboard',
                'label' => 'Jelajahi Dashboard',
                'suggestions' => ['Publikasi Produk BLUD', 'Lowongan Kerja BKK', 'Portal Akademik', 'Info PPDB Online'],
            ],
        ];
    }

    /**
     * Return smart greeting and quick role & needs analysis categories.
     */
    public function greet(): JsonResponse
    {
        $userName = auth()->check() ? auth()->user()->name : 'Bapak/Ibu & Sahabat Siswa';

        return response()->json([
            'answer' => "Halo, {$userName}! 👋 Saya **Tanya Tefa AI Navigator**.\n\nSaya hadir untuk memandu Anda berdasarkan peran dan kebutuhan Anda hari ini. Silakan pilih peran/kategori Anda untuk panduan langsung tanpa antre bertanya ke admin sekolah:",
            'roles' => [
                [
                    'icon' => '🏢',
                    'role_key' => 'mitra_industri',
                    'title' => 'Mitra Industri / Perusahaan',
                    'desc' => 'Kerjasama Teaching Factory (TEFA), PKL & rekrutmen alumni',
                    'prompt' => 'Saya Mitra Industri / Perusahaan',
                    'badge' => 'Mitra Industri',
                    'color' => '#0284C7',
                ],
                [
                    'icon' => '👨‍👩‍👧',
                    'role_key' => 'ortu_ppdb',
                    'title' => 'Orang Tua & Calon Siswa',
                    'desc' => 'Info PPDB Online, syarat berkas, pilihan jurusan & biaya',
                    'prompt' => 'Saya Orang Tua / Calon Siswa (Info PPDB)',
                    'badge' => 'PPDB Online',
                    'color' => '#E07B00',
                ],
                [
                    'icon' => '👨‍🏫',
                    'role_key' => 'guru_pembimbing',
                    'title' => 'Guru Pembimbing & Pendidik',
                    'desc' => 'Monitoring siswa PKL, kurasi karya BLUD & input nilai rapor',
                    'prompt' => 'Saya Guru Pembimbing / Pendidik',
                    'badge' => 'Guru Pembimbing',
                    'color' => '#8B5CF6',
                ],
                [
                    'icon' => '🎓',
                    'role_key' => 'siswa_aktif',
                    'title' => 'Siswa Aktif & Alumni',
                    'desc' => 'Magang/PKL, publikasi karya BLUD, bursa kerja & rapor',
                    'prompt' => 'Saya Siswa Aktif SMK',
                    'badge' => 'Siswa & Alumni',
                    'color' => '#004AC6',
                ],
                [
                    'icon' => '🏛️',
                    'role_key' => 'admin_tu',
                    'title' => 'Admin & Tata Usaha (TU)',
                    'desc' => 'Layanan surat menyurat, reset akun mandiri & jam operasional',
                    'prompt' => 'Saya Admin / Pengelola Sistem',
                    'badge' => 'Admin & TU',
                    'color' => '#16A34A',
                ],
            ],
            'needs_categories' => [
                [
                    'icon' => '📝',
                    'title' => 'PPDB & Calon Siswa',
                    'desc' => 'Pendaftaran online, syarat dokumen & info jurusan',
                    'prompt' => 'Cara Daftar PPDB Online',
                ],
                [
                    'icon' => '🏭',
                    'title' => 'Unit Produksi BLUD',
                    'desc' => 'Publikasi karya, katalog produk, kurasi & komisi',
                    'prompt' => 'Cara Publikasi Produk BLUD',
                ],
                [
                    'icon' => '💼',
                    'title' => 'BKK & Karir Alumni',
                    'desc' => 'Lamar lowongan kerja DUDI, magang PKL & portofolio',
                    'prompt' => 'Cara Melamar Lowongan BKK',
                ],
                [
                    'icon' => '🎓',
                    'title' => 'Portal Akademik',
                    'desc' => 'Cek nilai rapor, jadwal pelajaran & rekap absensi',
                    'prompt' => 'Cara Cek Nilai Rapor',
                ],
                [
                    'icon' => '🛠️',
                    'title' => 'Bantuan Admin & Akun',
                    'desc' => 'Reset password, edit profil siswa & kontak TU',
                    'prompt' => 'Cara Reset Password Akun',
                ],
            ],
            'suggestions' => [
                'Saya Orang Tua / Calon Siswa (Info PPDB)',
                'Cara Daftar PPDB Online',
                'Syarat Berkas PPDB',
                'Pilihan Jurusan & Keahlian',
                'Cara Publikasi Produk BLUD',
                'Cara Melamar Lowongan BKK',
                'Cara Reset Password Akun',
            ],
        ]);
    }

    /**
     * Handle an incoming chat message with smart intent matching and offline resiliency.
     *
     * Priority order:
     * 1. Gemini API — for any open-ended / conversational / question messages.
     * 2. KB intent matching — only for exact short-form navigation commands.
     * 3. Smart fallback — when API is unavailable.
     */
    public function chat(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'message' => ['required', 'string', 'max:500'],
            'history' => ['nullable', 'array', 'max:10'],
            'history.*.role' => ['required_with:history', 'string', 'in:user,model'],
            'history.*.text' => ['required_with:history', 'string', 'max:1000'],
        ])->validate();

        $userMessage = trim((string) $request->input('message'));
        $history = is_array($request->input('history', [])) ? $request->input('history', []) : [];

        // 1. KB matching for major recommendations (interest quiz)
        $majorRecommendation = $this->findMajorRecommendation($userMessage);
        if ($majorRecommendation !== null) {
            return response()->json($majorRecommendation);
        }

        // 2. KB matching for specific actionable school navigation queries
        $local = $this->matchIntent($userMessage);
        if ($local !== null) {
            return response()->json([
                'answer' => $local['answer'],
                'route' => $local['route'] ? $this->resolveRoute($local['route']) : null,
                'label' => $local['label'],
                'category' => $local['category'] ?? 'GENERAL',
                'suggestions' => $local['suggestions'] ?? ['Bantuan Admin Sekolah', 'Jelajahi Fitur Lain'],
                'source' => 'kb',
            ]);
        }

        // 3. Pure AI response from API key: handles all general questions, conversational queries, etc.
        try {
            $geminiAnswer = $this->askGemini($userMessage, $history);
            if ($geminiAnswer !== null && trim($geminiAnswer) !== '') {
                $category = $this->detectCategory($userMessage);
                $routeKey = $this->detectRelevantRouteKey($userMessage);

                return response()->json([
                    'answer' => $geminiAnswer,
                    'route' => $routeKey ? $this->resolveRoute($routeKey) : null,
                    'label' => $this->detectRelevantLabel($userMessage),
                    'category' => $category,
                    'suggestions' => $this->generateSuggestionsForCategory($category),
                    'source' => 'gemini',
                ]);
            }
        } catch (\Throwable $e) {
            Log::info('Gemini API call exception: '.$e->getMessage());
        }

        // 4. Fallback when AI API is unavailable
        return response()->json($this->generateSmartFallback($userMessage));
    }

    /**
     * Determine whether a user message is open-ended / conversational.
     * These must always go to Gemini first instead of the static KB.
     */
    private function isOpenEndedQuestion(string $message): bool
    {
        $lower = mb_strtolower(trim($message));

        // If it's very short (≤ 4 words) and matches an exact KB greeting/command, use KB.
        $wordCount = str_word_count($lower);
        if ($wordCount <= 3) {
            return false;
        }

        // Sentences over 6 words are almost always conversational.
        if ($wordCount >= 6) {
            return true;
        }

        // Contains Indonesian question/conversation markers.
        $questionMarkers = [
            'apa', 'bagaimana', 'berapa', 'kapan', 'dimana', 'siapa', 'kenapa', 'mengapa',
            'apakah', 'boleh', 'bisa', 'gimana', 'tolong', 'jelaskan', 'ceritakan',
            'bantu', 'tanya', 'minta', 'ingin tahu', 'mau tanya', 'mohon',
        ];

        foreach ($questionMarkers as $marker) {
            if (str_contains($lower, $marker)) {
                return true;
            }
        }

        // Contains a question mark.
        if (str_contains($message, '?')) {
            return true;
        }

        return false;
    }

    /**
     * Match user query against intent-based knowledge base.
     *
     * @return array{answer: string, route: string|null, label: string|null, category?: string, suggestions?: string[]}|null
     */
    /**
     * Match user query against intent-based knowledge base.
     *
     * STRICT matching only — only exact or very close matches trigger KB responses.
     * Open-ended / conversational messages are handled by Gemini before this runs.
     */
    private function matchIntent(string $message): ?array
    {
        $lower = mb_strtolower(trim($message));
        $wordCount = str_word_count($lower);

        // Refuse to match if message is excessively long.
        if ($wordCount > 30) {
            return null;
        }

        // Comparison or multi-major queries should go to AI provider instead of single KB intent
        $majors = ['rpl', 'tei', 'titl', 'tkr', 'tpm'];
        $matchedMajorCount = 0;
        foreach ($majors as $m) {
            if ($this->containsPhrase($lower, $m)) {
                $matchedMajorCount++;
            }
        }
        if ($matchedMajorCount > 1 || str_contains($lower, 'perbedaan') || str_contains($lower, 'beda') || str_contains($lower, 'banding')) {
            return null;
        }

        $bestIntent = null;
        $bestIntentScore = 0;

        foreach ($this->intents as $entry) {
            foreach ($entry['intents'] as $intent) {
                $intentChars = mb_strlen(str_replace(' ', '', $intent));

                // Require the intent phrase to be at least 4 chars to avoid false positives.
                if ($intentChars < 4) {
                    continue;
                }

                if ($this->containsPhrase($lower, $intent)) {
                    $score = mb_strlen($intent) * 5;
                    if ($score > $bestIntentScore) {
                        $bestIntentScore = $score;
                        $bestIntent = $entry;
                    }
                }
            }
        }

        if ($bestIntent !== null) {
            return $bestIntent;
        }

        // Keyword pass — only match long multi-word phrases (≥ 10 chars) to prevent over-matching.
        $bestKeywordIntent = null;
        $bestKeywordScore = 0;

        foreach ($this->intents as $entry) {
            foreach ($entry['keywords'] as $keyword) {
                $keywordChars = mb_strlen(str_replace(' ', '', $keyword));
                if ($keywordChars >= 10 && $this->containsPhrase($lower, $keyword) && $keywordChars > $bestKeywordScore) {
                    $bestKeywordScore = $keywordChars;
                    $bestKeywordIntent = $entry;
                }
            }
        }

        return $bestKeywordIntent;
    }

    /**
     * Return a direct, explainable recommendation for common prospective-student interests.
     *
     * @return array{answer: string, route: string, label: string, category: string, suggestions: string[], source: string}|null
     */
    private function findMajorRecommendation(string $message): ?array
    {
        $lower = mb_strtolower($message);
        $isInterestQuestion = $this->containsAnyPhrase($lower, ['cocok', 'minat', 'suka', 'ingin masuk', 'jurusan apa']);

        if (! $isInterestQuestion) {
            return null;
        }

        $majors = [
            'RPL' => [
                'keywords' => ['rpl', 'coding', 'programming', 'aplikasi', 'website', 'web', 'software', 'game', 'database'],
                'focus' => 'membuat aplikasi, mengolah logika, dan membangun solusi digital',
                'alternative' => 'TEI bila kamu lebih tertarik pada perangkat fisik, sensor, dan robotika.',
            ],
            'TEI' => [
                'keywords' => ['tei', 'robot', 'robotika', 'iot', 'sensor', 'mikrokontroler', 'arduino', 'elektronika'],
                'focus' => 'robotika, IoT, sensor, dan perangkat otomatis',
                'alternative' => 'RPL bila kamu lebih ingin fokus membuat aplikasi atau perangkat lunak.',
            ],
            'TITL' => [
                'keywords' => ['titl', 'listrik', 'panel', 'plc', 'energi', 'instalasi', 'solar'],
                'focus' => 'instalasi listrik, panel kontrol, PLC, dan energi',
                'alternative' => 'TEI bila kamu lebih suka elektronika kecil dan robotika.',
            ],
            'TKR' => [
                'keywords' => ['tkr', 'otomotif', 'mobil', 'kendaraan', 'servis', 'injeksi'],
                'focus' => 'diagnostik kendaraan, perawatan mesin, dan teknologi otomotif',
                'alternative' => 'TPM bila kamu lebih suka membuat komponen presisi di mesin manufaktur.',
            ],
            'TPM' => [
                'keywords' => ['tpm', 'cnc', 'bubut', 'frais', 'manufaktur', 'cad', 'cam', 'pemesinan'],
                'focus' => 'manufaktur, CAD/CAM, CNC, dan pembuatan komponen presisi',
                'alternative' => 'TKR bila kamu lebih tertarik merawat dan mendiagnosis kendaraan.',
            ],
        ];

        $scores = [];
        foreach ($majors as $code => $major) {
            $scores[$code] = 0;
            foreach ($major['keywords'] as $keyword) {
                if ($this->containsPhrase($lower, $keyword)) {
                    $scores[$code]++;
                }
            }
        }

        arsort($scores);
        $recommendedCode = array_key_first($scores);
        $score = $recommendedCode ? $scores[$recommendedCode] : 0;
        $matchedMajors = array_filter($scores, fn (int $majorScore): bool => $majorScore > 0);

        if ($recommendedCode === null || $score === 0 || count($matchedMajors) > 1) {
            return null;
        }

        $major = $majors[$recommendedCode];

        return [
            'answer' => "Untuk minatmu pada {$major['focus']}, jurusan **{$recommendedCode}** paling relevan. {$major['alternative']} Gunakan fitur AI Temukan Jurusanmu untuk melihat kecocokan yang lebih personal.",
            'route' => '/ppdb/kuis',
            'label' => 'Coba AI Temukan Jurusanmu',
            'category' => 'PPDB',
            'suggestions' => ['Prospek karier '.$recommendedCode, 'Mata pelajaran '.$recommendedCode, 'Cara daftar PPDB'],
            'source' => 'advisor',
        ];
    }

    private function containsAnyPhrase(string $message, array $phrases): bool
    {
        foreach ($phrases as $phrase) {
            if ($this->containsPhrase($message, $phrase)) {
                return true;
            }
        }

        return false;
    }

    private function containsPhrase(string $message, string $phrase): bool
    {
        return preg_match('/(?<![\\p{L}\\p{N}])'.preg_quote($phrase, '/').'(?![\\p{L}\\p{N}])/iu', $message) === 1;
    }

    /**
     * Call Gemini API with conversation history and contextual system prompt.
     *
     * @param  array<int, array{role: string, text: string}>  $history
     */
    private function askGemini(string $userMessage, array $history = []): ?string
    {
        $apiKey = config('services.ai_navigator.key');
        $baseUrl = rtrim((string) config('services.ai_navigator.url'), '/');

        if (empty($apiKey)) {
            return null;
        }

        $model = trim((string) config('services.ai_navigator.model'));
        $fallbackModel = trim((string) config('services.ai_navigator.fallback_model'));

        if ($model === '') {
            $model = 'gemini-3.1-flash-lite';
        }

        $models = array_values(array_unique(array_filter([$model, $fallbackModel])));

        $systemInstruction = [
            'role' => 'user',
            'parts' => [[
                'text' => 'Kamu adalah Tanya Tefa AI, asisten virtual pintar, ramah, dan solutif resmi dari TEFA-Hub SMK Antartika 1 Sidoarjo. '
                    .'Jawab semua pertanyaan umum maupun pertanyaan seputar sekolah secara murni, akurat, informatif, dan TEPAT SESUAI DENGAN APA YANG DITANYAKAN oleh pengguna. '
                    .'Konteks SMK Antartika 1 Sidoarjo: '
                    .'1. Profil Sekolah: SMK rujukan vokasi terakreditasi A berstatus SMK Pusat Keunggulan (SMK-PK) dan Badan Layanan Umum Daerah (BLUD). '
                    .'2. 5 Konsentrasi Keahlian Unggulan: '
                    .'   - TPM (Teknik Pemesinan): manufaktur mesin bubut/frais konvensional, pemrograman CNC, CAD/CAM, fabrikasi presisi industri. '
                    .'   - TKR (Teknik Kendaraan Ringan): otomotif mobil, tune-up injeksi EFI, sistem rem/suspensi, diagnostik digital engine scanner. '
                    .'   - RPL (Rekayasa Perangkat Lunak): pemrograman web modern (HTML, CSS, JS, PHP, Laravel), mobile apps, database SQL, UI/UX design. '
                    .'   - TITL (Teknik Instalasi Tenaga Listrik): instalasi kelistrikan gedung/pabrik, perakitan panel distribusi, PLC, otomasi tenaga, energi terbarukan solar cell. '
                    .'   - TEI (Teknik Elektronika Industri): mikrokontroler (Arduino, ESP32), sensor & IoT industri, robotika cerdas, kontrol sistem otomasi industri. '
                    .'3. Fitur Utama TEFA-Hub: '
                    .'   - PPDB Online: pendaftaran calon siswa baru, pengisian formulir, unggah berkas (KK, Akta, NISN, SKL/Rapor SMP), info jalur beasiswa dan seleksi. '
                    .'   - Unit Produksi BLUD: etalase Teaching Factory karya siswa dan jasa industri dengan pembagian komisi bagi siswa. '
                    .'   - BKK (Bursa Kerja Khusus) & PKL: lowongan kerja resmi dari industri mitra (DUDI), evaluasi kesiapan kerja, dan penempatan magang/PKL. '
                    .'   - Portal Akademik: rekap nilai rapor vokasi terpadu, absensi kehadiran siswa, dan jadwal belajar. '
                    .'ATURAN DAN GAYA MENJAWAB: '
                    .'- SESUAI PERTANYAAN: Selalu jawab langsung apa yang ditanyakan user. Jika bertanya tentang materi/jurusan/pendaftaran/coding/apapun, berikan jawaban spesifik topik tersebut. '
                    .'- BAHASA: Gunakan bahasa Indonesia yang ramah, sopan, komunikatif, dan alami (tidak kaku seperti robot). '
                    .'- FORMAT: Gunakan formatting markdown (bold, bullet/numbered list) agar jawaban mudah dibaca dan menarik. '
                    .'- REALISTIS: Jangan mengarang nomor telepon pribadi atau tanggal yang tidak pasti; sarankan ke Tata Usaha atau nomor layanan resmi sekolah jika butuh bantuan berkas fisik.',
            ]],
        ];

        // Build conversation history for multi-turn context
        $contents = [$systemInstruction];

        $contents[] = [
            'role' => 'model',
            'parts' => [['text' => 'Halo! Saya Tanya Tefa AI, siap membantu Anda seputar SMK Antartika 1 Sidoarjo dan sistem TEFA-Hub. Ada yang ingin Anda tanyakan?']],
        ];

        // Append previous conversation turns (max 6 turns = 3 exchanges)
        $recentHistory = array_slice($history, -6);
        foreach ($recentHistory as $turn) {
            $contents[] = [
                'role' => $turn['role'] === 'model' ? 'model' : 'user',
                'parts' => [['text' => (string) ($turn['text'] ?? '')]],
            ];
        }

        // Add the current user message
        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $userMessage]],
        ];

        $payload = [
            'contents' => $contents,
            'generationConfig' => [
                'maxOutputTokens' => (int) config('services.ai_navigator.max_output_tokens', 800),
                'temperature' => 0.7,
                'topP' => 0.9,
            ],
        ];

        foreach ($models as $currentModel) {
            try {
                $url = "{$baseUrl}/{$currentModel}:generateContent";
                $response = Http::connectTimeout((int) config('services.ai_navigator.connect_timeout', 4))
                    ->timeout((int) config('services.ai_navigator.timeout', 12))
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'X-goog-api-key' => $apiKey,
                    ])
                    ->post($url, $payload);

                if ($response->successful()) {
                    $data = $response->json();
                    $parts = $data['candidates'][0]['content']['parts'] ?? [];

                    foreach ($parts as $part) {
                        if (! empty($part['text'])) {
                            return trim($part['text']);
                        }
                    }
                } else {
                    Log::warning("Gemini model {$currentModel} returned HTTP {$response->status()}");
                }
            } catch (\Throwable $e) {
                Log::warning("Gemini model {$currentModel} exception: ".$e->getMessage());
            }
        }

        return null;
    }

    /**
     * Detect category based on query keywords.
     */
    private function detectCategory(string $message): string
    {
        $lower = mb_strtolower($message);

        if (str_contains($lower, 'ppdb') || str_contains($lower, 'calon') || str_contains($lower, 'orang tua') || str_contains($lower, 'ortu') || str_contains($lower, 'wali') || str_contains($lower, 'biaya') || str_contains($lower, 'jurusan') || str_contains($lower, 'daftar') || str_contains($lower, 'mendaftar') || str_contains($lower, 'pendaftaran')) {
            return 'PPDB';
        }
        if (str_contains($lower, 'blud') || str_contains($lower, 'produk') || str_contains($lower, 'komisi') || str_contains($lower, 'kurasi')) {
            return 'BLUD';
        }
        if (str_contains($lower, 'bkk') || str_contains($lower, 'lowongan') || str_contains($lower, 'magang') || str_contains($lower, 'pkl') || str_contains($lower, 'portofolio') || str_contains($lower, 'alumni')) {
            return 'BKK';
        }
        if (str_contains($lower, 'industri') || str_contains($lower, 'perusahaan') || str_contains($lower, 'dudi') || str_contains($lower, 'mou') || str_contains($lower, 'kerjasama')) {
            return 'INDUSTRI';
        }
        if (str_contains($lower, 'nilai') || str_contains($lower, 'rapor') || str_contains($lower, 'absen') || str_contains($lower, 'jadwal') || str_contains($lower, 'akademik')) {
            return 'AKADEMIK';
        }
        if (str_contains($lower, 'password') || str_contains($lower, 'login') || str_contains($lower, 'profil') || str_contains($lower, 'admin') || str_contains($lower, 'tu') || str_contains($lower, 'surat')) {
            return 'ADMIN_FAQ';
        }

        return 'GENERAL';
    }

    /**
     * Generate smart fallback when query is not strictly in KB and API is down.
     *
     * @return array{answer: string, route: string|null, label: string|null, category: string, suggestions: string[], source: string}
     */
    private function generateSmartFallback(string $message): array
    {
        $category = $this->detectCategory($message);
        $routeKey = $this->detectRelevantRouteKey($message);

        $answers = [
            'PPDB' => 'Terkait **PPDB & Informasi Sekolah**, Bapak/Ibu dan calon siswa dapat memeriksa alur pendaftaran daring, kelengkapan berkas dokumen, pilihan 5 konsentrasi keahlian unggulan, serta rincian bebas biaya melalui portal PPDB resmi.',
            'BLUD' => 'Terkait **Unit Produksi BLUD**, Anda dapat mengelola publikasi produk inovasi, memantau status validasi kurasi resmi, dan melihat transparansi komisi bagi hasil proyek melalui halaman BLUD.',
            'BKK' => 'Terkait **BKK & Karir**, sistem TEFA-Hub menyediakan rekomendasi lowongan kerja DUDI sesuai nilai kompetensi, program magang/PKL, dan portofolio kejuruan.',
            'INDUSTRI' => 'Terkait **Kemitraan Industri (DUDI)**, TEFA-Hub memfasilitasi kerjasama Teaching Factory, rekrutmen alumni terampil bersertifikat BNSP, dan order produk/jasa kejuruan.',
            'AKADEMIK' => 'Terkait **Portal Akademik**, Anda dapat mengakses rekapitulasi nilai rapor, absensi kehadiran, dan jadwal pembelajaran secara langsung.',
            'ADMIN_FAQ' => 'Terkait **Bantuan Akun & Administrasi**, Anda dapat mengatur reset password, memperbarui profil biodata, atau berkonsultasi ke ruang Tata Usaha pada jam operasional sekolah.',
            'GENERAL' => "Halo! Saya Tanya Tefa AI, asisten TEFA-Hub SMK Antartika 1 Sidoarjo.\n\nSaya siap membantu Anda dengan informasi seputar:\n- 📝 PPDB - Pendaftaran & alur masuk sekolah\n- 🎯 Jurusan - TPM, TKR, RPL, TITL, TEI\n- 💼 Karir & BKK - Lowongan dan magang\n- 🏭 BLUD - Unit produksi siswa\n- 🎓 Akademik - Nilai dan absensi\n\nSilakan tanyakan apa yang ingin Anda ketahui!",
        ];

        return [
            'answer' => $answers[$category] ?? $answers['GENERAL'],
            'route' => $routeKey ? $this->resolveRoute($routeKey) : null,
            'label' => $this->detectRelevantLabel($message),
            'category' => $category,
            'suggestions' => $this->generateSuggestionsForCategory($category),
            'source' => 'unavailable',
        ];
    }

    private function generateSuggestionsForCategory(string $category): array
    {
        return match ($category) {
            'PPDB' => ['Cara Daftar PPDB Online', 'Syarat Berkas PPDB', 'Pilihan Jurusan & Keahlian', 'Biaya Sekolah & SPP'],
            'BLUD' => ['Cara Publikasi Produk BLUD', 'Alur Kurasi Produk BLUD', 'Mekanisme Komisi Siswa'],
            'BKK' => ['Cara Melamar Lowongan BKK', 'Kesiapan Kerja BKK', 'Alur Pendaftaran Magang/PKL'],
            'INDUSTRI' => ['Kerjasama Teaching Factory', 'Rekrutmen Tenaga Kerja BKK', 'Cara Pemesanan Produk BLUD'],
            'AKADEMIK' => ['Cara Cek Nilai Rapor', 'Rekap Absensi Kehadiran', 'Lihat Jadwal Pelajaran'],
            'ADMIN_FAQ' => ['Cara Reset Password', 'Cara Edit Profil Siswa', 'Kontak Admin Sekolah'],
            default => ['Saya Orang Tua (Info PPDB)', 'Publikasi Produk BLUD', 'Lowongan Kerja BKK', 'Portal Akademik'],
        };
    }

    private function detectRelevantRouteKey(string $message): ?string
    {
        $lower = mb_strtolower($message);

        if (str_contains($lower, 'ppdb') || str_contains($lower, 'calon') || str_contains($lower, 'orang tua') || str_contains($lower, 'ortu') || str_contains($lower, 'biaya') || str_contains($lower, 'daftar siswa baru')) {
            return 'ppdb';
        }
        if (str_contains($lower, 'blud') || str_contains($lower, 'produk') || str_contains($lower, 'komisi') || str_contains($lower, 'kurasi')) {
            return 'blud';
        }
        if (str_contains($lower, 'bkk') || str_contains($lower, 'kerja') || str_contains($lower, 'lowongan') || str_contains($lower, 'magang') || str_contains($lower, 'pkl') || str_contains($lower, 'portofolio') || str_contains($lower, 'alumni')) {
            return 'bkk';
        }
        if (str_contains($lower, 'nilai') || str_contains($lower, 'rapor') || str_contains($lower, 'absen') || str_contains($lower, 'jadwal') || str_contains($lower, 'akademik')) {
            return 'akademik';
        }
        if (str_contains($lower, 'login') || str_contains($lower, 'password') || str_contains($lower, 'sandi')) {
            return 'login';
        }
        if (str_contains($lower, 'profil') || str_contains($lower, 'biodata')) {
            return 'profile';
        }

        return null;
    }

    private function detectRelevantLabel(string $message): string
    {
        $lower = mb_strtolower($message);

        if (str_contains($lower, 'ppdb') || str_contains($lower, 'calon') || str_contains($lower, 'orang tua') || str_contains($lower, 'ortu') || str_contains($lower, 'biaya') || str_contains($lower, 'daftar siswa baru')) {
            return 'Buka Informasi PPDB Online';
        }
        if (str_contains($lower, 'blud') || str_contains($lower, 'produk') || str_contains($lower, 'komisi') || str_contains($lower, 'kurasi')) {
            return 'Buka Halaman BLUD';
        }
        if (str_contains($lower, 'bkk') || str_contains($lower, 'kerja') || str_contains($lower, 'lowongan') || str_contains($lower, 'magang') || str_contains($lower, 'pkl')) {
            return 'Buka Bursa Kerja BKK';
        }
        if (str_contains($lower, 'nilai') || str_contains($lower, 'rapor') || str_contains($lower, 'absen') || str_contains($lower, 'jadwal') || str_contains($lower, 'akademik')) {
            return 'Buka Portal Akademik';
        }
        if (str_contains($lower, 'login') || str_contains($lower, 'password') || str_contains($lower, 'sandi')) {
            return 'Buka Halaman Login';
        }

        return 'Buka Dashboard Siswa';
    }
}
