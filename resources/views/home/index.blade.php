<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/MusicPlayer.js') }}"></script>
    <script src="{{ asset('js/home/playMusic.js') }}"></script>
    <script src="{{ asset('js/manageMusicBar.js') }}"></script>

    <!-- Styles -->

</head>
<body>
@include('nav')
@include('home.carousel')
<div class="d-flex justify-content-between"style="padding:5px; margin: 2rem;">
    <div class="card" style="text-align: center;margin: 0 auto; padding: 2rem; height: 90%; width:30rem;
">
        <div class="d-flex justify-content-between align-items-center" style="width: 50%;margin: 1rem auto;">
            <h3>Song of the Day</h3>
            <span>8/2</span>
        </div>
        <img class="card-img-top" src="https://cfstatic.streetvoice.com/music_albums/ps/s/pss/f3880542391446b68f42ada09a4f28f2.jpg?x-oss-process=image/resize,m_fill,h_300,w_300,limit_0/interlace,1/quality,q_85/format,jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">作品名稱</h5>
            <p class="card-text">作家名稱</p>
            <a href="#" class="btn btn-primary">查看更多</a>
        </div>
    </div>
    @include('home.musicList')


    @include('home.music_player')

</div>

</body>
</html>
