<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function show_team(){
        return view('admin.team.add_team');
    }

    public function add_team(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image.*' => 'required|image',
        ]);

        $images = [];

        foreach ($validated['image'] as $pic) {
            $filename = "IMG" . date('YmdHis') . rand(100, 9999) . '.' . $pic->getClientOriginalExtension();

            $pic->move(public_path('images'), $filename);

            $images[] = $filename;
        }

    
        $team = Team::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'images' => json_encode($images),
        ]);

        if ($team) {
            
            return redirect()->back()->with('success', 'Team Member Added Successfully.');
        } else {
           
            return redirect()->back()->with('error', 'Failed to add Team Member.');
        }
    }

    public function view_team(){
        $team =Team::all();
        return view('admin.team.view_team',compact('team'));
    }

    public function edit_team($id){
        $team = Team::find($id);
        return view('admin.team.edit_team', compact('team'));
    }

    public function update_team(Request $request, $id)
{
    $team = Team::find($id);

    if (!$team) {
        return redirect()->back()->with('error', 'Team not found.');
    }

    $team->name = $request->name;
    $team->position = $request->position;

    $images = $request->file('image');

    if ($images) {
        $imagePaths = [];

        foreach ($images as $image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $imagename);
            $imagePaths[] = $imagename;
        }

        $team->images = json_encode($imagePaths);
    }

    $team->save();

    return redirect()->back()->with('success', 'Team updated successfully.');
}

public function delete_team($id){

    $team=Team::find($id);

    if($team){
        $team->delete();
        return redirect()->back()->with('success','Team Member Deleted Succesfully.');
    }
    return redirect()->back()->with('error','Team Member not found.');
   
}

    }

