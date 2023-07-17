<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function show_contact(){
        return view('admin.contact.add_contact');
    }


    public function add_contact(Request $request){
        $validated=$request->validate([
            'title' =>'required',
            'description' =>'required',
            'address' =>'required',
            'phone' =>'required',
            'email' =>'required',
            'slogan'=>'required',
            'image.*'=> 'required|image',
        ]);

        $image=[];


        foreach($validated['image'] as $pic){
            $filename="IMG" . date('YmdHis') . rand(100, 9999) .'.'. $pic->getClientOriginalExtension();

            $pic->move(public_path('images'), $filename);

            $images[] = $filename;
        

        }

        $contact = Contact::create([
            'title'=>$validated['title'],
            'description'=>$validated['description'],
            'phone'=>$validated['phone'],
            'email'=>$validated['email'],
            'address'=>$validated['address'],
            'slogan'=>$validated['slogan'],
            
            'images'=>json_encode($images),
        ]);

        if($contact){
            return redirect()->back()->with('success', 'Contact Added Successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to add Contact.');
        }
    }

    public function view_contact(){
        $contact = Contact::all();
        return view('admin.contact.view_contact', compact('contact'));
    }

    public function edit_contact($id){

        $contact = Contact::find($id);
        return view('admin.contact.edit_contact',compact('contact'));

    }

    public function update_contact(request $request, $id){

        $contact = Contact::find($id);
        
    

    if (!$contact) {
        return redirect()->back()->with('error', 'Team not found.');
    }

    $contact->title = $request->title;
    $contact->description = $request->description;
    $contact->address = $request->address;
    $contact->phone = $request->phone;
    $contact->email = $request->email;
    $contact->slogan = $request->slogan;
   

    $images = $request->file('image');

    if ($images) {
        $imagePaths = [];

        foreach ($images as $image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $imagename);
            $imagePaths[] = $imagename;
        }

        $contact->images = json_encode($imagePaths);
    }

    $contact->save();

    return redirect()->back()->with('success', 'Contact updated successfully.');

    }

    public function delete_contact($id){

        $contact = Contact::find($id);


        if($contact){
            $contact->delete();
            return redirect()->back()->with('success', 'Contact Deleted Successfully.');
        }
        return redirect()->back()->with('error', 'Contact not found.');

    }

   
}

