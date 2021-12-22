@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="offset-4 col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>login</h3>
            </div>
            <div class="card-body">
                @include('shared._errors')
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email">email: </label>
                        <input class="form-control"  type="text" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn-success btn-block btn mt-2">Sign In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
