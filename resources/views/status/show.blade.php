@extends('layouts.app')
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <h4>{{$status->content}}</h4>
        <hr>
        @foreach($comments as $comment)
            <div class="col-md-12">
{{--                <h5><span style="color:#31b0d5">{{$comment->owner->name}}</span>:</h5>--}}
                <h5>{{$comment->body}}</h5>
                <hr>
            </div>
        @endforeach





    </div>
@endsection
