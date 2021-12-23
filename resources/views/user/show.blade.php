@extends('layouts.app')
@section('title', 'My Info')
@section('content')
    <div class="offset-md-2 col-md-6">
        @if( count($statuses) > 0 )
            @foreach( $statuses as $status)
                <ul class="list-group">
                    <li class="list-group-item">
                        @can('update', $status)
                        <a href="{{ route('status.edit', $status) }}" class=" list-group-item-action">
                        @endcan
                            <p style="word-break: break-all">{{ $status->contents }}</p>
                        <small>
                            <div class="small text-right">{{ $status->created_at }}</div>
                        </small>
                        </a>
                        @can('destroy', $status)
                            <div class="row justify-content-between">
                                <form action="{{ route('status.destroy', $status) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                            @else
                                <div class="row justify-content-end mr-1">
                                    <form action="#" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm">Like it</button>
                                    </form>
                                </div>
                        @endcan
                    </li>
                </ul>
            @endforeach
            <div>{{ $statuses->links() }}</div>
        @endif
    </div>
@stop
