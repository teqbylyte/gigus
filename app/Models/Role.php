<?php

namespace App\Models;

use App\Traits\HasGigs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasGigs;

    protected $guarded = ['id'];

}
