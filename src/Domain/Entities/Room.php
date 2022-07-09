<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Room implements BaseEntity {

    public $id;
    public $name;
    public $capacity;
    public $priceCommonDay;
    public $priceWeekend;
    public $isThreeDimentions;
    public $cineId;

    public function __construct($id = null, $name, $capacity, $priceCommonDay, $priceWeekend, $isThreeDimentions, $cineId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->capacity = $capacity;
        $this->priceCommonDay = $priceCommonDay;
        $this->priceWeekend = $priceWeekend;
        $this->isThreeDimentions = $isThreeDimentions;
        $this->cineId = $cineId;
    }

    public function toPersistentArray(): array {
        return [
            $this->name,
            $this->capacity,
            $this->priceCommonDay,
            $this->priceWeekend,
            $this->isThreeDimentions,
            $this->cineId
        ];
    }

    public static function fromPersistentObject($roomObj): BaseEntity {
        return new Room(
            $roomObj->id,
            $roomObj->name,
            $roomObj->capacity,
            $roomObj->price_common_day,
            $roomObj->price_weekend,
            $roomObj->is_three_dimentions,
            $roomObj->cine_id
        );
    }

}