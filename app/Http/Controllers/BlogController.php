<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


use App\Models\Blog;

class BlogController extends Controller
{
    public function view(){
        return view('admin.blog.add_blog');
    }

    public function add_blog(Request $request){

        $validated=$request->validate([
            'title' =>'required',
            'description' =>'required',
            'summary'=>'required',
            'image.*'=> 'required|image',
        ]);

        $image=[];


        foreach($validated['image'] as $pic){
            $filename="IMG" . date('YmdHis') . rand(100, 9999) .'.'. $pic->getClientOriginalExtension();

            $pic->move(public_path('images'), $filename);

            $images[] = $filename;
        

        }

        $blog = Blog::create([
            'title'=>$validated['title'],
            'description'=>$validated['description'],
            'summary'=>$validated['summary'],
            'images'=>json_encode($images),
        ]);

        if($blog){
            return redirect()->back()->with('success', 'Blog Added Successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to add Blog.');
        }
    }
    public function view_blog(){

        $blogs=Blog::all();
        return view('admin.blog.view_blog', compact('blogs'));
    }

    public function edit_blog($id){
        $blog = Blog::find($id);

        return view('admin.blog.edit_blog', compact('blog'));
    }

    public function update_blog(Request $request, $id)
{
    $blog = Blog::find($id);
    $blog->title = $request->title;
    $blog->description = $request->description;
    $blog->summary = $request->summary;

    if ($request->hasFile('image')) {
        $imagePaths = [];

        foreach ($request->file('image') as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $imageName);
            $imagePaths[] = $imageName;
        }

        $blog->images = json_encode($imagePaths);
    }

    $blog->save();
    return redirect()->back()->with('success', 'Blog updated successfully.');
}


public function delete_blog($id){

    $blog = Blog::find($id);

    if($blog){
        
    $blog->delete();
    return redirect()->back()->with('success', 'Blog deleted Successfully.');

    }
    return redirect()->back()->with('error', 'Blog not found.');

    
}
}
