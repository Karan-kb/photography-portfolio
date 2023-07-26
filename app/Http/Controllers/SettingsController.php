<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Validation\Rule;




class SettingsController extends Controller
{
    public function view()
    {
        return view('admin.settings.change_password');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current-password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::guard('admin')->user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new-password' => 'required|min:8',
            'password_confirmation' => 'required|same:new-password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::guard('admin')->user();
        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function show()
    {
        $admin = Auth::guard('admin')->user();
    
        return view('admin.settings.change_details', compact('admin'));
    }
    
    public function change_details(Request $request)
{
    if (!$request->isMethod('post')) {
        return redirect()->back()->with('error', 'Invalid request method.');
    }
  
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $admin = Auth::guard('admin')->user();

    
    $admin->name = $request->input('name');
    $admin->phone = $request->input('phone');
    $admin->email = $request->input('email');
    $admin->description = $request->input('description');

    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('profile_images', 'public');
        $admin->image = $imagePath;
    }

    $admin->save();

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

public function show_details(){
    
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.settings.view_details', compact('admin'));
    }
   
    }

    public function admin_details(){
        $admin = Auth::guard('admin')->user();
        return view('admin.settings.change_details', compact('admin'));
        
    }

    public function create_adminForm(){
        return view('admin.create_admin.add_admin');
    }


    public function addAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:admins,email', 
            'description' => 'required',
            'password' => 'required',
        ]);
    
        $admin = Admin::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'description' => $validated['description'],
            'password' => bcrypt($validated['password']), 
        ]);
    
        if ($admin) {
            return redirect()->back()->with('success', 'Admin Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Admin cannot be added.');
        }
    }
    
    public function viewAdmin(){
        $admin = Admin::all();
        return view('admin.create_admin.view_admin',compact('admin'));
    }

    public function editAdmin($id){

        $admin = Admin::find($id);
        return view('admin.create_admin.edit_admin',compact('admin'));

    }




    
 

public function updateAdmin(Request $request, $id)
{
    $admin = Admin::find($id);

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'email' => [
            'required',
            Rule::unique('admins')->ignore($admin->id),
        ],
        'description' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $admin->name = $request->input('name');
    $admin->phone = $request->input('phone');
    $admin->email = $request->input('email');
    $admin->description = $request->input('description');

    $admin->save();

    // Re-authenticate the admin with updated details
    $admin = Auth::guard('admin')->user();

    return redirect()->back()->with('success', 'Admin updated successfully.');
}

    

}




