<?php
namespace App\Domain\Factories\TicketUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\TicketRepository;
use App\Domain\Usecases\Ticket\UpdateTicketUsecase;

class UpdateTicketUsecaseFactory
{
    public static function create(): UpdateTicketUsecase
    {
        $database = new MySQL();
        $repository = new TicketRepository($database);
        $updateUsecase = new UpdateTicketUsecase($repository);

        return $updateUsecase;
    }
}
