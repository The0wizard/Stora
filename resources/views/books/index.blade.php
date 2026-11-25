<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books — Stora</title>

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

        /* ---------- HERO / HEADER ---------- */
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
            font-size: 2.75rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
        }

        .page-hero p {
            font-size: 1.05rem;
            opacity: 0.95;
            position: relative;
            z-index: 2;
            max-width: 500px;
            margin: 12px auto 0;
        }

        /* ---------- SEARCH BAR ---------- */
        .search-wrapper {
            max-width: 600px;
            margin: -35px auto 0;
            position: relative;
            z-index: 3;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 50px;
            padding: 6px 6px 6px 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .search-bar i {
            color: var(--muted);
            font-size: 1.1rem;
        }

        .search-bar input {
            flex: 1;
            border: none;
            outline: none;
            padding: 12px 14px;
            font-size: 0.95rem;
            background: transparent;
        }

        .search-bar button {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            padding: 10px 26px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .search-bar button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
        }

        /* ---------- SECTION TITLE ---------- */
        .section-title {
            font-weight: 800;
            font-size: 1.75rem;
            color: var(--dark);
            letter-spacing: -0.5px;
        }

        .section-title i {
            color: var(--primary);
            margin-right: 0.5rem;
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

        /* ---------- PAGINATION ---------- */
        .pagination {
            gap: 6px;
            margin-top: 2rem;
        }

        .pagination .page-link {
            border: none;
            border-radius: 10px !important;
            color: var(--muted);
            font-weight: 600;
            padding: 10px 16px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .pagination .page-link:hover {
            background: #eef2ff;
            color: var(--primary);
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 4px 14px rgba(0, 123, 255, 0.4);
        }

        /* ---------- EMPTY STATE ---------- */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 18px;
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

        /* ---------- ALERTS ---------- */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            .page-hero h1 { font-size: 2rem; }
            .page-hero { padding: 60px 0 90px; }
            .search-wrapper { margin-top: -30px; }
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

    <!-- ✅ Hero Section -->
    <section class="page-hero">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">
                <i class="bi bi-book-half me-2"></i> Explore Our Books
            </h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s">
                Find your next great read from our curated collection of titles
            </p>
        </div>
    </section>

    <!-- ✅ Search Bar -->
    <div class="container">
        <div class="search-wrapper animate__animated animate__fadeInUp animate__delay-2s">
            <form action="/books" method="GET" class="search-bar">
                <i class="bi bi-search"></i>
                <input type="text" name="q" placeholder="Search by title, author, or keyword..."
                       value="{{ request('q') }}">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

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

    <!-- ✅ Books List -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2 class="section-title mb-0">
                <i class="bi bi-collection"></i>
                {{ request('q') ? 'Search Results' : 'All Books' }}
            </h2>
            <span class="badge bg-primary rounded-pill px-3 py-2">
                {{ $books->total() }} {{ Str::plural('book', $books->total()) }}
            </span>
        </div>

        @if ($books->count() > 0)
            <div class="row g-4">
                @foreach ($books as $book)
                    <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp">
                        <div class="book-card">
                            <div class="book-img-wrapper">
                                <img src="{{ $book->thumbnail ?? 'https://via.placeholder.com/400x300' }}"
                                     loading="lazy" alt="{{ $book->title }}">
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

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $books->links() }}
            </div>
        @else
            <div class="empty-state animate__animated animate__fadeIn">
                <i class="bi bi-inbox"></i>
                <h4>No books found</h4>
                <p class="text-muted">
                    @if (request('q'))
                        No results for "<strong>{{ request('q') }}</strong>". Try a different search.
                    @else
                        Our collection is empty right now. Check back soon!
                    @endif
                </p>
                <a href="/books" class="btn btn-primary rounded-pill px-4 mt-2">
                    <i class="bi bi-arrow-clockwise me-1"></i> View all books
                </a>
            </div>
        @endif
    </div>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
