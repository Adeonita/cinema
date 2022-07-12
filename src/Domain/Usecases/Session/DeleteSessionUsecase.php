<?php

namespace App\Domain\Usecases\Session;

use App\Domain\Entities\Session;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\DeleteUsecasePort;

class DeleteSessionUsecase implements DeleteUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute($id)
  {
    return $this->repository->delete($id);
  }
}
