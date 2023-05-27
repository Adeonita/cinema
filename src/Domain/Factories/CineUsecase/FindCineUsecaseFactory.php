<?php
namespace App\Domain\Factories\CineUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\CineRepository;
use App\Domain\Usecases\Cine\FindCineUsecase;

class FindCineUsecaseFactory
{
    public static function create(): FindCineUsecase
    {
        $database = new MySQL();
        $cineRepository = new CineRepository($database);
        $createCineUsecase = new FindCineUsecase($cineRepository);

        return $createCineUsecase;
    }
}
