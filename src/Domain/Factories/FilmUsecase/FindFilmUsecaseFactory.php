<?php

namespace App\Domain\Factories\FilmUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\FilmRepository;
use App\Domain\Usecases\Film\FindFilmUsecase;

class FindFilmUseCaseFactory
{
  public static function create(): FindFilmUsecase
  {
    $database = new MySQL();
    $filmRepository = new FilmRepository($database);
    $findFilmUsecase = new FindFilmUsecase($filmRepository);

    return $findFilmUsecase;
  }
}