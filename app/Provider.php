<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function addUser(User $user)
    {
        $user->password = bcrypt($user->password);
        return $this->users()->save($user);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }


}
