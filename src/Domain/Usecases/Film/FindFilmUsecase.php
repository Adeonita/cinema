<?php

namespace App\Domain\Usecases\Film;

use App\Domain\Entities\Film;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindFilmUsecase implements FindUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  public function execute(int $id): Film
  {
    return $this->repository->find($id);
  }
}