@foreach($collections as $commentGroups)
    @include('comments.comment',['comments'=>$commentGroups])
@endforeach
