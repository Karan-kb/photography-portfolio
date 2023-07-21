<?php

namespace App\Http\Controllers;

use App\Models\ContactPhoto;
use Illuminate\Http\Request;

class ContactPhotoController extends Controller
{
    public function view(){
        return view('admin.contact_photo.add_contact_photo');
    }


    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image.*' => 'required|image',
        ]);
    
        $images = [];
    
        foreach ($validated['image'] as $pic) {
            $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('images'), $filename);
            $images[] = $filename;
        }
    
        $contactphoto = ContactPhoto::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'images' => json_encode($images), // Encode the array as a JSON string
        ]);
    
        if ($contactphoto) {
            return redirect()->back()->with('success', 'Contact Photo added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add contact photo.');
        }
    } 

    public function view_contactPhoto(){

        $contactphoto = ContactPhoto::all();

        $contactphoto->each(function ($contactphoto) {
        $contactphoto->images = json_decode($contactphoto->images, true);
    });

    return view('admin.contact_photo.view_contact_photo', compact('contactphoto'));
    }

    public function edit_contactPhoto($id){
        $contact_photo = ContactPhoto::find($id);

        // Decode the "images" attribute from JSON to an array
        $contact_photo->images = json_decode($contact_photo->images);
    
        return view('admin.contact_photo.edit_contact_photo', compact('contact_photo'));

    }

    public function update_contactPhoto(Request $request, $id){
            
    $contactphoto = ContactPhoto::find($id);
    $contactphoto->title = $request->title;
    $contactphoto->description = $request->description;

    if ($request->hasFile('image')) {
        $imagePaths = [];

        foreach ($request->file('image') as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $imageName);
            $imagePaths[] = $imageName;
        }

        $contactphoto->images = json_encode($imagePaths);
    }

    $contactphoto->save();
    return redirect()->back()->with('success', 'Contact Photo updated successfully.');


    }

    public function delete_contactPhoto($id){

        $contactphoto= ContactPhoto::find($id);

        if($contactphoto){
            return redirect()->back()->with('success', 'Contact Photo Added Successfully.');
        }
        return redirect()->back()->with('error', 'Contact Photo not Found.');

    } 
}
