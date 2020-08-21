<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
 @include('nav')
 <div class="container-fluid">
     <div class="row w-75 mx-auto pt-5 pb-3" style="">
         <ul class="nav nav-pills nav-fill w-50">
             <li class="nav-item">
                 <a class="nav-link" href="{{route('manage.like')}}">我的音樂庫</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="{{route('manage.songs')}}">管理音樂作品</a>
             </li>
         </ul>
     </div>
     <hr class=""/>

     <div class="d-flex w-75 mx-auto justify-content-between">
         <div class="w-25 p-3">
            @yield('sideBar')
         </div>

         <div class="rounded mb-3" style="width: 60%">
             <div class="p-5">
                 @yield('content')
             </div>

         </div>
     </div>
 </div>

</body>
</html>
