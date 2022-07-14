<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;
use DateTime;

class Ticket implements BaseEntity{

    public $id;
    public $price = 30;
    public $dateTime;
    public $userId;
    public $isStudent;
    public $sessionId;
    public $roomId;
    public $isThreeDimentions;
    public $deletedAt;

    public function __construct($id = null, $dateTime, $userId, $isStudent, $sessionId, $roomId, $isThreeDimentions)
    {
        $this->id = $id;
        $this->dateTime = $dateTime;
        $this->userId = $userId;
        $this->isStudent = $isStudent;
        $this->sessionId = $sessionId;
        $this->roomId = $roomId;
        $this->isThreeDimentions = $isThreeDimentions;
        $this->price = $this->calculatePrice();
        $this->deletedAt = null;
    }

    public function toPersistentArray(): array {
        return [
            $this->price,
            $this->dateTime,
            $this->userId,
            $this->isStudent,
            $this->sessionId,
            $this->roomId,
            $this->isThreeDimentions,
            $this->deletedAt,
        ];
    }

    public static function fromPersistentObject($ticketObj): BaseEntity {
        return new Ticket(
            $ticketObj->id,
            $ticketObj->date_time,
            $ticketObj->user_id,
            $ticketObj->is_student ? true : false,
            $ticketObj->session_id,
            $ticketObj->room_id,
            $ticketObj->is_three_dimentions ? true : false,
            $ticketObj->price,
            $ticketObj->deletedAt
        );
    }

    public static function fromArray($results)
    {
        $tickets = [];

        foreach($results as $ticket) {
            $tickets[] = Ticket::fromPersistentObject($ticket);
        }
        
        return $tickets;
    }

    private function isWeekend()
    {
        ini_set('date.timezone', 'America/Sao_Paulo');

        $date = new DateTime($this->dateTime);
        $formatDate = $date->format('Y-m-d');
        $day = date('D', strtotime($formatDate));

        if ($day == 'Sat' || $day == 'Sun' ) {
            return true;
        }
        
        return false;
    }

    //3D => 20% mais caro (definido pelo prof)
    //Fim de semana => 50% mais caro 
    //Estudante => 50% de desconto qualquer dia
    public function calculatePrice()
    {
        $isWeekend = $this->isWeekend();
        $isThreeDimentions = $this->isThreeDimentions;
        $isStudent = $this->isStudent;

        $price = $this->price;

        if ($isWeekend) {
            $percentage = $this->price * 0.50;
            $price = $price + $percentage;
        }

        if ($isThreeDimentions) {
            $percentage = $this->price * 0.20;
            $price = $price + $percentage;
        }

        if ($isStudent) {
            $price = $price / 2;
        }

        return $price;
    }

}