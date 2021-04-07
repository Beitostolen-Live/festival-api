<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'api/v1'], function() use($router){
    // Festival
    $router->get('/festival', 'FestivalController@index');
    $router->post('/festival', 'FestivalController@create');
    $router->get('/festival/{id}', 'FestivalController@show');
    $router->put('/festival/{id}', 'FestivalController@update');
    $router->delete('/festival/{id}', 'FestivalController@destroy');
    // Supplier
    $router->get('/supplier', 'SupplierController@index');
    $router->post('/supplier', 'SupplierController@create');
    $router->get('/supplier/{id}', 'SupplierController@show');
    $router->put('/supplier/{id}', 'SupplierController@update');
    $router->delete('/supplier/{id}', 'SupplierController@destroy');
    // Person
    $router->get('/supplier/{supplier_id}/person', 'PersonController@index');
    $router->post('/supplier/{supplier_id}/person', 'PersonController@create');
});