<?php
namespace App\Domain\Factories\CineUsecase;

use App\Domain\Repositories\CineRepository;
use App\Domain\Usecases\Cine\DeleteCineUsecase;
use App\Infra\Database\MySQL;

class DeleteCineUsecaseFactory
{
    public static function create(): DeleteCineUsecase
    {
        $database = new MySQL();
        $cineRepository = new CineRepository($database);
        $createCineUsecase = new DeleteCineUsecase($cineRepository);

        return $createCineUsecase;
    }
}
