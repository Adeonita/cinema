<?php
namespace App\Infra\Database;

use App\Domain\Ports\Database\Database;
use Exception;
use \PDO;
use \PDOStatement;

class MySQL implements Database {

    private string $db_name;
    private string $db_password;
    private string $db_user;
    private string $db_host;

    public function __construct()
    {
        $this->db_host = getenv("DATABASE_HOST");
        $this->db_name = getenv("DATABASE_NAME");
        $this->db_user = getenv("DATABASE_USER");
        $this->db_password = getenv("DATABASE_PASSWORD");
    }

    private function getConnection() {
        return new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->db_user, $this->db_password);
    }

    private function applyBindParams(PDOStatement $statement, $params) {
        foreach($params as $index => $param_value) {
            $statement->bindParam($index + 1, $param_value);
        }
    }

    public function create(string $query, array $params = []): int {
        $connection = $this->getConnection();
        $statement = $connection->prepare($query);
        $this->applyBindParams($statement, $params);

        $result = $statement->execute();
        if( $result ) {
            return $connection->lastInsertId();
        }
        throw new \Exception("Error while execute create operation");
    }

    public function update(string $query, array $params = []): bool {
        $connection = $this->getConnection();
        $statement = $connection->prepare($query);
        $this->applyBindParams($statement, $params);

        return $statement->execute();
    }

    public function select(string $query, array $params): array {
        $connection = $this->getConnection();
        $statement = $connection->prepare($query);
        $this->applyBindParams($statement, $params);
        $result = [];

        if($statement->execute()) {
            while($obj = $statement->fetch(PDO::FETCH_OBJ)) {
                $result[] = $obj;
            }
        }

        return $result;
    }

    # Does it make sense?
    public function delete(string $query, array $params = []): bool {
        $connection = $this->getConnection();
        $statement = $connection->prepare($query);
        $this->applyBindParams($statement, $params);

        return $statement->execute();
    }

}