<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Appfile;

class AppfilesController extends Controller {

    function __construct() {
    }
    
    function getOneFile(Request $request){
        $this->middleware('auth:api');
        return '';
    }

    public function getall(Request $request){
        $files= Appfile::paginate();
        if($request->ajax()){
            return $files;
        }
        return view('appfiles.index', ['files' => $files]);
    }
}