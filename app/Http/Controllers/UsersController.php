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

        if (Gate::denies('userIsAdmin', $provider)) {
            return 'Access denied';
        }

        return view('users\show', compact('provider'));
    }

    public function create(Provider $provider)
    {
        if (Gate::denies('userIsAdmin', $provider)) {
            return 'Access denied';
        }

        return view('users\create', compact('provider'));
    }

    public function edit(User $user)
    {
        if (Gate::denies('userIsAdmin', $user->providers)) {
            return 'Access denied';
        }

        return view('users\edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (Gate::denies('userIsAdmin', $user->providers)) {
            return 'Access denied';
        }

        $user->update($request->all());

        session()->flash('flash_message', 'Saved');

        return back();

    }


}
