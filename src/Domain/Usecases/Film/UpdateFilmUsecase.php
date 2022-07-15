<?php
namespace App\Domain\Usecases\Film;

use App\Domain\Entities\Film;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateFilmUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Film
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}