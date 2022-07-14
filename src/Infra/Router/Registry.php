<?php
namespace App\Infra\Router;

use App\Infra\Controllers\UserController;
use App\Infra\Controllers\FilmController;
use App\Infra\Controllers\CineController;
use App\Infra\Controllers\RoomController;
use App\Infra\Controllers\TicketController;
use App\Infra\Controllers\SessionController;
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

$router->get('/films/(\d+)', FilmController::class.'@find');
$router->post('/films', FilmController::class.'@create');
$router->delete('/films/(\d+)', FilmController::class.'@delete');

$router->get('/rooms/(\d+)', RoomController::class.'@find');
$router->get('/rooms/(\d+)/cine/(\d+)', RoomController::class.'@findByCine');
$router->post('/rooms', RoomController::class.'@create');
$router->delete('/rooms/(\d+)/cine/(\d+)', RoomController::class.'@delete');

$router->post('/sessions', SessionController::class.'@create');
$router->get('/sessions/(\d+)', SessionController::class.'@find');
$router->get('/sessions/films/(\d+)', SessionController::class.'@findByFilm');
$router->delete('/sessions/(\d+)', SessionController::class.'@delete');

$router->post('/tickets', TicketController::class.'@create');
$router->get('/tickets/(\d+)', TicketController::class.'@find');
$router->get('/tickets/(\d+)/user/(\d+)', TicketController::class.'@findByUser');
$router->delete('/tickets/(\d+)/user/(\d+)', TicketController::class.'@deleteByUser');
$router->delete('/tickets/(\d+)', TicketController::class.'@delete');

try {
  $router->run();
} catch (\Exception $error) {
  http_response_code($error->getCode());

echo json_encode([
  'message' => $error->getMessage(),
  'error_code' => $error->getCode()
]);
}
