<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.admin.user.user', [
            'users' => $users,
        ]);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('pages.admin.user.user-detail', [
            'user' => $user,
        ]);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('pages.admin.user.user-edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

        $user->update($data);

        return redirect()->route('admin.user.detail', ['id' => $id])->with('success', 'User updated successfully');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User deleted successfully');
    }
}
