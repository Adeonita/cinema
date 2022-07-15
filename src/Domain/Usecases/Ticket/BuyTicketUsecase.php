<?php
namespace App\Domain\Usecases\Ticket;

use App\Domain\Entities\Ticket;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Repositories\TicketRepository;
use App\Domain\Repositories\SessionRepository;

class BuyTicketUsecase 
{
  private $roomRepository;
  private $sessionRepository;
  private $ticketRepository;

  public function __construct(
    RoomRepository $roomRepository,
    TicketRepository $ticketRepository,
    SessionRepository $sessionRepository
  ){
    $this->roomRepository = $roomRepository;
    $this->ticketRepository = $ticketRepository;
    $this->sessionRepository = $sessionRepository;
  }
  
  public function execute($isStudent, $userId, $sessionId)
  {
    $session = $this->sessionRepository->find($sessionId);
    $room = $this->roomRepository->find($session->roomId);
    $saleTicket = $this->ticketRepository->getAmount($room->id);
    $roomDimentions = (int) $room->isThereeDimentions;

    if ($saleTicket >= $room->capacity) {
      throw new \Exception("Tickets Sold Out", 422);
    }

    $entity = new Ticket(
      null,
      $session->dateTime,
      $userId,
      $isStudent,
      $sessionId,
      $room->id,
      $roomDimentions
    );

    $id = $this->ticketRepository->create($entity);
    
    return $this->ticketRepository->find($id);
  }
}
