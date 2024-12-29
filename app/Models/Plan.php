<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'storageLimit',
        'bandwidthLimit',
        'ramLimit',
        'description',
        'isPublic',
        'isPopular',
    ];

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class);
    }
}
