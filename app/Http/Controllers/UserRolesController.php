<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class UserRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.user_roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $permissions = Permission::all();

        return view('admin.user_roles.create',compact('permissions'));
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
            'label' => 'required',
            'permission' => 'required'

        ]);

        $role = Role::create([

            'name' => $request->name,
            'label' => $request->label

        ]);
        
        $role->permissions()->attach($request->permission);

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
        $role = Role::find($id);

        $permissions = Permission::all();

        return view('admin.user_roles.edit',compact('permissions'))->with('role',$role);

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

            'name'=>'required',
            'label'=>'required',
        ]);

        $role = Role::find($id);

        $role->name = $request->name;
        $role->label = $request->label;
        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect()->route('roles.index')->with('message','ویرایش با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::find($id);
        $role->delete();
        return redirect()->back()->with('message','حذف با موفقیت انجام شد');
    }
}
