<?php
namespace App\Infra\Router;

class Registry {

    private $routes = [
        'post' => ['/user', '\App\Infra\Controllers\UserController@create']
    ];

    public function run() {
        $router = new \Bramus\Router\Router();
        foreach($this->routes as $method => $function) {
            $router->$method($function[0], $function[1]);
        }
        $router->run();
    }

}

