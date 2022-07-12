<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\SessionValidator;
use App\Domain\Factories\SessionUsecase\FindSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\CreateSessionUsecaseFactory;
use App\Domain\Factories\SessionUsecase\DeleteSessionUsecaseFactory;

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

  public function find($filmId)
  {
    try {
      $usecase = FindSessionUsecaseFactory::create();
      $filmEntity = $usecase->execute($filmId);
      
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
}
