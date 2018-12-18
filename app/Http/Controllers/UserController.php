<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserController extends Controller
{
    public function index(User $user){

        $users = $user->with('roles')->orderby('created_at','DESC')->paginate(10);

        return view('admin.users.index')->with('users',$users);
    }
    public function show($id){

    	$userdata =  User::with('roles')->find($id);

    	$roles = Role::get(['id','name','label']);
   		
    	return view('admin.users.show',compact('userdata','roles'));

    }
    private $password_checker = '';
    public function update(Request $request,$id){

    	if(!is_null($request->password)){
    		$this->password_checker = 'string|min:6|confirmed';
    	}
    	$this->validate($request, [
	            'name' => 'required|string|max:255',
	            'password' => $this->password_checker,
	            'address' => 'required|string|min:10|max:255',
	            'job' => 'required|string|min:3|max:100',
	            'phone' => 'required|digits:11',
	            'cellphone' => 'required|digits:11'
       		]);
    	$user = User::find($id);
    	$user->name =$request->name;
    	$this->password_checker != '' ? $user->password = \Hash::make($request->password) : null;
    	$user->address = $request->address;
    	$user->job = $request->job;
    	$user->phone = $request->phone;
    	$user->cellphone = $request->cellphone;
    	$user->save();

    	$user->roles()->sync($request->roles);

    	return redirect()->back()->with('message','تغییرات با موفقیت اعمال شد');




    }
    function single_user($user){
            $user = User::where('email',$user)->get();
            return view('admin.users.single')->with('user',$user);

    }
}
