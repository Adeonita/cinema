<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Entities\Ticket;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateTicketUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Ticket
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}