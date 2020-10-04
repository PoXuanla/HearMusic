<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $data->music->name }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- js -->
    <script src="{{ asset('js/Song/leaveMessage.js') }}"></script>


</head>
<body>
@include('nav')
<div class="container-fluid" style="padding: 0;">
    <div class="row w-75 mt-2 shadow " style="height:20rem;margin:0 auto;">
        <div class="col-3 align-self-center">
            @if($data->music->image)
                <img style="height:15rem;width: 15rem; object-fit: cover;"
                     class="text-center rounded-circle mt-2 mb-2"
                     src="{{$data->music->image . "?" . random_int(0,1000)}}"
                     alt="Card image cap">
            @else
                <img style="height:15rem;width: 15rem; object-fit: cover;"
                     class="text-center rounded-circle mt-2 mb-2"
                     src="https://images6.alphacoders.com/786/thumb-1920-786829.jpg"
                     alt="Card image cap">
            @endif
        </div>
        <div class="col-6" style="height:20rem;">
            <h2 class="mt-3">{{$data->music->name}}</h2>
            <hr class=""/>

            <div class="d-flex justify-content-start">
                <div class="">介紹</div>
            </div>
            <div style="word-wrap:break-word; word-break:normal ;overflow:hidden; height: 65%;
                text-overflow:ellipsis">
                <strong>
                    <h3>
                        {{$data->music->introduction}}

                    </h3>

                </strong>
            </div>
        </div>
        <div class="col-3 p-3">
            <div class="row ">
                <div class="col">
                    <h5 class="text-center">
                        <strong>
                            喜歡
                        </strong>
                    </h5>
                    <div class="text-center">
                        <h2>
                            <strong>
                                {{--                                {{ $object->musicQuantity }}--}}
                                1
                            </strong>

                        </h2>
                    </div>
                </div>
                <div class="col">
                    <h5 class="text-center">
                        <strong>
                            播放次數
                        </strong>
                    </h5>
                    <div class="text-center">
                        <h2>
                            <strong>
                                1
                                {{--                                {{ $object->trackQuantity }}--}}
                            </strong>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-75 mt-2 justify-content-between" style="height:20rem;margin:0 auto;">
        <div class="col-md-3 h-25 shadow">
            <div class="row h-100 align-items-center">
                <div class="col-6">
                    <button class="btn">
                        <img class="" style="width: 3rem;height:3rem;"
                             src="https://images6.alphacoders.com/786/thumb-1920-786829.jpg" alt="">
                    </button>
                </div>
                <div class="col-6">
                    <h4>{{$data->author->name}}</h4>
                    <h5>音樂人</h5>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row shadow rounded">
                <div class="col-12 text-center pt-2">
                    <h4>簡介</h4>
                </div>
                <hr>
                <div class="col-12 pb-2">
                    <div class="row text-center">
                        <div class="w-75 m-0 m-auto text-break" style="">
                            {{$data->music->introduction}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row shadow rounded">
                <div class="col-12 pt-2 text-center">
                    <h4>歌詞</h4>
                </div>
                <hr>
                <div class="col-12 text-center">
                    <div class="row text-center">
                        <div class="w-75 m-0 m-auto text-break" style="">
                            <p>{{$data->music->lyric}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="row shadow rounded pb-3">
                <div class="col-12 pt-2 text-center ">
                    <h4>留言</h4>
                </div>
                <hr>
                <div class="col-12 text-center">
                    <div class="row">
                        <div class="col-1 ml-3">
                            {{--                                <span class="input-group-text justify-content-center ">{{ $object->user->name }}</span>--}}
                            <img class="rounded" src="{{ Auth::user()->personImage . "?"  . time() }}" alt=""
                                 style="width: 2rem;height: 2rem;">
                        </div>
                        <div class="col-8 mr-3">
                            <input id="user_id" type="hidden" value="{{Auth::user()->id}}">
                            <input id="song_id" type="hidden" value="{{ $data->music->id }}">
                            <textarea id="text_leaveMessage" class="form-control message" type="text"
                                      placeholder="輸入留言..."></textarea>
                        </div>
                        <div class="col-2">
                            <button id="btn_leaveMessage" class="btn btn-danger">發送</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="leaveMessage">
                @if($data->comment)
                    @foreach($data->comment as $com)
                        <div class="row shadow rounded mt-3 mb-3">
                            <div class="col-12 text-center">
                                <div class="row text-center p-2">
                                    <div class='col-1 ml-3'>
                                        <img class='rounded' src= "{{$com->user_image ."?" . time() }}"style='width:2rem;height:2rem;'>
                                        </div>
                                    <div class='col-2'>
                                        <p>{{ $com->user_name }}</p>
                                    </div>
                                    <div class='col text-left'>
                                        <p> {{ $com->content }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>

</div>
@include('home.music_player')

</body>
</html>
