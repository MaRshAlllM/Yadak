<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Product;

class ImageController extends Controller
{
    public function index($id){

        $f = Product::find($id);
        return view('admin.image_gallery')->with('product',$f);
    }

    public function gallery_upload(Request $request){

        $pid = $request->prod_id;

        if($request->hasfile('image')){

            //$images = $request->file('image');

            foreach($request->image as $im){

                $fname = $im->store('/','uploads');

                Image::create([
                
                    'prod_id' => $pid,
                    'image_name' => $fname,
                ]);

            }

            return redirect()->route('products.index')->with('message','گالری با موفقیت ایجاد شد');
        }


    }
}
