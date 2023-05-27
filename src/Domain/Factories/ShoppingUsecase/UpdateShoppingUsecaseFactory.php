<?php
namespace App\Domain\Factories\ShoppingUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\ShoppingRepository;
use App\Domain\Usecases\Shopping\UpdateShoppingUsecase;

class UpdateShoppingUsecaseFactory
{
    public static function create(): UpdateShoppingUsecase
    {
        $database = new MySQL();
        $repository = new ShoppingRepository($database);
        $updateUsecase = new UpdateShoppingUsecase($repository);

        return $updateUsecase;
    }
}
