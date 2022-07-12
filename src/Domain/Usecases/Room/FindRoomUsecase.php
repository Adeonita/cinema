<?php

namespace App\Domain\Usecases\Room;

use App\Domain\Entities\Room;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindByUsecasePort;

class FindRoomUsecase implements FindByUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }


  public function execute($roomId, $cineId): ?Room
  {
    $rooms = $this->repository->findBy(
      "rooms", 
      [
        "id" => $roomId,
        "cine_id" => $cineId
      ],
      [Room::class, 'fromArray']
    );

    return $rooms[0];
  }
}
