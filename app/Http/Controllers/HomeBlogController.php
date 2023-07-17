<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\AboutAuthor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeBlogController extends Controller
{
    public function home_blog(){

        $blog= Blog::paginate(2);
        $about_author = AboutAuthor::all();
     

        
        return view('home.blog.view_blog',compact('blog' , 'about_author'));
    }
    
    public function blog_show()
    {
        $last_blog = Blog::orderBy('created_at', 'desc')->take(4)->get();
        $about_author = AboutAuthor::all();
    
        return view('home.blog.view_blog', compact('last_blog', 'about_author'));
    }
    
    
    public function view_blog()
    {  
        $last_blog = Blog::orderBy('created_at', 'desc')->take(1)->get();
        $about_author = AboutAuthor::all();
    
        return view('home.blog.view_blog', compact('last_blog', 'about_author'));
    }
    
    
    

    

}
