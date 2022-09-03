<?php

namespace App\Models;

use App\Traits\Uid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gig extends Model
{
    use HasFactory, Uid;

    protected $guarded = ['id'];

    public function company(): BelongsTo
    {
        return  $this->belongsTo(Company::class);
    }

    public function role(): BelongsTo
    {
        return  $this->belongsTo(Role::class);
    }

    public function scopeWithRelations($query)
    {
        $query->with(['company:id,name', 'role:id,name']);
    }
}