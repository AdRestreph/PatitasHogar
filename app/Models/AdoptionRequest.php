<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    protected $fillable = [
        'pet_id',
        'adopter_id',
        'status',
        'reason',
        'home_type',
        'has_other_pets',
        'reviewed_by',
        'reviewed_at',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function adopter()
    {
        return $this->belongsTo(User::class, 'adopter_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }
}