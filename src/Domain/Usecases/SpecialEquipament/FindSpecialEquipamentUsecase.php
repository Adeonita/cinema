<?php
namespace App\Domain\Usecases\SpecialEquipament;

use App\Domain\Entities\SpecialEquipament;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindSpecialEquipamentUsecase implements FindUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute(int $id)
  {
    return $this->repository->find($id);
  }
}
