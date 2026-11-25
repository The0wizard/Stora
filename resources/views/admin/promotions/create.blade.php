@extends('layouts.admin')

@section('page-title', 'Nouvelle promotion')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-plus-circle"></i> Nouvelle promotion</h2>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Retour
        </a>
    </div>

    <div class="content-card">
        <form action="{{ route('admin.promotions.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nom de la promotion</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" placeholder="ex: Black Friday, Soldes d'été..." required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Livre concerné</label>
                <select name="book_id" class="form-select @error('book_id') is-invalid @enderror" required>
                    <option value="">— Sélectionner un livre —</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} — {{ number_format($book->price, 2) }} $
                        </option>
                    @endforeach
                </select>
                @error('book_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Type de réduction</label>
                    <select name="discount_type" id="discount_type"
                            class="form-select @error('discount_type') is-invalid @enderror" required>
                        <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>
                            Pourcentage (%)
                        </option>
                        <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>
                            Prix fixe ($)
                        </option>
                    </select>
                    @error('discount_type') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Valeur de la réduction</label>
                    <div class="input-group">
                        <input type="number" step="0.01" min="0.01" name="discount_value"
                               class="form-control @error('discount_value') is-invalid @enderror"
                               value="{{ old('discount_value') }}" required>
                        <span class="input-group-text" id="discount_suffix">%</span>
                    </div>
                    @error('discount_value') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date de début</label>
                    <input type="datetime-local" name="starts_at" class="form-control @error('starts_at') is-invalid @enderror"
                           value="{{ old('starts_at') }}" required>
                    @error('starts_at') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Date de fin</label>
                    <input type="datetime-local" name="ends_at" class="form-control @error('ends_at') is-invalid @enderror"
                           value="{{ old('ends_at') }}" required>
                    @error('ends_at') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                       {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Activer cette promotion</label>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle me-1"></i> Créer la promotion
            </button>
        </form>
    </div>

    <script>
        // Change le suffixe (%) ou ($) selon le type
        document.getElementById('discount_type').addEventListener('change', function () {
            document.getElementById('discount_suffix').textContent = this.value === 'percentage' ? '%' : '$';
        });
    </script>
@endsection
