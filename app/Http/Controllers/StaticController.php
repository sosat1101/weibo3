<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function userList()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(8);
        return view('static.users_list', compact('users'));
    }
}
