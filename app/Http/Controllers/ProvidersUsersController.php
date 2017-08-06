<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Provider;
use App\User;
use Gate;
use Auth;

class ProvidersUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Provider $provider)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'type' => 'required',
        ]);
        $provider->addUser(
            New User($request->all())
        );

        return back();
    }

    public function show(Provider $provider)
    {

        if (Gate::denies('isAdmin', $provider)) {
            return 'Access denied';
        }

        return view('users\show', compact('provider'));
    }

    public function create(Provider $provider)
    {
        if (Gate::denies('isAdmin', $provider)) {
            return 'Access denied';
        }

        return view('users\create', compact('provider'));
    }

    public function edit(Provider $provider, User $user)
    {
        if (Gate::forUser($user)->denies('isAdminExclude', $provider)) {
            return 'Access denied';
        }

        return view('providersUsers\edit', compact('provider', 'user'));
    }

    public function update(Request $request, Provider $provider, User $user)
    {
        if (Gate::forUser($user)->denies('isAdminExclude', $provider)) {
            return 'Access denied';
        }

        $user->update($request->all());

        session()->flash('flash_message', 'Saved');

        return back();

    }
}
