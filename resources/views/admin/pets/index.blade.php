@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">

    <div>

        <h1>Mascotas</h1>

        <p class="text-muted mb-0">
            Administra las mascotas disponibles para adopción.
        </p>

    </div>

    <a href="{{ route('pets.create') }}" class="btn btn-primary">

        <i class="bi bi-plus-lg me-2"></i>

        Nueva mascota

    </a>

</div>

<form method="GET" class="card p-3 mb-4">

    <div class="row">

        <div class="col-md-4">

            <label class="form-label">
                Especie
            </label>

            <select
                name="species"
                class="form-select">

                <option value="">
                    Todas
                </option>

                @foreach($species as $item)

                    <option
                        value="{{ $item->id }}"
                        @selected(request('species')==$item->id)>

                        {{ $item->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="col-md-3">

            <label class="form-label">

                Tamaño

            </label>

            <select
                name="size"
                class="form-select">

                <option value="">
                    Todos
                </option>

                <option
                    value="small"
                    @selected(request('size')=='small')>

                    Pequeño

                </option>

                <option
                    value="medium"
                    @selected(request('size')=='medium')>

                    Mediano

                </option>

                <option
                    value="large"
                    @selected(request('size')=='large')>

                    Grande

                </option>

            </select>

        </div>

        <div class="col-md-3">

            <label class="form-label">

                Estado

            </label>

            <select
                name="status"
                class="form-select">

                <option value="">
                    Todos
                </option>

                <option value="available">
                    Disponible
                </option>

                <option value="adopted">
                    Adoptado
                </option>

            </select>

        </div>

        <div class="col-md-2 d-flex align-items-end">

            <button class="btn btn-primary w-100">

                Filtrar

            </button>

        </div>

    </div>

</form>

<div class="row g-4">

@forelse($pets as $pet)

<div class="col-lg-4 col-md-6">

    <article class="card h-100 pet-card pet-card-admin">

        @if($pet->photo)

            <img src="{{ asset('storage/'.$pet->photo) }}"
                 class="card-img-top pet-image"
                 alt="{{ $pet->name }}">

        @else

            <div class="pet-placeholder">
                <i class="bi bi-heart-fill"></i>
            </div>

        @endif

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-start mb-2">

                <h4 class="card-title mb-0">{{ $pet->name }}</h4>

                @if($pet->status=="available")
                    <span class="badge badge-status-available">Disponible</span>
                @elseif($pet->status=="adopted")
                    <span class="badge badge-status-adopted">Adoptado</span>
                @else
                    <span class="badge badge-status-pending">{{ ucfirst($pet->status) }}</span>
                @endif

            </div>

            <p class="text-muted mb-3">{{ $pet->species->name }} &bull; {{ $pet->breed }}</p>

            <div class="pet-meta-grid">
                <div><i class="bi bi-hourglass-split"></i>{{ $pet->age_months }} meses</div>
                <div><i class="bi bi-arrows-angle-expand"></i>{{ ucfirst($pet->size) }}</div>
            </div>

            <div class="pet-card-actions">

                <a href="{{ route('pets.edit',$pet) }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-pencil-square me-1"></i>Editar
                </a>

                <a href="{{ route('followups.history',$pet) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-clock-history me-1"></i>Historial
                </a>

                <form action="{{ route('pets.destroy',$pet) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar a {{ $pet->name }}? Esta acción no se puede deshacer.');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-danger-icon" title="Eliminar" aria-label="Eliminar {{ $pet->name }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

            </div>

        </div>

    </article>

</div>

@empty

<div class="col-12">
    <div class="empty-state">
        <i class="bi bi-heart"></i>
        <h3>Aún no hay mascotas registradas</h3>
        <p class="mb-3">Comienza agregando la primera mascota al catálogo.</p>
        <a href="{{ route('pets.create') }}" class="btn btn-primary">Registrar mascota</a>
    </div>
</div>
@endforelse

</div>

@endsection
