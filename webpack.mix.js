/*
|--------------------------------------------------------------------------
| Create Laravel Mix instance
|--------------------------------------------------------------------------
*/

let mix = require('laravel-mix');

/*
|--------------------------------------------------------------------------
| Javascript
|--------------------------------------------------------------------------
*/

mix.js('resources/js/app.js', 'public/js')

/*
|--------------------------------------------------------------------------
| SASS
|--------------------------------------------------------------------------
*/

// web
mix.sass('resources/sass/web.scss', 'public/css/web.min.css');

