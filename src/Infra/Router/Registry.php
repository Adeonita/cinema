<?php
namespace App\Infra\Router;

class Registry {

    private $routes = [
        // users
        'post' => ['/users', '\App\Infra\Controllers\UserController@create'],
        'get' => ['/users/(\d+)', '\App\Infra\Controllers\UserController@find'],
        'delete' => ['/users/(\d+)', '\App\Infra\Controllers\UserController@delete'],
        // cines
        'post' => ['/cines', '\App\Infra\Controllers\CineController@create'],
        'get' => ['/users/(\d+)', '\App\Infra\Controllers\UserController@find'],
        'delete' => ['/users/(\d+)', '\App\Infra\Controllers\UserController@delete'],
        // shoppings
        'post' => ['/shoppings', '\App\Infra\Controllers\ShoppingController@create'],
        'get' => ['/shoppings/(\d+)', '\App\Infra\Controllers\ShoppingController@find'],
        'delete' => ['/shoppings/(\d+)', '\App\Infra\Controllers\ShoppingController@delete']
    ];

    public function run() {
        $router = new \Bramus\Router\Router();
        foreach($this->routes as $method => $function) {
            $router->$method($function[0], $function[1]);
        }
        $router->run();
    }

}

