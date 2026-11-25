<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inscription — {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ============================================
           RESET & BASE
           ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 200% 200%;
            animation: gradientShift 15s ease infinite;
            position: relative;
            overflow: hidden;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        /* Bulles décoratives flottantes */
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
            left: -200px;
            animation: float 10s ease-in-out infinite;
        }

        body::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            right: -150px;
            animation: float 12s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50%      { transform: translate(40px, -40px) scale(1.1); }
        }

        /* ============================================
           CARTE DU FORMULAIRE
           ============================================ */
        .register-card {
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.2) inset;
            position: relative;
            z-index: 2;
            animation: slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ============================================
           EN-TÊTE
           ============================================ */
        .register-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .register-header h1 {
            font-size: 28px;
            font-weight: 800;
            color: #1a1a2e;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .register-header p {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
        }

        /* ============================================
           CHAMPS DE FORMULAIRE
           ============================================ */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            letter-spacing: 0.2px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            font-size: 15px;
            color: #1a1a2e;
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            outline: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
        }

        .form-group input::placeholder {
            color: #9ca3af;
        }

        .form-group input:hover {
            border-color: #d1d5db;
            background: #ffffff;
        }

        .form-group input:focus {
            border-color: #6366f1;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
            transform: translateY(-1px);
        }

        .form-group.has-error input {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .form-group.has-error input:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
        }

        .error-message {
            display: block;
            color: #ef4444;
            font-size: 13px;
            font-weight: 500;
            margin-top: 6px;
        }

        /* ============================================
           BOUTON PRINCIPAL
           ============================================ */
        .btn-register {
            width: 100%;
            padding: 14px 24px;
            font-size: 15px;
            font-weight: 700;
            font-family: inherit;
            color: #ffffff;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
            letter-spacing: 0.3px;
            margin-top: 12px;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.5);
            transform: translateY(-2px);
        }

        .btn-register:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(99, 102, 241, 0.4);
        }

        /* ============================================
           PIED DE CARTE (lien login)
           ============================================ */
        .register-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #6b7280;
        }

        .register-footer a {
            color: #6366f1;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .register-footer a:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        /* ============================================
           MESSAGE DE SESSION (status)
           ============================================ */
        .session-status {
            padding: 12px 16px;
            background: #ecfdf5;
            color: #059669;
            border-left: 4px solid #10b981;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 20px;
            animation: slideUp 0.4s ease;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 480px) {
            .register-card {
                padding: 36px 24px;
                border-radius: 20px;
            }
            .register-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="register-card">
        <!-- En-tête -->
        <div class="register-header">
            <h1>Créer un compte ✨</h1>
            <p>Rejoignez-nous en quelques secondes</p>
        </div>

        <!-- Message de session -->
        @if (session('status'))
            <div class="session-status">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nom -->
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nom complet</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Jean Dupont"
                    required
                    autofocus
                    autocomplete="name"
                >
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Adresse email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="vous@exemple.com"
                    required
                    autocomplete="username"
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Mot de passe</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="new-password"
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirmation mot de passe -->
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    required
                    autocomplete="new-password"
                >
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Bouton -->
            <button type="submit" class="btn-register">
                Créer mon compte
            </button>

            <!-- Lien connexion -->
            <div class="register-footer">
                Déjà inscrit ?
                <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </form>
    </div>
</body>
</html>
