<?php

namespace App\Domain\Usecases\Session;

use App\Domain\Entities\Session;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindSessionByFilmUsecase implements FindUsecasePort
{
  private $repository;

  public function __construct(Repository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute($filmId)
  {
    return $this->repository->findBy(
      'sessions', 
      ['film_id' => $filmId],  
      [Session::class, 'fromArray']
    );
  }
}
