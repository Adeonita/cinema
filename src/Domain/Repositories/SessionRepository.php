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

    public function create(BaseEntity $entity): int
    {
        return $this->database->create(
            "INSERT INTO sessions (date_time, room_id, film_id) VALUES(?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool
    {
        return $this->database->update("UPDATE sessions SET date_time=?, room_id=?, film_id=? WHERE id=?",
                array_merge($entity->toPersistentArray(), [$entity->id]));
    }

    public function delete($id): void
    {
        $this->database->delete("DELETE FROM sessions WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity
    {
        $result = $this->database->select("SELECT * FROM sessions WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Session not found", 404);
        }

        return Session::fromPersistentObject($result[0]);
    }

    public function findByDate($date)
    {
        $query = "SELECT
        sessions.id as id,
        sessions.date_time as dia,
        rooms.name as sala,
        films.title as filme
        FROM sessions 
        INNER JOIN films on films.id = sessions.film_id
        INNER JOIN rooms on rooms.id = sessions.room_id
        WHERE date_time LIKE ?";

        $result = $this->database->select($query, ["%$date%"]);

        $count = count($result);
        
        if ($count <= 0) {
            throw new \Exception("Session not found", 404);
        }

        return $result;
    }

    public function getAvailableTicketsCount($filmName, $date) {
        $query = "
            SELECT r.id, r.name as roomName, r.capacity as total, r.capacity - count(t.id) as available, s.date_time from rooms r
            INNER JOIN sessions s ON s.room_id = r.id
            INNER JOIN tickets t ON t.session_id = s.id
            INNER JOIN films f ON s.film_id = f.id
            WHERE f.title like ? AND s.date_time = ?
            GROUP BY r.id;
        ";

        $result = $this->database->select($query, ['%'.$filmName.'%', $date]);

        return $result;
    }
}
