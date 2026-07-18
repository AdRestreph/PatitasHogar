<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    protected $fillable = [
        'species_id',
        'name',
        'breed',
        'age_months',
        'size',
        'description',
        'photo',
        'status'
    ];


    public function species()
    {
        return $this->belongsTo(Species::class);
    }


    public function adoptionRequests()
    {
        return $this->hasMany(AdoptionRequest::class);
    }

}