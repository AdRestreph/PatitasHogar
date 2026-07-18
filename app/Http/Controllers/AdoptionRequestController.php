<?php

namespace App\Http\Controllers;


use App\Models\Pet;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;


class AdoptionRequestController extends Controller
{


public function store(Request $request, Pet $pet)
{


if($pet->status != 'available')
{
return back()->with(
'error',
'Esta mascota ya no está disponible'
);
}



$count = AdoptionRequest::where(
'adopter_id',
auth()->id()
)
->where(
'status',
'pending'
)
->count();



if($count >= 2)
{
return back()->with(
'error',
'No puedes tener más de 2 solicitudes pendientes'
);
}



AdoptionRequest::create([

'pet_id'=>$pet->id,

'adopter_id'=>auth()->id(),

'status'=>'pending',

'reason'=>$request->reason,

'home_type'=>$request->home_type,

'has_other_pets'=>$request->has_other_pets

]);



return redirect()
->route('adoption.my');


}



public function myRequests()
{

$requests =
AdoptionRequest::where(
'adopter_id',
auth()->id()
)
->with('pet')
->get();



return view(
'adopter.requests.index',
compact('requests')
);


}

public function index()
{

    $requests = AdoptionRequest::with([
        'pet',
        'adopter'
    ])
    ->where('status','pending')
    ->get();


    return view(
        'admin.adoptions.index',
        compact('requests')
    );

}

public function approve(AdoptionRequest $adoptionRequest)
{

    $adoptionRequest->update([

        'status'=>'approved',

        'reviewed_by'=>auth()->id(),

        'reviewed_at'=>now()

    ]);


    $adoptionRequest->pet->update([

        'status'=>'adopted'

    ]);



    AdoptionRequest::where(
        'pet_id',
        $adoptionRequest->pet_id
    )
    ->where(
        'id',
        '!=',
        $adoptionRequest->id
    )
    ->where(
        'status',
        'pending'
    )
    ->update([

        'status'=>'rejected'

    ]);



    return back();

}

public function reject(AdoptionRequest $adoptionRequest)
{

    $adoptionRequest->update([

        'status'=>'rejected',

        'reviewed_by'=>auth()->id(),

        'reviewed_at'=>now()

    ]);


    return back();

}
}