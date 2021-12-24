<div class="card" style="width: 18rem;">
    <img src="https://img2.baidu.com/it/u=3444953902,1369566609&fm=26&fmt=auto" class=" img-zoom card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title h4 text-center">{{ $user->name }}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        <div class="row justify-content-center m-3">
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
</div>
