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
    $hasIsThreeDimentions = isset($_POST['isThreeDimentions']);
    $isThreeDimentions = (int) $_POST['isThreeDimentions'];

    $requiredFields = $name && $cineId && $capacity && $hasIsThreeDimentions;


    if ($requiredFields) {
      return new Room(
        null,
        $name,
        $capacity,
        $isThreeDimentions,
        $cineId
      );
    }

    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }

  public function validateUpdate() {
    $params = json_decode(file_get_contents("php://input"));

    if(
      $params->id &&
      $params->name &&
      $params->cineId &&
      $params->capacity &&
      $params->isThreeDimentions
    ) {
        return new Room(
          $params->id,
          $params->name,
          $params->cineId,
          $params->capacity,
          $params->isThreeDimentions
        );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
}
