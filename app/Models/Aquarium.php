<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Aquarium extends Model
{
    protected $fillable = [
        'name',
        'aquarium_type_id',
        'last_time_maintenance',
        'created_at',
    ];

    public function types(): HasOne
    {
        return $this->HasOne(AquariumType::class, 'id');
    }
}
