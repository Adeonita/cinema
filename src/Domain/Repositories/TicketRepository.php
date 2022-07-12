<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\SpecialEquipament;
use App\Domain\Entities\Ticket;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;

class TicketRepository extends Repository
{

    private $database;

    # Recebe uma interface do banco, não importando qual seja a implementação.
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $entity): int {
        return $this->database->create(
            "INSERT INTO tickets (price, date, userId, isStudent, sessionId) VALUES(?,?,?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool {
        return false;
    }

    public function delete($id): void {
        $this->database->delete("DELETE FROM tickets WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity {
        $result = $this->database->select("SELECT * FROM tickets WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Ticket not found", 404);
        }

        return Ticket::fromPersistentObject($result[0]);
    }

}