<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Product;

class ImageController extends Controller
{
    public function index($id){

        $f = Product::find($id);
        $gl = Image::where('prod_id',$id)->get();
        return view('admin.image_gallery')->with(['product'=>$f,'gl'=>$gl]);
    }

    public function gallery_upload(Request $request){

        $pid = $request->prod_id;

        $this->validate($request,[
            'prod_id' => 'required|integer',
            'image' => 'required|image|max:300',
        ]);

        if($request->hasfile('image')){

            //$images = $request->file('image');

           // foreach($request->image as $im){

                //$fname = $im->store('/','uploads');
                $fname = $request->image->store('/','uploads');
                Image::create([
                
                    'prod_id' => $pid,
                    'image_name' => $fname,
                ]);

           // }

            return redirect()->back()->with('message','گالری با موفقیت ایجاد شد');
        }


    }
}
