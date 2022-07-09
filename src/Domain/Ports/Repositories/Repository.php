<?php
namespace App\Domain\Ports\Repositories;

use App\Domain\Ports\Entities\BaseEntity;

interface Repository {

    public function create(BaseEntity $entity): int;
    public function update(BaseEntity $entity): bool;
    public function delete($id): void;
    public function find($id): BaseEntity;

}