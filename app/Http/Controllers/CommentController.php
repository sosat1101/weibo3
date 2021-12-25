<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(Status $status)
    {
        $status->load('comments.owner');

        $comments = $status->getComments();

        dd($comments);
        return view('status.show', compact('status', 'comments'));
    }
}
