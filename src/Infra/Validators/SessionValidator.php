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

  public function validateFindTickets() {  
    $payload = json_decode($_GET["payload"]);
    if($payload->filmName && $payload->date) {
      return $payload;
    }
    
    throw new \Exception("Validation error: ". count($_GET) .implode(",", $_GET), 422);
  }

  public function validateUpdate() {
    $params = json_decode(file_get_contents("php://input"));
    if(
      $params->id &&
      $params->roomId &&
      $params->dateTime &&
      $params->filmId
    ) {
        return new Session(
          $params->id,
          $params->roomId,
          $params->dateTime,
          $params->filmId
        );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
}
