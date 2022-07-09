<?php
namespace App\Infra\Controllers;

use App\Domain\Factories\ShoppingUsecase\CreateShoppingUsecaseFactory;
use App\Domain\Factories\ShoppingUsecase\DeleteShoppingUsecaseFactory;
use App\Domain\Factories\ShoppingUsecase\FindShoppingUsecaseFactory;
use App\Infra\Validators\ShoppingValidator;

class ShoppingController extends Controller {

    public function create() {
        $validator = new ShoppingValidator();
        $shoppingEntity = $validator->validateCreate();
        $usecase = CreateShoppingUsecaseFactory::create();
        $createdShopping = $usecase->execute($shoppingEntity);
        
        return $this->jsonResponse($createdShopping, 201); # Se quiser esconder alguma propriedade do usuário pode criar um método lá no entity toJsonResponse e returna um array
    }

    public function find($id) {
        try {
            $findUsecase = FindShoppingUsecaseFactory::create();
            $shoppingEntity = $findUsecase->execute($id);
    
            return $this->jsonResponse($shoppingEntity);
        } catch(\Exception $e) {
            $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id) {
        try {
            $deleteUsecase = DeleteShoppingUsecaseFactory::create();
            $deleteUsecase->execute($id);
        } catch(\Exception $e) {
            return $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }
}