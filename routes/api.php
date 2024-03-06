<?php

use App\Core\Route;
use App\Core\RouteCollection;
use App\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Rutas API
|--------------------------------------------------------------------------
|
| Aquí es donde se registran las rutas API de la aplicación.
|
*/

$routes = new RouteCollection();

$routes->addRoute(Route::get('/products', [ProductController::class, 'index']));

return $routes;