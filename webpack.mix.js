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

mix.js(['resources/assets/js/app.js','node_modules/bulma-steps/steps.min.js','node_modules/flickity/dist/flickity.pkgd.js','node_modules/select2/dist/js/select2.min.js'], 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles(['node_modules/flickity/dist/flickity.css','node_modules/font-awesome/css/font-awesome.min.css','node_modules/vue-multiselect/dist/vue-multiselect.min.css','node_modules/select2/dist/css/select2.min.css'],'public/css/vendor.css');
