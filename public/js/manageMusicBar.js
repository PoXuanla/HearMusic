var player = new MusicPlayer();
var playMode = ['step','repeat-one','repeat-all','shuffle'];
var playMode_Idx = 0;
$(function(){
    setProgress(); //設置進度條
    togglePlay(); //撥放暫停
    playNext(); //下一首
    playPrev(); //上一首
    changeMusicProgress();

});

//換首歌時，重新獲取新音樂的資料
player.on('currentMusicChange',function(){
    setSongIntro(player);
});
player.on('playStatusChange',function(){
    $('#player_play').removeClass("isPlaying");
    $('#player_play').html("<i class=\"fas fa-play\"></i>");

});
$(document).on('click','#playerMode',function(){
    if((playMode_Idx+1) > playMode.length -1){
        playMode_Idx = 0;
    }else{
        playMode_Idx ++ ;
    }
    switch (playMode[playMode_Idx]) {
        case 'step':
            $(this).html("step");
            break;
        case 'repeat-one':
            $(this).html("repeat-one");
            break;
        case 'repeat-all':
            $(this).html("repeat-all");
            break;
        case 'shuffle':
            $(this).html("shuffle");
            break;
    }
    player.setPlayMode(playMode[playMode_Idx]);
    console.log("It's " + playMode[playMode_Idx] + " now.");
});
function togglePlay(){
    $('#player_play').on("click", function () {
        if ($(this).hasClass("isPlaying")) {
            $(this).removeClass("isPlaying");
            $(this).html("<i class=\"fas fa-play\"></i>");
            player.togglePlay();
        } else {
            $(this).addClass("isPlaying");
            $(this).html("<i class=\"fas fa-pause\"></i>");
            player.togglePlay();
        }
    });
}
function initMusic(musicList) {
    player.setPlayList(musicList);
    player.setCurrentMusic();
    //預設為撥放狀態
    $('#player_play').addClass("isPlaying");
    $('#player_play').html("<i class=\"fas fa-pause\"></i>");
    setSongIntro();

}

function setSongIntro(){
    $("#songName").html(player.getMusicInfo().name);
    $("#songAuthor").html(player.getMusicInfo().user_name);
    $("#songImg").attr("src", player.getMusicInfo().image);
    $('#music_player').removeClass('d-none');
}
function setProgress(){
    setInterval( ()=>{progress();},100);
    function progress(){
        $('#musicPlayer_Progress').width(player.CurrentProgressPrecent() + "%") ;
    }
}
function changeMusicProgress(){
    const progress = $('#musicPlayer_Progress_bg');
    progress.mousedown(() => {
       progress.mousemove((e)=>{
           dragProgressBar(e);
       })
    });
    progress.mouseup((e) => {
       progress.off('mousemove');
        dragProgressBar(e);
    });

}

function dragProgressBar(e){
    const progress = $('#musicPlayer_Progress_bg');
    let width = progress.width();
    let coordinatesStart = e.clientX - e.offsetX;
    let progressPercent = (e.clientX - coordinatesStart) / width * 100;

    $('#musicPlayer_Progress').width(progressPercent +　"%") ;
    player.setCurrentTime(progressPercent);
}
function playNext(){
    $(document).on('click','#player_next',function(){
       player.next();
        $('#player_play').addClass("isPlaying");
        $('#player_play').html("<i class=\"fas fa-pause\"></i>");
    });
}
function playPrev(){
    $(document).on('click','#player_prev',function(){
        player.prev();
        $('#player_play').addClass("isPlaying");
        $('#player_play').html("<i class=\"fas fa-pause\"></i>");
    });
}
