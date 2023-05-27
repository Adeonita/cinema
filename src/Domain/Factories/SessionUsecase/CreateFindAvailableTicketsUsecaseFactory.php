<?php

namespace App\Domain\Factories\SessionUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Usecases\Session\FindAvailableTicketsUsecase;

class CreateFindAvailableTicketsUsecaseFactory
{
  public static function create(): FindAvailableTicketsUsecase
  {
    $database = new MySQL();
    $repository = new SessionRepository($database);
    $findSessionUsecase = new FindAvailableTicketsUsecase($repository);

    return $findSessionUsecase;
  }
}
