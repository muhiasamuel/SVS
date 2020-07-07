<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    //ensurin tat only autenticated users can view te pae
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
        return view ('admin.users.index') ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

//only admin allowed to do te editing
if (Gate::denies('edit-users')) {
    # code...
    return \redirect(\route('admin.users.index'));
}

        //Edit user code
        $roles = Role::all();
        return view('admin.users.edit')->with([
            'user'=>$user,
            'roles'=>$roles
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //updatin te user
        $user->roles()->sync ( $request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->reg_number = $request->reg_number;
        $user->save();
        return \redirect()->route('admin.users.index'); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if (Gate::denies('delete-users')) {
            # code...
            return \redirect(\route('admin.users.index'));
        }
        //delete users
        //dd($user);
        $user->roles()->detach();
        $user->delete();
        return \redirect()->route('admin.users.index');

    }
}
