<?php

namespace App\Domain\Usecases\Room;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\DeleteByUsecasePort;

class DeleteRoomUsecase implements DeleteByUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  public function execute($roomId, $cineId)
  {
    $this->repository->deleteBy(
      "rooms", 
      [
        "id" => $roomId,
        "cine_id" => $cineId
      ]
    );
  }
}