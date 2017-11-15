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
    
    public function update(Request $request, User $user)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        
        $user->update($request->all());

        session()->flash('flash_message', 'User deleted');

        return back();
    }
    
}
