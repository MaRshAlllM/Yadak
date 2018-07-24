<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Feature $feature)
    {
        $features = $feature->get();
        return view('admin.list_features')->with('features',$features);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insert_features');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),[

            'title'=>'required'
        ]);

        $ft = new Feature();
        $ft->title = request()->title;
        $ft->save();
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
        $f = Feature::find($id);

        return view('admin.edit_feature')->with('feature',$f);

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
        $this->validate(request(),[

            'title'=>'required'
        ]);

        $up = Feature::find($id);

        $up->title = $request->title;

        $up->save();

        return redirect()->route('feature.index')->with('message','ویرایش با موفقیت انجام شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $f=Feature::find($id);
        $f->delete();
        return redirect()->back()->with('message','حذف با موفقیت انجام شد');
    }
}
