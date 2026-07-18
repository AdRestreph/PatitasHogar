@extends('layouts.app')

@section('content')
    <div class="page-heading"><h1>Nueva especie</h1><p>Agrega una categoría para clasificar las mascotas.</p></div>
    <div class="surface" style="max-width: 560px;"><form method="POST" action="{{ route('species.store') }}" class="d-flex gap-2">@csrf<label class="visually-hidden" for="name">Nombre</label><input id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ej. Perro" required><button class="btn btn-primary" type="submit">Guardar</button></form><a href="{{ route('species.index') }}" class="d-inline-block mt-3 text-secondary">← Volver a especies</a></div>
@endsection
