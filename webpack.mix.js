let mix = require('laravel-mix');

mix.setResourceRoot('../');
mix
    .js('src/js/Boot.js', 'assets/js/boot.js')
    .js('src/js/main.js', 'assets/js/plugin-name.js')

