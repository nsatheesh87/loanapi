<?php

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
    $router->get('/customers', 'CustomerController@index');
    $router->post('/customer', 'CustomerController@create');
    $router->get('/customer/{id}', 'CustomerController@show');

    $router->get('/loans', 'LoanController@index');
    $router->post('/loan', 'LoanController@create');
    $router->get('/loan/{id}', 'LoanController@show');

    $router->post('/repay', 'RepaymentController@create');
});