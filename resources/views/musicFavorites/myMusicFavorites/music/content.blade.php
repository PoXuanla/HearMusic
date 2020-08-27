<nav aria-label="breadcrumb">
    <div class="d-flex justify-content-between">
        <ol class="breadcrumb w-75">
            <li class="breadcrumb-item"><a href="#">管理歌曲</a></li>
            <li class="breadcrumb-item active" aria-current="page">所有歌曲</li>
        </ol>

        <label for="uploadSong">
            <a href="{{route('songs.create')}}" id="#uploadSong" class="btn btn-danger">上傳歌曲</a>
        </label>
    </div>
</nav>

<div class="p-5 border rounded border shadow-sm">
    <h2> 歌曲列表 </h2>
    <ul class="list-group">
        @foreach($musics as $key=>$value)
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div>
                    <h4 style="display: inline-block;">{{$key +1 }} -</h4>
                    <img style="max-height: 80px;max-width: 80px;"src={{$value->image}} alt="">
                    <div style="display: inline-block;vertical-align: middle;">
                        <h4>{{$value->name}}</h4>
                        <h5>{{$value->user_name}}</h5>
                    </div>
                </div>
                <div>
                    <button class="btn btn-dark"><i class="fas fa-heart"></i><span style="padding-left: 10px;">0</span></button>
                    <button class="btn btn-danger"><i class="fas fa-play-circle"></i></button>
                </div>


            </li>
        @endforeach
    </ul>
</div>
