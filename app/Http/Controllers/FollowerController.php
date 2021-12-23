<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function follow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ( ! (is_int($value) || is_array($value))) {
                        $fail('The '.$attribute.' is invalid.');
                    }
                },
            ],
        ]);

        Auth::user()->follow($request->user_id);
        session()->flash('success', '关注成功');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follower  $follower
     * @return Response
     */
    public function show(Follower $follower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Follower  $follower
     * @return Response
     */
    public function edit(Follower $follower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Follower  $follower
     * @return Response
     */
    public function update(Request $request, Follower $follower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follower  $follower
     * @return Response
     */
    public function unfollow(Follower $follower)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ( ! (is_int($value) || is_array($value))) {
                        $fail('The '.$attribute.' is invalid.');
                    }
                },
            ],
        ]);

        Auth::user()->unfollow($request->user_id);
        session()->flash('success', '关注成功');
        return redirect()->back();
    }
}
