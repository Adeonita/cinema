<?php
namespace App\Domain\Usecases\SpecialEquipament;

use App\Domain\Entities\SpecialEquipament;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateSpecialEquipamentUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): SpecialEquipament
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}