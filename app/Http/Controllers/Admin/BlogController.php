<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\BlogCreateAcceptEmail;
use App\Models\Blog;
use App\Models\Enums\BlogRequestTypes;
use App\Models\RequestBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function request()
    {
        $blogs = RequestBlog::where('status', 'pending')->with('User:id,name')->get();

        return view('backend.blogs.request', ['blogs' => $blogs]);
    }

    public function accept(RequestBlog $blog)
    {
        if($blog->status  == BlogRequestTypes::PENDING){
            $blog->update([
                'status' => BlogRequestTypes::ACCEPT
            ]);

            $blog = Blog::create([
                'title' => $blog->title,
                'slug' => $blog->slug,
                'logo' => $blog->logo,
                'category_id' => $blog->category_id,
                'author_name' => $blog->author_name,
                'author_bios' => $blog->author_bios,
                'email' => $blog->email,
                'description' => $blog->description,
                'user_id' => $blog->user_id
            ]);

            BlogCreateAcceptEmail::dispatch($blog);

            return redirect()->route('admin.blogs.request')->with('success', 'Successfully accepted');
        }
    }
}
