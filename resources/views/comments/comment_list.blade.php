<div class="media mt-3">
    <img src="..." class="mr-3" alt="...">
    <div class="media-body">
        <h5 class="mt-0">
            @if ($comment->replies->isNotEmpty())
                {{ $comment->owner->name }}
            @else
                {{ $comment->owner->name.'@ '.$comment->owner->name }}
            @endif
        </h5>
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
