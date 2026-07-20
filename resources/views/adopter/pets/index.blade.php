@extends('layouts.app')

@section('content')

<div class="page-heading text-center">

    <h1>Encuentra un nuevo compañero</h1>

    <p>
        Conoce las mascotas que están esperando un hogar.
    </p>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <form method="GET">

            <div class="row g-3">

                <div class="col-md-5">

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
                                @selected(request('species') == $item->id)>

                                {{ $item->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-5">

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

                <div class="col-md-2 d-flex align-items-end">

                    <button class="btn btn-adopt w-100">

                        Filtrar

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="row g-4">

    @forelse($pets as $pet)

        <div class="col-md-6 col-lg-4">

            <article class="card h-100 pet-card">

                @if($pet->photo)

                    <img
                        src="{{ asset('storage/'.$pet->photo) }}"
                        class="card-img-top pet-image"
                        alt="{{ $pet->name }}">

                @else

                    <div class="pet-placeholder">

                        <i class="bi bi-heart-fill"></i>

                    </div>

                @endif

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">

                        <h3 class="card-title">

                            {{ $pet->name }}

                        </h3>

                        <span class="badge badge-status-available">

                            Disponible

                        </span>

                    </div>

                    <p class="text-muted mb-2">

                        {{ $pet->species->name }}
                        •
                        {{ $pet->breed }}

                    </p>

                    <p class="text-muted">

                        {{ $pet->age_months }}
                        meses
                        •
                        {{ ucfirst($pet->size) }}

                    </p>

                    <a
                        href="{{ route('adopter.pet.show',$pet) }}"
                        class="btn btn-adopt w-100">

                        Ver detalles

                    </a>

                </div>

            </article>

        </div>

    @empty

        <div class="col-12">

            <div class="empty-state">

                <h3>

                    No hay mascotas disponibles

                </h3>

                <p>

                    Intenta nuevamente más tarde.

                </p>

            </div>

        </div>

    @endforelse

</div>

@endsection