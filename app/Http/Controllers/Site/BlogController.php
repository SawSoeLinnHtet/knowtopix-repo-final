<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\BlogPost;
use App\Models\RequestBlog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Blogs\Category;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogEdit;
use App\Models\Enums\BlogRequestTypes;
use App\Http\Requests\Site\BlogPostRequest;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::get()->pluck('name', 'slug')->toBase();
        $blogs = Blog::with('Category')->get();

        if(request('category_select')){
            $id = Category::where('slug', request('category_select'))->get()->pluck('id')->toBase();

            $blogs = Blog::with('Category')->where('category_id', $id)->get();
        }

        if(request('blog_search')){
            $blog_query = Blog::with('Category')->latest()->filter(request()->all());

            $blogs = $blog_query->get();
        }

        return view('site.blogs.index', ['categories' => $categories, 'blogs' => $blogs]);
    }

    public function request()
    {
        $categories = Category::get()->pluck('name', 'id')->toBase();
        
        return view('site.blogs.request', ['categories' => $categories]);
    }

    public function request_store(BlogRequest $request)
    {
        $slug = Str::slug($request->title);
        $sampleFile = "";
        if (isset($request->logo)) {
            $logo = time() . '-' . $slug . '.' . $request->logo->extension();
            
            $request->logo->move(public_path('images/blogs/logo'), $logo);
        }
        if (isset($request->sample_file)) {
            $sampleFile = time() . '-' .$slug.'.'.$request->sample_file->extension();

            $request->sample_file->move(public_path('images/blog_file'), $sampleFile);
        }

        RequestBlog::create([
            'title' => $request->title,
            'slug' => $slug,
            'logo' => $logo,
            'category_id' => $request->category_id,
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
        $owner = false;

        if(auth()->check()){
            $owner = $blog->user_id == auth()->user()->id;
        }

        $posts = BlogPost::where('blog_id', $blog->id)->get();

        $features = BlogPost::where('blog_id', $blog->id)->where('is_feature', 1)->get();

        return view('site.blogs.details', ['blog' => $blog, 'owner' => $owner, 'posts' => $posts, 'features' => $features]);
    }

    public function author_details(Blog $blog)
    {
        $owner = false;
        
        if (auth()->check()) {
            $owner = $blog->user_id == auth()->user()->id;
        }

        $posts = BlogPost::where('blog_id', $blog->id)->get();

        return view('site.blogs.author', ['owner' => $owner, 'blog' => $blog, 'posts' => $posts]);
    }

    public function edit(Blog $blog)
    {
        if(auth()->user()->id !== $blog->user_id){
            return abort(404);
        }

        $categories = Category::get()->pluck('name', 'id')->toBase();
        return view('site.blogs.edit', ['blog' => $blog, 'categories' => $categories]);
    }

    public function update(BlogEdit $request, Blog $blog)
    {
        $slug = Str::slug($request->title);
        if (isset($request->logo)) {
            $logo = time() . '-' . $slug . '.' . $request->logo->extension();

            $request->logo->move(public_path('images/blogs/logo'), $logo);
        } else{
            $logo = $blog->logo;
        }

        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'logo' => $logo,
            'category_id' => $request->category_id,
            'author_name' => $request->author_name,
            'author_bios' => $request->author_bios,
            'email' => $request->email,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('site.profile.index', auth()->user()->username)->with('success', 'Your Blog Updated Successfully');
    }
}
