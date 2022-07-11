<?php

namespace App\Domain\Usecases\Room;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\DeleteUsecasePort;

class DeleteRoomUsecase implements DeleteUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  public function execute($id): void
  {
    $this->repository->delete($id);
  }
}