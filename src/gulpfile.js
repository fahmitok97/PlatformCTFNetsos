var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// var paths = {
//     'jquery': './vendor/bower_components/jquery/',
//     'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
// }

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'semantic': './vendor/bower_components/semantic/dist/'
}

elixir(function(mix) {
    // mix.sass("app.scss", 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets/']})
    //     .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
    //     .scripts([
    //         paths.jquery + "dist/jquery.js",
    //         paths.bootstrap + "javascripts/bootstrap.js"
    //     ], './public/js/app.js');

    // mix
    //  .copy('./vendor/bower_components/semantic/dist/semantic.js', 'public/assets/js/semantic.js')
    //  .copy('./vendor/bower_components/semantic/dist/semantic.css', 'public/assets/css/semantic.css')
    //  .sass([
    //     'main.scss',
    //  ], 'public/assets/css')
    //  .version([
    //     'public/assets/css/main.css',
    //     'public/assets/js/semantic.js',
    //     'public/assets/css/semantic.css',
    //  ])

     mix.sass("app.scss", 'public/css/', {includePaths: [paths.semantic]})
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.semantic + "semantic.js"
        ], './public/js/app.js');
 ;
});
