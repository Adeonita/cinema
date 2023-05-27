<?php
namespace App\Domain\Usecases\Session;

use App\Domain\Entities\Session;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateSessionUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Session
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}