<?php
namespace App\Domain\Factories\ShoppingUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\ShoppingRepository;
use App\Domain\Usecases\Shopping\FindShoppingUsecase;

class FindShoppingUsecaseFactory
{

    public static function create(): FindShoppingUsecase
    {
        $database = new MySQL();
        $shoppingRepository = new ShoppingRepository($database);
        $findShoppingUsecase = new FindShoppingUsecase($shoppingRepository);

        return $findShoppingUsecase;
    }
}
