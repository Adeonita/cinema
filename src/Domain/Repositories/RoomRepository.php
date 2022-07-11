<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Room;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;

class RoomRepository implements Repository {

    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $entity): int {
        return $this->database->create(
            "INSERT INTO rooms (name, capacity, price, price_weekend, is_three_dimentions, cine_id) VALUES(?,?,?,?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool {
        return false;
    }

    public function delete($id): void {
        $this->database->delete("DELETE FROM rooms WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity {
        $result = $this->database->select("SELECT * FROM rooms WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Room not found", 404);
        }

        return Room::fromPersistentObject($result[0]);
    }

}