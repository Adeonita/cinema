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

    public function validateUpdate() {
        $params = json_decode(file_get_contents("php://input"));
        $id = $params->id;
        $name = $params->name;
        $shoppingId = $params->shoppingId;

        if($params->name && $params->shoppingId && $params->id) {
            return new Cine(
                $id,
                $name,
                $shoppingId
            );
        }
                
        throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
    }
    
}