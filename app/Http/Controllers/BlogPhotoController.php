<?php

namespace App\Http\Controllers;

use App\Models\BlogPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPhotoController extends Controller
{
    public function view_blogPhoto(){
        return view('admin.blog_photo.add_blog_photo');
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
    
        $blogphoto = BlogPhoto::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'images' => json_encode($images), // Encode the array as a JSON string
        ]);
    
        if ($blogphoto) {
            return redirect()->back()->with('success', 'Blog Photo added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add blog photo.');
        }
    }

    public function show_blogPhoto(){
        $blog_photo = BlogPhoto::all();

    // Convert the "images" attribute from JSON to an array for each $about_photo
    $blog_photo->each(function ($blog_photo) {
        $blog_photo->images = json_decode($blog_photo->images, true);
    });

    return view('admin.blog_photo.view_blog_photo', compact('blog_photo'));

    }

    public function edit_blogPhoto($id){

        $blog_photo = BlogPhoto::find($id);

        // Decode the "images" attribute from JSON to an array
        $blog_photo->images = json_decode($blog_photo->images);
    
        return view('admin.blog_photo.edit_blog_photo', compact('blog_photo'));

    }

    public function update_blogPhoto(Request $request, $id){
        
    $blogphoto = BlogPhoto::find($id);
    $blogphoto->title = $request->title;
    $blogphoto->description = $request->description;

    if ($request->hasFile('image')) {
        $imagePaths = [];

        foreach ($request->file('image') as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $imageName);
            $imagePaths[] = $imageName;
        }

        $blogphoto->images = json_encode($imagePaths);
    }

    $blogphoto->save();
    return redirect()->back()->with('success', 'Blog Photo updated successfully.');
    }

    public function delete_blogPhoto($id){

        $blogphoto = BlogPhoto::find($id);

        if($blogphoto){
            $blogphoto->delete();
            return redirect()->back()->with('success', 'Blog Photo Deleted Successfully.');
        }

        return redirect()->back()->with('error', 'Blog Photo not found.');

    }

}


