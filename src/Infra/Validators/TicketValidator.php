<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Ticket;
use App\Domain\Usecases\Session\FindSessionUsecase;
use App\Domain\Factories\SessionUsecase\FindSessionUsecaseFactory;
use App\Domain\Factories\UserUsecase\FindUserUsecaseFactory;
use App\Domain\Factories\RoomUsecase\FindRoomUsecaseFactory;

class TicketValidator
{
  public function validateCreate() {
    $hasIsStudent = isset($_POST['isStudent']);
    $userId = $_POST['userId'];
    $sessionId = $_POST['sessionId'];

    $requiredFields = $hasIsStudent && $sessionId && $userId;

    if ($requiredFields) {
      $isStudent = (int) $_POST['isStudent'];

      $sessionUsecaseFactory = new FindSessionUsecaseFactory();
      $sessionUsecase = $sessionUsecaseFactory->create();
      $session = $sessionUsecase->execute($sessionId);

      $roomId = $session->roomId;
      $roomUsecaseFactory = new FindRoomUsecaseFactory();
      $roomUsecase = $roomUsecaseFactory->create();
      $room = $roomUsecase->execute($roomId);

      $userUsecaseFactory = new FindUserUsecaseFactory();
      $userUsecase = $userUsecaseFactory->create();
      $user = $userUsecase->execute($userId);

      return new Ticket(
        null,
        $session->dateTime,
        $user->id,
        $isStudent,
        $sessionId,
        $roomId,
        $room->isThreeDimentions
      );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
    
}