<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function show_service(){
        return view('admin.services.add_service');
    }

    public function add_service(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image.*' => 'nullable|image',
    ]);

    $images = [];

    if ($request->hasFile('image')) {
        foreach ($validated['image'] as $pic) {
            $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();

            $pic->move(public_path('images'), $filename);

            $images[] = $filename;
        }
    }

    $service = Service::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'images' => json_encode($images),
    ]);

    if ($service) {
        return redirect()->back()->with('success', 'Service Added Successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to add service.');
    }
}

public function view_service(){
    $service = Service::all();
    return view('admin.services.view_service', compact('service'));
}

public function edit_service($id){

    $service=Service::find($id);
    return view('admin.services.edit_service', compact('service'));

}

public function update_service(Request $request, $id){

    $service = Service::find($id);
    
    if (!$service) {
        return redirect()->back()->with('error', 'Team not found.');
    }

    $service->title = $request->title;
    $service->description = $request->description;

   

   

    $service->save();

    return redirect()->back()->with('success', 'Service updated successfully.');

}

public function delete_service($id){

    $service= Service::find($id);

    if($service){

        $service->delete();
        return redirect()->back()->with('success', 'Service Deleted Successfully.');
    }
    return redirect()->back()->with('error', 'Service Not Found.');
}
}
