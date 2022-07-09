<?php
namespace App\Domain\Factories\ShoppingUsecase;

use App\Domain\Repositories\ShoppingRepository;
use App\Domain\Usecases\Shopping\DeleteShoppingUsecase;
use App\Infra\Database\MySQL;

class DeleteShoppingUsecaseFactory {

    public static function create(): DeleteShoppingUsecase {
        $database = new MySQL();
        $shoppingRepository = new ShoppingRepository($database);
        $deleteShoppingUsecase = new DeleteShoppingUsecase($shoppingRepository);

        return $deleteShoppingUsecase;
    }

}