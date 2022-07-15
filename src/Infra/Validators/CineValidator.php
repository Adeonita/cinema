<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Cine;

class CineValidator
{

    public function validateCreate()
    {
        $name = $_POST['name'];
        $shoppingId = $_POST['shoppingId'];

        if($name && $shoppingId) {
            return new Cine(
                null,
                $name,
                $shoppingId
            );
        }
                
        throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
    }
    
}