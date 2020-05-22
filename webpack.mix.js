const mix = require('laravel-mix');
const tailwind = require('laravel-mix-tailwind');

/* For use with Moment.js */
const webpack = require('webpack');
mix.webpackConfig({
  plugins: [
    new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
  ]
});

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .tailwind('tailwind.config.js')
  .extract();
