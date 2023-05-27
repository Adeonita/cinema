<?php
namespace App\Domain\Factories\FilmUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\FilmRepository;
use App\Domain\Usecases\Film\UpdateFilmUsecase;

class UpdateFilmUsecaseFactory
{
    public static function create(): UpdateFilmUsecase
    {
        $database = new MySQL();
        $repository = new FilmRepository($database);
        $updateUsecase = new UpdateFilmUsecase($repository);

        return $updateUsecase;
    }
}
