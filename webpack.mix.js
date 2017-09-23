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

mix.js(['resources/assets/js/app.js','node_modules/flickity/dist/flickity.pkgd.js'], 'public/js')
   .sass('node_modules/bulma/bulma.sass', 'public/css')
   .styles('node_modules/flickity/dist/flickity.css','public/vendor.css');
