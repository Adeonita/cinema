<?php

namespace App\Domain\Factories\SessionUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Usecases\Session\FindSessionByDateUsecase;

class FindSessionByDateUsecaseFactory
{
  public static function create()
  {
    $database = new MYSQL();
    $sessionRepository = new SessionRepository($database);
    $usecase = new FindSessionByDateUsecase($sessionRepository);

    return $usecase;
  }
}
