<?php
namespace App\Domain\Factories\TicketUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\TicketRepository;
use App\Domain\Usecases\Ticket\FindTicketUsecase;

class FindTicketUsecaseFactory
{
  public static function create(): FindTicketUsecase
  {
    $database = new MySQL();
    $ticketRepository = new TicketRepository($database);
    $findTicketUsecase = new FindTicketUsecase($ticketRepository);

    return $findTicketUsecase;
  }
}
