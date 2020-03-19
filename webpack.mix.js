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
mix.js('resources/js/app.js', 'public/js').extract([
    'lodash', 'popper.js', 'jquery', 'bootstrap',
    'bootstrap-notify',
    'datatables.net-bs4','datatables.net-buttons-bs4','datatables.net-fixedcolumns-bs4',
    'datatables.net-fixedheader-bs4','datatables.net-keytable-bs4','datatables.net-responsive-bs4',
    'datatables.net-rowgroup-bs4','datatables.net-select-bs4',
    'datatables.net-buttons/js/buttons.colVis',
    'datatables.net-buttons/js/buttons.html5',
    'datatables.net-buttons/js/buttons.print',
]);
mix.js('resources/js/custom.js','public/js');
mix.sass('resources/sass/app.scss', 'public/css');
mix.copy('resources/theme','public');
mix.copy('resources/file','public/file');
mix.copy('resources/web/js','public/js');

mix.autoload({
    'lodash': ['_'],
    'jquery': ['$', 'window.jQuery', "jQuery"],
    'popper.js/dist/umd/popper.js': ['Popper', 'window.Popper']
});
externals: {
  jquery: 'jQuery'
}