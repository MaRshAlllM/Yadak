<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'title','body','price','number','slug','image','discount','full_body'
    ];

    protected $appends = ["aprice"];

    public function user(){

    	return $this->belongsTo('App\User');

    }
    public function categories(){

    	return $this->belongsToMany(Category::class);

    }
    public function features(){
    	return $this->belongsToMany(Feature::class)->withPivot('value');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function getApriceAttribute(){

        $value = "";
        $first = true;
        foreach(unserialize($this->price) as $key=>$var){
                                        
            if($first == true){

                if($this->discount == null){

                    $value = "$var";
                    return $value;

                }else{

                    $d = $this->discount;

                    $dis = $var - ($var*$d/100);

                    $value = "{$dis} با تخفیف {$d} %" ;

                    return $value;

                }
                $first = false;
            }


         }

         return $value;
        
    }
}
