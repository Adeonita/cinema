<?php
namespace App\Domain\Factories\SpecialEquipamentUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SpecialEquipamentRepository;
use App\Domain\Usecases\SpecialEquipament\FindSpecialEquipamentUsecase;

class FindSpecialEquipamentUsecaseFactory
{
  public static function create(): FindSpecialEquipamentUsecase
  {
    $database = new MySQL();
    $specialEquipamentRepository = new SpecialEquipamentRepository($database);
    $createSpecialEquipamentUsecase = new FindSpecialEquipamentUsecase($specialEquipamentRepository);

    return $createSpecialEquipamentUsecase;
  }
}
