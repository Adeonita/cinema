<?php
namespace App\Domain\Factories\CineUsecase;

use App\Domain\Repositories\CineRepository;
use App\Domain\Usecases\Cine\CreateCineUsecase;
use App\Infra\Database\MySQL;

class CreateCineUsecaseFactory
{
    public static function create(): CreateCineUsecase
    {
        $database = new MySQL();
        $cineRepository = new CineRepository($database);
        $createCineUsecase = new CreateCineUsecase($cineRepository);

        return $createCineUsecase;
    }
}
