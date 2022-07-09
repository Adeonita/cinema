<?php
namespace App\Domain\Factories\UserUsecase;

use App\Domain\Repositories\UserRepository;
use App\Domain\Usecases\User\CreateUserUsecase;
use App\Infra\Database\MySQL;

class SaveUserUsecaseFactory {

    public static function create(): CreateUserUsecase {
        $database = new MySQL();
        $userRepository = new UserRepository($database);
        $saveUserUsecase = new CreateUserUsecase($userRepository);

        return $saveUserUsecase;
    }

}