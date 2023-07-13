<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Site\PostRequest;

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
        if(isset($request->thumbnail)){
            $imageName = "";
            $imageName = time() . '-' . $request->thumbnail->getClientOriginalName();

            $request->thumbnail->move(public_path('images'), $imageName);     
        }
        
        $data = [
            'content_area' => $request->content_area,
            'user_id' => Auth::user()->id,
            'thumbnail' => $imageName ?? NULL
        ];

        Post::create($data);

        return redirect()->route('site.index')->with('success', 'Your post is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        dd($request->all());
        $post = $post->findOrFail($post->id);

        if($post->user_id == auth()->user()->id){
            if (isset($request->thumbnail)) {
                $imageName = "";
                $imageName = time() . '-' . $request->thumbnail->getClientOriginalName();

                $request->thumbnail->move(public_path('images'), $imageName);
            }

            $data = [
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
    public function destroy($id)
    {
        //
    }
}
