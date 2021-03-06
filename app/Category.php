<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','p_id','slug','description'];

    public function products(){


    	return $this->belongsToMany(Product::class);

    }
    public function getRouteKeyName(){

    	return 'slug';

    }
    public function getChild(){

    	return $this->hasMany(Category::class,'p_id','id');

    }
}
