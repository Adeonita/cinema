<?php
namespace App\Infra\Validators;


class TicketValidator
{
  public function validateCreate() {
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
    
}