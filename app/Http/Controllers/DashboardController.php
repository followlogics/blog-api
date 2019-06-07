<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;


class DashboardController extends Controller {

    function __construct() {
        //$this->middleware('auth:api');
    }

    public function index(Request $request) {

        if ($request->ajax()) {
            $view = view('dashboard.index',['isAjax'=>TRUE])->render();
            return response()->json(["status" => 'success','html' => $view, 'title' => 'Dashboard']);
        } else {
            return view('dashboard.index',['isAjax'=>FALSE]);
        }
    }
    
    public function profile(Request $request) {
        $user = $request->user();
        $user = User::where('id', $user->user_id)->first()->toArray();
        if ($request->ajax()) {
            $view = view('profile.index', ['isAjax' => TRUE, 'user' => $user])->render();
            return response()->json(["status" => 'success', 'html' => $view, 'title' => 'Profile']);
        } else {
            return view('profile.index', ['isAjax' => FALSE, 'user' => $user]);
        }
    }

}
