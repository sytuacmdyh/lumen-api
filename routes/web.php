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
use Illuminate\Support\Facades\Auth;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/auth', ['middleware' => 'auth', function (Request $request) {
    $user = Auth::user();

    return response()->json($user);
}]);