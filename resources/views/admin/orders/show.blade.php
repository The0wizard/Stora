@extends('layouts.admin')

@section('page-title', 'Order Details')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-receipt"></i> Order #{{ $order->id }}</h2>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Orders
        </a>
    </div>

    <div class="row g-4">
        <div class="col-md-5">
            <div class="content-card">
                <h6 class="fw-bold mb-3"><i class="bi bi-person-circle text-primary me-2"></i> Customer</h6>
                <p class="mb-1"><strong>{{ $order->user->name }}</strong></p>
                <p class="text-muted small mb-0">{{ $order->user->email ?? '' }}</p>

                <hr class="my-3">

                <h6 class="fw-bold mb-3"><i class="bi bi-geo-alt text-primary me-2"></i> Shipping Address</h6>
                <p class="mb-0">{{ $order->address }}</p>

                <hr class="my-3">

                <h6 class="fw-bold mb-3"><i class="bi bi-info-circle text-primary me-2"></i> Status</h6>
                <span class="badge bg-{{ $order->status === 'completed' ? 'success' : ($order->status === 'canceled' ? 'danger' : 'warning') }} fs-6">
                    {{ ucfirst($order->status) }}
                </span>

                <hr class="my-3">

                <h6 class="fw-bold mb-3"><i class="bi bi-cash-coin text-primary me-2"></i> Total</h6>
                <h4 class="text-primary mb-0">${{ number_format($order->total_price, 2) }}</h4>
            </div>
        </div>

        <div class="col-md-7">
            <div class="content-card">
                <h6 class="fw-bold mb-3"><i class="bi bi-bag-check text-primary me-2"></i> Order Items</h6>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->book->title }}</td>
                                    <td><span class="badge bg-secondary">x{{ $item->quantity }}</span></td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td class="text-end fw-bold">
                                        ${{ number_format($item->price * $item->quantity, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
