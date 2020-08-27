<?php


namespace App\Repositories;

use App\Music;
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
        $this->$music = $music;
    }
    public function save($validatedData)
    {
        $music = new $this->music;

        $validatedData = (object)$validatedData;

        $music->user_id = Auth::user()->id;
        $music->category_id = $validatedData->category;
        $music->name = $validatedData->songName;
        $music->introduction = $validatedData->songIntro;
        $music->lyric = $validatedData->lyrics;
        $music->status = $validatedData->status;

        $music->save();

        return $music->fresh();
    }

}
