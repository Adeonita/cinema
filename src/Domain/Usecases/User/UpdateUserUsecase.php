<?php
namespace App\Domain\Usecases\User;

use App\Domain\Entities\User;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateUserUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): User
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}