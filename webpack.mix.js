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

mix.scripts([
    'public/js/backend/app.js',
    'public/js/backend/directive.js',
    'public/js/backend/factories/ApiFactory.js',

    
    'public/js/backend/controllers/DwAdminDepartmentController.js'
], 'public/js/dist/backend.js').version();


// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
