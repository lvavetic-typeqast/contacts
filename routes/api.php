<?php

use Illuminate\Routing\Router;

/*  @var  $router  \Illuminate\Routing\Router          */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// contacts
$router->get('contacts/', 'ContactController@index');
$router->get('contacts/{id}/', 'ContactController@show');
$router->post('contacts/', 'ContactController@insert');
$router->put('contacts/{id}/', 'ContactController@update');
$router->delete('contacts/{id}/', 'ContactController@delete');