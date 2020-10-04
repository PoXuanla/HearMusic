<?php


namespace App\Repositories;

use App\Music;
use App\PersonalNews;
use Illuminate\Support\Facades\Auth;
class MusicRepository
{
    protected $music;

    /**
     * PostRepository constructor.
     *
     * @param Music $music
     */
    public function __construct(Music $music)
    {
        $this->music = $music;
    }
    public function save($validatedData)
    {
        $music = new $this->music;

        $music->user_id = Auth::user()->id;
        $music->category_id = $validatedData->category;
        $music->name = $validatedData->songName;
        $music->introduction = $validatedData->songIntro;
        $music->lyric = $validatedData->lyrics;
        $music->status = $validatedData->status;
        $music->mp3 = $validatedData->mp3;
        if(isset($validatedData->image)){
            $music->image = $validatedData->image;
        }
        $music->save();

        $personal_news = new PersonalNews();
        $personal_news->user_id = Auth::user()->id;
        $personal_news->title = "發佈了一首歌曲";
        $personal_news->music_id = $music->id;
        $personal_news->save();
        return $music->fresh();
    }

}
