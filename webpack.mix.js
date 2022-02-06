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
    /* CSS */
    .sass('resources/sass/main.scss', 'public/css/oneui.css')
    .sass('resources/sass/oneui/themes/amethyst.scss', 'public/css/themes/')
    .sass('resources/sass/oneui/themes/city.scss', 'public/css/themes/')
    .sass('resources/sass/oneui/themes/flat.scss', 'public/css/themes/')
    .sass('resources/sass/oneui/themes/modern.scss', 'public/css/themes/')
    .sass('resources/sass/oneui/themes/smooth.scss', 'public/css/themes/')
    .sass('resources/sass/app.scss', 'public/css')

    /* JS */
    .js('resources/js/app.js', 'public/js/laravel.app.js')
    .js('resources/js/oneui/app.js', 'public/js/oneui.app.js')
    .js('resources/js/app.js', 'public/js')

    /* Page JS */
    .js('resources/js/pages/tables_datatables.js', 'public/js/pages/tables_datatables.js')

    .sourceMaps()
    /* Tools */
    .browserSync('localhost:8000')
    .disableNotifications()

    /* Options */
    .options({
        processCssUrls: false
    });

/* mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps() */;
