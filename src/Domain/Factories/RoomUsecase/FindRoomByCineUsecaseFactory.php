<?php

namespace App\Domain\Factories\RoomUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Usecases\Room\FindRoomByCineUsecase;

class FindRoomByCineUsecaseFactory
{
  public static function create()
  {
    $database = new MySQL();
    $roomRepository = new RoomRepository($database);
    $findRoomUseCase = new FindRoomByCineUsecase($roomRepository);

    return $findRoomUseCase;
  }
}