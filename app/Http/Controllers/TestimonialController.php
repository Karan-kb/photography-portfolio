<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function show()
    {
        return view('admin.testimonials.add_testimonial');
    }

 

public function add_testimonial(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'company' => 'required',
        'message' => 'required',
        'image.*' => 'required|image',
        'image1.*' => 'required|image',
    ]);

    $images = [];
    $images1 = [];

    // Check if the directory 'public/image1/' exists, if not, create it.
    if (!File::exists(public_path('image1'))) {
        File::makeDirectory(public_path('image1'));
    }

    foreach ($validated['image'] as $pic) {
        $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();
        $image = Image::make($pic);

        // Resize the image to passport size (for example, 150x150 pixels)
        $image->fit(150, 150);

        $image->save(public_path('images') . '/' . $filename);

        $images[] = $filename;
    }

    foreach ($validated['image1'] as $pic) {
        $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();
        $pic->move(public_path('image1'), $filename);

        $images1[] = $filename;
    }

    $testimonial = Testimonials::create([
        'name' => $validated['name'],
        'company' => $validated['company'],
        'message' => $validated['message'],
        'image' => json_encode($images),
        'image1' => json_encode($images1),
    ]);

    if ($testimonial) {
        return redirect()->back()->with('success', 'Testimonial Added Successfully.');
    }

    return redirect()->back()->with('error', 'Failed to add Testimonial.');
}


    public function view_testimonial()
    {
        $testimonials = Testimonials::all();
        return view('admin.testimonials.view_testimonial', compact('testimonials'));
    }

    public function edit_testimonial($id)
    {
        $testimonial = Testimonials::find($id);
        if (!$testimonial) {
            return redirect()->back()->with('error', 'Testimonial not found.');
        }

        return view('admin.testimonials.edit_testimonial', compact('testimonial'));
    }

    public function update_testimonial(Request $request, $id)
{
    $testimonial = Testimonials::find($id);
    $testimonial->name = $request->name;
    $testimonial->company = $request->company;
    $testimonial->message = $request->message;

    $images = $request->file('image');
    $images1 = $request->file('image1');

    if ($images) {
        $imagePaths = [];

        foreach ($images as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = $imageName;
        }

        // Delete old images if needed
        $oldImages = json_decode($testimonial->image, true);
        foreach ($oldImages as $oldImage) {
            if (!in_array($oldImage, $imagePaths)) {
                File::delete(public_path('images/' . $oldImage));
            }
        }

        $testimonial->image = json_encode($imagePaths);
    }

    if ($images1) {
        $imagePaths1 = [];

        foreach ($images1 as $image1) {
            $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('image1'), $imageName1); // Use $image1 variable here
            $imagePaths1[] = $imageName1;
        }

        // Delete old images if needed
        $oldImages1 = json_decode($testimonial->image1, true);
        foreach ($oldImages1 as $oldImage1) {
            if (!in_array($oldImage1, $imagePaths1)) {
                File::delete(public_path('image1/' . $oldImage1));
            }
        }

        $testimonial->image1 = json_encode($imagePaths1);
    }

    $testimonial->save();

    return redirect()->back()->with('success', 'Testimonial Updated Successfully.');
}


    public function delete_testimonial($id){

        $testimonial = Testimonials::find($id);

        if($testimonial){
            $testimonial->delete();
            return redirect()->back()->with('success', 'Testimonial Added Successfully.');
        }
        return redirect()->back()->with('error', 'No Testimonials Added.');
    }
}
