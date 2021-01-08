<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialliteController extends AuthController
{
    public function redirectToProvider($provider)
    {
        $url = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();

        $data['url'] = $url;

        $response = [
            "response_code" => $this->successCode,
            "response_message" => "redirect berhasil",
            "data" => $data
        ];
        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }

    public function handleProvideCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            if(empty($socialUser)){
                $response = [
                    "response_code" => $this->failCode,
                    "response_message" => 'login failed'
                ];
                return response($response, 401)
                    ->header('Content-Type', 'text/json');
            }

            $user = User::whereEmail($socialUser->email)->first();

            if(!$user){
                if($provider == 'google'){
                    $photoProfile = $socialUser->avatar;
                }

                if(User::isFirstRecord()){
                    $roleId = Role::getIdByRoleName('admin');
                } else {
                    $roleId = Role::getIdByRoleName('user');
                }

                $user = User::create([
                    'email' => $socialUser->email,
                    'name'  => $socialUser->name,
                    'email_verified_at' => Carbon::now(),
                    'photo_path' => $photoProfile,
                    'role_id' => $roleId
                ]);
            }

            $data['user'] = $user;
            $data['token'] = $user->createToken('app')->accessToken;

            $response = [
                "response_code" => $this->successCode,
                "response_message" => "login berhasil",
                "data" => $data
            ];
            return response($response, 200)
                ->header('Content-Type', 'text/json');

        } catch (\Exception $error) {
            $response = [
                "response_code" => $this->failCode,
                "response_message" => $error->getMessage()
            ];
            return response($response, 401)
                ->header('Content-Type', 'text/json');
        }
    }
}
