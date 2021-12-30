<div class="card" style="width: 18rem;">
    <img src="{{  $user->image->url ?? "https://img1.baidu.com/it/u=1195065233,1761810527&fm=26&fmt=auto" }}" class=" img-zoom card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title h4 text-center">{{ $user->name }}</h5>
        <p class="card-text">Some quick example text to build on the carfwwwefwe</p>
        @include('user.follow')
    </div>
</div>
