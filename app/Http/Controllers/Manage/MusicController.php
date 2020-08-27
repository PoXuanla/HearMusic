<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Music;
use App\MusicCategory;
use App\Services\MusicService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;
use Validator;
use Redirect;
use Image;
use File;
class MusicController extends Controller
{
    protected $musicService;
    public function __construct(MusicService $musicService)
    {
        $this->musicService = $musicService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $music = Music::where('user_id',Auth::user()->id)->get();
        $musics = array();
        foreach ($music as $mu){
            $object = new \stdClass();
            $object->name = $mu->name;
            $object->user_name = User::select('name')->where('id',$mu->user_id)->get()[0]->name;
            $object->image = $mu->image;
            array_push($musics,$object);
        }
        return view('/musicFavorites/myMusicFavorites/music/main')
            ->with(compact('musics'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musicCategories = MusicCategory::all();
        return view('/musicFavorites/myMusicFavorites/music/upload/main')
            ->with(compact('musicCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try{
             $this->musicService->savePostData($request->all());
         }catch (\Exception $e){
             return redirect('music/manage/songs/create')->withErrors($e->getMessage());
         }
        return redirect('music/manage/songs');
//        $validatedData = $request->validate([
//            'mp3' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
//            'songName' => 'required',
//            'songIntro' => 'required',
//            'lyrics' => 'required',
//            'img' => 'required|image | max:20000',
//            'category' => 'required',
//            'status' => 'required'
//        ]);
//        $validator = Validator::make($request->all(), array(
//            'mp3' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
//            'songName' => 'required',
//            'songIntro' => 'required',
//            'lyrics' => 'required',
//            'img' => 'required|image | max:20000',
//            'category' => 'required',
//            'status' => 'required'
//        ));
//        if($validator->fails()) {
//            return $validator;
//            return Redirect::back()->withErrors($validator);
//        }

//        $validatedData = (object)$validatedData;
////        return $validatedData->mp3->getClientOriginalExtension();
//        $music = new Music();
//        $music->user_id = Auth::user()->id;
//        $music->category_id = $validatedData->category;
//        $music->name = $validatedData->songName;
//        $music->introduction = $validatedData->songIntro;
//        $music->lyric = $validatedData->lyrics;
//        $music->status = $validatedData->status;
//
//        //upload img
//        if (isset($validatedData->img)) {
//            $name = uniqid(). '.jpg';
//            $img = Image::make($validatedData->img)
//                ->resize(800, 600)
//                ->encode('jpg');
//            Storage::disk('public')->put('musicImg/'.$name,$img);
//
//            $music->image = env('APP_URL').'/storage/musicImg/' . $name;
//        }
//        //handle MP3
//        $name = uniqid().'.mp3';
//        Storage::disk('public')->putFileAs('mp4',$validatedData->mp3,$name);
//        $music->mp3 =  env('APP_URL').'/storage/mp3/' . $name;
//
//        $music->save();
//
//
//
//
//
//        return redirect('music/manage/songs');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
