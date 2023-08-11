<?php

namespace App\Http\Controllers\Site\Blogs;

use App\Models\Blog;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function create(Blog $blog)
    {
        if($blog->user_id == auth()->user()->id){
            return view('site.blogs.posts.create', ['blog' => $blog]);
        }
        return abort(404);
    }

    public function store(Blog $blog, Request $request)
    {
        $data = $request->validate([
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);

        $imageName = "";
        if (isset($request->thumbnail)) {
            $imageName = time() . '-' . $request->thumbnail->getClientOriginalName();

            $request->thumbnail->move(public_path('images/blogs/posts'), $imageName);
        }

        $blog_post = BlogPost::create([
            'post_thumbnail' => $imageName,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'blog_id' => $blog->id
        ]);

        return redirect()->route('site.blog.details', $blog->slug)->with('success', 'Blog post created successfully!');
    }

    public function docxToHtml(Blog $blog, Request $request)
    {
        $file = $request->file('docx');

        $docx = IOFactory::load($file->getPathname());
        $htmlWriter = new \PhpOffice\PhpWord\Writer\HTML($docx);

        return response()->json(['html' => $htmlWriter->save('php://output')]);
    }
}
