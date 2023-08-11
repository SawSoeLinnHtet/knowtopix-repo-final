<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogMailController extends Controller
{
    public function verify(Request $request)
    {
        $is_blog = Blog::where('slug', $request->blog_slug)->where('user_id', $request->user_id)->first();

        if($is_blog){
            return redirect()->route('site.blog.details', $is_blog);
        }
    }
}
