<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;

class GroupsController extends Controller
{
    public function show()
    {
        $groups = Group::all();
        return view('groups\show', compact('groups'));
    }

    public function create()
    {
        return view('groups\create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $group = new Group();
        $group->addGroup($request);
        return redirect()->route('groups.show')->with('flash_message', 'New group created');
    }

    public function edit(Group $group)
    {
        return view('groups\edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $group->update($request->all());

        session()->flash('flash_message', 'Saved');

        return back();
    }

    public function destroy()
    {
        //findfail check for existing types related to group, catch exception
    }
}
