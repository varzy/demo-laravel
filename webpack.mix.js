const mix = require('laravel-mix');
const { dependencies } =require('./package.json');

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

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
  ])
  .disableNotifications()
  .extract(Object.keys(dependencies));

if (mix.inProduction()) {
  mix.version();
} else {
  mix.sourceMaps();
  // <https://github.com/laravel-mix/laravel-mix/issues/2719>
  // .browserSync({
  //   proxy: 'localhost',
  //   open: false,
  //   port: 8000,
  // });
}
