<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class AquariumType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function aquarium(): BelongsToMany
    {
        return $this->BelongsToMany(Aquarium::class);
    }
}
