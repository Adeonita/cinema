<?php
namespace App\Infra\Validators;

use App\Domain\Entities\User;

class UserValidator {

    public function validateCreate() {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($firstName && $lastName && $email && $password) {
            return new User(
                null,
                $firstName, 
                $lastName,
                $email,
                $password,
                null
            );
        }
                
        throw new \Exception("Validation error: ". implode(",", $_POST));
    }
    
}