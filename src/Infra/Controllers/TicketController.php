<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\TicketValidator;
use App\Domain\Factories\TicketUsecase\BuyTicketUsecaseFactory;
use App\Domain\Factories\TicketUsecase\FindTicketUsecaseFactory;
use App\Domain\Factories\TicketUsecase\DeleteTicketUsecaseFactory;
use App\Domain\Factories\TicketUsecase\FindTicketByUserUsecaseFactory;
use App\Domain\Factories\TicketUsecase\DeleteTicketByUserUsecaseFactory;
use App\Domain\Factories\TicketUsecase\UpdateTicketUsecaseFactory;

class TicketController extends Controller
{
  public function create()
  {
    $validator = new TicketValidator();
    $params = $validator->validateCreate();

    $isStudent = $params['isStudent'];
    $userId = $params['userId'];
    $sessionId = $params['sessionId'];

    $usecase = BuyTicketUsecaseFactory::create();
    $createdTicket = $usecase->execute($isStudent, $userId, $sessionId);

    return $this->jsonResponse($createdTicket, 201);
  }

  public function find($ticketId)
  {
    try {
      $usecase = FindTicketUsecaseFactory::create();
      $filmEntity = $usecase->execute($ticketId);
      
      return $this->jsonResponse($filmEntity);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function findByUser($ticketId, $userId)
  {
    try {
      $usecase = FindTicketByUserUsecaseFactory::create();
      $filmEntity = $usecase->execute($ticketId, $userId);
      
      return $this->jsonResponse($filmEntity);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function deleteByUser($ticketId, $userId)
  {
    try {
      $deleteUsecase = DeleteTicketByUserUsecaseFactory::create();
      $deleteUsecase->execute($ticketId, $userId);

      return $this->jsonResponse(null, 204);

    } catch(\Exception $e) {
      return $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function delete($ticketId)
  {
    try {
      $deleteUsecase = DeleteTicketUsecaseFactory::create();
      $deleteUsecase->execute($ticketId);

      return $this->jsonResponse(null, 204);

    } catch(\Exception $e) {
      return $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function update()
  {
      try {
          $validator = new TicketValidator();
          $usecase = UpdateTicketUsecaseFactory::create();
          $updated = $usecase->execute($validator->validateUpdate());

          return $this->jsonResponse($updated);
      } catch(\Exception $e) {
          return $this->jsonResponse($e->getMessage(), $e->getCode());
      }
  }
}
