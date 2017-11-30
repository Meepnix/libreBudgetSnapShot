<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
use App\Provider;

class Type extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function groups()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }

    public function providers()
    {
        return $this->belongsTo('App\Provider', 'provider_id');
    }


}
