@extends('layouts.app')
@section('title', 'HomePage')
@section('content')
    @if(Auth::check())
        <div class="row">
            <div class="col-md-6">
                @include('shared._status_form')
            </div>
        </div>
    @else
        @include('shared.register')
    @endif
@stop
