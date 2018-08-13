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
            'discount' => 'required|integer',
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


        $ftvalues =  array_combine(request()->fts, request()->values);

        foreach ($ftvalues as $feature => $value) {
            
                $product->features()->attach(
                    [
                        $feature => ['value' => $value],

                    ]
                 );
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
