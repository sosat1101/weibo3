@extends('layouts.app')
@section('title', 'My Info')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('shared._user_info')
        </div>
        <div class="col-md-6">
            @if( count($statuses) > 0 )
                @foreach( $statuses as $status)
                    @include('shared._status')
                @endforeach
                <div>{{ $statuses->links() }}</div>
            @endif
        </div>
    </div>

@stop
