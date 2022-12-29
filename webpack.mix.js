const mix = require('laravel-mix');

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

mix
    .js('resources/js/detect-info-client.js', 'public/js/detect-info-client.js')
    .js('resources/js/user-login.js', 'public/js/user-login.js')
    .js('resources/js/ip-config.js', 'public/js/ip-config.js')
    .js('resources/js/user-management.js', 'public/js/user-management.js')
    .options({
        processCssUrls: false
    })
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
