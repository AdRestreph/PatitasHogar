@extends('layouts.app')

@section('content')
    <div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div><h1>Historial de seguimiento</h1><p>El recorrido de {{ $pet->name }} en su nuevo hogar.</p></div>
        <a href="{{ route('pets.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-2"></i>Volver a mascotas</a>
    </div>

    <section class="surface mb-5">
        <div class="row align-items-center g-3">
            <div class="col-auto"><div class="timeline-pet-icon"><i class="bi bi-heart-fill"></i></div></div>
            <div class="col"><h2 class="mb-1">{{ $pet->name }}</h2><p class="text-muted mb-0">{{ $pet->species->name }} · {{ ucfirst($pet->size) }} · {{ $pet->age_months }} meses</p></div>
            <div class="col-auto"><span class="badge {{ $pet->status === 'adopted' ? 'badge-status-adopted' : 'badge-status-available' }}">{{ ucfirst(str_replace('_', ' ', $pet->status)) }}</span></div>
        </div>
    </section>

    @if($followUps->isEmpty())
        <div class="empty-state"><i class="bi bi-calendar-heart"></i><h3>Aún no hay visitas registradas</h3><p class="mb-0">Los seguimientos de esta mascota aparecerán aquí cuando el voluntariado los registre.</p></div>
    @else
        <section class="timeline" aria-label="Línea de tiempo de seguimientos">
            @foreach($followUps as $follow)
                <article class="timeline-item {{ $follow->pet_condition === 'good' ? 'timeline-item--good' : 'timeline-item--attention' }}">
                    <div class="timeline-marker"><i class="bi {{ $follow->pet_condition === 'good' ? 'bi-heart-fill' : 'bi-exclamation-lg' }}"></i></div>
                    <div class="timeline-content">
                        <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                            <div><span class="timeline-date"><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($follow->visit_date)->format('d/m/Y') }}</span><h3 class="mt-2 mb-0">Visita de seguimiento</h3></div>
                            @if($follow->pet_condition === 'good')
                                <span class="badge badge-status-approved"><i class="bi bi-check-circle me-1"></i>Buena condición</span>
                            @else
                                <span class="badge badge-status-pending"><i class="bi bi-exclamation-circle me-1"></i>Necesita atención</span>
                            @endif
                        </div>
                        <p class="mb-3">{{ $follow->notes }}</p>
                        <small class="text-muted"><i class="bi bi-person me-1"></i>Registrado por {{ $follow->volunteer->name ?? 'Voluntariado' }}</small>
                    </div>
                </article>
            @endforeach
        </section>
    @endif
@endsection
