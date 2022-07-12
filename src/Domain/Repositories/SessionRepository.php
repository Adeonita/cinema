<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Session;
use App\Domain\Ports\Database\Database;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class SessionRepository extends Repository
{

    protected $database;

    # Recebe uma interface do banco, não importando qual seja a implementação.
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $entity): int {
        return $this->database->create(
            "INSERT INTO sessions (date_time, room_id, film_id) VALUES(?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool {
        return false;
    }

    public function delete($id): void {
        $this->database->delete("DELETE FROM sessions WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity {
        $result = $this->database->select("SELECT * FROM sessions WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Session not found", 404);
        }

        return Session::fromPersistentObject($result[0]);
    }

}