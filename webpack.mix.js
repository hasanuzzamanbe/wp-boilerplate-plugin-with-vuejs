let mix = require('laravel-mix');
mix.setPublicPath('assets');

mix.setResourceRoot('../');
mix
    .js('src/js/boot.js', 'assets/js/boot.js')
    .js('src/js/main.js', 'assets/js/plugin-main-js-file.js')
    .sass('src/scss/admin/app.scss', 'assets/css/element.css')
    