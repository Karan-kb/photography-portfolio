<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\HomeMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        $homemeta= HomeMeta::all();
        return view('home',compact('homemeta'));
    }



}
