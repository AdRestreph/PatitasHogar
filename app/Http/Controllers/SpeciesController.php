<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;


class SpeciesController extends Controller
{

    public function index()
    {
        $species = Species::all();

        return view('admin.species.index',compact('species'));
    }


    public function create()
    {
        return view('admin.species.create');
    }


    public function store(Request $request)
    {

        Species::create([
            'name'=>$request->name
        ]);


        return redirect()
        ->route('species.index');

    }


    public function destroy(Species $species)
    {
        $species->delete();

        return back();
    }

}