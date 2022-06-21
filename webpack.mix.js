const mix = require('laravel-mix');
const { VERSION } = require('lodash');

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

mix.styles(['resources/css/style.css'
        ], 'public/css/style.css')
		
	.styles(['resources/css/login.css'
        ], 'public/css/login.css')
    
    .js(['resources/js/index.js'
        ], 'public/js/script.js')

    .js(['resources/js/login.js'
        ], 'public/js/login.js')  
          
    .version();
