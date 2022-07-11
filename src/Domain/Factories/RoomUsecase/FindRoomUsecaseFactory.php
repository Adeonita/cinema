<?php

namespace App\Domain\Factories\RoomUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Usecases\Room\FindRoomUsecase;
use App\Domain\Repositories\RoomRepository;


class FindRoomUsecaseFactory
{

  public static function create()
  {
    $database = new MySQL();
    $roomRepository = new RoomRepository($database);
    $findRoomUseCase = new FindRoomUsecase($roomRepository);

    return $findRoomUseCase;
  }
}