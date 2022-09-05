<?php

namespace App\Http\Controllers;

use App\Models\Country;

class CountryController extends Controller
{
    /*
     * This could be done on the frontend by using a js package to handle getting all countries and details
     * OR
     * By downloading all countries and corresponding region api and access from the server side.
     */


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
