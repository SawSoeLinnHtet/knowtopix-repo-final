<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Enums\StatusTypes;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Post::with(['User:id,name', 'PostLike', 'PostComment'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'content_area', function ($row) {
                        return view('site.layouts.datatable-content-area', ['content_area' => $row->content_area])->render();
                })
                ->addColumn('privacy', function ($row) {
                    return view('backend.layouts.post-type', ['post' => $row])->render();
                })
                ->addColumn('post_likes', function ($row) {
                    return view('backend.layouts.post-relation-quantity', ['action' => route('admin.posts.likes.index', $row->id),'attributes' => $row->PostLike])->render();
                })
                ->addColumn('post_comments', function ($row) {
                    return view('backend.layouts.post-relation-quantity', ['action' => route('admin.posts.comments.index', $row->id), 'attributes' => $row->PostComment])->render();
                })
                ->rawColumns(['privacy','post_likes', 'post_comments', 'content_area'])
                ->make(true);
        }
        return view('backend.post.index');
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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    }

    public function changePostStatus(Post $post)
    {
        if($post->status == StatusTypes::ACTIVE){
            $post->status = StatusTypes::BANNED;

            $post->save();
            return response()->json(['success' => "Now, Post is banned", 'status' => "Banned!"]);
        }else if($post->status == StatusTypes::BANNED){
            $post->status = StatusTypes::ACTIVE;

            $post->save();
            return response()->json(['success' => "Now, Post is active", 'status' => 'Active!']);
        }
    }
}
