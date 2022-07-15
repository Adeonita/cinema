<?php
namespace App\Domain\Usecases\SpecialEquipament;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\DeleteUsecasePort;

class DeleteSpecialEquipamentUsecase implements DeleteUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }

  public function execute($id)
  {
    $this->repository->delete($id);
  }
}
