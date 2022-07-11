<?php

namespace App\Domain\Usecases\Film;

use App\Domain\Entities\Film;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\CreateUsecasePort;

class CreateFilmUsecase implements CreateUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  public function execute(BaseEntity $entity): Film
  {
    $id = $this->repository->create($entity);

    return $this->repository->find($id);
  }
}