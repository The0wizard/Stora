@extends('layouts.app')

@section('content')
    {{-- ✅ Hero --}}
    <section class="orders-hero">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">
                <i class="bi bi-receipt-cutoff me-2"></i> My Orders
            </h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s">
                Track and review all your past orders in one place
            </p>
        </div>
    </section>

    <div class="container py-5">

        @if (session('success'))
            <div class="alert alert-success animate__animated animate__fadeInDown">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        @forelse ($orders as $order)
            @php
                $statusClass = match($order->status) {
                    'completed' => 'success',
                    'canceled'  => 'danger',
                    default     => 'warning',
                };
                $statusIcon = match($order->status) {
                    'completed' => 'check-circle-fill',
                    'canceled'  => 'x-circle-fill',
                    default     => 'clock-fill',
                };
            @endphp

            <div class="order-card animate__animated animate__fadeInUp"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">

                {{-- Header avec numéro + badge --}}
                <div class="order-card-header">
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <div class="order-icon">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <div>
                            <div class="order-number">Order #{{ $order->id }}</div>
                            <div class="order-date">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ $order->created_at->format('M j, Y · g:i A') }}
                            </div>
                        </div>
                    </div>
                    <span class="status-badge bg-{{ $statusClass }}">
                        <i class="bi bi-{{ $statusIcon }} me-1"></i>
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                {{-- Body --}}
                <div class="order-card-body">
                    <div class="row g-4">
                        {{-- Total --}}
                        <div class="col-md-4">
                            <div class="info-block">
                                <span class="info-label">Total Amount</span>
                                <span class="info-value total">
                                    ${{ number_format($order->total_price, 2) }}
                                </span>
                            </div>
                        </div>

                        {{-- Adresse --}}
                        <div class="col-md-5">
                            <div class="info-block">
                                <span class="info-label">
                                    <i class="bi bi-geo-alt me-1"></i> Shipping to
                                </span>
                                <span class="info-value address">{{ $order->address }}</span>
                            </div>
                        </div>

                        {{-- Action --}}
                        <div class="col-md-3 d-flex align-items-center justify-content-md-end">
                            <a href="{{ route('orders.show', $order) }}" class="btn-view-order">
                                View Details <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-orders animate__animated animate__fadeIn">
                <i class="bi bi-bag-x"></i>
                <h3>No orders yet</h3>
                <p class="text-muted">
                    You haven't placed any orders yet. Start exploring our collection!
                </p>
                <a href="/books" class="btn-shop">
                    <i class="bi bi-book me-1"></i> Browse Books
                </a>
            </div>
        @endforelse

        {{-- Pagination --}}
        @if (method_exists($orders, 'links') && $orders->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
        }

        /* ---------- HERO ---------- */
        .orders-hero {
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

        .orders-hero::before,
        .orders-hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .orders-hero::before {
            width: 350px;
            height: 350px;
            top: -130px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        .orders-hero::after {
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

        .orders-hero h1 {
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
            margin: 0;
        }

        .orders-hero p {
            opacity: 0.95;
            position: relative;
            z-index: 2;
            margin-top: 8px;
            margin-bottom: 0;
        }

        /* ---------- ORDER CARD ---------- */
        .order-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .order-card:hover {
            box-shadow: 0 12px 35px rgba(0, 123, 255, 0.12);
            border-color: rgba(0, 123, 255, 0.1);
            transform: translateY(-3px);
        }

        .order-card-header {
            padding: 1.5rem 1.75rem;
            background: linear-gradient(135deg, #f8f9ff, #eef2ff);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .order-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.35rem;
            box-shadow: 0 6px 18px rgba(0, 123, 255, 0.3);
        }

        .order-number {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 2px;
        }

        .order-date {
            font-size: 0.8rem;
            color: var(--muted);
        }

        .status-badge {
            padding: 8px 18px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .status-badge.bg-success { background: linear-gradient(135deg, #10b981, #059669) !important; }
        .status-badge.bg-warning { background: linear-gradient(135deg, #f59e0b, #d97706) !important; color: white; }
        .status-badge.bg-danger  { background: linear-gradient(135deg, #ef4444, #dc2626) !important; }

        /* ---------- BODY ---------- */
        .order-card-body {
            padding: 1.5rem 1.75rem;
        }

        .info-block {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 700;
        }

        .info-value {
            font-size: 0.95rem;
            color: var(--dark);
            font-weight: 600;
            line-height: 1.4;
        }

        .info-value.total {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
        }

        .info-value.address {
            font-weight: 500;
            font-size: 0.9rem;
            color: #4b5563;
        }

        /* ---------- BUTTON ---------- */
        .btn-view-order {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 22px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.88rem;
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-view-order:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.3);
        }

        /* ---------- EMPTY STATE ---------- */
        .empty-orders {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .empty-orders i {
            font-size: 5rem;
            color: #cbd5e1;
            margin-bottom: 1rem;
            display: block;
        }

        .empty-orders h3 {
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
            background: #ecfdf5;
            color: #065f46;
            border-left-color: #10b981;
        }

        /* ---------- PAGINATION ---------- */
        .pagination {
            gap: 6px;
        }

        .pagination .page-link {
            border: none;
            border-radius: 10px !important;
            color: var(--muted);
            font-weight: 600;
            padding: 10px 16px;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: #eef2ff;
            color: var(--primary);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        @media (max-width: 768px) {
            .orders-hero h1 { font-size: 1.9rem; }
            .order-card-header { padding: 1.25rem; }
            .order-card-body { padding: 1.25rem; }
            .btn-view-order { width: 100%; justify-content: center; }
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
@endsection
