$(function() {
    $(document).on('click','.playMusic',function () {
        $.ajax({
            type: "GET",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'http://localhost/MusicProject/public/api/playingMusicList',
            contentType: "application/json;charset=utf-8",
            data: {data:[$(this).data("id")]},
            success: function(data){
                initMusic(data);
            }
        })
    });
});
