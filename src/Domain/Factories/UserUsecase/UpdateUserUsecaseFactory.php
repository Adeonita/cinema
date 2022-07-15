<?php
namespace App\Domain\Factories\UserUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\UserRepository;
use App\Domain\Usecases\User\UpdateUserUsecase;

class UpdateUserUsecaseFactory
{
    public static function create(): UpdateUserUsecase
    {
        $database = new MySQL();
        $repository = new UserRepository($database);
        $updateUsecase = new UpdateUserUsecase($repository);

        return $updateUsecase;
    }
}
