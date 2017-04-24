const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(function(mix) {
    mix.sass('app.scss')
       .webpack('app.js');

    // mix.styles([
    // 	'app.css',
    // 	'frontend/icon-font.css',
    // 	'frontend/style.css'
    // 	],'public/css/frontend-app.css','public/css');

    mix.styles([
    	'app.css',
    	'admin/dashboard.css',
    	'admin/custom.css'
    	],'public/css/backend-app.css','public/css');

    mix.scripts([
        'app.js',
        'common.js',      
        'jquery.js',      
        ],'public/js/backend-app.js','public/js');

    // mix.scripts([
    //     'app.js',
    //     'jquery.nicescroll.min.js',
    //     'frontend-script.js',
    //     ],'public/js/frontend-app.js','public/js');
        
});
