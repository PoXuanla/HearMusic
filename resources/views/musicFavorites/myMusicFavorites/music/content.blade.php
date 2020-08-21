<nav aria-label="breadcrumb">
    <div class="d-flex justify-content-between">
        <ol class="breadcrumb w-75">
            <li class="breadcrumb-item"><a href="#">管理歌曲</a></li>
            <li class="breadcrumb-item active" aria-current="page">所有歌曲</li>
        </ol>

        <label for="uploadSong">
            <a href="{{route('manage.songs.upload')}}" id="#uploadSong" class="btn btn-danger">上傳歌曲</a>
        </label>
    </div>
</nav>

<div class="p-5 border rounded border shadow-sm">
    <h2> 歌曲列表 </h2>
</div>
