<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/MP3Player.js') }}"></script>
    <!-- Styles -->

</head>
<body>
@include('home.nav')
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
    <script type="text/javascript">

        var mediaData = ['http://localhost/mp3/The%20Chainsmokers%20-%20Closer%20(%20cover%20by%20J.Fla%20).mp3','http://localhost/mp3/%e4%ba%ba%e4%ba%ba%e2%80%9c%e5%a4%aa%e6%a5%b5%e6%8b%b3%e2%80%9d%e5%90%88%e8%bc%af%e7%86%8a%e4%bb%94%e3%80%90Riyoko(%e5%a5%bd%e5%8f%8b%e5%b7%b2%e6%bb%bf)%e3%80%91Official%20Music%20video.mp3'];
        // var audio = new Audio('http://localhost/mp3/The%20Chainsmokers%20-%20Closer%20(%20cover%20by%20J.Fla%20).mp3');
        // audio.addEventListener('ended',function(){
        //     audio = new Audio('http://localhost/mp3/%e4%ba%ba%e4%ba%ba%e2%80%9c%e5%a4%aa%e6%a5%b5%e6%8b%b3%e2%80%9d%e5%90%88%e8%bc%af%e7%86%8a%e4%bb%94%e3%80%90Riyoko(%e5%a5%bd%e5%8f%8b%e5%b7%b2%e6%bb%bf)%e3%80%91Official%20Music%20video.mp3');
        // },false);
        // audio.loop = true;
        var player = new MP3Player();
        player.addNewMusic('http://localhost/mp3/001.mp3');
        player.addNewMusic('http://localhost/mp3/002.mp3');

        player.start();
        // new MP3Player();
        $(document).on('click','#player_play',function () {
            player.PlayorPause();
            player.printQueueData();
            player.playModel('go');

        })
        window.setInterval(function(){
            console.log(player.getCurrentProgressPrecent());
        },500);
        // var htmlX;
        // var playerDefaultX;
        // var playerClickX;
        // var playerClickPer;
        // var divX;
        // var player_play = $('#musicPlayer_Progress_bg');
        // var click = false;
        // //change audio currentTime
        // $(document).on('mousedown','#musicPlayer_Progress_bg', function(e){
        //     playerProgressBarCoordinate(e);
        //     click = true;
        //
        //         audio.pause();
        //     console.log("down");
        // });
        // $(document).on('mouseup','#musicPlayer_Progress_bg', function(e){
        //    click = false;
        //
        //     audio.play();
        //     console.log("up");
        // });
        // $(document).on('mousemove','#musicPlayer_Progress_bg', function(e) {
        //     if(click){
        //         playerProgressBarCoordinate(e);
        //         audio.paused;
        //
        //     }
        //
        // })
        // function playerProgressBarCoordinate(e){
        //     playerDefaultX = $('#musicPlayer_Progress').offset().left;
        //     playerClickX = e.clientX - playerDefaultX;
        //     htmlX = $(window).width();
        //     divX = htmlX *0.25;
        //     playerClickPer = (playerClickX/divX);
        //     console.log(playerClickPer);
        //     audio.currentTime = audio.duration * playerClickPer;
        // }
        //
        //     //Listen player progress bar
        // window.setInterval(function(){
        //     var player_progress = (audio.currentTime/audio.duration)*100 + '%';
        //     // console.log("progress : " + player_progress);
        //     $('#musicPlayer_Progress').css('width',player_progress);
        //
        //     // console.log("目前時間:"+audio.currentTime);
        //     // console.log("總長度:"+(audio.duration/60)+"分"+(audio.duration%60)+"秒");
        // },100);
        // audioEle.play();    //播放
        // audioEle.pause();    //暂停
    </script>
    @include('home.music_player')

</div>

</body>
</html>
