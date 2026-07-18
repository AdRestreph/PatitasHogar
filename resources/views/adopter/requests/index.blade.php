@extends('layouts.app')

@section('content')
    <div class="page-heading"><h1>Mis solicitudes</h1><p>Consulta el estado de cada proceso de adopción.</p></div>
    @if($requests->isEmpty())
        <div class="empty-state"><i class="bi bi-clipboard-heart"></i><h3>Aún no tienes solicitudes</h3><p>Cuando encuentres a tu compañero ideal, podrás solicitar su adopción desde el catálogo.</p><a href="{{ route('adopter.pets') }}" class="btn btn-primary mt-2">Ver mascotas</a></div>
    @else
        <div class="surface p-0 overflow-hidden"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Mascota</th><th>Estado</th><th>Motivo</th><th>Vivienda</th></tr></thead><tbody>@foreach($requests as $request)<tr><td class="fw-semibold">{{ $request->pet->name }}</td><td>@if($request->status === 'pending')<span class="badge badge-status-pending">Pendiente</span>@elseif($request->status === 'approved')<span class="badge badge-status-approved">Aprobada</span>@else<span class="badge badge-status-rejected">Rechazada</span>@endif</td><td>{{ $request->reason }}</td><td>{{ ucfirst($request->home_type) }}</td></tr>@endforeach</tbody></table></div></div>
    @endif
@endsection
