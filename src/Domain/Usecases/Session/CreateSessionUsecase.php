<?php

namespace App\Domain\Usecases\Session;

use App\Domain\Ports\Entities\BaseEntity;
// use App\Domain\Ports\Repositories\Repository;
// use App\Domain\Ports\Usecases\CreateUsecasePort;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Repositories\FilmRepository;
use App\Domain\Entities\Session;

//TODO: Qual UseCase essa classe deve Implementar? 
class CreateSessionUsecase 
//implements CreateUsecasePort
{
  private $filmRepository;
  private $roomRepository;
  private $sessionRepository;

  public function __construct(
    RoomRepository $roomRepository,
    FilmRepository $filmRepository,
    SessionRepository $sessionRepository
  ){
    $this->roomRepository = $roomRepository;
    $this->filmRepository = $filmRepository;
    $this->sessionRepository = $sessionRepository;
  }

  public function execute(BaseEntity $entity)
  {
    $this->canCreate($entity);

    $id = $this->sessionRepository->create($entity);

    return $this->sessionRepository->find($id);
  }

  //TODO: Mover para o SessionValidator
  private function duplicatedSession($entity)
  {
    $sessions = $this->sessionRepository->findBy(
      'sessions',
      [
        'date_time' => $entity->dateTime,
        'room_id' => $entity->roomId,
      ],
      [Session::class, 'fromArray']
    );
    
    return count($sessions) >= 1;
  }

  private function hasRoom($roomId)
  {
    return $this->roomRepository->find($roomId);
  }

  private function hasFilm($filmId)
  {
    return $this->filmRepository->find($filmId);
  }

  private function canCreate($entity)
  {
    $this->hasFilm($entity->filmId);

    $this->hasRoom($entity->roomId);

    $session = $this->duplicatedSession($entity);

    if ($session) {
      throw new \Exception('Duplicated session', 422);
    }
  }
}