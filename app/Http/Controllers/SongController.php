<?php

namespace App\Http\Controllers;

use App\Music;
use App\SongComment;
use App\User;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index($song_id){
        $music = Music::findOrFail($song_id);
        $data = new \stdClass();
        $data->music = $music;
        $author = User::findOrFail($music->user_id);
        $data->author = $author;
        //comment
        $comment = SongComment::where('music_id',$song_id)->get();
        if($comment->first()){
            $arr = [];
            foreach($comment as $com){
                $object = new \stdClass();
                $user = User::find($com->user_id);
                $object->user_name = $user->name;
                $object->user_image = $user->personImage;
                $object->content = $com->content;
                array_push($arr,$object);
            }
            $data->comment = $arr;
        }else{
            $data->comment = null;
        }
        return view('song/main',compact('data'));
    }
}
