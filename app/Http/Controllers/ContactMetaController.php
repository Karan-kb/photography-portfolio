<?php

namespace App\Http\Controllers;

use App\Models\ContactMeta;
use Illuminate\Http\Request;

class ContactMetaController extends Controller
{
    public function show(){
        return view('admin.contact.meta.add_meta');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'meta_tags' => 'required',
            'meta_description' => 'required',
           
        ]);
    
       
        $contactmeta = ContactMeta::create([
            'title' => $validated['title'],
            
            'meta_tags' => $validated['meta_tags'],
            'meta_description' => $validated['meta_description'],
        
            
        ]);
    
        if ($contactmeta) {
            return redirect()->back()->with('success', 'Contact Meta Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add contact meta.');
        }

    }

    public function view(){
        $contactmeta = ContactMeta::all();
        return view('admin.contact.meta.view_meta',compact('contactmeta'));

}

public function edit($id){

    $contactmeta = ContactMeta::find($id);
    return view('admin.contact.meta.edit_meta', compact('contactmeta'));

}

public function update(Request $request, $id){

    $contactmeta = ContactMeta::find($id);
     
    $contactmeta->title = $request->title;
    $contactmeta->meta_tags = $request->meta_tags;
 
    $contactmeta->meta_description = $request->meta_description;
   
   

      
    $contactmeta->save();
    return redirect()->back()->with('success', 'Meta updated successfully.');

}

public function delete($id){

    $contactmeta = ContactMeta::find($id);

    if($contactmeta){

        $contactmeta->delete();
        return redirect()->back()->with('success', 'Contact Meta Added Successfully.');

    }
    return redirect()->back()->with('error', 'Contact Meta not found.');

}
}
