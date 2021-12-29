@extends('layouts.app')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-4">
            @include('shared._user_info')
        </div>
        <div class="col-8">
            @if( count($statuses) > 0 )
                <ul class="list-group mt-2">
                @foreach( $statuses as $status)
                    @include('shared._status')
                @endforeach
                </ul>
                <div>{{ $statuses->links() }}</div>
            @endif
        </div>
    </div>
    <script>
        function openForm(obj) {
            console.log('openForm====>')
            console.log(obj)
            $(obj).next().show()
        }

        function closeForm(obj) {
            console.log('closeForm====>')
            console.log(obj)
            $(obj).next().hide();
        }

        function toggleFn(obj) {
            // 滑动能显示能隐藏
            console.log(obj)
            $(obj).slideToggle("middle");
        }
    </script>
@stop
