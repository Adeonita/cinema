<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class User implements BaseEntity {

    public int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;
    public string $created_at;

    public function __construct(int $id = null, string $firstName, string $lastName, string $email, string $password, string $created_at = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
    }

    public function toPersistentArray(): array {
        return [
            $this->firstName, 
            $this->lastName, 
            $this->email, 
            $this->password 
        ];
    }

    public static function fromPersistentObject(object $userObj): User {
        return new User(
            $userObj->id,
            $userObj->firstName, 
            $userObj->lastName, 
            $userObj->email, 
            $userObj->password,
            $userObj->created_at
        );
    }

}