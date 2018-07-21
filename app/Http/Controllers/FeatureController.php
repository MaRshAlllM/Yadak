<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
//use Illuminate\Support\Facades\DB;

class FeatureController extends Controller
{
    public function index(){

        return view('admin.feature_insert_form');

    }
    public function insert_feature(){

        $ft = new Feature();
        $ft->title = request()->title;
        $ft->save();
        return "it's added";
       /* DB::table('features')->insert([
            ['title' => 'dsfsdfds'],
        ]);*/

        /*$insert_feature = new insert_feature;

        $insert_feature->title = $request->title;

        $insert_feature->save();*/

    }
}
