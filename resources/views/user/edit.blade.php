@extends('layouts.app')
@section('title', '  Profile edit')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $user->name }} profile edit</h3>
                </div>
                <div class="card-body">
                    @include('shared._errors')
                    <div class="col ">
                        @include('user.avatar')
                    </div>
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="email">email: </label>
                            <input class="form-control" disabled="disabled" name="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="name">name: </label>
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="password">password</label>
                            <input class="form-control" type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">password confirm</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>
                        <button class="btn-success btn-block btn mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
