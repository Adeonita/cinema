<?php
namespace App\Infra\Controllers;

use App\Domain\Factories\UserUsecase\DeleteUserUsecaseFactory;
use App\Domain\Factories\UserUsecase\FindUserUsecaseFactory;
use App\Domain\Factories\UserUsecase\CreateUserUsecaseFactory;
use App\Infra\Validators\UserValidator;

class UserController extends Controller
{
    public function create()
    {
        $validator = new UserValidator();
        $userEntity = $validator->validateCreate();
        $saveUsecase = CreateUserUsecaseFactory::create();
        $createdUser = $saveUsecase->execute($userEntity);
        
        return $this->jsonResponse($createdUser, 201); # Se quiser esconder alguma propriedade do usuário pode criar um método lá no entity toJsonResponse e returna um array
    }

    public function find($id) {
        try {
            $findUsecase = FindUserUsecaseFactory::create();
            $userEntity = $findUsecase->execute($id);
    
            return $this->jsonResponse($userEntity);
        } catch(\Exception $e) {
            $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id) {
        try {
            $deleteUsecase = DeleteUserUsecaseFactory::create();
            $deleteUsecase->execute($id);
        } catch(\Exception $e) {
            return $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }

}