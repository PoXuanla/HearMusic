<?php

namespace App\Http\Controllers\AccountSetting;

use App\Http\Requests\AccountSetting\BasicInformation\Update;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Exception;
use Image;

class BasicInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/accountSetting/basicInformation/main');
    }


    public function update(Update $request)
    {
        //
        $validated = $request->validated();
        $validated = (object)($validated);
        $user = User::find(Auth::user()->id);
        $user->name = $validated->name;
        if (isset($validated->intro)) {
            $user->introduction = $validated->intro;
        } else {
            $user->introduction = null;
        }
        if (isset($validated->personImage)) {

            $name = Auth::user()->account . '.jpg';
            $img = (string)Image::make($validated->personImage->getRealPath())
                ->resize(360, 360)
                ->encode('jpg');
//                ->save(public_path('/storage/personImage/' . $name));
            Storage::disk('public')->put('personImage/'.$name,$img);
            $user->personImage = env('APP_URL').'/storage/personImage/' . $name;
        }
        if (isset($validated->coverImage)) {
            $name = Auth::user()->account . '.jpg';
            $img = (string)Image::make($validated->coverImage->getRealPath())
                ->resize(800, 600)
                ->encode('jpg');
//                ->save(public_path('/storage/coverImage/' . $name));
            Storage::disk('public')->put('coverImage/'.$name,$img);

            $user->coverImage = env('APP_URL').'/storage/coverImage/' . $name;
        }
        $user->save();


        return redirect()->back()->withSuccess('更新成功!');
    }


}
