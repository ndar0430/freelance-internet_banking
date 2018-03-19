<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use App\Role;
use App\User;
class RoleUserController extends Controller
{
    public function index()
    {
        $roleuser_table = RoleUser::with('role', 'user')->paginate(10);
        
        return view('admin.users.roleuser.index',compact('roleuser_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleuser_table = RoleUser::with('role', 'user')->get();
        return view('dltb.human_resource.users.role.create_roleuser',compact('roleuser_table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_id' => 'required',
            'user_id'   => 'required',
            'role_id' => "UserIdHasRoleAlready:{$request->user_id}",
            ]);

        $roleuser = new RoleUser;
        $roleuser->role_id = $request['role_id'];
        $roleuser->user_id = $request['user_id'];
        $roleuser->save();

        $success = array('ok'=> 'The Role has been attached to the user');
        return redirect()->route('roleuser.index')->with($success);
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
    public function edit($user_id)
    {
        $roleuser = RoleUser::with('role','user')->find($user_id);
        $roles = Role::all();
        $users = User::all();
        

        return view('admin.users.roleuser.edit',compact('users', 'roleuser', 'roles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $this->validate($request, [
            'role_id' => 'required',
            'user_id'   => 'required',
            'role_id' => "UserIdHasRoleAlready:{$request->user_id}",
        ]);
        
        $roleuser = RoleUser::find($user_id);
        $roleuser = RoleUser::where('user_id', $user_id)->update([
        'role_id' => $request['role_id'],
        'user_id' => $request['user_id'],
        ]);

        $success = array('ok'=> 'The Role has been Updated Successfully');

        return redirect()->route('roleuser.index')->with($success);
    }
}
