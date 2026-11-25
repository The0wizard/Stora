<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Réinitialiser le mot de passe — Stora</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        :root {
            --primary: #007bff;
            --secondary: #6610f2;
            --dark: #1a1a2e;
            --muted: #6b7280;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: linear-gradient(135deg, #007bff 0%, #6610f2 50%, #a855f7 100%);
            background-size: 200% 200%;
            animation: heroGradient 15s ease infinite;
            position: relative;
            overflow: hidden;
            margin: 0;
        }

        @keyframes heroGradient {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        body::before {
            width: 500px;
            height: 500px;
            top: -200px;
            left: -150px;
            animation: float 10s ease-in-out infinite;
        }

        body::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            right: -120px;
            animation: float 12s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50%      { transform: translate(40px, -40px) scale(1.1); }
        }

        /* ---------- CARD ---------- */
        .auth-card {
            width: 100%;
            max-width: 480px;
            background: white;
            border-radius: 24px;
            padding: 3rem 2.5rem;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
            position: relative;
            z-index: 2;
            animation: slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ---------- ICON ---------- */
        .auth-icon {
            width: 80px;
            height: 80px;
            border-radius: 22px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary);
            font-size: 2.25rem;
            box-shadow: 0 8px 24px rgba(0, 123, 255, 0.15);
        }

        /* ---------- TITLES ---------- */
        .auth-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--dark);
            text-align: center;
            margin-bottom: 0.75rem;
            letter-spacing: -0.5px;
        }

        .auth-subtitle {
            font-size: 0.9rem;
            color: var(--muted);
            text-align: center;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        /* ---------- FORM ---------- */
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 0.9rem 1rem;
            border: 2px solid #e5e7eb;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.12);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .input-icon-wrapper {
            position: relative;
        }

        .input-icon-wrapper .bi {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 1rem;
            pointer-events: none;
        }

        .input-icon-wrapper .form-control {
            padding-left: 42px;
            padding-right: 42px;
        }

        .input-icon-wrapper .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            cursor: pointer;
            font-size: 1rem;
            transition: color 0.2s;
        }

        .input-icon-wrapper .toggle-password:hover {
            color: var(--primary);
        }

        /* ---------- STRENGTH BAR ---------- */
        .password-strength {
            display: flex;
            gap: 4px;
            margin-top: 8px;
            margin-bottom: 4px;
        }

        .strength-bar {
            flex: 1;
            height: 4px;
            border-radius: 2px;
            background: #e5e7eb;
            transition: background 0.3s ease;
        }

        .strength-bar.active-weak   { background: #ef4444; }
        .strength-bar.active-medium { background: #f59e0b; }
        .strength-bar.active-strong { background: #10b981; }

        .strength-label {
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 4px;
        }

        .strength-label.weak   { color: #ef4444; }
        .strength-label.medium { color: #f59e0b; }
        .strength-label.strong { color: #10b981; }

        /* ---------- BUTTON ---------- */
        .btn-auth {
            width: 100%;
            padding: 14px 24px;
            font-weight: 700;
            font-size: 0.95rem;
            border-radius: 50px;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.35);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-auth:hover {
            background: linear-gradient(135deg, #0056b3, #4c0fb8);
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(0, 123, 255, 0.45);
            color: white;
        }

        /* ---------- LINKS ---------- */
        .auth-links {
            text-align: center;
            margin-top: 1.75rem;
            font-size: 0.88rem;
            color: var(--muted);
        }

        .auth-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .auth-links a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 480px) {
            .auth-card {
                padding: 2.25rem 1.5rem;
                border-radius: 20px;
            }
            .auth-title {
                font-size: 1.5rem;
            }
            .auth-icon {
                width: 70px;
                height: 70px;
                font-size: 1.85rem;
            }
        }
    </style>
</head>
<body>

    <div class="auth-card">

        <!-- Icône -->
        <div class="auth-icon">
            <i class="bi bi-shield-lock-fill"></i>
        </div>

        <!-- Titre -->
        <h1 class="auth-title">Nouveau mot de passe</h1>
        <p class="auth-subtitle">
            Choisissez un nouveau mot de passe sécurisé pour votre compte.
        </p>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-envelope"></i>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $request->email) }}"
                        placeholder="vous@exemple.com"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>
                @error('email')
                    <small class="text-danger d-block mt-2">
                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                    </small>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div class="mb-3">
                <label for="password" class="form-label">Nouveau mot de passe</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-lock"></i>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                    >
                    <i class="bi bi-eye-fill toggle-password" onclick="togglePassword('password', this)"></i>
                </div>

                <!-- Indicateur de force -->
                <div class="password-strength" id="strengthBars">
                    <div class="strength-bar"></div>
                    <div class="strength-bar"></div>
                    <div class="strength-bar"></div>
                    <div class="strength-bar"></div>
                </div>
                <div class="strength-label" id="strengthLabel"></div>

                @error('password')
                    <small class="text-danger d-block mt-2">
                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                    </small>
                @enderror
            </div>

            <!-- Confirmation -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-lock-fill"></i>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="new-password"
                    >
                    <i class="bi bi-eye-fill toggle-password" onclick="togglePassword('password_confirmation', this)"></i>
                </div>
                @error('password_confirmation')
                    <small class="text-danger d-block mt-2">
                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                    </small>
                @enderror
            </div>

            <!-- Bouton -->
            <button type="submit" class="btn-auth">
                <i class="bi bi-check-circle-fill"></i> Réinitialiser le mot de passe
            </button>
        </form>

        <!-- Liens -->
        <div class="auth-links">
            <a href="{{ route('login') }}">← Retour à la connexion</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle visibilité mot de passe
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('bi-eye-fill');
                icon.classList.add('bi-eye-slash-fill');
            } else {
                field.type = 'password';
                icon.classList.remove('bi-eye-slash-fill');
                icon.classList.add('bi-eye-fill');
            }
        }

        // Indicateur de force du mot de passe
        const passwordInput = document.getElementById('password');
        const bars = document.querySelectorAll('#strengthBars .strength-bar');
        const label = document.getElementById('strengthLabel');

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;
            let score = 0;

            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            // Reset
            bars.forEach(b => b.className = 'strength-bar');
            label.className = 'strength-label';
            label.textContent = '';

            if (val.length === 0) return;

            let level = score <= 1 ? 'weak' : score <= 2 ? 'medium' : 'strong';
            let colorClass = level === 'weak' ? 'active-weak' : level === 'medium' ? 'active-medium' : 'active-strong';

            // Barres actives
            const activeBars = Math.min(score, 4);
            for (let i = 0; i < activeBars; i++) {
                bars[i].classList.add(colorClass);
            }

            // Label
            label.classList.add(level);
            if (level === 'weak')   label.textContent = 'Faible';
            if (level === 'medium') label.textContent = 'Moyen';
            if (level === 'strong') label.textContent = 'Fort ✓';
        });
    </script>
</body>
</html>
