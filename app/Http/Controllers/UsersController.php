<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

    function __construct() {

//        $this->middleware('auth:api');
    }

    /**
          * Display a listing of the resource.
          *
          * @return \Illuminate\Http\Response
          */
    public function authenticate(Request $request) {
        
        $requestData = (file_get_contents('php://input'));
        if ($requestData) {
            $_POST = json_decode($requestData, TRUE);
        }
       
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user && (md5($request->input('password')) == $user->password)) {

            $apikey = base64_encode(str_random(40));
            User::where('email', $request->input('email'))->update(['api_token' => "$apikey"]);

            return response()->json(['status' => 'success','user'=>$user->toArray(), 'api_token' => $apikey]);
        } else {

            return response()->json(['status' => 'fail'], 401);
        }
    }

}
