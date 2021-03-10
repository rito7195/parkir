const mix = require('laravel-mix');
const webpack = require('webpack');

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
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
mix.webpackConfig({
    plugins: [
        new webpack.ContextReplacementPlugin(/\.\/locale$/, 'empty-module', false, /js$/)
    ]
  });
mix.postCss('resources/assets/modules/bootstrap/css/bootstrap.min.css', 'public/css');
mix.postCss('resources/assets/modules/fontawesome/css/all.min.css', 'public/css');
mix.postCss('resources/assets/modules/bootstrap-social/bootstrap-social.css', 'public/css');
mix.postCss('resources/assets/css/style.css', 'public/css');
mix.postCss('resources/assets/css/components.css', 'public/css');
mix.postCss('resources/assets/modules/datatables/datatables.min.css', 'public/css');
mix.postCss('resources/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css', 'public/css');
mix.postCss('resources/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css', 'public/css');
mix.scripts([
    //'resources/assets/modules/tooltip.js',
    'resources/assets/modules/bootstrap/js/bootstrap.min.js',
    'resources/assets/modules/jquery.min.js',
	'resources/assets/modules/popper.js',
	'resources/assets/modules/nicescroll/jquery.nicescroll.min.js',
    'resources/assets/modules/moment.min.js',
    'resources/assets/js/stisla.js',
    'resources/assets/js/scripts.js',
    'resources/assets/js/custom.js',
    'resources/assets/modules/datatables/datatables.min.js',
    'resources/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
    'resources/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js',
    'resources/assets/modules/jquery-ui/jquery-ui.min.js',
    'resources/assets/js/page/modules-datatables.js',
],
'public/js/stisla.js').version();

//mix.js('resources/assets/js/page/modules-datatables.js', 'public/js');