<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It is a breeze. Simply tell Lumen the URIs it should respond to
  | and give it the Closure to call when that URI is requested.
  |
 */
use Illuminate\Http\Request;
$router->options(
    '/{any:.*}', 
    [
        'middleware' => ['cors'], 
        function (){ 
            return response(['status' => 'success']); 
        }
    ]
);
$router->get('/', function () use ($router) {
    return view('default',['name' => $router->app->version()]);
});
$router->post('login/', 'UsersController@authenticate');
$router->post('signup/', 'UsersController@register');
$router->post('filetime/', 'UsersController@fileupload');
$router->get('qr/', 'UsersController@qrcode');
$router->get('notify/', 'UsersController@notify');
$router->get('/register[/{id}]', function ($id = NULL) use ($router) {
    return 'Hello' . $id;
});
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->post('/desktop', function (Request $request) use ($router) {
        $post=file_get_contents('php://input');
        return array('status'=>'success','user'=>$post);
    });
    $router->post('/addItem', 'EventsController@addEvent');
});
