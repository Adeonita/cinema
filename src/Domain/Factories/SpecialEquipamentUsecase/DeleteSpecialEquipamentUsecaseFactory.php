<?php
namespace App\Domain\Factories\SpecialEquipamentUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SpecialEquipamentRepository;
use App\Domain\Usecases\SpecialEquipament\DeleteSpecialEquipamentUsecase;

class DeleteSpecialEquipamentUsecaseFactory
{
  public static function create(): DeleteSpecialEquipamentUsecase
  {
    $database = new MySQL();
    $cineRepository = new SpecialEquipamentRepository($database);
    $deleteCineUsecase = new DeleteSpecialEquipamentUsecase($cineRepository);

    return $deleteCineUsecase;
  }
}
