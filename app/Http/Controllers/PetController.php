<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class PetController extends Controller
{

public function index(Request $request)
{
    $query = Pet::with('species');

    if ($request->filled('species')) {
        $query->where('species_id', $request->species);
    }

    if ($request->filled('size')) {
        $query->where('size', $request->size);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $pets = $query->get();

    $species = Species::all();

    return view(
        'admin.pets.index',
        compact('pets', 'species')
    );
}


public function create()
{
    $species = Species::all();

    return view('admin.pets.create', compact('species'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'species_id' => ['required', 'exists:species,id'],
        'name' => ['required', 'string', 'max:255'],
        'breed' => ['required', 'string', 'max:255'],
        'age_months' => ['required', 'integer', 'min:0'],
        'size' => ['required', 'in:small,medium,large'],
        'description' => ['required', 'string'],
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
    ]);

    $photoPath = $request->hasFile('photo')
        ? $request->file('photo')->store('pets', 'public')
        : null;

    Pet::create([
        'species_id'=>$validated['species_id'],
        'name'=>$validated['name'],
        'breed'=>$validated['breed'],
        'age_months'=>$validated['age_months'],
        'size'=>$validated['size'],
        'description'=>$validated['description'],
        'photo'=>$photoPath,
        'status'=>'available'
    ]);

    return redirect()
        ->route('pets.index');
}


public function destroy(Pet $pet)
{

$pet->delete();

return back();

}


public function edit(Pet $pet)
{
    $species = Species::all();

    return view('admin.pets.edit', compact('pet', 'species'));
}


public function update(Request $request, Pet $pet)
{
    $validated = $request->validate([
        'species_id' => ['required', 'exists:species,id'],
        'name' => ['required', 'string', 'max:255'],
        'breed' => ['required', 'string', 'max:255'],
        'age_months' => ['required', 'integer', 'min:0'],
        'size' => ['required', 'in:small,medium,large'],
        'description' => ['required', 'string'],
        'status' => ['required', 'in:available,in_process,adopted'],
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
    ]);

    if ($request->hasFile('photo')) {
        if ($pet->photo) {
            Storage::disk('public')->delete($pet->photo);
        }

        $validated['photo'] = $request->file('photo')->store('pets', 'public');
    }

    $pet->update($validated);

    return redirect()
        ->route('pets.index')
        ->with('success', 'Mascota actualizada correctamente.');
}


public function catalog(Request $request)
{
    $query = Pet::with('species')
        ->where('status', 'available');

    if ($request->filled('species')) {
        $query->where('species_id', $request->species);
    }

    if ($request->filled('size')) {
        $query->where('size', $request->size);
    }

    $pets = $query->get();

    $species = Species::all();

    return view(
        'adopter.pets.index',
        compact('pets', 'species')
    );
}

public function show(Pet $pet)
{
    $pet->load('species');

    return view('adopter.pets.show', compact('pet'));
}
}
