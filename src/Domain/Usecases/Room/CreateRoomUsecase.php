<?php

namespace App\Domain\Usecases\Room;

use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\CreateUsecasePort;
use App\Domain\Entities\Room;

class CreateRoomUsecase implements CreateUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  public function execute(BaseEntity $entity): Room
  {
    $id = $this->repository->create($entity);

    return $this->repository->find($id);
  }
}
