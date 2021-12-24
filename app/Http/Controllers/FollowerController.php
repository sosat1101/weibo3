<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FollowerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     * @return RedirectResponse
     */

    public function follow(User $user)
    {
        $this->authorize('follow', $user);
        Auth::user()->follow($user->id);
        session()->flash('success', '关注成功');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function unfollow(User $user)
    {
        Auth::user()->unfollow($user->id);
        session()->flash('success', '取消成功');
        return redirect()->back();
    }
}
