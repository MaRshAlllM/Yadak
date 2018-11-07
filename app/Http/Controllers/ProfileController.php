<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    function index(){

        $u = User::where('email',auth()->user()->email)->get();
        return view('user_profile')->with('user',$u);
    }

    function edit(Request $request){

        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'address' => 'required|string|min:5|max:255',
            'job' => 'required|string|min:3|max:100',
            'phone' => 'required|digits:11',
            'cellphone' => 'required|digits:11'
        ]);

        $up = User::where('email',auth()->user()->email)->first();
        $up->name = $request->name;
        $up->address = $request->address;
        $up->job = $request->job;
        $up->phone = $request->phone;
        $up->cellphone = $request->cellphone;
        $up->save();

        return redirect()->route('profile')->with('message','ویرایش با موفقیت انجام شد.');

    }
}
