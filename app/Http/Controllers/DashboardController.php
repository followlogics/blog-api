<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

/**
 * Description of DashboardController
 *
 * @author techelogy
 */
class DashboardController extends Controller {

    function __construct() {
        $this->middleware('auth:api');
    }

    public function index(Request $request) {

        if ($request->ajax()) {
            $view = view('dashboard.index',['isAjax'=>TRUE])->render();
            return response()->json(["status" => 'success','html' => $view, 'title' => 'Dashboard']);
        } else {
            return view('dashboard.index',['isAjax'=>FALSE]);
        }
    }

}
