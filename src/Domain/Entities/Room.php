<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Room implements BaseEntity {

    public $id;
    public $name;
    public $capacity;
    public $price;

    public $priceWeekend; //price + 30% 
    public $isThreeDimentions;
    public $cineId;

    public function __construct($id = null, $name, $capacity, $price, $isThreeDimentions, $cineId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->priceWeekend = $price + ($price * 0.30);
        $this->isThreeDimentions = $isThreeDimentions;
        $this->cineId = $cineId;
    }

    public function toPersistentArray(): array {
        return [
            $this->name,
            $this->capacity,
            $this->price,
            $this->priceWeekend,
            $this->isThreeDimentions,
            $this->cineId
        ];
    }

    public static function fromPersistentObject($roomObj): BaseEntity {
        
        $price = number_format($roomObj->price, 2);

        return new Room(
            $roomObj->id,
            $roomObj->name,
            $roomObj->capacity,
            $price,
            $roomObj->is_three_dimentions ? true : false,
            $roomObj->cine_id
        );
    }

    public static function fromArray($results) {
        $rooms = [];
        foreach($results as $room) {
            $rooms[] = Room::fromPersistentObject($room);
        }
        return $rooms;
    }
}