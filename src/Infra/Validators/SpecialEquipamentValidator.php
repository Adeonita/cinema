<?php
namespace App\Infra\Validators;

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

}
