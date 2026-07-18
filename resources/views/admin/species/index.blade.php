@extends('layouts.app')

@section('content')
    <div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3"><div><h1>Especies</h1><p>Organiza las especies disponibles en el catálogo.</p></div><a href="{{ route('species.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i>Nueva especie</a></div>
    <div class="surface p-0 overflow-hidden">
        @forelse($species as $item)
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom"><span><i class="bi bi-paw-fill text-danger me-2"></i>{{ $item->name }}</span><form method="POST" action="{{ route('species.destroy', $item) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">Eliminar</button></form></div>
        @empty
            <div class="empty-state border-0"><i class="bi bi-tags"></i>Aún no hay especies registradas.</div>
        @endforelse
    </div>
@endsection
