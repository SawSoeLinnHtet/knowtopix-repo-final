<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\BlogPost;
use App\Models\RequestBlog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Models\Enums\BlogRequestTypes;

class BlogController extends Controller
{
    public function index()
    {
        return view('site.blogs.index');
    }

    public function request()
    {
        return view('site.blogs.request');
    }

    public function request_store(BlogRequest $request)
    {
        $slug = Str::slug($request->title);
        $sampleFile = "";
        if (isset($request->sample_file)) {
            $sampleFile = time() . '-' .$slug.'.'.$request->sample_file->extension();

            $request->sample_file->move(public_path('images/blog_file'), $sampleFile);
        }

        RequestBlog::create([
            'title' => $request->title,
            'slug' => $slug,
            'author_name' => $request->author_name,
            'author_bios' => $request->author_bios,
            'email' => $request->email,
            'sample_file' => $sampleFile,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'status' => BlogRequestTypes::PENDING
        ]);

        return redirect()->route('site.index')->with('success', 'Your Blog Created Successfully');
    }

    public function details(Blog $blog)
    {
        $owner = $blog->user_id == auth()->user()->id;

        $blog = $blog->with('BlogPost')->first();

        $posts = BlogPost::where('blog_id', $blog->id)->with('Blog')->get();

        return view('site.blogs.details', ['blog' => $blog, 'owner' => $owner, 'posts' => $posts]);
    }
}
