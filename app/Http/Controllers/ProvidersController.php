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

    public function index(User $user)
    {
        if (Gate::denies('isUser', \App\Providers::class)) {
            return 'Access denied';
        }

        $orgs = \App\Provider::all();
        return view('providers\index', compact('orgs'));
    }

    public function show(\App\Provider $provider)
    {
        //$orgs = \App\Provider::find($id);

        return view('providers\show', compact('provider'));
    }
}
