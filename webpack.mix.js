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

 //esto le dice a webpack que compile todo el javascript en los siguientes archivos

 //el origen del archivo , donde se va a guardar
mix.js('resources/js/app.js', 'public/js')
   //.sass('resources/assets/sass/app.scss', 'public/css');
mix.browserSync('localhost:8000');

//en caso de cambiar el navegador por defecto
/* mix.browserSync({
   proxy:'localhost:8000',
   browser:'Google Chrome'
})
 */