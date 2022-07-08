<?php
require __DIR__ . '/vendor/autoload.php';

use App\Infra\Router\Registry;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$routerRegistry = new Registry();
$routerRegistry->run();
