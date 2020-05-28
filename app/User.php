<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city', 'role', 'image', 'description', 'contact',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activities(){
        return $this->hasMany('App\Activity', 'companyid', 'id');
    }

    public function company(){
        return $this->hasOne('App\Company', 'companyid', 'id');
    }

    public function tickets(){
        return $this->hasOne('App\Ticket', 'clientid', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function isAdmin(){
        return $this->role=="administrador" ? true : false;
    }
    public function isClient(){
        return $this->role=="cliente" ? true : false;
    }
    public function isCompany(){
        return $this->role=="empresa" ? true : false;
    }
    
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first() ? true : false;
    }

    // public function authorizeRoles($roles)
    // {
    //     abort_unless($this->hasAnyRole($roles), 401);
    //     return true;
    // }    
    
    // public function hasAnyRole($roles)
    // {
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) 
    //             if ($this->hasRole($role)) return true;
    //     } else {
    //         if ($this->hasRole($roles)) return true;
    //     }
    //     return false;
    // }   

}
