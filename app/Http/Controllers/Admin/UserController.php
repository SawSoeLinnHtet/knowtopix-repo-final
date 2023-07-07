<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(User $user)
    {
        $users = $user->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'personal_info' => $request->personal_info
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User Created Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('backend.user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->findOrFail($user->id);

        $user->update($request->except(['_method', '_token']));

        return redirect()->route('admin.users.index')->with('success', 'User Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->findOrFail($user->id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User Deleted Successfully');
    }
}
