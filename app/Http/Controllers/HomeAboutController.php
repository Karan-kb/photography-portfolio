<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use App\Models\AboutMeta;
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
        $latest_service = Service::latest()->first();
        $latest_testi  = Testimonials::latest()->first();
        $aboutmeta = AboutMeta::all();
   
        
        
        return view('home.about.about_us', compact('about', 'team', 'service', 'testimonial', 'about_photo', 'latest_service','latest_testi','aboutmeta'));
    }
    
    


    
}
