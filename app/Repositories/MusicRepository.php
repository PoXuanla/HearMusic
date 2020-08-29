<?php


namespace App\Repositories;

use App\Music;
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

        return $music->fresh();
    }

}
