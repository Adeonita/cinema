<?php
namespace App\Infra\Router;

use App\Infra\Controllers\UserController;
use App\Infra\Controllers\FilmController;
use App\Infra\Controllers\CineController;
use App\Infra\Controllers\RoomController;
use App\Infra\Controllers\TicketController;
use App\Infra\Controllers\SessionController;
use App\Infra\Controllers\ShoppingController;
use App\Infra\Controllers\SpecialEquipamentController;

$_POST = json_decode(file_get_contents('php://input'), true);

$router = new \Bramus\Router\Router();

// routes
$router->get('/users/(\d+)', UserController::class.'@find');
$router->post('/users', UserController::class.'@create');
$router->delete('/users', UserController::class.'@delete');
$router->put('/users', UserController::class.'@update');

$router->get('/cines/(\d+)', CineController::class.'@find');
$router->post('/cines', CineController::class.'@create');
$router->put('/cines', CineController::class.'@update');
$router->delete('/cines/(\d+)', CineController::class.'@delete');

$router->get('/shoppings/(\d+)', ShoppingController::class.'@find');
$router->post('/shoppings', ShoppingController::class.'@create');
$router->delete('/shoppings/(\d+)', ShoppingController::class.'@delete');
$router->put('/shoppings', ShoppingController::class.'@update');


$router->get('/films/(\d+)', FilmController::class.'@find');
$router->get('/films/{date}', FilmController::class.'@findByDate');
$router->post('/films', FilmController::class.'@create');
$router->delete('/films/(\d+)', FilmController::class.'@delete');
$router->put('/films', FilmController::class.'@update');


$router->get('/rooms/(\d+)', RoomController::class.'@find');
$router->get('/rooms/(\d+)/cine/(\d+)', RoomController::class.'@findByCine');
$router->post('/rooms', RoomController::class.'@create');
$router->delete('/rooms/(\d+)/cine/(\d+)', RoomController::class.'@delete');
$router->put('/rooms', RoomController::class.'@update');


$router->post('/sessions', SessionController::class.'@create');
$router->get('/sessions/(\d+)', SessionController::class.'@find');
$router->get('/sessions/(\d{4}-\d{2}-\d{2})', SessionController::class.'@getByDate');
$router->get('/sessions/films/(\d+)', SessionController::class.'@findByFilm');
$router->get('/sessions/films', SessionController::class.'@findAvailableTickets');
$router->delete('/sessions/(\d+)', SessionController::class.'@delete');
$router->put('/sessions', SessionController::class.'@update');


$router->post('/tickets', TicketController::class.'@create');
$router->get('/tickets/(\d+)', TicketController::class.'@find');
$router->get('/tickets/(\d+)/user/(\d+)', TicketController::class.'@findByUser');
$router->delete('/tickets/(\d+)/user/(\d+)', TicketController::class.'@deleteByUser');
$router->delete('/tickets/(\d+)', TicketController::class.'@delete');
$router->put('/tickets', TicketController::class.'@update');


$router->post('/specialEquipaments', SpecialEquipamentController::class.'@create');
$router->get('/specialEquipaments/(\d+)', SpecialEquipamentController::class.'@find');
$router->delete('/specialEquipaments/(\d+)', SpecialEquipamentController::class.'@delete');
$router->put('/specialEquipaments', SpecialEquipamentController::class.'@update');

try {
  $router->run();
} catch (\Exception $error) {
  http_response_code($error->getCode());

echo json_encode([
  'message' => $error->getMessage(),
  'error_code' => $error->getCode()
]);
}
