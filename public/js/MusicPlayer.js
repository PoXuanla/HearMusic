class MusicPlayer{
    constructor(playList) {
        this.playList = playList || [];
        this.currentIdx = 0;
        this.playMode = 'step';
        this.audioPlayer = new Audio();
        this.initEvents();

    }

    initEvents(){
        // custom event
        var current = new Event('currentMusicChange');
        var isPlaying = new Event('playStatusChange');

        //換歌時觸發
        this.audioPlayer.addEventListener('durationchange',() => {
            this.audioPlayer.dispatchEvent(current);
        });
        this.audioPlayer.addEventListener('ended',() => {
           const nextIdx  = this.getNextIdx();
           //step
            if(nextIdx === 0 && this.playMode === 'step'){
                //更改音樂為第一首
                this.audioPlayer.dispatchEvent(current);
                this.audioPlayer.setAttribute('src',this.playList[this.currentIdx].mp3);

                this.audioPlayer.pause();
                this.audioPlayer.dispatchEvent(isPlaying);
            }else{
                this.setCurrentMusic(nextIdx);
            }
        });

    }
    on(event,callback){
        this.audioPlayer.addEventListener(event,callback);
    }
    setCurrentMusic(Idx = this.currentIdx){
        this.audioPlayer.setAttribute('src',this.playList[Idx].mp3);
        this.audioPlayer.load();
        this.audioPlayer.play();
    }
    setPlayList(list){
        this.currentIdx = 0;
        this.playList = list;
    }
    getNextIdx(mode = this.playMode){
        console.log(this.playMode + " by class.");
        let nextIdx ;
        switch (mode) {
            case "step":
                nextIdx = (this.currentIdx +1) > this.playList.length -1 ? 0 : this.currentIdx + 1;
                console.log(nextIdx);
                break;
            case 'repeat-one':
                nextIdx = this.currentIdx;
                break;
            case 'repeat-all':
                nextIdx = (this.currentIdx +1) > this.playList.length-1 ? 0 : this.currentIdx + 1;
                break;
            case 'shuffle':
                nextIdx = Math.floor(Math.random()*this.playList.length);
                break;
        }
        this.currentIdx = nextIdx;
        return nextIdx;

    }
    getCurrentTime() {
        return this.audioPlayer.currentTime;
    }
    getMusicInfo(){
        return this.playList[this.currentIdx];
    }
    togglePlay(){
        if(this.audioPlayer.paused){
            this.audioPlayer.play();
        }else{
            this.audioPlayer.pause();
        }
    }
    CurrentProgressPrecent(){
        let player_progress = (this.audioPlayer.currentTime/this.audioPlayer.duration)*100;
        return player_progress;
    }
    setPlayMode(mode){
        this.playMode = mode;
    }
    setCurrentTime(durationPercent){
        let duration = this.audioPlayer.duration;
        let newDuration = duration * durationPercent / 100;
        this.audioPlayer.currentTime = newDuration;
    }
    next(){
        if((this.currentIdx +1) >= this.playList.length){
            this.currentIdx = 0;
        }else{
            this.currentIdx ++ ;
        }
        this.setCurrentMusic(this.currentIdx);
    }
    prev(){
        if((this.currentIdx -1) < 0){
            this.currentIdx = this.playList.length-1;
        }else{
            this.currentIdx -- ;
        }
        this.setCurrentMusic(this.currentIdx);
    }
}
