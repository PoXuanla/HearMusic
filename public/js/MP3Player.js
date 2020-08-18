class MP3Player{
    mode = 'loop';

    constructor() {
        this.musicQueue = new Array();
        this.currentPlayingIndex ;
        this.event = new Event('build');

        // this.start();
    }

    start(){
        this.audio = new Audio(this.musicQueue[0]);
        this.audio.currentTime = 7;
        console.log("is start");
    }

    Audio(){
        return this.audio;

    }
    on(event, callback) {
        this.audio.addEventListener(event, callback);
    }
    playMode(mode){

        this.audio.dispatchEvent(this.event);
        console.log("ff");
    }
    addNewMusic(url){
        this.musicQueue.push(url);
    }
    PlayorPause(){
        if(!this.audio.paused){
            this.audio.pause();
        }else{
            this.audio.play();

        }
    }
    CurrentProgressPrecent(){
        let player_progress = (this.audio.currentTime/this.audio.duration)*100 + '%';
        return player_progress;
    }


}

