<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books in {{ $category->name }} — Stora</title>

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
            padding: 80px 0 100px;
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
            width: 400px;
            height: 400px;
            top: -150px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .page-hero::after {
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

        .page-hero h1 {
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
        }

        .page-hero .category-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .page-hero p {
            font-size: 1.05rem;
            opacity: 0.95;
            position: relative;
            z-index: 2;
        }

        /* ---------- BOOK CARDS ---------- */
        .book-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 123, 255, 0.18);
        }

        .book-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 280px;
            background: #f8f9ff;
        }

        .book-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .book-card:hover .book-img-wrapper img {
            transform: scale(1.08);
        }

        .price-tag {
            position: absolute;
            top: 14px;
            right: 14px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 4px 14px rgba(0, 123, 255, 0.4);
        }

        .book-card .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .book-card .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-card .author {
            font-size: 0.85rem;
            color: var(--muted);
            margin-bottom: 12px;
        }

        .book-card .author i {
            color: var(--primary);
            margin-right: 4px;
        }

        .book-card .card-text {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
        }

        .book-card .card-footer {
            background: transparent;
            border: none;
            padding: 0;
            margin-top: 16px;
            display: flex;
            gap: 10px;
        }

        .btn-details {
            flex: 1;
            border-radius: 50px;
            padding: 9px 0;
            font-weight: 600;
            font-size: 0.85rem;
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-details:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.3);
        }

        .btn-cart {
            flex: 1;
            border-radius: 50px;
            padding: 9px 0;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-cart:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .btn-login-buy {
            flex: 1;
            border-radius: 50px;
            padding: 9px 0;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            background: #6b7280;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-login-buy:hover {
            background: #4b5563;
            transform: translateY(-2px);
            color: white;
        }

        /* ---------- EMPTY STATE ---------- */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        .empty-state h4 {
            font-weight: 700;
            color: var(--dark);
        }

        /* ---------- BREADCRUMB ---------- */
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 1.5rem 0 0;
            font-size: 0.85rem;
        }

        .breadcrumb a {
            color: var(--muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb-item.active {
            color: var(--dark);
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .page-hero h1 { font-size: 1.85rem; }
            .page-hero { padding: 60px 0 80px; }
        }
    </style>
</head>

<body>

    <!-- ✅ Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Stora</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
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

    <!-- ✅ Hero -->
    <section class="page-hero">
        <div class="container">
            <span class="category-badge">
                <i class="bi bi-tag-fill me-1"></i> Category
            </span>
            <h1>{{ $category->name }}</h1>
            <p>
                {{ $category->books->count() }}
                {{ Str::plural('book', $category->books->count()) }} available in this category
            </p>
        </div>
    </section>

    <!-- ✅ Container -->
    <div class="container">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door me-1"></i>Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.ind') }}">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        <!-- Books Grid -->
        <div class="py-4">
            @if ($category->books->count() > 0)
                <div class="row g-4">
                    @foreach ($category->books as $book)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="book-card">
                                <div class="book-img-wrapper">
                                    <img src="{{ $book->thumbnail ?? 'https://via.placeholder.com/400x300' }}"
                                         loading="lazy"
                                         alt="{{ $book->title }}">
                                    @php($promotion = $book->activePromotion())
                                    @if ($promotion)
                                        <span class="badge bg-danger position-absolute top-0 start-0 m-3">
                                            {{ $promotion->name }} · {{ $promotion->discount_label }}
                                        </span>
                                        <span class="price-tag">
                                            <span class="text-decoration-line-through me-1">${{ number_format($book->price, 2) }}</span>
                                            <strong>${{ number_format($book->final_price, 2) }}</strong>
                                        </span>
                                    @else
                                        <span class="price-tag">${{ number_format($book->price, 2) }}</span>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <p class="author">
                                        <i class="bi bi-person"></i>{{ $book->author ?? 'Unknown author' }}
                                    </p>
                                    <p class="card-text">{{ Str::limit($book->description, 100) }}</p>

                                    <div class="card-footer">
                                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-details">
                                            <i class="bi bi-eye me-1"></i> Details
                                        </a>

                                        @auth
                                            @if (Auth::user()->role === 'user')
                                                <form action="{{ route('cart.add', $book->id) }}" method="POST" class="m-0 flex-fill d-flex">
                                                    @csrf
                                                    <button class="btn btn-cart w-100">
                                                        <i class="bi bi-cart-plus me-1"></i> Add
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-login-buy">
                                                <i class="bi bi-lock me-1"></i> Login
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state" data-aos="fade-up">
                    <i class="bi bi-inbox"></i>
                    <h4>No books in this category</h4>
                    <p class="text-muted">Check back soon — new titles are added regularly.</p>
                    <a href="/books" class="btn btn-primary rounded-pill px-4 mt-2">
                        <i class="bi bi-arrow-left me-1"></i> Browse all books
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div style="height: 60px;"></div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>

</body>

</html>
