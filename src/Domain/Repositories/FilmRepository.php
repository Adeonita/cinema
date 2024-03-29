<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Film;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class FilmRepository extends Repository
{
    private $database;

    # Recebe uma interface do banco, não importando qual seja a implementação.
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $entity): int
    {
        return $this->database->create(
            "INSERT INTO films (title,director,duration,category,age_rating,main_actor,is_three_dimentions) VALUES(?,?,?,?,?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool
    {
        return $this->database->update("UPDATE films SET title=?,director=?,duration=?,category=?,age_rating=?,main_actor=?,is_three_dimentions=? WHERE id=?",
                array_merge($entity->toPersistentArray(), [$entity->id]));
    }

    public function delete($id): void
    {
        $this->database->delete("DELETE FROM films WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity
    {
        $result = $this->database->select("SELECT * FROM films WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Film not found", 404);
        }

        return Film::fromPersistentObject($result[0]);
    }

    public function findByDate($date)
    {
        $query = "SELECT 
            films.title,
            films.duration,
            films.director,
            films.age_rating,
            films.main_actor,
            films.is_three_dimentions,
            films.category
        FROM sessions 
        INNER JOIN films on films.id = sessions.film_id
        WHERE date_time like ?";

        $result = $this->database->select($query, ["%$date%"]);

        $count = count($result);
        
        if ($count <= 0) {
            throw new \Exception("Session not found", 404);
        }

        return $result;
    }
}