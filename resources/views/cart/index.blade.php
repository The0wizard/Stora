<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart — Stora</title>

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

        /* ---------- PAGE HEADER ---------- */
        .cart-header {
            background: linear-gradient(135deg, #007bff 0%, #6610f2 50%, #a855f7 100%);
            background-size: 200% 200%;
            animation: heroGradient 12s ease infinite;
            color: white;
            padding: 60px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        @keyframes heroGradient {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        .cart-header::before,
        .cart-header::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .cart-header::before {
            width: 350px;
            height: 350px;
            top: -130px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .cart-header::after {
            width: 250px;
            height: 250px;
            bottom: -100px;
            right: -80px;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50%      { transform: translate(30px, -30px) scale(1.1); }
        }

        .cart-header h1 {
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
            margin: 0;
        }

        .cart-header p {
            opacity: 0.95;
            position: relative;
            z-index: 2;
            margin-top: 8px;
            margin-bottom: 0;
        }

        /* ---------- CART ITEM ---------- */
        .cart-item {
            background: white;
            border-radius: 18px;
            padding: 1.5rem;
            margin-bottom: 1.25rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .cart-item:hover {
            box-shadow: 0 10px 30px rgba(0, 123, 255, 0.12);
            border-color: rgba(0, 123, 255, 0.1);
            transform: translateY(-2px);
        }

        .cart-book-title {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .cart-book-desc {
            color: var(--muted);
            font-size: 0.88rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .cart-price-block {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .price-line {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .price-line .label {
            color: var(--muted);
            min-width: 70px;
            font-size: 0.8rem;
        }

        .price-line .value {
            font-weight: 700;
            color: var(--dark);
        }

        .price-line .old-price {
            text-decoration: line-through;
            color: #9ca3af;
            font-size: 0.85rem;
        }

        .price-line .new-price {
            color: #10b981;
            font-weight: 800;
        }

        .promo-badge {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 3px 10px rgba(239, 68, 68, 0.3);
            margin-bottom: 6px;
            width: fit-content;
        }

        .line-total {
            text-align: right;
            font-size: 1.35rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-remove {
            border-radius: 50px;
            padding: 8px 18px;
            font-weight: 600;
            font-size: 0.85rem;
            border: 2px solid #ef4444;
            color: #ef4444;
            background: white;
            transition: all 0.3s ease;
        }

        .btn-remove:hover {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(239, 68, 68, 0.35);
        }

        /* ---------- FOOTER ---------- */
        .cart-footer-card {
            background: white;
            border-radius: 18px;
            padding: 1.75rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .total-block {
            display: flex;
            flex-direction: column;
        }

        .total-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 700;
        }

        .cart-total {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
        }

        .btn-checkout {
            border-radius: 50px;
            padding: 14px 36px;
            font-weight: 700;
            font-size: 1rem;
            border: none;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-checkout:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(16, 185, 129, 0.4);
            color: white;
        }

        /* ---------- EMPTY STATE ---------- */
        .empty-cart {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .empty-cart i {
            font-size: 5rem;
            color: #cbd5e1;
            margin-bottom: 1rem;
            display: block;
        }

        .empty-cart h3 {
            font-weight: 700;
            color: var(--dark);
        }

        .btn-shop {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 1rem;
            padding: 12px 32px;
            border-radius: 50px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
        }

        .btn-shop:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0, 123, 255, 0.4);
            color: white;
        }

        /* ---------- ALERTS ---------- */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-left: 4px solid;
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border-left-color: #10b981;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-left-color: #ef4444;
        }

        @media (max-width: 768px) {
            .cart-header h1 { font-size: 1.9rem; }
            .cart-footer-card { flex-direction: column; align-items: stretch; }
            .btn-checkout { width: 100%; justify-content: center; }
            .line-total { text-align: left; margin-top: 0.75rem; }
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

    <!-- ✅ Header -->
    <section class="cart-header">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">
                <i class="bi bi-cart3 me-2"></i> Your Cart
            </h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s">
                {{ $cartItems->sum('quantity') }} {{ Str::plural('item', $cartItems->sum('quantity')) }} in your cart
            </p>
        </div>
    </section>

    <!-- ✅ Cart -->
    <div class="container my-5">

        @if (session('success'))
            <div class="alert alert-success animate__animated animate__fadeInDown">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger animate__animated animate__fadeInDown">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            </div>
        @endif

        @if ($cartItems->isEmpty())
            <div class="empty-cart animate__animated animate__fadeIn">
                <i class="bi bi-cart-x"></i>
                <h3>Your cart is empty</h3>
                <p class="text-muted">Looks like you haven't added any books yet.</p>
                <a href="/books" class="btn-shop">
                    <i class="bi bi-book"></i> Browse Books
                </a>
            </div>
        @else

            @foreach ($cartItems as $cartItem)
                @php
                    $book = $cartItem->book;
                    $promotion = $book->activePromotion();
                @endphp
                <div class="cart-item animate__animated animate__fadeInUp">
                    <div class="row align-items-center g-4">

                        <!-- Image + Titre + Description -->
                        <div class="col-md-5">
                            <div class="d-flex gap-3 align-items-start">
                                <img src="{{ $book->thumbnail ?? 'https://via.placeholder.com/80x110' }}"
                                     alt="{{ $book->title }}"
                                     class="rounded shadow-sm"
                                     style="width: 70px; height: 100px; object-fit: cover;">
                                <div>
                                    <h4 class="cart-book-title">{{ $book->title }}</h4>
                                    <p class="cart-book-desc">{{ Str::limit($book->description, 100) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Prix / Promo / Quantité -->
                        <div class="col-md-4">
                            <div class="cart-price-block">
                                @if ($promotion)
                                    <div class="promo-badge">
                                        <i class="bi bi-tag-fill"></i> {{ $promotion->name }} · {{ $promotion->discount_label }}
                                    </div>
                                @endif

                                <div class="price-line">
                                    <span class="label">Prix</span>
                                    @if ($promotion)
                                        <span class="new-price">${{ number_format($book->final_price, 2) }}</span>
                                        <span class="old-price">${{ number_format($book->price, 2) }}</span>
                                    @else
                                        <span class="value">${{ number_format($book->price, 2) }}</span>
                                    @endif
                                </div>

                                <div class="price-line">
                                    <span class="label">Quantité</span>
                                    <span class="value">x {{ $cartItem->quantity }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Total ligne + Bouton -->
                        <div class="col-md-3">
                            <div class="line-total">
                                ${{ number_format($book->final_price * $cartItem->quantity, 2) }}
                            </div>
                            <div class="text-end mt-2">
                                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-remove">
                                        <i class="bi bi-trash me-1"></i> Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Footer / Total -->
            <div class="cart-footer-card animate__animated animate__fadeInUp">
                <div class="total-block">
                    <span class="total-label">Total amount</span>
                    <span class="cart-total">
                        ${{ number_format($cartItems->sum(fn($item) => $item->book->final_price * $item->quantity), 2) }}
                    </span>
                </div>
                <a href="{{ route('cart.checkout') }}" class="btn-checkout">
                    Proceed to Checkout <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        @endif
    </div>

    <div style="height: 60px;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
