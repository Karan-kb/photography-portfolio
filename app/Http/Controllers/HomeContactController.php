<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Contact;
use App\Models\ContactMeta;
use App\Models\ContactPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeContactController extends Controller
{
    public function contact_us(){

        $contacts = Contact::all();
        $contact_photo = ContactPhoto::latest()->first();
        $contactmeta = ContactMeta::all();
        $contactlink = Link::latest()->first();
        return view('home.contacts.contact_us', compact('contacts','contact_photo','contactmeta','contactlink'));
        
    }
}