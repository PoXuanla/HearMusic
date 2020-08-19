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
                <a href="#" class="list-group-item list-group-item-action active">基本資料</a>
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
                <h2>
                    <strong>
                        基本資料
                    </strong>
                </h2>
                <form>
                    <div class="form-group">
                        <label for="InputName"><strong>暱稱（顯示名稱）</strong></label>
                        <input type="text" class="form-control" name="InputName" value="{{Auth::user()->name}}"
                               id="InputName" aria-describedby="emailHelp" placeholder="">

                    </div>

                    <hr class="mt-5 mb-5"/>

                    <h2>
                        <strong>
                            頭像與個人頁封面
                        </strong>
                    </h2>
                    {{--頭像--}}
                    <div class="form-group">
                        <label for="exampleInputPassword1"><strong>頭像</strong></label>
                        <small class="form-text text-muted">建議尺寸：360x360px 以上，圖片檔案大小不可超過 2MB</small>
                        <div>
                            @if(Auth::user()->personImage)
                                <img style="height:18rem;width: 18rem; object-fit: cover;"
                                     class="text-center rounded-circle mt-2 mb-2" src="{{Auth::user()->personImage}}"
                                     alt="Card image cap">
                            @else
                                <img style="height:18rem;width: 18rem; object-fit: cover;"
                                     class="text-center rounded-circle mt-2 mb-2"
                                     src="https://miro.medium.com/max/700/1*aPr8mcbhtRtULzxF-3v8IQ.png"
                                     alt="Card image cap">
                            @endif

                        </div>
                        <label class="btn border" for="my-file-selector">
                            <input id="my-file-selector" type="file" class="d-none">
                            更換頭像
                        </label>
                    </div>
                    {{--                        個人頁封面--}}
                    <div class="form-group">
                        <label for="exampleInputPassword1"><strong>個人頁封面
                            </strong></label>
                        <small class="form-text text-muted">建議尺寸：1920x360px 以上，圖片檔案大小不可超過 2MB
                        </small>
                        <div>
                            @if(Auth::user()->coverImage)
                                <img style="height:18rem;width: 30rem;  object-fit: cover;" class="rounded mt-2 mb-2"
                                     src="{{Auth::user()->personImage}}" alt="Card image cap">
                            @else
                                <img style="height:18rem;width: 30rem;  object-fit: cover;" class="rounded mt-2 mb-2"
                                     src="https://miro.medium.com/max/700/1*aPr8mcbhtRtULzxF-3v8IQ.png"
                                     alt="Card image cap">
                            @endif
                        </div>
                        <label class="btn border" for="my-file-selector">
                            <input id="my-file-selector" type="file" class="d-none">
                            更換個人頁封面
                        </label>
                    </div>
                    {{--                        個人簡介--}}
                    <hr class="mt-5 mb-5"/>

                    <h2>
                        <strong>
                            簡介
                        </strong>
                    </h2>
                    <div class="form-group">
                        <textarea name="intro" id="" cols="30" rows="10"
                                  style="resize: none;overflow-y: scroll;border-radius: 15px;outline:none;width: 30rem;"
                        >{{Auth::user()->introduction}}</textarea>
                    </div>
                    <hr/>
                    <button type="submit" class="btn btn-danger">儲存變更</button>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>
