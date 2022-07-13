<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\SessionValidator;
use App\Domain\Factories\SessionUsecase\FindSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\CreateSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\DeleteSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\FindSessionByFilmUsecaseFactory;
use App\Domain\Factories\SessionUsecase\FindSessionByDateUsecaseFactory;

class SessionController extends Controller
{
  public function create()
  {
    $validator = new SessionValidator();
    $roomEntity = $validator->validateCreate();
    $usecase = CreateSessionUsecaseFactory::create();
    $createdRoom = $usecase->execute($roomEntity);
    
    return $this->jsonResponse($createdRoom, 201);
  }

  public function findByFilm($filmId)
  {
    try {
      $usecase = FindSessionByFilmUsecaseFactory::create();
      $filmEntity = $usecase->execute($filmId);
      
      return $this->jsonResponse($filmEntity);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function find($id)
  {
    try {
      $usecase = FindSessionUsecaseFactory::create();
      $filmEntity = $usecase->execute($id);
      
      return $this->jsonResponse($filmEntity);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function delete($id)
  {
    try {
      $deleteUsecase = DeleteSessionUsecaseFactory::create();
      $deleteUsecase->execute($id);

      return $this->jsonResponse(null, 204);

    } catch(\Exception $e) {
      return $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function getByDate($date)
  {
    try {
      $usecase = FindSessionByDateUsecaseFactory::create();
      $filmEntity = $usecase->execute($date);
      
      return $this->jsonResponse($filmEntity);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    } 
  }
}
