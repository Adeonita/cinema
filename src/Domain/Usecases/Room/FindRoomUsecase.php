<?php

namespace App\Domain\Usecases\Room;

use App\Domain\Entities\Room;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindRoomUsecase implements FindUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  public function execute($id): Room
  {
    return $this->repository->find($id);
  }
}
