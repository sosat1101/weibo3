<nav class="navbar navbar-dark btn-dark bg-dark nav-tabs justify-content-end" style="padding-right: 50px">
    @if(Auth::check())
        <div class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">Home</a>
        </div><div class="nav-item">
            <a class="nav-link active" href="{{ route('user-list') }}">User List</a>
        </div>
        <div class="nav-item dropdown" style="padding-right: 100px">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                   id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('user.show', Auth::user()) }}">My home</a>
                    <a class="dropdown-item" href="{{route('user.edit', Auth::user())}}">Profile</a>
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
        <a class="nav-link" href="{{ route('register') }}">Sign up</a>
    </div>
    <div class="nav-item">
        <a class="nav-link" href="#">Search</a>
    </div>
    @endif
</nav>

