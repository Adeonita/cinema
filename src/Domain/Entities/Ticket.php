<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Ticket implements BaseEntity{

    public $id;
    public $price;
    public $date;
    public $userId;
    public $isStudent;
    public $sessionId;

    public function __construct($id = null, $price, $date, $userId, $isStudent, $sessionId)
    {
        $this->id = $id;
        $this->price = $price;
        $this->date = $date;
        $this->userId = $userId;
        $this->isStudent = $isStudent;
        $this->sessionId = $sessionId;
    }

    public function toPersistentArray(): array {
        return [
            $this->price,
            $this->date,
            $this->userId,
            $this->isStudent,
            $this->sessionId
        ];
    }

    public static function fromPersistentObject($ticketObj): BaseEntity {
        return new Ticket(
            $ticketObj->id,
            $ticketObj->price,
            $ticketObj->date,
            $ticketObj->user_id,
            $ticketObj->is_student,
            $ticketObj->session_id
        );
    }

}