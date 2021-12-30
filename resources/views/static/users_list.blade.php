@extends('layouts.app')
@section('title', 'User List')
@section('content')
    @if (count($users) > 0)
        <ul class="list-group list-group-flush ">
            @foreach($users as $user)
                <li class="list-group-item row">
                    <a href="{{ route('user.show', $user) }}">
                        <img src="{{ $user->image->url ?? "https://img1.baidu.com/it/u=1195065233,1761810527&fm=26&fmt=auto" }} "
                             class="align-self-center mr-3" alt="" width="64px" height="64px">{{ $user->name }}
                    </a>
                    @can('destroy', $user)
                        <form action="{{ route('user.destroy', $user) }}" method="POST" class="float-md-right">
                            {{method_field('DELETE')}}
                            <button class="btn-sm btn-danger">Delete</button>
                        </form>
                    @endcan
                </li>
            @endforeach
        </ul>
        <div class="mt-2">{{ $users->links() }}</div>
    @endif
@endsection
