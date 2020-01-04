let mix = require('laravel-mix');

mix.setResourceRoot('../');
mix
    .js('src/js/boot.js', 'assets/js/boot.js')
    .js('src/js/main.js', 'assets/js/plugin-main-js-file.js')

