<?php
namespace App\Domain\Repositories;

use App\Domain\Entities\Shopping;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Database\Database; 
use App\Domain\Ports\Entities\BaseEntity;

class ShoppingRepository extends Repository
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
            "INSERT INTO shoppings (name) VALUES(?)",
            $entity->toPersistentArray()
        );
    }

    public function update(BaseEntity $entity): bool
    {
        return $this->database->update("UPDATE shoppings SET name=? WHERE id=?",
                array_merge($entity->toPersistentArray(), [$entity->id]));
    }

    public function delete($id): void
    {
        $this->database->delete("DELETE FROM shoppings WHERE id = ?", [$id]);
    }

    public function find($id): BaseEntity
    {
        $result = $this->database->select("SELECT * FROM shoppings WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("Shopping not found", 404);
        }

        return Shopping::fromPersistentObject($result[0]);
    }

}