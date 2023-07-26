<?php

namespace App\Http\Controllers;

use App\Models\BlogMeta;
use Illuminate\Http\Request;

class BlogMetaController extends Controller
{
    public function show(){
        return view('admin.blog.meta.add_meta');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'meta_tags' => 'required',
            'meta_description' => 'required',
           
        ]);
    
       
        $blogmeta = BlogMeta::create([
            'title' => $validated['title'],
            
            'meta_tags' => $validated['meta_tags'],
            'meta_description' => $validated['meta_description'],
        
            
        ]);
    
        if ($blogmeta) {
            return redirect()->back()->with('success', 'Blog Meta Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add blog meta.');
        }
    }

    public function view(){
        $blogmeta = BlogMeta::all();
        return view('admin.blog.meta.view_meta',compact('blogmeta'));
    }

    public function edit($id){
        $blogmeta = BlogMeta::find($id);
        return view('admin.blog.meta.edit_meta', compact('blogmeta'));
    }

    public function update(Request $request, $id){
        $blogmeta = BlogMeta::find($id);

        
        $blogmeta->title = $request->title;
        $blogmeta->meta_tags = $request->meta_tags;
     
        $blogmeta->meta_description = $request->meta_description;
       
       
    
          
        $blogmeta->save();
        return redirect()->back()->with('success', 'Meta updated successfully.');

        
    }

    public function delete($id){
        $blogmeta = BlogMeta::find($id);

        if($blogmeta){

            $blogmeta->delete();
            
            return redirect()->back()->with('success', 'Blog Meta Deleted Successfully.');

            }
            return redirect()->back()->with('error', 'Blog Meta not found.');
        }

    }

