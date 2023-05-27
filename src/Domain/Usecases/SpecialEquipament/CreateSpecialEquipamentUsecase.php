<?php
namespace App\Domain\Usecases\SpecialEquipament;


use App\Domain\Entities\SpecialEquipament;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Repositories\SpecialEquipamentRepository;

class CreateSpecialEquipamentUsecase
{
  private $roomRepository;
  private $specialEquipamentsRepository;

  public function __construct(SpecialEquipamentRepository $specialEquipamentsRepository, RoomRepository $roomRepository)
  {
    $this->roomRepository = $roomRepository;
    $this->specialEquipamentsRepository = $specialEquipamentsRepository;
  }
  
  public function execute($roomId, $name, $quantity)
  {
    $room = $this->roomRepository->find($roomId);
    
    $entity = new SpecialEquipament(
      null,
      $name,
      $room->id,
      $quantity
    );

    $id = $this->specialEquipamentsRepository->create($entity);
    
    return $this->specialEquipamentsRepository->find($id);
  }

}