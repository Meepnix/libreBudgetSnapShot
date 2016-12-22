<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Provider;

use App\User;

class UsersController extends Controller
{
    public function store(Request $request, Provider $provider)
    {

        $provider->addUser(
            New User($request->all())
        );

        return back();
    }
}
