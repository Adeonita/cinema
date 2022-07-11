<?php

namespace App\Infra\Controllers;

use App\Infra\Validators\RoomValidator;
use App\Domain\Factories\RoomUsecase\FindRoomUsecaseFactory;
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

  public function find($id)
  {
    try {
      $usecase = FindRoomUsecaseFactory::create();
      $roomEntity = $usecase->execute($id);
      
      return $this->jsonResponse($roomEntity);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }
}