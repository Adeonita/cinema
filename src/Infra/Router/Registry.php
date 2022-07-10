<?php
namespace App\Infra\Router;

$_POST = json_decode(file_get_contents('php://input'), true);

$router = new \Bramus\Router\Router();

// routes
$router->get('/users/(\d+)', '\App\Infra\Controllers\UserController@find');
$router->post('/users', '\App\Infra\Controllers\UserController@create');
$router->delete('/users', '\App\Infra\Controllers\UserController@delete');

$router->get('/cines/(\d+)', '\App\Infra\Controllers\CineController@find');
$router->post('/cines', '\App\Infra\Controllers\CineController@create');
$router->delete('/cines/(\d+)', '\App\Infra\Controllers\CineController@delete');

$router->get('/shoppings/(\d+)', '\App\Infra\Controllers\ShoppingController@find');
$router->post('/shoppings', '\App\Infra\Controllers\ShoppingController@create');
$router->delete('/shoppings/(\d+)', '\App\Infra\Controllers\ShoppingController@delete');

$router->run();

