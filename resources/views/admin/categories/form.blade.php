@extends('layouts.admin')

@section('page-title', isset($category) ? 'Edit Category' : 'Add Category')

@section('content')
    <div class="page-header">
        <h2 class="page-title">
            <i class="bi bi-{{ isset($category) ? 'pencil-square' : 'plus-circle' }}"></i>
            {{ isset($category) ? 'Edit' : 'Add' }} Category
        </h2>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="content-card">
        <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"
              method="POST">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control"
                       value="{{ old('name', $category->name ?? '') }}"
                       placeholder="e.g. Science Fiction" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ isset($category) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
