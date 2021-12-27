<div class="m-3">
    <ul class="row justify-content-between list-unstyled">
        <li>关注人：
            <span class="badge badge-primary badge-pill">{{ count($user->followings) }}</span>
        </li>
        <li>
            粉丝：<span class="badge badge-primary badge-pill">{{ count($user->followers) }}</span>
        </li>
    </ul>
    <div class="row justify-content-center">
        @if (Auth::user()->isFollowing($user->id))
            <form action="{{ route('unfollow', $user) }}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-secondary">Unfollow</button>
            </form>
        @else
            @can('follow', $user)
                <form action="{{ route('follow', $user) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Follow</button>
                </form>
            @endcan
        @endif
    </div>
</div>
