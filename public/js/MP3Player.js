class MP3Player{

    constructor() {
        this.musicQueue = new Array();
    }
    addNewMusic(url){
        this.musicQueue.push(url);
    }
    printQueueData(){
        console.log(this.musicQueue);
    }
    playModel(model){
        if(model === 'return'){
            this.audio.loop = true;
        }else if(model === 'go'){
            let musicQueue = this.musicQueue;
            let audio = this.audio;
            this.audio.addEventListener('ended',myhandler,false);
            function myhandler() {
                musicQueue.shift();
                audio.src = musicQueue[0];
                audio.play();
                audio.loop = true;
                console.log(musicQueue[0]);
            }
        }
    }
    start(){
        this.audio = new Audio(this.musicQueue[0]);
        // this.audio.play();
    }
    PlayorPause(){
        if(!this.audio.paused){
            this.audio.pause();
        }else{
            this.audio.play();
        }
    }
    getCurrentProgressPrecent(){
        let player_progress = (this.audio.currentTime/this.audio.duration)*100 + '%';
        return player_progress;
    }

}
