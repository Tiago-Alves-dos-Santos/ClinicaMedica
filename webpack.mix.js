const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap')
    .js('node_modules/bootstrap/dist/js/bootstrap.min.js','public/js/bootstrap')
    //fullcalendar
    // .js('node_modules/fullcalendar/main.js','public/js/fullcalendar')
    // .js('node_modules/fullcalendar/locales/pt-br.js','public/js/fullcalendar')
    // .css('node_modules/fullcalendar/main.css','public/js/fullcalendar')
    .sass('resources/sass/app.scss', 'public/css');
