<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
//use Illuminate\Support\Facades\DB;

class FeatureController extends Controller
{
    public function index(){

        return view('admin.insert_features');

    }
    public function insert_feature(){

        $this->validate(request(),[

            'title'=>'required'
        ]);

        $ft = new Feature();
        $ft->title = request()->title;
        $ft->save();
        return redirect()->back()->with('message','با موفقیت درج شد');
    }

    public function list_features(){


    }
}

