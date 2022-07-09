<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class SpecialEquipament implements BaseEntity {

    public $id;
    public $name;
    public $roomId;

    public function __construct($id = null, $name, $roomId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->roomId = $roomId;
    }

    public function toPersistentArray(): array {
        return [
            $this->name,
            $this->roomId
        ];
    }

    public static function fromPersistentObject($spcEquipObj): BaseEntity {
        return new SpecialEquipament(
            $spcEquipObj->id,
            $spcEquipObj->name,
            $spcEquipObj->room_id
        );
    }

}