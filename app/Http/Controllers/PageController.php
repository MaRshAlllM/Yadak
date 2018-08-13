<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function aboutus(){

        return view('aboutus');

    }

    function contactus(){

        return view('contactus');

    }
}
