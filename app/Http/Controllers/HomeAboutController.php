<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use App\Models\AboutPhoto;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAboutController extends Controller
{
    public function about_us()
    {
        $about = About::all();
        $team = Team::all();
        $service = Service::all();
        $testimonial = Testimonials::all();
        $about_photo = AboutPhoto::latest()->first();
        
        
        return view('home.about.about_us', compact('about', 'team','service','testimonial','about_photo'));
    }


    
}
