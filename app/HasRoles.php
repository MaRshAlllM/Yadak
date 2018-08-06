<?php 

namespace App;

trait HasRoles{


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


?>