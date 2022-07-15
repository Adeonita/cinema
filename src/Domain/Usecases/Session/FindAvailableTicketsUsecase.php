<?php

namespace App\Domain\Usecases\Session;

use App\Domain\Repositories\SessionRepository;

class FindAvailableTicketsUsecase {
  private $repository;

  public function __construct(SessionRepository $repository)
  {
    $this->repository = $repository;
  }
  
  public function execute($filmName, $date)
  {
    return $this->repository->getAvailableTicketsCount($filmName, $date);
  }
}
