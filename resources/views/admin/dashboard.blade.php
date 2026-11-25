@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-speedometer2"></i> Dashboard</h2>
    </div>

    <div class="content-card text-center py-5 animate__animated animate__fadeIn">
        <div style="font-size: 4rem;">👋</div>
        <h3 class="fw-bold mt-3">Welcome to Admin Dashboard</h3>
        <p class="text-muted">You are logged in as <strong>admin</strong>.</p>

        <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
            <a href="{{ route('admin.books.index') }}" class="btn btn-primary">
                <i class="bi bi-book me-1"></i> Manage Books
            </a>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-info">
                <i class="bi bi-receipt me-1"></i> View Orders
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-success">
                <i class="bi bi-people me-1"></i> Users
            </a>
        </div>
    </div>
@endsection
