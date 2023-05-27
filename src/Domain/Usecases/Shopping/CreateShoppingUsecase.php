<?php
namespace App\Domain\Usecases\Shopping;

use App\Domain\Entities\Shopping;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\CreateUsecasePort;

class CreateShoppingUsecase implements CreateUsecasePort
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Shopping
    {
        $id = $this->repository->create($entity);
        return $this->repository->find($id);
    }

}