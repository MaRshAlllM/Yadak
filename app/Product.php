<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'title','body','price','number','slug','image','discount','full_body'
    ];

    protected $appends = ["aprice","apirealprice","apibody","apifullbody"];

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

                    $value = "$var تومان";
                    return $value;

                }else{

                    $d = $this->discount;

                    $dis = $var - ($var*$d/100);

                    $value = "{$dis} تومان با تخفیف {$d}%" ;

                    return $value;

                }
                $first = false;
            }


         }

         return $value; 
    }

    public function getApiRealPriceAttribute(){

         $value = [];
        foreach(unserialize($this->price) as $key=>$var){
                                        
             if($key == ""){

                return $var;

             }else{

                array_push($value, [$key => $var]);

             }   

         }

         return $value; 



    }
    public function getApiBodyAttribute(){
        

        $string = html_entity_decode(strip_tags($this->body));

        $string = preg_replace("/ \s /",'',$string);

        return $string;
    }
     public function getApiFullBodyAttribute(){

          $string = html_entity_decode(strip_tags($this->full_body));

          $string = preg_replace("/ \s /",'',$string);

        return $string;
    }
    public function gallery(){

        return $this->hasMany(Image::class,'prod_id');
    }
}
