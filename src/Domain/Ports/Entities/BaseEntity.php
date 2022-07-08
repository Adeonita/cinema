<?php
namespace App\Domain\Ports\Entities;

interface BaseEntity {
    
    public function toPersistentArray(): array;
    public static function fromPersistentObject(object $obj): BaseEntity;

}
