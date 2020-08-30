<nav class="navbar navbar-expand-lg navbar-dark bg-dark r" style="padding: 2rem; ">

    <a class="navbar-brand" href="{{route('home')}}">Music</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li class="nav-item">
                <a class="nav-link " href="#">App</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <form class="form-inline my-2 my-lg-0">
            @if (Route::has('login'))
                @auth
                    {{--                    <a href="{{ url('/home') }}" class="btn btn-outline-success my-2 my-sm-0" >{{ Auth::user()->name }}</a>--}}
                    <div class="dropdown">
                        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url(Auth::user()->account)}}">
                                個人頁面
                            </a>
                            <a class="dropdown-item" href="{{route('manage.like')}}">
                                我的音樂庫
                            </a>
                            <a class="dropdown-item" href="{{route('profile.index')}}">
                                帳號設定
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();
                                       ">
                                {{ __('Logout') }}
                            </a>


                        </div>
                        {{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">--}}
                        {{--                            <a class="dropdown-item" href="{{ url('/'.Auth::user()->name) }}">我的音樂庫</a>--}}
                        {{--                            <a class="dropdown-item" href="#">個人頁面</a>--}}
                        {{--                            <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                        {{--                                Logout--}}
                        {{--                            </a>--}}

                        {{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--                                {{ csrf_field() }}--}}
                        {{--                            </form>--}}



                        {{--                        </div>--}}
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-success my-2 my-sm-0" style="margin-right: 1rem;">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success my-2 my-sm-0">Register</a>
        @endif
        @endauth
    </div>
    @endif
    </form>
    </div>
</nav>

