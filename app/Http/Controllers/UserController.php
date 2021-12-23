<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $credential = $this->validate($request, [
            'name' => 'required|unique:users|max:30',
            'password' => 'nullable|confirmed|min:6',
        ]);

        if (is_null($credential['password'])) {
            $user->update(['name' => $credential['name']]);
        } else {
            $user->update($credential);
        }
        session()->flash('success', '更新成功');
        return redirect()->route('user.show', $user);
    }

    public function show(User $user)
    {
        $statuses = $user->status()->orderBy('created_at', 'desc')->paginate(4);
        return view('user.show', compact('user', 'statuses'));
    }
}
