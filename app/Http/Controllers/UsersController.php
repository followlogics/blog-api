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
use App\Appfile;
use App\Usertoken;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
                    'login_mail' => 'required|email',
                    'login_pass' => 'required'
        ]);
        if (!$validator->fails()) {

            $user = User::where('email', $request->input('login_mail'))->first();

            if ($user && (md5($request->input('login_pass')) == $user->password)) {

                $apikey = base64_encode(str_random(40));
                $r = Usertoken::create(['user_id' => $user->id, 'api_token' => "$apikey", 'social_media_type' => 'login']);
                return response()->json(['status' => 'success', 'msg' => 'Login successfully', 'api_token' => $apikey]);
            } else {
                return response()->json(['status' => 'notValid', 'errors' => array('E-mail or Password not match')], 200);
            }
        } else {

            return response()->json(['status' => 'notValid', 'errors' => $validator->errors()->all()], 200);
        }
    }

    public function register(Request $request) {
        $_POST = $request->all();
        $type = "direct";
        if (isset($_POST['from']) && $_POST['from'] == 'googleplus') {
            $_POST['password'] = str_random(15);
            $type = "googleplus";
        } else {
            $_POST['password'] = $_POST['reg_pass'];
            $_POST['email'] = $_POST['reg_mail'];
            $_POST['name'] = $_POST['reg_name'];
        }
        $validator = Validator::make($_POST, [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required',
        ]);
        if (!$validator->fails()) {
            $id = User::create(array(
                        'email' => $_POST['email'],
                        'password' => md5($_POST['password']),
                        'name' => $_POST['name'],
                        'address' => 'India',
                        'dob' => date('Y-m-d')
                    ))->id;
            $apikey = base64_encode(str_random(40));
            $u = Usertoken::create(['user_id' => $id, 'api_token' => "$apikey", 'social_media_type' => $type]);
            return response()->json(['status' => 'success', 'msg' => 'Registration successfully', 'api_token' => $apikey]);
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
        $authKey = 'AUTH KEY OR SERVER KEY';
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
        $realName = $file->getClientOriginalName();
        $picName = uniqid() . '_.' . $file->getClientOriginalExtension();
        $path = 'media' . DIRECTORY_SEPARATOR . 'time' . DIRECTORY_SEPARATOR;
        $destinationPath = storage_path($path);
        File::makeDirectory($destinationPath, 0777, true, true);
        if ($file->move($destinationPath, $picName)) {
            $f = Appfile::create(array(
                        'realfile_name' => $realName,
                        'file_name' => $picName
            ));
            return response()->json(['status' => 'success', 'fileName' => $f], 200);
        } else {
            return response()->json(['status' => 'notValid', 'errors' => $validator->errors()->all()], 200);
        }
    }

    public function loginForm(Request $request) {

        if ($request->ajax()) {
            $view = view('loginform')->render();
            return response()->json(['html' => $view, 'title' => 'Login']);
            ;
        } else {
            return view('loginform');
        }
    }

    public function signupForm(Request $request) {

        if ($request->ajax()) {
            $view = view('signupform')->render();
            return response()->json(['html' => $view, 'title' => 'Sign Up']);
            ;
        } else {
            return view('loginform');
        }
    }

    public function forgotForm(Request $request) {
        if ($request->ajax()) {
            $view = view('forgotform')->render();
            return response()->json(['html' => $view, 'title' => 'Forgot Password']);
        } else {
            return view('forgot');
        }
    }

    public function forgot(Request $request) {
        $validator = Validator::make($request->all(), [
                    'forgot_mail' => 'required|email'
        ]);
        if (!$validator->fails()) {
            $user = User::where('email', $request->input('forgot_mail'))->first();
             if ($user) {

                $apikey = base64_encode(str_random(40));
                return response()->json(['status' => 'success', 'msg' => 'Send Link Successfully']);
            } else {
                return response()->json(['status' => 'notValid', 'errors' => array('E-mail not found')], 200);
            }
        } else {
            return response()->json(['status' => 'notValid', 'errors' => $validator->errors()->all()], 200);
        }
    }
    function mailTo(){
        
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Host = $host;
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // or 465
            $mail->IsHTML(true);
            $mail->Username = 'example-1-2-3@gmail.com';
            $mail->Password = 'passswo';
            $mail->setFrom('example-3-2-1@gmail.com', "Follow");
            $mail->Subject = 'Testing';
            $mail->Body = 'Hi,<br/><br/>vivivkvkvvkvkv<br>vivivkvkvvkvkv<br>vivivkvkvvkvkv<br>vivivkvkvvkvkv<br>';
            $mail->addAddress('example-1-2-3@gmail.com');
            $mail->addReplyTo('example-reply@gmail.com', 'Follow');
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

}
