<h2>
    <strong>
        基本資料
    </strong>
</h2>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<form action="{{url('/accounts/manage/profile')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="InputName"><strong>暱稱（顯示名稱）</strong></label>
        @error('name')
        <div class="alert alert-danger mt-3 mb-3">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
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
        @error('personImage')
        <div class="alert alert-danger mt-3 mb-3">{{ $message }}</div>
        @enderror
        <div>
            @if(Auth::user()->personImage)
                <img style="height:18rem;width: 18rem; object-fit: cover;"
                     id = "personImage"
                     class="text-center rounded-circle mt-2 mb-2" src="{{Auth::user()->personImage}}"
                     alt="必須為圖片">
            @else
                <img style="height:18rem;width: 18rem; object-fit: cover;"
                     id = "personImage"
                     class="text-center rounded-circle mt-2 mb-2"
                     src="https://miro.medium.com/max/700/1*aPr8mcbhtRtULzxF-3v8IQ.png"
                     alt="必須為圖片">
            @endif

        </div>
        <label class="btn border" for="personImageInput">
            <input id="personImageInput" type="file" class="d-none" name="personImage" accept="image/*">
            更換頭像
        </label>
    </div>
    {{--                        個人頁封面--}}
    <div class="form-group">
        <label for="exampleInputPassword1"><strong>個人頁封面
            </strong></label>
        <small class="form-text text-muted">建議尺寸：800x600px 以上，圖片檔案大小不可超過 2MB
        </small>
        @error('coverImage')
        <div class="alert alert-danger mt-3 mb-3">{{ $message }}</div>
        @enderror

        <div>
            @if(Auth::user()->coverImage)
                <img id = "coverImage"
                     style="height:18rem;width: 30rem;  object-fit: cover;"
                     class="rounded mt-2 mb-2"
                     src="{{Auth::user()->coverImage}}"
                     alt="必須為圖片">
            @else
                <img id = "coverImage"
                     style="height:18rem;width: 30rem;  object-fit: cover;"
                     class="rounded mt-2 mb-2"
                     src="https://miro.medium.com/max/700/1*aPr8mcbhtRtULzxF-3v8IQ.png"
                     alt="必須為圖片">
            @endif
        </div>
        <label class="btn border" for="coverImageInput">
            <input id="coverImageInput" type="file" class="d-none" name="coverImage" accept="image/*">
            更換個人頁封面
        </label>
    </div>
    {{--個人簡介--}}
    <hr class="mt-5 mb-5"/>

    <h2>
        <strong>
            簡介
        </strong>
    </h2>
    @error('intro')
    <div class="alert alert-danger mt-3 mb-3">{{ $message }}</div>
    @enderror
    <div class="form-group">
                        <textarea name="intro" id="" cols="30" rows="10"
                                  style="resize: none;overflow-y: scroll;border-radius: 15px;outline:none;width: 30rem;"
                        >{{Auth::user()->introduction}}</textarea>
    </div>
    <hr/>
    <button type="submit" class="btn btn-danger">儲存變更</button>
</form>
