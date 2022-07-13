<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Entities\Ticket;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\CreateUsecasePort;

class CreateTicketUsecase implements CreateUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute(BaseEntity $entity): Ticket
  {
    $id = $this->repository->create($entity);
    
    return $this->repository->find($id);
  }
}
