<?php
namespace App\Infra\Router;

class Registry {

    private $routes = [
        'post' => '/user', '\App\Controllers\User@showProfile'
    ];

    public function run() {
        $router = new \Bramus\Router\Router();
        foreach($this->routes as $method => $function) {
            $router->$method($function);
        }
        $router->run();
    }

}

