<?php

use Illuminate\Routing\Router;

/*  @var  $router  \Illuminate\Routing\Router          */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

$router->get('/', function () {
    return view('welcome');
});

$router->get('/', 'ContactController@index');