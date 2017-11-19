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

        if (Gate::forUser($user)->denies('isUser', $user)) {
            return 'Access denied';
        }


        return view('users\edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (Gate::forUser($user)->denies('isUser', $user)) {
            return 'Access denied';
        }

        $this->validate($request, [
            'name' => 'required',
            //Ignore unique rule for existing unique email address
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);


        $user->update($request->all());

        session()->flash('flash_message', 'User Updated');

        return back();
    }

    public function updateReset(Request $request, User $user)
    {
        if (Gate::forUser($user)->denies('isUser', $user)) {
            return 'Access denied';
        }

        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

        $user->password = bcrypt($request->input('password'));

        $user->save();

        session()->flash('flash_message', 'Password changed');

        return back();

    }

}
