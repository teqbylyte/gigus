<?php

namespace App\Traits;

use App\Models\Gig;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasGigs
{
    public function gigs(): HasMany
    {
        return $this->hasMany(Gig::class);
    }
}
