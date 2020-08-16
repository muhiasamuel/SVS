<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Image;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
}

   public function editAuthUser(){
      if (Auth::user()) {
        $user = User::find(Auth::user()->id);
        return view('user.edit')->withUser($user);  
      }
   }

   public function updateAuthUser (Request $request ){

  
       $user = User::find(Auth::user()->id);
       if ($user) {
       if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        //$path = public_path() . '/images/';
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(340, 500)->save(public_path('/images/'.$filename));
       }

         $user->name = $request->name;
         $user->email = $request->email;
         $user->reg_number = $request->reg_number;
         $user->designation = $request->designation;
         $user->candidate_agendas = $request->candidate_agendas;
         $user->About_user = $request->About_user;
         $user ->avatar = $filename;
         $user->password = Hash::make($request['password']);
       
         $user->save();
         return redirect()->back();
             }else{
           return redirect()->back();
       }
   }
   public function viewAuthUser (user $user ){
    $user = User::find(Auth::user()->id);
     return \view('user.view')->withUser($user);
   }
}
