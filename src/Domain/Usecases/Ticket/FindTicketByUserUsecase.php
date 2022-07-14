<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Entities\Ticket;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindByUsecasePort;

class FindTicketByUserUsecase implements FindByUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute($ticketId, $userId)
  {    
    return $this->repository->findBy(
      'tickets',
      [
        'id' => $ticketId,
        'user_id' => $userId,
      ],
      [Ticket::class, 'fromArray']
    );
  }
}
