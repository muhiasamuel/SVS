<?php

namespace App\Http\Controllers;
use App\School;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function Index() {
    
    return view('admin.school.search');
       
   }
}
