<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Room;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;

class RoomRepository extends Repository
{

    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $entity): int
    {
        return $this->database->create(
            "INSERT INTO rooms (name, capacity, is_three_dimentions, cine_id) VALUES(?,?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool
    {
        return $this->database->update("UPDATE rooms SET name=?, capacity=?, is_three_dimentions=?, cine_id=? WHERE id=?",
                array_merge($entity->toPersistentArray(), [$entity->id]));
    }

    public function delete($id): void
    {
        $this->database->delete("DELETE FROM rooms WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity
    {
        $result = $this->database->select("SELECT * FROM rooms WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Room not found", 404);
        }

        return Room::fromPersistentObject($result[0]);
    }

}