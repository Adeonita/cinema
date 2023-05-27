<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Ticket;

class TicketValidator
{
  public function validateCreate()
  {
    $hasIsStudent = isset($_POST['isStudent']);
    $userId = $_POST['userId'];
    $sessionId = $_POST['sessionId'];

    $requiredFields = $hasIsStudent && $sessionId && $userId;

    if ($requiredFields) {
      $isStudent = (int) $_POST['isStudent'];
      
      return [
        'isStudent' => $isStudent,
        'userId' => $userId, 
        'sessionId' => $sessionId
      ];
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }

  public function validateUpdate() {
    $params = json_decode(file_get_contents("php://input"));
    
    if(
      $params->id &&
      $params->dateTime &&
      $params->userId &&
      $params->isStudent &&
      $params->sessionId &&
      $params->roomId &&
      $params->isThreeDimentions &&
      $params->price
    ) {
        return new Ticket(
          $params->id,
          $params->dateTime,
          $params->userId,
          $params->isStudent,
          $params->sessionId,
          $params->roomId,
          $params->isThreeDimentions,
          $params->price
        );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
    
}