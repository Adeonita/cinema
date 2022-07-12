<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Session;

class SessionValidator
{
  public function validateCreate()
  {
    $roomId = $_POST['roomId'];
    $dateTime = $_POST['dateTime'];
    $filmId = $_POST['filmId'];

    $requiredFields = $roomId && $dateTime && $filmId;

    if ($requiredFields) {
      return new Session(
        null,
        $dateTime,
        $roomId,
        $filmId
      );
    }
              
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
}
