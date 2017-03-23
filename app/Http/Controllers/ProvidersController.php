<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProvidersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin');
    }

    public function index()
    {
        $orgs = \App\Provider::all();
        return view('providers\index', compact('orgs'));
    }

    public function show(\App\Provider $provider)
    {
        //$orgs = \App\Provider::find($id);

        return view('providers\show', compact('provider'));
    }
}
