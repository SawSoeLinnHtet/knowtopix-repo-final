<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestBlog;

class BlogMailController extends Controller
{
    public function verify(Request $request)
    {
        $is_blog = Blog::where('slug', $request->blog_slug)->where('user_id', $request->user_id)->first();

        if($is_blog){
            return redirect()->route('site.blog.details', $is_blog);
        }
    }

    public function reject(Request $request)
    {
        $is_blog = RequestBlog::where('slug', $request->blog_slug)->where('user_id', $request->user_id)->where('status', 'reject')->first();

        if ($is_blog) {
            return redirect()->route('site.blog.request.edit', $is_blog->slug);
        }
    }
}
