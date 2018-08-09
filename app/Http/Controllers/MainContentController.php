<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class MainContentController extends Controller
{
    public function index(){

    	$products = Product::get();

    	return view('index',compact('products'));

    }
    public function single($id){

        $pr = Product::find($id);

    	return view('single')->with('product',$pr);

    }
}
