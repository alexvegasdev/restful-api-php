<?php

namespace App\Models;

use PDO;
use PDOException;
use App\Core\Model;
use Database\Database;
use App\Utils\ValidateHttpMethod;

class Product extends Model
{
  protected static string $table = 'products';

  private const HTTP_METHOD_GET = "GET";

  public static function show()
  {
    ValidateHttpMethod::validateHttpMethod(self::HTTP_METHOD_GET);

    $id = explode('/', $_SERVER['REQUEST_URI'])[2];

    if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
      return json_encode(["error" => "ID de producto no válido o faltante."]);
    }

    try {
      $query = "SELECT * FROM products WHERE id = :id";
      $statement = Database::getConnection()->prepare($query);
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->execute();

      return json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
      return json_encode(["error" => "Error al obtener el producto {$e->getMessage()}"]);
    }
  }
}
