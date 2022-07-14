<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Entities\Ticket;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Repositories\TicketRepository;
use App\Domain\Repositories\SessionRepository;

class HasTicketUsecase 
//implements CreateUsecasePort
{
  private RoomRepository $roomRepository;
  private SessionRepository $sessionRepository;
  private TicketRepository $ticketRepository;

  public function __construct(
    RoomRepository $roomRepository,
    TicketRepository $ticketRepository,
    SessionRepository $sessionRepository
  ){
    $this->roomRepository = $roomRepository;
    $this->ticketRepository = $ticketRepository;
    $this->sessionRepository = $sessionRepository;
  }

  public function execute($filmName, $date)
  {
    //todas as sessões com nome dos filmes
    // $session = $this->sessionRepository->findBy([
    //   'session',
    //   []
    // ]);
    var_dump($session); exit;
    $room = $this->roomRepository->find($session->roomId);
    $saleTicket = $this->ticketRepository->getAmount($room->id);
    $roomDimentions = (int) $room->isThereeDimentions;

    if ($saleTicket >= $room->capacity) {
      throw new \Exception("Tickets Sold Out", 422);
    }
  }
}