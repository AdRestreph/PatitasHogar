<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;
use App\Models\Pet;

class FollowUpController extends Controller
{
    public function index()
    {
        $requests = AdoptionRequest::with(['pet', 'adopter'])
            ->where('status', 'approved')
            ->get();

        return view('volunteer.followups.index', compact('requests'));
    }

    public function create(AdoptionRequest $adoptionRequest)
    {
        return view(
            'volunteer.followups.create',
            compact('adoptionRequest')
        );
    }

    public function store(Request $request, AdoptionRequest $adoptionRequest)
    {
        FollowUp::create([
            'adoption_request_id' => $adoptionRequest->id,
            'volunteer_id' => auth()->id(),
            'visit_date' => $request->visit_date,
            'notes' => $request->notes,
            'pet_condition' => $request->pet_condition,
        ]);

        return redirect()
            ->route('volunteer.followups')
            ->with('success', 'Seguimiento registrado correctamente.');
    }

public function history(Pet $pet)
{
    $pet->load([
        'adoptionRequests.followUps.volunteer',
        'species'
    ]);

    $followUps = $pet->adoptionRequests
        ->flatMap(fn ($request) => $request->followUps)
        ->sortByDesc('visit_date');

    return view(
        'admin.followups.history',
        compact('pet', 'followUps')
    );
}
}
