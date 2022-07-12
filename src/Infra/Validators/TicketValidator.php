<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Ticket;
use App\Domain\Usecases\Session\FindSessionUsecase;
use App\Domain\Factories\SessionUsecase\FindSessionUsecaseFactory;

class TicketValidator
{

  public function validateCreate() {
    $isStudent = $_POST['isStudent'];
    $userId = $_POST['userId'];
    $sessionId = $_POST['sessionId'];

    $requiredFields = $isStudent && $sessionId && $userId;

    //chamar o useCase da sessão para pegar a data
    //calcular o valor do ingresso checando se é fim de semana
    // e se é meia entrada


    if ($requiredFields) {
      $sessionFactory = new FindSessionUsecaseFactory();
      $sessionUsecase = $sessionFactory->create();
      $sessionUsecase->execute();

      echo 'ok'; exit;
        // return new Ticket(
        //     null,
        //     
        // );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
    
}