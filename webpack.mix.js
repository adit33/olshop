let mix = require('laravel-mix');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
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

mix.js(['resources/assets/js/app.js','node_modules/bulma-steps/steps.min.js'], 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles(['node_modules/flickity/dist/flickity.css','node_modules/vue-multiselect/dist/vue-multiselect.min.css'],'public/css/vendor.css')
   .copy('node_modules/font-awesome/fonts', 'public/fonts')
   .setPublicPath('../');
//    .webpackConfig({
//     plugins: [
//         new BundleAnalyzerPlugin()
//     ]
// });