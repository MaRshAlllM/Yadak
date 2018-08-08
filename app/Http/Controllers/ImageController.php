<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function delete_image($id){

        $image_delete = Image::find($id);
        $im_name = $image_delete->image_name;
        if(unlink("uploads/$im_name")){

            $image_delete->delete();
            return redirect()->back()->with('message','تصویر با موفقیت حذف شد');
        }


    }
}
