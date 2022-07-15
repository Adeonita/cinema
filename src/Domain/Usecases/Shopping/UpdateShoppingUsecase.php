<?php
namespace App\Domain\Usecases\Shopping;

use App\Domain\Entities\Shopping;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateShoppingUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Shopping
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}