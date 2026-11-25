@extends('layouts.admin')

@section('page-title', 'Featured Books')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-star-fill text-warning"></i> Featured Books</h2>
        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Books
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success animate__animated animate__fadeInDown">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    @if ($books->count() > 0)
        <div class="row g-4">
            @foreach ($books as $book)
                <div class="col-md-4 col-lg-3">
                    <div class="content-card h-100 p-3">
                        <img src="{{ $book->thumbnail ?? 'https://via.placeholder.com/350x220' }}"
                             class="img-fluid rounded mb-3" style="height: 200px; width: 100%; object-fit: cover;"
                             alt="{{ $book->title }}">
                        <h6 class="fw-bold mb-1">{{ $book->title }}</h6>
                        <p class="text-muted small mb-3"><i class="bi bi-person me-1"></i>{{ $book->author }}</p>
                        <form method="POST" action="{{ route('admin.books.removeFeatured', $book->id) }}">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-warning btn-sm w-100">
                                <i class="bi bi-star me-1"></i> Remove from Featured
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="content-card text-center py-5">
            <i class="bi bi-star fs-1 text-muted d-block mb-3"></i>
            <h5 class="text-muted">No featured books yet</h5>
            <p class="text-muted">Mark a book as "Featured" when creating or editing it.</p>
        </div>
    @endif
@endsection
