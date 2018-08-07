<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class MainContentController extends Controller
{
    public function index(){

    	$products = Product::get(['title','image','price','slug']);

    	return view('index',compact('products'));

    }
}
