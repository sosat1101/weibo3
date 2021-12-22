<nav class="navbar navbar-dark btn-dark bg-dark nav-tabs justify-content-end">
    @if(Auth::check())
        <div class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">Home</a>
        </div>
        <div class="nav-item dropdown" style="padding-right: 100px">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                   id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                    用户信息
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Browser Something</a>
                    <a class="dropdown-item" id="logout" href="#">
                        <form action="{{ route('sign-out') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-block btn-danger" type="submit" name="button">Sign out</button>
                        </form>
                    </a>
                </div>
        </div>

    @else
    <div class="nav-item">
        <a class="nav-link active" href="{{ route('home') }}">Home</a>
    </div>
    <div class="nav-item">
        <a class="nav-link" href="#">Community</a>
    </div>
    <div class="nav-item">
        <a class="nav-link" href="{{route('login')}}">Sign in</a>
    </div>

    <div class="nav-item">
        <a class="nav-link" href="#">Sign up</a>
    </div>
    <div class="nav-item">
        <a class="nav-link" href="#">Search</a>
    </div>
    @endif
</nav>

