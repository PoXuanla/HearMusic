<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
@include('nav')

<div class="container-fluid" style="padding: 0;">
    <img style="height:25rem;width: 100%;object-fit: cover; "
         src="https://images6.alphacoders.com/786/thumb-1920-786829.jpg" alt="Responsive image">
    <div class="row w-75 mt-5 shadow " style="height:20rem;margin:0 auto;">
        <div class="col-3 align-self-center">
            @if(Auth::user()->personImage)
                <img style="height:15rem;width: 15rem; object-fit: cover;"
                     class="text-center rounded-circle mt-2 mb-2" src="{{Auth::user()->personImage}}"
                     alt="Card image cap">
            @else
                <img style="height:15rem;width: 15rem; object-fit: cover;"
                     class="text-center rounded-circle mt-2 mb-2"
                     src="https://images6.alphacoders.com/786/thumb-1920-786829.jpg"
                     alt="Card image cap">
            @endif
        </div>
        <div class="col-6" style="height:20rem;">
            <h2 class="mt-3">{{Auth::user()->name}}</h2>
            <hr class=""/>

            <div class="d-flex justify-content-start">
                {{--                    <div class="">qq</div>--}}
                {{--                    <div class="">基隆人</div>--}}
            </div>
            <div style="word-wrap:break-word; word-break:normal ;overflow:hidden; height: 65%;
text-overflow:ellipsis">
                <strong>
                    <h3>
                        {{Auth::user()->introduction}}

                    </h3>

                </strong>
            </div>
        </div>
        <div class="col-3 p-3">
            <div class="row ">
                <div class="col">
                    <h5 class="text-center">
                        <strong>
                            音樂
                        </strong>
                    </h5>
                    <div class="text-center">
                        <h2>
                            <strong>
                                0
                            </strong>

                        </h2>
                    </div>
                </div>
                <div class="col">
                    <h5 class="text-center">
                        <strong>
                            粉絲
                        </strong>
                    </h5>
                    <div class="text-center">
                        <h2>
                            <strong>
                                0
                            </strong>

                        </h2>
                    </div>
                </div>
                <div class="col">
                    <h5 class="text-center">
                        <strong>
                            追蹤中
                        </strong>
                    </h5>
                    <div class="text-center">
                        <h2>
                            <strong>
                                0
                            </strong>

                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-75 mt-5" style="margin: 0 auto;">
        <ul class="nav nav-pills nav-fill w-50">
            <li class="nav-item">
                <a class="nav-link active" href="#">主頁</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">音樂</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">歌單</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">喜歡</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">關於</a>
            </li>
        </ul>

    </div>
    <div class="d-flex w-75 mt-5 mb-5 justify-content-between" style="margin: 0 auto;">
        <div class="shadow pt-3 pb-3" style="width: 60%;">
            <h3>還沒有任何動態</h3>
        </div>
        <div >

        </div>
    </div>
</div>
</body>
</html>
