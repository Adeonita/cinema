<?php
namespace App\Domain\Factories\CineUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\CineRepository;
use App\Domain\Usecases\Cine\UpdateCineUsecase;

class UpdateCineUsecaseFactory
{
    public static function create(): UpdateCineUsecase
    {
        $database = new MySQL();
        $cineRepository = new CineRepository($database);
        $updateCineUsecase = new UpdateCineUsecase($cineRepository);

        return $updateCineUsecase;
    }
}
