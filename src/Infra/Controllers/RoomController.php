<?php

namespace App\Infra\Controllers;

use App\Infra\Validators\RoomValidator;
use App\Domain\Factories\RoomUsecase\FindRoomUsecaseFactory;
use App\Domain\Factories\RoomUsecase\CreateRoomUsecaseFactory;
use App\Domain\Factories\RoomUsecase\DeleteRoomUsecaseFactory;

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

  public function delete($id)
  {
    try {
      $deleteUsecase = DeleteRoomUsecaseFactory::create();
      $deleteUsecase->execute($id);

      return $this->jsonResponse(null, 204);

    } catch(\Exception $e) {
      return $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }
}