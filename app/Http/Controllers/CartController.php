<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    public function add(Request $request,$id){

            $f_p = (explode('-',$request->price));
            $price = $f_p[1];
            $feature = $f_p[0];
            $title = $request->title;
            $number = $request->number;

            \Cart::instance(auth()->user()->email)->add("$id", "$title", $number, $price,['feature'=>$feature]);
            return view('shoppingcart');

    }

    function pay(){

        //\Cart::store(auth()->user()->email);
        return \Cart::instance('default')->content();
    }
}
