<?php
namespace App\Domain\Entities;

use App\Domain\Entities\Room;
use App\Domain\Entities\Film;

class Session {
    
    public int $id;
    public string $date;
    public string $hour;
    public Room $room;
    public Film $film;

}