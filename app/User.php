<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','subscription','address','job','phone','cellphone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products(){

        return $this->hasMany('App\Product');

    }
    public function roles(){

        return $this->belongsToMany(Role::class);

    }
   public function assingRole($role){

      return $this->roles()->save(

        Role::wherename($role)->firstOrFail() 

      );  

   }
   public function hasRole($role){

        if(is_string($role)){

            return $this->roles()->contains($role);
        }
        return !! $role->intersect($this->roles)->count();
   }
   public function hasPermission(Permission $permission){

        return $this->hasRole($permission->roles);

   }
}
