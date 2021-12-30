<div class="media mt-3">
    <img src="{{ $user->image->url ?? "https://img1.baidu.com/it/u=1195065233,1761810527&fm=26&fmt=auto" }}" class="mr-3" alt="...">
    <div class="media-body">
        <h6 class="mt-0">
            @if ($comment->replies->isNotEmpty())
                {{ $comment->owner->name.':' }}
            @else
                {{ $comment->owner->name.' @ '.$comment->owner->name.':'}}
            @endif
        </h6>
        <p>{{ $comment->body }}</p>
        @include('comments.form', ['parent_id' => $comment->id])
        @if($comment->replies->isNotEmpty())
            @foreach($comment->replies as $reply)
                @include('comments.comment_list', ['comment' => $reply])
            @endforeach
        @endif
        <div>
        </div>
    </div>

</div>
