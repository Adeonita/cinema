<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\DeleteByUsecasePort;

class DeleteTicketByUserUsecase implements DeleteByUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  //TODO: update o campo deleted_at para now()
  public function execute($ticketId, $userId)
  {
    $this->repository->deleteBy(
      "tickets", 
      [
        "id" => $ticketId,
        "user_id" => $userId
      ]
    ); 
  }
}
