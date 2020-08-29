<?php

namespace App\Http\Controllers\Api;

use App\Fan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class FanController extends Controller
{
    public function index(){
        return "asdsadsad";
    }
    public function create(Request $request){
//        $postJsonData = $request->getContent();
//        $postJsonData
        $fan = new Fan();
        $fan->user_id = $request->user_id;
        $fan->fan_id = $request->id;
        $fan->save();
        return response()->json([
           "success" => true,
           'message' => 'success',
        ]);
    }
    public function destroy(Request $request)
    {
        Fan::where([
            ['user_id',$request->user_id],
            ['fan_id',$request->id],
        ])->delete();
    }
}
