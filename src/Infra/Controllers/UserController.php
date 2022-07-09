<?php
namespace App\Infra\Controllers;

use App\Domain\Factories\SaveUserUsecaseFactory;
use App\Infra\Validators\UserValidator;

class UserController extends Controller{

    public function create() {
        $validator = new UserValidator();
        $userEntity = $validator->validateCreate();
        $saveUsecase = SaveUserUsecaseFactory::create();
        $createdUser = $saveUsecase->execute($userEntity);
        
        return $this->jsonResponse($createdUser, 201); # Se quiser esconder alguma propriedade do usuário pode criar um método lá no entity toJsonResponse e returna um array
    }

}