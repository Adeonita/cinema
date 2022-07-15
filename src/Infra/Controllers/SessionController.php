<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\SessionValidator;
use App\Domain\Factories\SessionUsecase\FindSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\CreateSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\DeleteSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\FindSessionByFilmUsecaseFactory;
use App\Domain\Factories\SessionUsecase\FindSessionByDateUsecaseFactory;
use App\Domain\Factories\SessionUsecase\CreateFindAvailableTicketsUsecaseFactory;
use App\Domain\Factories\SessionUsecase\UpdateSessionUsecaseFactory;

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

  public function findAvailableTickets() {
    try {
      $usecase = CreateFindAvailableTicketsUsecaseFactory::create();
      $validator = new SessionValidator();
      $payload = $validator->validateFindTickets();
      $availableTickets = $usecase->execute($payload->filmName, $payload->date);

      return $this->jsonResponse($availableTickets);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    } 
  }

  public function update()
  {
      try {
          $validator = new SessionValidator();
          $usecase = UpdateSessionUsecaseFactory::create();
          $updated = $usecase->execute($validator->validateUpdate());

          return $this->jsonResponse($updated);
      } catch(\Exception $e) {
          return $this->jsonResponse($e->getMessage(), $e->getCode());
      }
  }
}
