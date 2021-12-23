@extends('layouts.app')
@section('title', 'My Info')
@section('content')
    <div class="col-md-5">
        @if( count($statuses) > 0  )
            @foreach( $statuses as $status)
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('status.edit', $status) }}" class=" list-group-item-action">
                            <p style="word-break: break-all">{{ $status->contents }}</p>
                        <small>
                            <div class="small text-right">{{ $status->created_at }}</div>
                        </small>
                        </a>
                        <div class="row justify-content-between">
                            <form action="{{ route('status.destroy', $status) }}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </li>
                </ul>
            @endforeach
            <div>{{ $statuses->links() }}</div>
        @endif
    </div>
@stop
