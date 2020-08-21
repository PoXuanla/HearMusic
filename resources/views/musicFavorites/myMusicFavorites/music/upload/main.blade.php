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
    <div class="row w-75 mx-auto mt-5">
        <a href="{{url()->previous()}}" class="btn bg-white border shadow-sm">←返回管理音樂</a>
    </div>
    <div class="w-75 mx-auto mt-5 border shadow-sm rounded p-5">
        <form>
            <div class="d-flex">
                <div class="w-25 text-center">
                    <img id="coverImage"
                         style="height:10rem;width: 10rem;  object-fit: cover;"
                         class="rounded mt-2 mb-2"
                         src="{{Auth::user()->coverImage}}"
                         alt="必須為圖片">
                    <small class="form-text text-muted">
                        建議尺寸：500x500px 以上，圖片檔案大小不可超過 2MB
                    </small>
                    <label class="btn border" for="musicImageInput">
                        <input id="musicImageInput" type="file" class="d-none" name="musicImage" accept="image/*">
                        封面
                    </label>


                </div>
                <div class="w-50 text-center mx-auto">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputSSongName" placeholder="請輸入歌曲名稱">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <textarea class="border w-100 rounded"
                                      name="intro"
                                      placeholder="請輸入歌曲介紹"
                                      id=""
                                      cols="30" rows="10"
                                      style="resize: none;outline:none;"
                            ></textarea>
                        </div>
                        <div class="form-group col-md-6 ">
                                 <textarea class="border w-100 rounded"
                                           name="intro"
                                           placeholder="請輸入歌詞"
                                           id=""
                                           cols="30" rows="10"
                                           style="resize: none;outline:none;"
                                 ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="custom-select custom-select-lg">
                            <option value="1">專輯 : 無</option>
                        </select>
                    </div>
                    <div class="form-row justify-content-around">
                        <div class="form-group col-md-6 w-100">
                            <select class="custom-select custom-select-lg">
                                <option value="1">分類 : 未分類</option>
                                <option value="1">Rock</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 w-100">
                            <select class="custom-select custom-select-lg">
                                <option value="1">狀態 : 公開</option>
                                <option value="1">狀態 : 隱藏</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-danger ">建立</button>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
</body>
</html>
