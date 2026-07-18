@extends('layouts.app')

@section('content')
    <div class="page-heading"><h1>Seguimientos pendientes</h1><p>Registra cómo avanza cada adopción aprobada.</p></div>
    <div class="surface p-0 overflow-hidden"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Mascota</th><th>Adoptante</th><th class="text-end">Acción</th></tr></thead><tbody>@forelse($requests as $request)<tr><td class="fw-semibold"><i class="bi bi-heart-fill text-danger me-2"></i>{{ $request->pet->name }}</td><td>{{ $request->adopter->name }}</td><td class="text-end"><a class="btn btn-primary btn-sm" href="{{ route('followups.create', $request) }}">Registrar visita</a></td></tr>@empty<tr><td colspan="3"><div class="empty-state border-0 py-4"><i class="bi bi-house-heart"></i>No hay adopciones aprobadas para seguir.</div></td></tr>@endforelse</tbody></table></div></div>
@endsection
