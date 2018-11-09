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

    function transport(){

        return view('transport');

    }

    function discount(){

        return view('discount');

    }

    function support(){

        return view('support');

    }
}
