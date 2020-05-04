<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 'type', 'description', 'price', 'capacity', 'start',  'duration','image'
    ];

    public function users(){
        return $this->belongsTo('App\User', 'companyid');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket', 'activityid', 'id');
    }
}
