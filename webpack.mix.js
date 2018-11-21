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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/search.scss', 'public/css');

mix.js('resources/js/js-temp/camera.js', 'public/js')
   .js('resources/js/js-temp/forms.js', 'public/js') 
   .js('resources/js/js-temp/sForm.js', 'public/js')
   .js('resources/js/js-temp/slide.js', 'public/js')
   .js('resources/js/js-temp/toplist.js', 'public/js')
   .js('resources/js/js-temp/superfish.js', 'public/js')
   .js('resources/js/js-temp/tms-0.4.1.js', 'public/js')
   .js('resources/js/main.js', 'public/js');

mix.styles(['resources/css/form.css'], 'public/css/form.css')
   .styles(['resources/css/grid.css'], 'public/css/grid.css')
   .styles(['resources/css/ie.css'], 'public/css/ie.css')
   .styles(['resources/css/reset.css'], 'public/css/reset.css')
   .styles(['resources/css/slider.css'], 'public/css/slider.css')
   .styles(['resources/css/style.css'], 'public/css/style.css')
   .styles(['resources/css/superfish.css'], 'public/css/superfish.css')
   .styles(['resources/css/util.css'], 'public/css/util.css')
   .styles(['resources/css/main.css'], 'public/css/main.css');

mix.styles(['resources/css/dishes/dish_detail.css'], 'public/css/dish_detail.css');
mix.js('resources/js/dishes/dish_detail.js', 'public/js');
