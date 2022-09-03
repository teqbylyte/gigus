<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GigController extends Controller
{
    public function index()
    {
        $gigs = Gig::query()->latest()->withRelations()->get();

        return Inertia::render('Gigs/Index', compact('gigs'));
    }
}
