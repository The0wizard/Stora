<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile — Stora</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary: #007bff;
            --secondary: #6610f2;
            --dark: #1a1a2e;
            --muted: #6b7280;
            --light-bg: #f5f7fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light-bg);
            min-height: 100vh;
        }

        .navbar {
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px);
        }

        .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 1.75rem;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 500;
            color: #555 !important;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .profile-header {
            background: linear-gradient(135deg, #007bff 0%, #6610f2 50%, #a855f7 100%);
            padding: 100px 0 90px;
            position: relative;
            overflow: hidden;
            color: white;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            top: -150px;
            right: -100px;
        }

        .profile-header h1 {
            font-weight: 800;
            font-size: 2.5rem;
            position: relative;
            z-index: 2;
        }

        .profile-header p {
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        /* ---------- Avatar ---------- */
        .avatar-wrapper {
            position: relative;
            display: inline-block;
            margin-top: -70px;
            z-index: 3;
        }

        .avatar-img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            background: #f8f9ff;
            transition: transform 0.3s ease;
        }

        .avatar-wrapper:hover .avatar-img {
            transform: scale(1.05);
        }

        .avatar-upload-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: 3px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(0, 123, 255, 0.4);
        }

        .avatar-upload-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.6);
        }

        /* ---------- Card ---------- */
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #374151;
        }

        .form-control {
            border-radius: 12px;
            padding: 0.85rem 1rem;
            border: 2px solid #e5e7eb;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.12);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #4c0fb8);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.35);
        }

        .btn-danger {
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border: none;
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border-left: 4px solid #10b981;
            border-radius: 12px;
            border: none;
            padding: 1rem 1.25rem;
        }

        .danger-zone {
            border-top: 1px solid #e5e7eb;
            margin-top: 2rem;
            padding-top: 2rem;
        }

        .form-text {
            color: var(--muted);
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

    <!-- ✅ Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Stora</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/books">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.ind') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                </ul>

                <ul class="navbar-nav align-items-center">
                    @auth
                        <li class="nav-item me-3">
                            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart3 fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                                    {{ session('cart_count', 0) }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}">
                                <i class="bi bi-receipt me-1"></i> My Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <img src="{{ Auth::user()->avatarUrl() }}" alt="Avatar"
                                 class="rounded-circle me-2" style="width: 32px; height: 32px; object-fit: cover;">
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- ✅ Profile Header -->
    <section class="profile-header">
        <div class="container text-center">
            <h1>My Profile</h1>
            <p>Manage your personal information and avatar</p>
        </div>
    </section>

    <!-- ✅ Avatar + Form -->
    <div class="container">
        <div class="text-center">
            <div class="avatar-wrapper">
                <img id="avatarPreview"
                     src="{{ $user->avatarUrl() }}"
                     alt="Avatar"
                     class="avatar-img">
                <label for="avatarInput" class="avatar-upload-btn" title="Change avatar">
                    <i class="bi bi-camera-fill"></i>
                </label>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                @endif

                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success mb-4">
                        <i class="bi bi-check-circle-fill me-2"></i> Profile updated successfully!
                    </div>
                @endif

                <div class="profile-card">
                    <h4 class="fw-bold mb-4"><i class="bi bi-person-gear text-primary me-2"></i> Edit Information</h4>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Avatar upload caché -->
                        <input type="file" name="avatar" id="avatarInput" class="d-none" accept="image/*">

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Avatar</label>
                            <input type="file" name="avatar" id="avatarInput2" class="form-control" accept="image/*">
                            <div class="form-text">JPG, PNG, or WEBP — max 2 MB</div>
                            @error('avatar') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <hr>
                        <h5 class="fw-semibold mb-3">Change Password</h5>

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" id="current_password"
                                   class="form-control @error('current_password') is-invalid @enderror"
                                   autocomplete="current-password">
                            @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       autocomplete="new-password">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control" autocomplete="new-password">
                            </div>
                        </div>

                        @if ($user->avatar)
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remove_avatar" id="remove_avatar" value="1">
                                <label class="form-check-label text-muted" for="remove_avatar">
                                    <i class="bi bi-trash me-1"></i> Remove current avatar
                                </label>
                            </div>
                        @endif

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> Save Changes
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                Cancel
                            </a>
                        </div>
                    </form>

                    <!-- Danger zone : suppression du compte -->
                    <div class="danger-zone">
                        <h6 class="fw-bold text-danger mb-2"><i class="bi bi-exclamation-triangle me-1"></i> Danger Zone</h6>
                        <p class="text-muted small mb-3">Once your account is deleted, all data will be lost.</p>

                        <form action="{{ route('profile.destroy') }}" method="POST"
                              onsubmit="return confirm('Delete your account permanently?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash me-1"></i> Delete Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 60px;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Aperçu instantané de l'avatar
        document.querySelectorAll('#avatarInput, #avatarInput2').forEach(input => {
            input.addEventListener('change', e => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = ev => {
                        document.getElementById('avatarPreview').src = ev.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

</body>

</html>
