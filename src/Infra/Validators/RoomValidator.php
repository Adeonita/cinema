<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Room;

class RoomValidator 
{
  public function validateCreate()
  {
    $name = $_POST['name'];
    $cineId = $_POST['cineId'];
    $capacity = $_POST['capacity'];
    $price = $_POST['price'];
    $hasIsThreeDimentions = isset($_POST['isThreeDimentions']);
    $isThreeDimentions = (int) $_POST['isThreeDimentions'];

    $requiredFields = $name && $cineId && $capacity && $price && $hasIsThreeDimentions;

    if ($requiredFields) {
      return new Room(
        null,
        $name,
        $capacity,
        $price,
        $isThreeDimentions,
        $cineId
      );
    }

    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
}
