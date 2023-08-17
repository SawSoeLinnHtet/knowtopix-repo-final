<?php

namespace App\Http\Controllers\Admin;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FriendController extends Controller
{
    public function accepted(Request $request)
    {
        $data = Friend::where('status', 'accept')->with('RequestToUser:id,name', 'RequestFromUser:id,name')->paginate();

        return view('backend.friend.index', ['friends' => $data]);
    }

    public function pending(Request $request)
    {
        $data = Friend::where('status', 'pending')->with('RequestToUser:id,name', 'RequestFromUser:id,name')->get();

        return view('backend.friend.pending', ['friends' => $data]);
    }
}
