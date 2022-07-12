<?php

namespace App\Domain\Factories\SessionUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Usecases\Session\DeleteSessionUsecase;

class DeleteSessionUsecaseFactory
{
  public static function create(): DeleteSessionUsecase
  {
    $database = new MySQL();
    $repository = new SessionRepository($database);
    $deleteSessionUsecase = new DeleteSessionUsecase($repository);

    return $deleteSessionUsecase;
  }
}
