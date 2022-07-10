<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Film;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class FilmRepository implements Repository {
    private $database;

    # Recebe uma interface do banco, não importando qual seja a implementação.
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $entity): int {
        return $this->database->create(
            "INSERT INTO films (title,director,duration,category,age_rating,main_actor,is_three_dimentions) VALUES(?,?,?,?,?,?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool {
        return false;
    }

    public function delete($id): void {
        $this->database->delete("DELETE FROM films WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity {
        $result = $this->database->select("SELECT * FROM films WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Film not found", 404);
        }

        return Film::fromPersistentObject($result[0]);
    }
}