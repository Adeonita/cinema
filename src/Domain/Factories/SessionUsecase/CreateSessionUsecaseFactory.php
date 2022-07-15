<?php

namespace App\Domain\Factories\SessionUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Repositories\FilmRepository;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Usecases\Session\CreateSessionUsecase;

class CreateSessionUsecaseFactory
{
  public static function create()
  {
    $database = new MySQL();
    $roomRepository = new RoomRepository($database);
    $filmRepository = new FilmRepository($database);
    $sessionRepository = new SessionRepository($database);
    $sessionUsecase = new CreateSessionUsecase($roomRepository, $filmRepository, $sessionRepository);

    return $sessionUsecase;
  }
}