<?php
namespace App\Domain\Usecases\User;

use App\Domain\Entities\User;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\CreateUsecasePort;

class CreateUserUsecase implements CreateUsecasePort {

    private $repository;

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