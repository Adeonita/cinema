<?php
namespace App\Domain\Ports\Database;

interface Database {

    public function create(string $query, array $params = []): int;
    public function update(string $query, array $params = []): bool;
    public function select(string $query, array $params): array;
    public function delete(string $query, array $params = []): bool;

}