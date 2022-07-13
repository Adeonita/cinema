<?php
namespace App\Domain\Factories\TicketUsecase;

use App\Domain\Repositories\TicketRepository;
use App\Domain\Usecases\Ticket\CreateTicketUsecase;
use App\Infra\Database\MySQL;

class CreateTicketUsecaseFactory
{
    public static function create(): CreateTicketUsecase
    {
        $database = new MySQL();
        $ticketRepository = new TicketRepository($database);
        $createTicketUsecase = new CreateTicketUsecase($ticketRepository);

        return $createTicketUsecase;
    }
}
