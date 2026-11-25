@extends('layouts.admin')

@section('page-title', 'Promotions')

@section('content')
    <div class="page-header">
        <h2 class="page-title"><i class="bi bi-percent"></i> Promotions</h2>
        <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nouvelle promotion
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
                    <th>Nom</th>
                    <th>Livre</th>
                    <th>Réduction</th>
                    <th>Période</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($promotions as $promo)
                    <tr>
                        <td><strong>{{ $promo->name }}</strong></td>
                        <td>
                            {{ $promo->book->title }}
                            <br><small class="text-muted">{{ number_format($promo->book->price, 2) }} $</small>
                        </td>
                        <td>
                            <span class="badge bg-danger fs-6">
                                {{ $promo->discount_label }}
                            </span>
                            <br>
                            <small class="text-success">
                                → {{ number_format($promo->applyTo($promo->book->price), 2) }} $
                            </small>
                        </td>
                        <td>
                            <small>
                                <i class="bi bi-calendar-event text-primary me-1"></i>
                                {{ $promo->starts_at->format('d/m/Y H:i') }}
                                <br>
                                <i class="bi bi-calendar-x text-danger me-1"></i>
                                {{ $promo->ends_at->format('d/m/Y H:i') }}
                            </small>
                        </td>
                        <td>
                            @if ($promo->isActive())
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Active</span>
                            @elseif (!$promo->is_active)
                                <span class="badge bg-secondary">Désactivée</span>
                            @elseif ($promo->starts_at->isFuture())
                                <span class="badge bg-warning text-dark">Programmée</span>
                            @else
                                <span class="badge bg-dark">Expirée</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.promotions.toggle', $promo) }}" method="POST" class="d-inline">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-outline-secondary" title="Activer/Désactiver">
                                    <i class="bi bi-power"></i>
                                </button>
                            </form>
                            <a href="{{ route('admin.promotions.edit', $promo) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.promotions.destroy', $promo) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Supprimer cette promotion ?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            <i class="bi bi-percent fs-1 d-block mb-2"></i>
                            Aucune promotion. Créez-en une !
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $promotions->links() }}
    </div>
@endsection
