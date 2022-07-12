<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Ticket;

class TicketValidator
{

  public function validateCreate() {
    $isStudent = $_POST['isStudent'];

    $session = [
      'roomId' => $_POST['session']['roomId'],
      'filmId' => $_POST['session']['filmId'],
      'dateTime' => $_POST['session']['dateTime'],
    ];

    $user = [
      'email' => $_POST['user']['email'],
      'password' => $_POST['user']['password'],
    ];  

    $requiredFields = $isStudent && $session && $user;


    if ($requiredFields) {
      echo 'ok'; exit;
        // return new Ticket(
        //     null,
        //     
        // );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
    
}