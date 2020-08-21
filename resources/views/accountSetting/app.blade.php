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
<div class="container-fuild">
    <div class="w-75 mx-auto pt-3 pb-3">
        <h2>
            <strong>
                帳號設定
            </strong>
        </h2>
        <hr class="mt-3 mb-5"/>

    </div>

    <div class="d-flex w-75 mx-auto justify-content-between">

        <div class="w-25">
            <h2>會員資料</h2>

            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">基本資料</a>
                <a href="#" class="list-group-item list-group-item-action">電子郵件</a>
                <a href="#" class="list-group-item list-group-item-action">手機號碼</a>
                <a href="#" class="list-group-item list-group-item-action ">社群帳號綁定</a>
            </div>
            <hr class="mt-5 mb-5"/>

            <h2>帳號管理</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">變更密碼</a>
                <a href="#" class="list-group-item list-group-item-action">電子郵件</a>
                <a href="#" class="list-group-item list-group-item-action">手機號碼</a>
                <a href="#" class="list-group-item list-group-item-action ">社群帳號綁定</a>
            </div>
        </div>
        <div class="rounded border mb-3" style="width: 60%">
            <div class="p-5">
                @yield('content')
            </div>

        </div>
    </div>
</div>
@yield('JS')
</body>
</html>
