<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Film implements BaseEntity{

    public int $id;
    public string $name;
    public bool $isThreeDimentions;
    public int $duration;

    public function __construct($id = null, $name, $isThreeDimentions, $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isThreeDimentions = $isThreeDimentions;
        $this->duration = $duration;
    }

    public function toPersistentArray(): array {
        return [
            $this->name, 
            $this->isThreeDimentions,
            $this->duration
        ];
    }

    public static function fromPersistentObject($cineObj): BaseEntity {
        return new Film(
            $cineObj->id, 
            $cineObj->name, 
            $cineObj->is_three_dimentions,
            $cineObj->duration
        );
    }

}