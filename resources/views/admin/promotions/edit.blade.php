@extends('layouts.admin')

@section('page-title', 'Modifier promotion')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-pencil-square"></i> Modifier la promotion</h2>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Retour
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.promotions.update', $promotion) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $promotion->name) }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Livre concerné</label>
                <select name="book_id" class="form-select" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}"
                            {{ old('book_id', $promotion->book_id) == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} — {{ number_format($book->price, 2) }} $
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Type de réduction</label>
                    <select name="discount_type" id="discount_type" class="form-select" required>
                        <option value="percentage" {{ old('discount_type', $promotion->discount_type) === 'percentage' ? 'selected' : '' }}>Pourcentage (%)</option>
                        <option value="fixed" {{ old('discount_type', $promotion->discount_type) === 'fixed' ? 'selected' : '' }}>Prix fixe ($)</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Valeur</label>
                    <div class="input-group">
                        <input type="number" step="0.01" min="0.01" name="discount_value"
                               class="form-control @error('discount_value') is-invalid @enderror"
                               value="{{ old('discount_value', $promotion->discount_value) }}" required>
                        <span class="input-group-text" id="discount_suffix">
                            {{ $promotion->discount_type === 'percentage' ? '%' : '$' }}
                        </span>
                    </div>
                    @error('discount_value') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date de début</label>
                    <input type="datetime-local" name="starts_at" class="form-control"
                           value="{{ old('starts_at', $promotion->starts_at->format('Y-m-d\TH:i')) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date de fin</label>
                    <input type="datetime-local" name="ends_at" class="form-control"
                           value="{{ old('ends_at', $promotion->ends_at->format('Y-m-d\TH:i')) }}" required>
                </div>
            </div>

            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                       {{ old('is_active', $promotion->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i> Mettre à jour
            </button>
        </form>
    </div>

    <script>
        document.getElementById('discount_type').addEventListener('change', function () {
            document.getElementById('discount_suffix').textContent = this.value === 'percentage' ? '%' : '$';
        });
    </script>
@endsection
