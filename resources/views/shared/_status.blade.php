<li class="list-group-item">
    @can('update', $status)
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
            <button class="btn btn-sm btn-dark" onclick="toggleFn({{ 'status'.$status->id }})">Comment(s)
                <span class="shadow-sm h6">{{ count($status->comments)}}</span>
            </button>
        </div>
        <div class="col" style="display: none" id="{{ 'status'.$status->id }}">
            <ul class="list-group mt-2">
                @include('comments.show', ['comments' => $status->comments()->where('parent_id', '=', 0)->with(['owner', 'replies'])->get()])
            </ul>
        </div>
    @else
        <div class="row justify-content-end mr-1">
            <form action="#" method="POST">
                @csrf
                <button class="btn btn-success btn-sm">Like it</button>
            </form>
            <button class="btn btn-sm btn-dark" onclick="openForm(this)">Commit
                <span class="shadow-sm h6">{{ count($status->comments)}}</span>
            </button>
            <hr>
            <ul class="list-group mt-2">
                @include('comments.show', ['comments' => $status->comments])
            </ul>
        </div>
    @endcan
</li>
