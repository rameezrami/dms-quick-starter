<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@home')->name('home');


//Glide Route
$router->get('{path}--glide', function ($path) {
    $server = League\Glide\ServerFactory::create([
        'source' => public_path(),
        'cache' => storage_path('cache/glide'),
    ]);

    $server->outputImage($path, \request()->input() + ['q' => 70]);
})->where('path', '(.*)');
