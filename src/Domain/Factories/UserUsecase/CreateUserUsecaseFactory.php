<?php
namespace App\Domain\Factories\UserUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\UserRepository;
use App\Domain\Usecases\User\CreateUserUsecase;

class CreateUserUsecaseFactory
{
    public static function create(): CreateUserUsecase
    {
        $database = new MySQL();
        $userRepository = new UserRepository($database);
        $saveUserUsecase = new CreateUserUsecase($userRepository);

        return $saveUserUsecase;
    }
}
