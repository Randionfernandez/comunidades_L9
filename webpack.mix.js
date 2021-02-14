const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
<<<<<<< HEAD
 | for your Laravel applications. By default, we are compiling the CSS
=======
 | for your Laravel application. By default, we are compiling the Sass
>>>>>>> d7b36bbefd2c49b64ba9be84858b50028599f384
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
<<<<<<< HEAD
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
=======
    .sass('resources/sass/app.scss', 'public/css');
>>>>>>> d7b36bbefd2c49b64ba9be84858b50028599f384
