<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Provider;

class Location extends Model
{
    protected $fillable = [
        'name',

    ];

    public function providers()
    {
        return $this->belongsTo('App\Provider', 'provider_id');
    }



}
