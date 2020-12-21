<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function all()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }

    public function addUser(Request $request)
    {
        $user = User::create([
            'name' => $request->name
        ]);
        return new UserResource($user);
    }

    public function updateUser(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return new UserResource($user);
    }

    public function deleteUser($id)
    {
        $user = User::destroy($id);
        return array(
            "message" => "success"
        );
    }
}
