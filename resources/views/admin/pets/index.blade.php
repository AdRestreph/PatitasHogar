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

    <div class="card h-100">

        @if($pet->photo)

            <img src="{{ asset('storage/'.$pet->photo) }}"
                 class="card-img-top"
                 style="height:240px;object-fit:cover;">

        @else

            <div
                class="d-flex align-items-center justify-content-center"
                style="
                    height:240px;
                    background:#FFE9E3;
                    font-size:70px;
                    color:#FF6B6B;
                ">

                <i class="bi bi-heart"></i>

            </div>

        @endif

        <div class="card-body">

            <div class="d-flex justify-content-between">

                <h4>

                    {{ $pet->name }}

                </h4>

                @if($pet->status=="available")

                    <span class="badge bg-success">

                        Disponible

                    </span>

                @elseif($pet->status=="adopted")

                    <span class="badge bg-primary">

                        Adoptado

                    </span>

                @else

                    <span class="badge bg-secondary">

                        {{ ucfirst($pet->status) }}

                    </span>

                @endif

            </div>

            <hr>

            <p>

                <strong>Especie</strong><br>

                {{ $pet->species->name }}

            </p>

            <p>

                <strong>Raza</strong><br>

                {{ $pet->breed }}

            </p>

            <p>

                <strong>Edad</strong><br>

                {{ $pet->age_months }} meses

            </p>

            <p>

                <strong>Tamaño</strong><br>

                {{ ucfirst($pet->size) }}

            </p>

        </div>

        <div class="card-footer bg-white border-0">

            <div class="d-grid gap-2">

                <a href="{{ route('pets.edit',$pet) }}"
                   class="btn btn-outline-primary">

                    <i class="bi bi-pencil-square me-2"></i>

                    Editar

                </a>

                <a href="{{ route('followups.history',$pet) }}"
                   class="btn btn-outline-secondary">

                    <i class="bi bi-clock-history me-2"></i>

                    Historial

                </a>

                <form
                    action="{{ route('pets.destroy',$pet) }}"
                    method="POST">

                    @csrf

                    @method('DELETE')

                    <button
                        class="btn btn-danger w-100">

                        <i class="bi bi-trash me-2"></i>

                        Eliminar

                    </button>

                </form>

            </div>

        </div>

    </div>

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
