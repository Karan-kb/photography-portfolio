<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioMeta;

class PortfolioMetaController extends Controller
{
    public function show(){
        return view('admin.portfolio.meta_tag.add_meta');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'meta_tags' => 'required',
            'meta_description' => 'required',
           
        ]);
    
       
        $portfoliometa = PortfolioMeta::create([
            'title' => $validated['title'],
            
            'meta_tags' => $validated['meta_tags'],
            'meta_description' => $validated['meta_description'],
        
            
        ]);
    
        if ($portfoliometa) {
            return redirect()->back()->with('success', 'Portfolio Meta Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add portfolio meta.');
        }

    }


    public function view(){
        $portfoliometa = PortfolioMeta::all();
        return view('admin.portfolio.meta_tag.view_meta',compact('portfoliometa'));
    }

    public function edit($id){

        $portfoliometa = PortfolioMeta::find($id);
        return view('admin.portfolio.meta_tag.edit_meta',compact('portfoliometa'));

    }

    public function update(Request $request, $id){
        $portfoliometa = PortfolioMeta::find($id);

        $portfoliometa->title = $request->title;
        $portfoliometa->meta_tags = $request->meta_tags;
     
        $portfoliometa->meta_description = $request->meta_description;
       
       
    
          
        $portfoliometa->save();
        return redirect()->back()->with('success', 'Meta updated successfully.');

    }

    public function delete($id){
        $portfoliometa = PortfolioMeta::find($id);
        

        if($portfoliometa){
            $portfoliometa->delete();
            return redirect()->back()->with('success', 'Portfolio Meta deleted Successfully.');

        }

        return redirect()->back()->with('error', 'Portfolio Meta not found.');
    }
}
