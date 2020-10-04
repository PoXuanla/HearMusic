<div  id="music_player" class="d-none	" style="position: fixed;background-color: white;bottom: 0;width:30rem;
  right: 0;border-radius: 10px;overflow: hidden;     z-index: 1;">
    <div>
        <div  id="musicPlayer_Progress_bg" style="position:relative;width: 100%; height:5px; background-color: grey; cursor: pointer">
                    <div id="musicPlayer_Progress"
                         style="position:absolute;top: 0;left: 0; width:0%;height:5px; background-color: red;"></div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center" style="width: 80%; margin: 0 auto;">
        <img id = "songImg" src="" alt=""
             style="width: 15%;height: 90%;border-radius: 10px;">
        <div>
            <h4 id = "songName"></h4>
            <h5 id = "songAuthor"></h5>
        </div>
        <div>
            <button id="player_prev" class="btn shadow-none"><i class="fas fa-backward"></i></button>
            <button id="player_next" class="btn shadow-none"><i class="fas fa-forward"></i></button>

        </div>
        <div>
            <button  id="player_play" class="btn shadow-none isPlaying"><i class="fas fa-pause"></i></button>

            <button id = "playerMode" class="btn btn-danger">step</button>
        </div>
    </div>

</div>

</div>
