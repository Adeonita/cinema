<?php
namespace App\Domain\Factories\SpecialEquipamentUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SpecialEquipamentRepository;
use App\Domain\Usecases\SpecialEquipament\UpdateSpecialEquipamentUsecase;

class UpdateSpecialEquipamentUsecaseFactory
{
    public static function create(): UpdateSpecialEquipamentUsecase
    {
        $database = new MySQL();
        $repository = new SpecialEquipamentRepository($database);
        $updateUsecase = new UpdateSpecialEquipamentUsecase($repository);

        return $updateUsecase;
    }
}
