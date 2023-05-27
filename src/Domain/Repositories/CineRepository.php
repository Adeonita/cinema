<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Cine;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;

class CineRepository extends Repository
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
            "INSERT INTO cines (name, shopping_id) VALUES(?,?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool
    {
        return $this->database->update("UPDATE cines SET name=?, shopping_id=? WHERE id=?",
                array_merge($entity->toPersistentArray(), [$entity->id]));
    }

    public function delete($id): void
    {
        $this->database->delete("DELETE FROM cines WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity
    {
        $result = $this->database->select("SELECT * FROM cines WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Cine not found", 404);
        }

        return Cine::fromPersistentObject($result[0]);
    }

}