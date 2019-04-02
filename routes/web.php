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
use Vk;
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
    $files= App\Appfile::paginate(5);
    return view('default',['files' => $files,'name' => $router->app->version()]);
});
$router->post('login/', 'UsersController@authenticate');
$router->post('loginform/', 'UsersController@loginForm');
$router->post('signupform/', 'UsersController@signupForm');
$router->post('signup/', 'UsersController@register');
$router->post('filetime/', 'UsersController@fileupload');
$router->get('qr/', 'UsersController@qrcode');
$router->get('notify/', 'UsersController@notify');
$router->get('/register[/{id}]', function ($id = NULL) use ($router) {
    return 'Hello' . $id;
});
$router->get('app-files/', 'AppfilesController@getall');
$router->get('/dashboard', function () use ($router) {
    $files= App\Appfile::paginate(5);
    return Vk::getSUrl($files,$router->app->version());
});
$router->get('/signup', function () use ($router) {
    $files= App\Appfile::paginate(5);
    return Vk::getSUrl($files,$router->app->version());
});
$router->get('/login', function () use ($router) {
    $files= App\Appfile::paginate(5);
    return Vk::getSUrl($files,$router->app->version());
});
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->post('/dashboard', 'DashboardController@index');
    $router->post('/addItem', 'EventsController@addEvent');
});
