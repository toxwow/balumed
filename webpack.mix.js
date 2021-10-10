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
   .sass('resources/sass/login.scss', 'public/css/')
   .sass('resources/sass/layouts/admin.scss', 'public/css/layouts')
   .sass('resources/sass/layouts/page.scss', 'public/css/layouts')
   .sass('resources/sass/page/_home.scss', 'public/css/page')
   .sass('resources/sass/page/_sub_page.scss', 'public/css/page')
    .js('resources/js/admin/createHelper.js', 'public/js/admin')
    .js('resources/js/admin/blog.js', 'public/js/admin')
    .js('resources/js/admin/specialist.js', 'public/js/admin')
    .js('resources/js/admin/service.js', 'public/js/admin')
    .js('resources/js/admin/post.js', 'public/js/admin')
    .js('resources/js/admin/tag.js', 'public/js/admin')
    .js('resources/js/admin/info.js', 'public/js/admin')
    .js('resources/js/page/index.js', 'public/js/page').options({processCssUrls: false
    });
