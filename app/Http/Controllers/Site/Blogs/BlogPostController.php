<?php

namespace App\Http\Controllers\Site\Blogs;

use App\Models\Blog;
use App\Models\BlogPost;
use App\Models\Blogs\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    public function create(Blog $blog)
    {
        $owner = $blog->user_id == auth()->user()->id;
        if($blog->user_id == auth()->user()->id){
            return view('site.blogs.posts.create', ['blog' => $blog, 'owner' => $owner]);
        }
        return abort(404);
    }

    public function store(Blog $blog, Request $request)
    {
        $data = $request->validate([
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'is_feature' => 'required',
        ]);

        $imageName = "";
        if (isset($request->thumbnail)) {
            $imageName = time() . '-' . $request->thumbnail->getClientOriginalName();

            $request->thumbnail->move(public_path('images/blogs/posts'), $imageName);
        }
        $slug = Str::slug($request->title). '-' .time();

        $blog_post = BlogPost::create([
            'post_thumbnail' => $imageName,
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'content' => $request->content,
            'is_feature' => $request->is_feature ?? 0,
            'blog_id' => $blog->id
        ]);

        return redirect()->route('site.blog.details', $blog->slug)->with('success', 'Blog post created successfully!');
    }

    public function details(Blog $blog, $slug)
    {
        $owner = false;
        $post = BlogPost::where('slug', $slug)->where('blog_id', $blog->id)->with('Blog')->first();

        if (auth()->check()) {
            $owner = $blog->user_id == auth()->user()->id;
        }

        $blog_posts = BlogPost::where('blog_id', $blog->id)->get();

        return view('site.blogs.posts.index', ['post' => $post, 'blog' => $blog, 'posts' => $blog_posts, 'owner' => $owner]);
    }

    public function edit(Blog $blog, $slug)
    {
        $owner = $blog->user_id == auth()->user()->id;

        $post = BlogPost::where('slug', $slug)->where('blog_id', $blog->id)->with('Blog')->first();

        return view('site.blogs.posts.edit', ['post' => $post, 'blog' => $blog, 'owner' => $owner]);
    }

    public function update(Blog $blog, $slug, Request $request)
    {
        $current_post = BlogPost::where('slug', $slug)->where('blog_id', $blog->id)->first();

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'is_feature' => 'required'
        ]);

        if(!isset($request->thumbnail)){
            $imageName = $current_post->post_thumbnail ?? null;
        }else{
            $imageName = time() . '-' . $request->thumbnail->getClientOriginalName();

            $request->thumbnail->move(public_path('images/blogs/posts'), $imageName);
        }

        $slug = Str::slug($data['title']) . '-' . time();

        $id = $blog->id;
        $current_post->update([
            'post_thumbnail' => $imageName,
            'title' => $data['title'],
            'slug' => $slug,
            'description' => $data['description'],
            'content' => $data['content'],
            'is_feature' => $data['is_feature'] ?? 0,
            'blog_id' => $blog->id
        ]);

        return redirect()->route('site.blog.details', $blog->slug)->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog, $slug)
    {
        $current_post = BlogPost::where('slug', $slug)->where('blog_id', $blog->id)->first();

        $current_post->delete();

        return redirect()->route('site.blog.details', $blog->slug)->with('success', 'Blog post deleted successfully');
    }

    public function feature(Blog $blog, $slug)
    {
        $current_post = BlogPost::where('slug', $slug)->where('blog_id', $blog->id)->first();

        if($current_post->is_feature == 1){
            $current_post->update([
                'is_feature' => 0
            ]);

            return redirect()->route('site.blog.post.details', [$blog->slug, $slug])->with('success', 'Remove from feature successfully');
        }else{
            $current_post->update([ 
                'is_feature' => 1
            ]);

            return redirect()->route('site.blog.post.details', [$blog->slug, $slug])->with('success', 'Set this post to feature successfully');
        }
    }
}
