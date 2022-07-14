<?php

namespace App\Domain\Factories\FilmUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\FilmRepository;
use App\Domain\Usecases\Film\FindFilmByDateUsecase;

class FindFilmByDateUsecaseFactory
{
  public static function create(): FindFilmByDateUsecase
  {
    $database = new MySQL();
    $filmRepository = new FilmRepository($database);
    $findFilmUsecase = new FindFilmByDateUsecase($filmRepository);

    return $findFilmUsecase;
  }
}