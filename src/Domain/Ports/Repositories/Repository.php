<?php
namespace App\Domain\Ports\Repositories;

use App\Domain\Ports\Entities\BaseEntity;

abstract class Repository
{

    abstract public function create(BaseEntity $entity): int;
    abstract public function update(BaseEntity $entity): bool;
    abstract public function delete($id): void;
    abstract public function find($id): BaseEntity;

    public function findBy($tableName, $params, $callback) {
        $query = "SELECT * FROM $tableName WHERE ";
        $queryParams = "";

        foreach($params as $name => $value) {
            if(array_key_last($params) == $name) {
                $queryParams .= $name." = ?";
            } else {
                $queryParams .= $name." = ?"." AND ";
            }
        }

        return $callback($this->database->select("$query $queryParams", array_values($params)));
    }

    public function deleteBy($tableName, $params) {
        $query = "DELETE FROM $tableName WHERE ";
        $queryParams = "";

        foreach($params as $name => $value) {
            if(array_key_last($params) == $name) {
                $queryParams .= $name." = ?";
            } else {
                $queryParams .= $name." = ?"." AND ";
            }
        }

        $this->database->delete("$query $queryParams", array_values($params));
    }

}
