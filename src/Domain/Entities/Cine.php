<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Cine implements BaseEntity{

    public $id;
    public $name;
    public $shoppingId;

    public function __construct($id = null, $name, $shoppingId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shoppingId = $shoppingId;
    }

    public function toPersistentArray(): array
    {
        return [
            $this->name, 
            $this->shoppingId
        ];
    }

    public static function fromPersistentObject($cineObj): BaseEntity
    {
        return new Cine(
            $cineObj->id,
            $cineObj->name, 
            $cineObj->shopping_id
        );
    }

}