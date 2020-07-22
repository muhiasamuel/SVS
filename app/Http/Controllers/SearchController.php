<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function Index() {
       dd(Request::get('q')->get());
       
   }
}
