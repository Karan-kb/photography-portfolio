<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeContactController extends Controller
{
    public function contact_us(){

        $contacts = Contact::all();
        return view('home.contacts.contact_us', compact('contacts'));
    }
}
