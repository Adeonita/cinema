<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Shopping;

class ShoppingValidator {

    public function validateCreate() {
        $name = $_POST['name'];

        if($name) {
            return new Shopping(
                null,
                $name
            );
        }
                
        throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
    }
    
}