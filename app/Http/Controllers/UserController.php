<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(User $user){

        $users = $user->with('roles')->get();

        return view('admin.list_users')->with('users',$users);
    }
}
