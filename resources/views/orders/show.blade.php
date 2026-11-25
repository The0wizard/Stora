@extends('layouts.app')

@section('content')
    {{-- ✅ Hero --}}
    <section class="order-detail-hero">
        <div class="container">
            <div class="animate__animated animate__fadeInDown">
                <a href="{{ route('orders.index') }}" class="back-link">
                    <i class="bi bi-arrow-left me-1"></i> Back to Orders
                </a>
                <h1>
                    <i class="bi bi-receipt me-2"></i> Order #{{ $order->id }}
                </h1>
                <p>
                    <i class="bi bi-calendar-event me-1"></i>
                    Placed on {{ $order->created_at->format('F j, Y · g:i A') }}
                </p>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row g-4">

            {{-- ✅ Order Summary --}}
            <div class="col-lg-5">
                <div class="summary-card animate__animated animate__fadeInUp">
                    <h5 class="card-title">
                        <i class="bi bi-clipboard-check"></i> Order Summary
                    </h5>

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

                    <div class="status-row">
                        <span class="status-label">Status</span>
                        <span class="status-badge-detail bg-{{ $statusClass }}">
                            <i class="bi bi-{{ $statusIcon }} me-1"></i>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="summary-divider"></div>

                    <div class="summary-info">
                        <span class="summary-label">
                            <i class="bi bi-geo-alt me-1"></i> Shipping Address
                        </span>
                        <p class="summary-address">{{ $order->address }}</p>
                    </div>

                    <div class="summary-divider"></div>

                    <div class="summary-total">
                        <span class="summary-label">Total Amount</span>
                        <span class="total-value">${{ number_format($order->total_price, 2) }}</span>
                    </div>
                </div>
            </div>

            {{-- ✅ Items --}}
            <div class="col-lg-7">
                <div class="items-card animate__animated animate__fadeInUp animate__delay-1s">
                    <h5 class="card-title">
                        <i class="bi bi-bag-check"></i> Items Ordered
                        <span class="items-count">{{ $order->orderItems->count() }}</span>
                    </h5>

                    @foreach ($order->orderItems as $item)
                        <div class="item-row">
                            <img src="{{ $item->book->thumbnail ?? 'https://via.placeholder.com/60x85' }}"
                                 alt="{{ $item->book->title }}"
                                 class="item-thumb">

                            <div class="item-info">
                                <div class="item-title">{{ $item->book->title }}</div>
                                <div class="item-meta">
                                    <i class="bi bi-person me-1"></i>{{ $item->book->author ?? 'Unknown' }}
                                </div>
                                <div class="item-meta">
                                    <span class="item-price">${{ number_format($item->price, 2) }}</span>
                                    <span class="item-qty">× {{ $item->quantity }}</span>
                                </div>
                            </div>

                            <div class="item-subtotal">
                                ${{ number_format($item->price * $item->quantity, 2) }}
                            </div>
                        </div>
                    @endforeach

                    <div class="items-total-row">
                        <span>Grand Total</span>
                        <span class="grand-total">${{ number_format($order->total_price, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
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
        .order-detail-hero {
            background: linear-gradient(135deg, #007bff 0%, #6610f2 50%, #a855f7 100%);
            background-size: 200% 200%;
            animation: heroGradient 12s ease infinite;
            color: white;
            padding: 50px 0 70px;
            position: relative;
            overflow: hidden;
        }

        @keyframes heroGradient {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        .order-detail-hero::before,
        .order-detail-hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .order-detail-hero::before {
            width: 320px;
            height: 320px;
            top: -120px;
            left: -90px;
        }

        .order-detail-hero::after {
            width: 240px;
            height: 240px;
            bottom: -90px;
            right: -70px;
        }

        .back-link {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            margin-bottom: 1rem;
            transition: color 0.2s;
            position: relative;
            z-index: 2;
        }

        .back-link:hover {
            color: white;
        }

        .order-detail-hero h1 {
            font-weight: 800;
            font-size: 2.25rem;
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
            margin: 0;
        }

        .order-detail-hero p {
            opacity: 0.95;
            position: relative;
            z-index: 2;
            margin-top: 8px;
            margin-bottom: 0;
            font-size: 0.95rem;
        }

        /* ---------- CARDS ---------- */
        .summary-card,
        .items-card {
            background: white;
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            height: 100%;
        }

        .card-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-title i {
            color: var(--primary);
        }

        .items-count {
            margin-left: auto;
            background: #eef2ff;
            color: var(--primary);
            padding: 2px 12px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        /* ---------- STATUS ---------- */
        .status-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .status-label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 700;
        }

        .status-badge-detail {
            display: inline-flex;
            align-items: center;
            padding: 8px 18px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .status-badge-detail.bg-success { background: linear-gradient(135deg, #10b981, #059669); }
        .status-badge-detail.bg-warning { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .status-badge-detail.bg-danger  { background: linear-gradient(135deg, #ef4444, #dc2626); }

        .summary-divider {
            height: 1px;
            background: #f1f5f9;
            margin: 1.25rem 0;
        }

        /* ---------- SUMMARY INFO ---------- */
        .summary-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .summary-label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            font-weight: 700;
        }

        .summary-address {
            font-size: 0.95rem;
            color: var(--dark);
            line-height: 1.5;
            margin: 0;
            font-weight: 500;
        }

        /* ---------- TOTAL ---------- */
        .summary-total {
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: center;
            padding: 1rem;
            background: linear-gradient(135deg, #f8f9ff, #eef2ff);
            border-radius: 12px;
        }

        .total-value {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
        }

        /* ---------- ITEMS ---------- */
        .item-row {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .item-row:last-of-type {
            border-bottom: none;
        }

        .item-thumb {
            width: 60px;
            height: 85px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            flex-shrink: 0;
        }

        .item-info {
            flex: 1;
            min-width: 0;
        }

        .item-title {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--dark);
            margin-bottom: 3px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .item-meta {
            font-size: 0.8rem;
            color: var(--muted);
            margin-bottom: 2px;
        }

        .item-price {
            font-weight: 700;
            color: var(--dark);
        }

        .item-qty {
            margin-left: 6px;
            padding: 2px 8px;
            background: #eef2ff;
            color: var(--primary);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .item-subtotal {
            font-weight: 800;
            font-size: 1.05rem;
            color: var(--dark);
            white-space: nowrap;
        }

        /* ---------- TOTAL ROW ---------- */
        .items-total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.25rem;
            margin-top: 0.75rem;
            border-top: 2px dashed #e5e7eb;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .grand-total {
            font-size: 1.75rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-transform: none;
            letter-spacing: normal;
        }

        @media (max-width: 768px) {
            .order-detail-hero h1 { font-size: 1.75rem; }
            .summary-card, .items-card { padding: 1.25rem; }
            .item-subtotal { font-size: 0.95rem; }
            .grand-total { font-size: 1.35rem; }
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
@endsection
