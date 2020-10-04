
$( document ).ready(function() {

    $(document).on('click','.playMusic',function () {
        var data = $(this).data("id");
        var arr = new Array();
        arr.push(data);
        var music = $(this).parents("li").nextAll("li").find(".playMusic");
        music.each(function(){
           arr.push($(this).data("id"));
        });
        console.log(arr);
        $.ajax({
            type: "GET",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: 'http://localhost/MusicProject/public/api/playingMusicList',
            contentType: "application/json;charset=utf-8",
            data: {data:arr},
            success: function (data) {
                var musicList = new Array();
                for(var i = 0 ; i<data.length ; i++){
                    musicList.push(data[i]);
                }

                initMusic(musicList);
            },
            error: function (data) {
                console.log(data);
            }
        });
    })
});
