<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDetailController extends Controller
{
    public function show(){
        return view('admin.client.add_client');

    }
}
