<?php

namespace App\Domain\Factories\RoomUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Usecases\Room\DeleteRoomUsecase;

class DeleteRoomUsecaseFactory
{
  public static function create(): DeleteRoomUsecase
  {
    $database = new MySQL();
    $repository = new RoomRepository($database);
    $deleteRoomUsecase = new DeleteRoomUsecase($repository);

    return $deleteRoomUsecase;
  }
}