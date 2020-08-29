<?php

namespace App\Http\Controllers;
use App\Fan;
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
//            $user = $user[0];
            //count music quantity
            $musicQuantity = Music::where('user_id',$object->user->id)->count();
            $object->musicQuantity = $musicQuantity;
            //count fans quantity
            $fansQuantity = Fan::where('user_id',$object->user->id)->count();
            $object->fansQuantity = $fansQuantity;
            //isn't track user?
            $isTrack = Fan::where([
                ['user_id',$object->user->id],
                ['fan_id',Auth::user()->id],
            ])->first();
            $object->isTrack = $isTrack;
            return view('/personalPage/main')->with(['object' => $object]);
        }else{
            return "no this user";
        }
        return view('/personalPage/main');
    }
}
