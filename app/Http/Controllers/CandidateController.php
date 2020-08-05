<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\School;

use App\poll;
use App\Role;
use App\User;
class CandidateController extends Controller
{
    public function index(School $school,User $user,Role $role)
    {
      
        
        $roles = Role::where('name', 'candidate')->paginate(1);
              
        return view('candidates.view',\compact('user','roles'));//->with([
        
     
    }

    public function viewDelegates(School $school,User $user,Role $role)
    {
      
        
        $roles = Role::where('name', 'delegate')->paginate(1);
       
            return view('candidates.delegates',\compact('user','roles'));//->with([
             
    
        
     
    }
}
