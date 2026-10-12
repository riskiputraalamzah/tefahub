<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <title>Dashboard Siswa — TEFA-Hub</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Siswa Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/siswa.dashboard.css') }}?v={{ config('app.asset_version', '1.0') }}">
</head>
<body>

    <div class="app-layout">
        
        <!-- ═══════════════════════════════════════════
             SIDEBAR NAVIGASI SISWA
             ═══════════════════════════════════════════ -->
        <x-sidebar-siswa :active="$activeMenu ?? 'dashboard'" :user="$user ?? []" />

        <!-- ═══════════════════════════════════════════
             MAIN CONTENT AREA
             ═══════════════════════════════════════════ -->
        <main class="main-content">
            
            <!-- ═══════════════════════════════════════════
                 HEADER UTAMA ROLE SISWA (FULL TOP NO GAP)
                 ═══════════════════════════════════════════ -->
            <x-header-siswa :user="$user ?? []" />

            <!-- Page Body Area -->
            <div class="content-body">
                
                <!-- ═══════════════════════════════════════════
                     HERO PROFILE BANNER SISWA (928x256)
                     ═══════════════════════════════════════════ -->
                <x-profile-banner-siswa :user="$user ?? []" />

                <!-- ═══════════════════════════════════════════
                     DOUBLE CHARTS GRID SISWA (2x 452x297)
                     ═══════════════════════════════════════════ -->
                <x-dashboard-charts-siswa />

                <!-- ═══════════════════════════════════════════
                     JADWAL PELAJARAN & PRAKTIK KEJURUAN
                     ═══════════════════════════════════════════ -->
                <x-jadwal-pelajaran-siswa />

                <!-- ═══════════════════════════════════════════
                     RIWAYAT & LOG AKTIVITAS OTOMATIS (928x254)
                     ═══════════════════════════════════════════ -->
                <x-riwayat-aktivitas-siswa />

            </div>

        </main>

        <!-- Sidebar Overlay Backdrop for Responsive Mobile/Tablet -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    </div>
</body>
</html>
