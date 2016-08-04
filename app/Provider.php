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
        'logo_link'
    ];
}
