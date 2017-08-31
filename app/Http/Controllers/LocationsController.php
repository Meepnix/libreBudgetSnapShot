<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Provider;

use App\Http\Requests;

class LocationsController extends Controller
{
    public function show()
    {
        $providers = \App\Provider::all();
        return view('locations\show', compact('providers'));
    }

    public function create(Provider $provider)
    {
        return view('locations\create', compact('provider'));
    }
}
