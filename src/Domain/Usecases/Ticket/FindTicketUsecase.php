<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Entities\Ticket;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindTicketUsecase implements FindUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute($ticketId): Ticket
  {    
    return $this->repository->find($ticketId);
  }
}
