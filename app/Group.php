<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use Illuminate\Http\Request;

class Group extends Model
{
    protected $fillable = [
        'name',

    ];

    public function types()
    {
        return $this->hasMany('App\Type');
    }

    public function addGroup(Request $request)
    {
        return $this->create($request->all());
    }
}
