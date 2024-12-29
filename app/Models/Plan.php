<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->belongsToMany(Feature::class, 'plan_features', 'plan_id', 'feature_id');
    }

    public function planPricings(): HasMany
    {
        return $this->hasMany(PlanPricing::class, 'plan_id');
    }
}
