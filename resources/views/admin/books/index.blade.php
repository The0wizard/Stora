@extends('layouts.admin')

@section('page-title', 'Manage Books')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-book"></i> Manage Books</h2>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add New Book
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success animate__animated animate__fadeInDown">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th style="width: 70px;">Cover</th>
                    <th>Title & Author</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Featured</th>
                    <th>Description</th>
                    <th class="text-end" style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        {{-- Miniature --}}
                        <td>
                            @if ($book->thumbnail)
                                <img src="{{ $book->thumbnail }}"
                                     alt="{{ $book->title }}"
                                     class="rounded shadow-sm"
                                     style="width: 55px; height: 75px; object-fit: cover;">
                            @else
                                <div class="rounded bg-light d-flex align-items-center justify-content-center"
                                     style="width: 55px; height: 75px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>

                        {{-- Titre + Auteur --}}
                        <td>
                            <strong class="d-block">{{ $book->title }}</strong>
                            <small class="text-muted">
                                <i class="bi bi-person me-1"></i>{{ $book->author }}
                            </small>
                        </td>

                        {{-- Catégorie --}}
                        <td>
                            @if ($book->category)
                                <span class="badge bg-secondary">
                                    <i class="bi bi-tag me-1"></i>{{ $book->category->name }}
                                </span>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>

                        {{-- Prix --}}
                        <td>
                            @php($promotion = $book->activePromotion())
                            @if ($promotion)
                                <span class="badge bg-danger mb-1">
                                    {{ $promotion->name }} · {{ $promotion->discount_label }}
                                </span>
                                <br>
                                <del class="text-muted">${{ number_format($book->price, 2) }}</del>
                                <span class="badge bg-success fs-6">
                                    ${{ number_format($book->final_price, 2) }}
                                </span>
                            @else
                                <span class="badge bg-primary fs-6">
                                    ${{ number_format($book->price, 2) }}
                                </span>
                            @endif
                        </td>

                        {{-- Featured --}}
                        <td>
                            @if ($book->featured)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-star-fill me-1"></i> Featured
                                </span>
                            @else
                                <span class="badge bg-light text-muted border">
                                    <i class="bi bi-star me-1"></i> Normal
                                </span>
                            @endif
                        </td>

                        {{-- Description tronquée --}}
                        <td style="max-width: 260px;">
                            <small class="text-muted d-block text-truncate"
                                   title="{{ $book->description }}">
                                {{ $book->description }}
                            </small>
                        </td>

                        {{-- Actions --}}
                        <td class="text-end">
                            <a href="{{ route('books.show', $book->id) }}"
                               class="btn btn-info btn-sm" title="View on site">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.books.edit', $book->id) }}"
                               class="btn btn-warning btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this book?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-5">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            <strong>No books found.</strong>
                            <p class="mb-0 small">Add your first book to get started.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
