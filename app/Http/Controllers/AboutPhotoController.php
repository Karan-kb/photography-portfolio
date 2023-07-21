<?php

namespace App\Http\Controllers;

use App\Models\AboutPhoto;
use App\Models\AboutAuthor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutPhotoController extends Controller
{
    public function show_about_photo(){
        return view('admin.about_photo.add_about_photo');
    }

    public function create(Request $request)
{
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

    $aboutphoto = AboutPhoto::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'images' => json_encode($images), // Encode the array as a JSON string
    ]);

    if ($aboutphoto) {
        return redirect()->back()->with('success', 'About Photo added successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to add about photo.');
    }
}

public function view_about_photo()
{
    $about_photos = AboutPhoto::all();

    // Convert the "images" attribute from JSON to an array for each $about_photo
    $about_photos->each(function ($about_photo) {
        $about_photo->images = json_decode($about_photo->images, true);
    });

    return view('admin.about_photo.view_about_photo', compact('about_photos'));
}








public function edit_photo($id)
{
    $about_photo = AboutPhoto::find($id);

    // Decode the "images" attribute from JSON to an array
    $about_photo->images = json_decode($about_photo->images);

    return view('admin.about_photo.edit_about_photo', compact('about_photo'));
}

public function update_photo(Request $request, $id)
{
    $aboutphoto = AboutPhoto::find($id);
    $aboutphoto->title = $request->title;
    $aboutphoto->description = $request->description;

    if ($request->hasFile('image')) {
        $imagePaths = [];

        foreach ($request->file('image') as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $imageName);
            $imagePaths[] = $imageName;
        }

        $aboutphoto->images = json_encode($imagePaths);
    }

    $aboutphoto->save();
    return redirect()->back()->with('success', 'About Photo updated successfully.');
}





// public function update_photo(Request $request, $id){

//     $aboutphoto = AboutPhoto::find($id);
   
//     $aboutphoto->title = $request->title;
//     $aboutphoto->description = $request->description;
    

//     if ($request->hasFile('image')) {
//         $imagePaths = [];

//         foreach ($request->file('image') as $image) {
//             $imageName = time() . '.' . $image->getClientOriginalExtension();
//             $image->move('images', $imageName);
//             $imagePaths[] = $imageName;
//         }

//         $aboutphoto->images = json_encode($imagePaths);
//     }

//     $aboutphoto->save();
//     return redirect()->back()->with('success', 'About Photo updated successfully.');

// }


public function delete_photo($id){
$aboutphoto = AboutPhoto::find($id);
if($aboutphoto){
    $aboutphoto->delete();
    return redirect()->back()->with('success', 'About Photo Deleted Successfully.');
}

return redirect()->back()->with('error', 'About Photo Not Found.');
}


}

