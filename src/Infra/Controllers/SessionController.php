<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\SessionValidator;
use App\Domain\Factories\SessionUsecase\CreateSessionUsecaseFactory;

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
}
