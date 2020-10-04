<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>個人檔案</title>
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
    <script src="{{asset('js/PersonalPage/leaveMessage.js')}}"></script>
    <script src="{{asset('js/PersonalPage/trackUser.js')}}"></script>
    <script src="{{asset('js/PersonalPage/playMusic.js')}}"></script>
    <script src="{{ asset('js/MusicPlayer.js') }}"></script>
    <script src="{{ asset('js/manageMusicBar.js') }}"></script>

</head>
<body>
@include('nav')

<div class="container-fluid" style="padding: 0;">
    @include('personalPage/userIntro')
    @include('personalPage/postBar')
    <div class="d-flex w-75 mt-5 mb-5 justify-content-between" style="margin: 0 auto;">
        @include('personalPage/post')

        <div class="shadow pt-3 pb-3 rounded" style="width: 30%;">
            <h3>還沒有任何動態</h3>
        </div>
    </div>

</div>
</div>
@include('home.music_player')

</body>
</html>
