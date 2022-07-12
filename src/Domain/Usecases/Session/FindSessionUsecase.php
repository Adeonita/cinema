<?php

namespace App\Domain\Usecases\Session;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindSessionUsecase implements FindUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute($id)
  {
    return $this->repository->find($id);
  }
}
