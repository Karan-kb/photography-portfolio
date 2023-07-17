<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        ]);

        $images = [];

        foreach ($validated['image'] as $pic) {
            $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('images'), $filename);

            $images[] = $filename;
        }

        $testimonial = Testimonials::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'message' => $validated['message'],
            'image' => json_encode($images),
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
