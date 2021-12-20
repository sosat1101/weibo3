<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function create(Register $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        RegisterEvent::dispatch($user);
    }
}
