<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\TicketValidator;
use App\Domain\Factories\TicketUsecase\CreateTicketUsecaseFactory;
use App\Domain\Factories\TicketUsecase\DeleteTicketUsecaseFactory;
use App\Domain\Factories\TicketUsecase\DeleteTicketByUserUsecaseFactory;

class TicketController extends Controller
{
  public function create()
  {
    $validator = new TicketValidator();
    $ticketEntity = $validator->validateCreate();
    $usecase = CreateTicketUsecaseFactory::create();
    $createdTicket = $usecase->execute($ticketEntity);

    return $this->jsonResponse($createdTicket, 201);
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
}
