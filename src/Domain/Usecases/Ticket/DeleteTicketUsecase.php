<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\DeleteUsecasePort;

class DeleteTicketUsecase implements DeleteUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  //TODO: update o campo deleted_at para now()
  public function execute($ticketId)
  {
    $this->repository->delete($ticketId); 
  }
}
