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

    public function store(Request $request, Provider $provider)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $provider->addlocation($request);
        return back();
    }

    public function edit(Location $location)
    {
        return view('locations\edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $location->update($request->all());

        session()->flash('flash_message', 'Saved');

        return back();
    }

}
