<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\SpecialEquipament;
use App\Domain\Entities\Ticket;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;

class TicketRepository extends Repository
{
    protected $database;

    # Recebe uma interface do banco, não importando qual seja a implementação.
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $entity): int
    {
        return $this->database->create(
            "INSERT INTO tickets (price, date_time, user_id, is_student, session_id, room_id, is_three_dimentions, deleted_at) VALUES(?,?,?,?,?,?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool
    {
        return $this->database->update("UPDATE tickets SET price=?, date_time=?, user_id=?, is_student=?, session_id=?, room_id=?, is_three_dimentions=?, deleted_at=? WHERE id=?",
                array_merge($entity->toPersistentArray(), [$entity->id]));
    }

    public function delete($id): void
    {
        $this->database->delete("DELETE FROM tickets WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity
    {
        $result = $this->database->select("SELECT * FROM tickets WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Ticket not found", 404);
        }

        return Ticket::fromPersistentObject($result[0]);
    }

    public function getAmount($roomId)
    {
        $result = $this->database->select(
            'SELECT COUNT(*) as total FROM tickets where room_id = ?', [$roomId]
        );
        
        return (int) $result[0]->total;
    }

}