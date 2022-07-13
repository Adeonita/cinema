<?php

namespace App\Domain\Usecases\Session;

use App\Domain\Entities\Session;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindSessionByDateUsecase implements FindUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute($date)
  {
    return $this->repository->findByDate($date);
  }
}
