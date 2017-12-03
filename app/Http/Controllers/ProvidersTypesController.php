<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Group;
use App\Http\Requests;

class ProvidersTypesController extends Controller
{
    public function show(Provider $provider)
    {
            return view('providersTypes\show', compact('provider'));
    }

    public function create(Provider $provider)
    {
        $new = Group::all();

        $group = $new->pluck('name', 'id');


        return view('providersTypes\create', compact('provider', 'group'));
    }
}
