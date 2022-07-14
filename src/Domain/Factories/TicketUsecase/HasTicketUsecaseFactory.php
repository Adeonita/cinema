<?php
namespace App\Domain\Factories\TicketUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Repositories\TicketRepository;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Usecases\Ticket\HasTicketUsecase;

class HasTicketUsecaseFactory
{
  public static function create(): HasTicketUsecase
  {
    $database = new MySQL();
    $ticketRepository = new TicketRepository($database);
    $roomRepository = new RoomRepository($database);
    $sessionRepository = new SessionRepository($database);
    $createTicketUsecase = new HasTicketUsecase(
      $roomRepository,
      $ticketRepository,
      $sessionRepository
    );

    return $createTicketUsecase;
  }
}
