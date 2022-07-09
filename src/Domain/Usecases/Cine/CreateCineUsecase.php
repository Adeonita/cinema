<?php
namespace App\Domain\Usecases\Cine;

use App\Domain\Entities\Cine;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\CreateUsecasePort;

class CreateCineUsecase implements CreateUsecasePort {

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Cine
    {
        $id = $this->repository->create($entity);
        return $this->repository->find($id);
    }

}