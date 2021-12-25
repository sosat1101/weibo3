
<div class="col-md-12">
    <h5><span style="color:#31b0d5">{{$comment->owner->name }}</span>:</h5>
    <h5>{{$comment->body}}</h5>

    @include('comments.form',['parentId'=>$comment->id ?? 'id' ])

    @if($comments[$comment->id])
        <h3>top=---------------------</h3>
{{--    {{ dump($comment->getReplies()) }}--}}
                @include('comments.list',['collections'=>$comments[$comment->id]])
    <h3>bottom=---------------------</h3>

    @endif
    <hr>
</div>

