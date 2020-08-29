<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Validation\ValidationException;
use App\Repositories\MusicRepository;
use InvalidArgumentException;
use Image;
class MusicService
{
    protected $musicRepository; //data access layer
    public function __construct( MusicRepository $musicRepository)
    {
        $this->musicRepository = $musicRepository;
    }
    public function savePostData($validatedData)
    {
        $validatedData = (object)$validatedData;
//        $validator = Validator::make($data, [
//            'mp3' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
//            'songName' => 'required',
//            'songIntro' => 'required',
//            'lyrics' => 'required',
//            'img' => 'required|image | max:20000',
//            'category' => 'required',
//            'status' => 'required'
//        ]);
//        if ($validator->fails()) {
//            throw new \Exception($validator->errors());
//        }
        //img
        if (isset($validatedData->img)) {
            $name = uniqid(). '.jpg';
            $img = Image::make($validatedData->img)
                ->resize(800, 600)
                ->encode('jpg');
            Storage::disk('public')->put('musicImg/'.$name,$img);

            $validatedData->image = env('APP_URL').'/storage/musicImg/' . $name;
        }
        //mp3
        $name = uniqid().'.mp3';
        Storage::disk('public')->putFileAs('mp3',$validatedData->mp3,$name);
        $validatedData->mp3 =  env('APP_URL').'/storage/mp3/' . $name;

        $result = $this->musicRepository->save($validatedData);

    }
}
