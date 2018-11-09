<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Feature;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Product $product)
    {   

        $p = $product->get();
        return view('admin.list_products')->with('products',$p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $features = Feature::all();


        return view('admin.insert_products',compact('features'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',
            'price'=>'required',
            'feature'=>'required',
            'number'=>'required|numeric',
            'slug'=>'required',
            'image'=>'required|image',
            'full_body'=>'required',

        ]);



        $path = request()->file('image')->store('/','uploads');

        $product = auth()->user()->products()->create([

            'title' => request()->title,
            'body' => request()->body,
            'price' => serialize(array_combine(request()->feature, request()->price)),
            'number' => request()->number,
            'slug' => fa_slug(request()->slug),
            'image' => $path,
            'discount' => request()->discount,
            'full_body' => request()->full_body,
        ]);

        $product->categories()->attach($request->c_ids);

        if(request()->values){

            $ftvalues =  array_combine(request()->fts, request()->values);

            foreach ($ftvalues as $feature => $value) {
            
                $product->features()->attach(
                    [
                        $feature => ['value' => $value],

                    ]
                 );
            }
        }

        // file_get_contents("https://api.telegram.org/bot602355703:AAHUkoWXmR7z4j0xDVBklM8ndFfVZAZygos/sendPhoto?chat_id=-1001213027815&photo=log6^2");
        
        return redirect()->back()->with('Message','محصول با موفقیت درج شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toupdate = new Product();
        $product = $toupdate->with(['features','categories'])->find($id);
        // return $product->categories()->get();
        return view('admin.edit_products')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[

            'title'=>'required',
            'body'=>'required',
            'price'=>'required',
            'feature'=>'required',
            'number'=>'required|numeric',
            'slug'=>'required',
            'image'=>'image',
            'full_body'=>'required',

        ]);

        $product = Product::find($id);

            if(request()->has('image')){
                unlink("uploads/{$product->image}");
                $path = request()->file('image')->store('/','uploads');
                $product->image = $path;

            }

            $product->title = request()->title;
            $product->body = request()->body;
            $product->price = serialize(array_combine(request()->feature, request()->price));
            $product->number = request()->number;
            $product->slug = fa_slug(request()->slug);
            $product->discount = request()->discount;
            $product->full_body = request()->full_body;
            $product->save();

        $product->categories()->sync($request->c_ids);

            if($request->values){

                $ftvalues =  array_combine(request()->fts, request()->values);

                foreach ($ftvalues as $feature => $value) {
                
                    $product->features()->sync(
                        [
                            $feature => ['value' => $value],

                        ]
                     );
                }     
            }else{
                // $product->features()->sync();
            }

             
        return redirect()->back()->with('Message','محصول با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        unlink("application/public/uploads/{$product->image}");
        $product->delete();
        return redirect()->back()->with('message','حذف با موفقیت انجام شد');
    }
}
