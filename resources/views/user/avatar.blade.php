<img src="{{  $user->image->url ?? "https://img2.baidu.com/it/u=3444953902,1369566609&fm=26&fmt=auto" }}" class=" img-zoom card-img-top" alt="">
<form method="POST" action="{{ route('user.avatar', $user) }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="avatar">
    <button class="btn btn-secondary">Upload Avatar</button>
</form>
