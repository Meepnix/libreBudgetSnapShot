<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Http\Request;

class Provider extends Model
{
    protected $fillable = [
        'name',
        'address1',
        'address2',
        'city',
        'county',
        'post_code',
        'website',
        'email',
        'phone',
        'fax',
        'logo_link',
        'active',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function locations()
    {
        return $this->hasMany('App\Location');
    }

    public function addUser(Request $request)
    {

        $new = New User($request->all());
        $new->password = bcrypt($request->input('password'));
        $new->type = $request->input('type');
        //$user->password = bcrypt($user->password);

        return $this->users()->save($new);
    }


    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function addLocation(Request $request)
    {
        return $this->locations()->create($request->all());

    }


}
