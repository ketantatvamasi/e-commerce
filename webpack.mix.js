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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();

// mix.copyDirectory('resources/backend', 'public/backend');
mix.copyDirectory('resources/assets', 'public/assets');

mix.styles([
    'resources/assets/frontend/plugins/bootstrap/css/bootstrap.min.css',
    'resources/assets/frontend/css/style.css',
    'resources/assets/frontend/css/dark-style.css',
    'resources/assets/frontend/css/transparent-style.css',
    'resources/assets/frontend/css/skin-modes.css',
    'resources/assets/frontend/css/icons.css',
    'resources/assets/frontend/colors/color1.css',
], 'public/assets/frontend/css/all.css').version();

mix.scripts([
    'resources/assets/frontend/js/jquery.min.js',
    'resources/assets/frontend/plugins/bootstrap/js/popper.min.js',
    'resources/assets/frontend/plugins/bootstrap/js/bootstrap.min.js',
    'resources/assets/frontend/plugins/sidemenu/sidemenu.js',
    'resources/assets/frontend/plugins/sidebar/sidebar.js',
    'resources/assets/frontend/plugins/p-scroll/perfect-scrollbar.js',
    'resources/assets/frontend/plugins/p-scroll/pscroll.js',
    'resources/assets/frontend/plugins/p-scroll/pscroll-1.js',
    'resources/assets/frontend/js/themeColors.js',
    'resources/assets/frontend/js/sticky.js',
    'resources/assets/frontend/js/custom.js',
],'public/assets/frontend/js/all.js');
