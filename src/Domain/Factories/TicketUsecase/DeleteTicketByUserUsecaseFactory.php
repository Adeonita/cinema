<?php
namespace App\Domain\Factories\TicketUsecase;

use App\Domain\Repositories\TicketRepository;
use App\Domain\Usecases\Ticket\DeleteTicketByUserUsecase;
use App\Infra\Database\MySQL;

class DeleteTicketByUserUsecaseFactory
{
  public static function create(): DeleteTicketByUserUsecase
  {
    $database = new MySQL();
    $ticketRepository = new TicketRepository($database);
    $deleteTicketByUserUsecase = new DeleteTicketByUserUsecase($ticketRepository);

    return $deleteTicketByUserUsecase;
  }
}
