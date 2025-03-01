let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 
mix.styles([ 
    'resources/assets/css/bootstrap.css',
    'resources/assets/css/app.css',
    'resources/assets/css/sweetalert2.css'
], 'public/css/app.css') 
.scripts([ 
    'resources/assets/js/jquery-3.3.1.js', 
    'resources/assets/js/bootstrap.bundle.js',
    'resources/assets/js/sweetalert2.js',
    'resources/assets/js/jquery.fileDownload.js'
], 'public/js/app.js');