@extends('layouts.app')
@section('title', 'HomePage')
@section('content')
    <div class="row justify-content-center">
        @if(Auth::check())
            <div>已经登录</div>
        @else
            <div class="row justify-content-center display-4 m-lg-5">
                Welcome to MyBlug
            </div>
            @include('shared._errors')
            <form class="form-group col-md-3" action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input name="name" type="text" class="form-control">
                </div>

                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" aria-describedby="email">
                <small id="email-tip" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input name="password" type="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation"> Confirm Password: </label>
                    <input name="password_confirmation" type="password" class="form-control">
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="remember_me" type="checkbox" value="">
                    <label class="form-check-label" for="remember_me">
                        Remember Me
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-dark mt-2">Register !</button>
            </form>
        @endif
    </div>
@stop
