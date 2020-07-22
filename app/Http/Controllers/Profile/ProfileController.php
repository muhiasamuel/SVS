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
        Image::make($avatar)->resize(300, 300)->save(public_path('/images/'.$filename));
       }

         $user->name = $request->name;
         $user->email = $request->email;
         $user->reg_number = $request->reg_number;
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
