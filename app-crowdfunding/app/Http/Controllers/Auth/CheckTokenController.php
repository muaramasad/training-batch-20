<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class CheckTokenController extends AuthController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $response = [
            "response_code" => $this->successCode,
            "response_message" => "token valid"
        ];
        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
