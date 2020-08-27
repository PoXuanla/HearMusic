<?php


namespace App\Services;

use Validator;
use Illuminate\Validation\ValidationException;
use App\Repositories\MusicRepository;
use InvalidArgumentException;
class MusicService
{
    protected $musicRepository; //data access layer
    public function __construct( MusicRepository $musicRepository)
    {
        $this->musicRepository = $musicRepository;
    }
    public function savePostData($data)
    {

        $validator = Validator::make($data, [
            'mp3' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'songName' => 'required',
            'songIntro' => 'required',
            'lyrics' => 'required',
            'img' => 'required|image | max:20000',
            'category' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            throw new \Exception($validator->errors());
        }
        $result = $this->musicRepository->save($data);

        return $result;

    }
}
