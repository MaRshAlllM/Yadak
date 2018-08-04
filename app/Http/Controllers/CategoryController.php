<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = $category->get();
        return view('admin.list_categories')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categoryInfact = \App\Category::all();
        return view('admin.insert_categories',compact('categoryInfact'));
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

            'name' => 'required',
            'slug' => 'required',
            //'p_id' => 'required',
            'description' => 'required'

        ]);


        \App\Category::create([

            'name' => $request->name,
            'slug' => str_slug($request->slug,'-'),
            'p_id' => $request->p_id,
            'description' => $request->description

        ]);

        return redirect()->back()->with('message','با موفقیت درج شد');

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
        $toupdate = Category::find($id);
        $categoryInfact = Category::get();
        return view('admin.edit_category')->with(['toupdate'=>$toupdate,'categoryInfact'=>$categoryInfact]);

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

            'name' => 'required',
            'slug' => 'required',
            //'p_id' => 'required',
            'description' => 'required'

        ]);

        $up = Category::find($id);
        $up->name = $request->name;
        $up->slug = $request->slug;
        $up->p_id = $request->p_id;
        $up->description = $request->description;

        $up->save();

        return redirect()->route('categories.index')->with('message','ویرایش با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pp = Category::where('p_id',$id)->get();
       if(count($pp) > 0){
            return redirect()->back()->with('message','این دسته دارای زیر منو می باشد جهت پاک کردن ابتدا باید زیر منو ها را حذف نمایید');
       }else{
            $del = Category::find($id);
            $del->delete();
            return redirect()->back()->with('message','حذف با موفقیت انجام شد');
       }

    }
}
