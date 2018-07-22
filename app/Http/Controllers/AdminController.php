<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

    	return view('admin.index');
    }
}
