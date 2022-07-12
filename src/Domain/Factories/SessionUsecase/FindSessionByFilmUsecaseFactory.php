<?php

namespace App\Domain\Factories\SessionUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Usecases\Session\FindSessionByFilmUsecase;

class FindSessionByFilmUsecaseFactory
{
  public function create()
  {
    $database = new MYSQL();
    $sessionRepository = new SessionRepository($database);
    $usecase = new FindSessionByFilmUsecase($sessionRepository);

    return $usecase;
  }
}
