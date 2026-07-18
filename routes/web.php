<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\FollowUpController;

Route::middleware(['auth','role:adopter'])->prefix('adopter')->group(function(){

    Route::get('/pets', 
        [PetController::class,'catalog']
    )->name('adopter.pets');


    Route::get('/pets/{pet}',
        [PetController::class,'show']
    )->name('adopter.pet.show');


    Route::post('/pets/{pet}/apply',
        [AdoptionRequestController::class,'store']
    )->name('adoption.store');


    Route::get('/requests',
        [AdoptionRequestController::class,'myRequests']
    )->name('adoption.my');

});

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function(){

    Route::resource('pets', PetController::class);

    Route::resource('species', SpeciesController::class);

});


Route::middleware(['auth','role:admin'])
->prefix('admin')
->group(function(){

    Route::get('/adoptions',
        [AdoptionRequestController::class,'index']
    )->name('admin.adoptions');


    Route::post('/adoptions/{adoptionRequest}/approve',
        [AdoptionRequestController::class,'approve']
    )->name('admin.adoptions.approve');


    Route::post('/adoptions/{adoptionRequest}/reject',
        [AdoptionRequestController::class,'reject']
    )->name('admin.adoptions.reject');

    Route::get(
    '/pets/{pet}/followups',
    [FollowUpController::class, 'history']
)->name('followups.history');

});


Route::middleware(['auth', 'role:volunteer'])
    ->prefix('volunteer')
    ->group(function () {

        Route::get('/follow-ups', [FollowUpController::class, 'index'])
            ->name('volunteer.followups');

        Route::get('/follow-ups/{adoptionRequest}', [FollowUpController::class, 'create'])
            ->name('followups.create');

        Route::post('/follow-ups/{adoptionRequest}', [FollowUpController::class, 'store'])
            ->name('followups.store');

    });


Route::middleware(['auth','role:adopter'])
->get('/adopter', function(){

    return "Zona Adoptante";

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
