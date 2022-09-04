<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Helpers\RoleHelper;
use App\Http\Requests\GigRequest;
use App\Models\Company;
use App\Models\Gig;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GigController extends Controller
{
    public function index()
    {
        $gigs = Gig::query()->latest()->withRelations()->get();

        return Inertia::render('Gigs/Index', compact('gigs'));
    }

    public function create()
    {
        return Inertia::render('Gigs/Create');
    }

    public function store(GigRequest $request)
    {
        try {
            $gig_data = $request->only('min_salary', 'max_salary', 'country', 'state', 'address');

//            Get the role model for this gig
            $role = (new ModelHelper($request->role, new Role()))->getModel();
            $gig_data['role_id'] = $role->id;

//            Get the role model for this gig
            $company = (new ModelHelper($request->company, new Company()))->getModel();
            $gig_data['company_id'] = $company->id;

            Gig::query()->create($gig_data);

            return redirect()->route('gigs.index')->with('success', 'New Gig Created!');
        }
        catch (\Exception $exception) {
            return $this->handleException(e: $exception);
        }
    }
}
