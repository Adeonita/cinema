<?php
namespace App\Domain\Entities;

class User {

    public int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;
    public string $created_at;

}