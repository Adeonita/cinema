<?php
namespace App\Infra\Router;

use App\Infra\Controllers\UserController;
use App\Infra\Controllers\FilmController;
use App\Infra\Controllers\CineController;
use App\Infra\Controllers\ShoppingController;

$_POST = json_decode(file_get_contents('php://input'), true);

$router = new \Bramus\Router\Router();

// routes
$router->get('/users/(\d+)', UserController::class.'@find');

$router->post('/users', UserController::class.'@create');
$router->delete('/users', UserController::class.'@delete');

$router->get('/cines/(\d+)', CineController::class.'@find');
$router->post('/cines', CineController::class.'@create');
$router->delete('/cines/(\d+)', CineController::class.'@delete');

$router->get('/shoppings/(\d+)', ShoppingController::class.'@find');
$router->post('/shoppings', ShoppingController::class.'@create');
$router->delete('/shoppings/(\d+)', ShoppingController::class.'@delete');

$router->post('/films', FilmController::class.'@create');

try {
  $router->run();
} catch (\Exception $error) {
  http_response_code($error->getCode());

echo json_encode([
  'message' => $error->getMessage(),
  'error_code' => $error->getCode()
]);
}