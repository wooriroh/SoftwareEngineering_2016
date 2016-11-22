<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MobileAuthenticationController extends Controller
{

    public function getAccessToken(Request $request)
    {
        if (Auth::once($request->only('email','password'))) {
            $accessToken = Auth::user()->createToken($request->ip())->accessToken;

            return response()->json(['access_token'=>$accessToken]);
        } else {
            return response()->json(['error'=>'Invalid credentials'], 401);
        }
    }

}
