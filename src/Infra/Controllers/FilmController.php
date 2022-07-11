<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\FilmValidator;
use App\Domain\Factories\FilmUsecase\FindFilmUsecaseFactory;
use App\Domain\Factories\FilmUsecase\CreateFilmUsecaseFactory;
use App\Domain\Factories\FilmUsecase\DeleteFilmUsecaseFactory;

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

  public function find($id)
  {
    try {
      $findUsecase = FindFilmUsecaseFactory::create();
      $filmEntity = $findUsecase->execute($id);

      return $this->jsonResponse($filmEntity, 200);
    }catch(\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function delete($id)
  {
    try {
      $deleteUserCase = DeleteFilmUsecaseFactory::create();
      $deleteUserCase->execute($id);

      return $this->jsonResponse("ok", 204);

    } catch(\Exception $e) {
      return $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }
}
