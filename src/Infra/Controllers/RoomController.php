<?php

namespace App\Infra\Controllers;

use App\Infra\Database\MySQL;
use App\Infra\Validators\RoomValidator;
use App\Domain\Factories\RoomUsecase\CreateRoomUsecaseFactory;

class RoomController extends Controller
{
  public function create()
  {
    $validator = new RoomValidator();
    $roomEntity = $validator->validateCreate();
    $usecase = CreateRoomUsecaseFactory::create();
    $createdRoom = $usecase->execute($roomEntity);
    
    return $this->jsonResponse($createdRoom, 201);
  }
}