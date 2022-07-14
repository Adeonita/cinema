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

    public function findWithRoomAndFilmByDate($date)
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
        // return Session::fromArray($result);
    }

    public function findByDate($date)
    {
        $result = $this->database->select("SELECT * FROM sessions where date_time like ?", ["%$date%"]);
        $count = count($result);
        
        if ($count <= 0) {
            throw new \Exception("Session not found", 404);
        }

        return Session::fromArray($result);
    }

    public function findByDateAndFilmName($filmName, $date)
    {
        $query = "SELECT
        sessions.id as id,
        sessions.date_time as dia,
        films.title as filme
        FROM sessions 
        INNER JOIN films on films.id = sessions.film_id
        WHERE date_time LIKE ? AND films.title = ?";

        $result = $this->database->select($query, ["%$date%"]);

        $count = count($result);
        
        if ($count <= 0) {
            throw new \Exception("Session not found", 404);
        }

        return $result;
        // return Session::fromArray($result);
    }

    public function getCapacityFromSession()
    {
        $query = 'SELECT rooms.capacity as total
        FROM sessions
        INNER JOIN rooms on sessions.room_id = rooms.id
        WHERE date_time = ?';

    }
}
