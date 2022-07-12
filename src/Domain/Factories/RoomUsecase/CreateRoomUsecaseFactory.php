<?php

namespace App\Domain\Factories\RoomUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Usecases\Room\CreateRoomUsecase;

class CreateRoomUsecaseFactory
{
  public static function create()
  {
    $database = new MySQL();
    $roomRepository = new RoomRepository($database);
    $createRoomUsecase = new CreateRoomUsecase($roomRepository);
    
    return $createRoomUsecase;
  }
}