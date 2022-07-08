<?php
namespace App\Domain\Usecases;

use App\Domain\Entities\User;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\SaveUsecasePort;

class SaveUserUsecase implements SaveUsecasePort{

    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): User
    {
        $id = $this->repository->create($entity);
        return $this->repository->find($id);
    }

}