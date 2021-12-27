@extends('layouts.app')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <h4>{{ $status->contents }} </h4>
        <hr>
        @foreach($comments as $comment)
            @include('comments.comment_list')
        @endforeach
        <h3>留下您的评论:</h3>
        @include('comments.form')
    </div>
@endsection
