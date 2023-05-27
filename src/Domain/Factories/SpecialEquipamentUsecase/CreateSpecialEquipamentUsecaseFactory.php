<?php
namespace App\Domain\Factories\SpecialEquipamentUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Repositories\SpecialEquipamentRepository;
use App\Domain\Usecases\SpecialEquipament\CreateSpecialEquipamentUsecase;

class CreateSpecialEquipamentUsecaseFactory
{
  public static function create(): CreateSpecialEquipamentUsecase
  {
    $database = new MySQL();

    $roomRepository = new RoomRepository($database);
    $specialEquipamentRepository = new SpecialEquipamentRepository($database);
    
    $createCineUsecase = new CreateSpecialEquipamentUsecase($specialEquipamentRepository, $roomRepository);

    return $createCineUsecase;
  }
}
