<?php
namespace App\Domain\Entities;

use App\Domain\Entities\Cine;

class Room {

    public int $id;
    public string $name;
    public int $capacity;
    public float $priceCommonDay;
    public float $priceWeekend;
    public bool $isThreeDimentions;
    public Cine $cine;

}