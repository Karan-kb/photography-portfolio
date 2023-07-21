<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function add_portfolio()
    {
        return view('admin.portfolio.add_portfolio');
    }

    public function create_portfolio(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image.*' => 'required|image',
    ]);

    $images = [];

    foreach ($validated['image'] as $pic) {
        $filename = "IMG" . uniqid() . '.' . $pic->getClientOriginalExtension();

        $pic->move(public_path('images'), $filename);

        $images[] = $filename;
    }

    $portfolio = Portfolio::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'images' => json_encode($images),
    ]);

    if ($portfolio) {
        // Portfolio created successfully
        return redirect()->back()->with('success', 'Portfolio added successfully.');
    } else {
        // Portfolio creation failed
        return redirect()->back()->with('error', 'Failed to add portfolio.');
    }
}

    public function view_portfolio(){

        $portfolios = Portfolio::all();
        return view('admin.portfolio.view_portfolio',compact('portfolios'));

        }

        public function delete_portfolio($id)
        {
            $portfolio = Portfolio::find($id);
        
            if ($portfolio) {
                $portfolio->delete();
                return redirect()->back()->with('success', 'Portfolio deleted successfully.');
            }
        
            return redirect()->back()->with('error', 'Portfolio not found.');
        }

        public function edit_portfolio($id)
        {
            $portfolio = Portfolio::find($id);
            return view('admin.portfolio.edit_portfolio', compact('portfolio'));
        }
        
        


        public function update_portfolio(Request $request, $id)
        {
            $portfolio = Portfolio::find($id);
        
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;
        
            $images = $request->file('image');
        
            if ($images) {
                $imagePaths = [];
        
                foreach ($images as $image) {
                    $imagename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('images', $imagename);
                    $imagePaths[] = $imagename;
                }
        
                $portfolio->images = json_encode($imagePaths);
            }
        
            $portfolio->save();
        
            return redirect()->back()->with('success', 'Portfolio updated successfully.');
        }
        
        
    }        
