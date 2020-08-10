
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 2rem;">
    <a class="navbar-brand" href="#">Music</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link " href="#">發現 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">排行榜</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">歌單</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">徵選</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">演出活動</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">App</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-outline-success my-2 my-sm-0" >{{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-success my-2 my-sm-0" style="margin-right: 1rem;">login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('login') }}" class="btn btn-success my-2 my-sm-0" >register</a>
                    @endif
                @endauth
                </div>
            @endif
        </form>
    </div>
</nav>

