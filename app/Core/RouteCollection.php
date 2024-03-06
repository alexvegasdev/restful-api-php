<?php

namespace App\Core;

class RouteCollection
{
  private array $routes;

  public function addRoute(Route $route)
  {
    $this->routes[] = $route;
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }

  public function getRouteByUri(string $uri): ?Route
  {
    return array_filter($this->routes, fn ($route) => $route->getUri() === $uri)[0] ?? null;
  }
}
