<?php

namespace App\Http\Controllers;

use App\Models\Country;

class CountryController extends Controller
{
    public function getCountries()
    {
        $countries = Country::all();

        return response()->json($countries);
    }

    public function getStates(Country $country)
    {
        $states = $country->states()->get();

        return response()->json($states);
    }
}
