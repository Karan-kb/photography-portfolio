<?php

namespace App\Http\Controllers;

use App\Models\AboutMeta;
use Illuminate\Http\Request;

class AboutMetaController extends Controller
{
    public function view(){
        
        return view('admin.about.meta_tag.add_aboutmeta');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'meta_tags' => 'required',
            'meta_description' => 'required',
           
        ]);
    
       
        $aboutmeta = AboutMeta::create([
            'title' => $validated['title'],
            
            'meta_tags' => $validated['meta_tags'],
            'meta_description' => $validated['meta_description'],
        
            
        ]);
    
        if ($aboutmeta) {
            return redirect()->back()->with('success', 'About Meta Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add about meta.');
        }
    }

    public function show(){
        $aboutmeta = AboutMeta::all();
        return view('admin.about.meta_tag.view_aboutmeta', compact('aboutmeta'));
    }

    public function edit($id){

        $aboutmeta = AboutMeta::find($id);
        return view('admin.about.meta_tag.edit_aboutmeta', compact('aboutmeta'));

    }

    public function update(Request $request, $id){
        
    $aboutmeta = AboutMeta::find($id);
    $aboutmeta->title = $request->title;
    $aboutmeta->meta_tags = $request->meta_tags;
 
    $aboutmeta->meta_description = $request->meta_description;
   
   

      
    $aboutmeta->save();
    return redirect()->back()->with('success', 'Meta updated successfully.');
    }

    public function delete($id){
        $aboutmeta = AboutMeta::find($id);

        if($aboutmeta){
            $aboutmeta->delete();
            return redirect()->back()->with('success', 'About Meta Deleted Successfully.');
        }

        return redirect()->back()->with('error', 'About Meta Not Found.');
    }
}
