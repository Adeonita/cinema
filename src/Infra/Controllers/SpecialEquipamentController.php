<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\SpecialEquipamentValidator;
use App\Domain\Factories\SpecialEquipamentUsecase\FindSpecialEquipamentUsecaseFactory;
use App\Domain\Factories\SpecialEquipamentUsecase\CreateSpecialEquipamentUsecaseFactory;
use App\Domain\Factories\SpecialEquipamentUsecase\DeleteSpecialEquipamentUsecaseFactory;
use App\Domain\Factories\SpecialEquipamentUsecase\UpdateSpecialEquipamentUsecaseFactory;

class SpecialEquipamentController extends Controller
{
  public function create()
  {
    $validator = new SpecialEquipamentValidator();
    $specialEquipamentEntity = $validator->validateCreate();
    $usecase = CreateSpecialEquipamentUsecaseFactory::create();

    $entity = json_encode($specialEquipamentEntity);
    
    $roomId = $specialEquipamentEntity['roomId'];
    $name = $specialEquipamentEntity['name'];
    $quantity = $specialEquipamentEntity['quantity'];

    $createdShopping = $usecase->execute($roomId, $name, $quantity);
    
    return $this->jsonResponse($createdShopping, 201);
  }

  public function find($equipamentId)
  {
    try {
      $usecase = FindSpecialEquipamentUsecaseFactory::create();
      $filmEntity = $usecase->execute($equipamentId);
      
      return $this->jsonResponse($filmEntity);
    } catch (\Exception $e) {
      $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function delete($equipamentId)
  {
    try {
      $deleteUsecase = DeleteSpecialEquipamentUsecaseFactory::create();
      $deleteUsecase->execute($equipamentId);
    } catch(\Exception $e) {
      return $this->jsonResponse($e->getMessage(), $e->getCode());
    }
  }

  public function update()
  {
      try {
          $validator = new SpecialEquipamentValidator();
          $usecase = UpdateSpecialEquipamentUsecaseFactory::create();
          $updated = $usecase->execute($validator->validateUpdate());

          return $this->jsonResponse($updated);
      } catch(\Exception $e) {
          return $this->jsonResponse($e->getMessage(), $e->getCode());
      }
  }
}
