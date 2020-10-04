<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Music;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class PlayMusicController extends Controller
{
    public function show(Request $request){
        $music = Music::find($request->data);
        $arr  = array();
        foreach ($music as $mu){
            $data= new \stdClass();
            $data->id = $mu->id;
            $data->name = $mu->name;
            $data->mp3 = $mu->mp3;
            $data->user_name = User::find($mu->user_id)->name;
            $data->image = $mu->image;
            array_push($arr,$data);
        }
        return response()->json($arr);
    }
}
