<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Gate;
use Auth;
use App\User;
use App\Provider;

class ProvidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {

        return view('providers\create');

    }

    public function store(Request $request)
    {
        $new = new Provider();

        $new->addProvider($request);

        return redirect()->route('providers.show')->with('flash_message', 'Provider created');
    }

    public function show()
    {
        $providers = Provider::all();

        return view('providers\show', compact('providers'));
    }

    public function edit(Provider $provider)
    {

        return view('providers\edit', compact('provider'));

    }

    public function update(Request $request, Provider $provider)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $provider->update($request->all());

        session()->flash('flash_message', 'Saved');

        return back();
    }
}
