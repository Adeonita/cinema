<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Shopping implements BaseEntity
{
    public $id;
    public $name;

    public function __construct($id = null, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function toPersistentArray(): array
    {
        return [
            $this->name,
        ];
    }

    public static function fromPersistentObject($shoppingObj): BaseEntity
    {
        return new Shopping(
            $shoppingObj->id,
            $shoppingObj->name
        );
    }

}