<?php
namespace App\Infra\Validators;

use App\Domain\Entities\SpecialEquipament;

class SpecialEquipamentValidator
{
  public function validateCreate()
  {
    $name = $_POST['name'];
    $roomId = $_POST['roomId'];
    $quantity = $_POST['quantity'];

    $requiredFields = $name && $roomId && $quantity;

    if ($requiredFields) {
      return [
        'name' => $name,
        'roomId' => $roomId, 
        'quantity' => $quantity
      ];
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }

  public function validateUpdate() {
    $params = json_decode(file_get_contents("php://input"));


    if(
      $params->id &&
      $params->name &&
      $params->roomId &&
      $params->quantity
    ) {
        return new SpecialEquipament(
          $params->id,
          $params->name,
          $params->roomId,
          $params->quantity
        );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }

}
