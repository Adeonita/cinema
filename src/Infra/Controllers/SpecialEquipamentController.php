<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\SpecialEquipamentValidator;
use App\Domain\Factories\SpecialEquipamentUsecase\CreateSpecialEquipamentUsecaseFactory;

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
}
