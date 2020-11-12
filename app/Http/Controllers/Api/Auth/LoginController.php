<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'You cannot sign with those credentials',
                'errors' => 'Unauthorised'
            ], 401);
        }
        //$token = Str::random(80);
        $token = Auth::user()->createToken(config('app.name'));

        
        //Auth::user()->createToken(config('app.name'));
        //zapomnit menia
       // $token->token->expires_at = $request->remember_me ?
          //  Carbon::now()->addMonth() :
         //   Carbon::now()->addDay();
        //$token->token->save();

        return response()->json([
            'User' => Auth::user(),
            'token_type' => 'Bearer',
            'token' => $token->accessToken,
            //'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ], 200);
    }
}
