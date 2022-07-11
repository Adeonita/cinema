<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Session implements BaseEntity
{
    
    public $id;
    public $dateTime;
    public $roomId;
    public $filmId;

    public function __construct($id = null, $dateTime, $roomId, $filmId)
    {
        $this->id = $id;
        $this->dateTime = $dateTime;
        $this->roomId = $roomId;
        $this->filmId = $filmId;
    }

    public function toPersistentArray(): array
    {
        return [
            $this->dateTime,
            $this->roomId,
            $this->filmId
        ];
    }

    public static function fromPersistentObject($sessionObj): BaseEntity
    {
        return new Session(
            $sessionObj->id,
            $sessionObj->date_time,
            $sessionObj->room_id,
            $sessionObj->film_id
        );
    }

    public static function fromArray($results)
    {
        $sessions = [];

        foreach($results as $session) {
            $sessions[] = Session::fromPersistentObject($session);
        }
        
        return $sessions;
    }
}
