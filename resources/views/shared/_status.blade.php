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
            <div>
                <div class="row justify-content-end mr-1">
                    <form action="#" method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm">Like it</button>
                    </form>
                    <div>
                        <button class="btn btn-sm btn-dark" onclick="openForm(this)">Commit
                            <span class="shadow-sm h6">{{ $status->commit->count() }}</span></button>
                        @include("commit.commit_form")
                    </div>
                </div>

            </div>
        @endcan
</li>
