<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show(Status $status)
    {

        $comments = $status->comments()->where('parent_id', '=', 0)->with(['owner', 'replies'])->get();

        return view('status.show', compact('status', 'comments'));
    }

    public function store(Status $status, Request $request)
    {
        $status->comments()->create([
            'body' => request('body'),
            'user_id' => Auth::id(),
            'parent_id' => $request->post('parent_id', 0),
        ]);
        session()->flash('success', '评论成功');
        return back();
    }
}
