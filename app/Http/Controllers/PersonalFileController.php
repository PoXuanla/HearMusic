<?php

namespace App\Http\Controllers;
use App\Fan;
use App\PersonalNews;
use App\PersonalNewsComment;
use App\User;
use App\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PersonalFileController extends Controller
{
    public function index($account)
    {

        $user = User::where('account',$account)->get();

        if($user->first()){
            $object = new \stdClass();
            $object->user = $user[0];
            //count music quantity
            $musicQuantity = Music::where('user_id',$object->user->id)->count();
            $object->musicQuantity = $musicQuantity;
            //count fans quantity
            $fansQuantity = Fan::where('user_id',$object->user->id)->count();
            $object->fansQuantity = $fansQuantity;
            //計算追蹤多少人
            $trackQuantity = Fan::where('fan_id',$object->user->id)->count();
            $object->trackQuantity = $trackQuantity;
            //isn't track user?
            $isTrack = Fan::where([
                            ['user_id',$object->user->id],
                            ['fan_id',Auth::user()->id],
                       ])->first();
            $object->isTrack = $isTrack;
            //personal news
            $personalNews = PersonalNews::where('user_id',$object->user->id)->get();
            if($personalNews->first()){
                $posts = array();
                foreach ($personalNews as $new){
                    $post = new \stdClass();
                    $post->id = $new->id;
                    $postComment = PersonalNewsComment::where('personal_news_id',$new->id)->get();
                    if($postComment->first()){
                        $comment = array();
                        foreach ($postComment as $com){
                            $comm = new \stdClass();
                            $comm->id = $com->id;
                            $comm->content = $com->content;
                            $comm->personImage = User::find($com->user_id,['personImage'])->personImage;
                            $comm->name = User::find($com->user_id,['name'])->name;

                            array_push($comment,$comm);
                        }
                        $post->comment = $comment;
                    }else{
                        $post->comment = null;

                    }
                    $post->title = $new->title;
                    $post->time = $new->created_at;
                    //MP3 information
                    $music = Music::find($new->music_id);
                    $post->music = $music;

                    array_push($posts,$post);
                }
                $object->posts = $posts;

            }else{
                $object->posts->music = null;
            }
            return view('/personalPage/main')->with(['object' => $object]);
        }else{
            return "no this user";
        }
        return view('/personalPage/main');
    }
}
