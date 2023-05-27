<?php
namespace App\Infra\Validators;

use App\Domain\Entities\User;

class UserValidator
{

    public function validateCreate()
    {
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
                
        throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
    }
    
    public function validateUpdate() {
        $params = json_decode(file_get_contents("php://input"));
        
        if(
            $params->id &&
            $params->firstName &&
            $params->lastName &&
            $params->email &&
            $params->password
        ) {
            return new User(
                $params->id,
                $params->firstName,
                $params->lastName,
                $params->email,
                $params->password
            );
        }
                
        throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
      }
}