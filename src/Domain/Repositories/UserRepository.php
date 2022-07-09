<?php
namespace App\Domain\Repositories;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Database\Database;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Entities\User;

class UserRepository implements Repository {

    private $database;

    # Recebe uma interface do banco, não importando qual seja a implementação.
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create(BaseEntity $user): int
    {
        return $this->database->create(
            "INSERT INTO users (first_name, last_name, email, password) VALUES(?,?,?,?)",
            $user->toPersistentArray()
        );
    }

    public function find($id): BaseEntity
    {
        $result = $this->database->select("SELECT * FROM users WHERE id = ?", [$id]);
        $count = count($result);
        if( $count <= 0 ) {
            throw new \Exception("User not found", 404);
        }

        return User::fromPersistentObject($result[0]);
    }

    public function delete($id): void
    {
        
    }

    public function update(BaseEntity $entity): bool
    {
        return false;
    }

}