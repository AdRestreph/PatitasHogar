@extends('layouts.app')

@section('content')
    <div class="page-heading text-center"><h1>Encuentra un nuevo compañero</h1><p>Conoce las mascotas que están esperando un hogar.</p></div>
    <div class="row g-4">
        @forelse($pets as $pet)
            <div class="col-md-6 col-lg-4"><article class="card h-100 pet-card">@if($pet->photo)<img src="{{ asset('storage/'.$pet->photo) }}" class="card-img-top pet-image" alt="{{ $pet->name }}">@else<div class="pet-placeholder"><i class="bi bi-heart-fill"></i></div>@endif<div class="card-body"><div class="d-flex justify-content-between align-items-start gap-2"><h3 class="card-title">{{ $pet->name }}</h3><span class="badge badge-status-available">Disponible</span></div><p class="text-muted mb-2"><i class="bi bi-paw me-1"></i>{{ $pet->species->name }} · {{ $pet->breed }}</p><p class="text-muted">{{ $pet->age_months }} meses · {{ ucfirst($pet->size) }}</p><a href="{{ route('adopter.pet.show', $pet) }}" class="btn btn-adopt w-100">Conocer a {{ $pet->name }} <i class="bi bi-arrow-right ms-1"></i></a></div></article></div>
        @empty
            <div class="col-12"><div class="empty-state"><i class="bi bi-heart"></i><h3>Pronto habrá nuevos compañeros</h3><p class="mb-0">No hay mascotas disponibles en este momento.</p></div></div>
        @endforelse
    </div>
@endsection
