@extends('layouts.admin')

@section('page-title', 'Edit Book')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-pencil-square"></i> Edit Book</h2>
        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Books
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $book->title) }}" required>
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author"
                        value="{{ old('author', $book->author) }}" required>
                    @error('author') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="{{ old('price', $book->price) }}" step="0.01" required>
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $book->description) }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                @if ($book->thumbnail)
                    <div class="mt-3 d-flex align-items-center gap-3">
                        <img src="{{ $book->thumbnail }}" alt="Thumbnail"
                             class="rounded shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                        <span class="text-muted small">Current thumbnail</span>
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <div class="form-check form-switch">
                    <input type="hidden" name="featured" value="0">
                    <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1"
                        {{ old('featured', $book->featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="featured">
                        <i class="bi bi-star-fill text-warning me-1"></i> Mark as Featured
                    </label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i> Update Book
                </button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
