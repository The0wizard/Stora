<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout — Stora</title>

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

        /* ---------- HEADER ---------- */
        .checkout-header {
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

        .checkout-header::before,
        .checkout-header::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .checkout-header::before {
            width: 350px;
            height: 350px;
            top: -130px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .checkout-header::after {
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

        .checkout-header h1 {
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
            margin: 0;
        }

        .checkout-header p {
            opacity: 0.95;
            position: relative;
            z-index: 2;
            margin-top: 8px;
            margin-bottom: 0;
        }

        /* ---------- CARDS ---------- */
        .summary-card,
        .shipping-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            margin-bottom: 1.5rem;
        }

        .card-section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-section-title i {
            color: var(--primary);
        }

        /* ---------- ORDER ITEM ---------- */
        .order-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .order-item:last-of-type {
            border-bottom: none;
        }

        .order-item img {
            width: 60px;
            height: 85px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .order-item-title {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .order-item-desc {
            font-size: 0.8rem;
            color: var(--muted);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .order-item-price {
            font-size: 0.9rem;
            color: var(--dark);
        }

        .order-item-price .old {
            text-decoration: line-through;
            color: #9ca3af;
            font-size: 0.8rem;
            margin-left: 6px;
        }

        .order-item-price .new {
            color: #10b981;
            font-weight: 700;
        }

        .order-item-total {
            text-align: right;
            font-weight: 800;
            color: var(--dark);
            font-size: 1rem;
        }

        .promo-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 0.68rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        /* ---------- TOTAL ROW ---------- */
        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.25rem;
            margin-top: 1rem;
            border-top: 2px dashed #e5e7eb;
        }

        .total-row-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 700;
        }

        .total-amount {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        /* ---------- SHIPPING FORM ---------- */
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            resize: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.12);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .char-counter {
            font-size: 0.75rem;
            color: var(--muted);
            text-align: right;
            margin-top: 4px;
        }

        .char-counter.valid {
            color: #10b981;
            font-weight: 600;
        }

        /* ---------- CONFIRM BUTTON ---------- */
        .btn-confirm {
            border-radius: 50px;
            padding: 16px 36px;
            font-weight: 700;
            font-size: 1rem;
            border: none;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
            transition: all 0.3s ease;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-confirm:hover:not(:disabled) {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .btn-confirm:disabled {
            background: #cbd5e1;
            box-shadow: none;
            cursor: not-allowed;
            color: #6b7280;
        }

        .btn-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            transition: color 0.2s;
        }

        .btn-back-link:hover {
            color: var(--primary);
        }

        /* ---------- TRUST BADGES ---------- */
        .trust-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f1f5f9;
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            color: var(--muted);
            font-weight: 500;
        }

        .trust-item i {
            color: #10b981;
            font-size: 1rem;
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
            .checkout-header h1 { font-size: 1.9rem; }
            .summary-card, .shipping-card { padding: 1.5rem; }
            .total-amount { font-size: 1.5rem; }
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
                            <a class="nav-link" href="{{ route('profile.edi') }}">
                                <i class="bi bi-person-circle me-1"></i> Profile
                            </a>
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

    <!-- ✅ Header -->
    <section class="checkout-header">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">
                <i class="bi bi-bag-check me-2"></i> Checkout
            </h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s">
                Almost there! Confirm your order to complete your purchase.
            </p>
        </div>
    </section>

    <!-- ✅ Checkout -->
    <div class="container my-5">

        <a href="{{ route('cart.index') }}" class="btn-back-link">
            <i class="bi bi-arrow-left"></i> Back to cart
        </a>

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

        <div class="row g-4">

            <!-- ✅ Order Summary -->
            <div class="col-lg-7">
                <div class="summary-card animate__animated animate__fadeInUp">
                    <h5 class="card-section-title">
                        <i class="bi bi-bag-check"></i> Order Summary
                    </h5>

                    @foreach ($cartItems as $cartItem)
                        @php
                            $book = $cartItem->book;
                            $promotion = $book->activePromotion();
                        @endphp
                        <div class="order-item">
                            <img src="{{ $book->thumbnail ?? 'https://via.placeholder.com/60x85' }}"
                                 alt="{{ $book->title }}">

                            <div class="flex-grow-1">
                                <div class="order-item-title">{{ $book->title }}</div>
                                <div class="order-item-desc">{{ Str::limit($book->description, 80) }}</div>

                                @if ($promotion)
                                    <div class="promo-tag">
                                        <i class="bi bi-tag-fill"></i> {{ $promotion->discount_label }}
                                    </div>
                                @endif

                                <div class="order-item-price">
                                    @if ($promotion)
                                        <span class="new">${{ number_format($book->final_price, 2) }}</span>
                                        <span class="old">${{ number_format($book->price, 2) }}</span>
                                    @else
                                        ${{ number_format($book->price, 2) }}
                                    @endif
                                    <span class="text-muted"> × {{ $cartItem->quantity }}</span>
                                </div>
                            </div>

                            <div class="order-item-total">
                                ${{ number_format($book->final_price * $cartItem->quantity, 2) }}
                            </div>
                        </div>
                    @endforeach

                    <div class="total-row">
                        <span class="total-row-label">Total</span>
                        <span class="total-amount">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- ✅ Shipping Form -->
            <div class="col-lg-5">
                <div class="shipping-card animate__animated animate__fadeInUp animate__delay-1s">
                    <h5 class="card-section-title">
                        <i class="bi bi-geo-alt"></i> Shipping Address
                    </h5>

                    <form action="{{ route('cart.confirm') }}" method="POST" id="checkoutForm">
                        @csrf

                        <div class="mb-3">
                            <label for="address" class="form-label">Enter your shipping address</label>
                            <textarea id="address" name="address" class="form-control" rows="4"
                                      placeholder="House number, street, city, postal code..."
                                      required>{{ old('address') }}</textarea>
                            <div class="char-counter" id="charCounter">0 / 10 characters minimum</div>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn-confirm" id="confirmBtn" disabled>
                            <i class="bi bi-shield-lock"></i> Confirm and Pay
                        </button>

                        <div class="trust-badges">
                            <div class="trust-item">
                                <i class="bi bi-truck"></i> Fast delivery
                            </div>
                            <div class="trust-item">
                                <i class="bi bi-shield-check"></i> Secure payment
                            </div>
                            <div class="trust-item">
                                <i class="bi bi-arrow-repeat"></i> Easy returns
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div style="height: 40px;"></div>

    <!-- ✅ JS : Validation en temps réel -->
    <script>
        const addressInput = document.getElementById('address');
        const submitButton = document.getElementById('confirmBtn');
        const charCounter  = document.getElementById('charCounter');

        function validate() {
            const len = addressInput.value.trim().length;
            const isValid = len >= 10;

            submitButton.disabled = !isValid;

            charCounter.textContent = isValid
                ? `${len} characters ✓`
                : `${len} / 10 characters minimum`;

            charCounter.classList.toggle('valid', isValid);
        }

        addressInput.addEventListener('input', validate);

        // Initial check (si l'utilisateur revient avec old('address'))
        validate();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
