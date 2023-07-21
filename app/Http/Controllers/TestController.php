<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function view_test(){

          
        return view('home.test');
        
    }
}
