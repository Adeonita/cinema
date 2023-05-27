<?php

namespace App\Domain\Factories\FilmUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\FilmRepository;
use App\Domain\Usecases\Film\DeleteFilmUsecase;

class DeleteFilmUsecaseFactory
{
  public static function create(): DeleteFilmUsecase
  {
    $database = new MYSQL();
    $filmRepository = new FilmRepository($database);
    $deleteFilmUsecase = new DeleteFilmUsecase($filmRepository);

    return $deleteFilmUsecase;
  }
}
