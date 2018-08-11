<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'title','body','price','number','slug','image','discount','full_body'
    ];

    public function user(){

    	return $this->belongsTo('App\User');

    }
    public function categories(){

    	return $this->belongsToMany(Category::class);

    }
}
