<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function ($router) {
    $router->get('/authors', 'AuthorController@index');
    $router->get('/author/{id}', 'AuthorController@show');
    $router->post('/author', 'AuthorController@store');
    $router->put('/author/{id}', 'AuthorController@update');
    $router->delete('/author/{id}', 'AuthorController@delete');

    $router->get('/books', 'BookController@index');
    $router->get('/book/{id}', 'BookController@show');
    $router->post('/book', 'BookController@store');
    $router->put('/book/{id}', 'BookController@update');
    $router->delete('/book/{id}', 'BookController@delete');
});
