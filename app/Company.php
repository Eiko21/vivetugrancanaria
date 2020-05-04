<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'description', 'contact', 'logo'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'companyid');
    }
}
