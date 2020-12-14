<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getProfile(Request $request)
    {
        $user = Auth::user();
        $data['user'] = $user;

        $response = [
            "response_code" => "00",
            "response_message" => "success",
            "data" => $data
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $user = Auth::user();

        $user->name = $request->name;

        if($request->hasFile("photo_profile")){
            $photoFile = $request->file("photo_profile");
            $fileExt = $photoFile->getClientOriginalExtension();
            $photoFileName = Str::slug($user->name,'-').'-'.$user->id.".".$fileExt;
            $photoFileFolder = '/photos/users/photo-profile/';
            $photoFileLocation = $photoFileFolder.$photoFileName;
            $photoFile->move(public_path($photoFileFolder),$photoFileName);

            $user->photo_path = $photoFileLocation;
        }

        $user->save();

        $data['user'] = $user;

        $response = [
            "response_code" => "00",
            "response_message" => "profile berhasil diupdate",
            "data" => $data
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
