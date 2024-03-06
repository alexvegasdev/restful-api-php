<?php

namespace App\Core;

use App\Core\RouteCollection;

class Dispatcher
{
  public function __construct(
    private RouteCollection $routes
  ) {
  }
  public function dispatch()
  {
    $method = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['REQUEST_URI'];

    $route = $this->routes->getRouteByUri($url);

    if (!$route) {
      return $this->echoResponse('Ruta no encontrada');
    }

    if ($method !== $route->getMethodHttp()) {
      return $this->echoResponse('Método HTTP no permitido');
    }

    $controllerClass = $route->getController();
    $controller = new $controllerClass();
    $controllerMethod = $route->getMethod();

    $controller->$controllerMethod();
  }

  private function echoResponse(string $message): void
  {
    header('Content-Type: text/plain');
    echo $message;
    exit();
  }
}