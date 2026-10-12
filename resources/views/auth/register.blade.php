<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <title>Daftar Akun — TEFA-Hub Ekosistem Vokasi</title>
    <meta name="description" content="Buat akun baru siswa TEFA-Hub dan mulai perjalanan vokasi digital Anda.">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Reuse Login CSS (same design language) -->
    <link rel="stylesheet" href="{{ asset('assets/css/auth.login.css') }}?v={{ config('app.asset_version', '1.0') }}">
</head>
<body>

    <!-- Ambient Layer Blur Background Eclipses -->
    <div class="login-bg-viewport" aria-hidden="true">
        <div class="ellipse-blur ellipse-top"></div>
        <div class="ellipse-blur ellipse-middle"></div>
        <div class="ellipse-blur ellipse-bottom-right"></div>
    </div>

    <!-- Main Container -->
    <main class="login-container">
        <div class="login-card" id="registerCard">
            
            <!-- Header Block -->
            <header class="card-header">
                <div class="logo-badge" title="Logo TEFA-Hub">
                    <img src="{{ asset('assets/logo.webp') }}" alt="TEFA-Hub Logo" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <svg class="logo-icon-svg" style="display:none;" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="10" fill="#2563EB"/>
                        <path d="M12 14H28M20 14V28" stroke="white" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="header-text-block">
                    <h1 class="welcome-title">Buat Akun Baru</h1>
                    <p class="welcome-subtitle">Daftarkan diri Anda sebagai siswa TEFA-Hub dan mulai ekosistem vokasi digital Anda.</p>
                </div>
            </header>

            <!-- Register Form -->
            <form action="{{ route('register.post') }}" method="POST" class="login-form">
                @csrf

                {{-- Error validasi --}}
                @if ($errors->any())
                    <div class="alert-error" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Success flash --}}
                @if (session('status'))
                    <div class="alert-info" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Nama Lengkap -->
                <div class="form-group">
                    <label for="registerName" class="form-label">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <input 
                            type="text" 
                            id="registerName" 
                            name="name" 
                            class="form-input @error('name') is-invalid @enderror" 
                            value="{{ old('name') }}" 
                            placeholder="Nama lengkap Anda" 
                            required 
                            autocomplete="name"
                        >
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="registerEmail" class="form-label">Email</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <input 
                            type="email" 
                            id="registerEmail" 
                            name="email" 
                            class="form-input @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            placeholder="nama@email.com" 
                            required 
                            autocomplete="email"
                        >
                    </div>
                </div>

                <!-- NIS (opsional) -->
                <div class="form-group">
                    <label for="registerNis" class="form-label">NIS <span style="font-weight:500;color:#94a3b8;">(opsional)</span></label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                            <line x1="8" y1="21" x2="16" y2="21"/>
                            <line x1="12" y1="17" x2="12" y2="21"/>
                        </svg>
                        <input 
                            type="text" 
                            id="registerNis" 
                            name="nis" 
                            class="form-input @error('nis') is-invalid @enderror" 
                            value="{{ old('nis') }}" 
                            placeholder="Nomor Induk Siswa" 
                            autocomplete="off"
                        >
                    </div>
                </div>

                <!-- Kata Sandi -->
                <div class="form-group">
                    <label for="registerPassword" class="form-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input 
                            type="password" 
                            id="registerPassword" 
                            name="password" 
                            class="form-input" 
                            placeholder="Minimal 8 karakter" 
                            required 
                            autocomplete="new-password"
                        >
                        <button type="button" id="togglePasswordBtn" class="btn-toggle-eye" aria-label="Tampilkan / Sembunyikan Kata Sandi">
                            <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Konfirmasi Kata Sandi -->
                <div class="form-group">
                    <label for="registerPasswordConfirm" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        <input 
                            type="password" 
                            id="registerPasswordConfirm" 
                            name="password_confirmation" 
                            class="form-input" 
                            placeholder="Ulangi kata sandi" 
                            required 
                            autocomplete="new-password"
                        >
                        <button type="button" id="togglePasswordConfirmBtn" class="btn-toggle-eye" aria-label="Tampilkan / Sembunyikan Konfirmasi Kata Sandi">
                            <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit-primary">
                    Buat Akun & Masuk
                </button>

            </form>

            <!-- Card Footer Note -->
            <footer class="card-footer-note">
                Sudah punya akun? <a href="{{ route('login') }}" class="link-register">Masuk sekarang</a>
            </footer>

        </div>
    </main>

    <!-- Password Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function makeToggle(btnId, inputId) {
                const btn = document.getElementById(btnId);
                const input = document.getElementById(inputId);
                if (!btn || !input) return;

                btn.addEventListener('click', function() {
                    const isPassword = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isPassword ? 'text' : 'password');

                    btn.innerHTML = isPassword
                        ? `<svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
                        : `<svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
                });
            }

            makeToggle('togglePasswordBtn', 'registerPassword');
            makeToggle('togglePasswordConfirmBtn', 'registerPasswordConfirm');
        });
    </script>

</body>
</html>
