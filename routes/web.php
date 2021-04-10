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

$router->group(['prefix'=>'api/v1', 'middleware' => 'auth'], function() use($router){
    // Festival
    $router->get('/festival', 'FestivalController@index');
    $router->post('/festival', 'FestivalController@create');
    $router->get('/festival/{id}', 'FestivalController@show');
    $router->put('/festival/{id}', 'FestivalController@update');
    $router->delete('/festival/{id}', 'FestivalController@destroy');
    // Address
    $router->post('/address', 'AddressController@create');
    $router->get('/address/{id}', 'AddressController@show');
    $router->put('/address/{id}', 'AddressController@update');
    $router->delete('/address/{id}', 'AddressController@destroy');
    // Company
    $router->get('/company', 'CompanyController@index');
    $router->get('/company/{orgno}', 'CompanyController@show');
    $router->post('/company', 'CompanyController@create');
    $router->put('/company/{orgno}', 'CompanyController@update');
    $router->delete('/company/{orgno}', 'CompanyController@destroy');
    // Company Crew
    $router->get('/company/{orgno}/crew', 'CompanyCrewController@index');
    $router->post('/company/{orgno}/crew', 'CompanyCrewController@create');
    $router->get('/crew/{id}', 'CompanyCrewController@show');
    $router->put('/crew/{id}', 'CompanyCrewController@update');
    $router->delete('/crew/{id}', 'CompanyCrewController@destroy');
    // Company Note
    $router->get('/company/{orgno}/notes', 'CompanyNoteController@notesByCompany');
    $router->get('/crew/{crew_id}/notes', 'CompanyNoteController@notesByCrew');
    $router->get('/note/{id}', 'CompanyNoteController@show');
    $router->post('/company/{orgno}/crew/{crew_id}/note', 'CompanyNoteController@create');
    $router->put('/note/{id}', 'CompanyNoteController@update');
    $router->delete('/note/{id}', 'CompanyNoteController@destroy');
    // Storage locations
    $router->get('/storage', 'StorageLocationController@index');
    $router->post('/storage', 'StorageLocationController@create');
    $router->get('/storage/{id}', 'StorageLocationController@show');
    $router->put('/storage/{id}', 'StorageLocationController@update');
    $router->delete('/storage/{id}', 'StorageLocationController@destroy');
    // Inventory
    $router->get('/storage/{storagelocation_id}/inventory', 'InventoryController@inventoryByLocation');
    $router->post('/storage/{storagelocation_id}/inventory', 'InventoryController@create');
    $router->get('/inventory/{id}', 'InventoryController@show');
    $router->put('/inventory/{id}', 'InventoryController@update');
    $router->delete('/inventory/{id}', 'InventoryController@destroy');
    // Inventory comment
    $router->get('/inventory/{inventory_id}/comments', 'InventoryCommentController@commentsByInventory');
    $router->post('/inventory/{inventory_id}/comment', 'InventoryCommentController@create');
    $router->put('/comment/{id}', 'InventoryCommentController@update');
    $router->delete('/comment/{id}', 'InventoryCommentController@destroy');
    // Inventory count
    $router->get('/inventory/{inventory_id}/count', 'InventoryCountController@countsByInventory');
    $router->post('/inventory/{inventory_id}/count', 'InventoryCountController@create');
    $router->delete('/count/{id}', 'InventoryCountController@destroy');
});