<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{

    public function index(){

        return view('list_shoppingcart');
    }

    public function add(Request $request,$id){

            $f_p = (explode('-',$request->price));
            $price = $f_p[1];
            $feature = $f_p[0];
            $title = $request->title;
            $number = $request->number;

            \Cart::add("$id", "$title", $number, $price,['feature'=>$feature]);
            return view('shoppingcart');

    }

    function pay(){
        $identifier = str_random(20);
        \Cart::instance(auth()->user()->email)->store($identifier);
        //\Cart::store(auth()->user()->email);
        return \Cart::instance('auth()->user()->email')->content();
    }

    function remove_row($id){

        \Cart::remove($id);

        return redirect()->route('shoppingcart')->with('Message','حذف با موفقیت انجام شد');

    }
}
