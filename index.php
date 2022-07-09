<?php
require __DIR__ . '/vendor/autoload.php';

use App\Infra\Router\Registry;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$_POST = json_decode(file_get_contents('php://input'), true);

$routerRegistry = new Registry();
$routerRegistry->run();
