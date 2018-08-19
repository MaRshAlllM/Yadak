<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class CompareController extends Controller
{
    public function index(){

        $s = session()->get('id');
        $p = Product::find($s);
        return view('compare')->with('product',$p);
    }

    public function add($id){

        if(!is_null(session()->get('id'))){

            $a = session()->get('id');
        }else{

            $a = array();
        }

        if(!in_array($id,$a)){
            array_push($a,$id);
        }
        session()->put('id', $a);
        $s = session()->get('id');
        $p = Product::find($s);
        return view('compare')->with('product',$p);
        //print_r(session()->get('id'));
    }

    function delete(){

        session()->flush();
        return redirect('/');
    }
}
