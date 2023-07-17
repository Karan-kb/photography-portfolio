<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SingleBlogController extends Controller
{
    public function view_singleBlog($id){

        $blog = Blog::find($id);
        return view('home.blog.blog_single', compact('blog'));

    }
}
