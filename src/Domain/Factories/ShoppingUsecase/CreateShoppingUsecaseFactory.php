<?php
namespace App\Domain\Factories\ShoppingUsecase;

use App\Domain\Repositories\ShoppingRepository;
use App\Domain\Usecases\Shopping\CreateShoppingUsecase;
use App\Infra\Database\MySQL;

class CreateShoppingUsecaseFactory {

    public static function create(): CreateShoppingUsecase {
        $database = new MySQL();
        $shoppingRepository = new ShoppingRepository($database);
        $createShoppingUsecase = new CreateShoppingUsecase($shoppingRepository);

        return $createShoppingUsecase;
    }

}