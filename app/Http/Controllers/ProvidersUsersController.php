<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Provider;
use App\User;
use Gate;
use Auth;
use Input;

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
        $provider->addUser($request);

        return redirect()->route('providers.users.show', [$provider])->with('flash_message', 'User ' . $request->name . ' created');
    }

    public function show(Provider $provider)
    {

        if (Gate::denies('isAdmin', $provider)) {
            return 'Access denied';
        }

        return view('providersUsers\show', compact('provider'));
    }

    public function create(Provider $provider)
    {
        if (Gate::denies('isAdmin', $provider)) {
            return 'Access denied';
        }

        return view('providersUsers\create', compact('provider'));
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

        $this->validate($request, [
            'name' => 'required',
            //Ignore unique rule for existing unique email address
            'email' => 'required|email|unique:users,email,'.$user->id,
            'type' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('providers.users.show', [$provider])->with('flash_message', 'User ' . $user->name . ' updated');

    }

    public function destroy(Request $request, Provider $provider, User $user)
    {
        if (Gate::forUser($user)->denies('isAdminExclude', $provider)) {
            return 'Access denied';
        }

        $user->delete();

        session()->flash('flash_message', 'User deleted');

        return back();
    }

}
