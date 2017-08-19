<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Provider;
use App\User;
use Gate;
use Auth;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {

        $this->authorizeForUser($user, 'isUser', $user);


        return view('users\edit', compact('user'));
    }
}
