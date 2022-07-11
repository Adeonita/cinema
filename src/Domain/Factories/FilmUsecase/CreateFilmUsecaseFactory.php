<?php

namespace App\Domain\Factories\FilmUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\FilmRepository;
use App\Domain\Usecases\Film\CreateFilmUsecase;

class CreateFilmUsecaseFactory
{
  public static function create()
  {
    $database = new MySQL();
    $filmRepository = new FilmRepository($database);
    $createFilmUsecase = new CreateFilmUsecase($filmRepository);

    return $createFilmUsecase;
  }
}