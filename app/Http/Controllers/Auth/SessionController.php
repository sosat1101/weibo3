<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;

class SessionController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $validation = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validation, true)) {
           if (! is_null(Auth::user()->email_verified_at)) {
               session()->flash('success', '欢迎回来');
               return redirect(RouteServiceProvider::HOME);
           } else {
               Auth::logout();
               session()->flash('danger', '邮箱未验证');
               redirect('/');
           }
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            dd(22);
            return redirect()->back()->withInput();
        }
    }
}
