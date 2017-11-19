<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Gate;
use Auth;
use App\User;

class ProvidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function show(\App\Provider $provider)
    {
        $providers = Provider::all();

        return view('providers\show', compact('providers'));
    }
}
