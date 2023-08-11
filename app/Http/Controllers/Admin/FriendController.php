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
        if ($request->ajax()) {

            $data = Friend::where('status', 'accept')->with('RequestToUser:id,name', 'RequestFromUser:id,name')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('from_users', function ($row) {
                    return view('backend.layouts.friend_name', ['attribute' => $row->RequestFromUser])->render();
                })
                ->addColumn('to_users', function ($row) {
                return view('backend.layouts.friend_name', ['attribute' => $row->RequestToUser])->render();
                })
                ->rawColumns(['from_users', 'to_users'])
                ->make(true);
        }
        return view('backend.friend.index');
    }

    public function pending(Request $request)
    {
        if ($request->ajax()) {

            $data = Friend::where('status', 'pending')->with('RequestToUser:id,name', 'RequestFromUser:id,name')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('from_users', function ($row) {
                    return view('backend.layouts.friend_name', ['attribute' => $row->RequestFromUser])->render();
                })
                ->addColumn('to_users', function ($row) {
                    return view('backend.layouts.friend_name', ['attribute' => $row->RequestToUser])->render();
                })
                ->rawColumns(['from_users', 'to_users'])
                ->make(true);
        }
        return view('backend.friend.pending');
    }
}
