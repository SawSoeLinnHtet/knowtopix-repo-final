<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Site\PostRequest;
use App\Models\Site\Post\PostLike;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if(isset($request->content_area) || isset($request->thumbnail)){
            if (isset($request->thumbnail)) {
                $imageName = "";
                $imageName = time() . '-' . $request->thumbnail->getClientOriginalName();

                $request->thumbnail->move(public_path('images'), $imageName);
            }

            $data = [
                'content_area' => $request->content_area ?? NULL,
                'user_id' => Auth::user()->id,
                'privacy' => $request->privacy,
                'thumbnail' => $imageName ?? NULL
            ];

            Post::create($data);

            return redirect()->route('site.index')->with('success', 'Your post is created successfully');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->is_liked = false;
        $post = Post::with('User:id,name,profile', 'PostComment.User:id,name,profile')->findOrFail($post->id);
        $is_liked = false;
        $post_likes = $post->PostLike;

        foreach($post_likes as $like){
            $is_liked = $like->user_id == auth()->user()->id;

            $post->is_liked = $is_liked;
        }
        if(request()->ajax()){
            $view = view('site.layouts.post_details.details-modal', ['post' => $post])->render();

            return response()->json(['success' => 'Get post success', 'html' => $view]);
        }

        return view('site.post.index', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
        if($request->ajax()){
            $post = $post->findOrFail($post->id);
            if ($post->user_id == auth()->user()->id) {
                $view = view('site.layouts.modal-box-form', ['post' => $post])->render();

                return response()->json(['success' => 'Edit form request', 'html' => $view, 'post' => $post]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post = $post->findOrFail($post->id);

        if($post->user_id == auth()->user()->id){
            if (isset($request->thumbnail)) {
                $imageName = "";
                $imageName = time() . '-' . $request->thumbnail->getClientOriginalName();

                $request->thumbnail->move(public_path('images'), $imageName);
            }

            $data = [
                'privacy' => $request->privacy,
                'content_area' => $request->content_area,
                'thumbnail' => $imageName ?? $post->thumbnail
            ];

            $post->update($data);

            return redirect()->back()->with('success', 'Post edit successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $current_user_id = auth()->user()->id;
        $current_post = $post->where('id', $post->id)->where('user_id', $current_user_id);
        $current_post->delete();
        return response()->json(['success' => 'Delete post successfully']);
    }
}
