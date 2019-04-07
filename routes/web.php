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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/hello/world', function () {
    return 'Hello Lumen';
});

$router->get('/hello/{name}', ['middleware' => 'hello', function ($name) {
    return "Hello {$name}";
}]);

$router->get('user[/{name}]', function ($name = null) {
    return $name;
});
