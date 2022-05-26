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
    return 'Primeira API REST com Lumen...Fernando Soares.<p></p>'
    . $router->app->version();
});


$router->group(['prefix' => 'clientes'], function () use ($router) {

    $router->get('/', 'ClientesController@showAll');

    $router->get('/{chave}', 'ClientesController@findCliente');

    $router->post('/','ClientesController@insertCliente');

    $router->put('/{clientes}','ClientesController@updateCliente');

    $router->delete('/{clientes}','ClientesController@delete');
});

$router->group(['prefix' => '/'], function () use ($router) {

    $router->get('/listarusuarios', 'UsuariosController@listarUsuarios');

    $router->get('/getusuario', 'UsuariosController@getUsuario');

    
});

//Route::get('/clientes', 'ClientesController@showAll');





/*Route::get('me', 'UserController@me');

Route::group([],function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');


});
// ROUTES WITH AUTH
Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::get('teste', 'UserController@me');
    Route::get('users', 'UserController@getUsers');
    Route::get('refresh', 'Auth\AuthController@refresh');



});*/

