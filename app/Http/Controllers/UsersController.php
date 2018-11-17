<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Libraries\PHPqrcode\VikCode\VikCode as VikCode;
use QRbitstream;
use QRcode;
use QRencode;
use QRimage;
use QRinput;
use QRinputItem;
use QRmask;
use QRrawcode;
use QRrs;
use QRrsItem;
use QRrsblock;
use Illuminate\Support\Facades\File;

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


        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required'
        ]);
        if (!$validator->fails()) {

            $user = User::where('email', $request->input('email'))->first();

            if ($user && (md5($request->input('password')) == $user->password)) {

                $apikey = base64_encode(str_random(40));
                $r = User::where('email', $request->input('email'))->update(['api_token' => "$apikey"]);
                return response()->json(['status' => 'success', 'r' => $r, 'user' => $user->toArray(), 'api_token' => $apikey]);
            } else {
                return response()->json(['status' => 'notValid', 'errors' => array('E-mail or Password not match')], 200);
            }
        } else {

            return response()->json(['status' => 'notValid', 'errors' => $validator->errors()->all()], 200);
        }
    }

    public function register(Request $request) {
        $_POST = $request->json()->all();
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required',
        ]);
        if (!$validator->fails() || 1) {
            User::create(array('email' => $_POST['email'],
                'password' => $_POST['password'],
                'name' => $_POST['name']
            ));
            $user = User::where('email', $_POST['email'])->first();
            $apikey = base64_encode(str_random(40));
            $u = User::where('email', $request->input('email'))->update(['api_token' => "$apikey"]);
            return response()->json(['status' => 'success', 'user' => $user->toArray(), 'api_token' => $apikey]);
        } else {
            return response()->json(['status' => 'notValid', 'errors' => $validator->errors()->all()], 200);
        }
    }

    public function qrcode(Request $request) {
        // we building raw data 
        $codeContents = 'https://github.com/VikashAmbani/';
        /** using file path  */
        //  $qr=QRcode::png($codeContents,'vikQrcode.png',QR_ECLEVEL_L, 3);
        /** direct qr code */
        QRcode::png($codeContents);
    }

    public function notify(Request $req) {
        $url = "https://fcm.googleapis.com/fcm/send";
        $token = (isset($_GET['token']) ? $_GET['token'] : NULL);
        $auth = (isset($_GET['auth']) ? $_GET['auth'] : NULL);
        $authKey='AUTH KEY OR SERVER KEY';
        $deviceToken = '{{DEVICE_TOKEN}}';
        if (isset($token)) {
            $deviceToken = $token;
        }
        if (isset($auth)) {
            $authKey = $auth;
        }
        echo '<br/><br/>';
        $postData = '{
      "to" : "' . $deviceToken . '",
      "priority" : "normal",
      "notification" : {
        "body" : "Body text.",
        "title" : "TITLE",
        "icon" : "http://yoururl.com/icon.png",
      }
    }';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            "Authorization:key=$authKey"
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        var_dump($server_output);
        curl_close($ch);
    }

    public function fileupload(Request $request) {
        $this->validate($request, [
            'your_data' => 'required|image|mimes:apk,jpeg,png,jpg|max:12048',
        ]);
        $file = $request->file('your_data');
        $picName = $file->getClientOriginalName();
        $picName = uniqid() . '_.' . $file->getClientOriginalExtension();
        $path = 'media' . DIRECTORY_SEPARATOR . 'time' . DIRECTORY_SEPARATOR;
        $destinationPath = storage_path($path);
        File::makeDirectory($destinationPath, 0777, true, true);
        if ($file->move($destinationPath, $picName)) {
            return response()->json(['status' => 'success', 'fileName' => $picName], 200);
        } else {
            return response()->json(['status' => 'notValid', 'errors' => $validator->errors()->all()], 200);
        }
    }

}
