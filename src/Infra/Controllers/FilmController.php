<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\FilmValidator;
use App\Domain\Factories\FilmUsecase\CreateFilmUsecaseFactory;

class FilmController extends Controller
{
  public function create()
  {
    $validator = new FilmValidator();
    $filmEntity = $validator->validateCreate();
    $usecase = CreateFilmUsecaseFactory::create();
    $createdFilm = $usecase->execute($filmEntity);
    
    return $this->jsonResponse($createdFilm, 201);
  }
}
