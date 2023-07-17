<?php

namespace App\Http\Controllers;

use App\Models\AboutAuthor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutAuthorController extends Controller
{
    public function show_aboutAuthor(){
        return view('admin.about_author.add_aboutauthor');
    }

    public function add_aboutAuthor(Request $request){
        
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image.*' => 'required|image',
        ]);

        $images = [];

        foreach ($validated['image'] as $pic) {
            $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();

            $pic->move(public_path('images'), $filename);

            $image[] = $filename;
        }

    
        $aboutauthor = AboutAuthor::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => json_encode($image),
        ]);

        if ($aboutauthor){
            
            return redirect()->back()->with('success', 'About Author added successfully.');
        } else {
            
            return redirect()->back()->with('error', 'Failed to add about author.');
        }
    }

    public function view_aboutAuthor()
{
    $about_authors = AboutAuthor::all();
    return view('admin.about_author.view_aboutauthor', ['about_authors' => $about_authors]);
}



}

