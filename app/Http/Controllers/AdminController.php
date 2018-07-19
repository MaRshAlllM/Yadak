<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

    	return view('admin.index');

    }
    public function products(){


    	return view('admin.insert_products');


    }

    public function insert_product(){


		$path = request()->file('image')->store('/','uploads');

    	auth()->user()->products()->create([

    		'title' => request()->title,
    		'body' => request()->body,
    		'price' => serialize(array_combine(request()->feature, request()->price)),
    		'number' => request()->number,
    		'slug' => request()->slug,
    		'image' => $path,

    	]);

    	return redirect()->back()->with('Message','محصول با موفقیت درج شد');

    }
}
