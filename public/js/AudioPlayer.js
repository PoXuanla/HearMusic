class AudioPlayer {
    constructor(playlist) {
        this.audioPlayer = new Audio();

        this.playList = playlist || [];
        this.playMode = 'step';
        this.currentIdx = 0 ;
        this.isPlaying = false;
        // internal: volume
        // internal: duration
        // internal: currentTime

        this.initEvents();
        this.setCurrentMusic();
    }

    // 內部註冊的事件
    initEvents() {
        // 建立自訂事件
        this.event = {
            current: new Event("currentmusicchange"),
            playMode: new Event("playmodechange"),
            playList: new Event("playlistchange"),
            isPlaying: new Event("playstatuschange"),
        }

        // 讀取完成自動播放
        this.audioPlayer.addEventListener('canplay', () => this.isPlaying ? this.audioPlayer.play() : this.audioPlayer.pause())

        // 播放狀態
        this.audioPlayer.addEventListener('play', () => this.setPlayStatus(true))
        // this.audioPlayer.addEventListener('pause', () => this.setPlayStatus(false))
        this.audioPlayer.addEventListener('abort', () => this.setPlayStatus(false))
        this.audioPlayer.addEventListener('error', () => this.setPlayStatus(false))
        // this.audioPlayer.addEventListener('emptied', () => this.setPlayStatus(false))
        this.audioPlayer.addEventListener('stalled', () => this.setPlayStatus(false))

        // 自動播下一首
        this.audioPlayer.addEventListener('ended', () => {
            const nextIdx = this.getNextMusicIdx();
            this.setCurrentMusic(nextIdx);
            if (this.playMode === 'step' && nextIdx === 0) {
                this.togglePlay(false);
            }
        })

        // 換歌時讀到歌曲總時間才算完成更換
        this.audioPlayer.addEventListener('durationchange', () => {
            this.audioPlayer.dispatchEvent(this.event.current)
        })
    }

    // 對外暴露的註冊事件 callback
    // internal event: timeupdate, volumechange, durationchange
    // custom event: playmodechange, currentmusicchange, playlistchange, playstatuschange
    on(event, callback) {
        this.audioPlayer.addEventListener(event, callback);
    }

    // 指定並讀取當下要播放的音樂
    // identifier = prev, next, 0, <integer>
    setCurrentMusic(identifier = this.currentIdx) {
        if (Number.isInteger(identifier)) {
            if (identifier < 0 || identifier >= this.playList.length) return;
            this.currentIdx = identifier;
        } else if (typeof identifier === 'string') {
            const newIdx = this.getNextMusicIdx(identifier);
            if (!newIdx) return;
            this.currentIdx = newIdx;
        } else {
            console.error('不合法的 identifier in setCurrentMusic');
            return;
        }

        this.audioPlayer.setAttribute('src', this.getMediaInfo().fileUrl)
        this.audioPlayer.load()
    }

    // 取得指定的歌曲資訊
    getMediaInfo(idx = this.currentIdx) {
        if (!Number.isInteger(idx) || idx < 0 || idx >= this.playList.length) return {};
        return this.playList[this.currentIdx];
    }

    // 播放 / 暫停
    togglePlay(nextIsPlaying = !this.isPlaying) {
        if (nextIsPlaying) {
            // 播放
            this.audioPlayer.play()
                .then(() => this.setPlayStatus(true))
                .catch(e => console.error('播放發生錯誤', e))
        } else {
            // 暫停
            this.audioPlayer.pause()
            this.setPlayStatus(false);
        }
    }

    // 調整播放模式
    setPlayMode(mode) {
        const validMode = ['step', 'shuffle', 'repeat-one', 'repeat-all'];
        if (validMode.indexOf(mode) !== -1) {
            this.playMode = mode;
            this.audioPlayer.dispatchEvent(this.event.playMode);
        }
    }

    // 調整播放狀態
    setPlayStatus(val) {
        if (typeof val !== 'boolean') return;
        this.isPlaying = val;
        this.audioPlayer.dispatchEvent(this.event.isPlaying);
    }

    // 取得下一首要播放的歌曲
    getNextMusicIdx(operation = this.playMode) {
        let nextIdx = 0;
        switch (operation) {
            case 'step':
                // 到播放清單底，結束播放
                if ((this.currentIdx + 1) >= this.playList.length) this.audioPlayer.pause();
                nextIdx = (this.currentIdx + 1) >= this.playList.length ? 0 : this.currentIdx + 1;
                break;

            case 'next':
            case 'repeat-all':
                nextIdx = (this.currentIdx + 1) >= this.playList.length ? 0 : this.currentIdx + 1;
                break;

            case 'prev':
                nextIdx = (this.currentIdx - 1) < 0 ? (this.playList.length - 1) : (this.currentIdx - 1);
                break;

            case 'shuffle':
                nextIdx = Math.floor(Math.random()*this.playList.length - 1);
                break;

            case 'repeat-one':
                nextIdx = this.currentIdx;
                break;

            default:
                console.log('不合法的操作', operation);
                return;
        }

        return nextIdx;
    }

    // 音量調整 (0 - 100)
    setVolume(vol) {
        if (typeof vol !== 'number') return;
        this.audioPlayer.volume = vol / 100;
    }

    // 進度條調整
    setCurrentTime(nextSec) {
        const currentMusic = this.getMediaInfo();
        if (!currentMusic) return;
        if (nextSec > currentMusic.duration) {
            this.audioPlayer.currentTime = 0;
        } else if (nextSec < 0) {
            this.audioPlayer.currentTime = 0;
        } else {
            this.audioPlayer.currentTime = nextSec;
        }
    }

    // 取得當前音量
    getVolume() {
        return this.audioPlayer.volume;
    }

    // 取得當前秒數
    getCurrentTime() {
        return this.audioPlayer.currentTime;
    }

    // 取得當前歌曲總長度
    getDuration() {
        return this.audioPlayer.duration;
    }

    // 取得當前播放模式
    getPlayMode() {
        return this.playMode;
    }

    // 取得當前播放狀態
    getIsPlaying() {
        return this.isPlaying;
    }
}
