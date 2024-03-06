<?php

namespace App\Core;

/**
 * Esta clase representa la definición de una ruta dentro de una aplicación.
 * Almacena información sobre la ruta URL, la clase del controlador, el método y el método HTTP
 * asociados a la ruta.
 */
class Route
{
  /**
   * Constructor de la clase Route.
   *
   * @param string $uri La ruta URI para la ruta.
   * @param string $controller El nombre de la clase del controlador.
   * @param string $method El nombre del método dentro de la clase del controlador.
   * @param string $methodHttp El método HTTP (por ejemplo, GET, POST, PUT, etc.).
   */
  public function __construct(
    private string $uri,
    private string $controller,
    private string $method,
    private string $methodHttp
  ) {
  }

  /**
   * Recupera la ruta URI para la ruta.
   *
   * @return string La ruta URI.
   */
  public function getUri(): string
  {
    return $this->uri;
  }

  /**
   * Recupera el nombre de la clase del controlador asociada a la ruta.
   *
   * @return string El nombre de la clase del controlador.
   */
  public function getController(): string
  {
    return $this->controller;
  }

  /**
   * Recupera el nombre del método dentro de la clase del controlador que maneja la ruta.
   *
   * @return string El nombre del método.
   */
  public function getMethod(): string
  {
    return $this->method;
  }

  /**
   * Recupera el método HTTP (por ejemplo, GET, POST, PUT, etc.) para la ruta.
   *
   * @return string El método HTTP.
   */
  public function getMethodHttp(): string
  {
    return $this->methodHttp;
  }

  /**
   * @param string $uri La ruta URI para la ruta.
   * @param array $action La especificación de la acción del controlador (puede ser una cadena o un array).
   *
   * @return Route El objeto Route recién creado.
   */

  /**
   * @method static Route get(string $uri, array $action) Crea una ruta GET.
   */
  public static function get(string $uri, array $action): Route
  {
    return new Route($uri, $action[0], $action[1], 'GET');
  }

  /**
   * @method static Route post(string $uri, array $action) Crea una ruta POST.
   */
  public static function post(string $uri, array $action): Route
  {
    return new Route($uri, $action[0], $action[1], 'POST');
  }

  /**
   * @method static Route patch(string $uri, array $action) Crea una ruta PATCH.
   */
  public static function patch(string $uri, array $action): Route
  {
    return new Route($uri, $action[0], $action[1], 'PATCH');
  }

  /**
   * @method static Route put(string $uri, array $action) Crea una ruta PUT.
   */
  public static function put(string $uri, array $action): Route
  {
    return new Route($uri, $action[0], $action[1], 'PUT');
  }

  /**
   * @method static Route delete(string $uri, array $action) Crea una ruta DELETE.
   */
  public static function delete(string $uri, array $action): Route
  {
    return new Route($uri, $action[0], $action[1], 'DELETE');
  }
}
