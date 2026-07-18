@extends('layouts.app')

@section('content')
    <div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div><h1>Registrar mascota</h1><p>Completa los datos para agregarla al catálogo.</p></div>
        <a href="{{ route('pets.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-2"></i>Volver</a>
    </div>

    <div class="surface" style="max-width: 760px;">
        <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-6"><label class="form-label" for="name">Nombre</label><input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>
            <div class="col-md-6"><label class="form-label" for="species_id">Especie</label><select id="species_id" name="species_id" class="form-select" required><option value="" selected disabled>Selecciona una especie</option>@foreach($species as $item)<option value="{{ $item->id }}" @selected(old('species_id') == $item->id)>{{ $item->name }}</option>@endforeach</select></div>
            <div class="col-md-6"><label class="form-label" for="breed">Raza</label><input id="breed" type="text" name="breed" class="form-control" value="{{ old('breed') }}" required></div>
            <div class="col-md-3"><label class="form-label" for="age_months">Edad (meses)</label><input id="age_months" type="number" min="0" name="age_months" class="form-control" value="{{ old('age_months') }}" required></div>
            <div class="col-md-3"><label class="form-label" for="size">Tamaño</label><select id="size" name="size" class="form-select" required><option value="small">Pequeño</option><option value="medium">Mediano</option><option value="large">Grande</option></select></div>
            <div class="col-12"><label class="form-label" for="photo">Foto</label><input id="photo" type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/jpeg,image/png,image/webp"><div class="form-text">Opcional. JPG, PNG o WebP, máximo 5 MB.</div>@error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="col-12"><label class="form-label" for="description">Descripción</label><textarea id="description" name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea></div>
            <div class="col-12 pt-2"><button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-2"></i>Guardar mascota</button></div>
        </form>
    </div>
@endsection
