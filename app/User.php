<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','birthday','cin'
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

   /* public function profile(){
        return $this->hasOne('App\Profile');
    }
*/
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function hasAnyRoles($roles){
        if ($this->roles()->whereIn('name' , $roles)->first()) {
         return true;   
        }
        return false;

    }

    public function hasRole($role){
        if ($this->roles()->where('name' , $role)->first()) {
            return true;   
           }
           return false;
    }

    public  function chek_user($user){
        
        if( Auth::user() != $user )
           {return false;}
       else 
       {
        return true;
       } 
         
    }

    // relations
    public function formations(){
        return $this->hasMany('App\Formation');
    }
    

    public function sessions()
    {
        return $this->belongsToMany('App\Session', 'session_user', 'user_id', 'session_id')->withTimestamps()->withPivot(['reste', 'avance', 'date_demande_attestion']);
    }
}
