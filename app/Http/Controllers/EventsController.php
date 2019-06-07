<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Event;

class EventsController extends Controller {

    function __construct() {
        //$this->middleware('auth:api');
    }

    public function addEvent(Request $request) {

        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'about' => 'required',
        ]);
        if (!$validator->fails()) {
            $_POST = $request->json()->all();
            $eventId=Event::create(array(
                'event_title' => $_POST['name'],
                'event_description' => $_POST['about']
            ))->event_id;
            $event = Event::where('event_id',$eventId)->first();
            return response()->json(['status' => 'success', 'event' => $event->toArray()]);
        } else {
            return response()->json(['status' => 'notValid', 'errors' => $validator->errors()->all()], 200);
        }
    }

}
