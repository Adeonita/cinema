<?php
namespace App\Domain\Usecases\Cine;

use App\Domain\Entities\Cine;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateCineUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Cine
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}