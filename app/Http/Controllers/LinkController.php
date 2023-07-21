<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function view(){
        return view('admin.contact_link.add_link');
    }

    public function create(request $request){
        $validated = $request->validate([
            'title' => 'required',
            'facebook_url' => 'required|url',
            'instagram_url' => 'required|url',
        ]);
    
       
    
        $linkcontact = Link::create([
            'title' => $validated['title'],
            'facebook_url' => $validated['facebook_url'],
            'instagram_url' => $validated['instagram_url'], 
        ]);
    
        if ($linkcontact) {
            return redirect()->back()->with('success', 'Contact Link added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add contact link.');
        }
    }
public function show(){
    $contactlink = Link::all();
    return view('admin.contact_link.view_link', compact('contactlink'));
}

public function edit($id){

    $contactlink = Link::find($id);
    return view('admin.contact_link.edit_link', compact('contactlink'));

}

public function update(Request $request, $id){

    $link = Link::find($id);
    
    $link->title = $request->title;
    $link->facebook_url = $request->facebook_url;
    $link->instagram_url = $request->instagram_url;

   

    $link->save();
    return redirect()->back()->with('success', 'Contact Link updated successfully.');
    
}

public function delete($id){

    $link =Link::find($id);

    if($link){

        $link->delete();
        return redirect()->back()->with('success', 'Link deleted successfuly.');
    }
    return redirect()->back()->with('error', 'Link not Found.');

}
  
}
