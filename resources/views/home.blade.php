<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stora — Your Online Bookstore</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* ============================================
           BASE
           ============================================ */
        :root {
            --primary: #007bff;
            --secondary: #6610f2;
            --dark: #1a1a2e;
            --muted: #6b7280;
            --light-bg: #f5f7fa;
        }

        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* ============================================
           NAVBAR — sticky glassmorphism
           ============================================ */
        .navbar {
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 1.75rem;
            color: var(--primary) !important;
            transition: transform 0.3s;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .nav-link {
            font-weight: 500;
            color: #555 !important;
            transition: color 0.3s;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .nav-link:hover::after {
            width: 70%;
        }

        .cart-badge {
            font-size: 0.65rem;
            padding: 0.25em 0.5em;
        }

        /* ============================================
           HERO SECTION
           ============================================ */
        .hero-section {
            background: linear-gradient(135deg, #007bff 0%, #6610f2 50%, #a855f7 100%);
            background-size: 200% 200%;
            animation: heroGradient 12s ease infinite;
            color: white;
            padding: 130px 0 110px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        @keyframes heroGradient {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        /* Formes flottantes */
        .hero-section::before,
        .hero-section::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .hero-section::before {
            width: 400px;
            height: 400px;
            top: -150px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .hero-section::after {
            width: 300px;
            height: 300px;
            bottom: -100px;
            right: -80px;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50%      { transform: translate(30px, -30px) scale(1.1); }
        }

        .hero-section h1 {
            font-weight: 800;
            font-size: 3.5rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-top: 18px;
            opacity: 0.95;
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-section .btn {
            margin-top: 30px;
            padding: 14px 36px;
            font-size: 1rem;
            border-radius: 50px;
            font-weight: 600;
            position: relative;
            z-index: 2;
            background: white;
            color: var(--primary);
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .hero-section .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            background: white;
            color: var(--secondary);
        }

        /* ============================================
           SECTION TITLES
           ============================================ */
        .section-title {
            font-weight: 800;
            font-size: 2.25rem;
            margin-bottom: 12px;
            color: var(--dark);
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
            margin: 12px auto 0;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 1rem;
            margin-bottom: 50px;
        }

        /* ============================================
           BOOK CARDS
           ============================================ */
        .card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 123, 255, 0.15);
        }

        .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 260px;
        }

        .card-img-top {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.08);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-text {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card .btn {
            border-radius: 50px;
            font-size: 0.85rem;
            padding: 8px 18px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary {
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.3);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
            border: none;
        }

        .btn-secondary:hover {
            background: #4b5563;
            transform: translateY(-2px);
        }

        /* ============================================
           WHY CHOOSE US
           ============================================ */
        .why-section {
            background: linear-gradient(135deg, #f8f9ff 0%, #eef2ff 100%);
            padding: 80px 0;
        }

        .why-us-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
            position: relative;
            height: 100%;
            overflow: hidden;
        }

        .why-us-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .why-us-card:hover::before {
            transform: scaleX(1);
        }

        .why-us-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 123, 255, 0.12);
        }

        .why-us-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 1.75rem;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
            transition: transform 0.4s ease;
        }

        .why-us-card:hover .why-us-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .why-us-card h5 {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .why-us-card p {
            color: var(--muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        /* ============================================
           ALERT
           ============================================ */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 14px 20px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* ============================================
           FOOTER
           ============================================ */
        .footer {
            background: #1a1a2e;
            color: #cbd5e1;
            padding: 40px 0 20px;
            margin-top: 40px;
        }

        .footer .brand {
            font-family: 'Pacifico', cursive;
            color: white;
            font-size: 1.5rem;
        }

        .footer p {
            font-size: 0.9rem;
            margin: 10px 0 0;
            opacity: 0.7;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            font-size: 0.85rem;
            opacity: 0.6;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .hero-section {
                padding: 90px 0 70px;
            }
            .hero-section h1 {
                font-size: 2.2rem;
            }
            .hero-section p {
                font-size: 1rem;
            }
            .section-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>

    <!-- ✅ Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top">
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
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-sm me-2 rounded-pill px-3" href="/admin/orders">
                                    <i class="bi bi-speedometer2 me-1"></i> Dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav-item me-3">
                                <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                    <i class="bi bi-cart3 fs-5"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge">
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
                                <a class="nav-link" href="{{ route('profile.edi') }}">
                                    <i class="bi bi-person-circle me-1"></i> Profile
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm rounded-pill px-4 ms-lg-2" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- ✅ Alerts -->
    <div class="container my-4">
        @if (session('success'))
            <div class="alert alert-success animate__animated animate__fadeInDown">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger animate__animated animate__fadeInDown">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- ✅ Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">Welcome to Stora 📚</h1>
            <p class="lead animate__animated animate__fadeInUp animate__delay-1s">
                Discover high-quality physical books delivered straight to your doorstep.
                Your next great read is just a click away.
            </p>
            <a href="/books" class="btn animate__animated animate__fadeInUp animate__delay-2s">
                <i class="bi bi-book me-2"></i> Browse Books
            </a>
        </div>
    </section>

    <!-- ✅ Featured Books -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title animate__animated animate__fadeInDown">Featured Books</h2>
                <p class="section-subtitle animate__animated animate__fadeInUp">
                    Handpicked titles our readers love the most
                </p>
            </div>

            <div class="row g-4">
                @foreach ($featuredBooks as $book)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 animate__animated animate__fadeInUp">
                            <div class="card-img-wrapper">
                                <img src="{{ $book->thumbnail }}" loading="lazy" class="card-img-top"
                                    alt="{{ $book->title }}">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text flex-grow-1">{{ $book->description }}</p>
                                @php($promotion = $book->activePromotion())
                                @if ($promotion)
                                    <div class="mb-3">
                                        <span class="badge bg-danger">{{ $promotion->name }} · {{ $promotion->discount_label }}</span>
                                        <span class="text-muted text-decoration-line-through ms-2">
                                            ${{ number_format($book->price, 2) }}
                                        </span>
                                        <strong class="text-success ms-1">${{ number_format($book->final_price, 2) }}</strong>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="{{ route('books.show', $book->id) }}"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye me-1"></i> Details
                                    </a>
                                    @auth
                                        @if (Auth::user()->role === 'user')
                                            <form action="{{ route('cart.add', $book->id) }}" method="POST" class="m-0">
                                                @csrf
                                                <button class="btn btn-success btn-sm">
                                                    <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">
                                            <i class="bi bi-lock me-1"></i> Login to Buy
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ✅ Why Choose Us -->
    <section class="why-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title animate__animated animate__fadeInDown">Why Choose Us</h2>
                <p class="section-subtitle animate__animated animate__fadeInUp">
                    We're committed to giving you the best book-buying experience
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="why-us-card animate__animated animate__fadeInUp">
                        <div class="why-us-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5>Top Quality</h5>
                        <p>All books are printed and packaged with care to ensure they arrive in perfect condition.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="why-us-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="why-us-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h5>Fast Shipping</h5>
                        <p>Books delivered to your door within 2–3 business days with real-time tracking.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="why-us-card animate__animated animate__fadeInUp animate__delay-2s">
                        <div class="why-us-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h5>Support</h5>
                        <p>Contact us anytime — our team is here to help with any questions about your orders.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <span class="brand">Stora</span>
                    <p>Your trusted online bookstore, delivering stories one page at a time.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <a href="/books" class="text-white text-decoration-none me-3 small">Books</a>
                    <a href="{{ route('categories.ind') }}" class="text-white text-decoration-none me-3 small">Categories</a>
                    <a href="{{ route('about') }}" class="text-white text-decoration-none small">About</a>
                </div>
            </div>
            <div class="footer-bottom">
                © {{ date('Y') }} Stora. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
