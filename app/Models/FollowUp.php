<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $fillable = [
        'adoption_request_id',
        'volunteer_id',
        'visit_date',
        'notes',
        'pet_condition',
    ];

    public function adoptionRequest()
    {
        return $this->belongsTo(AdoptionRequest::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }
}