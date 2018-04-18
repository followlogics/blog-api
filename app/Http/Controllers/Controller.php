<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {

    protected $rawData = [];

    function __construct() {
        $requestData = (file_get_contents('php://input'));
        if ($requestData) {
            $this->rawData = json_decode($requestData, TRUE);
        }
    }

}
