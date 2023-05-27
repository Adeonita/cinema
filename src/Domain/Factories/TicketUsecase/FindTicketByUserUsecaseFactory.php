<?php
namespace App\Domain\Factories\TicketUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\TicketRepository;
use App\Domain\Usecases\Ticket\FindTicketByUserUsecase;

class FindTicketByUserUsecaseFactory
{
  public static function create(): FindTicketByUserUsecase
  {
    $database = new MySQL();
    $ticketRepository = new TicketRepository($database);
    $usecase = new FindTicketByUserUsecase($ticketRepository);

    return $usecase;
  }
}
