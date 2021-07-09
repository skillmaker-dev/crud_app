<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Router.php';

use app\controllers\MainController;
use app\Router;

$router = new Router();
$router->get('/', [MainController::class, 'index']);
$router->get('/products', [MainController::class, 'index']);

$router->get('/products/update', [MainController::class, 'update']);
$router->post('/products/update', [MainController::class, 'update']);

$router->get('/products/create', [MainController::class, 'create']);
$router->post('/products/create', [MainController::class, 'create']);

$router->post('/products/delete', [MainController::class, 'delete']);

$router->resolve();
