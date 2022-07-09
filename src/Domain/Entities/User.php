<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class User implements BaseEntity {

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $created_at;

    public function __construct($id = null, $firstName, $lastName, $email, $password, $created_at = null)
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

    public static function fromPersistentObject($userObj): BaseEntity {
        return new User(
            $userObj->id,
            $userObj->first_name, 
            $userObj->last_name, 
            $userObj->email, 
            $userObj->password,
            $userObj->created_at
        );
    }

}