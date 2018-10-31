<?php

use Illuminate\Http\Request;

/*  @var  $router  \Illuminate\Routing\Router          */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/{vue_capture?}', function (Request $request) {
    if ( ! $request->ajax() ) {
        return view('index');
    }
})->where('vue_capture', '.*');