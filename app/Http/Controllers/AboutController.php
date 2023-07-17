<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function add_about(){
        return view('admin.about.add_about');
    }

    public function add_about_details(Request $request){
        $about = new About;
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image.*' => 'required|image',
            'photos_taken' => 'nullable',
            'projects_completed' => 'nullable',
            'cups_of_coffee' => 'nullable',
            'clients_working' => 'nullable',
       


        ]);

        $images = [];

        foreach ($validated['image'] as $pic) {
            $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();

            $pic->move(public_path('images'), $filename);

            $images[] = $filename;
        }

    
        $about = About::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'images' => json_encode($images),
            'photos_taken' => $validated['photos_taken'],
            'projects_completed' => $validated['projects_completed'],
            'cups_of_coffee' => $validated['cups_of_coffee'],
            'clients_working' => $validated['clients_working'],
        ]);

        if ($about) {
            
            return redirect()->back()->with('success', 'About Details added successfully.');
        } else {
            
            return redirect()->back()->with('error', 'Failed to add about details.');
        }

    }

    public function view_about(){
        $about = About::all();
        return view('admin.about.view_about',compact('about'));

    }

    public function edit_about($id){
        $about = About::find($id);
        return view('admin.about.edit_about',compact('about'));

    }

    public function update_about(Request $request,$id){

        $about = About::find($id);

        $about->title=$request->title;
        $about->description=$request->description;
        $about->photos_taken=$request->photos_taken;
        $about->projects_completed=$request->projects_completed;
        $about->cups_of_coffee=$request->cups_of_coffee;
        $about->clients_working=$request->clients_working;


        $images = $request->file('image');


        if($images){

            $imagePaths = [];


            foreach($images as $image){
                $imagename = time() .'.'.$image->getClientOriginalExtension();
                $image->move('images', $imagename);
                $imagePaths[]=$imagename;
            }

            $about->images = json_encode($imagePaths);
        }

        $about->save();

        return redirect()->back()->with('success', 'About Details Added Successfully.');
       

    }

    public function delete_about($id){

        $about = About::find($id);

        if($about){
            $about->delete();
            return redirect()->back()->with('success', 'About Details Deleted Successfully.');
        }
        return redirect()->back()->with('error', 'Details Not Found.');

    }
}
