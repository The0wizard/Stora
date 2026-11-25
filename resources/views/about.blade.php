<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us — Stora</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

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
            background-color: var(--light-bg);
            color: var(--dark);
        }

        /* ---------- NAVBAR ---------- */
        .navbar {
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-family: 'Pacifico', cursive;
            font-size: 1.75rem;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 500;
            color: #555 !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        /* ---------- HERO ---------- */
        .page-hero {
            background: linear-gradient(135deg, #007bff 0%, #6610f2 50%, #a855f7 100%);
            background-size: 200% 200%;
            animation: heroGradient 12s ease infinite;
            color: white;
            padding: 100px 0 120px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        @keyframes heroGradient {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        .page-hero::before,
        .page-hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .page-hero::before {
            width: 450px;
            height: 450px;
            top: -180px;
            left: -120px;
            animation: float 8s ease-in-out infinite;
        }

        .page-hero::after {
            width: 350px;
            height: 350px;
            bottom: -120px;
            right: -100px;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50%      { transform: translate(30px, -30px) scale(1.1); }
        }

        .page-hero .hero-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.25rem;
            position: relative;
            z-index: 2;
        }

        .page-hero h1 {
            font-weight: 800;
            font-size: 3rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
        }

        .page-hero p {
            font-size: 1.15rem;
            opacity: 0.95;
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 14px auto 0;
        }

        /* ---------- SECTIONS ---------- */
        .about-section {
            padding: 80px 0;
        }

        .section-eyebrow {
            display: inline-block;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -0.5px;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .section-lead {
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        /* ---------- IMAGE FRAMES ---------- */
        .img-frame {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transition: transform 0.4s ease;
        }

        .img-frame:hover {
            transform: translateY(-5px) rotate(-1deg);
        }

        .img-frame::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 60%, rgba(0, 0, 0, 0.15));
            pointer-events: none;
        }

        .img-frame img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            display: block;
        }

        /* Decorative accents */
        .img-accent {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            opacity: 0.8;
            z-index: -1;
        }

        .img-accent.top-left {
            top: -20px;
            left: -20px;
        }

        .img-accent.bottom-right {
            bottom: -20px;
            right: -20px;
        }

        /* ---------- FEATURE CARDS ---------- */
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 2rem 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
        }

        .feature-card::before {
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

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 123, 255, 0.15);
            border-color: rgba(0, 123, 255, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            color: var(--primary);
            font-size: 1.75rem;
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transform: scale(1.1) rotate(-5deg);
            box-shadow: 0 8px 24px rgba(0, 123, 255, 0.4);
        }

        .feature-card h5 {
            font-weight: 700;
            font-size: 1.15rem;
            color: var(--dark);
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0;
        }

        /* ---------- STATS ---------- */
        .stats-section {
            background: linear-gradient(135deg, var(--dark) 0%, #16213e 100%);
            padding: 70px 0;
            color: white;
            border-radius: 0;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-value {
            font-size: 2.75rem;
            font-weight: 800;
            background: linear-gradient(135deg, #60a5fa, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ---------- TEAM ---------- */
        .team-section {
            background: linear-gradient(135deg, #f8f9ff 0%, #eef2ff 100%);
            padding: 80px 0;
        }

        /* ---------- CTA ---------- */
        .cta-section {
            padding: 80px 0;
        }

        .cta-box {
            background: linear-gradient(135deg, #007bff 0%, #6610f2 50%, #a855f7 100%);
            background-size: 200% 200%;
            animation: heroGradient 12s ease infinite;
            border-radius: 28px;
            padding: 3.5rem 2.5rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 123, 255, 0.25);
        }

        .cta-box::before,
        .cta-box::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .cta-box::before {
            width: 300px;
            height: 300px;
            top: -120px;
            left: -80px;
        }

        .cta-box::after {
            width: 250px;
            height: 250px;
            bottom: -100px;
            right: -60px;
        }

        .cta-box h2 {
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
            letter-spacing: -0.5px;
        }

        .cta-box p {
            opacity: 0.95;
            margin-bottom: 1.75rem;
            position: relative;
            z-index: 2;
        }

        .btn-cta {
            background: white;
            color: var(--primary);
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: var(--secondary);
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            .page-hero h1 { font-size: 2rem; }
            .page-hero { padding: 70px 0 90px; }
            .section-title { font-size: 1.75rem; }
            .stat-value { font-size: 2rem; }
            .cta-box h2 { font-size: 1.5rem; }
            .img-frame img { height: 320px; }
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
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-sm rounded-pill px-3" href="/admin/orders">
                                    <i class="bi bi-speedometer2 me-1"></i> Dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav-item me-3">
                                <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                    <i class="bi bi-cart3 fs-5"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                                        {{ session('cart_count', 0) }}
                                    </span>
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

    <!-- ✅ Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="hero-icon" data-aos="zoom-in">
                <i class="bi bi-book-half"></i>
            </div>
            <h1 data-aos="fade-down">About Stora</h1>
            <p data-aos="fade-up" data-aos-delay="100">
                We believe every great story deserves a beautiful home — and every reader deserves a great book.
            </p>
        </div>
    </section>

    <!-- ✅ Mission -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <div class="img-accent top-left"></div>
                        <div class="img-accent bottom-right"></div>
                        <div class="img-frame">
                            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794"
                                 alt="A stack of books" loading="lazy">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="section-eyebrow">
                        <i class="bi bi-bullseye me-1"></i> Our Mission
                    </span>
                    <h2 class="section-title">Bringing books closer to readers</h2>
                    <p class="section-lead">
                        At <strong>Stora</strong>, we believe in the timeless value of physical books. We're dedicated
                        to making high-quality, affordable books easily available to readers across the country.
                    </p>
                    <p class="section-lead">
                        With fast shipping and a handpicked catalog, we aim to enrich lives through the simple joy of
                        reading — one page at a time.
                    </p>
                    <a href="/books" class="btn btn-primary rounded-pill px-4 mt-2">
                        <i class="bi bi-book me-1"></i> Browse our collection
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ Features -->
    <section class="about-section pt-0">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-eyebrow">
                    <i class="bi bi-stars me-1"></i> Why Stora
                </span>
                <h2 class="section-title">What makes us different</h2>
                <p class="section-lead">Three promises we keep with every single order</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5>Quality Assured</h5>
                        <p>Every book is printed, checked, and packaged with great attention to detail.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h5>Fast Delivery</h5>
                        <p>Get your favorite books delivered to your door in just 2–3 business days.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h5>Dedicated Support</h5>
                        <p>Have questions? Our support team is here to help you 24/7, always friendly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ Stats -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3" data-aos="fade-up">
                    <div class="stat-item">
                        <div class="stat-value">10K+</div>
                        <div class="stat-label">Happy Readers</div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <div class="stat-value">5K+</div>
                        <div class="stat-label">Books Sold</div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <div class="stat-value">2–3</div>
                        <div class="stat-label">Days Shipping</div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <div class="stat-value">24/7</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ Team -->
    <section class="team-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                    <div class="position-relative">
                        <div class="img-accent top-left"></div>
                        <div class="img-accent bottom-right"></div>
                        <div class="img-frame">
                            <img src="https://images.unsplash.com/photo-1553729459-efe14ef6055d"
                                 alt="Our team" loading="lazy">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                    <span class="section-eyebrow">
                        <i class="bi bi-people me-1"></i> Meet the Team
                    </span>
                    <h2 class="section-title">Passionate people, one shared love</h2>
                    <p class="section-lead">
                        We're a small but dedicated group of readers, designers, and logistics experts who love
                        helping people discover books they'll cherish.
                    </p>
                    <p class="section-lead">
                        Whether it's finding your next great read or making sure your delivery arrives fast and
                        secure, we're here for you every step of the way.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4 mt-2">
                        <i class="bi bi-envelope me-1"></i> Get in touch
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box" data-aos="zoom-in">
                <h2>Ready to find your next great read?</h2>
                <p>Explore our curated collection of books and start your next chapter today.</p>
                <a href="/books" class="btn-cta">
                    <i class="bi bi-book"></i> Explore Books
                </a>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 900, once: true });
    </script>

</body>

</html>
