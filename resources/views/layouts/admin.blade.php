<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — Stora</title>

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
            --sidebar-w: 260px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark);
            margin: 0;
        }

        /* ---------- SIDEBAR ---------- */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            color: #cbd5e1;
            padding: 1.5rem 0;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .admin-sidebar .brand {
            font-family: 'Pacifico', cursive;
            font-size: 1.75rem;
            color: white;
            padding: 0 1.5rem 1.5rem;
            display: block;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }

        .admin-sidebar .nav-link {
            color: #cbd5e1;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.25s ease;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background: rgba(0, 123, 255, 0.15);
            color: white;
            border-left-color: var(--primary);
        }

        .admin-sidebar .nav-link i {
            font-size: 1.1rem;
        }

        .admin-sidebar .nav-section {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            padding: 1.25rem 1.5rem 0.5rem;
            font-weight: 700;
        }

        /* ---------- MAIN CONTENT ---------- */
        .admin-main {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-topbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-topbar h5 {
            margin: 0;
            font-weight: 700;
            color: var(--dark);
        }

        .admin-content {
            flex: 1;
            padding: 2rem;
        }

        /* ---------- PAGE HEADER ---------- */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.75rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-weight: 800;
            font-size: 1.75rem;
            color: var(--dark);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .page-title i {
            color: var(--primary);
            margin-right: 0.5rem;
        }

        /* ---------- CARDS ---------- */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            border: none;
        }

        /* ---------- BUTTONS ---------- */
        .btn {
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.55rem 1.25rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #4c0fb8);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.35);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.35);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: white;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #d97706, #b45309);
            color: white;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
        }

        .btn-info {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            border: none;
            color: white;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #0891b2, #0e7490);
            color: white;
        }

        /* ---------- TABLES ---------- */
        .table {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, #f8f9ff, #eef2ff);
        }

        .table thead th {
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--muted);
            border: none;
            padding: 1rem 1.25rem;
        }

        .table tbody td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            border-color: #f1f5f9;
            font-size: 0.9rem;
        }

        .table tbody tr {
            transition: background 0.2s ease;
        }

        .table tbody tr:hover {
            background: #f8f9ff;
        }

        /* ---------- FORMS ---------- */
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #374151;
            margin-bottom: 0.4rem;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 0.7rem 1rem;
            border: 2px solid #e5e7eb;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.12);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
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

        /* ---------- MOBILE ---------- */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
        }

        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .sidebar-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>

    <!-- ✅ Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <a href="{{ route('home') }}" class="brand">Stora</a>

        <div class="nav-section">Main</div>
        <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
            <i class="bi bi-receipt"></i> Orders
        </a>
        <a class="nav-link {{ request()->routeIs('admin.books.*') ? 'active' : '' }}" href="{{ route('admin.books.index') }}">
            <i class="bi bi-book"></i> Books
        </a>
        <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
            <i class="bi bi-tags"></i> Categories
        </a>
        <a class="nav-link {{ request()->routeIs('admin.promotions.*') ? 'active' : '' }}" href="{{ route('admin.promotions.index') }}">
            <i class="bi bi-percent"></i> Promotions
        </a>
        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <i class="bi bi-people"></i> Users
        </a>
        <a class="nav-link {{ request()->routeIs('admin.books.featured') ? 'active' : '' }}" href="{{ route('admin.books.featured') }}">
            <i class="bi bi-star"></i> Featured
        </a>

        <div class="nav-section">Account</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="nav-link w-100 text-start border-0 bg-transparent">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </aside>

    <!-- ✅ Main -->
    <div class="admin-main">
        <div class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="sidebar-toggle" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
                    <i class="bi bi-list"></i>
                </button>
                <h5>@yield('page-title', 'Admin Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small d-none d-md-inline">
                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
                </span>
            </div>
        </div>

        <div class="admin-content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
