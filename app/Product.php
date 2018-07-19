<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'title','body','price','number','slug','image'
    ];

    public function user(){

    	return $this->belongsTo('App\User');

    }


}
