<?php
namespace App\Domain\Factories\TicketUsecase;

use App\Domain\Repositories\TicketRepository;
use App\Domain\Usecases\Ticket\DeleteTicketUsecase;
use App\Infra\Database\MySQL;

class DeleteTicketUsecaseFactory
{
  public static function create(): DeleteTicketUsecase
  {
    $database = new MySQL();
    $ticketRepository = new TicketRepository($database);
    $deleteTicketUsecase = new DeleteTicketUsecase($ticketRepository);

    return $deleteTicketUsecase;
  }
}
