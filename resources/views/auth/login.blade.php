<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-pwa />
    <title>Masuk — TEFA-Hub Ekosistem Vokasi</title>
    <meta name="description" content="Halaman masuk siswa dan alumni TEFA-Hub. Silakan masukkan detail akun Anda untuk melanjutkan.">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Login Page CSS -->
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
        <div class="login-card" id="loginCard">
            
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
                    <h1 class="welcome-title">Selamat Datang</h1>
                    <p class="welcome-subtitle">Silakan masukkan detail akun siswa atau alumni Anda untuk melanjutkan ke ekosistem Tefa.</p>
                </div>
            </header>

            <!-- Login Form -->
            <form action="{{ route('login.post') }}" method="POST" class="login-form">
                @csrf

                {{-- Status flash (misal: setelah logout) --}}
                @if (session('status'))
                    <div class="alert-info" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Error validasi / autentikasi --}}
                @if ($errors->any())
                    <div class="alert-error" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Email Input -->
                <div class="form-group">
                    <label for="emailInput" class="form-label">Email</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <input 
                            type="email" 
                            id="emailInput" 
                            name="email" 
                            class="form-input @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            placeholder="nama@email.com" 
                            required 
                            autocomplete="email"
                        >
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="loginPassword" class="form-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input 
                            type="password" 
                            id="loginPassword" 
                            name="password" 
                            class="form-input" 
                            placeholder="••••••••" 
                            required 
                            autocomplete="current-password"
                        >
                        <button type="button" id="togglePasswordBtn" class="btn-toggle-eye" aria-label="Tampilkan / Sembunyikan Kata Sandi">
                            <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    <a href="#lupa-sandi" class="forgot-password-link">Lupa sandi?</a>
                </div>

                <!-- Remember Me Checkbox -->
                <label class="remember-row">
                    <input type="checkbox" name="remember" id="rememberCheck" checked>
                    <span class="custom-checkbox">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </span>
                    <span class="remember-text">Ingat sesi di perangkat ini</span>
                </label>

                <!-- Primary Submit Button -->
                <button type="submit" class="btn-submit-primary">
                    Masuk ke Dashboard
                </button>

                <!-- Divider -->
                <div class="divider-wrapper">
                    <span class="divider-text">ATAU MASUK DENGAN</span>
                </div>

                <!-- Google / Akun Belajar.id OAuth Button -->
                <button type="button" class="btn-google-auth" onclick="alert('Navigasi ke OAuth Google / Akun Belajar.id')">
                    <svg class="google-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.1c-.22-.66-.35-1.36-.35-2.1s.13-1.44.35-2.1V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
                    </svg>
                    <span>Masuk dengan Akun Belajar.id / Google</span>
                </button>
            </form>

            <!-- Card Footer Note -->
            <footer class="card-footer-note">
                @if (Route::has('register'))
                    Belum punya akun? <a href="{{ route('register') }}" class="link-register">Daftar sekarang</a> atau <a href="#admin" class="link-admin">Hubungi Admin</a>
                @else
                    Belum punya akun? <a href="#admin" class="link-admin">Hubungi Admin</a> untuk aktivasi akun.
                @endif
            </footer>

        </div>
    </main>

    <!-- Interactive Password Visibility Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('togglePasswordBtn');
            const pwdInput = document.getElementById('loginPassword');

            toggleBtn.addEventListener('click', function() {
                const isPassword = pwdInput.getAttribute('type') === 'password';
                pwdInput.setAttribute('type', isPassword ? 'text' : 'password');
                
                // Toggle eye icon SVG
                if (isPassword) {
                    toggleBtn.innerHTML = `
                        <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    `;
                } else {
                    toggleBtn.innerHTML = `
                        <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    `;
                }
            });
        });
    </script>
</body>
</html>
