@extends('layouts.app')

@section('content')
    <div class="page-heading"><h1>Solicitudes de adopción</h1><p>Revisa las solicitudes pendientes y decide el próximo hogar de cada mascota.</p></div>
    <div class="row g-4">
        @forelse($requests as $request)
            <div class="col-lg-6"><article class="surface h-100"><div class="d-flex justify-content-between gap-3"><div><span class="badge badge-status-pending">Pendiente</span><h3 class="mt-3 mb-1">{{ $request->pet->name }}</h3><p class="text-muted mb-3">Solicitud de {{ $request->adopter->name }}</p></div><i class="bi bi-clipboard-heart text-danger fs-3"></i></div><dl class="row mb-4"><dt class="col-sm-4">Motivo</dt><dd class="col-sm-8">{{ $request->reason }}</dd><dt class="col-sm-4">Vivienda</dt><dd class="col-sm-8">{{ ucfirst($request->home_type) }}</dd><dt class="col-sm-4">Otras mascotas</dt><dd class="col-sm-8">{{ $request->has_other_pets ? 'Sí' : 'No' }}</dd></dl><div class="d-flex gap-2"><form method="POST" action="{{ route('admin.adoptions.approve', $request) }}">@csrf<button class="btn btn-success" type="submit"><i class="bi bi-check-lg me-1"></i>Aprobar</button></form><form method="POST" action="{{ route('admin.adoptions.reject', $request) }}">@csrf<button class="btn btn-outline-danger" type="submit">Rechazar</button></form></div></article></div>
        @empty
            <div class="col-12"><div class="empty-state"><i class="bi bi-clipboard-check"></i><h3>No hay solicitudes pendientes</h3><p class="mb-0">Cuando alguien solicite adoptar, aparecerá aquí.</p></div></div>
        @endforelse
    </div>
@endsection
