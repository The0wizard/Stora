<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} — Stora</title>

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

        /* ---------- BOOK DETAIL CARD ---------- */
        .book-detail-card {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            margin-top: 1rem;
        }

        /* ---------- IMAGE STICKY ---------- */
        .book-cover-wrapper {
            position: sticky;
            top: 100px;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            background: #f8f9ff;
            transition: transform 0.3s ease;
        }

        .book-cover-wrapper:hover {
            transform: translateY(-5px) rotate(-1deg);
        }

        .book-cover {
            width: 100%;
            height: 520px;
            object-fit: cover;
            display: block;
        }

        /* ---------- BOOK INFO ---------- */
        .category-badge {
            display: inline-block;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
        }

        .book-title {
            font-weight: 800;
            font-size: 2.25rem;
            color: var(--dark);
            letter-spacing: -0.5px;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .book-author {
            font-size: 1.05rem;
            color: var(--muted);
            margin-bottom: 1.25rem;
        }

        .book-author strong {
            color: var(--dark);
            font-weight: 700;
        }

        .book-author i {
            color: var(--primary);
            margin-right: 6px;
        }

        /* ---------- PRICE ---------- */
        .price-box {
            background: linear-gradient(135deg, #f8f9ff, #eef2ff);
            border-radius: 16px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .price-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 600;
            margin-bottom: 4px;
        }

        .price-value {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        /* ---------- DESCRIPTION ---------- */
        .description-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .book-description {
            color: #4b5563;
            line-height: 1.8;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        /* ---------- FEATURES ---------- */
        .feature-list {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin: 1.5rem 0;
            padding: 1.25rem;
            background: #fafbff;
            border-radius: 12px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: var(--muted);
            font-weight: 500;
        }

        .feature-item i {
            color: #10b981;
            font-size: 1rem;
        }

        /* ---------- BUTTONS ---------- */
        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn-add-cart {
            flex: 1;
            min-width: 200px;
            padding: 16px 32px;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50px;
            border: none;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
        }

        .btn-add-cart:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .btn-login-cart {
            flex: 1;
            min-width: 200px;
            padding: 16px 32px;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50px;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(0, 123, 255, 0.3);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-login-cart:hover {
            background: linear-gradient(135deg, #0056b3, #4c0fb8);
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(0, 123, 255, 0.4);
            color: white;
        }

        .btn-back {
            padding: 16px 32px;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 50px;
            border: 2px solid #e5e7eb;
            background: white;
            color: var(--muted);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-back:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* ---------- SIMILAR BOOKS ---------- */
        .similar-section {
            margin-top: 4rem;
        }

        .similar-title {
            font-weight: 800;
            font-size: 1.75rem;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }

        .similar-title i {
            color: var(--primary);
            margin-right: 0.5rem;
        }

        .mini-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .mini-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0, 123, 255, 0.15);
            color: inherit;
        }

        .mini-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .mini-card:hover img {
            transform: scale(1.08);
        }

        .mini-card-body {
            padding: 1rem;
        }

        .mini-card-title {
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .mini-card-price {
            color: var(--primary);
            font-weight: 700;
            font-size: 0.9rem;
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
        @media (max-width: 991px) {
            .book-cover-wrapper {
                position: static;
            }
            .book-cover {
                height: 400px;
            }
            .book-title {
                font-size: 1.75rem;
            }
            .price-value {
                font-size: 2rem;
            }
            .book-detail-card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .action-buttons {
                flex-direction: column;
            }
            .btn-add-cart, .btn-login-cart, .btn-back {
                width: 100%;
            }
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

    <!-- ✅ Container -->
    <div class="container">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door me-1"></i>Home</a></li>
                <li class="breadcrumb-item"><a href="/books">Books</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.ind') }}">{{ $book->category->name ?? 'Category' }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($book->title, 40) }}</li>
            </ol>
        </nav>

        <!-- Alerts -->
        @if (session('success'))
            <div class="alert alert-success animate__animated animate__fadeInDown mt-3">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger animate__animated animate__fadeInDown mt-3">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            </div>
        @endif

        <!-- ✅ Book Detail -->
        <div class="book-detail-card animate__animated animate__fadeInUp">
            <div class="row g-4">

                <!-- Image -->
                <div class="col-lg-5">
                    <div class="book-cover-wrapper">
                        <img src="{{ $book->thumbnail ?? 'https://via.placeholder.com/500x600' }}"
                             alt="{{ $book->title }}"
                             class="book-cover">
                    </div>
                </div>

                <!-- Info -->
                <div class="col-lg-7">
                    @if ($book->category)
                        <span class="category-badge">
                            <i class="bi bi-tag-fill me-1"></i>{{ $book->category->name }}
                        </span>
                    @endif

                    <h1 class="book-title">{{ $book->title }}</h1>

                    <p class="book-author">
                        <i class="bi bi-person-fill"></i>
                        by <strong>{{ $book->author ?? 'Unknown author' }}</strong>
                    </p>

                    <!-- Price -->
                    <div class="price-box">
                        <div class="price-label">Price</div>
                        @php($promotion = $book->activePromotion())
                        @if ($promotion)
                            <span class="badge bg-danger mb-2">{{ $promotion->name }} · {{ $promotion->discount_label }}</span>
                            <div class="price-value">${{ number_format($book->final_price, 2) }}</div>
                            <div class="text-muted mt-2">
                                <span class="text-decoration-line-through">${{ number_format($book->price, 2) }}</span>
                                <span class="text-success ms-2">You save ${{ number_format($book->savings(), 2) }}</span>
                            </div>
                        @else
                            <div class="price-value">${{ number_format($book->price, 2) }}</div>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="description-title">
                        <i class="bi bi-file-text me-1"></i> Description
                    </div>
                    <p class="book-description">{{ $book->description }}</p>

                    <!-- Features -->
                    <div class="feature-list">
                        <div class="feature-item">
                            <i class="bi bi-truck"></i>
                            <span>Fast shipping 2–3 days</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-shield-check"></i>
                            <span>Quality guaranteed</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-arrow-repeat"></i>
                            <span>Easy returns</span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="action-buttons">
                        @auth
                            @if (Auth::user()->role === 'user')
                                <form action="{{ route('cart.add', $book->id) }}" method="POST" class="flex-fill d-flex m-0">
                                    @csrf
                                    <button class="btn-add-cart w-100">
                                        <i class="bi bi-cart-plus me-2"></i> Add to Cart
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn-login-cart">
                                <i class="bi bi-lock me-2"></i> Login to Add to Cart
                            </a>
                        @endauth

                        <a href="/books" class="btn-back">
                            <i class="bi bi-arrow-left me-1"></i> Back to Books
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ✅ Similar Books -->
        @if (isset($similarBooks) && $similarBooks->count() > 0)
            <div class="similar-section animate__animated animate__fadeInUp">
                <h3 class="similar-title">
                    <i class="bi bi-bookmark-star"></i> You may also like
                </h3>
                <div class="row g-4">
                    @foreach ($similarBooks as $similar)
                        <div class="col-md-4 col-lg-3">
                            <a href="{{ route('books.show', $similar->id) }}" class="mini-card">
                                <img src="{{ $similar->thumbnail ?? 'https://via.placeholder.com/300x200' }}"
                                     alt="{{ $similar->title }}">
                                <div class="mini-card-body">
                                    <div class="mini-card-title">{{ $similar->title }}</div>
                                    <div class="mini-card-price">${{ number_format($similar->price, 2) }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Bottom spacer -->
        <div style="height: 60px;"></div>
    </div>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
