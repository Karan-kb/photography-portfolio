<?php

namespace App\Http\Controllers;

use App\Models\HomeMeta;
use Illuminate\Http\Request;

class HomeMetaController extends Controller
{
    public function show(){
        return view('admin.meta.add_meta');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'meta_tags' => 'required',
            'meta_description' => 'required',
           
        ]);
    
       
        $homemeta = HomeMeta::create([
            'title' => $validated['title'],
            
            'meta_tags' => $validated['meta_tags'],
            'meta_description' => $validated['meta_description'],
        
            
        ]);
    
        if ( $homemeta) {
            return redirect()->back()->with('success', 'Home Meta Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add home meta.');
        }
    }

    public function view(){
        $homemeta = HomeMeta::all();
        return view('admin.meta.view_meta',compact('homemeta'));
    }

    public function edit($id){

        $homemeta = HomeMeta::find($id);
        return view('admin.meta.edit_meta',compact('homemeta'));

    }

    public function update(Request $request,$id){

        $homemeta = HomeMeta::find($id);

        $homemeta->title = $request->title;
        $homemeta->meta_tags = $request->meta_tags;
     
        $homemeta->meta_description = $request->meta_description;
       
       
    
          
        $homemeta->save();
        return redirect()->back()->with('success', 'Meta updated successfully.');

    }

    public function delete($id){
        $homemeta = HomeMeta::find($id);

        if($homemeta){
            $homemeta->delete();
            return redirect()->back()->with('success', 'Home Meta Deleted Successfully.');
        }
        return redirect()->back()->with('error', 'Home Meta Not Found.');
    }
}
