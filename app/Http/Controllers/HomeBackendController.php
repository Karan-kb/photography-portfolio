<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeBackendController extends Controller
{
    public function about_us(){
        return view('admin.home.add_home');
    }

    public function add_photo(Request $request){

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

    
        $home = Home::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'images' => json_encode($images),
        ]);

        if ($home) {
            // Portfolio created successfully
            return redirect()->back()->with('success', 'Photo added successfully.');
        } else {
            // Portfolio creation failed
            return redirect()->back()->with('error', 'Failed to add photo.');
        }


    }

    public function view_photo(){

        $home=Home::all();
        return view('admin.home.view_home', compact('home'));

    }

    public function edit_photo($id){

        $home=Home::find($id);
        return view('admin.home.edit_home', compact('home'));

    }

    public function update_photo(Request $request, $id){

        $home = Home::find($id);
        
        $home->title = $request->title;
        $home->description = $request->description;
    
        $images = $request->file('image');
    
        if ($images) {
            $imagePaths = [];
    
            foreach ($images as $image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images', $imagename);
                $imagePaths[] = $imagename;
            }
    
            $home->images = json_encode($imagePaths);
        }
    
        $home->save();
    
        return redirect()->back()->with('success', 'Photo updated successfully.');
    }
    public function delete_photo($id){
        $home=Home::find($id);

        if($home){
            $home->delete();
            return redirect()->back()->with('success', 'Photo Deleted Successfully.');
        }
        return redirect()->back()->with('error', 'Photo not found.');

    }
    }

